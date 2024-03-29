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
$twitter = Arr::get($templateData, 'twitterCredits'); ?>
<form class="form-horizontal" method="post" action="<?php echo URL::base().'systemManager/saveTwitterCredits'; ?>" enctype="multipart/form-data">
    <fieldset class="fieldset">
        <legend>Thông báo Twitter</legend>
        <div class="control-group">
            <label class="control-label">Khóa API</label>
            <div class="controls">
                <input type="text" class="span8" name="apiKey" value="<?php if ($twitter) echo $twitter->API_key;?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Mật mã API</label>
            <div class="controls">
                <input type="text" class="span8" name="apiSecret" value="<?php if ($twitter) echo $twitter->API_secret;?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Truy cập thẻ</label>
            <div class="controls">
                <input type="text" class="span8" name="accessToken" value="<?php if ($twitter) echo $twitter->Access_token;?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Mật mã truy cập thẻ</label>
            <div class="controls">
                <input type="text" class="span8" name="accessTokenSecret" value="<?php if ($twitter) echo $twitter->Access_token_secret;?>">
            </div>
        </div>
    </fieldset>
    <input type="hidden" name="id" value="<?php if ($twitter) echo $twitter->id;?>">
    <button class="btn btn-primary" type="submit">Gửi</button>
</form>