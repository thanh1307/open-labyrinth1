<?php
/**
 * Open Labyrinth [ http://www.openlabyrinth.ca ]
 *
 * Open Labyrinth is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Open Labyrinth is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Open Labyrinth.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @copyright Copyright 2012 Open Labyrinth. All Rights Reserved.
 *
 */
defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');

class Searcher_Element_BasicMap_Counter extends Searcher_Element_BasicMap {

    public function __construct($mapId, $fields) {
        parent::__construct($mapId, $fields);
    }

    protected function getTable() {
        return Model_Leap_Map_Counter::table();
    }

    protected function getModelName() {
        return 'map_counter';
    }

    protected function getURL($object) {
        return URL::base() . 'counterManager/editCounter/' . $this->mapId . '/' . $object->id;
    }

    protected function getURLTitle($object) {
        return $object->name;
    }

    protected function getType() {
        return 'counter';
    }
};