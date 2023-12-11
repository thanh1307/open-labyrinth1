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
?>
<form class="form-horizontal" action="<?php echo URL::base() . 'systemManager/updateMediaUploadCopyright/'; ?>" method="post">
    <input type="hidden" name="token" value="<?php echo $templateData['token']; ?>" />

    <fieldset class="fieldset">
        <legend><?php echo __('Tải lên phương tiện - Thông báo bản quyền'); ?></legend>
        <div class="control-group">
            <label class="control-label" for="title"><?php echo __('Tiêu đề thông báo'); ?></label>
            <div class="controls">
                <input type="text" class="span8" id="title" name="title" value="<?php echo $templateData['media_copyright']['title']; ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="copyright_message"><?php echo __('Tin nhắn bản quyền'); ?></label>
            <div class="controls">
                <textarea class="span8" rows="6" id="copyright_message" name="copyright_message"><?php echo $templateData['media_copyright']['copyright_message']; ?></textarea>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="<?php echo __('Nâng cấp tin nhắn'); ?>" />
    </fieldset>
</form>