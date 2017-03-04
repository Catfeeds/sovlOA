<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>培训大类列表</TITLE>
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
     if (isset($_GET["kcdel"])){
      $sql="delete from qp_kaike where qpk_id=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
	 
      echo"<script>alert('删除成功');location.href='qp_qpkclass.php';</script>";	  
	  }else{
	  
	  exit("删除失败! 错误信息为:".mysql_error());
	  }
  }
  
  if (isset($_POST["kcedit"])){//频道值是数值型
      $sql="update qp_kaike set qpk_title='".$_POST["qpk_title"]."',qpk_num='".$_POST["qpk_num"]."' where qpk_id=".$_POST["pb_id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
	 
      echo"<script>alert('更新成功');location.href='qp_qpkclass.php';</script>";	  
	  }else{
	  
	  exit("修改失败! 错误信息为:".mysql_error());
	  }
  }

  if (isset($_POST["zyadd"])){
      $sql="insert into qp_kaike set qpk_title='".$_POST["qpk_title"]."', qpk_num='".$_POST["qpk_num"]."',npic='".$_POST["npic"]."'";
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('添加成功');location.href='qp_qpkclass.php';</script>";
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
    <td class="mian_right_box_title_01">类别图片：</td>
	<td class="mian_right_box_title_01">类别标题：</td>
	<td class="mian_right_box_title_01">类别序号</td>

<!--	<td class="mian_right_box_title_01">大类链接：</td>-->
	<td class="mian_right_box_title_01">操作</td>
  </tr>
	
	<?php
	  $sql="select * from qp_kaike order by qpk_num asc";
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

	<td width="160" align="center" bgcolor="#FFFFFF" class="title">	<?php 
	if($row['npic']!=''){
		?>
    <input type="button" value="预览" onMouseOver="document.getElementById('<?=$k;?>').style.display=''" onMouseOut="document.getElementById('<?=$k;?>').style.display='none'"><div id="<?=$k;?>" style="position:absolute; display:none;"><img src="<?=$row["npic"]?>" width="146"></div> 
    
    <?php
	}?>
    </td>
	<td width="265" bgcolor="#FFFFFF" class="title">
	  <input name="kcedit" value="editok" type="hidden">
	  <input name="pb_id" value="<?php echo $row["qpk_id"]?>" type="hidden">
	  <input type="text" name="qpk_title" id="pb_title" value="<?php echo $row["qpk_title"]?>" maxlength="40" style="width:200px;"/></td>
	<td width="173" align="center" bgcolor="#FFFFFF" class="title" >
<input type="text" name="qpk_num"  value="<?php echo $row["qpk_num"];?>">
</td>

<!--	<td width="153" bgcolor="#FFFFFF" class="title"><input type="text" name="pb_link" id="pb_link" value="< ?php echo $row["pb_link"]?>" maxlength="40" style="width:200px;"/></td>-->
    <td width="522" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" onClick="if(document.cform<?php echo $i;?>.pb_title.value==''){alert('标题为空');document.cform<?php echo $i;?>.pb_title.focus();return false;}" value="更新">     <a href="?kcdel=ok&id=<?php echo $row["qpk_id"]?>" onClick="return confirm('谨慎！确定删除?')">删除</a></td>
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
  
    <td colspan="7" class="mian_right_box_title_01">【添加专业分类】</td>
	</tr>
	  <tr>
    <td width="105" height="33" align="right" bgcolor="#FFFFFF" class="title">新增类别标题：</td>
	<td width="157" colspan="-2" bgcolor="#FFFFFF" class="title"><input name="zyadd" value="kcok" type="hidden"><input type="text" name="qpk_title" id="class_title" value="" maxlength="40" style="width:120px;"/></td>
	<td width="64" bgcolor="#FFFFFF" class="title">类别序号：</td>
	<td width="172" align="center" bgcolor="#FFFFFF" class="title">
    <input type="text" name="qpk_num">
    </td>
	<!--<td width="98" bgcolor="#FFFFFF" class="title">(可选填)链接地址：</td>
	<td width="212" bgcolor="#FFFFFF" class="title"><input type="text" name="pb_link" id="pb_link" value="< ?php echo $row["pb_link"]?>" maxlength="40" style="width:200px;"/></td>-->
    <td width="508" bgcolor="#FFFFFF" class="title" align="center">类型图片:
	<input type="text" name="npic" size="50" style="width:200px;"><input type="button" value="浏览" onClick="window.open('up2.php?formname=formclass&editname=npic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')">
	&nbsp;&nbsp;尺寸:162x75
    </td>
        <td width="101" bgcolor="#FFFFFF" class="title">
	<input type="submit" onClick="if(document.formclass.class_title.value==''){alert('标题为空');document.formclass.class_title.focus();return false;}if(document.formclass.class_num.value=='0'){alert('请选择频道');document.formclass.class_num.focus();return false;}" name="Submit" value="添加"></td>
	  </tr>
  </form>
</table>
</div>
</BODY>
</HTML>
