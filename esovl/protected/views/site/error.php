<?php
$this->pageTitle = "404";
Yii::app()->clientScript->registerCssFile("/css/hy.css");
?>
<div class="false_m">
    <div style="height:30px;font-size:14px;text-align:center; color:red;margin-top:50px;">您请求的页面不存在，<span id="time"></span>秒后返回首页！</div>
    <div class="fal_404" style="text-align:center;"><img src="<?=DOMAIN?>/images/404.gif"></div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    var maxTime = 5;
    $("#time").html(maxTime);
    setInterval(function(){
        maxTime --;
        $("#time").html(maxTime);
        if(maxTime==0){
            window.location.href="<?=DOMAIN?>";
        }
    },1000);
});
</script>