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

class Searcher_Element_Vpd extends Searcher_Element {
    private $mapId;
    private $fields;

    public function __construct($mapId, $fields) {
        $this->mapId = $mapId;
        $this->fields = $fields;
    }

    public function search($searchText) {
        $data = array();
        $search = '%' . strtolower($searchText) . '%';

        if($this->fields == null || count($this->fields) <= 0 || $searchText == null || empty($searchText)) return $data;

        $builder = DB_SQL::select('default')
                           ->column('M.id', 'id', true)
                           ->from(Model_Leap_Map_Vpd::table(), 'M');
        $checkForResponse = $this->checkForElement();
        if($checkForResponse) {
            $builder->join('LEFT OUTER', Model_Leap_Map_Vpd_Element::table(), 'R');
            $builder->on('M.id', '=', 'R.vpd_id', true);
        }

        $builder->where('map_id', '=', $this->mapId, 'AND');
        $builder->where_block('(');
        foreach($this->fields as $field) {
            $fieldName = $field['field'];
            if(isset($field['type']) && $field['type'] == 'element') {
                $fieldName = 'R.' . $fieldName;
            } else {
                $fieldName = 'M.' . $fieldName;
            }

            $builder->where('LOWER(' . $fieldName . ')', 'like', $search, 'OR', true);
        }
        $builder->where_block(')');

        $builder->distinct(true);

        $records = $builder->query();

        if($records->is_loaded()) {
            foreach($records as $record) {
                $modelObject = DB_ORM::model('map_vpd', array((int)$record['id']));
                $isAdd = false;

                foreach($this->fields as $field) {
                    $fieldName = $field['field'];
                    if(isset($field['type']) && $field['type'] == 'element') {
                        if($modelObject->elements != null && count($modelObject->elements) > 0) {
                            foreach($modelObject->elements as $element) {
                                if(strpos(strtolower(strip_tags($element->$fieldName)), strtolower($searchText)) !== false) {
                                    $isAdd = true;
                                    break;
                                }
                            }
                        }
                    } else if(strpos(strtolower(strip_tags($modelObject->$fieldName)), strtolower($searchText)) !== false) {
                        $isAdd = true;
                        break;
                    }
                }

                if($isAdd) {
                    $content = array();
                    foreach($this->fields as $field) {
                        $fieldName = $field['field'];
                        if(isset($field['type']) && $field['type'] == 'element') {
                            if($modelObject->elements != null && count($modelObject->elements) > 0) {
                                foreach($modelObject->elements as $element) {
                                    if(strpos(strtolower(strip_tags($element->$fieldName)), strtolower($searchText)) !== false) {
                                        $content[] = array('label' => $field['label'], 'value' => $element->$fieldName);
                                    }
                                }
                            }
                        } else {
                            $content[] = array('label' => $field['label'], 'value' => $modelObject->$fieldName);
                        }
                    }

                    $data[] = new Searcher_Result('vpd', URL::base() . 'elementManager/editVpd/' . $this->mapId . '/' . $modelObject->id, $modelObject->type->label, $content, $searchText);
                }
            }
        }


        return $data;
    }

    private function checkForElement() {
        if($this->fields == null || count($this->fields) <= 0) return false;

        foreach($this->fields as $field) {
            if(isset($field['type']) && $field['type'] == 'element') {
                return true;
            }
        }

        return false;
    }
};