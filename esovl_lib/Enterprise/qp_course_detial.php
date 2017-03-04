<?php 
include_once("../conn.php");

?>
<?php
			$sql="select * from qp_kaike_class where kk_id=".$_GET["cl"];
			$rs=mysql_query($sql);
			$coun=mysql_num_rows($rs);
	/*		if ($coun>=1){*/
			$row=mysql_fetch_array($rs,MYSQL_ASSOC);
			$kk_id=$row["kk_id"];
			$kk_title=$row["kk_title"];
			$qpk_id_class=$row["qpk_id"];
			$kk_kcts=$row["kk_kcts"];
			$kk_pxmb=$row["kk_pxmb"];
			$kk_jcts=$row["kk_jcts"];
			$kk_xxjb=$row["kk_xxjb"];
			$kk_sfbt=$row["kk_sfbt"];
			 $rs1=mysql_query("select * from qp_kaike where qpk_id=".$row["qpk_id"]);
				 $row1=mysql_fetch_array($rs1,MYSQL_ASSOC);
				  $qpk_title=$row1["qpk_title"]; 
				  $npic=$row1["npic"]; 
				  $qpk_num=$row1["qpk_num"];
/*		
			}else{
			exit("对不起，没有找到相关信息！");
			}
			mysql_free_result($rs1);
			mysql_free_result($rs);*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>企培课程详细<?=$kk_title?></title>
<link href="css/qpcss.css" rel="stylesheet" type="text/css" />
<link href="css/qptop.css" rel="stylesheet" type="text/css" />
<link href="css/qpmain.css" rel="stylesheet" type="text/css" />
<link href="css/qpbottom.css" rel="stylesheet" type="text/css" />
<!--<script src="js/style.js" language="javascript" type="text/javascript"></script>-->
<script src="js/jquery.js" language="javascript" type="text/javascript"></script>
<script src="js/jquery_code.js" language="javascript" type="text/javascript"></script>
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
                      <li class="t_wz">您现在的位置：<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>">一休网</a> > <a href="../Enterprise">企培频道</a> > <a href="#"><strong>企培课程</strong></a></li>
                    </ul>
              	</div>
                <div class="new_right_box_list_qpkcxx">
                  	<div class="new_right_box_list_qpkcxx_left">
               	  		<div class="new_right_box_list_qpkcxx_left_pic"><img src="../admin_root/<?=$npic?>" onLoad="javascript:if(this.width>=this.height&&this.width>=162){this.width=162};if(this.height>this.width&&this.height>=75){this.height=75};"></div>
                  		<div class="new_right_box_list_qpkcxx_left_pic"><a href="qp_wsbm.php?id=<?php echo $kk_id;?>"><img src="images/zxbm.jpg"></a></div>
                  	</div>
                    <div class="new_right_box_list_qpkcxx_right">
                    	<div class="new_right_box_list_qpkcxx_right_box">
                        	<div class="new_right_box_list_qpkcxx_right_box_title">
                            	<span><?=$kk_title?></span>
                            </div>
                            <div class="new_right_box_list_qpkcxx_right_box_l">
                            	<div class="new_right_box_list_qpkcxx_right_box_l_t">
                                	<ul>
                                    	<li class="xxk01">课程特色</li>
                                        <li>培训目标</li>
                                        <li>教材特色</li>
                                        <li>学习级别</li>
                                        <li>收费标准</li>
                                    </ul>
                                </div>
                                <div class="new_right_box_list_qpkcxx_right_box_l_b">
                                	<div>
                                	<div class="xxk"><?=$kk_kcts;?></div>
                                    </div>
                                    <div class="hide">
                                    <div class="xxk"><?=$kk_pxmb;?></div>
                                    </div>
                                    <div class="hide">
                                	<div class="xxk"><?=$kk_jcts;?></div>
                                    </div>
                                    <div class="hide">
                                    <div class="xxk"><?=$kk_xxjb;?></div>
                                    </div>
                                    <div class="hide">
                                    <div class="xxk"><?=$kk_sfbt;?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="new_right_box_fy">
                	<dl><dt>&nbsp;</dt><dd><a href="#">返回列表>></a></dd></dl>
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