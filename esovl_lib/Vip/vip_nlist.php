<?php 
include_once("../conn.php");
include_once("../webstep.php");
?>
<?php 
if($_SESSION["yes"]!=571){
	echo "<script>alert('您没有登录');location.href='../vip_login.php';</script>";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一休网--会员新闻列表</title>
<link href="../css/css.css" rel="stylesheet" type="text/css" />
<link href="../css/top.css" rel="stylesheet" type="text/css" />
<link href="../css/main.css" rel="stylesheet" type="text/css" />
<link href="../css/bottom.css" rel="stylesheet" type="text/css" />
<link href="../css/vip.css" rel="stylesheet" type="text/css" />
<script src="../js/style.js"></script>
</head>

<body>

<div class="wrapper">

<!-- top -->
<?php 
include("../top/top_1.html");
include("../top/index_top1.html")
?>
<!-- top End -->

<!-- main -->
<div class="main">
	<div class="vip">
    	<div class="vip_title"><em>会员首页</em></div>
        <div class="vip_box">
<?php
include("vip_left.php");
?>
        </div>
            <div class="vip_box_right">
            	<div class="vip_box_right_ab00">

                          
<div class="vip_box_right_ab00">
 <?php              
$pagesize=15;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("SELECT * FROM vip_news");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数
if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
@$sql="select * from vip_news order by news_id asc limit $page $pagesize "; 
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
?>
  	<?php
	//开始循环
	$k=1;
	if (mysql_num_rows($rs)>=1){
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
?>   
<dl>
<dt><span><a href="vip_nedit.php?nid=<?php echo $row["news_id"];?>" ><?php echo $row["news_title"];?></a></span>......</dt>
<dd><?php echo $row["news_time"];?></dd>
</dl>
<?php }}?>
<div class="vip_box_right_b00aca">
<?php
if($num > $pagesize){
	echo "<a href=$url?cl=".@$_GET["cl"]."&page=1".">首页</a>&nbsp;|&nbsp;";
 if(@$pageval<=1)$pageval=1;
  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <a href=$url?cl=".@$_GET["cl"]."&page=".($pageval-1).">上一页</a>";
}else{
	echo "上一页";
}echo "&nbsp;";
if(@$_GET["page"]<$cp){
echo " <a href=$url?cl=".@$_GET["cl"]."&page=".($pageval+1).">下一页</a>";
}else{
echo "下一页";	
} 
echo "&nbsp;|&nbsp;<a href=$url?cl=".@$_GET["cl"]."&page=".($cp).">尾页</a>";
}
?>
当前第
<font color="#FF0000">
<?php 
if(@$_GET[page]<1){
echo "1";
}else{
echo "".@$_GET[page]."";
}
?>
</font>页，共<font color="#FF0000"><?php echo $cp;?></font>页，每页<font color="#FF0000"><?php echo $pagesize;?></font>条。
</div>
</div>         	
        </div> 
    </div>
</div>
<!-- main End -->
<!-- bottom -->
<?php include("../bottom/bottom.html");?>
<!-- bottom End --> 

</div>
</body>
</html>
