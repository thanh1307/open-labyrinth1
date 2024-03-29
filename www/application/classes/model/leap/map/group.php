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
 * Model for users table in database
 */
class Model_Leap_Map_Group extends DB_ORM_Model {

    public function __construct() {
        parent::__construct();

        $this->fields = array(
            'id' => new DB_ORM_Field_Integer($this, array(
                'max_length' => 11,
                'nullable' => FALSE,
                'unsigned' => TRUE
            )),

            'map_id' => new DB_ORM_Field_Integer($this, array(
                'max_length' => 11,
                'nullable' => FALSE,
                'unsigned' => TRUE
            )),

            'group_id' => new DB_ORM_Field_Integer($this, array(
                'max_length' => 11,
                'nullable' => FALSE,
                'unsigned' => TRUE
            ))
        );

        $this->relations = array(
            'group' => new DB_ORM_Relation_BelongsTo($this, array(
                'child_key' => array('group_id'),
                'parent_key' => array('id'),
                'parent_model' => 'group',
            ))
        );
    }

    public static function data_source() {
        return 'default';
    }

    public static function table() {
        return 'map_groups';
    }

    public static function primary_key() {
        return array('id');
    }

    /**
     * Xóa tất cả groups from map
     *
     * @param integer $mapId - Map ID
     */
    public function removeAllGroups($mapId) {
        DB_SQL::delete('default')
            ->from($this->table())
            ->where('map_id', '=', $mapId)
            ->execute();
    }

    /**
     * Remove groups from map by id
     *
     * @param integer $mapId - Map ID
     * @param array $groups - Group IDs
     */

    public function removeGroups($mapId, array $groups, $operator = 'IN') {

        DB_SQL::delete('default')
            ->from($this->table())
            ->where('map_id', '=', $mapId)
            ->where('group_id', $operator, $groups)
            ->execute();
    }

    /**
     * Ad group to Map
     *
     * @param integer $mapId - Map ID
     * @param integer $groupId - group ID
     * @return integer - Map group id
     */
    public function addGroup($mapId, $groupId) {
        return DB_ORM::insert('map_group')
            ->column('map_id', $mapId)
            ->column('group_id', $groupId)
            ->execute();
    }

    public function addNewGroups($mapId, $groupIds){
        $existGroupsIds = DB_ORM::model('map_group')->getByMapId($mapId);

        foreach ($groupIds as $groupId) {
            if(!empty($existGroupsIds) && in_array($groupId, $existGroupsIds)) continue;
            DB_ORM::model('map_group')->addGroup($mapId, $groupId);
        }
    }

    public function getByMapId($mapId, $onlyGroupIds = true){
        $existGroups = DB_ORM::select('map_group')
            ->where('map_id', '=', $mapId)
            ->query();

        if($onlyGroupIds){
            $existGroupsIds = array();
            if(!empty($existGroups) && count($existGroups) > 0) {
                foreach($existGroups as $mapGroup) {
                    $existGroupsIds[] = $mapGroup->group_id;
                }
            }
            $result = $existGroupsIds;
        }else{
            $result = $existGroups;
        }
        return $result;
    }
}