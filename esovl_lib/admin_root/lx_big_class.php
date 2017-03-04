<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>留学大类列表</TITLE>
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
  
  if (isset($_POST["kcedit"])){//频道值是数值型
      $sql="update lxbclass set lb_title='".$_POST["lb_title"]."' where lb_id=".$_POST["lb_id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
	 
      echo"<script>alert('更新成功');location.href='lx_big_class.php';</script>";	
	  }else{
	  
	  exit("修改失败! 错误信息为:".mysql_error());
	  }
  }

  if (isset($_POST["zyadd"])){
      $sql="insert into lxbclass set lb_title='".$_POST["lb_title"]."'";
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('添加成功');location.href='lx_big_class.php';</script>";
	  }else{	  
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }
  
?> 
<br>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
  <tr>
    <td class="mian_right_box_title_01">类别ID：</td>
	<td class="mian_right_box_title_01">类别标题：</td>
<!--	<td class="mian_right_box_title_01">大类链接：</td>-->
	<td class="mian_right_box_title_01">操作</td>
  </tr>
	
	<?php
	  $sql="select * from lxbclass";
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

	<td width="228" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["lb_id"]?></td>
	
	<td width="314" bgcolor="#FFFFFF" class="title">
	  <input name="kcedit" value="editok" type="hidden">
	  <input name="lb_id" value="<?php echo $row["lb_id"]?>" type="hidden">
	  <input type="text" name="lb_title" id="lb_title" value="<?php echo $row["lb_title"]?>" maxlength="40" style="width:200px;"/></td>

<!--	<td width="153" bgcolor="#FFFFFF" class="title"><input type="text" name="lb_link" id="lb_link" value="< ?php echo $row["lb_link"]?>" maxlength="40" style="width:200px;"/></td>-->
    <td width="807" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" onClick="if(document.cform<?php echo $i;?>.lb_title.value==''){alert('标题为空');document.cform<?php echo $i;?>.lb_title.focus();return false;}" value="更新"></td>
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
    <td colspan="6" class="mian_right_box_title_01">【添加专业分类】</td>
	</tr>
	  <tr>
    <td width="230" height="33" align="right" bgcolor="#FFFFFF" class="title">新增类别标题：</td>
	<td width="283" bgcolor="#FFFFFF" class="title"><input name="zyadd" value="kcok" type="hidden"><input type="text" name="lb_title" id="lb_title" value="" maxlength="40" style="width:120px;"/></td>
	<!--<td width="98" bgcolor="#FFFFFF" class="title">(可选填)链接地址：</td>
	<td width="212" bgcolor="#FFFFFF" class="title"><input type="text" name="lb_link" id="lb_link" value="< ?php echo $row["lb_link"]?>" maxlength="40" style="width:200px;"/></td>-->
    <td width="836" bgcolor="#FFFFFF" class="title">
	<input type="submit" onClick="if(document.formclass.lb_title.value==''){alert('标题为空');document.formclass.lb_title.focus();return false;}if(document.formclass.lb_pindao.value=='0'){alert('请选择频道');document.formclass.lb_pindao.focus();return false;}" name="Submit" value="添加"><font color="red">(因数据关联，不提供删除，请勿随意添加)</font></td>
	  </tr>
  </form>
</table>
</div>
</BODY>
</HTML>
