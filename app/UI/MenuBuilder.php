<?php
/**
 * Pfarrplaner
 *
 * @package Pfarrplaner
 * @author Christoph Fischer <chris@toph.de>
 * @copyright (c) 2020 Christoph Fischer, https://christoph-fischer.org
 * @license https://www.gnu.org/licenses/gpl-3.0.txt GPL 3.0 or later
 * @link https://github.com/potofcoffee/pfarrplaner
 * @version git: $Id$
 *
 * Sponsored by: Evangelischer Kirchenbezirk Balingen, https://www.kirchenbezirk-balingen.de
 *
 * Pfarrplaner is based on the Laravel framework (https://laravel.com).
 * This file may contain code created by Laravel's scaffolding functions.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Created by PhpStorm.
 * User: Christoph Fischer
 * Date: 06.12.2019
 * Time: 14:02
 */

namespace App\UI;


use App\City;
use App\Inputs\AbstractInput;
use App\Inputs\Inputs;
use App\Location;
use App\Parish;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Spatie\Permission\Models\Role;

/**
 * Class MenuBuilder
 * @package App\UI
 */
class MenuBuilder
{

    /**
     * @return array
     */
    public static function sidebar()
    {
        $config = self::configure();

        // TODO: check, if active

        return $config;
    }


    /**
     * Get menu configuration
     * @return array
     */
    protected static function configure(): array
    {
        $menu = [];
        $menu[] = [
            'text' => 'Kalender',
            'icon' => 'fa fa-calendar',
            'url' => route('calendar'),
            'icon_color' => 'blue',
        ];

        $absenceMenu = [
            'text' => 'Urlaub',
            'icon' => 'fa fa-globe-europe',
            'url' => route('absences.index'),
            'icon_color' => 'orange',
        ];
        if (count(Auth::user()->approvableUsers()) > 0) {
            $absenceMenu['url'] = '';
            $absenceMenu['submenu'] = [
                [
                    'text' => 'Urlaubskalender',
                    'icon' => 'fa fa-globe-europe',
                    'url' => route('absences.index'),
                ],
                [
                    'text' => 'Urlaubsanträge',
                    'icon' => 'fa fa-globe-europe',
                    'url' => route('approvals.index'),
                    'counter' => count(Auth::user()->absencesToBeApproved()),
                    'counter_class' => 'info',
                ],
            ];
        }

        $menu[] = $absenceMenu;


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
        if ($user->can('index', User::class)) {
            $adminMenu[] = [
                'text' => 'Benutzer',
                'icon' => 'fa fa-users',
                'url' => route('users.index'),
            ];
        }
        if ($user->can('index', Role::class)) {
            $adminMenu[] = [
                'text' => 'Benutzerrollen',
                'icon' => 'fa fa-user-tag',
                'url' => route('roles.index'),
            ];
        }
        if ($user->can('index', City::class)) {
            $adminMenu[] = [
                'text' => 'Kirchengemeinden',
                'icon' => 'fa fa-church',
                'url' => route('cities.index'),
            ];
        }
        if ($user->can('index', Location::class)) {
            $adminMenu[] = [
                'text' => 'Kirche / GD-Orte',
                'icon' => 'fa fa-map-marker',
                'url' => route('locations.index'),
            ];
        }
        if ($user->can('index', Tag::class)) {
            $adminMenu[] = [
                'text' => 'Kennzeichnungen',
                'icon' => 'fa fa-tag',
                'url' => route('tags.index'),
            ];
        }
        if ($user->can('index', Parish::class)) {
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


    public
    static function breadcrumbs()
    {
        $route = Request::route();
        dd($route);
    }
}
