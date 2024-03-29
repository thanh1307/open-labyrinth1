<style>
    #bar-text {
        position: absolute;
        background: rgba(255,255,255,0.51);
        z-index: 2;
        font-weight: bold;
        text-align: center;
        width: 100%;
    }
    .progress{
        position: relative;
    }
</style>
<div>
    <h1 class="page-header">Xây dựng lại điểm cuối SPARQL</h1>
    <div class="row-fluid">
        <div class="span12">Tại đây bạn có thể xây dựng lại chỉ mục điểm cuối SPARQL để cung cấp thông tin mới nhất. <br/>Vui lòng không thoát khỏi trang này cho đến khi việc lập chỉ mục SPARQL hoàn tất.</div>
    </div>

     <form class="form-horizontal" action="<?php echo URL::base() . 'sparql/rebuild/go'; ?>">
         <legend>Cài đặt lập chỉ mục</legend>
         <fieldset class="fieldset">


<script type="application/javascript">
    app_base = "<?php echo URL::base();?>";
</script>
             <script type="application/javascript" src="<?php echo URL::base() .'scripts/olab/sparql.js';?>"></script>


             <div class="control-group">
                 <label title="Bạn có muốn đưa các từ vựng bên ngoài vào chỉ mục điểm cuối SPARQL của mình không?" for="external" class="control-label">Thêm <a href="<?php echo URL::base() . 'vocabulary/manager'; ?>">Từ Vựng Bên Ngoài</a></label>
                 <div class="controls">
                     <div class="radio_extended btn-group" style="float: left;">
                         <input autocomplete="off" type="radio" id="external0" name="external" value="0" checked="checked">
                         <label data-class="btn-danger" data-value="no" for="external0" class="btn active btn-danger">Không</label>

                         <input autocomplete="off" type="radio" id="external1" name="external" value="1">
                         <label data-class="btn-success" data-value="yes" for="external1" class="btn">Có</label>
                     </div>
                 </div>









             </div>
             <div class="control-group">
                 <div class="progress progress-striped active">
                     <span id="bar-text">Idle</span>
                     <div class="bar" style="width: 0%;"></div>
                 </div>

             </div>
         </fieldset>
<div class="form-actions">
    <div class="pull-right">
         <!--input class="btn btn-large btn-primary" type="submit" value="Rebuild"/></div-->
        <input class="btn btn-large btn-primary" type="button" id="rebuild" value="Rebuild"/></div>
</div>
     </form>
     
 </div>