<?php
include("../../web_start.php");
include("px_step.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$pxs_name?>-机构分校</title>
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
    	<div class="school_jianjie_bt">机构分校</div>
        <div class="school_jianjie_kuang">
  <div style="clear:both; padding:15px;"><?=$pxmb_jgfx?></div>
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
