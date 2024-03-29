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
if(isset($templateData['service'])) { ?>
<table width="100%" bgcolor="#ffffff"><tr><td>
            <h4>Chỉnh sửa dịch vụ từ xa "<?php echo $templateData['service']->name; ?>"</h4>
            <form id="form1" name="form1" method="post" action="<?php echo URL::base(); ?>remoteServiceManager/updateService/<?php echo $templateData['service']->id; ?>">
                <table width="100%" border="0" cellspacing="0" cellpadding="4">
                    <tr>
                        <td width="33%" align="right"><p><?php echo __('tên dịch vụ'); ?>:</p></td>
                        <td width="50%">
                            <input name="ServiceName" type="text" id="ServiceName" size="40" value="<?php echo $templateData['service']->name; ?>"></td>
                    </tr>
                    <tr>
                        <td width="33%" align="right"><p><?php echo __('ID người dùng dịch vụ'); ?>:</p></td>
                        <td width="50%">
                            <select name="ServiceNameUserId">
                                <option value="">không xác định</option>
                                <?php if(count($templateData['users']) > 0) { ?>
                                <?php foreach($templateData['users'] as $user) { ?>
                                <option value="<?php echo $user->id; ?>"><?php echo $user->nickname; ?></option>
                                <?php } ?>
                                <?php } ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td width="33%" align="right"><p>kiểu:</p></td>
                        <td width="50%">
                            <select name="ServiceType"><option value="s" <?php if($templateData['service']->type == 's') echo 'selected=""'; ?>>server</option><option value="i" <?php if($templateData['service']->type == 'i') echo 'selected=""'; ?>>iPhone</option></select></td>
                    </tr>
                    <tr>
                        <td width="33%" align="right">
                            <p>IP của máy khách từ xa (để trống ô 4 hoặc 3 và 4 để che dấu - phải điền vào ô 1 và 2):</p>
                        </td>
                        <td width="50%">
                            <?php $ipArray = explode('.', $templateData['service']->ip); ?>
                            <input name="ServiceIPMaskA" type="text" size="4" value="<?php echo $ipArray[0]; ?>">.
                            <input name="ServiceIPMaskB" type="text" size="4" value="<?php echo $ipArray[1]; ?>">.
                            <input name="ServiceIPMaskC" type="text" size="4" value="<?php echo $ipArray[2]; ?>">.
                            <input name="ServiceIPMaskD" type="text" size="4" value="<?php echo $ipArray[3]; ?>"></td>
                    </tr>
                    <tr>
                        <td><p>&nbsp;</p></td>
                        <td><input type="submit" name="Submit" value="<?php echo __('gửi'); ?>"></td>
                    </tr>

                </table>
            </form>
            <hr>
            <p><a href="<?php echo URL::base(); ?>remoteServiceManager"><?php echo __('dịch vụ từ xa'); ?></a></p>
        </td></tr></table>
<?php } ?>