<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>培训版文章分类列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
</HEAD>
<?php include("../conn.php");?>
<script type="text/javascript" src="lgHttp.js"></script>
<BODY>
<?php
if (!isset($_POST["nedit"])){
	$mid=$_GET['id'];
	if ($mid==""){
		exit;
	}
}

if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}
  
  if (isset($_POST["nedit"])){
      $sql="update enclass set n_class='".$_POST["n_class"]."' where n_id=".$_POST["n_id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
	 
      echo"<script>alert('更新成功');location.href='exl_nclass.php?id=".$_POST["mid"]."';</script>";	  
	  }else{
	  
	  exit("修改失败! 错误信息为:".mysql_error());
	  }
  }

  if (isset($_POST["nadd"])){
      $sql="insert into enclass set n_class='".$_POST["n_class"]."',n_type='$mid'";
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('添加成功');location.href='exl_nclass.php?id=".$_POST["mid"]."';</script>";	  
	  }else{	  
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }
  
    if (isset($_GET["kcdel"])){
      $sql="delete from enclass where n_id=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
	 
      echo"<script>alert('删除成功');location.href='px_nclass.php?id=".$_GET["mid"]."';</script>";	  
	  }else{
	  
	  exit("删除失败! 错误信息为:".mysql_error());
	  }
  }
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">培训版文章分类：添加，修改</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow">&nbsp;</td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
  <tr>
    <td colspan="5" class="mian_right_box_title_01">【培训版文章分类列表】</td>
	</tr>
	<?php
	  $sql="select * from enclass where n_type='$mid' order by n_id asc";
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	 
	     if(mysql_num_rows($rs)>=1){
		 $i=0;
		     while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
			 $i=$i+1;
			 ?>
	
	<form name="cform<?php echo $i?>" method="post" onSubmit="return nclass()" action="qp_nclass.php?id=<?php echo $mid;?>">
	  <tr>
    <td width="205" height="33" align="right" bgcolor="#FFFFFF" class="title">分类ID：</td>
	<td width="102" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["n_id"]?></td>
	<td width="103" align="right" bgcolor="#FFFFFF" class="title">分类标题：</td>
	<td width="486" colspan="-2" bgcolor="#FFFFFF" class="title">
	  <input name="nedit" value="editok" type="hidden">
      <input name="mid" value="<?php echo $mid;?>" type="hidden">
	  <input name="n_id" value="<?php echo $row["n_id"]?>" type="hidden">
	  <input type="text" name="n_class" id="n_class" value="<?php echo $row["n_class"]?>" maxlength="40" style="width:300px;"/></td>
    <td width="432" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" onClick="if(document.cform<?php echo $i;?>.n_class.value==''){alert('标题为空');document.cform<?php echo $i;?>.n_class.focus();return false;}" value="更新">　　　<a href="?kcdel=ok&mid=<?php echo $mid;?>&id=<?php echo $row["n_id"]?>" onClick="return confirm('谨慎！确定删除?')">删除</a></td>
	  </tr>
  </form>
  <?php
}}}
	?>
</table>
</div>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="formclass" method="post" action="">
  <tr>
    <td colspan="3" class="mian_right_box_title_01">【添加新闻分类】</td>
	</tr>
	  <tr>
    <td width="412" height="33" align="right" bgcolor="#FFFFFF" class="title">新增分类标题：</td>
	<td width="347" colspan="-2" bgcolor="#FFFFFF" class="title"><input name="nadd" value="nok" type="hidden"><input type="text" name="n_class" id="n_class" value="" maxlength="40" style="width:300px;"/></td>
    <td width="571" bgcolor="#FFFFFF" class="title">
	<input type="submit" onClick="if(document.formclass.n_class.value==''){alert('标题为空');document.formclass.n_class.focus();return false;}" name="Submit" value="添加">
    <input name="mid" value="<?php echo $mid;?>" type="hidden"></td>
	  </tr>
  </form>
</table>
</div>
</BODY>
</HTML>
