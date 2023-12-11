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
    <h1>
        Mạng lưới quy tắc người dùng ảo
        <a class="btn btn-primary pull-right" href="<?php echo URL::base().'patient/rule_add'; ?>"><i class="icon-plus-sign"></i> Thêm quy tắc</a>
    </h1>
</div>

<table class="table table-striped table-bordered patient-t">
    <thead>
    <tr>
        <th>#</th>
        <th>Chính xác</th>
        <th>Người dùng ảo liên quan</th>
        <th>Vận hành</th>
    </tr>
    </thead>
    <tbody><?php
    if ($templateData['rules']) {
        foreach ($templateData['rules'] as $rule) { $id_rule = $rule->id; ?>
            <tr>
            <td><?php echo $id_rule; ?></td>
            <td><?php echo $rule->isCorrect; ?></td>
            <td><?php echo 1;?>
            </td>
            <td>
                <a class="btn btn-info" href="<?php echo URL::base().'patient/rule_management/'.$id_rule; ?>"><i class="icon-edit"></i>Chỉnh sửa</a>
                <a class="btn btn-danger" href="<?php echo URL::base().'patient/delete_related_rule/'.$id_rule; ?>"><i class="icon-trash"></i>Xóa</a>
            </td>
            </tr><?php
        }
    }
    else {?>
        <tr class="info"><td colspan="4">Không có màn hình có sẵn ngay bây giờ. Bạn có thể thêm màn hình bằng cách sử dụng menu ở trên.</td></tr><?php
    } ?>
    </tbody>
</table>