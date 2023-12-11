<?php
/** @var string $data_view */
?>

<div class="wrap">
    <h2>
        <?php echo __('Tất cả nội dung H5P'); ?>
        <a class="btn btn-primary" href="<?php echo URL::base() . 'h5p/addContent'; ?>">
            <i class="icon-plus-sign icon-white"></i>
            <?php echo __('Thêm mới'); ?>
        </a>
        <a class="btn btn-primary" href="<?php echo URL::base() . 'h5p/libraries'; ?>">
            <i class="icon-list icon-white"></i>
            <?php echo __('Thư viện'); ?>
        </a>
        <a class="btn btn-primary" href="<?php echo URL::base() . 'h5p/deleteTemporaryFiles'; ?>">
            <i class="icon-trash icon-white"></i>
            <?php echo __('Xóa các tập tin tạm thời'); ?>
        </a>
    </h2>
    <div id="h5p-contents">
        <?php echo __('Đang đợi JavaScript.'); ?>
    </div>
</div>

<?php echo $data_view; ?>