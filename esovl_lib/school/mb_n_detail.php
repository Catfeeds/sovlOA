<?php
include("../conn.php");
include("mb_step.php");
?>
<?php
mysql_query("update mbnews set nclick=nclick+1 where nid=".$_GET["id"]);
$rs1=mysql_query("select * from mbnews where nid=".$_GET["id"]);
$row1=mysql_fetch_assoc($rs1);
$show_name=$row1["ntitle"];//新闻标题
$show_con=$row1["ncon"];//新闻内容
$show_date=$row1["ndate"];//日期
$show_nclick=$row1["nclick"];//日期
$show_nclass=$row1["nclass"];

$rs2=mysql_query("select * from mbclass where n_id=".$show_nclass);
$row2=mysql_fetch_assoc($rs2);
$show_class=$row2["n_class"];//新闻类别
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $show_name;?>-<?php echo $show_class;?>-<?php echo $_SESSION["s_name"];?></title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/top.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/bottom.css" rel="stylesheet" type="text/css" />
<script src="js/js.js" type="text/javascript"></script>
</head>

<body>

<div class="wrapper">

<!-- top -->
<?php include("mb_top.html");?>
<!-- top end -->

<!-- main -->
<div class="main">
  <div class="main_xyjs">
  	<div class="main_xyjs_left">
    	<div class="weizhi">
       	您现在的位置：<?php echo $_SESSION["s_name"];?> >> <a href="mb_n_list.php?class=<?php echo $show_nclass;?>"><?php echo $show_class;?></a> >> <strong>详细</strong>
        </div>
    	<div class="main_xyjs_left_box01"><img src="images/left_top_bg.jpg" width="656" height="14" /></div>
        <div class="main_xyjs_left_box">
            <div class="main_zsjzxx">
            	<div class="main_zsjzxx_title">
                <h1><?php echo $show_name;?></h1>
                <h2 style="text-align:right; padding-right:20px;">发表于：<?php echo time_tran($show_date);?>&nbsp;&nbsp;浏览：<?php echo time_tran($show_nclick);?>次</h2>
              </div>
                <div class="main_zsjzxx_text"><span class="main_xyjs_left_box_text"><?php echo $show_con;?></span>
                    
              </div>
                <div class="main_zsjzxx_fhlb"><a href="mb_n_list.php?class=<?php echo $show_nclass;?>"><img src="images/fhlb.jpg" /></a></div>
                
            </div>
        </div>
        <div class="main_xyjs_left_box01"><img src="images/left_bottom_bg.jpg" width="656" height="14" /></div>
    </div>
      <?php include("mb_left.html");?>
  </div>
</div>
<!-- main end -->

<!-- bottom -->
<?php include("mb_bottom.html");?>
<!-- bottom end -->


</div>

</body>
</html>
