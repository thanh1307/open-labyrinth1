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

/**
 * Model for map_nodes table in database
 */
class Model_Leap_Conditions_Assign extends DB_ORM_Model {

    public function __construct() {
        parent::__construct();

        $this->fields = array(
            'id' => new DB_ORM_Field_Integer($this, array(
                'max_length' => 11,
                'nullable' => FALSE,
            )),
            'condition_id' => new DB_ORM_Field_Integer($this, array(
                'max_length' => 11,
                'nullable' => FALSE,
            )),
            'scenario_id' => new DB_ORM_Field_Integer($this, array(
                'max_length' => 11,
                'nullable' => FALSE,
            )),
            'value' => new DB_ORM_Field_Integer($this, array(
                'max_length' => 11,
                'nullable' => FALSE,
            )),
        );
    }

    public static function data_source() {
        return 'default';
    }

    public static function table() {
        return 'conditions_assign';
    }

    public static function primary_key() {
        return array('id');
    }

    public function add ($conditionId, $scenarioId, $value)
    {
        $record = new $this;
        $record->condition_id   = $conditionId;
        $record->scenario_id    = $scenarioId;
        $record->value          = $value;
        $record->save();
    }

    public function update ($id, $scenarioId)
    {
        $this->id = $id;
        $this->load();
        $this->scenario_id = $scenarioId;
        $this->save();
    }

    public function resetValue ($id, $value)
    {
        $this->id = $id;
        $this->load();
        $this->value = $value;
        $this->save();
    }

    public function deleteRecord ($id)
    {
        $record = new $this;
        $record->id = $id;
        $record->delete();
    }
}