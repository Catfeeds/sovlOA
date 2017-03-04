<?php 
include_once("../conn.php");
include_once("../webstep.php");
?>
<?php
			mysql_query("update qp_news set nclick=nclick+1 where news_id=".$_GET["cl"],$conn);//更新浏览次数
			$sql="select * from qp_news where news_id=".$_GET["cl"];
			$rs=mysql_query($sql);
			$coun=mysql_num_rows($rs);
	/*		if ($coun>=1){*/
			$row=mysql_fetch_array($rs,MYSQL_ASSOC);
			$news_id=$row["news_id"];
			$news_class=$row["news_class"];
			$news_title=$row["news_title"];
			$news_con=$row["news_con"];
			$nclick=$row["nclick"];
			$nbool=$row["nbool"];
			$ndate=$row["ndate"];
			$news_zuozhe=$row["news_zuozhe"];
			 $rs1=mysql_query("select * from qp_news_class where class_id=".$row["news_class"]);
				 $row1=mysql_fetch_array($rs1,MYSQL_ASSOC);
				  $ction=$row1["class_title"]; 
				  $class_id=$row1["class_id"]; 
				  $class_num=$row1["class_num"];
				   $class_title=$row1["class_title"];
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
<title><?php echo $news_title;?>企培详细新闻</title>
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
while ($row=mysql_fetcsssssh_array($rs,MYSQL_ASSOC)){
$k=$k+1;
?>
<li><a href="qp_new_list.php?cl=<?php echo $row["class_id"];?>"><?PHP echo $row["class_title"];?></a></li>
<?PHP }}?>

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
                    <li class="t_icon"><strong><?php echo $class_num;?></strong></li>
           		  <li class="t_title">
                        	<span class="t_cn"><?php echo $class_title;?></span>
                            <span class="t_en">School News</span>
                        </li>
<li class="t_wz">您现在的位置：<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>">一休网</a> > <a href="../Enterprise">企培频道</a> > <a href="#">新闻详细页面</a> > <strong>详细</strong></li>
                    </ul>
              	</div>
                <div class="new_right_box_xx">
                	<h1><?php echo $news_title;?></h1>
                    <h2>发表于：<?php echo $ndate;?>  作者：<?php echo $news_zuozhe;?>来源：双威教育  浏览：<?php echo $nclick;?>次</h2>
                    <p>
                    <?php echo $news_con;?>
</p>
                </div>
                <div class="new_right_box_fy">
                	<dl><dt>&nbsp;</dt><dd><a href="qp_new_list.php?cl=<?php echo $class_id;?>">返回列表>></a></dd></dl>
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