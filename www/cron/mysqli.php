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

class mysqliConnection
{
    private $config;

    public function __construct($isCron = 'kohana'){
        if ($isCron == 'kohana') {
            $this->config = Kohana::$config->load('database');
        } elseif ($isCron == 'cron') {
            $this->config = require_once DOCROOT.'/application/config/database.php';
        }
    }

    public function connect(){
        $credits    = $this->config['default']['connection'];
        $host       = $credits['hostname'].($credits['port'] != '') ? $credits['port'] : '';
        $username   = $credits['username'];
        $dbName     = $credits['database'];
        $password   = $credits['password'];
        $connection = mysqli_connect($host, $username, $password, $dbName);

        if (mysqli_connect_errno()) {
            exit("Kết nối đến MySQL thất bại: ".mysqli_connect_error());
        } else {
            return $connection;
        }
    }

    public function closeConnect(mysqli $connection){
        mysqli_close($connection);
    }
}