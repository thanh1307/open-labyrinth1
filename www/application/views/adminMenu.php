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
 */ ?>
<div class="row-fluid">
    <div class="span8">
        <div class="pull-left">
            <img src="<?php echo URL::base(); ?>images/cvs-large.png" alt="" class="brand-large" />
        </div>
        <h1><?php echo __('Chào mừng đến với <span class="text-info">Hệ thống hỗ trợ học tập</strong>'); ?></h1>
        <p class="lead"><?php echo __(
            'Đây là một hệ thống ảo giúp hỗ trợ học tập. Hệ thống được nghiên cứu và phát triển bởi trung tâm CVS của Đại học Duy Tân! Chào mừng các bạn đến với Hệ thống hỗ trợ ảo.'); ?>
        </p>
        <?php if(isset($templateData['todayTip']) && $templateData['todayTip'] != null) { ?>
                <div class="box">
                    <h4 class="box-header round-top">Lời khuyên hay trong hệ thống</h4>
                    <div class="box-container-toggle">
                        <div class="box-content">
                            <div><b><?php echo $templateData['todayTip']->title; ?></b></div>
                            <div><?php echo $templateData['todayTip']->text; ?></div>
                        </div>
                    </div>
                </div>
        <?php } ?>
    </div>
    <div class="span4"><?php
        if (isset($templateData['latestAuthoredLabyrinths'])) { ?>
        <div class="box">
            <h4 class="box-header round-top"><?php echo __('Tài liệu mới nhất'); ?></h4>
            <div class="box-container-toggle">
                <div class="box-content">
                    <ul class="unstyled"><?php
                    foreach ($templateData['latestAuthoredLabyrinths'] as $map) {?>
                        <li style="margin-bottom: 10px">
                            <div class="row-fluid">
                                <div class="pull-left">
                                    <a href="<?php echo URL::base().'labyrinthManager/global/'.$map->id; ?>"><?php echo substr($map->name, 0, 40); ?></a>
                                </div>
                                <div class="pull-right"><?php
                                    if(true) { ?>
                                    <a class="btn btn-mini btn-success" href="<?php echo URL::base().'renderLabyrinth/index/'.$map->id; ?>" target="_blank"><?php
                                    } else { ?>
                                    <a class="btn btn-mini btn-success show-root-error" href="javascript:void(0)"><?php
                                    } ?>
                                        <i class="icon-play icon-white"></i>
                                        Phát
                                    </a>
                                </div>
                            </div>
                        </li><?php
                    } ?>
                    </ul>
                </div>
            </div>
        </div><?php
        }
        if (isset($templateData['latestPlayedLabyrinths'])) { ?>
        <div class="box">
            <h4 class="box-header round-top"><?php echo __('Truy cập gần nhất'); ?></h4>
                <ul class="box-container-toggle box-content unstyled"><?php
                foreach ($templateData['latestPlayedLabyrinths'] as $map) { ?>
                    <li style="margin-bottom: 10px">
                        <div class="row-fluid">
                            <div class="pull-left">
                                <a href="<?php echo URL::base().'labyrinthManager/global/'.$map->id; ?>"><?php echo substr($map->name, 0, 40); ?></a>
                            </div>
                            <div class="pull-right">
                                <?php if(isset($templateData['rootNodeMap']) && isset($templateData['rootNodeMap'][$map->id]) && $templateData['rootNodeMap'][$map->id] != null) { ?>
                                    <a class="btn btn-mini btn-success" href="<?php echo URL::base(); ?>renderLabyrinth/index/<?php echo $map->id; ?>" target="_blank">
                                        <i class="icon-play icon-white"></i> Phát
                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-mini btn-success show-root-error" href="javascript:void(0)">
                                        <i class="icon-play icon-white"></i> Phát
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </li><?php
                } ?>
                </ul>
        </div><?php
        } ?>
    </div>
</div>

