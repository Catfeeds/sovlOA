<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>下载留学资料列表</TITLE>
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
    $sql="delete from lxdown where lxd_id=".$_GET["id"];
	$rs=mysql_query($sql);
	if ($rs) echo"<script>alert('删除成功');location.href='lx_down_list.php?c=".$_GET["c"]."';</script>";
	
}

$pagesize=20;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];

	$numq=mysql_query("SELECT * FROM lxdown");

$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
	@$sql="select * from lxdown limit $page $pagesize ";
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误问题为:".mysql_error());
	  }
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">下载留学资料：添加，修改资讯相关的内容</div></th>
  </tr>
</table>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form action="" method="post" name="formDel">
  <tr>
    <td width="164" height="25" class="mian_right_box_title_01">ID</td>
	<td width="227" class="mian_right_box_title_01">问题标题</td>
	<td width="255" align="center"class="mian_right_box_title_01">留学资料类型</td>
    
	<td width="218" align="center" class="mian_right_box_title_01">操作</td>
  </tr>
	
	<?php
	//开始循环
	if (mysql_num_rows($rs)>=1){
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
   ?>
  <tr>
    <td width="164" height="29" bgcolor="#FFFFFF" class="title"><?php echo $row["lxd_id"];?></td>
	<td width="227" bgcolor="#FFFFFF" class="title"><a href="xl_down_edit.php?id=<?php echo $row["lxd_id"];?>"><?php echo $row["lxd_title"];?></a></td>
	<td width="255" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["lxd_file"];?></td>
    
	<td width="218" align="center" bgcolor="#FFFFFF" class="title"><a href="lx_down_edit.php?id=<?php echo $row["lxd_id"];?>">修改</a> <a href="lx_down_list.php?del=ok&id=<?php echo $row["lxd_id"]?>" onClick="return confirm('是否将此问题删除?')">删除</a></td>
	</tr>
  <?php }}?>
  </form>
     <tr>
    <td height="29" colspan="6" align="center" bgcolor="#FFFFFF" class="title">
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
