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
<div class="page-header">
<h1><?php echo __('Người dùng và Nhóm'); ?></h1>
</div>

<div><div class="pull-right">
        <a class="btn btn-primary"
                                 href=<?php echo URL::base() . 'usermanager/addUser' ?>>
            <i class="icon-plus-sign"></i>
            <?php echo __('Thêm người dùng'); ?></a></div>
<h2>Người dùng</h2></div>


<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"/>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo URL::base(); ?>scripts/olab/dataTablesTB.js"></script>

<div class="alert alert-info"><?php if (isset($templateData['userCount'])) echo $templateData['userCount']; ?>
    &nbsp;<?php echo __('Người dùng đã đăng ký'); ?></div>


<table id="users" class="table table-striped table-bordered dataTable">
    <colgroup>
        <col/>
        <col/>
        <col/>
        <col/>
    </colgroup>
    <thead>
    <tr>
        <th>
            <?php echo __('Kiểu xác thực'); ?>
        </th>
        <th>
            <?php echo __('Tên người dùng'); ?>
        </th>
        <th>
            <?php echo __('Tên'); ?>
        </th>
        <th>
            <?php echo __('Kiểu'); ?>
        </th>
        <th>
            <?php echo __('Khôi phục mật khẩu'); ?>
        </th>
        <th>
            <?php echo __('Hành động'); ?>
        </th>

    </tr>
    </thead>

    <tbody>


    <?php if (isset($templateData['users']) and count($templateData['users']) > 0) { ?>
        <?php foreach ($templateData['users'] as $user) { ?>
            <tr>
                <?php $icon = ($user['icon'] != NULL) ? 'oauth/'.$user['icon'] : 'openlabyrinth-header.png' ; ?>
                <td style="text-align: center;"> <img <?php echo ($user['icon'] != NULL) ? 'width="32"' : ''; ?> src=" <?php echo URL::base() . 'images/' . $icon ; ?>" border="0"/></td>
                <td><?php echo $user['username'];?></td>
                <td><?php echo $user['nickname'];?></td>
                <td><?php echo $user['type_name']; ?></td>
                <td><?php

                    if ($user['resetAttempt'] != NULL) {
                        echo $user['resetAttempt'] ;
                    } else {
                        echo __('Không có lần thử nào');
                    }
                    if ($user['resetTimestamp'] != NULL) {
                        echo '&nbsp;'. __('Khôi phục mật khẩu gần nhất') . ':&nbsp;' . $user['resetTimestamp'];
                    }

                    echo $user['resetAttempt'];?></td>
                <td><a class="btn btn-info" href="<?php echo URL::base() . 'usermanager/editUser/' . $user['id']; ?>">
                        <i class="icon-edit"></i><?php echo __("Chỉnh sửa");?> </a>
                </td>
            </tr>

        <?php } ?>
    <?php }?>

    </tbody>
</table>


<div style="margin-top: 5%"><div class="pull-right">
        <a class="btn btn-primary" href=<?php echo URL::base() . 'usermanager/addGroup'; ?>>
            <i class="icon-plus-sign"></i>
            Thêm nhóm</a>
</div><h2>Nhóm</h2> </div>






<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th><?php echo __('Tiêu đề'); ?></th>
        <th><?php echo __('Hành động'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php if (isset($templateData['groups']) and count($templateData['groups']) > 0) { ?>
        <?php foreach ($templateData['groups'] as $group) { ?>
            <tr>
                <td><?php echo $group->name; ?></td>
                <td><a class="btn btn-info"
                       href="<?php echo  URL::base() . 'usermanager/editGroup/' . $group->id; ?>">
                        <i class="icon-edit"></i>
                        <?php echo __('Chỉnh sửa');?> </a>
                </td>
            </tr>
        <?php } ?>
    <?php } ?>
    </tbody>
</table>