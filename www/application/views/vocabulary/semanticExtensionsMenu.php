<div class="well" style="padding: 8px 0;">
    <ul class="nav nav-list">
        <?php
        $pages = Model_Leap_Vocabulary_Vocablet::getAllPages();
        if(empty($pages)){
            ?>
            <li><i>Cài đặt một số tiện ích mở rộng để xem các trang có sẵn tại đây</i></li>
        <?php
        }
        foreach ($pages as $section => $pageList) {
            ?>
            <li class="nav-header"><?php echo $section; ?></li>

            <?php

            foreach ($pageList as $page) {
                ?>

                <li><a href="<?php echo URL::base() .  $page['url'] ;?>"><i
                            class="icon-columns"></i> <?php echo __($page['title']); ?></a></li>

        <?php

            }


        }


        ?>



    </ul>
</div>


