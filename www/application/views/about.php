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
if(isset($templateData)) { ?>
    <h1><?php echo __('Trường Khoa Học Máy Tính - Đại Học Duy Tân'); ?></h1>
    <div class="control-group">
        <label class="control-label">Phiên bản: <?php echo Arr::get($templateData, 'version'); ?></label>
    </div>
    <div class="control-group">
        <label class="control-label">Website chính: <a href=" https://scs.duytan.edu.vn ">scs.duytan.edu.vn</a></label>
    </div><?php
} ?>