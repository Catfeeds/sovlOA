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

if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}
  
  if (isset($_POST["nedit"])){
      $sql="update pxmbclass set pxn_class='".$_POST["pxn_class"]."' where pxn_id=".$_POST["pxn_id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
	 
      echo"<script>alert('更新成功');location.href='pxmb_nclass.php';</script>";	  
	  }else{	  
	  exit("修改失败! 错误信息为:".mysql_error());
	  }
  }

  if (isset($_POST["nadd"])){
      $sql="insert into pxmbclass set pxn_class='".$_POST["pxn_class"]."'";
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('添加成功');location.href='pxmb_nclass.php';</script>";
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
    <td colspan="5" class="mian_right_box_title_01">【培训版文章分类列表】</td>
	</tr>
	<?php
	  $sql="select * from pxmbclass order by pxn_id asc";
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
    <td width="205" height="33" align="right" bgcolor="#FFFFFF" class="title">分类ID：</td>
	<td width="102" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["pxn_id"]?></td>
	<td width="103" align="right" bgcolor="#FFFFFF" class="title">分类标题：</td>
	<td width="486" colspan="-2" bgcolor="#FFFFFF" class="title">
	  <input name="nedit" value="editok" type="hidden">
	  <input name="pxn_id" value="<?php echo $row["pxn_id"]?>" type="hidden">
	  <input type="text" name="pxn_class" id="pxn_class" value="<?php echo $row["pxn_class"]?>" maxlength="40" style="width:300px;"/></td>
    <td width="432" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" onClick="if(document.cform<?php echo $i;?>.pxn_class.value==''){alert('标题为空');document.cform<?php echo $i;?>.pxn_class.focus();return false;}" value="更新"></td>
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
    <td colspan="3" class="mian_right_box_title_01">【添加新闻分类】</td>
	</tr>
	  <tr>
    <td width="412" height="33" align="right" bgcolor="#FFFFFF" class="title">新增分类标题：</td>
	<td width="347" colspan="-2" bgcolor="#FFFFFF" class="title"><input name="nadd" value="nok" type="hidden"><input type="text" name="pxn_class" id="pxn_class" value="" maxlength="40" style="width:300px;"/></td>
    <td width="571" bgcolor="#FFFFFF" class="title">
	<input type="submit" onClick="if(document.formclass.pxn_class.value==''){alert('标题为空');document.formclass.pxn_class.focus();return false;}" name="Submit" value="添加"></td>
	  </tr>
  </form>
</table>
</div>
</BODY>
</HTML>
