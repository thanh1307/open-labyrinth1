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

class ImportExport_Manager {
    
    /**
     * Return file format system by parameter or null
     * @param string $format
     * @return ImportExport_FormatSystem 
     */
    public static function getFormatSystem($format) {
        $result = null;
        
        switch($format) {
            case 'MVP':
                $result = new ImportExport_MVPFormatSystem();
                break;
            case 'advanced':
                $result = new ImportExport_AdvancedFormatSystem();
                break;
            //commented 24.04.2015, because not used
            //case 'MVPvpSim':
            //    $result = new ImportExport_MVPvpSimFormatSystem();
        }
        
        return $result;
    }
}