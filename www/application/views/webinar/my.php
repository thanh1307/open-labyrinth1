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
$scenarios = Arr::get($templateData, 'scenarios', array()); ?>
<div class="page-header">
    <h1><?php echo __('Kịch bản của tôi'); ?></h1>
</div>
<table class="table table-striped table-bordered" id="my-labyrinths">
    <colgroup>
        <col style="width: 50%" />
        <col style="width: 20%" />
        <col style="width: 30%" />
    </colgroup>
    <thead>
        <tr>
            <th><?php echo __('Tiêu đề kịch bản'); ?></th>
            <th><?php echo __('Bước'); ?></th>
            <th><?php echo __('Hành động'); ?></th>
        </tr>
    </thead>
    <tbody><?php if(count($scenarios)) {
        foreach($scenarios as $scenario) { ?>
            <tr>
                <td><a href="<?php echo URL::base(); ?>"><?php echo $scenario->title; ?></a></td>
                <td><?php
                    if(count($scenario->steps)) {
                        foreach($scenario->steps as $scenarioStep) {
                            if($scenarioStep->id == $scenario->current_step) {
                                echo $scenarioStep->name;
                                break;
                            }
                        }
                    } else {
                        echo '-';
                    } ?>
                </td>
                <td class="center">
                    <div class="btn-group">
                        <a class="btn btn-info" href="<?php echo URL::base().'webinarManager/render/'.$scenario->id; ?>">
                            <i class="icon-folder-open icon-white"></i>
                            <span class="visible-desktop">Mở</span>
                        </a>
                        &nbsp;
                        <a class="btn btn-info" href="<?php echo URL::base().'webinarManager/progress/'.$scenario->id; ?>">
                            <i class="icon-calendar icon-white"></i>
                            <span class="visible-desktop">Hiển thị quá trình</span>
                        </a>
                    </div>
                </td>
            </tr><?php
        }
    } else { ?>
        <tr class="info"><td colspan="4">Hiện không có kịch bản nào sẵn có.</td> </tr>
    <?php } ?>
    </tbody>
</table>