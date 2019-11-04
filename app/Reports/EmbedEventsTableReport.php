<?php
/**
 * Created by PhpStorm.
 * User: Christoph Fischer
 * Date: 02.11.2019
 * Time: 12:30
 */

namespace App\Reports;


use App\City;
use App\Imports\EventCalendarImport;
use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmbedEventsTableReport extends AbstractEmbedReport
{

    public $title = 'Liste von aktuellen Veranstaltungen';
    public $group = 'Website (Gemeindebaukasten)';
    public $description = 'Erzeugt HTML-Code für die Einbindung einer Veranstaltungsliste in die Website der Gemeinde';
    public $icon = 'fa fa-file-code';

    public function setup()
    {
        $cities = Auth::user()->cities;
        return $this->renderSetupView(compact('cities'));
    }

    public function render(Request $request)
    {

        $request->validate([
            'cors-origin' => 'required|url',
            'city' => 'required',
        ]);
        $city = City::findOrFail($request->get('city'));
        $days = $request->get('numDays');
        $corsOrigin = $request->get('cors-origin');
        $report = $this->getKey();

        $url = route('report.embed', compact('report', 'days', 'city', 'corsOrigin'));
        $randomId = uniqid();

        return view('reports.embedeventstable.render', compact('url', 'randomId'));
    }


    public function embed(Request $request) {
        $city = City::findOrFail($request->get('city'));
        $days = $request->get('days');

        $start = Carbon::now('Europe/Berlin');
        $end = $start->copy()->addDays($days)->setTime(23,59,59);

        $services = Service::with(['day', 'location'])
            ->regularForCity($city)
            ->dateRange($start, $end)
            ->ordered()
            ->get();

        $calendar = new EventCalendarImport($city->public_events_calendar_url);
        $events = $calendar->mix($services, $start, $end, true);

        return $this->renderView('embed', compact('start', 'days', 'city', 'events'));
    }
}