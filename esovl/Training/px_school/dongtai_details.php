<?php
include("../../web_start.php");
include("px_step.php");
?>
<?php
$dblink->query("update pxmbnews set pxnclick=pxnclick+1 where pxnid=".$_GET["id"]);	
$rown = $dblink->find('pxmbnews','',"pxnid=".$_GET["id"]);	   
if($rown != ''){
}else{echo "<script>alert('没有此信息！');location.href='history.go(-1)';</script>";}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$rown["pxntitle"]?>-学校动态-<?=$pxs_name?></title>
<link href="css/px_school.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="wrapper"> 
  <!-- top -->
  <?php include('top.html');?>
  <!-- top emd  --> 
  
  <!-- mian  -->
  <?php include('left.html');?>
  <div class="school_mian_right">
    <div class="achool_jianjie_nr">
    	<div class="school_jianjie_bt">课程列表</div>
        <div class="school_jianjie_kuang">
          <div class="school_kaiban_bj" style="margin:12px;">
             <div class="text">
             	<h1><?=$rown["pxntitle"]?></h1>
                <h2>时间：<?=$rown["pxndate"]?>&nbsp;浏览量：<?=$rown["pxnclick"]?></h2>
                <span><?=$rown["pxncon"]?></span>
                <div class="fhlb"><a href="dongtai.php">返回列表>></a></div>
             </div>
          </div>
      </div>
    </div>
  </div>
  <!-- mian emd --> 
  <!-- bottom -->
  <?php include('bottom.html');?>
  <!-- bottom End --> 
</div>
</body>
</html>
