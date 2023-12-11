<?php
/** @var int $update_available */
/** @var int $updates_available */
/** @var int $current_update */
/** @var string $H5PAdminIntegration */
/** @var string $messages */
?>

<?php echo $messages ?>

    <div class="wrap">
        <?php if ($updates_available): ?>
            <form method="post" enctype="multipart/form-data">
                <h3 class="h5p-admin-header"><?php echo __('Nâng cấp tất cả thư viện'); ?></h3>
                <div class="h5p postbox">
                    <div class="h5p-text-holder" id="h5p-download-update">
                        <p><?php echo __('Có sẵn các bản cập nhật cho loại nội dung H5P của bạn.') ?></p>
                        <p><?php printf(__('Bạn có thể đọc về lý do tại sao việc cập nhật lại quan trọng và lợi ích của việc cập nhật trên <a href="https://h5p.org/why-update" target="_blank">Why Update H5P</a> page.')); ?>
                            <br/><?php echo __('Trang này cũng liệt kê các nhật ký thay đổi khác nhau, nơi bạn có thể đọc về các tính năng mới được giới thiệu và các sự cố đã được khắc phục.') ?>
                        </p>
                        <p>
                            <?php if ($current_update > 1): ?>
                                <?php printf(__('Phiên bản bạn đang chạy là từ <strong>%s</strong>.'), date('Y-m-d', $current_update)); ?>
                                <br/>
                            <?php endif; ?>
                            <?php printf(__('Phiên bản mới nhất được phát hành vào ngày <strong>%s</strong>.'), date('Y-m-d', $update_available)); ?>
                        </p>
                        <p><?php echo __('Bạn có thể sử dụng nút bên dưới để tự động tải xuống và cập nhật tất cả các loại nội dung của mình.') ?></p>
                    </div>
                    <div class="h5p-button-holder">
                        <input type="submit" name="submit" value="<?php echo __('Tải & Cập nhật') ?>"
                               class="button button-primary button-large"/>
                    </div>
                </div>
            </form>
        <?php endif; ?>
        <h3 class="h5p-admin-header"><?php echo __('Tải lên thư viện'); ?></h3>
        <div class="alert alert-info">
            <?php echo __('Lưu ý: Giá trị của các lệnh php.ini post_max_size và upload_max_filesize phải lớn hơn kích thước của gói.') ?>
            <?php echo __('Hiện hành') ?> post_max_size = <?php echo ini_get('post_max_size') ?>,
            <?php echo __('Hiện hành') ?> upload_max_filesize = <?php echo ini_get('upload_max_filesize') ?>
        </div>
        <form method="post" enctype="multipart/form-data" id="h5p-library-form" action="/h5p/libraryUpload">
            <div class="h5p postbox">
                <div class="h5p-text-holder">
                    <p><?php print __('Tại đây bạn có thể tải lên thư viện mới hoặc tải lên các bản cập nhật cho thư viện hiện có. Các tệp được tải lên ở đây phải ở định dạng tệp .h5p.') ?></p>
                    <input type="file" name="h5p_file" id="h5p-file"/>
                    <label for="h5p-upgrade-only">
                        <input type="checkbox" name="h5p_upgrade_only" id="h5p-upgrade-only"/>
                        <?php print __('Chỉ cập nhật các thư viện hiện có'); ?>
                    </label>
                    <div class="h5p-disable-file-check">
                        <label><input type="checkbox" name="h5p_disable_file_check"
                                      id="h5p-disable-file-check"/> <?php echo __('Vô hiệu hóa kiểm tra phần mở rộng tập tin'); ?>
                        </label>
                        <div
                            class="h5p-warning"><?php echo __("Cảnh báo! Điều này có thể có ý nghĩa bảo mật vì nó cho phép tải lên các tệp php. Điều đó có thể khiến kẻ tấn công thực thi mã độc trên trang web của bạn. Hãy đảm bảo rằng bạn biết chính xác những gì bạn đang tải lên."); ?></div>
                    </div>
                </div>
                <div class="h5p-button-holder">
                    <input type="submit" name="submit" value="<?php echo __('Tải lên') ?>" class="btn btn-primary"/>
                </div>
            </div>
        </form>
        <h3 class="h5p-admin-header"><?php echo __('Cài đặt thư viện'); ?></h3>
        <div id="h5p-admin-container"><?php echo __('Đang đợi JavaScript.'); ?></div>
    </div>

<?php echo $H5PAdminIntegration ?>