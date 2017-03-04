<?php
include("../../web_start.php");
include("px_step.php");
?>
<?php
$row = $dblink->find('szfencai','',"sz_id=".$_GET["sid"]);
	if($row != ''){          
	$sz_class=$row["sz_class"];
	$sz_info=$row["sz_info"];
	$sz_name=$row["sz_name"];
	$sz_pic=$row["sz_pic"];
	$sz_date=$row["sz_date"];
	}else{
	  echo"<script>alert('没有此信息！');location.href='history.go(-1)';</script>";
	  }       
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$pxs_name?>-<?=$sz_class?></title>
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
    	<div class="school_jianjie_bt"><?=$sz_class?></div>
      <div class="school_jianjie_kuang">
	  	<div class="school_jianjie_tu"><img src="../../admin_root/<?=$sz_pic?>" onload="javascript:if(this.width>this.height&&this.width>=240){this.width=240};if(this.height>this.width&&this.height>=259){this.height=259};"/></div>
		<div class="school_jianjie_xingm"><strong>名称</strong>：
		  <?=$sz_name?>&nbsp;&nbsp;<?=$sz_date?><br />
        <strong>详细介绍</strong>：<br /><?=$sz_info?></div>
</div> </div>
  </div><?php if($sz_class=="师资介绍"){$sc="shizi";}if($sz_class=="学校环境"){$sc="huanjin";}?>[<a href="shizi.php?t=<?=$sc?>">返回列表</a>]
  <!-- mian emd --> 
  <!-- bottom -->
  <?php include('bottom.html');?>
  <!-- bottom End --> 
</div>
</body>
</html>
