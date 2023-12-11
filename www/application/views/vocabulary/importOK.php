<div style="color: #000000;">
    <h3>Quá trình nhập từ vựng đã hoàn tất thành công</h3>
    <h4>Điều khoản được nhập từ <?php echo $templateData['uri']; ?>:</h4>

    <?php  if (count($templateData['terms']) > 0) { ?>
    <?php foreach ($templateData['terms'] as $term) { ?>
        <?php echo $term ?><br/>

        <?php } ?>
    <?php } ?>
    <a class="btn btn-primary" href="<?php echo URL::base(); ?>vocabulary/manager">Quay lại trình quản lý từ vựng</a>
    </div>



