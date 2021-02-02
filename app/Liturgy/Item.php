<?php
/*
 * Pfarrplaner
 *
 * @package Pfarrplaner
 * @author Christoph Fischer <chris@toph.de>
 * @copyright (c) 2021 Christoph Fischer, https://christoph-fischer.org
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

namespace App\Liturgy;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $appends = ['data'];

    protected $table = 'liturgy_items';

    protected $fillable= ['liturgy_block_id', 'title', 'instructions', 'data_type', 'serialized_data', 'sortable'];

    protected static function boot()
    {
        parent::boot();

        // Order by sortable ASC
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('sortable', 'asc');
        });
    }


    public function block()
    {
        return $this->belongsTo(Block::class, 'liturgy_block_id');
    }

    public function getDataAttribute()
    {
        return unserialize($this->attributes['serialized_data']) ?: new \stdClass();
    }

    public function setDataAttribute($data)
    {
        return $this->attributes['serialized_data'] = serialize($data);
    }

}
