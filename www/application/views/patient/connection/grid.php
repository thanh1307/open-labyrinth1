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
    Đặt mạng lưới kết nối
        <a class="btn btn-primary pull-right" href="<?php echo URL::base().'patient/connectionManage'; ?>"><i class="icon-plus-sign"></i> Thêm kết nối</a>
    </h1>
</div>

<table class="table table-striped table-bordered patient-t">
    <thead>
    <tr>
        <th>#</th>
        <th>Quy tắc</th>
        <th>Đúng</th>
        <th>Vận hành</th>
    </tr>
    </thead>
    <tbody><?php
    if ($templateData['connection']) {
        foreach ($templateData['connection'] as $connection) { ?>
        <tr>
            <td><?php echo $connection->id; ?></td>
            <td><?php echo $connection->rule; ?></td>
            <td><?php echo $connection->isCorrect; ?></td>
            <td>
                <a class="btn btn-info" href="<?php echo URL::base().'patient/connectionManage/'.$connection->id; ?>"><i class="icon-edit"></i>Chỉnh sửa</a>
                <a class="btn btn-danger" href="<?php echo URL::base().'patient/connectionDelete/'.$connection->id; ?>"><i class="icon-trash"></i>Xóa</a>
            </td>
        </tr><?php
        }
    } else { ?>
        <tr class="info"><td colspan="4">Không có màn hình có sẵn ngay bây giờ. Bạn có thể thêm màn hình bằng cách sử dụng menu ở trên.</td></tr><?php
    } ?>
    </tbody>
</table>