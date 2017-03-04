<?php 
include_once("../conn.php");

?>
<?php
$sql="select * from qp_zhongxin";
		$rs=mysql_query($sql,$conn);
		if (mysql_num_rows($rs)>=1){	
		    $row=mysql_fetch_assoc($rs);
						$qp_con=$row["qp_con"];
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>企培中心</title>
<link href="css/qpcss.css" rel="stylesheet" type="text/css" />
<link href="css/qptop.css" rel="stylesheet" type="text/css" />
<link href="css/qpmain.css" rel="stylesheet" type="text/css" />
<link href="css/qpbottom.css" rel="stylesheet" type="text/css" />
<!--<script src="js/style.js" language="javascript" type="text/javascript"></script>-->
</head>

<body>
<div id="wrapper_bg">
<div class="wrapper">
	<!-- strat top -->
	<?php	include_once("top.php");?>
    <!-- end top -->
    <!-- strat main -->
    <div class="main">
    	<div class="new_left">
        	<div class="main_left_box01">
            	<div class="main_left_box01_Ntitle">
                	<span>新闻中心</span>
                </div>
                <div class="main_left_box01_list00">
                	<div class="main_left_box01_Nlist">
                      <ul>
<?php
$sql="select * from qp_news_class";
$rs=mysql_query($sql);
if (mysql_num_rows($rs)>=1){
$k=0;
while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
$k=$k+1;
?>
                          <li><a href="qp_new_list2.php?cl=<?php echo $row["class_id"];?>"><?PHP echo $row["class_title"];?></a></li>
<?PHP }}?>
                      </ul>
                    </div>
                </div>
            </div>
            <?php include_once("left.php");?>
            
        </div>
        <div class="new_right">
        	<div class="new_right_box">
            	
                <div class="new_right_box_xx">
                	<h1>企培中心</h1>
                    <h2>	</h2>
                    <p>
<?php echo $qp_con;?>
</p>
                </div>
                <div class="new_right_box_fy">
                	<dl><dt>&nbsp;</dt><dd><a href="http://<?php echo $_SERVER['SERVER_NAME'];?>">返回首页>></a></dd></dl>
                </div>
            </div>
        </div>
    </div>
    <!-- end main -->
    <!-- strat bottom -->
     <?php	include_once("bottom.php");?>
    <!-- end bottom -->
</div>
</div>
</body>
</html>