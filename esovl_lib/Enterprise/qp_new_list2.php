<?php 
include_once("../conn.php");

?>
<?php
$sql="select * from qp_news_class where class_id=".$_GET["cl"];
		$rs=mysql_query($sql,$conn);
		if (mysql_num_rows($rs)>=1){	
		    $row=mysql_fetch_assoc($rs);
						$class_title=$row["class_title"];
						$class_num=$row["class_num"];
						$class_id=$row["class_id"];
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>企培新闻列表</title>
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
            	<div class="new_right_box_title">
                	<ul>
                    	<li class="t_icon"><strong><?php echo $class_num;?></strong></li>
           		  <li class="t_title">
                        	<span class="t_cn"><?php echo $class_title;?></span>
                            <span class="t_en">School News</span>
                        </li>
                      <li class="t_wz">您现在的位置：<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>">一休网</a> > <a href="../Enterprise">企培频道</a> > <a href="#"><strong>新闻中心列表</strong></a></li>
                    </ul>
</div>
<div class="new_right_box_list">
<?php
$pagesize=15;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$_SESSION["cl"]=@$_GET["cl"];
$numq=mysql_query("SELECT * FROM qp_news where news_class=".$_GET["cl"]);
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数
if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from qp_news where news_class=".$_GET["cl"]." order by news_id desc limit $page $pagesize "; 
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	 if (mysql_num_rows($rs)>=1){
	 $i=0;
	 while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
     $i=$i+1;	 
?>
<dl>
<dt>
<a href="qp_new_detial.php?cl=<?php echo $row["news_id"];?>"><?php echo utf_substr($row["news_title"],100);?></a>
</dt>
<dd><?php echo $row["ndate"];?>
</dd>
</dl>
<?php }}?>
</div>
<div class="new_right_box_fy">
<dl><dt>
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
?></dt><dd>第<span>
<?php 
if(@$_GET[page]<1){
echo "1";
}else{
echo "".@$_GET[page]."";
}
?>
</span>页，共<span><?php echo $cp;?></span>页，每页<span><?php echo $pagesize;?></span>条。</dd></dl>
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