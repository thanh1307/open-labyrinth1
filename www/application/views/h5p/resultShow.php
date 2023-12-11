<?php
/** @var array $content */
/** @var string $messages */
/** @var bool $has_errors */
?>

<div class="wrap">
    <?php echo $messages ?>

    <?php if (!$has_errors) { ?>
        <h2>
            <?php printf(__('Kết quả cho "%s"'), esc_html($content['title'])); ?>
            <a href="<?php print '/h5p/showContent/' . $content['id']; ?>" class="btn btn-primary">
                <?php echo __('Xem'); ?>
            </a>
            <a href="<?php print '/h5p/addContent/' . $content['id']; ?>" class="btn btn-primary">
                <?php echo __('Chỉnh sửa'); ?>
            </a>
        </h2>
    <?php } ?>

    <div id="h5p-content-results">
        <?php __('Đang đợi JavaScript.'); ?>
    </div>
</div>

<?php echo $settings ?>