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
$userType = Auth::instance()->get_user()->type->name;
?>
<script>
    var updateNotificationURL       = '<?php echo URL::base(); ?>dforumManager/ajaxUpdateNotification',
        updateTopicNotificationURL  = '<?php echo URL::base(); ?>dforumManager/ajaxUpdateTopicNotification';
</script>

<div class="page-header">
    <div class="pull-right"><?php
        if ($userType != 'learner' AND $userType != 'reviewer') { ?>
        <a class="btn btn-primary" href="<?php echo URL::base().'dforumManager/addForum'; ?>"><i class="icon-plus-sign"></i> <?php echo __('Thêm mới diễn đàn'); ?></a><?php
        } ?>
    </div>
    <h1><?php echo __('Diễn đàn'); ?></h1>
</div>


<table id="mainForum" class="table table-striped table-bordered">
    <colgroup>
        <col style="width: 5%" />
        <col style="width: 50%" />
        <col style="width: 15%" />
        <col style="width: 15%" />
        <col style="width: 15%" />
    </colgroup>
    <tr>
        <th></th>
        <th>Diễn đàn</th>
        <th>Số thành viên</th>
        <th>Số bình luận</th>
        <th>Bình luận mới nhất</th>
    </tr><?php
    if(isset($templateData['forums']) and count($templateData['forums']) > 0) {
        $typeSort = ($templateData['typeSort'] == 0) ? '1' : '0'; ?>
        <tr>
            <th></th>
            <th><a href="<?php echo URL::base(); ?>dforumManager/index/1/<?php echo $typeSort; ?>" >Forum name
                   <div class="pull-right"><i class="icon-chevron-<?php if($templateData['typeSort'] == 0 && $templateData['sortBy'] == 1 ) echo 'xuống';  else  echo 'lên'; ?> icon-black"></i></div></th>
            <th><a href="<?php echo URL::base(); ?>dforumManager/index/2/<?php echo $typeSort; ?>" >Users
                   <div class="pull-right"><i class="icon-chevron-<?php if($templateData['typeSort'] == 0 && $templateData['sortBy'] == 2 ) echo 'xuống';  else  echo 'lên'; ?> icon-black"></i></div></th>
            <th><a href="<?php echo URL::base(); ?>dforumManager/index/3/<?php echo $typeSort; ?>" >Comments
                   <div class="pull-right"><i class="icon-chevron-<?php if($templateData['typeSort'] == 0 && $templateData['sortBy'] == 3 ) echo 'xuống';  else  echo 'lên'; ?> icon-black"></i></div></th>
            <th><a href="<?php echo URL::base(); ?>dforumManager/index/4/<?php echo $typeSort; ?>" >Last
                   <div class="pull-right"><i class="icon-chevron-<?php if($templateData['typeSort'] == 0 && $templateData['sortBy'] == 4 ) echo 'xuống';  else  echo 'lên'; ?> icon-black"></i></div></th>
        </tr><?php
        foreach($templateData['forums'] as $forum) { ?>
            <tr>
                <td> <?php if(count($forum['topics']) > 0) { ?> <a href="javascript:void(0);" id = "read" class="showMoreTopics" style="text-decoration: none" attr="<?php echo $forum['id']; ?>">
                        <i id="icon-<?php echo $forum['id']; ?>" class="icon-chevron-right"></i></a><?php } ?>
                </td>
                <td>
                    <div class="pull-right">
                        <a href="<?php echo URL::base().'dtopicManager/addTopic/'.$forum['id']; ?>" rel="tooltip" title="Thêm chủ đề mới trên diễn đàn" class="btn btn-small btn-info">
                            <i class="icon-plus-sign"></i><?php echo __('Thêm chủ đề'); ?>
                        </a><?php
                        if ($userType == 'superuser' OR $userType == 'Director' OR Auth::instance()->get_user()->id == $forum['author_id']) { ?>
                        <a href="<?php echo URL::base().'dforumManager/editForum/'.$forum['id']; ?>" rel="tooltip" title="Chỉnh sửa diễn đàn này" class="btn btn-small btn-info">
                            <i class="icon-edit"></i> <?php echo __('Chỉnh sửa'); ?>
                        </a><?php
                            if ($userType != 'Director') { ?>
                            <a data-toggle="modal" href="javascript:void(0);" data-target="#delete-labyrinth-<?php echo $forum['id'];  ?>" rel="tooltip" title="Xóa diễn đàn này" class="btn btn-small btn-danger">
                                <i class="icon-trash"></i><?php echo __('Xóa diễn đàn'); ?>
                            </a><?php
                            } ?>
                        <div class="modal hide alert alert-block alert-error fade in" id="delete-labyrinth-<?php echo $forum['id'];  ?>">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="alert-heading"><?php echo __('Cảnh báo! Bạn chắc chứ?'); ?></h4>
                            </div>
                            <div class="modal-body">
                                <p><?php echo __('Bạn vừa nhấp vào nút xóa, bạn có chắc chắn muốn tiếp tục xóa Diễn đàn này khỏi hệ thống không?'); ?></p>
                                <p>
                                    <a class="btn btn-danger" href="<?php echo URL::base() . 'dforumManager/deleteForum/' . $forum['id']; ?>"><?php echo __('Xóa diễn đàn'); ?></a>
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Đóng</button>
                                </p>
                            </div>
                        </div><?php
                        } else { ?>
                            <a href="javascript:void(0);" class="btn btn-small" data-toggle="modal" data-target="#forum-settings-<?php echo $forum['id']; ?>">Cài đặt</a>
                            <div class="modal hide" id="forum-settings-<?php echo $forum['id']; ?>">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h3><?php echo __('Cài đặt'); ?></h3>
                                </div>
                                <div class="modal-body">
                                    <input type="checkbox" id="forum-notification-checkbox-<?php echo $forum['id']; ?>" <?php if(isset($templateData['userForumsInfo']) && isset($templateData['userForumsInfo'][$forum['id']]) && $templateData['userForumsInfo'][$forum['id']]->is_notificate == 1) echo 'checked="checked"'; ?>/> Gửi thông báo
                                </div>
                                <div class="modal-footer">
                                    <img src="<?php echo URL::base(); ?>images/loading.gif" class="hide" id="sent-forum-notification-loader-<?php echo $forum['id']; ?>" width="20px"/>
                                    <button class="btn sent-notification-forum-save-btn" forumId="<?php echo $forum['id']; ?>"><?php echo __('Lưu'); ?></button>
                                    <button class="btn" data-dismiss="modal" aria-hidden="true" id="settings-forum-close-btn-<?php echo $forum['id']; ?>"><?php echo __('Hủy'); ?></button>
                                </div>
                            </div><?php
                        } ?>
                    </div>

                    <a href="<?php if ($forum['status'] != 2 && $forum['status'] != 0 ) echo URL::base().'dforumManager/viewForum/' . $forum['id']; ?>"> <h4><?php echo $forum['name'];?></h4></a>
                        <?php if ($forum['status'] == 0) {?>
                            <span class="label label-important"><?php echo 'Không hoạt động' ?></span>
                        <?php } elseif ($forum['status'] == 2) {?>
                            <span class="label label-important"><?php echo 'Đóng' ?></span>
                        <?php } elseif ($forum['status'] == 3) {?>
                            <span class="label label-warning"><?php echo 'Lưu trữ' ?></span>
                        <?php } ?>
                    <p>
                        <a rel="tooltip" title="Tác giả" class="label label-info" href="<?php echo URL::base().'usermanager/viewUser/' . $forum['author_id']; ?>"><?php echo $forum['author_name']; ?></a><br/>
                        <span class="label label-info"><?php echo $forum['date']; ?></span>
                    </p>
                </td>
                <td><?php echo $forum['users_count'];?> người dùng</td>
                <td><?php echo $forum['messages_count'];?> bình luận</td>
                <td>
                    <p>
                        <a rel="tooltip" title="Tác giả" class="label label-info" href="<?php echo URL::base().'usermanager/viewUser/' . $forum['message_id']; ?>"><?php echo $forum['message_nickname']; ?></a>
                        <br/>
                        <span class="label label-info"><?php echo $forum['message_date']; ?></span>
                    </p>
                </td>
            </tr><?php
            if (count($forum['topics']) > 0 ) { ?>
                <tr class="showTopic-id-<?php echo $forum['id']; ?>" style="display: none;">
                    <th></th>
                    <th>Chủ đề(<?php echo count($forum['topics']); ?>)</th>
                    <th>Số thành viên</th>
                    <th>Số bình luận</th>
                    <th>Bình luận mới nhất</th>
                </tr><?php
                foreach($forum['topics'] as $topic) { ?>
                    <tr class="showTopic-id-<?php echo $forum['id']; ?>" style="display: none;">
                        <td></td>
                        <td>
                            <div class="pull-right">
                            <?php if ($userType == 'superuser' OR $userType == 'Director' || Auth::instance()->get_user()->id == $topic['author_id']) { ?>
                                <a href="<?php echo URL::base() . 'dtopicManager/editTopic/' . $forum['id'] . '/' . $topic['id']; ?>" rel="tooltip" title="Chỉnh sửa chủ đề này" class="btn btn-small btn-info"><i class="icon-edit"></i> <?php echo __('Chỉnh sửa'); ?></a>
                                <a data-toggle="modal" href="javascript:void(0);" data-target="#delete-labyrinth-<?php echo $topic['id'];  ?>" rel="tooltip" title="Xóa chủ đề này" class="btn btn-small btn-danger"><i class="icon-trash"></i> <?php echo __('Xóa'); ?></a>

                                <div class="modal hide alert alert-block alert-error fade in" id="delete-labyrinth-<?php echo $topic['id'];  ?>">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="alert-heading"><?php echo __('Cảnh báo! Bạn chắc chứ?'); ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <p><?php echo __('Bạn vừa nhấp vào nút xóa, bạn có chắc chắn muốn tiếp tục xóa Chủ đề này khỏi hệ thống không?'); ?></p>
                                        <p>
                                            <a class="btn btn-danger" href="<?php echo URL::base() . 'dtopicManager/deleteTopic/' . $forum['id'] . '/' . $topic['id'] ?>"><?php echo __('Xóa'); ?></a> <button class="btn" data-dismiss="modal" aria-hidden="true">Đóng</button>
                                        </p>
                                    </div>
                                </div>

                            <?php } else { ?>
                                <a href="javascript:void(0);" class="btn btn-small" data-toggle="modal" data-target="#forum-topic-settings-<?php echo $topic['id']; ?>">Cài đặt</a>
                                <div class="modal hide" id="forum-topic-settings-<?php echo $topic['id']; ?>">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h3><?php echo __('Cài đặt'); ?></h3>
                                    </div>
                                    <div class="modal-body">
                                        <input type="checkbox" id="forum-topic-notification-checkbox-<?php echo $topic['id']; ?>" <?php if(isset($templateData['userTopicsInfo']) && isset($templateData['userTopicsInfo'][$topic['id']]) && $templateData['userTopicsInfo'][$topic['id']]->is_notificate == 1) echo 'checked="checked"'; ?>/> Gửi thông báo
                                    </div>
                                    <div class="modal-footer">
                                        <img src="<?php echo URL::base(); ?>images/loading.gif" class="hide" id="sent-forum-topic-notification-loader-<?php echo $topic['id']; ?>" width="20px"/>
                                        <button class="btn sent-notification-forum-topic-save-btn" forumTopicId="<?php echo $topic['id']; ?>"><?php echo __('Lưu'); ?></button>
                                        <button class="btn" data-dismiss="modal" aria-hidden="true" id="settings-forum-topic-close-btn-<?php echo $topic['id']; ?>"><?php echo __('Hủy'); ?></button>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>

                            <a href="<?php if ($topic['status'] != 2 && $topic['status'] != 0 ) echo URL::base().'dtopicManager/viewTopic/' . $topic['id']; ?>"> <h5><?php echo $topic['name'];?></h5></a>

                            <?php if ($topic['status'] == 0) {?>
                                <span class="label label-important"><?php echo 'Không hoạt động' ?></span>
                            <?php } elseif ($topic['status'] == 2) {?>
                                <span class="label label-important"><?php echo 'Đóng' ?></span>
                            <?php } elseif ($topic['status'] == 3) {?>
                                <span class="label label-warning"><?php echo 'Lưu trữ' ?></span>
                            <?php } ?>

                            <p>
                                <a rel="tooltip" title="Author" class="label label-info" href="<?php echo URL::base().'usermanager/viewUser/' . $topic['author_id']; ?>"><?php echo $topic['author_name']; ?></a><br/>
                                <span class="label label-info"><?php echo $topic['date']; ?></span>
                            </p>
                        </td>
                        <td><?php echo $topic['users_count'];?> người dùng</td>
                        <td><?php echo $topic['messages_count'];?> bình luận</td>
                        <td>
                            <p>
                                <a rel="tooltip" title="Tác giả" class="label label-info" href="<?php echo URL::base().'usermanager/viewUser/' . $topic['message_id']; ?>"><?php echo $topic['message_nickname']; ?></a>
                                <br/>
                                <span class="label label-info"><?php echo $topic['message_date']; ?></span>
                            </p>
                        </td>
                    </tr><?php
                }
            }
        }
    } else { ?>
    <tr class="info">
        <td colspan="5">Không có diễn đàn. Bạn có thể thêm bằng cách nhấp vào nút ở trên.</td>
    </tr><?php
    } ?>
</table>

<script src="<?php echo ScriptVersions::get(URL::base().'scripts/dforum.js'); ?>"></script>


