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
<h1><?php echo __('Bước 1. Thêm thông tin chung'); ?></h1>

<form id="step2_form" method="post" class="form-horizontal" action="<?php echo URL::base().'labyrinthManager/caseWizard/2/addNewLabyrinth'.(isset($templateData['map']) ? '/'.$templateData['map']->id : ''); ?>">
    <fieldset class="fieldset">
        <div class="control-group">
            <label for="mtitle" class="control-label"><?php echo 'Tiêu đề';?></label>
            <div class="controls">
                <input type="text" value="<?php if(isset($templateData['map'])) echo $templateData['map']->name; ?>" class="span6" id="mtitle" name="title"/>
            </div>
        </div>
        <div class="control-group">
            <label for="mdesc" class="control-label"><?php echo 'Miêu tả';?></label>
            <div class="controls">
                <textarea id="mdesc" rows="5" cols="40" name="description"><?php if(isset($templateData['map'])) echo $templateData['map']->abstract; ?></textarea>
            </div>
        </div>
        <div class="control-group">
            <label for="keywords" class="control-label"><?php echo 'Từ khóa';?></label>
            <div class="controls">
                <input type="text" value="<?php if(isset($templateData['map'])) echo $templateData['map']->keywords; ?>" class="span6" id="keywords" name="keywords">
            </div>
        </div>
        <div class="control-group" title="Select 'On' and define a delta for your labyrinth if you want your learners to
        navigate it in a certain time.">
            <label class="control-label"><?php echo __('Tính giờ'); ?></label>
            <div class="controls">
                <label class="radio">
                    <?php echo __('Bật'); ?>
                    <input type="radio" <?php if(isset($templateData['map']) && $templateData['map']->timing) echo 'checked'; ?>  name="timing" id="timing-on" value=1>
                    <div class="control-group">
                        <label class="control-label" for="delta_time"><?php echo __('Đồng bộ thời gian'); ?></label>
                        <div class="controls">
                            <input name="delta_time" type="text" class="span1" id="delta_time" value="<?php if(isset($templateData['map'])) echo $templateData['map']->delta_time; ?>">
                            <span class="help-inline"><?php echo __('giây'); ?></span>
                        </div>
                    </div>
                </label>
                <label class="radio">
                    <?php echo __('Tắt'); ?>
                    <input <?php if(isset($templateData['map']) && !$templateData['map']->timing) echo 'checked'; ?> id="timing-off" type="radio" name="timing" value=0>
                </label>
            </div>
        </div>
        <?php if (isset($templateData['securities'])) { ?>
            <div class="control-group">
                <label class="control-label"><?php echo __('Bảo mật'); ?></label>

                <div class="controls">
                    <?php foreach ($templateData['securities'] as $security) { ?>
                        <label class="radio">
                            <input <?php if(isset($templateData['map']) && $templateData['map']->security_id == $security->id) echo 'checked'; ?> type="radio"
                                   name="security"
                                   value=<?php echo $security->id; ?>>
                            <?php echo $security->name; ?>
                        </label>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <?php if (isset($templateData['sections'])) { ?>
            <div class="control-group">
                <label class="control-label"><?php echo __('Điều hướng'); ?></label>
                <div class=" controls">
                    <?php foreach ($templateData['sections'] as $section) { ?>
                        <label class="radio">
                            <input <?php if(isset($templateData['map']) && $templateData['map']->section_id == $section->id) echo 'checked'; ?> type="radio" name="section" value=<?php echo $section->id; ?>/>
                            <?php echo $section->name; ?>
                        </label>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </fieldset>
</form>
<div>
    <a id="step2_w_button" href="javascript:void(0)" style="float:right;" class="btn btn-primary wizard_button">Bước 2 - Kiểu VP</a>
    <a href="<?php echo URL::base(); ?>" style="float:right;" class="btn btn-primary wizard_button">Lưu & Quay lại sau</a>
</div>

