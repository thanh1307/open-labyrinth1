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

<h4><?php echo __('Bước 5. Chỉnh sửa ngoại trang'); ?></h4>
<div>
    <div>
        <ul class="nav nav-pills">
            <li class="<?php if ($templateData['action'] == 'createSkin') echo 'active'; ?>"><a href="<?php echo URL::base() . 'labyrinthManager/caseWizard/6/createSkin/' . $templateData['map']->id; ?>" >Tạo trang phục mới</a></li>
            <li class="<?php if ($templateData['action'] == 'listSkins') echo 'active'; ?>"><a href="<?php echo URL::base() . 'labyrinthManager/caseWizard/6/listSkins/' . $templateData['map']->id . '/' . $templateData['map']->skin_id; ?>" >Chọn trang phục từ danh sách có sẵn</a></li>
            <li class="<?php if ($templateData['action'] == 'uploadSkin') echo 'active'; ?>"><a href="<?php echo URL::base() . 'labyrinthManager/caseWizard/6/uploadSkin/' . $templateData['map']->id; ?>" >Tải lên trang phục mới</a></li>
        </ul>
    </div>
    <div class="wizard_body">
        <?php
        if ($templateData['action'] == 'createSkin') {
            if ($templateData['result'] == 'done') {
                ?>
                <div>
                Việc tạo giao diện mới đã hoàn tất thành công. Nhấp vào "Lưu và hoàn tất"
                </div>
            <?php } else { ?>
                <div>
                    Nhấp vào <a style="text-decoration: underline;" href="<?php echo URL::base() . 'labyrinthManager/caseWizard/6/createNewSkin/' . $templateData['map']->id; ?>">đây</a> để tạo ngoại hình mới
                </div>
                <?php
            }
        } else {
            echo $templateData['content'];
        }
        ?>
    </div>
    <div>
        <a href="<?php echo URL::base(); ?>" style="float:right;" class="btn btn-primary">Lưu và hoàn thành</a>
        <a href="<?php echo URL::base(); ?>" style="float:right;" class="btn btn-primary">Lưu và quay lại sau</a>
        <a href="<?php echo URL::base() . 'labyrinthManager/caseWizard/5/editNode/' . $templateData['map']->id; ?>" class="btn btn-primary">Quay lại bước 5</a>
    </div>
</div>

