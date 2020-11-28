<?php

namespace App\Console\Commands;

use App\City;
use App\Helpers\YoutubeHelper;
use App\Integrations\Youtube\YoutubeIntegration;
use App\Service;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateYoutubeStream extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'youtube:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update streaming keys on youtube';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $cities = City::where('google_access_token', '!=', '')->get();
        foreach ($cities as $city) {
            $this->line('Checking livestreams for "' . $city->name . '"');

            if ($city->youtube_active_stream_id == '') {
                $this->line('No active stream key defined.');
                continue;
            }

            if ($city->youtube_passive_stream_id == '') {
                $this->line('No passive stream key defined.');
                continue;
            }

            $services = Service::where('city_id', $city->id)
                ->select('services.*')
                ->join('days', 'days.id', 'services.day_id')
                ->where('youtube_url', '!=', '')
                ->orderBy('days.date')
                ->orderBy('time')
                ->get();
            $current = null;
            $youtube = YoutubeIntegration::get($city);
            foreach ($services as $service) {
                $dt = $service->dateTime();
                if ($dt < Carbon::now()) {
                    $last = $service;
                } else {
                    $status = 'future';
                    if (null === $current) {
                        $current = $service;

                        // check status
                        /** @var \Google_Service_YouTube_Video $video */
                        $lastVideo = $youtube->getVideo(YoutubeHelper::getCode($last->youtube_url));
                        if ($this->videoHasEnded($lastVideo)) {
                            $this->line('Last service #' . $last->id . ' (' . $last->formatTime('Y-m-d H:i') . ') has ended.');
                        }

                        $this->line('Next Service #' . $service->id . ' (' . $service->formatTime('Y-m-d H:i') . ')...');
                        $this->setBroadcastOptions($service, true);

                    } else {
                        $this->line('Future Service #' . $service->id . ' (' . $service->formatTime('Y-m-d H:i') . ')...');
                        $this->setBroadcastOptions($service, false);
                    }
                }

            }
        }
    }

    /**
     * Check if video has stopped streaming already
     * @param \Google_Service_YouTube_Video $video
     * @return bool
     */
    private function videoHasEnded(\Google_Service_YouTube_Video $video) {
        return (null !== $video->getLiveStreamingDetails()->actualEndTime);
    }

    /**
     * Configure the broadcast for a service with specific options
     * @param Service $service Service
     * @param bool $active Set active or inactive
     */
    private function setBroadcastOptions(Service $service, $active = true) {
        $autoStartStop = $active;
        $youtube = YoutubeIntegration::get($service->city);
        $broadcasts = $youtube->getYoutube()->liveBroadcasts->listLiveBroadcasts(
            'id,contentDetails',
            ['id' => YoutubeHelper::getCode($service->youtube_url)]);

        if (count($broadcasts->getItems())) {
            /** @var \Google_Service_YouTube_LiveBroadcast $broadcast */
            $broadcast = $broadcasts->getItems()[0];
            $contentDetails = $broadcast->getContentDetails();

            if ($contentDetails->getBoundStreamId() == ($active ? $service->city->youtube_passive_stream_id : $service->city_youtube_active_stream_id)) {
                $this->line('Setting stream key');
                $youtube->getYoutube()->liveBroadcasts->bind($broadcast->getId(), 'id,snippet,status', ['streamId' => ($active ? $service->city->youtube_active_stream_id : $service->city_youtube_passive_stream_id)]);
            }
            if ($service->city->youtube_auto_startstop) {
                if (($contentDetails->getEnableAutoStart() != $autoStartStop) || ($contentDetails->getEnableAutoStop() != $autoStartStop)) {
                    $this->line('Setting auto start/stop');
                    $contentDetails->setEnableAutoStart($autoStartStop ? 'true' : 'false');
                    $contentDetails->setEnableAutoStop($autoStartStop ? 'true' : 'false');
                    $broadcast->setContentDetails($contentDetails);
                    $youtube->getYoutube()->liveBroadcasts->update('contentDetails', $broadcast);
                }
            }
        }

    }

}