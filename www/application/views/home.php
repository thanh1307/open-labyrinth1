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
$modeUI = 'easy';
if ($user) {
    $modeUI = $user->modeUI;
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=10,9,8"/>
    <title><?php Breadcrumbs::render('breadcrumbs/title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link rel="stylesheet" type="text/css"
          href="<?php echo ScriptVersions::get(URL::base() . 'css/jquery-ui-1.9.1.custom.css'); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo ScriptVersions::get(URL::base() . 'scripts/bootstrap/css/bootstrap.css'); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo ScriptVersions::get(URL::base() . 'scripts/bootstrap/css/bootstrap-responsive.css'); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo ScriptVersions::get(URL::base() . 'css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo ScriptVersions::get(URL::base() . 'css/jquery.cropzoom.css'); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo ScriptVersions::get(URL::base() . 'scripts/datepicker/css/datepicker.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo ScriptVersions::get(URL::base() . 'css/basic.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo ScriptVersions::get(URL::base() . 'css/font.css'); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo ScriptVersions::get(URL::base() . 'scripts/farbtastic/farbtastic.css'); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo ScriptVersions::get(URL::base() . 'scripts/browser/css/BrowserUpdateWarning.css'); ?>">
    <!--[if IE 7]>
    <link rel="stylesheet" type="text/css" href="<?php echo URL::base(); ?>css/font-awesome-ie7.min.css"/><![endif]-->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

    <?php if (!empty($templateData['styles_stack'])) { ?>
        <?php foreach($templateData['styles_stack'] as $style) { ?>
            <link rel="stylesheet" type="text/css" href="<?php echo ScriptVersions::get($style); ?>">
        <?php } ?>
    <?php } ?>

    <link rel="shortcut icon" href="<?php echo URL::base(); ?>images/ico/favicon.ico"/>
    <script> var baseURL = '<?php echo URL::base() ?>';</script>
    <script type="text/javascript" src="<?php echo URL::base(); ?>scripts/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php echo ScriptVersions::get(URL::base() . 'scripts/helper.js'); ?>'"></script>
</head>
<body>
<?php
$templateData['success_message'] = Session::instance()->get_once('success_message');
$templateData['info_message'] = Session::instance()->get_once('info_message');
$templateData['error_message'] = Session::instance()->get_once('error_message');
?>

<div class="modal hide alert alert-block alert-success fade in" id="please_wait">
    <div class="modal-header">
        <h4 class="alert-heading"><?php echo __('Đang tải...'); ?></h4>
    </div>
    <div class="modal-body">
        <p><?php echo __('Hãy đợi, trang sẽ được tự động chạy lại!'); ?></p>
        <p id="please_wait_additional_info"></p>
    </div>
</div>

<div style="position: fixed;top:50%;left:50%;z-index: 1500;" id="collaboration_message"
     class="alert alert-success hide"><span id="collaboration_message_text">Tin nhắn</span></div>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a href="<?php echo URL::base(); ?>" class="brand">
                <img src="<?php echo URL::base(); ?>images/cvs-large-2.png" alt="" style="max-height: 40px; max-width: 100%;"/>
                
            </a><?php
            if (Auth::instance()->logged_in()) { ?>
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="pull-right">
                    <div class="btn-group">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user"></i><?php echo $user->nickname; ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo URL::base() . 'usermanager/viewUser/' . $user->id; ?>"><?php echo __('Xem hồ sơ'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo URL::base() . 'usermanager/editUser/' . $user->id; ?>"><?php echo __('Chỉnh sửa hồ sơ'); ?></a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?php echo URL::base(); ?>home/logout"><?php echo __('Đăng xuất'); ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="nav-collapse"><?php
                $type_name = $user->type->name; ?>
                <ul class="nav">
                    <li><a href="<?php echo URL::base(); ?>"><?php echo __('Trang chủ'); ?></a></li><?php
                    if ($type_name != 'learner') { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Hệ thống'); ?>
                                <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo URL::base() . 'authoredLabyrinth'; ?>"><?php echo __('Hệ thống của tôi'); ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo URL::base() . 'collectionManager'; ?>"><?php echo __('Bộ sưu tập của tôi'); ?></a>
                                </li>
                                <li class="divider"></li>
                                <li class="nav-header"><?php echo __('Sáng tạo hệ thống'); ?></li>
                                <li>
                                    <a href="<?php echo URL::base() . 'labyrinthManager/caseWizard'; ?>"><?php echo __('Sáng tạo từng bước'); ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo URL::base() . 'labyrinthManager/addManual'; ?>"><?php echo __('Tự sáng tạo'); ?></a>
                                </li>
                                <li class="divider"></li>
                                <li class="nav-header"><?php echo __('Thêm hệ thống'); ?></li>
                                <li>
                                    <a href="<?php echo URL::base() . 'exportImportManager/import'; ?>"><?php echo __('Hỗ trợ người dùng ảo'); ?></a>
                                </li>
                                <li class="divider"></li>
                                <li class="nav-header"><?php echo __('Xuất bản hệ thống'); ?></li>
                                <li>
                                    <a href="<?php echo URL::base() . 'exportImportManager/exportMVP'; ?>"><?php echo __('Hỗ trợ người dùng ảo'); ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo URL::base() . 'exportImportManager/exportAdvanced'; ?>"><?php echo __('Tùy chọn nâng cao'); ?></a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php echo __('Công cụ'); ?><b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <?php if ($type_name != 'author') { ?>
                                    <?php if ($modeUI == 'advanced') { ?>
                                        <li>
                                            <a href="<?php echo URL::base(); ?>remoteServiceManager"><?php echo __('Dịch vụ từ xa'); ?></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo URL::base() . 'usermanager'; ?>"><?php echo __('Nhóm và người dùng'); ?></a>
                                        </li>
                                    <?php } ?>
                                    <?php if ($type_name == 'superuser') { ?>
                                        <li class="divider"></li>
                                        <li><a
                                            href="<?php echo URL::base(); ?>systemManager"><?php echo __('Cài đặt hệ thống'); ?></a>
                                        </li><?php
                                        if ($modeUI == 'advanced') { ?>
                                            <li><a href="<?php echo URL::base(); ?>TodayTipManager/index">Lời khuyên hôm nay</a></li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="<?php echo URL::base(); ?>metadata/manager"><?php echo __('Kho dữ liệu'); ?></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo URL::base(); ?>vocabulary/manager"><?php echo __('Thuật ngữ'); ?></a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="<?php echo URL::base(); ?>ltimanager"><?php echo __('LTI'); ?></a>
                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                                <?php if (in_array($type_name, array('superuser', 'author'))) { ?>
                                    <li>
                                        <a href="<?php echo URL::base(); ?>videoservice"><?php echo __('Kết hợp video'); ?></a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="<?php echo URL::base(); ?>h5p"><?php echo __('H5P'); ?></a>
                                    </li>
                                <?php } ?>
                                <?php if ($type_name == 'superuser') { ?>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="<?php echo URL::base(); ?>backup"><?php echo __('Sao lưu dữ liệu'); ?></a>
                                    </li>
                                    <li class="divider"></li>
                                    <?php
                                    $failed_statements_counter = Model_Leap_LRSStatement::count();
                                    $lrs_counter = Model_Leap_LRS::countEnabled();
                                    ?>
                                    <li>
                                        <a href="<?php echo URL::base(); ?>lrs">
                                            <?php echo __('LRS'); ?>

                                            <?php if (!empty($lrs_counter)) { ?>
                                                <span class="badge badge-success">
                                                    <?php echo $lrs_counter ?>
                                                </span>
                                            <?php } ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo URL::base(); ?>lrs/failedStatements">
                                            <?php echo __('Trường hợp xAPI thất bại'); ?>

                                            <?php if (!empty($failed_statements_counter)) { ?>
                                                <span class="badge badge-important">
                                                    <?php echo $failed_statements_counter ?>
                                                </span>
                                            <?php } ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php }
                    if ($type_name == 'author' OR $type_name == 'superuser' OR $type_name == 'Director') { ?>
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Kịch bản'); ?><b
                                class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo URL::base(); ?>webinarManager/my"><?php echo __('Kịch bản của tôi'); ?></a>
                            </li>
                            <?php if ($modeUI == 'advanced') { ?>
                                <li class="divider"></li>
                                <!--<li>
                                    <a href="<?php /*echo URL::base(); */ ?>webinarManager/timeBasedReports">
                                        <?php /*echo __('Time-Based Reports'); */ ?>
                                    </a>
                                </li>-->

                                <li>
                                    <a href="<?php echo URL::base(); ?>webinarManager/index">
                                        <?php echo __('Quản lý kịch bản'); ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                        </li><?php
                        if ($modeUI == 'advanced') { ?>
                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Cài đặt'); ?><b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo URL::base() . 'patient/index'; ?>"><?php echo __('Quản lý'); ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo URL::base() . 'patient/connection'; ?>"><?php echo __('Kết nối'); ?></a>
                                </li>
                            </ul>
                            </li><?php
                        }
                    } else {
                        if ($type_name != 'reviewer') { ?>
                            <li><a
                                href="<?php echo URL::base() . 'collectionManager'; ?>"><?php echo __('Bộ sưu tập của tôi'); ?></a>
                            </li><?php
                        } ?>
                        <li><a
                            href="<?php echo URL::base() . 'webinarManager/my'; ?>"><?php echo __('Kịch bản của tôi'); ?></a>
                        </li><?php
                    } ?>
                    <li><a href="<?php echo URL::base(); ?>dforumManager"><?php echo __('Diễn đàn'); ?></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Trợ giúp'); ?><b
                                class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo URL::base() . 'home/about'; ?>">Về chúng tôi</a></li>
                            <li><a href="<?php echo URL::base() . 'home/userGuide'; ?>" target="_blank">Hướng dẫn sử dụng</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?php echo URL::base() . 'base/ui/easy'; ?>"
                                   class="<?php if ($modeUI == 'easy') {
                                       echo 'active btn-info';
                                   } ?>">Giao diện đơn giản</a></li>
                            <li><a href="<?php echo URL::base() . 'base/ui/advanced'; ?>"
                                   class="<?php if ($modeUI == 'advanced') {
                                       echo 'active btn-info';
                                   } ?>">Giao diện nâng cao</a></li>
                        </ul>
                    </li>
                </ul>
                </div><?php
            } ?>
        </div>
    </div>
</div>
<div class="root-error-container">
    <div id="rootNodeMessage" class="alert alert-error root-alert hide">
        <button type="button" class="root-error-close close">×</button>
        <?php echo __('Bạn chưa thiết lập nên hệ thống của bạn sẽ không chạy. Vui lòng quay lại trình chỉnh sửa trực quan và nhấp vào nút Bắt đầu -> Hành động -> Đặt làm gốc'); ?>
    </div>
</div><?php
if (isset($templateData)) { ?>
    <div class="container-fluid">
        <div class="row-fluid"><?php
            if (Auth::instance()->logged_in()) { ?>
                <?php if (!isset($templateData['leftHidden'])) { ?>
                    <div id="sidebar" class="span2"><?php
                        if (isset($templateData['labyrinthSearch']) AND isset($templateData['map'])) { ?>
                        <form
                            action="<?php echo URL::base() . 'labyrinthManager/search/' . (isset($templateData['map']) AND !is_numeric($templateData['map']) ? $templateData['map']->id : $templateData['map']); ?>"
                            method="get">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-search"></i></span>
                                <input class="span10" id="searchText" name="s" type="text"
                                       value="<?php if (isset($templateData['searchText'])) {
                                           echo $templateData['searchText'];
                                       } ?>" placeholder="Tìm kiếm">
                            </div>
                            </form><?php
                        } else { ?>
                        <form action="<?php echo URL::base(); ?>home/search" method="post">
                                <input type="hidden" name="scope" value="t"/>

                                <div class="input-prepend">
                                    <span class="add-on"><i class="icon-search"></i></span>
                                    <input class="span10" id="searchterm" name="searchterm" type="text"
                                           placeholder="Tìm kiếm">
                                </div>
                            </form><?php
                        } ?>

                        <div class="sidebar-nav">
                            <?php echo Arr::get($templateData, 'left', ''); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php
                $contentWidth = isset($templateData['right']) ? 8 : 10;
                if (isset($templateData['leftHidden'])) {
                    $contentWidth += 2;
                }
                ?>
            <div id="content" class="span<?php echo $contentWidth; ?>">
                <div><?php Breadcrumbs::render(); ?></div>
                <?php
                $flash = Session::instance()->get_once('finalSubmit', null);
                if (!empty($flash)) {
                    ?>
                    <div class="alert alert-error">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $flash; ?>
                    </div>
                <?php
                }
                ?>
                <div class="row-fluid">
                    <?php if (!empty($templateData['success_message'])) { ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <b><?php echo $templateData['success_message'] ?></b>
                        </div>
                    <?php } ?>

                    <?php if (!empty($templateData['info_message'])) { ?>
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <b><?php echo $templateData['info_message'] ?></b>
                        </div>
                    <?php } ?>

                    <?php if (!empty($templateData['error_message'])) { ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <b><?php echo $templateData['error_message'] ?></b>
                        </div>
                    <?php } ?>


                    <?php
                    echo Arr::get($templateData, 'error');
                    echo Arr::get($templateData, 'center');
                    ?>
                </div>
                </div><?php
                if (isset($templateData['left'])) { ?>
                    <div>
                        <a href="javascript:void(0)" class="toggles"><i class="icon-chevron-left"></i></a>
                    </div><?php
                }
                if (isset($templateData['right'])) { ?>
                    <div class="span2"><?php echo $templateData['right']; ?></div><?php
                }
            } else { ?>
                <div class="span3"><?php echo Arr::get($templateData, 'left'); ?></div>
                <div class="span9"><?php echo Arr::get($templateData, 'center'); ?></div><?php
            } ?>
        </div>
    </div>
<input type="hidden" id="browserWarningImages" value="<?php echo URL::base(); ?>scripts/browser/images/"/>

    <!--script type="text/javascript" src="<?php echo ScriptVersions::get(URL::base() . 'scripts/jquery-ui-1.9.1.custom.min.js'); ?>"></script-->
    <script type="text/javascript">


        var historyAjaxCollaborationURL = '<?php echo URL::base().'home/historyAjaxCollaboration/'.Arr::get($templateData, 'user_id', 0); ?>',
            userHasBlockedAccess = <?php echo Arr::get($templateData, 'userHasBlockedAccess', 0); ?>,
            currentUserReadOnly = <?php echo Arr::get($templateData, 'currentUserReadOnly', 0); ?>,
            historyOfAllUsers = eval('(<?php echo Arr::get($templateData, 'historyOfAllUsers', '[]'); ?>)'),
            historyShowWarningPopup = <?php echo Arr::get($templateData, 'historyShowWarningPopup', 0); ?>;
        <?php
        if (isset($templateData['username'])) { ?>
        var currentUser = '<?php echo $templateData['username']; ?>';
        <?php } ?>
    </script>
    <script type="text/javascript"
            src="<?php echo ScriptVersions::get(URL::base() . 'scripts/jquery-ui-1.10.4.min.js'); ?>"></script>
    <script type="text/javascript"
            src="<?php echo ScriptVersions::get(URL::base() . 'scripts/jquery.cookie.js'); ?>"></script>
    <script type="text/javascript"
            src="<?php echo ScriptVersions::get(URL::base() . 'scripts/browser/js/BrowserUpdateWarning_jQuery.js'); ?>"></script>
    <script type="text/javascript"
            src="<?php echo ScriptVersions::get(URL::base() . 'scripts/application.js'); ?>"></script>
    <script type="text/javascript"
            src="<?php echo ScriptVersions::get(URL::base() . 'scripts/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript"
            src="<?php echo ScriptVersions::get(URL::base() . 'scripts/datepicker/js/bootstrap-datepicker.js'); ?>"></script><?php
} else { ?>
    <div style="margin: 10px 100px;">Bạn phải chọn nhắn tin</div><?php
}; ?>

<?php if (!empty($templateData['scripts_stack'])) { ?>
    <?php foreach($templateData['scripts_stack'] as $script) { ?>
        <script type="text/javascript" src="<?php echo ScriptVersions::get($script); ?>"></script>
    <?php } ?>
<?php } ?>

</body>
</html>