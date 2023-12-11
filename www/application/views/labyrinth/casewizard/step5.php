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
<h1><?php echo __('Bước 4. Thêm yếu tố'); ?></h1>
<div>
    <div>
        <ul class="nav nav-pills">
            <li class="<?php if ($templateData['action'] == 'editNode') echo 'active'; ?>"><a
                    href="<?php echo URL::base() . 'labyrinthManager/caseWizard/5/editNode/' . $templateData['map']; ?>">Chỉnh sửa nút
                    </a></li>
            <li class="<?php if ($templateData['action'] == 'addFile') echo 'active'; ?>"><a
                    href="<?php echo URL::base() . 'labyrinthManager/caseWizard/5/addFile/' . $templateData['map']; ?>">Thêm ảnh hoặc tệp tin</a></li>
            <li class="<?php if ($templateData['action'] == 'addQuestion') echo 'active'; ?>"><a
                    href="<?php echo URL::base() . 'labyrinthManager/caseWizard/5/addQuestion/' . $templateData['map']; ?>">Thêm câu hỏi</a></li>
            <li class="<?php if ($templateData['action'] == 'addAvatar') echo 'active'; ?>"><a
                    href="<?php echo URL::base() . 'labyrinthManager/caseWizard/5/addAvatar/' . $templateData['map']; ?>">Thêm ảnh đại diện</a></li>
            <li class="<?php if ($templateData['action'] == 'addCounter') echo 'active'; ?>"><a
                    href="<?php echo URL::base() . 'labyrinthManager/caseWizard/5/addCounter/' . $templateData['map']; ?>">Thêm bộ đếm</a></li>
        </ul>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php if ($templateData['type'] == 'editNode') { ?>
                <div class="span2">
                    <p class="header">Nút:</p>
                    <ul class="nav nav-tabs nav-stacked">
                        <?php if($templateData['nodes'] != null && count($templateData['nodes']) > 0) { ?>
                        <?php foreach ($templateData['nodes'] as $node) { ?>
                            <li>
                                <a href="<?php echo URL::base() . 'labyrinthManager/caseWizard/5/editNode/' . $templateData['map'] . '/' . $node->id ?>"
                                   class="
                            <?php if (isset($templateData['nodeId'])) {
                                       if ($templateData['nodeId'] == $node->id) echo 'selected';
                                   }
                                   ?>
                            "><?php echo $node->title; ?> <?php if ($node->type->name == 'root') echo '[root]'; ?>
                                    (<?php echo $node->id; ?>)</a></li>
                        <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
                <div class="node-editor span10">
                    <?php if (isset($templateData['nodeData'])) {
                        echo $templateData['nodeData'];
                    } else {
                        echo 'Chọn một số nút ở cột bên trái.';
                    } ?>
                </div>
            <?php
            } else {
                echo $templateData['content'];
            } ?>
        </div>
        <div class="controls">
            <a  href="<?php echo URL::base() . 'labyrinthManager/caseWizard/6/createSkin/' . $templateData['map']; ?>"
               style="float:right;" class="btn btn-primary">Bước 6 - Chỉnh sửa ngoại trang</a>
            <a class="btn btn-primary" href="<?php echo URL::base(); ?>" style="float:right;" class="wizard_button">Lưu và quay lại sau</a>
            <a class="btn btn-primary" href="<?php echo URL::base() . 'labyrinthManager/caseWizard/4/' . $templateData['map']; ?>"
               style="float:left;" class="wizard_button">Quay lại bước 4</a>
        </div>
    </div>
</div>
