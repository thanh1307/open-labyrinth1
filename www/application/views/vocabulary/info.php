<?php
/**
 * Created by JetBrains PhpStorm.
 * User: larjohns
 * Date: 14/9/2012
 * Time: 10:10 πμ
 * To change this template use File | Settings | File Templates.
 */
if (isset($templateData['vocabularies'])) {

    ?>
<div>
    <h1>Từ vựng và thuật ngữ có sẵn</h1>
    <table class="table table-bordered table-striped">
        <colgroup>
            <col style="width: 85%"/>
            <col/>
        </colgroup>
        <thead>
        <tr>
            <th>Từ vựng &amp; Thuật ngữ</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
    <?php  if (count($templateData['vocabularies']) > 0) { ?>
    <?php foreach ($templateData['vocabularies'] as $vocab) { ?>
            <tr>
                <td>

        <?php echo $vocab->namespace; ?>         <a target="_blank" href="<?php echo $vocab->namespace; ?>"><i style="text-decoration: none" class="icon-external-link"></i></a> [<?php echo $vocab->id; ?>]
            <div style="margin-left: 20px; text-align: justify">
            <?php foreach ($vocab->terms as $term) { ?>
                <a target="_blank" title="<?php echo $term->term_label; ?>" href="<?php echo $term->getFullRepresentation(); ?>"><?php echo $term->name; ?></a> [<?php echo $term->id; ?>],
            <?php } ?>
            </div></td>
            <td><form  method="post" action="<?php echo URL::base() . 'vocabulary/manager/delete'; ?>">
                    <input type="hidden" name="uri" id="uri" value="<?php echo $vocab->namespace;?>">
                    <div class="btn-group-vertical"><a class="btn btn-info" target="_blank" href="<?php echo URL::base() . 'vocabulary/manager/import/?uri='.$vocab->namespace; ?>"><i class="icon-refresh"></i>Xuất lại</a>

                <button class="btn btn-danger" style="width: 100%" type="submit"><i class="icon-trash"></i>Xóa</button> </div></form>
            </td>
            </tr>
        <?php } ?>
    <?php } else{ ?>
        <tr class="info"><td colspan="2">Chưa có từ vựng nào được nhập. Bạn có thể nhập một cái bằng cách sử dụng biểu mẫu bên dưới.</td></tr>
    <?php } ?>
        </tbody>
    </table>
</div>



        <form class="form-horizontal" method="get" action="<?php echo URL::base() . 'vocabulary/manager/import/'; ?>">
            <fieldset class="fieldset">
                <legend>Nhập mới / cập nhật từ vựng có sẵn</legend>
                <div class="control-group">
                    <label for="uri" class="control-label">Mã định danh tài nguyên chung</label>

                    <div class="controls">
                        <input name="uri" class="span8" id="uri" type="text" placeholder="e.g. http://purl.org/dc/elements/1.1/" />
                    </div>
                </div>
            </fieldset>
<div class="form-actions">
            <input class="btn btn-primary" type="submit" value="Thêm"/></div>
        </form>



<?php } ?>