<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>课程大类列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
</HEAD>
<?php include("../conn.php");?>
<script type="text/javascript" src="lgHttp.js"></script>
<BODY>
<?php

if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}
  
  if (isset($_POST["kcedit"])){
      $sql="update kcbname set kc_bname='".$_POST["kc_bname"]."' where kc_id=".$_POST["kc_id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
	 
      echo"<script>alert('更新成功');location.href='kc_bname.php';</script>";	  
	  }else{
	  
	  exit("修改失败! 错误信息为:".mysql_error());
	  }
  }

  if (isset($_POST["kcadd"])){
      $sql="insert into kcbname set kc_bname='".$_POST["kc_bname"]."'";
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('添加成功');location.href='kc_bname.php';</script>";	  
	  }else{	  
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }
  
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">课程大类：添加，修改</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="kc_bname.php" >查看课程大类列表</a><a href="kc_sname.php"></a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="kc_sname.php" >查看课程小类列表</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
  <tr>
    <td class="mian_right_box_title_01">大类ID：</td>
	<td class="mian_right_box_title_01">大类标题：</td>
	<td class="mian_right_box_title_01">操作</td>
  </tr>
	
	<?php
	  $sql="select * from kcbname";
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	 
	     if(mysql_num_rows($rs)>=1){
		 $i=0;
		     while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
			 $i=$i+1;
			 ?>
	
	<form name="cform<?php echo $i?>" method="post" onSubmit="return nclass()" action="">
	  <tr>

	<td width="102" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["kc_id"]?></td>
	
	<td width="486" colspan="-2" bgcolor="#FFFFFF" class="title">
	  <input name="kcedit" value="editok" type="hidden">
	  <input name="kc_id" value="<?php echo $row["kc_id"]?>" type="hidden">
	  <input type="text" name="kc_bname" id="kc_bname" value="<?php echo $row["kc_bname"]?>" maxlength="40" style="width:300px;"/></td>
    <td width="432" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" onClick="if(document.cform<?php echo $i;?>.kc_bname.value==''){alert('标题为空');document.cform<?php echo $i;?>.kc_bname.focus();return false;}" value="更新"></td>
	  </tr>
  </form>
  <?php
			 }
		 }
	  }
	?>
</table>
</div>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="formclass" method="post" action="">
  <tr>
    <td colspan="3" class="mian_right_box_title_01">【添加课程分类】</td>
	</tr>
	  <tr>
    <td width="412" height="33" align="right" bgcolor="#FFFFFF" class="title">新增大类标题：</td>
	<td width="347" colspan="-2" bgcolor="#FFFFFF" class="title"><input name="kcadd" value="kcok" type="hidden"><input type="text" name="kc_bname" id="n_class" value="" maxlength="40" style="width:300px;"/></td>
    <td width="571" bgcolor="#FFFFFF" class="title">
	<input type="submit" onClick="if(document.formclass.kc_bname.value==''){alert('标题为空');document.formclass.kc_bname.focus();return false;}" name="Submit" value="添加"></td>
	  </tr>
  </form>
</table>
</div>
</BODY>
</HTML>
