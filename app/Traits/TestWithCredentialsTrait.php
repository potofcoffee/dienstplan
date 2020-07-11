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

namespace App\Traits;


use App\City;
use App\Http\Middleware\Authenticate;
use App\User;
use Spatie\Permission\Models\Permission;

/**
 * Trait TestWithCredentialsTrait
 * @package App\Traits
 */
trait TestWithCredentialsTrait
{

    /** @var City */
    protected $city;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(Authenticate::class);
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->registerPermissions();

        Permission::create(['name' => 'gd-bearbeiten']);

        $this->city = factory(City::class)->create();

        /** @var User */
        $this->user = factory(User::class)->create();
        $this->user->givePermissionTo('gd-bearbeiten');
        $this->user->writableCities()->attach($this->city);
    }


}
