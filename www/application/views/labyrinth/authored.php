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
$user           = Auth::instance()->get_user();
$userId         = 0;
$userType       = 0;
$authorRight    = Arr::get($templateData, 'authorRight', array());
if ($user) {
    $userId     = $user->id;
    $userType   = $user->type_id;
} ?>

<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"/>

<div class="page-header">
    <div class="pull-right">
        <div class="btn-group">
            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                <i class="icon-plus-sign icon-white"></i>Tạo hệ thống<span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="<?php echo URL::base().'labyrinthManager/caseWizard'; ?>"><?php echo __('Sáng tạo từng bước'); ?></a></li>
                <li><a href="<?php echo URL::base().'labyrinthManager/addManual'; ?>"><?php echo __('Tự sáng tạo'); ?></a></li>
                <li><a href="<?php echo URL::base().'#'; ?>"><?php echo __('Trùng lặp hiện có'); ?></a></li>
            </ul>
        </div>
    </div><?php
    if (isset($templateData['maps'])) { ?>

    <h1><?php echo __('Hệ thống của tôi'); ?></h1>
</div>

<table class="table table-striped table-bordered dataTable" id="my-labyrinths">
    <colgroup>
        <col style="width: 5%"/>
        <col style="width: 50%"/>
        <col style="width: 20%"/>
        <col style="width: 25%"/>
    </colgroup>
    <thead>
    <tr>
        <th><?php echo __('ID'); ?></th>
        <th><?php echo __('Tiêu đề'); ?></th>
        <th><?php echo __('Người đóng góp'); ?></th>
        <th><?php echo __('Hành động'); ?></th>
    </tr>
    </thead>
    <tbody><?php
    foreach ($templateData['maps'] as $map) { ?>
        <tr>
            <td><?php echo $map->id; ?></td>
            <td><a <?php if ($map->author_id == $userId OR $userType == 4) echo 'href='.URL::base().'labyrinthManager/info/'.$map->id; ?>><?php echo $map->name; ?></a></td>
            <td><?php
                if (count($map->contributors)) {
                    $contributors = array();
                    foreach ($map->contributors as $contributor) {
                        $contributors[] = '<a href="#" rel="tooltip" title="'.ucwords($contributor->role->name).'">'.$contributor->name . '</a>';
                    }
                    echo implode(', ', $contributors);
                } ?>
            </td>
            <td class="center">
                <div class="btn-group">
                    <a class="btn btn-success" href="<?php echo URL::base().'renderLabyrinth/index/'.$map->id; ?>">
                        <i class="icon-play icon-white"></i>
                        <span class="visible-desktop">Phát</span>
                    </a><?php
                    if (isset($templateData['bookmarks'][$map->id])) { ?>
                    <a class="btn btn-warning" href="<?php echo URL::base().'renderLabyrinth/resume/'.$map->id; ?>">
                        <i class="icon-refresh icon-white"></i>Phát tiếp
                    </a><?php
                    }
                    if ($map->author_id == $userId OR $userType == 4 OR Arr::get($authorRight, $map->id, false)) { ?>
                    <a class="btn btn-info" href="<?php echo URL::base().'labyrinthManager/global/'.$map->id; ?>">
                        <i class="icon-edit icon-white"></i> Chỉnh sửa
                    </a><?php
                    } ?>
                    <a class="btn" data-toggle="modal" data-target="#duplicate_labyrinth<?php echo $map->id; ?>" href="#">
                        <i class="icon-th icon-white"></i>Sao chép
                    </a>
                </div>
                <div class="modal hide fade in" id="duplicate_labyrinth<?php echo $map->id; ?>">
                    <div class="modal-header block">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4><?php echo __('Bạn có thật sự muốn sao chép trường hợp này?'); ?></h4>
                    </div>
                    <div class="modal-body">
                        <p><?php printf(__('Bạn vừa nhấp vào nút sao chép, bạn có chắc chắn muốn tiếp tục sao chép hệ thống "%s" không?'),$map->name); ?></p>
                        <p>
                            <a class="btn confirm-link" href="<?php echo URL::base().'authoredLabyrinth/duplicate/'.$map->id; ?>"><?php echo __('Sao chép hệ thống'); ?></a>
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Đóng</button>
                        </p>
                    </div>
                </div>
            </td>
        </tr><?php
    } ?>
    </tbody>
</table><?php
} else { ?>
<div class="alert alert-info">
    <p class="lead"><?php echo __('Có vẻ như bạn chưa có bất kỳ hệ thống nào được sáng tác vào thời điểm này.'); ?></p>
    <p><?php echo __('Bây giờ là lúc thích hợp nhất để nhấp vào nút Tạo hệ thống ở trên.'); ?></p>
</div><?php
} ?>

<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo URL::base(); ?>scripts/olab/dataTablesTB.js"></script>