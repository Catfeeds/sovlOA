<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>培训开课信息列表</TITLE>
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
    $sql="delete from qp_kaike_class where kk_id=".$_GET["id"];
	$rs=mysql_query($sql);
	if ($rs) echo"<script>alert('删除成功');location.href='qp_kclist.php';</script>";	
}

$pagesize=15;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("SELECT * FROM qp_kaike_class");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from qp_kaike_class order by qpk_id desc, kk_id desc limit $page $pagesize "; 
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
	<td width="102" class="mian_right_box_title_01">开课类别</td>
	<td width="203" class="mian_right_box_title_01">开课名称</td>
	<td width="91" align="center" class="mian_right_box_title_01">操作</td>
	</tr>
	<?php
	//开始循环
	if (mysql_num_rows($rs)>=1){
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
	     $rs1=mysql_query("select * from qp_kaike where qpk_id=".$row["qpk_id"],$conn); 
		  $rw=mysql_fetch_assoc($rs1);     
    ?>
  <tr>
    <td width="33" height="29" bgcolor="#FFFFFF" class="title"><?php echo $row["kk_id"];?></td>
	<td width="102" bgcolor="#FFFFFF" class="title"><?php echo $rw["qpk_title"];?></td>
	<td width="203" bgcolor="#FFFFFF" class="title"><?php echo $row["kk_title"];?></td>


	<td width="91" align="center" bgcolor="#FFFFFF" class="title"><a href="qp_kcedit.php?id=<?php echo $row["kk_id"];?>">修改</a> <a href="qp_kclist.php?del=ok&id=<?php echo $row["kk_id"]?>" onClick="return confirm('是否将此信息删除?')">删除</a></td>
	</tr>
  <?php }}?>
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
