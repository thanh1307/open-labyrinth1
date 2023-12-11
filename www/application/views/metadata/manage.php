<script type="text/javascript">
    var extras = <?php echo json_encode($templateData["extras"]);?>;

    $(document).ready(function () {
        $("#metadata-type").change(
            function () {
                var selectedType = $(this).val();

                if(extras.hasOwnProperty(selectedType)){

                    $(".extras").remove();
                    for(var i=0; i<extras[selectedType].length;i++){

                        $("#addNew").append('<div class="control-group extras"><label class="control-label" for="'+extras[selectedType][i]+'">'+extras[selectedType][i]+'</label><div class="controls"><input type="text" id="'+extras[selectedType][i]+'" name="extras['+extras[selectedType][i]+']"/> </div></div>');

                    }


                }
            }
        )
    });


</script>
<h1>Kho dữ liệu</h1>
<h4>Vùng dữ liệu</h4>
<table class="table table-striped table-hover" style="table-layout: fixed; word-wrap: break-word;">
    <colgroup>
        <col style="width: 5%" />
        <col style="width: 15%" />
        <col style="width: 10%" />
        <col style="width: 10%" />
        <col style="width: 10%" />
        <col style="width: 10%" />
        <col style="width: 10%" />
        <col style="width: 10%" />
        <col style="width: 10%" />
    </colgroup>
    <thead >
    <tr>
        <th>Mã định danh</th>
        <th>Tên</th>
        <th>Mô hình điểm</th>
        <th>Loại</th>
        <th>Nhãn</th>
        <th>Bình luận</th>
        <th>Tính chính thống</th>
        <th>Tùy chọn bổ sung</th>
        <th>Hoạt động</th>
    </tr>

    </thead>

    <tbody>


    <?php


    $metadata = $templateData["metadata"];
if(isset($metadata) and count($metadata)>0){
    foreach ($metadata as $field):?>
        <tr>
        <td>
            <?php echo $field->id; ?>
        </td>
        <td>
            <?php echo $field->name; ?>
        </td>
        <td>
            <?php echo $field->model; ?>
        </td>
        <td>
            <?php echo $field->type; ?>
        </td>
        <td>
            <?php echo $field->label; ?>
        </td>
        <td>
            <?php echo $field->comment; ?>
        </td>
        <td>
            <?php echo $field->cardinality; ?>
        </td>
        <td>
            <ul>
            <?php
            $extras = json_decode($field->options);
            if(isset($extras))
                foreach ($extras as $extra => $value) {
                    echo "<li>".$extra.": ".$value."</li>";
                }

             ?>
            </ul>
        </td>
        <td>
            <form method="post" action="<?php echo URL::base() . 'metadata/manager/delete'; ?>">
                <input type="hidden" name="name" value="<?php echo $field->name; ?>"/>
                <button class="btn btn-danger" type="submit"><i class="icon-trash"></i>Xóa</button>
            </form>
        </td>
        </tr>
    <?php endforeach;?>

<?php } else{?>
    <tr class="info"><td colspan="9">Chưa có siêu dữ liệu nào được xác định. Bạn có thể thêm trường siêu dữ liệu bằng cách sử dụng biểu mẫu bên dưới</td></tr>

<?php } ?>


    </tbody>
</table>


<form method="post" class="form-horizontal" action="<?php echo URL::base() . 'metadata/manager/add'; ?>">
    <fieldset class="fieldset" id="addNew">
        <legend>Thêm mới</legend>
        <div class="control-group">
            <label class="control-label" for="name">Tên</label>

            <div class="controls">
                <?php



                $models = $templateData["models"];

                ?>
                <td>
                    <input type="text" id="name" name="name"/>

            </div>

        </div>
        <div class="control-group">
            <label class="control-label" for="model">Mô hình điểm</label>

            <div class="controls">
                <select id="model" name='model'>
                    <?php foreach ($models as $key => $model): ?>
                        <option value="<?php echo $key ?>"><?php echo $model?></option>
                    <?php endforeach;?>
                </select>
            </div>

        </div>
        <div class="control-group">
            <label class="control-label" for="metadata-type">Loại</label>

            <div class="controls">
                <select name='type' id="metadata-type">
                    <option value="stringrecord">Văn bản ngắn</option>
                    <option value="textrecord">Văn bản phong phú</option>
                    <option value="daterecord">Ngày</option>
                    <option value="referencerecord">Thực thể có URI từ danh sách</option>
                    <option value="skosrecord">Lớp từ phân loại SKOS</option>
                    <option value="inlineobjectrecord">Đối tượng phức tạp được xác định nội tuyến</option>
                </select>
            </div>

        </div>
        <div class="control-group">
            <label class="control-label" for="label">Nhãn</label>

            <div class="controls">
                <input type="text" id="label" name="label"/>
            </div>

        </div>
        <div class="control-group">
            <label class="control-label" for="comment">Bình luận</label>

            <div class="controls">
                <input type="text" id="comment" name="comment"/>
            </div>

        </div>
        <div class="control-group">
            <label class="control-label" for="cardinality">Tính chính thống</label>

            <div class="controls">
                <select name='cardinality' id="cardinality">
                    <option value="1">Đơn giá trị</option>
                    <option value="n">Đa giá trị</option>
                </select>
            </div>

        </div>

    </fieldset>
<div class="form-actions">
    <input class="btn btn-primary" type="submit" value="Thêm">
    </div>
</form>

