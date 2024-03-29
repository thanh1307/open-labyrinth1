<?php
/** @var array $content */
/** @var string $embed_code */
/** @var string $messages */
/** @var string $settings */
/** @var bool $has_errors */
?>

<div class="wrap">
    <?php echo $messages ?>

    <?php if (!$has_errors) { ?>
        <h2>
            <?php print esc_html($content['title']); ?>
            <a href="<?php print '/h5p/results/' . $content['id']; ?>" class="btn btn-primary">
                <?php echo __('Kết quả'); ?>
            </a>
            <a href="<?php print '/h5p/addContent/' . $content['id']; ?>" class="btn btn-primary">
                <?php echo __('Chỉnh sửa'); ?>
            </a>
        </h2>
        <div class="h5p-wp-admin-wrapper">

            <div class="row">
                <div class="span8">
                    <div class="h5p-content-wrap">
                        <?php print $embed_code; ?>
                    </div>
                </div>

                <div class="span4">
                    <?php if (true): ?>
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
                            <b><?php echo __('Gắn thẻ'); ?></b>
                        </div>
                        <div class="panel-body">
                            <div class="h5p-action-bar-settings h5p-panel">
                                <?php if (empty($content['tags'])): ?>
                                    <p style="font-style: italic;"><?php echo __('Không gắn thẻ'); ?></p>
                                <?php else: ?>
                                    <p><?php echo $content['tags']; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    <?php } ?>
</div>

<?php echo $settings ?>
