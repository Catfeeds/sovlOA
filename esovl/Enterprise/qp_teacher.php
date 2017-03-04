<?php 
include_once("../conn.php");
include_once("../webstep.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>企培教师风采</title>
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
                      <li class="t_wz">您现在的位置：<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>">一休网</a> > <a href="../Enterprise">企培频道</a> > <a href="qp_teacher.php"><strong>教师风采</strong></a></li>
                    </ul>
              	</div>
                <div class="new_right_box_list_jsfc">
<?php
$pagesize=7;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$_SESSION["cl"]=@$_GET["cl"];
$numq=mysql_query("SELECT * FROM qp_teacher ");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数
if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from qp_teacher order by teacher_id desc limit $page $pagesize "; 
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	 if (mysql_num_rows($rs)>=1){
	 $i=0;
	 while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
     $i=$i+1;	 
?>
                    <div class="new_right_box_list_jsfc_l">
                          <!-- pic size:116*135px -->
                            <div class="new_right_box_list_jsfc_l_pic"><a href="qp_teacher_detial.php?id=<?php echo $row["teacher_id"];?>"><img src="../admin_root/<?php echo $row["npic"];?>" onLoad="javascript:if(this.width>=this.height&&this.width>=166){this.width=116};if(this.height>this.width&&this.height>=135){this.height=135};"/></a></div>
                            <div class="new_right_box_list_jsfc_l_text">
                                <p class="msfc">
                                <a href="qp_teacher_detial.php?id=<?php echo $row["teacher_id"];?>"><?php echo $row["teacher_name"];?><br><span><?php echo $row["teacher_zhuanye"];?></span></a>
                                <strong>讲师介绍：</strong>
                             <?php echo utf_substr($row["teacher_con"],280);?>..<a href="qp_teacher_detial.php?id=<?php echo $row["teacher_id"];?>">查看详细..</a> 
                                </p>
                            </div>
                      </div>
<?php }}?>
                </div>
                <div class="new_right_box_fy">
                	<dl><dt>
<?php
if($num > $pagesize){
	echo "<a href=$url?page=".(1).">首页</a>&nbsp;|&nbsp;";
 if(@$pageval<=1)$pageval=1;
  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <a href=$url?page=".($pageval-1).">上一页</a>";
}else{
	echo "上一页";
}echo "&nbsp;";
if(@$_GET["page"]<$cp){
echo " <a href=$url?page=".($pageval+1).">下一页</a>";
}else{
echo "下一页";	
} 

 echo "&nbsp;|&nbsp;<a href=$url?page=".($cp).">尾页</a>";
}
?></dt><dd>第<span><?php 
if(@$_GET[page]<1){
echo "1";
}else{

echo "".@$_GET[page]."";
}
?></span>页，共<span>
<?php echo $cp;?></span>页，每页<span><?php echo $pagesize;?></span>条。</dd></dl>
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