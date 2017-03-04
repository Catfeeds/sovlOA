<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>留学开课信息列表</TITLE>
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
    $sql="delete from lxkkinfo where lxk_id=".$_GET["id"];
	$rs=mysql_query($sql);
	if ($rs) echo"<script>alert('删除成功');location.href='lx_kclist.php';</script>";	
}

$pagesize=20;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("SELECT * FROM lxkkinfo");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from lxkkinfo order by lxk_gjid asc limit $page $pagesize "; 
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">留学开课信息：添加，修改资讯相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="lx_kcadd.php">添加留学开课信息</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="lx_kclist.php" >查看留学开课信息</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form action="" method="post" name="formDel">
  <tr>
    <td width="33" height="25" class="mian_right_box_title_01">ID</td>
	<td width="102" class="mian_right_box_title_01">留学国家</td>
	<td width="203" class="mian_right_box_title_01">招生学校</td>
	<td width="193" class="mian_right_box_title_01">开班名称</td>
	<td width="220" class="mian_right_box_title_01">专业名称</td>
	<td width="166" class="mian_right_box_title_01">学费</td>
	<td width="326" class="mian_right_box_title_01">推荐状态</td>
	<td width="91" align="center" class="mian_right_box_title_01">操作</td>
	</tr>
	
	<?php
	//开始循环
	if (mysql_num_rows($rs)>=1){
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
	     $rs1=mysql_query("select lxs_name from lxschool where lxs_id=".$row["lxk_sid"],$conn); 
		  $rw=mysql_fetch_assoc($rs1);
		  
		  $rs2=mysql_query("select lx_gjcl from lxgjclass where lx_gjid=".$row["lxk_gjid"],$conn); 
		  $rw2=mysql_fetch_assoc($rs2);	
    ?>
  <tr>
    <td width="33" height="29" bgcolor="#FFFFFF" class="title"><?php echo $row["lxk_id"];?></td>
	<td width="102" bgcolor="#FFFFFF" class="title"><?php echo $rw2["lx_gjcl"];?></td>
	<td width="203" bgcolor="#FFFFFF" class="title"><?php echo $rw["lxs_name"];?></td>
	<td width="193" bgcolor="#FFFFFF" class="title"><?php echo $row["lxk_title"];?></td>
	<td bgcolor="#FFFFFF" class="title"><?php echo $row["lxk_zy"];?></td>
	<td bgcolor="#FFFFFF" class="title"><?php echo $row["lxk_xuefei"];?></td>
	<td bgcolor="#FFFFFF" class="title"><?php if($row["lxk_tjbool"]==1){echo "是";}if($row["lxk_tjbool"]==0){echo "否";}?></td>
	<td width="91" align="center" bgcolor="#FFFFFF" class="title"><a href="lx_kcedit.php?id=<?php echo $row["lxk_id"];?>">修改</a> <a href="lx_kclist.php?del=ok&id=<?php echo $row["lxk_id"]?>" onClick="return confirm('是否将此信息删除?')">删除</a></td>
	</tr>
  <?php }}?>
  </form>
     <tr>
    <td height="29" colspan="13" align="center" bgcolor="#FFFFFF" class="title">
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
