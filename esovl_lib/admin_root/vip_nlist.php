<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>会员版新闻信息列表</TITLE>
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
    $sql="delete from vip_news where news_id=".$_GET["id"];
	$rs=mysql_query($sql);
	if ($rs) echo"<script>alert('删除成功');location.href='vip_nlist.php';</script>";
}
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
@$sql="select * from vip_news order by news_id desc limit $page $pagesize ";  
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" colspan="3" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">会员版新闻信息：添加，修改资讯相关的内容</div></th>
  </tr>

</table>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form action="" method="post" name="formDel">
  <tr>
    <td width="130" height="31" class="mian_right_box_title_01" align="center">ID</td>
    <td width="437" class="mian_right_box_title_01" align="center">新闻标题</td>
	<td width="348" class="mian_right_box_title_01" align="center">发布时间</td>	
	<td width="205" align="center" class="mian_right_box_title_01" align="center">操作</td>
	</tr>
<?php
	//开始循环
	$k=1;
	if (mysql_num_rows($rs)>=1){
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
	     $rs1=mysql_query("select * from vip_news ",$conn); 
		  $rw=mysql_fetch_array($rs1,MYSQL_ASSOC);
?>
  <tr>
    <td width="130" height="29" bgcolor="#FFFFFF" class="title" align="center"><?php echo $row["news_id"];?></td>
    <td width="437" bgcolor="#FFFFFF" class="title" align="center"><a href="vip_nedit.php?id=<?php echo $row["news_id"];?>"><?php echo $row["news_title"];?></a></td>
	<td width="348" bgcolor="#FFFFFF" class="title" align="center"><?php echo $row["news_time"];?></td>

	
	
<td width="205" align="center" bgcolor="#FFFFFF" class="title"><a href="vip_nedit.php?id=<?php echo $row["news_id"];?>">修改</a> <a href="vip_nlist.php?del=ok&id=<?php echo $row["news_id"]?>" onClick="return confirm('是否1将此信息删除?')">删除</a></td>
</tr>
<?php
}}
?>
</form>
<tr>
    <td height="29" colspan="8" align="center" bgcolor="#FFFFFF" class="title">
<?php
echo "共 $num 条";
if($num > $pagesize){
 if(@$pageval<=1)$pageval=1;
  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <a href=$url?page=".($pageval-1).">上一页</a>";
}
for ($i=1;$i<=$cp;$i++){
echo " <a href=$url?page=".$i.">[".$i."]</a>";
}
if(@$_GET["page"]<$cp){
echo " <a href=$url?page=".($pageval+1).">下一页</a>";
}
 echo " ".@$_GET[page]."/".$cp."页";
} 
?>
</td>
</tr>
</table>
</BODY>
</HTML>