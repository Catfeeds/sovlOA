<?php 
include_once("../conn.php");

include_once("xl_webstep.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>资讯中心-学历教育-<?php echo $xl_title;?></title>
<base href="http://<?php echo $_SERVER['SERVER_NAME'];?>">
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/top.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/bottom.css" rel="stylesheet" type="text/css" />
<script src="js/style.js"></script>
</head>
<body>
<div class="wrapper">
<!-- top -->
<div class="top">
<?php 
	include("../top/top_1.html");
	include("../top/xl_top.html");
	?>     
</div>
<!-- top End -->

<!-- main -->
<div class="main">
	
    <div class="main_news">
      <?php include("xl_news_left.html");?>
      <div class="main_news_right">
<div class="main_news_right_box01">
            	<ul>
                <li>您现在的位置：</li>
                <li><a href="/">首页</a><span>>></span></li>
                <li><a href="#">资讯中心</a><span>>></span></li>
                <li><strong>全部</strong></li>
                </ul>
            </div>
 <div class="main_news_right_box02">
<?php
$pagesize=10;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("SELECT * FROM ennews");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from ennews order by nclass, ndate desc limit $page $pagesize ";     
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	  
	 if (mysql_num_rows($rs)>=1){
	 $i=0;
	 while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
     $i=$i+1;
	 
	         $rs2=mysql_query("select * from enclass where n_id=".$row["nclass"]);
			 $row1=mysql_fetch_assoc($rs2);
			 
?>
     <dl><dt>[<?php echo $row1["n_class"];?>]<a href="news_detail.php?id=<?php echo $row["nid"];?>"><?php echo $row["ntitle"];?></a></dt>
	 <dd>[<?php echo date("Y-m-d",strtotime($row["ndate"]));?>]</dd></dl>
        <?php
		}}
		?>           
            </div>
            <div class="main_news_right_box03">
            	<div class="main_news_right_box03_left">
<?php
echo "共 $num 条信息";
if($num > $pagesize){
 if(@$pageval<=1)$pageval=1;

  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <a href=$url?page=".($pageval-1).">上一页</a>";
}
    for ($i=1;$i<=$cp;$i++){
	     if ($i==@$_GET["page"]){
		 echo " ".$i." ";
		 }else{
	     echo " <a href=$url?page=".$i.">[".$i."]</a> ";
		 }
	}
if(@$_GET["page"]<$cp){
echo " <a href=$url?page=".($pageval+1).">下一页</a>";
}

} 
?>
                </div>
                <div class="main_news_right_box03_right">
                	当前第<span><?php echo @$_GET[page];?></span>页，共<span><?php echo $cp;?></span>页，每页显示<span><?php echo $pagesize;?></span>条
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