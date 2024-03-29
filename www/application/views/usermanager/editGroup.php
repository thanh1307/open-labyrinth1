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
if (isset($templateData['group'])) {
$groupId    = $templateData['group']->id;
$userType   = Auth::instance()->get_user()->type->name
?>
<div class="page-header">
   <div class="pull-right"><?php
       if ($userType != 'Director') { ?>
       <a class="btn btn-danger" href=<?php echo URL::base().'usermanager/deleteGroup/'.$groupId; ?>>
           <i class="icon-trash"></i>Xóa nhóm
       </a><?php
       } ?>
   </div>
   <h1>Chỉnh sửa nhóm  <?php echo $templateData['group']->name; ?> </h1>
</div>

<form class="form-horizontal" action="<?php echo URL::base().'usermanager/updateGroup/'.$groupId; ?>" method="post">
    <fieldset class="fieldset">
        <legend>Chi tiết nhóm</legend>
        <div class="control-group">
            <label for="groupname" class="control-label">Tên nhóm</label>
            <div class="controls">
                <input id="groupname" class="not-autocomplete" type="text" name="groupname" size="50" value="<?php echo $templateData['group']->name; ?>" <?php if ($userType == 'Director') echo 'ẩn'; ?>>
            </div>
        </div>
    </fieldset>

    <div class="form-actions">
        <input class="btn btn-primary" type="submit" name="UpdateGroupSubmit" value="<?php echo __('Lưu'); ?>">
    </div>
</form>

<h3>Thành viên</h3>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Người dùng</th>
        <th>Hoạt động</th>
    </tr>
    </thead>
    <tbody><?php
    if (isset($templateData['members'])&& !empty($templateData['members'])) {
        foreach ($templateData['members'] as $member) { ?>
        <tr>
            <td><a target="_blank" href="<?php echo URL::base().'usermanager/viewUser/'.$member->id;?>"><?php echo $member->nickname.'('.$member->username.')';?></a></td>
            <td>
                <a class="btn btn-danger" href=<?php echo URL::base().'usermanager/removeMember/'.$member->id.'/'.$groupId; ?>><i class="icon-minus-sign"></i>Xóa</a>
            </td>
        </tr><?php
        }
    } else { ?>
        <tr class="info">
            <td colspan="2">Nhóm này chưa có thành viên nào. Bạn có thể thêm thành viên mới bằng cách sử dụng mẫu dưới đây.</td>
        </tr><?php
    } ?>
    </tbody>
</table>
<form class="form-horizontal" action="<?php echo URL::base() . 'usermanager/addMemberToGroup/' . $groupId; ?>" method="post">
    <fieldset class="fieldset">
        <legend></legend>
        <div class="control-group">
            <label for="userid" class="control-label">User</label>

            <div class="controls">
                <select id="userid" name="userid"><?php
                    foreach (Arr::get($templateData, 'users', array()) as $user) { ?>
                    <option value="<?php echo $user->id; ?>"><?php echo $user->nickname.' ('.$user->username.')'; ?></option><?php
                    } ?>
                </select>
            </div>
        </div>
    </fieldset><?php
    if (isset($templateData['users'])) { ?>
    <div class="form-actions">
        <input class="btn btn-primary" type="submit" name="AddUserToGroupSubmit" value="<?php echo __('Thêm'); ?>">
    </div><?php
    } ?>
</form><?php
} ?>
