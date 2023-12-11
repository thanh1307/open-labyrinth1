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
 */ ?>
<h3>Đăng Nhập</h3>
<form id="loginForm" name="loginForm" method="post" action="<?php echo URL::base() . 'home/login' ?>">
    <label for="username"><?php echo __('Tên người dùng'); ?></label>
    <input class="not-autocomplete" type="text" id="username" name="username" placeholder="<?php echo __('Nhập tên người dùng'); ?>" />

    <label for="password"><?php echo __('Mật khẩu'); ?></label>
    <input class="not-autocomplete" type="password" id="password" name="password" placeholder="<?php echo __('Nhập mật khẩu'); ?>" />
    <span class="help-block"><a data-toggle="modal" href="#forgot-password-window"><?php echo __('Quên mật khẩu'); ?></a></span><?php
    if(isset($templateData['redirectURL'])) { ?>
    <input type="hidden" name="redirectURL" value="<?php echo $templateData['redirectURL']; ?>"/><?php
    }

    $showOAuth = false;
    if(isset($templateData['oauthProviders']) && count($templateData['oauthProviders']) > 0) {
        foreach($templateData['oauthProviders'] as $provider) {
            if($provider->icon != null && $provider->appId != null && $provider->secret != null) {
                $showOAuth = true;
                break;
            }
        }
    }
    if($showOAuth) { ?>
    <div class="oauth-line">
        <div class="line"><div></div></div>
        <div class="text">HOẶC</div>
        <div class="line"><div></div></div>
    </div>
    <div class="oauth-icon-line"><?php
        if(isset($templateData['oauthProviders']) && count($templateData['oauthProviders'])) {
            foreach($templateData['oauthProviders'] as $provider) {
                if($provider->icon != null && $provider->appId != null && $provider->secret != null) { ?>
                    <a href="<?php echo URL::base().'home/loginOAuth/'.$provider->id ?>"><img width="32" src="<?php echo URL::base().'images/oauth/'.$provider->icon; ?>"></a>&nbsp;<?php
                }
            }
        } ?>
    </div><?php
    } ?>

    <button type="submit" class="btn"><?php echo __('Đăng nhập'); ?></button>
</form>

<div id="forgot-password-window" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="forgot-password-label" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 id="forgot-password-label"><?php echo __('Quên mật khẩu'); ?></h3>
    </div>
    <div class="modal-body">
        <form id="forgot-password-form" action="<?php echo URL::base(); ?>home/resetPassword" method="post">
            <p><?php echo __('Nếu bạn quên mật khẩu Hệ thống, vui lòng nhập địa chỉ email của bạn vào biểu mẫu bên dưới để bắt đầu quá trình đặt lại mật khẩu.'); ?></p>
            <div class="control-group">
                <label class="control-label" for="email"><?php echo __('Địa chỉ email'); ?></label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-envelope"></i></span>
                        <input class="not-autocomplete" type="text" id="email" name="email" value="" autocomplete="off" placeholder="<?php echo __('Địa chỉ email của bạn'); ?>" />
                    </div>
                </div>
            </div>
            <input type="hidden" name="token" value="<?php echo Security::token(); ?>" />
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal">Đóng</button>
        <button id="forgot-password-submit" class="btn btn-primary">Khôi phục Mật khẩu</button>
    </div>
</div><?php
if(count(Notice::get())) { ?>
    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php $m = Notice::get(); echo $m[0]; ?>
    </div><?php
} ?>