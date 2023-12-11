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
?>

    <h1><?php echo __('Trình quản lý từ điển '); ?></h1>
    <p></p>
<?php if ($templateData['result'] == 'success') {
    echo '<p style="color:green">Tệp được tải lên từ điển thành công</p>';
} ?>
<?php if ($templateData['result'] == 'error') {
    echo '<p style="color:red">Đã xảy ra lỗi khi tải tệp</p>';
} ?>
    <form method="POST" enctype="multipart/form-data"
          action="<?php echo URL::base() . 'dictionaryManager/uploadFile'; ?>" class="form-horizontal">
        <fieldset class="fieldset">
            <legend><?php echo __('Tải tệp lên từ điển:'); ?></legend>
            <div class="control-group">
                <label class="control-label">
                    <?php echo __('Chọn tệp để đẩy lên:'); ?>
                </label>

                <div class="controls">
                    <input type="file" size="50" name="filename"/>
                </div>
            </div>
            <div>
                <input class="btn btn-primary" type="submit" name="Submit" value="<?php echo __('Tải lên'); ?>"/>
            </div>
        </fieldset>


    </form>
    <form class="form-horizontal" method="POST" action="<?php echo URL::base() . 'dictionaryManager/addWord'; ?>">
        <fieldset class="fieldset">
            <legend><?php echo __('Thêm từ vào từ điển:'); ?></legend>
            <div class="control-group">
                <label for="word" class="control-label">Từ theo nghĩa đen</label>

                <div class="controls">

                    <input class="not-autocomplete span6" type="text" id="word" name="word"/>

                </div>

            </div>
        </fieldset>
        <input class="btn btn-primary" type="submit" name="Search" value="<?php echo __('Thêm'); ?>">
    </form>


    <form class="form-horizontal" method="POST" action="<?php echo URL::base() . 'dictionaryManager/search'; ?>">
        <fieldset class="fieldset">
            <legend><?php echo __('Tìm kiếm từ trong từ điển'); ?></legend>
            <div class="control-group">
                <label for="search_value" class="control-label">
                    <?php echo __('Nhập chữ bắt đầu của từ'); ?>
                </label>

                <div class="controls">
                    <input class="span6 not-autocomplete" id="search_value" type="text" name="search_value"
                           value="<?php if (isset($_POST['search_value'])) {
                               echo $_POST['search_value'];
                           } ?>" />
                </div>
            </div>
        </fieldset>

        <input class="btn btn-primary" type="submit" name="Search" value="<?php echo __('Tìm kiếm'); ?>">
    </form>


<?php if (isset($templateData['search_results'])) {
    if ((count($templateData['search_results']) > 0)) {
        ?>

        <h4><?php echo __('Search Results');?></h4>
        <form method="POST" action="<?php echo URL::base() . 'dictionaryManager/wordsChanges';?>"
              class="form-horizontal">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo __("Từ"); ?></th>
                    <th><?php echo __("Xóa?"); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                foreach ($templateData['search_results'] as $value) {
                    ?>
                    <tr>
                        <td><?php echo $i; $i++;?></td>
                        <td><label><input class="not-autocomplete" type="text" name="word_value[<?php echo $value['id'];?>]"
                                   value="<?php echo $value['word'];?>"/></label></td>
                        <td><label><input type="checkbox" name="word_ch[<?php echo $value['id'];?>]" value="1"/></label></td>
                    </tr>

                <?php } ?>

                </tbody>
            </table>
            <input type="submit" value="<?php echo __('Lưu thay đổi'); ?>" class="btn btn-primary"/>
        </form>

    <?php } else echo __('Không tìm thấy từ nào');
} ?>