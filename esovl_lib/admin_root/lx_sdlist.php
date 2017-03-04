<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>留学视点新闻信息列表</TITLE>
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
    $sql="delete from lxsdnews where lx_sdid=".$_GET["id"];
	$rs=mysql_query($sql);
	if ($rs) echo"<script>alert('删除成功');location.href=lx_sdlist.php';</script>";
}

$pagesize=20;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
if(isset($_POST["sdsou"])){
	$numq=mysql_query("SELECT * FROM lxsdnews where lx_sdtitle like '%".$_POST["sdsou"]."%'");
	}else{
	$numq=mysql_query("SELECT * FROM lxsdnews");
	}
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
if(isset($_POST["sdsou"])){
	@$sql="select * from lxsdnews as a join lxbclass as b on a.lx_sdbcl=b.lb_id join lxsclass as c on a.lx_sdscl=c.ls_id where lx_sdtitle like '%".$_POST["sdsou"]."%' limit $page $pagesize "; 
	}else{
		@$sql="select * from lxsdnews as a join lxbclass as b on a.lx_sdbcl=b.lb_id join lxsclass as c on a.lx_sdscl=c.ls_id limit $page $pagesize "; 
		}

	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">留学视点新闻信息：添加，修改资讯相关的内容</div></th>
  </tr>
  <tr> <form name="form1" method="post" action="">
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><font color="#0000FF">搜索：</font>     
        <input type="text" name="sdsou">
        <input name="seach" value="搜索" type="submit"></td></form>
</tr>
</table>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form action="" method="post" name="formDel">
  <tr>
    <td width="41" height="25" class="mian_right_box_title_01">ID</td>
    <td width="146" class="mian_right_box_title_01">视点大类</td>
    <td width="170" class="mian_right_box_title_01">视点小类</td>
	<td width="367" class="mian_right_box_title_01">信息标题</td>
	<td width="160" class="mian_right_box_title_01">来源</td>
	<td width="182" class="mian_right_box_title_01">更新时间</td>
	<td width="114" align="center"class="mian_right_box_title_01">人气</td>
	<td width="154" align="center" class="mian_right_box_title_01">操作</td>
  </tr>
	<?php
	//开始循环
	$k=1;
	if (mysql_num_rows($rs)>=1){
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){	    	  
	?>
  <tr>
    <td width="41" height="29" bgcolor="#FFFFFF" class="title"><?php echo $row["lx_sdid"];?></td>
    <td width="146" align="left" bgcolor="#FFFFFF" class="title"><?php echo $row["lb_title"];?></td>
    <td align="left" bgcolor="#FFFFFF" class="title"><?php echo $row["ls_title"];?></td>
	<td width="367" bgcolor="#FFFFFF" class="title"><a href="lx_sdedit.php?id=<?php echo $row["lx_sdid"];?>"><?php echo $row["lx_sdtitle"];?></a></td>
	<td width="160" align="left" bgcolor="#FFFFFF" class="title"><?=$row["lx_sdsource"]?></td>
	<td width="182" bgcolor="#FFFFFF" class="title"><?=$row["lx_sdate"]?></td>
	<td width="114" align="center" bgcolor="#FFFFFF" class="title"><?=$row["lx_sdclick"]?></td>
	<td width="154" align="center" bgcolor="#FFFFFF" class="title"><a href="lx_sdedit.php?id=<?php echo $row["lx_sdid"];?>">修改</a> <a href="lx_sdlist.php?del=ok&id=<?php echo $row["lx_sdid"]?>" onClick="return confirm('是否将此信息删除?')">删除</a></td>
	</tr>
  <?php }}?>
  </form>
     <tr>
    <td height="29" colspan="8" align="center" bgcolor="#FFFFFF" class="title">
      <?php
echo "共 $num 条";
if($num > $pagesize){
 if(@$pageval<=1)$pageval=1;

if(isset($_GET["nclass"])){
	if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <a href=$url?nclass=".$_GET["nclass"]."&page=".($pageval-1).">上一页</a>";
}
    for ($i=1;$i<=$cp;$i++){
		if ($i==@$_GET["page"]){
	   echo $i;
			}else{
	   echo "<a href=$url?nclass=".$_GET["nclass"]."&page=".$i.">[".$i."]</a>";
		}
	}
if(@$_GET["page"]<$cp){
echo " <a href=$url?nclass=".$_GET["nclass"]."&page=".($pageval+1).">下一页</a>";
}
	}else{
  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <a href=$url?page=".($pageval-1).">上一页</a>";
}
    for ($i=1;$i<=$cp;$i++){
		if ($i==@$_GET["page"]){
	   echo $i;
			}else{
	   echo "<a href=$url?page=".$i.">[".$i."]</a>";
		}
	}
if(@$_GET["page"]<$cp){
echo " <a href=$url?page=".($pageval+1).">下一页</a>";
}
}

 echo " ".@$_GET[page]."/".$cp."页";
} 
	 ?></td>
	</tr>
</table>
</BODY>
</HTML>
