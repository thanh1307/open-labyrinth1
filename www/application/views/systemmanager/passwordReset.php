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
<form class="form-horizontal" action="<?php echo URL::base() . 'systemManager/updatePasswordResetSettings/'; ?>" method="post">
    <input type="hidden" name="token" value="<?php echo $templateData['token']; ?>" />

    <fieldset class="fieldset">
        <legend><?php echo __('Cài đặt khôi phục mật khẩu'); ?></legend>
        <div class="control-group">
            <label class="control-label" for="fromname"><?php echo __('Địa chỉ email'); ?></label>
            <div class="controls">
                <input type="text" class="span3" id="fromname" name="fromname" value="<?php echo $templateData['email_config']['fromname']; ?>" placeholder="Tên" />
                &lt; <input type="text" class="span5" id="mailfrom" name="mailfrom" value="<?php echo $templateData['email_config']['mailfrom']; ?>" placeholder="email@address.org"/> &gt;
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email_password_reset_subject"><?php echo __('Đặt lại email'); ?></label>
            <div class="controls">
                <input type="text" class="span8" id="email_password_reset_subject" name="email_password_reset_subject" value="<?php echo $templateData['email_config']['email_password_reset_subject']; ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email_password_reset_body"><?php echo __('Đặt lại nội dung email'); ?></label>
            <div class="controls">
                <textarea class="span8" rows="10" id="email_password_reset_body" name="email_password_reset_body"><?php echo $templateData['email_config']['email_password_reset_body']; ?></textarea>
                <span class="help-block">
                    <small>
                        <span class="label label-info">Thẻ có sẵn:</span>
                        <a href="#" rel="tooltip" title="<?php echo __('Chèn tên vào nội dung email'); ?>"><?php echo __('Tên'); ?></a>,
                        <a href="#" rel="tooltip" title="<?php echo __('Chèn tên người dùng vào nội dung email.'); ?>"><?php echo __('Tên người dùng'); ?></a>,
                        <a href="#" rel="tooltip" title="<?php echo __('Chèn liên kết đến trang mật khẩu mới vào nội dung email.'); ?>"><?php echo __('Link'); ?></a>
                    </small>
                </span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email_password_complete_subject"><?php echo __('Hoàn tất đặt lại chủ đề email'); ?></label>
            <div class="controls">
                <input type="text" class="span8" id="email_password_complete_subject" name="email_password_complete_subject" value="<?php echo $templateData['email_config']['email_password_complete_subject']; ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email_password_complete_body"><?php echo __('Hoàn tất đặt lại nội dung email'); ?></label>
            <div class="controls">
                <textarea class="span8" rows="10" id="email_password_complete_body" name="email_password_complete_body"><?php echo $templateData['email_config']['email_password_complete_body']; ?></textarea>
                <span class="help-block">
                    <small>
                        <span class="label label-info">Thẻ có sẵn:</span>
                        <a href="#" rel="tooltip" title="<?php echo __('Chèn tên vào nội dung email'); ?>"><?php echo __('Tên'); ?></a>,
                        <a href="#" rel="tooltip" title="<?php echo __('Chèn tên người dùng vào nội dung email'); ?>"><?php echo __('Tên người dùng'); ?></a>
                    </small>
                </span>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="<?php echo __('Cập nhật cài đặt'); ?>" />
    </fieldset>
</form>