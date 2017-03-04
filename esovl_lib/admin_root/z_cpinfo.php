<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>企业信息列表</TITLE>
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
    $sql="delete from cpinfo where cp_id=".$_GET["id"];
	$rs=mysql_query($sql);
	if ($rs) echo"<script>alert('删除成功');location.href='z_cpinfo.php';</script>";
	
}

      $sql="select * from cpinfo";
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">企业信息：添加，修改介绍企业相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="z_infoadd.php">添加企业信息</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="z_cpinfo.php" >查看企业信息</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form action="" method="post" name="formDel">
  <tr>
    <td width="129" height="25" class="mian_right_box_title_01">ID</td>
	<td width="231" class="mian_right_box_title_01">信息标题</td>
	<td width="389" class="mian_right_box_title_01">信息banner</td>
	<td width="250" class="mian_right_box_title_01">更新时间</td>
	<td width="173" align="center"class="mian_right_box_title_01">人气</td>
	<td width="168" align="center" class="mian_right_box_title_01">操作</td>
	</tr>
	
	<?php
	//开始循环
	if (mysql_num_rows($rs)>=1){
		$k=0;
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
        $k=$k+1;
	?>
  <tr>
    <td width="129" height="29" bgcolor="#FFFFFF" class="title"><?php echo $row["cp_id"];?></td>
	<td width="231" bgcolor="#FFFFFF" class="title"><a href="z_infoedit.php?id=<?php echo $row["cp_id"];?>"><?php echo $row["cp_title"];?></a></td>
	<td width="389" bgcolor="#FFFFFF" class="title"><a href="z_infoedit.php?id=<?php echo $row["cp_id"];?>"><?php echo $row["cp_banner"];?></a><span style="color:#999"> 尺寸(px)：165x120</span> <span style="margin-left:20px; position:relative;" onMouseOver="document.getElementById('showlg<?=$k?>').style.display=''" onMouseOut="document.getElementById('showlg<?=$k?>').style.display='none'">预览
 <div id="showlg<?=$k?>" style="width:50px;height:50px; display:none; position:absolute; top:-120px;left:53px;"><img src="<?php echo $row["cp_banner"];?>" width="186" height="113" /></div>
        </span></td>
	<td width="250" bgcolor="#FFFFFF" class="title"><?php echo $row["cp_date"];?></td>
	<td width="173" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["cp_click"];?></td>
	<td width="168" align="center" bgcolor="#FFFFFF" class="title"><a href="z_infoedit.php?id=<?php echo $row["cp_id"];?>">修改</a> <a href="z_cpinfo.php?del=ok&id=<?php echo $row["cp_id"]?>" onClick="return confirm('是否将此信息删除?')">删除</a></td>
	</tr>
  <?php
   }
  }
   ?>
  </form>
</table>
</BODY>
</HTML>
