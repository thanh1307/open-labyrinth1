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

class Controller_Statement extends Controller_Base
{

    public function before()
    {
        parent::before();
        Breadcrumbs::add(Breadcrumb::factory()->set_title(__('Quản lý LRS'))->set_url(URL::base() . 'lrs/index'));
    }

    public function action_index()
    {
        //
    }

    public function action_sendAll()
    {
        /** @var Model_Leap_LRSStatement[] $lrs_statements */
        $lrs_statements = DB_ORM::select('LRSStatement')
            ->where('status', '=', Model_Leap_LRSStatement::STATUS_NEW)
            ->query();

        foreach($lrs_statements as $lrs_statement){
            $lrs_statement->sendAndSave();
        }

        die('1');
    }
}