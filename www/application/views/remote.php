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
<table width="100%" bgcolor="#ffffff">
    <tr>
        <td>
            <h4><?php echo __('Dịch vụ từ xa'); ?></h4>
            <p><?php echo __('Đây là các trình kết nối XML để cho phép bạn chạy Hệ thống từ xa trong các hệ thống hoặc bối cảnh khác. Mỗi dịch vụ được dẫn tới một địa chỉ IP máy chủ duy nhất và có thể có Hệ thống được ánh xạ tới địa chỉ đó. Có hai cuộc gọi dịch vụ.'); ?>:</p>
            <p>- <?php echo __('Kết xuất hệ thống/Điều khiển từ xa - Ở đây sẽ liệt kê các Hệ thống có sẵn đã đăng ký với dịch vụ này'); ?></p>
            <hr>
            <?php if(isset($templateData['services']) and count($templateData['services']) > 0) { ?>
            <?php foreach($templateData['services'] as $service) { ?>
            <p>'<?php echo $service->name; ?>' : <a href="<?php echo URL::base(); ?>remoteServiceManager/editService/<?php echo $service->id; ?>">Chỉnh sửa dịch vụ</a> - <a href="<?php echo URL::base(); ?>remoteServiceManager/editServiceMap/<?php echo $service->id; ?>">Thêm mới/Chỉnh sửa Hệ thống</a></p>
            <?php } ?>
            <?php } ?>
            <hr>
            <p><a href="<?php echo URL::base(); ?>remoteServiceManager/addService">Thêm mới dịch vụ</a></p>
        </td>
    </tr>
</table>