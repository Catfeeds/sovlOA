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

if(isset($_GET["zydel"])){
      $sql="delete from pxbclass where pb_id=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('删除成功');location.href='px_big_class.php';</script>";
	  }else{	  
	  exit("删除失败! 错误信息为:".mysql_error()); 
	  }}


if (isset($_POST["kcedit"])){//频道值是数值型
      $sql="update pxbclass set pb_title='".$_POST["pb_title"]."',pb_pindao='".$_POST["pb_pindao"]."' where pb_id=".$_POST["pb_id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
	 echo"<script>alert('更新成功');location.href='px_big_class.php';</script>";	
	  }else{
	  exit("修改失败! 错误信息为:".mysql_error());
	  }}
if(isset($_POST["zyadd"])){
      $sql="insert into pxbclass set pb_title='".$_POST["pb_title"]."', pb_pindao='".$_POST["pb_pindao"]."'";
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('添加成功');location.href='px_big_class.php';</script>";
	  }else{	  
	  exit("添加失败! 错误信息为:".mysql_error()); 
	  }}?> 
<br>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
  <tr>
    <td class="mian_right_box_title_01">类别ID：</td>
	<td class="mian_right_box_title_01">类别标题：</td>
	<td class="mian_right_box_title_01">所属频道</td>
<!--	<td class="mian_right_box_title_01">大类链接：</td>-->
	<td class="mian_right_box_title_01">操作</td>
  </tr>
	
	<?php
	  $sql="select * from pxbclass";
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

	<td width="160" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["pb_id"]?></td>
	
	<td width="265" bgcolor="#FFFFFF" class="title">
	  <input name="kcedit" value="editok" type="hidden">
	  <input name="pb_id" value="<?=$row["pb_id"]?>" type="hidden">
	  <input type="text" name="pb_title" id="pb_title" value="<?php echo $row["pb_title"]?>" maxlength="40" style="width:200px;"/></td>
	<td width="173" align="center" bgcolor="#FFFFFF" class="title"><select name="pb_pindao">
	  <?php
	  $sql3="select * from pindao order by pin_id asc";
	  $rs3=mysql_query($sql3,$conn);
	       if(mysql_num_rows($rs3)>=1){		
		     while ($row3=mysql_fetch_array($rs3,MYSQL_ASSOC)){			
			 ?>
	  <option value="<?=$row3["pin_title"]?>" <?php if($row3["pin_title"]==$row["pb_pindao"]){echo"selected";}?>>
	    <?=$row3["pin_title"]?>
	    </option>
	  <?php }}?>
	  </select></td>

<!--	<td width="153" bgcolor="#FFFFFF" class="title"><input type="text" name="pb_link" id="pb_link" value="< ?php echo $row["pb_link"]?>" maxlength="40" style="width:200px;"/></td>-->
    <td width="522" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" onClick="if(document.cform<?php echo $i;?>.pb_title.value==''){alert('标题为空');document.cform<?php echo $i;?>.pb_title.focus();return false;}" value="更新"> 
      <a href="px_big_class.php?zydel=ok&id=<?=$row["pb_id"]?>"  onClick="return confirm('该类下所有数据将被删除！！\n\n\r您确定要删吗？')">删除</a></td>
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
    <td width="175" height="33" align="right" bgcolor="#FFFFFF" class="title">新增类别标题：</td>
	<td width="176" colspan="-2" bgcolor="#FFFFFF" class="title"><input name="zyadd" value="kcok" type="hidden"><input type="text" name="pb_title" id="pb_title" value="" maxlength="40" style="width:120px;"/></td>
	<td width="72" bgcolor="#FFFFFF" class="title">所属频道：</td>
	<td width="172" align="center" bgcolor="#FFFFFF" class="title"><select name="pb_pindao" id="pb_pindao">
    <option value=0 selected>--选择频道--</option>
    <?php
	  $sql="select * from pindao order by pin_id asc";
	  $rs=mysql_query($sql,$conn);
	       if(mysql_num_rows($rs)>=1){		
		     while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){			
			 ?>
	  <option value="<?=$row["pin_title"]?>"><?=$row["pin_title"]?></option>
      <?php }}?>  
	  </select></td>
	<!--<td width="98" bgcolor="#FFFFFF" class="title">(可选填)链接地址：</td>
	<td width="212" bgcolor="#FFFFFF" class="title"><input type="text" name="pb_link" id="pb_link" value="< ?php echo $row["pb_link"]?>" maxlength="40" style="width:200px;"/></td>-->
    <td width="522" bgcolor="#FFFFFF" class="title">
	<input type="submit" onClick="if(document.formclass.pb_title.value==''){alert('标题为空');document.formclass.pb_title.focus();return false;}if(document.formclass.pb_pindao.value=='0'){alert('请选择频道');document.formclass.pb_pindao.focus();return false;}" name="Submit" value="添加">
	<font color="red">(因数据关联，请勿随意删除类目)</font></td>
	  </tr>
  </form>
</table>
</div>
</BODY>
</HTML>
