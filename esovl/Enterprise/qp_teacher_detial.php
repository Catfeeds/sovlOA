<?php 
include_once("../conn.php");
include_once("../webstep.php");
?>
<?php
$sql="select * from qp_teacher where teacher_id=".$_GET["id"];
		$rs=mysql_query($sql,$conn);
		if (mysql_num_rows($rs)>=1){	
		    $row=mysql_fetch_assoc($rs);
						$teacher_id=$row["teacher_id"];
						$teacher_con=$row["teacher_con"];
						$teacher_zhuanye=$row["teacher_zhuanye"];
						$npic=$row["npic"];
						$teacher_name=$row["teacher_name"];
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $teacher_name;?>企培教师风采详细</title>
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
                <span>教师风采</span>
                </div>
                <div class="main_left_box01_list00">
                	<div class="main_left_box01_Nlist">
                      <ul>
                      <li><a href="qp_teacher.php">教师风采</a></li>
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
                    	<li class="t_icon"><strong>1</strong></li>
           		  <li class="t_title">
                        	<span class="t_cn">教师风采</span>
                            <span class="t_en">Teacher style</span>
                   </li>
                    <li class="t_wz">您现在的位置：<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>">一休网</a> > <a href="../Enterprise">企培频道</a> > <a href="qp_teacher_detial.php"><strong>教师风采</strong></a></li>
                    </ul>
              	</div><?php echo $row["titlec"];?>
                <div class="new_right_box_list_jsfc">
                    <div class="new_right_box_list_jsfc_l02">
                        <!-- pic size:116*135px -->
                        <div class="new_right_box_list_jsfc_l_pic"><a href="#"><img src="../admin_root/<?php echo $npic;?>" /></a></div>
                        <div class="new_right_box_list_jsfc_l_text">
                            <p class="msfc">
                           <a href="#"><?php echo $teacher_name;?><br><span><?php echo $teacher_zhuanye;?></span></a>
                           <?php echo $teacher_con;?>
                            </p>
                        </div>
                     </div>
                </div>
                <div class="new_right_box_fy">
                	<dl><dt>&nbsp;</dt><dd><a href="qp_teacher.php">返回列表>></a></dd></dl>
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