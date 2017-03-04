<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>研修开课信息列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
</HEAD>
<?php include("../conn.php");?>
<BODY>
<?php
if (@$_COOKIE["a_class"]>1) {
echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
exit();
}
if (@$_GET["del"]=="ok"){
$sql="delete from yx_news where news_id=".$_GET["id"];
$rs=mysql_query($sql);
if ($rs) echo"<script>alert('删除成功');location.href='yx_kaoshi_news_list.php';</script>";
}
$pagesize=20;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("SELECT * FROM yx_news");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数
if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
@$sql="select * from yx_news order by news_id desc limit $page $pagesize"; 
$rs=mysql_query($sql,$conn);
if (!$rs){  
exit("数据库操作失败! 错误信息为:".mysql_error());
}
?>
<br>

<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form action="" method="post" name="formDel">
  <tr>
    <td width="33" height="25" class="mian_right_box_title_01">ID</td>
	<td width="102" class="mian_right_box_title_01">考试分类</td>
	<td width="203" class="mian_right_box_title_01">新闻标题</td>
	<td width="193" class="mian_right_box_title_01">更新时间</td>
	<td width="80" class="mian_right_box_title_01">人气</td>
	<td width="89" class="mian_right_box_title_01">操作</td>
	</tr>
<?php
//??????
$sql="select * from yx_news";
//?
$result=mysql_query($sql) or die($sql);
//?
while($read=mysql_fetch_array($result))
{
?>
<tr>
<td width="33" height="29" bgcolor="#FFFFFF" class="title"><?php echo $read["news_id"];?></td>
<td width="102" bgcolor="#FFFFFF" class="title"><?php echo $read["kaoshi_title"];?></td>
<td width="193" bgcolor="#FFFFFF" class="title"><?php echo $read["news_title"];?></td>
<td width="80" bgcolor="#FFFFFF" class="title"><?php echo $read["ndate"];?></td>
<td width="89" bgcolor="#FFFFFF" class="title"><?php echo $read["nclick"];?></td>
<td width="91" align="center" bgcolor="#FFFFFF" class="title"><a href="yx_kaoshi_news_update.php?id=<?php echo $read["news_id"];?>">修改</a> <a href="yx_kaoshi_news_list.php?del=ok&mid=<?php echo $mid;?>&id=<?php echo $read["news_id"]?>" onClick="return confirm('是否将此信息删除?')">删除</a></td>
</tr>
<?php
}
?>
</form>
<tr>
<td height="29" colspan="15" align="center" bgcolor="#FFFFFF" class="title">
<?php
echo "共 $num 条";
if($num > $pagesize){
 if(@$pageval<=1)$pageval=1;


  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <a href=$url?page=".($pageval-1).">上一页</a>";
}
for ($i=1;$i<=$cp;$i++){
echo " <a href=$url?page=".$i.">[".$i."]</a> ";
}
if(@$_GET["page"]<$cp){
echo " <a href=$url?page=".($pageval+1).">下一页</a>";
}
 echo " ".@$_GET[page]."/".$cp."页";
} 
?></td>
</tr>
</table>
</BODY>
</HTML>