<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Chú thích nội dung</title>
    <script>baseURL = "<?php echo URL::base(); ?>" </script>
    <script type="text/javascript" src="<?php echo URL::base()?>scripts/tinymce/js/tinymce/plugins/rdface/libs/jstree/_lib/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo URL::base()?>scripts/tinymce/js/tinymce/plugins/rdface/libs/jstree/_lib/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?php echo URL::base()?>scripts/tinymce/js/tinymce/plugins/rdface/libs/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo URL::base()?>scripts/tinymce/js/tinymce/plugins/rdface/js/config.js"></script>
    <script type="text/javascript" src="<?php echo URL::base()?>scripts/tinymce/js/tinymce/plugins/rdface/js/functions.js"></script>
    <script type="text/javascript" src="<?php echo URL::base()?>scripts/olab/annotate.js"></script>

    <style>
        .bubblingG {
            text-align: center;
            width:200px;
            height:125px;
        }

        .bubblingG span {
            display: inline-block;
            vertical-align: middle;
            width: 25px;
            height: 25px;
            margin: 63px auto;
            background: #7195F0;
            -moz-border-radius: 125px;
            -moz-animation: bubblingG 1.3s infinite alternate;
            -webkit-border-radius: 125px;
            -webkit-animation: bubblingG 1.3s infinite alternate;
            -ms-border-radius: 125px;
            -ms-animation: bubblingG 1.3s infinite alternate;
            -o-border-radius: 125px;
            -o-animation: bubblingG 1.3s infinite alternate;
            border-radius: 125px;
            animation: bubblingG 1.3s infinite alternate;
        }

        #bubblingG_1 {
            -moz-animation-delay: 0.78s;
            -webkit-animation-delay: 0.78s;
            -ms-animation-delay: 0.78s;
            -o-animation-delay: 0.78s;
            animation-delay: 0.78s;
        }

        #bubblingG_2 {
            -moz-animation-delay: 0.39s;
            -webkit-animation-delay: 0.39s;
            -ms-animation-delay: 0.39s;
            -o-animation-delay: 0.39s;
            animation-delay: 0.39s;
        }

        #bubblingG_3 {
            -moz-animation-delay: 0s;
            -webkit-animation-delay: 0s;
            -ms-animation-delay: 0s;
            -o-animation-delay: 0s;
            animation-delay: 0s;
        }

        @-moz-keyframes bubblingG {
            0% {
                width: 25px;
                height: 25px;
                background-color:#7195F0;
                -moz-transform: translateY(0);
            }

            100% {
                width: 60px;
                height: 60px;
                background-color:#B8EDA4;
                -moz-transform: translateY(-53px);
            }

        }

        @-webkit-keyframes bubblingG {
            0% {
                width: 25px;
                height: 25px;
                background-color:#7195F0;
                -webkit-transform: translateY(0);
            }

            100% {
                width: 60px;
                height: 60px;
                background-color:#B8EDA4;
                -webkit-transform: translateY(-53px);
            }

        }

        @-ms-keyframes bubblingG {
            0% {
                width: 25px;
                height: 25px;
                background-color:#7195F0;
                -ms-transform: translateY(0);
            }

            100% {
                width: 60px;
                height: 60px;
                background-color:#B8EDA4;
                -ms-transform: translateY(-53px);
            }

        }

        @-o-keyframes bubblingG {
            0% {
                width: 25px;
                height: 25px;
                background-color:#7195F0;
                -o-transform: translateY(0);
            }

            100% {
                width: 60px;
                height: 60px;
                background-color:#B8EDA4;
                -o-transform: translateY(-53px);
            }

        }

        @keyframes bubblingG {
            0% {
                width: 25px;
                height: 25px;
                background-color:#7195F0;
                transform: translateY(0);
            }

            100% {
                width: 60px;
                height: 60px;
                background-color:#B8EDA4;
                transform: translateY(-53px);
            }

        }
        #progress_bar{
            text-align:center;
        }
    </style>
</head>
<body>
<div class="bubblingG" id="progress_bar">
	<span id="bubblingG_1">
	</span>
	<span id="bubblingG_2">
	</span>
	<span id="bubblingG_3">
	</span>
</div>
<script>
    $(function () {
        Annotate.init();


    })
</script>
</body>
</html>