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
    <div class="pull-right">
        <div class="btn-group">
            <a class="btn btn-primary" href="<?php echo URL::base(); ?>TodayTipManager/addTip">
                <i class="icon-plus-sign icon-white"></i>
                <?php echo __('Thêm lời khuyên'); ?></a>
        </div>
    </div>
    <h1><?php echo __('Lời khuyên hôm nay'); ?></h1>
</div>

<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th><?php echo __('Id'); ?></php></th>
        <th><?php echo __('Tiêu đề'); ?></th>
        <th><?php echo __('Ngày bắt đầu'); ?></th>
        <th><?php echo __('Ngày kết thúc'); ?></th>
        <th><?php echo __('Trọng lượng'); ?></th>
        <th><?php echo __('Tích cực'); ?></th>
        <th><?php echo __('Hành động'); ?></th>
    </tr>
    </thead>

    <body>
    <?php if(isset($templateData['activeTips']) && count($templateData['activeTips']) > 0) { ?>
        <?php foreach($templateData['activeTips'] as $tip) { ?>
            <tr>
                <td><?php echo $tip->id; ?></td>
                <td><?php echo $tip->title; ?></td>
                <td><?php echo $tip->start_date; ?></td>
                <td><?php echo $tip->end_date; ?></td>
                <td><?php echo $tip->weight; ?></td>
                <td><?php echo $tip->is_active ? 'Active' : 'Inactive'; ?></td>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-info" href="<?php echo URL::base(); ?>TodayTipManager/editTip/<?php echo $tip->id; ?>"><i class="icon-edit icon-white"></i><?php echo __('Chỉnh sửa'); ?></a>
                        <a class="btn" href="<?php echo URL::base(); ?>TodayTipManager/archive/<?php echo $tip->id; ?>"><i class="icon-folder-close icon-white"></i><?php echo __('Di chuyển đến kho lưu trữ'); ?></a>
                        <a class="btn btn-danger" data-toggle="modal" href="javascript:void(0)" data-target="#delete-tip-<?php echo $tip->id; ?>"><i class="icon-trash icon-white"></i><?php echo __('Xóa'); ?></a>
                    </div>
                    <div class="modal hide alert alert-block alert-error fade in" id="delete-tip-<?php echo $tip->id; ?>">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="alert-heading"><?php echo __('Cảnh báo! Bạn chắc chứ?'); ?></h4>
                        </div>
                        <div class="modal-body">
                            <p><?php printf(__('Bạn vừa nhấp vào nút xóa, bạn có chắc chắn muốn tiếp tục xóa lời khuyên "%s" không?'),$tip->title); ?></p>
                            <p>
                                <a class="btn btn-danger" href="<?php echo URL::base() . 'TodayTipManager/deleteTip/' . $tip->id; ?>"><?php echo __('Xóa'); ?></a> <button class="btn" data-dismiss="modal" aria-hidden="true">Đóng</button>
                            </p>
                        </div>
                    </div>
                </td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr class="info">
            <td colspan="7"><?php echo __('Chưa có lời khuyên nào. Vui lòng nhấp vào nút ở trên để thêm.'); ?></td>
        </tr>
    <?php } ?>
    </body>
</table>