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
if (isset($templateData['map'])) { ?>
    <table width="100%" height="100%" cellpadding='6'>
        <tr>
            <td valign="top" bgcolor="#bbbbcb">
                <h4><?php echo __('Chỉnh sửa Hệ thống') . ' "' . $templateData['map']->name . '"'; ?></h4>
                <p><?php echo __('bạn có thể truy cập tất cả các tính năng chỉnh sửa của Hệ thống này từ trang này.'); ?></p>
                <table width="100%" border="0" cellspacing="0" cellpadding="4" bgcolor="#ffffff">
                    <tr>
                        <td align="left">
                            <table width="100%" border="0">
                                <tr>
                                    <td width="25%" align="left" nowrap="">
                                        <p><a href="<?php echo URL::base().'labyrinthManager/global/'.$templateData['map']->id; ?>"><img src="<?php echo URL::base(); ?>images/OL_global_wee.gif" alt="global" align="absmiddle" border="0">&nbsp;&nbsp;<strong><?php echo __('toàn cục'); ?></strong></a></p>
                                        <p><a href="<?php echo URL::base().'nodeManager/index/'.$templateData['map']->id; ?>"><img src="<?php echo URL::base(); ?>images/OL_nodes_wee.gif" alt="nodes" align="absmiddle" border="0">&nbsp;&nbsp;<strong><?php echo __('nút'); ?></strong></a></p>
                                        <p><a href="<?php echo URL::base().'nodeManager/grid/'.$templateData['map']->id; ?>"><img src="<?php echo URL::base(); ?>images/OL_nodegrid_wee.gif" alt="nodegrid" align="absmiddle" border="0">&nbsp;&nbsp;<strong><?php echo __('nút lưới'); ?></strong></a></p>
                                        <p><a href="<?php echo URL::base().'nodeManager/sections/'.$templateData['map']->id; ?>"><img src="<?php echo URL::base(); ?>images/OL_section_wee.gif" alt="sections" align="absmiddle" border="0">&nbsp;&nbsp;<strong><?php echo __('nút phần'); ?></strong></a></p>
                                        <p><a href="<?php echo URL::base().'linkManager/index/'.$templateData['map']->id; ?>"><img src="<?php echo URL::base(); ?>images/OL_links_wee.gif" alt="links" align="absmiddle" border="0">&nbsp;&nbsp;<strong><?php echo __('liên kết'); ?></strong></a></p>
                                        <p><a href="<?php echo URL::base().'chatManager/index/'.$templateData['map']->id; ?>"><img src="<?php echo URL::base(); ?>images/OL_chats_wee.gif" alt="chats" align="absmiddle" border="0">&nbsp;&nbsp;<strong><?php echo __('nhắn tin'); ?></strong></a></p>
                                    </td>
                                    <td width="25%" align="left" nowrap="">
                                        <p><a href="<?php echo URL::base().'renderLabyrinth/index/'.$templateData['map']->id; ?>" target="_blank"><img src="<?php echo URL::base(); ?>images/OL_preview_wee.gif" alt="preview" align="absmiddle" border="0">&nbsp;&nbsp;<strong><?php echo __('xem trước'); ?></strong></a></p>
                                        <p><a href="<?php echo URL::base().'visualManager/index/'.$templateData['map']->id; ?>" target="_blank"><img src="<?php echo URL::base(); ?>images/OL_visualeditor_wee.gif" alt="visual editor" align="absmiddle" border="0">&nbsp;&nbsp;<strong><?php echo __('biên tập trực quan'); ?></strong></a></p>
                                        <p><a href="<?php echo URL::base().'skinManager/index/'.$templateData['map']->id; ?>"><img src="<?php echo URL::base(); ?>images/OL_visualeditor_wee.gif" alt="visual editor" align="absmiddle" border="0">&nbsp;&nbsp;<strong><?php echo __('trang phục'); ?></strong></a></p>
                                        <p><a href="<?php echo URL::base().'feedbackManager/index/'.$templateData['map']->id; ?>" target="_blank"></a><a href="<?php echo URL::base().'feedbackManager/index/'.$templateData['map']->id; ?>"><img src="<?php echo URL::base(); ?>images/OL_feedback_wee.gif" alt="feedback" align="absmiddle" border="0">&nbsp;&nbsp;<strong><?php echo __('nhận xét'); ?></strong></a></p>
                                        <p><a href="<?php echo URL::base().'questionManager/index/'.$templateData['map']->id; ?>"><img src="<?php echo URL::base(); ?>images/OL_question_wee.gif" alt="questions" align="absmiddle" border="0">&nbsp;&nbsp;<strong><?php echo __('câu hỏi'); ?></strong></a></p>
                                        <p><a href="<?php echo URL::base().'avatarManager/index/'.$templateData['map']->id; ?>"><img src="<?php echo URL::base(); ?>images/OL_avatar_wee.gif" alt="avatars" align="absmiddle" border="0">&nbsp;&nbsp;<strong><?php echo __('ảnh đại diện'); ?></strong></a></p>
                                    </td>
                                    <td width="25%" align="left" nowrap="">
                                        <p><a href="<?php echo URL::base().'fileManager/index/'.$templateData['map']->id; ?>"><img src="<?php echo URL::base(); ?>images/OL_files_wee.gif" alt="files" align="absmiddle" border="0">&nbsp;&nbsp;<strong><?php echo __('tệp tin'); ?></strong></a></p>
                                        <p><a href="<?php echo URL::base().'counterManager/index/'.$templateData['map']->id; ?>"><img src="<?php echo URL::base(); ?>images/OL_counter_wee.gif" alt="counters" align="absmiddle" border="0">&nbsp;&nbsp;<strong><?php echo __('bộ đếm'); ?></strong></a></p>
                                        <p><a href="<?php echo URL::base().'counterManager/grid/'.$templateData['map']->id; ?>"><img src="<?php echo URL::base(); ?>images/OL_countergrid_wee.gif" alt="countergrid" align="absmiddle" border="0">&nbsp;&nbsp;<strong><?php echo __('bộ đếm lưới'); ?></strong></a></p>
                                        <p><a href="<?php echo URL::base().'elementManager/index/'.$templateData['map']->id; ?>"><img src="<?php echo URL::base(); ?>images/OL_element_wee.gif" alt="elements" align="absmiddle" border="0">&nbsp;&nbsp;<strong><?php echo __('thành phần'); ?></strong></a></p>
                                        <p><a href="<?php echo URL::base().'clusterManager/index/'.$templateData['map']->id; ?>"><img src="<?php echo URL::base(); ?>images/OL_cluster_wee.gif" alt="clusters" align="absmiddle" border="0">&nbsp;&nbsp;<strong><?php echo __('cụm'); ?></strong></a></p>
                                    </td>
                                    <td width="25%" align="left" nowrap="">
                                        <p><a href="<?php echo URL::base().'reportManager/index/'.$templateData['map']->id; ?>"><img src="<?php echo URL::base(); ?>images/OL_report_wee.gif" alt="session reports" align="absmiddle" border="0">&nbsp;&nbsp;<strong><?php echo __('phiên báo cáo'); ?></strong></a></p>
                                        <p><a href="<?php echo URL::base().'mapUserManager/index/'.$templateData['map']->id; ?>"><img src="<?php echo URL::base(); ?>images/OL_users_wee.gif" alt="users" align="absmiddle" border="0">&nbsp;&nbsp;<strong><?php echo __('người dùng'); ?></strong></a></p>
                                        <p><a href="<?php echo URL::base().'exportImportManager/index/'.$templateData['map']->id; ?>"><img src="<?php echo URL::base(); ?>images/OL_export_wee.gif" alt="export" align="absmiddle" border="0">&nbsp;&nbsp;<strong><?php echo __('xuất'); ?></strong></a></p>
                                        <p><a href="#"><img src="<?php echo URL::base(); ?>images/OL_duplicate_wee.gif" alt="duplicate" align="absmiddle" border="0">&nbsp;&nbsp;<strong><?php echo __('duplicate'); ?></strong></a></p>
                                        <p><a href=<?php echo URL::base().'labyrinthManager/disableMap/'.$templateData['map']->id; ?>><img src="<?php echo URL::base(); ?>images/OL_delete_wee.gif" alt="delete" align="absmiddle" border="0">&nbsp;&nbsp;<strong><?php echo __('xóa'); ?></strong></a></p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
<?php } ?>
