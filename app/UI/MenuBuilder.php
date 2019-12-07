<?php
/**
 * Created by PhpStorm.
 * User: Christoph Fischer
 * Date: 06.12.2019
 * Time: 14:02
 */

namespace App\UI;


use App\Inputs\AbstractInput;
use App\Inputs\Inputs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class MenuBuilder
{

    public static function sidebar() {
        $config = self::configure();

        // TODO: check, if active

        return $config;
    }


    /**
     * Get menu configuration
     * @return array
     */
    protected static function configure() : array {
        $menu = [];
        $menu[] = [
            'text' => 'Kalender',
            'icon' => 'fa fa-calendar',
            'url' => route('calendar'),
            'icon_color' => 'blue',
        ];
        $menu[] = [
            'text' => 'Urlaub',
            'icon' => 'fa fa-globe-europe',
            'url' => route('absences.index'),
            'icon_color' => 'orange',
        ];


        $inputMenu = [];
        /** @var AbstractInput $input */
        foreach (Inputs::all() as $input) {
            $inputMenu[] = [
                'text' => $input->title,
                'icon' => 'fa fa-keyboard',
                'url' => route('inputs.setup', $input->getKey()),
            ];
        }

        if (count($inputMenu)) {
            $menu[] = 'Eingabe';
            $menu[] = [
                'text' => 'Sammeleingaben',
                'icon' => 'fa fa-keyboard',
                'url' => '#',
                'submenu' => $inputMenu,
            ];
        }

        $menu[] = 'Ausgabe';
        $menu[] = [
            'text' => 'Ausgabeformate',
            'icon' => 'fa fa-print',
            'url' => route('reports.list'),
        ];
        $menu[] = [
            'text' => 'Outlook-Export',
            'icon' => 'fa fa-calendar-alt',
            'url' => route('ical.connect'),
        ];


        $adminMenu = [];
        $user = Auth::user();
        if ($user->can('benutzerliste-lokal-sehen') || $user->can('benutzer-bearbeiten')) {
            $adminMenu[] = [
                'text' => 'Benutzer',
                'icon' => 'fa fa-users',
                'url' => route('users.index'),
            ];
        }
        if ($user->can('rollen-bearbeiten')) {
            $adminMenu[] = [
                'text' => 'Benutzerrollen',
                'icon' => 'fa fa-user-tag',
                'url' => route('roles.index'),
            ];
        }
        if ($user->can('ort-bearbeiten') || $user->can('gd-opfer-bearbeiten')) {
            $adminMenu[] = [
                'text' => 'Kirchengemeinden',
                'icon' => 'fa fa-church',
                'url' => route('cities.index'),
            ];
        }
        if ($user->can('kirche-bearbeiten')) {
            $adminMenu[] = [
                'text' => 'Kirche / GD-Orte',
                'icon' => 'fa fa-map-marker',
                'url' => route('locations.index'),
            ];
        }
        if ($user->can('tags-bearbeiten')) {
            $adminMenu[] = [
                'text' => 'Kennzeichnungen',
                'icon' => 'fa fa-tag',
                'url' => route('tags.index'),
            ];
        }
        if ($user->can('pfarraemter-bearbeiten')) {
            $adminMenu[] = [
                'text' => 'Pfarrämter',
                'icon' => 'fa fa-building',
                'url' => route('parishes.index'),
            ];
        }
        if (count($adminMenu)) {
            $menu[] = 'Administration';
            $menu[] = [
                'text' => 'Administration',
                'icon' => 'fa fa-user-shield',
                'url' => '#',
                'submenu' => $adminMenu,
            ];
        }



        return $menu;
    }


    public static function breadcrumbs() {
        $route = Request::route();
        dd($route);
    }
}