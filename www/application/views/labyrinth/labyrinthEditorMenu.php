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
if (isset($templateData['map'])) {
    $id_map = $templateData['map']->id;
    $user = Auth::instance()->get_user();
    if ($user) { ?>
    <div class="well" style="padding: 8px 0;">
        <ul class="nav nav-list">
            <li class="nav-header">HỆ THỐNG</li>
            <li class="top">
                <a href="<?php echo URL::base().'renderLabyrinth/index/'.$id_map; ?>" target="_blank">
                    <i class="icon-play icon-white"></i> <?php echo __('Phát'); ?>
                </a>
                <div class="pull-right arrow"></div>
            </li>
            <li><a href="<?php echo URL::base().'labyrinthManager/global/'.$id_map; ?>"><i class="icon-edit"></i> <?php echo __('Chi tiết'); ?></a></li>
            <?php if ($user->modeUI == 'advanced') { ?>
            <li><a data-toggle="modal" href="#" data-target="#delete-labyrinth"><i class="icon-trash"></i> <?php echo __('Xóa'); ?></a></li>
            <?php } ?>
            <li class="nav-header">Bố cục chính</li>
            <li><a href="<?php echo URL::base().'visualManager/index/'.$id_map; ?>"><i class="icon-eye-open"></i> <?php echo __('Trình chỉnh sửa trực quan'); ?></a></li>
            <li><a href="<?php echo URL::base().'nodeManager/index/'.$id_map; ?>"><i class="icon-circle-blank"></i> <?php echo __('Nút'); ?></a></li>
            <?php if ($user->modeUI == 'advanced') { ?>
            <li><a href="<?php echo URL::base().'nodeManager/grid/'.$id_map.'/1'; ?>"><i class="icon-th"></i> <?php echo __('Mạng lưới nút'); ?></a></li>
            <?php } ?>
            <li><a href="<?php echo URL::base().'linkManager/index/'.$id_map; ?>"><i class="icon-link"></i> <?php echo __('Liên kết'); ?></a></li>

            <li class="nav-header">Tùy chọn phụ</li>
            <li><a href="<?php echo URL::base().'nodeManager/sections/'.$id_map; ?>"><i class="icon-th-list"></i> <?php echo __('Phần'); ?></a></li>
            <?php if ($user->modeUI == 'advanced') { ?>
            <li><a href="<?php echo URL::base().'chatManager/index/'.$id_map; ?>"><i class="icon-comments-alt"></i> <?php echo __('Nhắn tin'); ?></a></li>
            <?php } ?>
            <li><a href="<?php echo URL::base().'questionManager/index/'.$id_map; ?>"><i class="icon-question-sign"></i> <?php echo __('Câu hỏi'); ?></a></li>
            <li><a href="<?php echo URL::base().'avatarManager/index/'.$id_map; ?>"><i class="icon-user"></i> <?php echo __('Ảnh đại diện'); ?></a></li>
            <li><a href="<?php echo URL::base().'counterManager/index/'.$id_map; ?>"><i class="icon-dashboard"></i> <?php echo __('Bộ đếm'); ?></a></li>
            <li><a href="<?php echo URL::base().'counterManager/grid/'.$id_map; ?>"><i class="icon-th-large"></i> <?php echo __('Mạng lưới đếm'); ?></a></li>
            <?php if ($user->modeUI == 'advanced') { ?>
            <li><a href="<?php echo URL::base().'visualdisplaymanager/index/'.$id_map; ?>"><i class="icon-eye-open icon-white"></i> <?php echo __('Hiển thị số lượt xem'); ?></a><div class="pull-right arrow"></div></li>
            <li><a href="<?php echo URL::base().'counterManager/rules/'.$id_map; ?>"><i class="icon-check"></i> <?php echo __('Quy tắc'); ?></a></li>
            <li><a href="<?php echo URL::base().'popupManager/index/'.$id_map; ?>"><i class="icon-envelope"></i> <?php echo __('Tin nhắn bật lên'); ?></a></li>
            <li><a href="<?php echo URL::base().'elementManager/index/'.$id_map; ?>"><i class="icon-stethoscope"></i> <?php echo __('Yếu tố'); ?></a></li>
            <li><a href="<?php echo URL::base().'clusterManager/index/'.$id_map; ?>"><i class="icon-tags"></i> <?php echo __('Cụm'); ?></a></li>
            <li><a href="<?php echo URL::base().'patient/labyrinth/'.$id_map; ?>"><i class="icon-user"></i> <?php echo __('Bộ'); ?></a></li>
            <?php } ?>
            <li class="nav-header">Thiết kế trường hợp</li>
            <?php if ($user->modeUI == 'advanced') { ?>
            <li><a href="<?php echo URL::base().'feedbackManager/index/'.$id_map; ?>"><i class="icon-comment"></i> <?php echo __('Phản hồi'); ?></a></li>
            <li><a href="<?php echo URL::base().'skinManager/index/'.$id_map; ?>"><i class="icon-book"></i> <?php echo __('Ngoại trang'); ?></a></li>
            <?php } ?>
            <li><a href="<?php echo URL::base().'fileManager/index/'.$id_map; ?>"><i class="icon-file"></i> <?php echo __('Tệp tin'); ?></a></li>
            <li class="nav-header">Điều khiển</li>
            <li><a href="<?php echo URL::base().'mapUserManager/index/'.$id_map; ?>"><i class="icon-user"></i> <?php echo __('Người dùng và nhóm'); ?></a></li>
            <li><a href="<?php echo URL::base().'reportManager/index/'.$id_map; ?>"><i class="icon-calendar"></i> <?php echo __('Phiên'); ?></a></li>
            <?php if ($user->modeUI == 'advanced') { ?>
            <li class="nav-header">Yếu tố toàn cục</li>
            <li><a href="<?php echo URL::base().'fileManager/globalFiles/'.$id_map; ?>"><i class="icon-file"></i> <?php echo __('Tệp tin toàn cục'); ?></a></li>
            <li><a href="<?php echo URL::base().'avatarManager/globalAvatars/'.$id_map; ?>"><i class="icon-user"></i> <?php echo __('Ảnh đại diện toàn cục'); ?></a></li>
            <li><a href="<?php echo URL::base().'questionManager/globalQuestions/'.$id_map; ?>"><i class="icon-question-sign"></i> <?php echo __('Câu hỏi toàn cục'); ?></a></li>
            <?php } ?>
        </ul>
    </div><?php
    } ?>

    <div class="modal hide fade" id="developer-notes">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Ghi chú của nhà phát triển hệ thống</h3>
        </div>
        <div class="modal-body">
            <p>&nbsp;</p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Đóng</button>
            <a href="#" class="btn btn-primary">Lưu thay đổi</a>
        </div>
    </div>
    <div class="modal hide alert alert-block alert-error fade in" id="delete-labyrinth">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="alert-heading"><?php echo __('Cảnh báo! Bạn chắc chứ?'); ?></h4>
        </div>
        <div class="modal-body">
            <p><?php echo __('Bạn vừa nhấp vào nút xóa, bạn có chắc chắn muốn tiếp tục xóa hệ thống này khỏi hệ thống mở không?'); ?></p>
            <p>
                <a class="btn btn-danger" href="<?php echo URL::base().'labyrinthManager/disableMap/'.$id_map; ?>"><?php echo __('Xóa hệ thống'); ?></a>
                <button class="btn" data-dismiss="modal" aria-hidden="true">Đóng</button>
            </p>
        </div>
    </div>
    <div class="modal hide fade in" id="readonly-notice">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="alert-heading"><?php echo __('Bạn chắc chứ?'); ?></h4>
        </div>
        <div class="modal-body">
            <p><?php echo __('Bạn đang truy cập trang mà tác giả khác đang làm việc, bạn có thể truy cập trang đó với quyền "Chỉ đọc".'); ?></p>
            <p>
                <a id="readonlyEnter" class="btn btn-primary" href="javascript:void(0);"><?php echo __('Truy cập với quyền "Chỉ đọc"'); ?></a>
                <button class="btn btn-primary" id="discard">Loại bỏ</button>
                <button class="btn" data-dismiss="modal" aria-hidden="true">Đóng</button>
            </p>
        </div>
    </div>

    <div class="modal hide fade" id="discardWarning">
        <div class="modal-header">
            <h4 class="alert-heading">Superuser đã loại bỏ bạn</h4>
        </div>
        <button class="btn btn-primary" id="discardReload">Tải lại</button>
    </div><?php
}; ?>