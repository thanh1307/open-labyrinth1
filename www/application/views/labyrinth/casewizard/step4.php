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
<script language="javascript" type="text/javascript"
        src="<?php echo URL::base(); ?>scripts/tinymce/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        var sendURL = '<?php echo URL::base(); ?>labyrinthManager/caseWizard/3/updateVisualEditor/<?php echo $templateData['action']; ?>';
        var bufferCopy = '<?php echo URL::base(); ?>visualManager/bufferCopy';
        var bufferPaste = '<?php echo URL::base(); ?>visualManager/bufferPaste';
        var mapId = <?php echo $templateData['action']; ?>;
        var mapJSON = <?php echo (isset($templateData['mapJSON']) && strlen($templateData['mapJSON']) > 0) ? $templateData['mapJSON'] : 'null'; ?>;
        var mapType = <?php if(isset($templateData['mapModel'])) echo $templateData['mapModel']->type_id; ?>;
    </script>
<h1><?php echo __('Bước 4. Thêm câu chuyện của bạn'); ?></h1>
<div>
    <div class="wizard_body" style="position: static; ">
        <div class="instractions">
            <p class="header">Hướng dẫn:</p>

            <p class="li">Đây là chỉnh sửa cấp cao. Chỉ cần lấy những điểm chính của câu chuyện của bạn xuống một ý tưởng cho mỗi
                 nút.</p>
        </div>
        <div class="visual-editor" style="height: auto;">
            <div class="block" style="position: relative;" id="canvasContainer">
            <div id="ve_actionButton" class="canvas-action-buttons-container">
                <p><button type="button" class="round-btn" id="fullScreen" data-toggle="tooltip" data-original-title="Full&nbsp;screen" data-placement="right"><i class="ve-icon-fullscreen"></i></button></p>
                <p><button type="button" class="round-btn update" id="update" data-toggle="tooltip" data-original-title="Save" data-placement="right"><i class="ve-icon-save"></i></button></p>
                <p class="text">Build</p>
                <p><button type="button" class="round-btn" id="addNode" data-toggle="tooltip" data-original-title="<div style='width: 50px'>Add node</div>" data-placement="right"><i class="ve-icon-add"></i></button></p>
                <p><button type="button" class="round-btn" id="veTemplate" data-toggle="tooltip" data-original-title="<div style='width: 90px'>Add mini template</div>" data-placement="right"><i class="ve-icon-template"></i></button></p>
                <p class="left"><button type="button" class="round-btn disabled" id="undo" data-toggle="tooltip" data-original-title="Undo" data-placement="left"><i class="ve-icon-undo"></i></button></p>
                <p><button type="button" class="round-btn disabled" id="redo" data-toggle="tooltip" data-original-title="Redo" data-placement="right"><i class="ve-icon-redo"></i></button></p>
                <p class="text">Move</p>
                <p><button type="button" class="round-btn active" id="vePan" data-toggle="tooltip" data-original-title="<div style='width: 50px'>Grab+Pan</div>" data-placement="right"><i class="ve-icon-pan"></i></button></p>
                <p><button type="button" class="round-btn" id="veSelect" data-toggle="tooltip" data-original-title="Select" data-placement="right"><i class="ve-icon-select"></i></button></p>
                <p><button type="button" class="round-btn" id="zoomIn" data-toggle="tooltip" data-original-title="Zoom&nbsp;In" data-placement="right"><i class="ve-icon-zoom-in"></i></button></p>
                <p><button type="button" class="round-btn" id="zoomOut" data-toggle="tooltip" data-original-title="Zoom&nbsp;out" data-placement="right"><i class="ve-icon-zoom-out"></i></button></p>
                <p><button type="button" class="round-btn" id="settings" data-toggle="tooltip" data-original-title="Settings" data-placement="right"><i class="ve-icon-settings"></i></button></p>
            </div>
            
            <div id="ve_additionalActionButton" style="position: absolute; top: 5px; left: 85px;display: none;">
                <p><button type="button" class="round-btn" id="copySNodesBtn" data-toggle="tooltip" data-original-title="Copy" data-placement="right"><i style="color:white;" class="ve-icon-copy"></i></button></p>
                <p><button type="button" class="round-btn" id="pasteSNodesBtn" data-toggle="tooltip" data-original-title="Paste" data-placement="right"><i class="ve-icon-paste"></i></button></p>
                <p><button type="button" class="round-btn" id="colorSNodesBtn" data-toggle="tooltip" data-original-title="Change&nbsp;color" data-placement="right"><i class="ve-icon-color"></i></button></p>
                <p><button type="button" class="round-btn" id="sectionsBtn" data-toggle="tooltip" data-original-title="Sections" data-placement="right"><i class="ve-icon-section"></i></button></p>
                <p><button type="button" class="round-btn delete" id="deleteSNodesBtn" data-toggle="tooltip" data-original-title="Delete&nbsp;selected" data-placement="right"><i class="ve-icon-delete"></i></button></p>
            </div>

            <div style="position: absolute;left:50%;z-index: 1500;" id="ve_message" class="alert alert-success hide"><span id="ve_message_text">Message</span></div>
            <div style="position: absolute; right: 0; top: 0;border-right: 1px solid #cccccc; border-top: 1px solid #cccccc;"><canvas id="canvasPreview" width="200" height="200" style="background-color: #EEEEEE" tabindex='2'>Không được hỗ trợ</canvas></div>
            <canvas id="canvas" width="100" height="200" style="background-color: #cccccc" tabindex='1'>Không được hỗ trợ</canvas>
            <div class="visual-editor-right-panel hide" id="veRightPanel">
                <div class="block visual-editor-right-panel-tabs">
                    <ul class="nav nav-tabs">
                        <li><a href="#actions" data-toggle="tab">Hành động</a></li>
                        <li class="active"><a href="#veNodeContent" data-toggle="tab">Nội dung Node</a></li>
                    </ul>
                    <p style="position:absolute; top:4px; right:4px;" id="nodeID_container" class="label label-info">NodeID - <span id="nodeID_label"></span></p>
                </div>
                <div id="tab-content-scrollable" class="tab-content">
                    <div class="tab-pane" id="actions">
                        <div class="block" align="center">
                            <button id="veNodeRootBtn" type="button" class="btn" data-toggle="button">Đặt làm gốc</button>
                            <button id="veDeleteNodeBtn" type="button" class="btn btn-danger">Xóa nút</button>
                        </div>
                        <legend>Màu nền</legend>
                        <div class="block" align="center">
                            <input type="text" id="colorpickerInput" value="" />
                            <div class="child-block" id="colopickerContainer"></div>
                        </div>
                    </div>
                    <div class="tab-pane active" id="veNodeContent">
                        <div style="margin-left: 0">
                            <div class="control-group block">
                                <label for="nodetitle" class="control-label" style="text-align: left;"><strong>Tiêu đề</strong></label>
                                <div class="controls">
                                    <input type="text" id="nodetitle" value=""/>
                                </div>
                            </div>
                            <div class="control-group block">
                                <label for="nodecontent" class="control-label" style="text-align: left;"><strong>Nội dung nút</strong></label>
                                <div class="controls block">
                                    <textarea cols='20' class="mceEditor" id="nodecontent" rows='10' style="width: 100%;"></textarea>
                                </div>
                            </div>
                            <div class="control-group block">
                                <label for="nodesupport" class="control-label" style="text-align: left;"><strong>Thông tin hỗ trợ</strong></label>
                                <div class="controls block">
                                    <textarea cols='20' class="mceEditor" id="nodesupport" rows='10' style="width: 100%;"></textarea>
                                </div>
                            </div>
                            <div class="control-group block">
                                <label for="nodesupportkeywords" class="control-label" style="text-align: left;"><strong>Từ khóa thông tin hỗ trợ</strong></label>
                                <div class="controls block">
                                    <input type="text" id="nodesupportkeywords" value="" />
                                </div>
                            </div>
                            <div class="control-group block">
                                <label for="show_info"
                                       class="control-label"><strong><?php echo __('Hiển thị nút "Thông tin hỗ trợ" ở cuối nút'); ?></strong></label>

                                <div class="controls block">
                                    <input id="show_info" name="show_info" type="checkbox"/>
                                </div>
                            </div>
                            <div class="control-group block">
                                <label for="annotation"
                                       class="control-label"><strong><?php echo __('Chú thích'); ?></strong></label>
                                <div class="controls block">
                                    <textarea class="mceEditorLite" name="annotation" id="annotation"></textarea>
                                </div>
                            </div>
                            <div>
                                <?php if (isset($templateData['counters']) and count($templateData['counters']) > 0) { ?>
                                    <div>
                                        <div class="control-group">
                                            <?php
                                            $countersData = '';
                                            foreach ($templateData['counters'] as $counter) {
                                                $countersData .= "{id: '" . $counter->id . "', func: '#nodecounter_function_" . $counter->id . "', show: '#nodecounter_show_" . $counter->id . "'}, ";
                                                ?>
                                                <?php echo $counter->name; ?>
                                                <label for="nodesupportkeywords" class="control-label" style="text-align: left;"><strong>Chức năng đếm</strong></label>
                                                <div class="controls">
                                                    <input type="text" id="nodecounter_function_<?php echo $counter->id; ?>" value="" />
                                                </div>

                                                <label for="nodesupportkeywords" class="control-label" style="text-align: left;"><strong>Xuất hiện trên nút</strong></label>
                                                <div class="controls">
                                                    <input type="checkbox" id="nodecounter_show_<?php echo $counter->id; ?>" value="1" />
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div id="counters" data="[<?php
                                    if (strlen($countersData) > 2) {
                                        echo substr($countersData, 0, strlen($countersData) - 2);
                                    }
                                    ?>]"></div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="row-fluid block">
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label"><strong>Xác suất thoát nút</strong></label>
                                        <div class="controls" id="exitNodeOptions">
                                            <label class="radio">On<input name="exit" type="radio" value="1"></label>
                                            <label class="radio">Off<input name="exit" type="radio" value="0" checked=""></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label"><strong>Phong cách chức năng liên kết</strong></label>

                                        <div class="controls" id="linkStyleOptions">
                                            <?php if (isset($templateData['linkStyles'])) { ?>
                                                <?php foreach ($templateData['linkStyles'] as $linkStyle) { ?>
                                                    <label class="radio"><input type="radio" name="style" value="<?php echo $linkStyle->id ?>"><?php echo __($linkStyle->name); ?></label>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid block">
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label"><strong>Mức độ ưu tiên của nút</strong></label>

                                        <div class="controls" id="nodePriorities">
                                            <?php if (isset($templateData['priorities'])) { ?>
                                                <?php foreach ($templateData['priorities'] as $priority) { ?>
                                                    <label class="radio"><input type="radio" name="priority" value="<?php echo $priority->id ?>"><?php echo $priority->name; ?></label>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label"><strong>Ngăn chặn truy cập lại</strong></label>

                                        <div class="controls" id="nodeUndoLinks">
                                            <label class="radio">Hiển thị<input name="undo" type="radio" value="1"></label>
                                            <label class="radio">Ẩn<input name="undo" type="radio" value="0" checked=""></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><strong>Liên kết đến cuối và báo cáo từ nút này</strong></label>

                                <div class="controls" id="nodeEndAndReport">
                                    <label class="radio">Tắt (mặc định)<input name="end" type="radio" value="0" checked=""></label>
                                    <label class="radio">Bật<input name="end" type="radio" value="1"></label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="footer block">
                    <div class="btn-group">
                        <a href="javascript:void(0)" class="btn btn-info" id="veRightPanelSaveBtn">Lưu thay đổi và đóng</a>
                        <a href="javascript:void(0)" class="btn veRightPanelCloseBtn">Đóng bảng điều khiển</a>
                    </div>
                </div>
            </div>

            <div class="visual-editor-select-right-panel hide" id="veSectionPanel">
                <div class="visual-editor-right-panel-tabs">&nbsp;</div>
                <legend style="margin-left: 5px">Phần</legend>
                <div class="control-group block" style="margin-left: 5px">
                    <label for="nodetitle" class="control-label" style="text-align: left;"><strong>Chọn phần:</strong></label>
                    <div class="controls">
                        <select id="sectionsNodesSelect"></select>
                    </div>

                    <div id="sectionSettings" class="hide">
                        <label for="nodetitle" class="control-label" style="text-align: left;"><strong>Tên:</strong></label>
                        <div class="controls">
                            <input type="text" id="sectionName" style="margin-bottom: 0"/>
                            <div class="btn-group">
                                <button id="removeSection" class="btn btn-danger"><i class="icon-trash"></i></button>
                                <button id="addNodeToSection" class="btn btn-success"><i class="icon-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div id="sectionNodeContainer"></div>
                </div>

                <div class="footer block">
                    <div class="btn-group">
                        <a href="javascript:void(0)" class="btn btn-success" id="veMakeSectionBtn">Tạo phần</a>
                        <a href="javascript:void(0)" class="btn btn-info" id="veSectionSaveBtn">Cập nhật phần</a>
                        <a href="javascript:void(0)" class="btn" id="veSectionClosePanelBtn">Đóng bảng điều khiển</a>
                    </div>
                </div>
            </div>

            <div class="modal block hide" id="veMakeSectionBox">
                <div class="modal-header block">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3>Phần mới</h3>
                </div>

                <div class="modal-body block">
                    <div class="control-group block">
                        <label for="nodetitle" class="control-label" style="text-align: left;"><strong>Tên phần:</strong></label>
                        <div class="controls">
                            <input type="text" id="sectionNameInput" name="sectionNameInput" value=""/>
                        </div>
                    </div>
                    <div class="control-group block" id="sectionNodesContainer">
                        <label for="nodetitle" class="control-label" style="text-align: left;"><strong>Nút 1</strong></label>
                        <div class="controls">
                            <select><option>0</option><option>1</option></select>
                        </div>
                        <label for="nodetitle" class="control-label" style="text-align: left;"><strong>Nút 1</strong></label>
                        <div class="controls">
                            <select><option>0</option><option>1</option></select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer block">
                    <a href="javascript:void(0);" class="btn" id="veMakeNewSectionBtn">Lưu</a>
                    <a href="javascript:void(0);" class="btn" data-dismiss="modal">Đóng</a>
                </div>
            </div>

            <div class="visual-editor-select-right-panel hide" id="veSelectRightPanel">
                <div class="visual-editor-right-panel-tabs">&nbsp;</div>
                <legend>Background color</legend>
                <div class="block" align="center">
                    <input type="hidden" id="veSelectColorInput"/>
                    <div id="veSelectColorContainer"></div>
                </div>
                
                <div class="footer block">
                    <div class="btn-group">
                        <a href="javascript:void(0)" class="btn btn-success" id="veSelectRightPanelOnlySaveBtn">Lưu thay đổi</a>
                        <a href="javascript:void(0)" class="btn btn-info" id="veSelectRightPanelSaveBtn">Lưu thay đổi và đóng</a>
                        <a href="javascript:void(0)" class="btn" id="veSelectRightPanelCloseBtn">Đóng bảng điều khiển</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal hide block" id="veSettings">
            <div class="modal-header block">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Cài đặt</h3>
            </div>

            <div class="modal-body block">
                <div class="control-group block">
                    <label for="nodetitle" class="control-label" style="text-align: left;"><strong>Thời gian tự động lưu (giây, tối thiểu 10 giây)</strong></label>
                    <div class="controls">
                        <input type="text" id="autosaveTime" name="autosaveTime" value="">
                    </div>
                </div>
            </div>

            <div class="modal-footer block">
                <a href="javascript:void(0);" class="btn" id="veSaveSettings">Lưu</a>
                <a href="javascript:void(0);" class="btn" data-dismiss="modal">Đóng</a>
            </div>
        </div>

        <div class="modal hide block" id="veRightPanel_unsaveddata">
            <div class="modal-header block">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Dữ liệu chưa được lưu</h3>
            </div>

            <div class="modal-body block">
                <p>Bạn có một số dữ liệu chưa được lưu trong trình chỉnh sửa bảng điều khiển.</p>
            </div>

            <div class="modal-footer block">
                <a href="javascript:void(0);" class="btn" id="veRightPanel_unsaveddata_close">Vẫn đóng bảng điều khiển</a>
                <a href="javascript:void(0);" class="btn" data-dismiss="modal">Không đóng bảng điều khiển</a>
            </div>
        </div>
        
        <div class="modal hide block" id="veRightPanel_unsaveddataChange">
            <div class="modal-header block">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Dữ liệu chưa được lưu</h3>
            </div>

            <div class="modal-body block">
                <p>Bạn có một số dữ liệu chưa được lưu trong trình chỉnh sửa bảng điều khiển.</p>
            </div>

            <div class="modal-footer block">
                <a href="javascript:void(0);" class="btn" id="veRightPanel_unsaveddataChange_close">Vẫn thay đổi nút</a>
                <a href="javascript:void(0);" class="btn" data-dismiss="modal">Không thay đổi nút</a>
            </div>
        </div>

        <div class="modal hide block" id="visual_editor_template">
            <div class="modal-header block">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Chèn mẫu trước</h3>
            </div>

            <div class="modal-body block">
                <div class="block" align="center">
                    <div class="block" data-toggle="buttons-radio" id="veTypeContainer">
                        <button type="button" class="btn" value="linear">Tuyến tính</button>
                        <button type="button" class="btn" value="branched">Phân nhánh</button>
                        <button type="button" class="btn" value="dandelion">Dandelion</button>
                    </div>
                </div>

                <div class="block" align="center">
                    <div class="block" data-toggle="buttons-radio" id="veCountContainer">
                        <button type="button" class="btn" value="6">6</button>
                        <button type="button" class="btn" value="12">12</button>
                        <button type="button" class="btn" value="18">18</button>
                        <button type="button" class="btn" value="24">24</button>
                        <button type="button" class="btn" value="Custom" id="veCustom">Tùy chỉnh</button>
                        <input type="text" style="margin-top: 10px; width: 40px;" id="veCount" disabled/>
                    </div>
                </div>
            </div>

            <div class="modal-footer block">
                <a href="javascript:void(0);" class="btn" data-dismiss="modal">Đóng</a>
                <a href="javascript:void(0);" class="btn" id="veTemplateSaveBtn">Lưu</a>
            </div>
        </div>

        <div class="modal hide block" id="visual_editor_dandelion">
            <div class="modal-header block">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Dandelion</h3>
            </div>

            <div class="modal-body block">
                <div class="block" align="center">
                    <div class="block" data-toggle="buttons-radio" id="veDandelionCountContainer">
                        <button type="button" class="btn" value="6">6</button>
                        <button type="button" class="btn" value="12">12</button>
                        <button type="button" class="btn" value="18">18</button>
                        <button type="button" class="btn" value="24">24</button>
                        <button type="button" class="btn" value="Custom" id="veDandelionCustom">Tùy chỉnh</button>
                        <input type="text" style="margin-top: 10px; width: 40px;" id="veDandelionCount" disabled/>
                    </div>
                </div>
            </div>

            <div class="modal-footer block">
                <a href="javascript:void(0);" class="btn" data-dismiss="modal">Đóng</a>
                <a href="javascript:void(0);" class="btn" id="veDandelionSaveBtn">Lưu</a>
            </div>
        </div>

        <div class="modal hide block" id="visual_editor_background_color">
            <div class="modal-header block">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Màu nền</h3>
            </div>

            <div class="modal-body block">
                <div class="block" align="center">
                    <div class="defined-color-picker">
                        <div style="background-color: #FFFFFF;"></div>
                        <div style="background-color: #CCCCCC;"></div>
                        <div style="background-color: #000000;"></div>
                    </div>
                </div>
            </div>

            <div class="modal-footer block">
                <a href="javascript:void(0);" class="btn" data-dismiss="modal">Đóng</a>
                <a href="javascript:void(0);" class="btn" id="veBgColorSaveBtn">Lưu</a>
            </div>
        </div>

        <div class="modal hide block" id="visual_editor_link">
            <div class="modal-header block">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Quản lý liên kết</h3>
            </div>

            <div class="modal-body block" align="center">
                <div class="block" data-toggle="buttons-radio" id="linkTypes">
                    <button type="button" class="btn" value="direct">Trực tiếp</button>
                    <button type="button" class="btn" value="back">Quay lại</button>
                    <button type="button" class="btn" value="dual">Song song</button>
                    <button type="button" class="btn btn-danger" value="delete">Xóa</button>
                </div>
                <br/>
                <div class="block" align="left">
                    <form class="form-horizontal">
                    <div class="control-group block">
                        <label class="control-label"><?php echo __('Nhãn liên kết'); ?></label>
                        <div class="controls block">
                            <input type="text" id="labelText"/>
                        </div>
                    </div>
                    <div class="control-group block">
                        <label class="control-label" for="mimage"><?php echo __('Liên kết ảnh'); ?></label>
                        <div class="controls block">
                            <?php if (isset($templateData['images']) and count($templateData['images']) > 0) { ?>
                                <select name="linkImage" id="mimage">
                                    <option value="0" <?php if (isset($templateData['editLink']) and $templateData['editLink']->image_id == NULL) echo 'selected=""'; ?>>Không có ảnh</option>
                                    <?php foreach ($templateData['images'] as $image) { ?>
                                        <option value="<?php echo $image->id; ?>" <?php if (isset($templateData['editLink']) and $image->id == $templateData['editLink']->image_id) echo 'selected=""'; ?>><?php echo $image->name; ?> (<?php echo $image->id; ?>)</option>
                                    <?php } ?>
                                </select>
                            <?php } else { ?>
                                <select name="linkImage" id="mimage">
                                    <option value="0" select="">Không có ảnh</option>
                                </select>
                            <?php } ?>
                    </div>
                </div>
                    </form>
                </div>
            </div>

            <div class="modal-footer block">
                <a href="javascript:void(0);" class="btn" data-dismiss="modal" aria-hidden="true">Đóng</a>
                <a href="javascript:void(0);" class="btn" id="linkApply">Áp dụng</a>
            </div>
        </div>

        <div class="modal hide alert alert-block alert-error block" id="visual_editor_delete">
            <div class="modal-header block">
                <a class="close" data-dismiss="alert" href="javascript:void(0);">&times;</a>
                <h3 class="deleteModalHeaderNode">Xóa nút này</h3>
                <h3 class="deleteModalHeaderNodes">Xóa nút này</h3>
            </div>

            <div class="modal-body block">
                <p class="deleteModalContentNode">Bạn vừa nhấp vào nút xóa, bạn có chắc chắn muốn tiếp tục xóa nút này không?</p>
                <p class="deleteModalContentNodes">Bạn vừa nhấp vào nút xóa, bạn có chắc chắn muốn tiếp tục xóa nút này không?</p>
                <a href="javascript:void(0);" class="btn btn-danger" id="deleteNode">Xóa</a>
                <a href="javascript:void(0);" class="btn" data-dismiss="modal" aria-hidden="true">Đóng</a>
            </div>
        </div>

        <div class="modal hide block" id="visual_editor_set_root">
            <div class="modal-header block">
                <a class="close" data-dismiss="alert" href="javascript:void(0);">&times;</a>
                <h3>Đặt làm gốc</h3>
            </div>

            <div class="modal-body block">
                <p>Bạn vừa nhấp vào nút đặt làm nút gốc, bạn có chắc chắn muốn tiếp tục đặt nút này làm nút gốc không?</p>
                <a href="javascript:void(0);" class="btn btn-primary" id="setAsRootNodeBtn">Đặt</a>
                <a href="javascript:void(0);" class="btn" data-dismiss="modal" aria-hidden="true">Đóng</a>
            </div>
        </div>
    </div>

        <div class="modal hide block" id="leaveBox">
            <div class="modal-header block">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="closeLeaveBox">&times;</button>
                <h3>Dữ liệu chưa được lưu</h3>
            </div>

            <div class="modal-body block" align="center">
                <p>Bạn chưa lưu dữ liệu</p>
            </div>

            <div class="modal-footer block">
                <a href="javascript:void(0);" class="btn" id="uploadUnsaved">Lưu</a>
                <a href="javascript:void(0);" class="btn" id="leave">Thoát mà không lưu</a>
            </div>
        </div>
    <div class="wizard-next-buttons">
        <a href="<?php echo URL::base().'labyrinthManager/caseWizard/5/editNode/'.$templateData['action']; ?>"
           style="float:right;" class="wizard_button btn btn-primary">Bước 5 - Thêm các yếu tố khác</a>
        <a href="<?php echo URL::base(); ?>" style="float:right;" class="wizard_button btn btn-primary">Lưu và quay lại sau</a>
    </div>
</div>
</div>

<script type="text/javascript" src="<?php echo ScriptVersions::get(URL::base().'scripts/visualeditor/utils.js'); ?>"></script>
<script type="text/javascript" src="<?php echo ScriptVersions::get(URL::base().'scripts/visualeditor/colorModal.js'); ?>"></script>
<script type="text/javascript" src="<?php echo ScriptVersions::get(URL::base().'scripts/visualeditor/base64v1_0.js'); ?>"></script>
<script type="text/javascript" src="<?php echo ScriptVersions::get(URL::base().'scripts/visualeditor/mouse.js'); ?>"></script>
<script type="text/javascript" src="<?php echo ScriptVersions::get(URL::base().'scripts/visualeditor/transform.js'); ?>"></script>
<script type="text/javascript" src="<?php echo ScriptVersions::get(URL::base().'scripts/visualeditor/node.js'); ?>"></script>
<script type="text/javascript" src="<?php echo ScriptVersions::get(URL::base().'scripts/visualeditor/link.js'); ?>"></script>
<script type="text/javascript" src="<?php echo ScriptVersions::get(URL::base().'scripts/visualeditor/linkConnector.js'); ?>"></script>
<script type="text/javascript" src="<?php echo ScriptVersions::get(URL::base().'scripts/visualeditor/linkModal.js'); ?>"></script>
<script type="text/javascript" src="<?php echo ScriptVersions::get(URL::base().'scripts/visualeditor/deleteModal.js'); ?>"></script>
<script type="text/javascript" src="<?php echo ScriptVersions::get(URL::base().'scripts/visualeditor/nodeModal.js'); ?>"></script>
<script type="text/javascript" src="<?php echo ScriptVersions::get(URL::base().'scripts/visualeditor/selector.js'); ?>"></script>
<script type="text/javascript" src="<?php echo ScriptVersions::get(URL::base().'scripts/visualeditor/rightPanel.js'); ?>"></script>
<script type="text/javascript" src="<?php echo ScriptVersions::get(URL::base().'scripts/visualeditor/selectRightPanel.js'); ?>"></script>
<script type="text/javascript" src="<?php echo ScriptVersions::get(URL::base().'scripts/visualeditor/preview.js'); ?>"></script>
<script type="text/javascript" src="<?php echo ScriptVersions::get(URL::base().'scripts/visualeditor/history.js'); ?>"></script>
<script type="text/javascript" src="<?php echo ScriptVersions::get(URL::base().'scripts/visualeditor/section.js'); ?>"></script>
<script type="text/javascript" src="<?php echo ScriptVersions::get(URL::base().'scripts/visualeditor/sectionNode.js'); ?>"></script>
<script type="text/javascript" src="<?php echo ScriptVersions::get(URL::base().'scripts/visualeditor/visualEditor.js'); ?>"></script>
<script type="text/javascript" src="<?php echo ScriptVersions::get(URL::base().'scripts/farbtastic/farbtastic.js'); ?>"></script>

<script type="text/javascript" src="<?php echo ScriptVersions::get(URL::base().'scripts/visualeditor/application.js'); ?>"></script>