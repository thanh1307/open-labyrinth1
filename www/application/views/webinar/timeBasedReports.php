<form action="#" class="form-inline left" method="post">
    <input type="hidden" name="referrer" value="<?php echo Request::current()->url(true) . URL::query() ?>">
    <input type="hidden" name="is_initial_request" value="1">
    <input type="hidden" name="webinar_id" value="<?php echo $templateData['webinar']->id ?>">
    <fieldset>
        <div class="control-group">
            <input class="datepicker" type="text" name="date_from" id="date_from"
                   value="<?php echo date('m/d/Y') ?>"/>
            -
            <input class="datepicker" type="text" name="date_to" id="date_to" value="<?php echo date('m/d/Y') ?>"/>
        </div>

        <div class="control-group">
            <div class="controls">
                <span class="btn btn-primary js-get-report _xapi-report" data-type="4R">Lấy báo cáo 4R</span>
                <span class="btn btn-primary js-get-report _xapi-report" data-type="SCT">Lấy báo cáo SCT</span>
                <span class="btn btn-primary js-get-report _xapi-report" data-type="Poll">Lấy báo cáo thăm dò ý kiến</span>
                <span class="btn btn-primary js-get-report _xapi-report" data-type="SJT">Lấy báo cáo SJT</span>
                <span class="btn btn-primary js-get-report _xapi-report" data-type="xAPI">Gửi Báo cáo xAPI tới tất cả LRS đã bật</span>
            </div>
        </div>
    </fieldset>
</form>