<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>会员信息列表</TITLE>
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
    $sql="delete from vip where v_id=".$_GET["id"];
	$rs=mysql_query($sql);
	if ($rs) echo"<script>alert('删除成功');location.href='vip_list.php';</script>";
	
}

$pagesize=20;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("SELECT * FROM vip");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from vip order by v_date desc limit $page $pagesize ";     
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">会员信息：删除，修改</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="vip_list.php" >查看会员列表</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form action="" method="post" name="formDel">
  <tr>
    <td width="125" height="25" class="mian_right_box_title_01">ID</td>
	<td width="236" class="mian_right_box_title_01">会员账号</td>
	<td width="180" class="mian_right_box_title_01">会员电话</td>
	<td width="233" class="mian_right_box_title_01">会员邮箱</td>
	<td width="94" class="mian_right_box_title_01">会员等级</td>
	<td width="91" class="mian_right_box_title_01">会员状态</td>
	<td width="178" align="center"class="mian_right_box_title_01">注册时间</td>
	<td width="178" align="center" class="mian_right_box_title_01">操作</td>
	</tr>
	
	<?php
	//开始循环
	if (mysql_num_rows($rs)>=1){
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){	     		  
	?>
  <tr>
    <td width="125" height="29" bgcolor="#FFFFFF" class="title"><?php echo $row["v_id"];?></td>
	<td width="236" bgcolor="#FFFFFF" class="title"><a href="vip_edit.php?id=<?php echo $row["v_id"];?>"><?php echo $row["v_name"];?></a></td>
	<td width="180" bgcolor="#FFFFFF" class="title"><?php echo $row["v_tel"];?></td>
	<td width="233" bgcolor="#FFFFFF" class="title"><?php echo $row["v_email"];?></td>
	<td width="94" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["v_class"];?></td>
	<td width="91" align="center" bgcolor="#FFFFFF" class="title">
	<?php if($row["v_strus"]==0){echo"<img src='images/open.gif' width='20' height='20' alt='正常'>";}if($row["v_strus"]==1){echo"<img src='images/close.gif' width='20' height='20' alt='锁定中'>";}	?></td>
	<td width="178" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["v_date"];?></td>
	<td width="178" align="center" bgcolor="#FFFFFF" class="title"><a href="vip_edit.php?id=<?php echo $row["v_id"];?>">修改</a> <a href="vip_list.php?del=ok&id=<?php echo $row["v_id"]?>" onClick="return confirm('是否将此信息删除?')">删除</a></td>
	</tr>
  <?php
   }
  }
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
