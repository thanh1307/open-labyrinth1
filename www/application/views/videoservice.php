<?php if(!empty($templateData['LTI'])) { ?>
    <iframe name="basicltiLaunchFrame"  id="basicltiLaunchFrame" src="" width="100%" height="700" scrolling="auto" frameborder="1"></iframe>
    <form action="<?php echo $templateData['endpoint'] ?>" name="ltiLaunchForm" id="ltiLaunchForm" method="post"
          target="basicltiLaunchFrame" enctype="application/x-www-form-urlencoded">
        <?php
        foreach ($templateData['LTI'] as $name => $value) {
            echo '<input type="hidden" name="' . $name . '" value="' . $value . '">';
        }
        ?>
    </form>
    <script>
        $(document).ready(function () {
            $('#ltiLaunchForm').submit();
        });
    </script>
<?php }else{ ?>
    <p>
        Để bắt đầu, hãy cung cấp chi tiết về <a href="/ltimanager/providers">Nhà cung cấp LTI</a>
    </p>
<?php } ?>