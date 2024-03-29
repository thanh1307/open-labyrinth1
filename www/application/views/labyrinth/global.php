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
$user = Auth::instance()->get_user();
$uiMode = $user->modeUI;
if (isset($templateData['map'])) { ?>
    <script language="javascript" type="text/javascript" src="<?php echo ScriptVersions::get(URL::base().'scripts/editableselect.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo ScriptVersions::get(URL::base().'scripts/tinymce/js/tinymce/tinymce.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo ScriptVersions::get(URL::base().'scripts/tinyMceInit.js'); ?>"></script>
    <script type="text/javascript">
        var readOnly = <?php echo (isset($templateData['historyShowWarningPopup']) && ($templateData['historyShowWarningPopup'])) ? 1 : 0; ?>;
        tinyMceInit('textarea', readOnly);
    </script>

    <h1><?php echo __('Hệ thống ').'"'.$templateData['map']->name.'"'; ?></h1>

    <form class="form-horizontal" id="globalMapFrom" name="globalMapFrom" method="post" action=<?php echo URL::base().'labyrinthManager/saveGlobal/'.$templateData['map']->id; ?>>

    <input type="submit" class="btn btn-primary btn-large save-details" name="GlobalSubmit" value="<?php echo __('Lưu thay đổi'); ?>" onclick="return checkForm();">

    <fieldset class="fieldset">
        <legend><?php echo __('Thông tin hệ thống'); ?></legend>
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                <td class="details-column"><?php echo __('Số lượng điểm'); ?></td>
                <td class="details-column"><?php echo (count($templateData['map']->nodes) > 0) ? count($templateData['map']->nodes) : '0'; ?></td>
            </tr>
            <tr>
                <td class="details-column"><?php echo __('Số lượng liên kết'); ?></td>
                <td class="details-column"><?php echo $templateData['map']->countLinks();?></td>
            </tr><?php
            $vars = $templateData["map"]->as_array();
            foreach ($vars as $property){
            if (Helper_Controller_Metadata::isMetadataRecord($property)){ ?>
            <tr>
                <?php $view =  Helper_Controller_Metadata::getView($property); ?>
                <td><?php echo $view["label"]?></td>
                <td><?php echo $view["body"]?></td>
            </tr> <?php
            };
            };?>
            </tbody>
        </table>
    </fieldset>

    <fieldset class="fieldset">
        <legend><?php echo __('Chi tiết Hệ thống'); ?></legend>
        <div class="control-group" title="Ghi một đoạn tiêu đề ngắn cho Hệ thống.">
            <label class="control-label" for="mtitle"><?php echo __('Tiêu đề Hệ thống'); ?></label>
            <div class="controls">
                <input name="title" type="text" id="mtitle" class="span6"
                       value="<?php echo $templateData['map']->name; ?>">
            </div>
        </div>

        <div class="control-group" title="Mô tả chi tiết Hệ thống của bạn">
            <label class="control-label" for="mdesc">
                <?php echo __('Miêu tả Hệ thống'); ?></label>
            <div class="controls">
                <textarea name="description" class="span6"
                          id="mdesc"><?php echo $templateData['map']->abstract; ?></textarea>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="keywords"><?php echo __('Từ khóa Hệ thống'); ?></label>
            <div class="controls">
                <input name="keywords" type="text" id="keywords" class="span6"
                       value="<?php echo $templateData['map']->keywords; ?>">
            </div>
        </div><?php
        if (isset($templateData['skins'])) { ?>
        <div class="control-group">
            <label class="control-label" for="skin"><?php echo __('Ngoại trang Hệ thống'); ?></label>
            <div class="controls">
                <select name="skin" id="skin" class="span6"><?php
                    foreach ($templateData['skins'] as $skin) { ?>
                        <option value="<?php echo $skin->id; ?>" <?php if ($skin->id == $templateData['map']->skin_id) echo 'selected'; ?>><?php echo $skin->name; ?></option><?php
                    } ?>
                </select>
            </div>
        </div><?php
        } ?>

        <div class="control-group">
            <label class="control-label"><?php echo __('Gửi báo cáo xAPI trong thời gian thực') ?></label>
            <div class="controls">
                <div class="radio_extended btn-group" style="float:left;">
                    <input autocomplete="off" type="radio" id="send_xapi_statements0" name="send_xapi_statements"
                           value="0" <?php if(!$templateData['map']->send_xapi_statements){ ?> checked <?php } ?> />
                    <label data-class="btn-danger" data-value="no" class="btn" for="send_xapi_statements0">
                        <?php echo __('Không'); ?>
                    </label>

                    <input autocomplete="off" type="radio" id="send_xapi_statements1" name="send_xapi_statements"
                           value="1" <?php if($templateData['map']->send_xapi_statements){ ?> checked <?php } ?> />
                    <label data-class="btn-success" data-value="yes" class="btn" for="send_xapi_statements1">
                        <?php echo __('Có'); ?>
                    </label>
                </div>
            </div>
        </div>

    </fieldset><?php
    $orderIndex=1;
    if ($uiMode == 'advanced') { ?>
    <fieldset class="fieldset">
        <legend><?php echo __('Người dùng hệ thống'); ?></legend><?php
        if (isset($templateData['securities'])) {
            $currentSecurityId = $templateData['map']->security_id; ?>
            <div class="control-group">
                <label class="control-label"><?php echo __('Bảo mật'); ?></label>
                <div class="controls">
                    <select  name="security"><?php
                        foreach ($templateData['securities'] as $security) { ?>
                        <option value="<?php echo $security->id; ?>"<?php if ($security->id == $templateData['map']->security_id) echo ' selected'; ?>><?php echo $security->name; ?></option><?php
                        } ?>
                    </select>
                    <button <?php if ($currentSecurityId != 4) echo 'style="display:none;"'; ?> id="edit_keys" class="btn btn-primary" value="1" name="edit_key">Chỉnh sửa khóa</button>
                </div>
            </div>
        <?php } ?>
        <div class="control-group">
            <label class="control-label">
                <span><?php echo __('Người đóng góp'); ?></span>
                <div class="pull-right">
                    <a class="btn btn-info add-contributor" href=<?php echo URL::base().'labyrinthManager/addContributor/'.$templateData['map']->id; ?>><i class="icon-plus"></i><?php echo __('Thêm'); ?></a>
                </div>
            </label>
            <ul class="contributors-list add-contributor-parent"><?php
                foreach (Arr::get($templateData, 'contributors', array()) as $contributor) { ?>
                <li>
                    <p>
                        <input type="hidden" name="corder_<?php echo $contributor->id; ?>" value="<?php echo $orderIndex; ?>"/>
                        <label><?php echo __('Tên'); ?></label>
                        <input type="text" id="cname_<?php echo $contributor->id; ?>" name="cname_<?php echo $contributor->id; ?>" value="<?php echo $contributor->name; ?>">
                    </p>
                    <p>
                        <label><?php echo __('Tổ chức'); ?></label>
                        <input type="text" name="cnorg_<?php echo $contributor->id; ?>" id="cnorg_<?php echo $contributor->id; ?>" value="<?php echo $contributor->organization; ?>">
                    </p>
                    <p>
                        <label><?php echo __('Vai trò'); ?></label><?php
                        if (isset($templateData['contributor_roles'])) { ?>
                            <select name="role_<?php echo $contributor->id; ?>" id="role_<?php echo $contributor->id; ?>"><?php
                            foreach ($templateData['contributor_roles'] as $role) { ?>
                                <option value="<?php echo $role->id; ?>" <?php if ($role->id == $contributor->role_id) echo 'selected=""'; ?>><?php echo $role->name; ?></option><?php
                            } ?>
                            </select><?php
                        } ?>
                    </p>
                    <p><a href="<?php echo URL::base().'labyrinthManager/deleteContributor/'.$templateData['map']->id.'/'.$contributor->id; ?>" class="btn btn-small btn-danger"><i class="icon-trash"></i></a></p>
                </li><?php $orderIndex++;
                } ?>
            </ul>
        </div>

        <div class="control-group">
            <label class="control-label"><?php echo __('Người sáng tạo'); ?>:</label>
            <div class="controls">
                <select name="creator"><?php
                foreach (Arr::get($templateData, 'creators', array()) as $creators) { ?>
                    <option value="<?php echo $creators->id; ?>" <?php if($templateData['map']->author_id == $creators->id) echo 'selected'; ?>><?php echo $creators->nickname; ?></option><?php
                } ?>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"><?php echo __('Tác giả Hệ thống đã đăng ký'); ?>:</label>
            <div class="controls"><?php
            foreach (Arr::get($templateData, 'regAuthors', array()) as $user) {
                echo $user->nickname.', ';
            } ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"><?php echo __('Nhóm Hệ thống đã đăng ký'); ?></label>
            <div class="controls"><?php
            foreach (Arr::get($templateData, 'groupsOfLearner', array()) as $groupName) {
                echo $groupName.', ';
            } ?>
            </div>
        </div>
    </fieldset><?php
    } ?>

    <fieldset class="fieldset">
        <legend><?php echo __('Chuyển hướng Hệ thống');?> </legend><?php
        if (isset($templateData['linkStyles'])) { ?>
            <div class="control-group">
            <label class="control-label"><?php echo __('Kiểu chức năng liên kết'); ?></label>
            <div class="controls">
                <select name="linkStyle"><?php
                    foreach ($templateData['linkStyles'] as $linkStyle) { ?>
                        <option value="<?php echo $linkStyle->id; ?>" <?php if ($linkStyle->id == $templateData['selectedLinkStyles']) echo 'đã chọn'; ?>><?php echo $linkStyle->name; ?></option><?php
                    } ?>
                </select>
            </div>
            </div><?php
        }
        ?>

        <div class="control-group">
            <label class="control-label"><?php echo __('Cho phép sửa đổi câu trả lời'); ?></label>
            <div class="controls">
                <select name="revisable_answers">
                    <option value="0" <?php echo !$templateData['map']->revisable_answers ? 'selected' : ''?>>Không</option>
                    <option value="1" <?php echo $templateData['map']->revisable_answers ? 'selected' : ''?>>Có</option>
                </select>
            </div>
        </div>

        <?php if (isset($templateData['sections'])) { ?>
            <div class="control-group">
            <label class="control-label"><?php echo __('Chọn trình duyệt'); ?></label>
            <div class=" controls">
                <select name="section">
                    <?php foreach ($templateData['sections'] as $section) { ?>
                    <option value="<?php echo $section->id; ?>" <?php if ($section->id == $templateData['map']->section_id) echo 'đã chọn'; ?>>
                        <?php echo $section->name; ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            </div><?php
        }

        if ($uiMode == 'advanced') { ?>
        <div class="control-group" title="Chọn 'Bật' và xác định vùng cho hệ thống của bạn nếu bạn muốn người học điều hướng nó trong một thời gian nhất định.">
            <label class="control-label"><?php echo __('Tính toán thời gian'); ?></label>
            <div class="controls">
                <label class="radio">
                    <?php echo __('Bật'); ?>
                    <input type="radio" name="timing" id="timing-on"
                           value=1 <?php if ($templateData['map']->timing) echo 'checked=""'; ?>>

                    <div class="control-group">
                        <br />
                        <label class="control-label" for="delta_time_seconds"><?php echo __('Đồng bộ thời gian: seconds'); ?></label>
                        <div class="controls">
                            <input
                                <?php if (!$templateData['map']->timing) echo 'tắt'; ?>
                                name="delta_time_seconds" type="text" class="span1" id="delta_time_seconds"
                                value="<?php if ($templateData['map']->delta_time > 0 and $templateData['map']->timing) echo $templateData['map']->delta_time % 60; ?>" selectBoxOptions="1;5;10;15;20;25;30;35;40;45;50;55;60">
                        </div>
                    </div>

                    <div class="control-group">
                        <br />
                        <label class="control-label" for="delta_time_minutes"><?php echo __('Đồng bộ thời gian: minutes'); ?></label>
                        <div class="controls">
                            <input
                                <?php if (!$templateData['map']->timing) echo 'tắt'; ?>
                                name="delta_time_minutes" type="text" class="span1" id="delta_time_minutes"
                                value="<?php if ($templateData['map']->delta_time > 0 and $templateData['map']->timing) echo floor($templateData['map']->delta_time / 60); ?>" selectBoxOptions="1;5;10;15;20;25;30;35;40;45;50;55;60">
                        </div>
                    </div>

                    <div class="control-group">
                        <br />
                        <label class="control-label" for="reminder_msg"><?php echo __('Tin nhắn nhắc nhở'); ?></label>
                        <div class="controls">
                                <textarea name="reminder_msg" class="span6" <?php if (!$templateData['map']->timing) echo 'tắt'; ?>
                                          id="reminder_msg"><?php if ($templateData['map']->delta_time > 0 and $templateData['map']->timing) echo $templateData['map']->reminder_msg; ?></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <br />
                        <label class="control-label" for="reminder_seconds"><?php echo __('Nhắc nhở: giây'); ?></label>
                        <div class="controls">
                            <input
                                <?php if (!$templateData['map']->timing) echo 'disabled'; ?>
                                name="reminder_seconds" type="text" class="span1" id="reminder_seconds"
                                value="<?php if ($templateData['map']->delta_time > 0 and $templateData['map']->timing) echo $templateData['map']->reminder_time % 60; ?>" selectBoxOptions="1;5;10;15;20;25;30;35;40;45;50;55;60">
                        </div>
                    </div>

                    <div class="control-group">
                        <br />
                        <label class="control-label" for="reminder_minutes"><?php echo __('Nhắc nhở: phút'); ?></label>
                        <div class="controls">
                            <input
                                <?php if (!$templateData['map']->timing) echo 'disabled'; ?>
                                name="reminder_minutes" type="text" class="span1" id="reminder_minutes"
                                value="<?php if ($templateData['map']->delta_time > 0 and $templateData['map']->timing) echo floor($templateData['map']->reminder_time / 60); ?>" selectBoxOptions="1;5;10;15;20;25;30;35;40;45;50;55;60">
                        </div>
                    </div>
                </label>

                <label class="radio">
                    <?php echo __('Tắt'); ?>
                    <input id="timing-off" type="radio" name="timing"
                           value=0 <?php if (!$templateData['map']->timing) echo 'checked=""'; ?>>
                </label>
            </div>
        </div><?php
        } ?>
    </fieldset><?php
    if ($uiMode == 'advanced') { ?>
    <fieldset class="fieldset">
        <legend><?php echo ('Chi tiết diễn đàn hệ thống'); ?></legend>
        <div class="control-group forum-details-container"><?php
            if($templateData['map']->assign_forum_id != null) { ?>
                <div class="control-group">
                <div class="controls">
                    <button submit-url="<?php echo URL::base(); ?>labyrinthManager/unassignForum/<?php echo $templateData['map']->id; ?>" class="btn btn-danger unassign-forum" type="button"><?php echo __('Bỏ chỉ định diễn đàn'); ?></button>
                </div>
                </div><?php
            } else { ?>
                <div class="control-group">
                    <label class="control-label"><?php echo __('Tin nhắn diễn đàn đầu tiên'); ?></label>
                    <div class="controls">
                        <textarea class="mceEditor" name="firstForumMessage" id="firstForumMessage"></textarea>
                    </div>
                </div>
                <div class="control-group">
                <div class="controls">
                    <button submit-url="<?php echo URL::base(); ?>labyrinthManager/addNewForum/<?php echo $templateData['map']->id; ?>" class="btn btn-info" type="button" id="createNewForum" map-id="<?php echo $templateData['map']->id; ?>"><i class="icon-plus"></i><?php echo __('Tạo và chỉ định diễn đàn mới'); ?></button>
                </div>
                </div><?php
            } ?>
        </div>
    </fieldset>
    <fieldset class="fieldset fieldset-verification">
        <legend><?php echo __('Thông tin người đánh giá'); ?></legend><?php
        $verificationArray = array(
            'link_logic' => 'Liên kết logic đã được xác minh',
            'node_cont' => 'Nội dung đã được xác minh',
            'clinical_acc' => 'Độ chính xác lâm sàng đã được xác minh',
            'media_cont' => 'Nội dung truyền thông đã hoàn thành',
            'media_copy' => 'Bản quyền truyền thông đã được xác minh',
            'metadata' => 'Siêu dữ liệu ngữ nghĩa'
        );

        foreach($verificationArray as $key => $value) { ?>
        <div class="control-group">
            <label class="control-label"><?php echo __($value) ?></label>
            <div class="controls">
                <div class="radio_extended btn-group" style="float:left;">
                    <input autocomplete="off" type="radio" id="<?php echo $key; ?>0" name="<?php echo $key; ?>" value="0"<?php
                    if (isset($templateData['verification'][$key])){
                        echo ($templateData['verification'][$key] == null) ? 'checked="checked"' : '';
                    } else {
                        echo 'checked="checked"';
                    } ?>
                    />
                    <label data-class="btn-danger" data-value="no" class="btn" for="<?php echo $key; ?>0"><?php echo __('Không'); ?></label>

                    <input autocomplete="off" type="radio" id="<?php echo $key; ?>1" name="<?php echo $key; ?>" value="1" <?php echo ((isset($templateData['verification'][$key]) && $templateData['verification'][$key]) ? 'checked="checked"' : '') ?>/>
                    <label data-class="btn-success" data-value="yes" class="btn" for="<?php echo $key; ?>1"><?php echo __('Có'); ?></label>
                </div>

                <div class="verification span2 <?php echo ((isset($templateData['verification'][$key]) && $templateData['verification'][$key]) ? '' : 'hide') ?>">
                    <div class="input-append date" data-date="<?php if (isset($templateData['verification'][$key]) && $templateData['verification'][$key]) echo date('m/d/Y',$templateData['verification'][$key]); else echo date('m/d/Y');?>" data-date-format="mm/dd/yyyy">
                        <input name="verification[<?php echo $key; ?>]" style="width:120px;" type="text" value="<?php if (isset($templateData['verification'][$key]) && $templateData['verification'][$key]) echo date('m/d/Y',$templateData['verification'][$key]); else echo date('m/d/Y');?>">
                        <span class="add-on"><i class="icon-th"></i></span>
                    </div>
                </div>
            </div>
        </div><?php
        } ?>

        <div class="control-group">
            <label class="control-label"><?php echo __('Hướng dẫn của giáo viên đã hoàn tất') ?></label>
            <div class="controls">
                <div class="radio_extended btn-group" style="float: left;">
                    <input autocomplete="off" type="radio" id="inst_guide0" name="inst_guide" value="0"
                        <?php if (isset($templateData['verification']['inst_guide'])){
                            echo ($templateData['verification']['inst_guide'] == 0) ? 'checked="checked"' : '';
                        } else {
                            echo 'checked="checked"';
                        }
                        ?>
                        />
                    <label data-class="btn-danger" data-value="no" class="btn" for="inst_guide0"><?php echo __('Không'); ?></label>

                    <input autocomplete="off" type="radio" id="inst_guide1" name="inst_guide" value="1" <?php echo ((isset($templateData['verification']['inst_guide']) && $templateData['verification']['inst_guide']) ? 'checked="checked"' : '') ?>/>
                    <label data-class="btn-success" data-value="yes" class="btn" for="inst_guide1"><?php echo __('Có'); ?></label>
                </div>

                <div class="verification span2 <?php echo ((isset($templateData['verification']['inst_guide']) && $templateData['verification']['inst_guide']) ? '' : 'hide') ?>">
                    <select id="file_id" name="inst_guide_select">
                        <?php if(isset($templateData['files'])) { ?>
                            <?php foreach($templateData['files'] as $file) { ?>
                                <option value="<?php echo $file->id; ?>" <?php if( isset($templateData['verification']['inst_guide']) && $file->id == $templateData['verification']['inst_guide']) echo 'selected'; ?>><?php echo $file->name; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label"><?php echo __('Ghi chú của tác giả'); ?>:</label>
            <div class="controls">
                <textarea name="devnotes"><?php echo $templateData['map']->dev_notes; ?></textarea>
            </div>
        </div>
    </fieldset><?php
        echo Helper_Controller_Metadata::displayEditor($templateData["map"], "map");
    } ?>

    <div class="pull-right">
        <input type="submit" class="btn btn-primary btn-large" name="GlobalSubmit" value="<?php echo __('Lưu thay đổi'); ?>" onclick="return checkForm();">
    </div>
</form>


<li class="add-contributor-bl" style="display: none;">
    <p>
        <input type="hidden" name="contributor[order][<?php echo $orderIndex; ?>]">
        <label><?php echo __('Tên'); ?></label>
        <input type="text" name="contributor[name][]">
    </p>
    <p>
        <label><?php echo __('Nguồn gốc'); ?></label>
        <input type="text" name="contributor[org][]">
    </p>
    <p>
        <label><?php echo __('Role'); ?></label><?php
        if (isset($templateData['contributor_roles'])) { ?>
            <select name="contributor[role][]"><?php
            foreach ($templateData['contributor_roles'] as $role) { ?>
                <option value="<?php echo $role->id; ?>" <?php if ($role->id == 13) echo 'selected'; ?>><?php echo $role->name; ?></option><?php
            } ?>
            </select><?php
        } ?>
    </p>
    <p><a class="btn btn-small btn-danger del-contributor-js"><i class="icon-trash"></i></a></p>
</li>

<script>
    createEditableSelect(document.getElementById('delta_time_seconds'));
    createEditableSelect(document.getElementById('delta_time_minutes'));
    createEditableSelect(document.getElementById('reminder_seconds'));
    createEditableSelect(document.getElementById('reminder_minutes'));

    function checkForm (){
        if(document.getElementById('delta_time_seconds').value == '' && document.getElementById('delta_time_minutes').value == ''
            && document.getElementById('timing-on').checked ) {
            alert('Vui lòng nhập khoảng thời gian của bạn!');
            return false;
        }
        if(document.getElementById('delta_time_seconds').value == 0 && document.getElementById('delta_time_minutes').value == 0
            && document.getElementById('timing-on').checked ) {
            alert('Vui lòng nhập khoảng thời gian của bạn!');
            return false;
        }
        if(document.getElementById('reminder_seconds').value == 0 && document.getElementById('reminder_minutes').value == 0
            && document.getElementById('timing-on').checked && document.getElementById('reminder_msg').value != '' ) {
            alert('Vui lòng nhập khoảng thời gian cho tin nhắn nhắc nhở!');
            return false;
        }
        if(document.getElementById('reminder_seconds').value == '' && document.getElementById('reminder_minutes').value == ''
            && document.getElementById('timing-on').checked && document.getElementById('reminder_msg').value != '' ) {
            alert('Vui lòng nhập khoảng thời gian cho tin nhắn nhắc nhở!');
            return false;
        }
        if(( parseInt(document.getElementById('reminder_seconds').value) + parseInt(document.getElementById('reminder_minutes').value) * 60)
            >= ( parseInt(document.getElementById('delta_time_seconds').value) + parseInt(document.getElementById('delta_time_minutes').value) * 60)
            && document.getElementById('timing-on').checked ) {
            alert('Khoảng thời gian nhắc nhở phải nhỏ hơn khoảng thời gian!');
            return false;
        }
    }

</script><?php
} ?>
