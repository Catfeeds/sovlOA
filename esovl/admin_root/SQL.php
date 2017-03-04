<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<body>
<?php
$pagesize=15;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$_SESSION["cl"]=@$_GET["cl"];
$numq=mysql_query("SELECT * FROM qp_news where news_class=".$_GET["cl"]);
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//获取总的页数
if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
echo "";
      @$sql="select * from qp_news where news_class=".$_GET["cl"]." order by news_id desc limit $page $pagesize";
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	 if (mysql_num_rows($rs)>=1){
	 while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
?>
<?php }}?>
</body>
</html>