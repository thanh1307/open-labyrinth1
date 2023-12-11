<?php
/** @var string $settings */
/** @var string $title */
/** @var string $library */
/** @var string $parameters */
/** @var array|null $content */
/** @var bool $upload */
?>

    <div class="wrap">
        <h2>
            <?php if ($content === null): ?>
                <?php print __('Thêm mới'); ?>
            <?php else: ?>
                <?php echo __('Chỉnh sửa'); ?>
                <em><?php echo $title; ?></em>
                <a href="<?php print '/h5p/showContent/' . $content['id']; ?>" class="btn btn-primary">
                    <?php echo __('Giao diện'); ?>
                </a>
                <a href="<?php print '/h5p/results/' . $content['id']; ?>" class="btn btn-primary">
                    <?php echo __('Kết quả'); ?>
                </a>
            <?php endif; ?>
        </h2>
        <?php H5PPluginAdmin::print_messages(); ?>
        <form method="post" enctype="multipart/form-data" id="h5p-content-form" action="/h5p/addContentSubmit/<?php echo (isset($content['id']) ? $content['id'] : '') ?>">
            <div class="row">
                <div class="span8">
                    <div id="post-body-content">
                        <div id="titlediv">
                            <label class="" id="title-prompt-text" for="title">
                                <?php echo __('Nhập tiêu đề'); ?>
                            </label>
                            <input id="title" type="text" name="title" value="<?php echo esc_html($title); ?>" required maxlength="255"/>
                        </div>
                        <div class="h5p-upload">
                            <input type="file" name="h5p_file" id="h5p-file"/>
                            <div class="h5p-disable-file-check">
                                <label><input type="checkbox" name="h5p_disable_file_check"
                                              id="h5p-disable-file-check"/> <?php echo __('Vô hiệu hóa kiểm tra phần mở rộng tập tin'); ?>
                                </label>
                                <div class="h5p-warning">
                                    <?php echo __("Cảnh báo! Điều này có thể có ý nghĩa bảo mật vì nó cho phép tải lên các tệp php. Điều đó có thể khiến kẻ tấn công thực thi mã độc trên trang web của bạn. Hãy đảm bảo rằng bạn biết chính xác những gì bạn đang tải lên."); ?>
                                </div>
                            </div>
                        </div>
                        <div class="h5p-create">
                            <div class="h5p-editor"><?php echo __('Đang chờ javascript...'); ?></div>
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <?php if (!empty($content)): ?>
                        <div class="postbox h5p-sidebar panel">
                            <div class="panel-heading">
                                <b><?php echo __('Code ngắn'); ?></b>
                            </div>
                            <div class="panel-body">
                                <div class="h5p-action-bar-settings h5p-panel">
                                    <p><?php echo __("Tiếp theo?"); ?></p>
                                    <p><?php echo __('Bạn có thể sử dụng mã ngắn sau để chèn nội dung tương tác này vào các nút:'); ?></p>
                                    <code>[[H5P:<?php print $content['id'] ?>]]</code>
                                </div>
                            </div>
                        </div>
                        <br>
                    <?php endif; ?>

                    <div class="postbox h5p-sidebar panel">
                        <div class="panel-heading">
                            <b><?php echo __('Hành động'); ?></b>
                        </div>
                        <div class="panel-body">
                            <div id="minor-publishing">
                                <label>
                                    <input type="radio" name="action" value="upload"<?php if ($upload): print ' checked="checked"'; endif; ?>/>
                                    <?php echo __('Tải lên'); ?>
                                </label>
                                <label>
                                    <input type="radio" name="action" value="create"/>
                                    <?php echo __('Tạo'); ?>
                                </label>
                                <input type="hidden" name="library" value="<?php print esc_html($library); ?>"/>
                                <input type="hidden" name="parameters" value="<?php print $parameters; ?>"/>
                            </div>
                            <hr>
                            <div id="major-publishing-actions" class="submitbox">
                                <?php if ($content !== null): ?>
                                    <a class="submitdelete deletion btn btn-danger"
                                       href="/h5p/contentDelete/<?php echo $content['id'] ?>">Delete</a>
                                <?php endif; ?>
                                <input type="submit" name="submit"
                                       value="<?php echo __($content === null ? 'Tạo' : 'Cập nhật') ?>"
                                       class="btn btn-primary"/>
                            </div>
                        </div>
                    </div>
                    <br>
                    <?php if (get_option('h5p_frame', true)): ?>
                        <div class="postbox h5p-sidebar panel">
                            <div class="panel-heading">
                                <b><?php echo __('Tùy chọn hiển thị'); ?></b>
                            </div>
                            <div class="panel-body">
                                <div class="h5p-action-bar-settings h5p-panel">
                                    <label>
                                        <input name="frame" type="checkbox"
                                               value="true"<?php if (!($content['disable'] & H5PCore::DISABLE_FRAME)): ?> checked="checked"<?php endif; ?>/>
                                        <?php echo __("Hiển thị thanh và khung hành động"); ?>
                                    </label>
                                    <?php if (get_option('h5p_export', true)): ?>
                                        <label>
                                            <input name="download" type="checkbox"
                                                   value="true"<?php if (!($content['disable'] & H5PCore::DISABLE_DOWNLOAD)): ?> checked="checked"<?php endif; ?>/>
                                            <?php echo __("Nút tải về"); ?>
                                        </label>
                                    <?php endif; ?>
                                    <?php if (get_option('h5p_embed', true)): ?>
                                        <label>
                                            <input name="embed" type="checkbox"
                                                   value="true"<?php if (!($content['disable'] & H5PCore::DISABLE_EMBED)): ?> checked="checked"<?php endif; ?>/>
                                            <?php echo __("Nút nhúng"); ?>
                                        </label>
                                    <?php endif; ?>
                                    <?php if (get_option('h5p_copyright', true)): ?>
                                        <label>
                                            <input name="copyright" type="checkbox"
                                                   value="true"<?php if (!($content['disable'] & H5PCore::DISABLE_COPYRIGHT)): ?> checked="checked"<?php endif; ?>/>
                                            <?php echo __("Nút bản quyền"); ?>
                                        </label>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <br>
                    <div class="postbox h5p-sidebar panel">
                        <div class="panel-heading">
                            <b><?php echo __('Gắn thẻ'); ?></b>
                        </div>
                        <div class="panel-body">
                            <div class="h5p-panel">
                            <textarea rows="2" name="tags"
                                      class="h5p-tags"><?php print esc_html($content['tags']); ?></textarea>
                                <p class="howto">Ngăn cách bằng các dấu phẩy</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php echo $settings ?>