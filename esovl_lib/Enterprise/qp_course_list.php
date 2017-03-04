<?php 
include_once("../conn.php");

?>

<?php
$sql="select * from qp_kaike where qpk_id=".$_GET["cl"];
		$rs=mysql_query($sql,$conn);
			if (mysql_num_rows($rs)>=1){	
		    $row=mysql_fetch_assoc($rs);
			$qpk_id=$row["qpk_id"];
			$qpk_num=$row["qpk_num"];
			$qpk_title=$row["qpk_title"];
			$npic=$row["npic"];
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>企培课程列表<?=$qpk_title?></title>
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
                	<span>企培课程</span>
                </div>
                <div class="main_left_box01_list00">
                	<div class="main_left_box01_Nlist">
<ul>
<?php
$sql="select * from qp_kaike order by qpk_num asc";
$rs=mysql_query($sql);
if (mysql_num_rows($rs)>=1){
while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
?>
<li><a href="qp_course_list.php?cl=<?php echo $row["qpk_id"];?>"><?php echo $row["qpk_title"];?></a></li>
<?php }}?>
</ul>
                </div>
                </div>
            </div>
        <?php include_once("left.php");?>
        </div>
        <div class="new_right">
        	<div class="new_right_box">
            	<div class="new_right_box_title">
                	<ul>
                    	<li class="t_icon"><strong><?=$qpk_num?></strong></li>
           		  <li class="t_title">
                        	<span class="t_cn"><?=$qpk_title?></span>
                            <span class="t_en">Language classes</span>
                      </li>
                                          <li class="t_wz">您现在的位置：
<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>">一休网</a> > <a href="../Enterprise">企培频道</a> > <a href="#"><strong>企培课程</strong></a></li>
                    </ul>
              	</div>
<div class="new_right_box_list_qpkc">
<div class="new_right_box_list_qpkc_l02">
<div class="new_right_box_list_qpkc_l_pic"><img src="../admin_root/<?=$npic?>" onLoad="javascript:if(this.width>=this.height&&this.width>=162){this.width=162};if(this.height>this.width&&this.height>=75){this.height=75};"></div>
<div class="new_right_box_list_qpkc_l_text">
<dl>
<dt>
<?=$qpk_title?></dt>
<?php 
$sql="select * from qp_kaike_class where qpk_id=".$_GET["cl"];
$rs=mysql_query($sql);
if (mysql_num_rows($rs)>=1){
while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
?>
<dd><a href="qp_course_detial.php?cl=<?php echo $row["kk_id"];?>"><?php echo $row["kk_title"];?></a></dd>
<?php }}?>                            
</dl>
</div>
</div>
</div>
                <div class="new_right_box_fy">
                	<dl><dt>&nbsp;</dt><dd><a href="qp_course.php">返回列表>></a></dd></dl>
                </div>
            </div>
        </div>
</div>
<!-- end main -->
<!-- strat bottom -->
<?php include_once("bottom.php");?>
<!-- end bottom -->
</div>
</div>
</body>
</html>