<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>留学国家分类列表</TITLE>
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
  
  if (isset($_POST["gjedit"])){//频道值是数值型
      $sql="update lxgjclass set lx_gjcl='".$_POST["lx_gjcl"]."',lx_gqico='".$_POST["lx_gqico"]."',lx_gjtj=".$_POST["lx_gjtj"]." where lx_gjid=".$_POST["lx_gjid"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
	 
      echo"<script>alert('更新成功');location.href='lx_gj_class.php';</script>";
	  }else{
	  exit("修改失败! 错误信息为:".mysql_error());
	  }
  }

 if (isset($_GET["gjdel"])){//频道值是数值型
      $sql="delete from lxgjclass where lx_gjid=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('删除成功');location.href='lx_gj_class.php';</script>";
	  }else{
	  exit("删除失败! 错误信息为:".mysql_error());
	  }
  }


  if (isset($_POST["gjadd"])){
      $sql="insert into lxgjclass set lx_gjcl='".$_POST["lx_gjcl"]."',lx_gqico='".$_POST["lx_gqico"]."',lx_gjtj='".$_POST["lx_gjtj"]."'";
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('添加成功');location.hreflx_gj_class.php';</script>";
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
	<td class="mian_right_box_title_01">国旗图标</td>
	<td class="mian_right_box_title_01">讲座推荐</td>

<!--	<td class="mian_right_box_title_01">大类链接：</td>-->
	<td class="mian_right_box_title_01">操作</td>
  </tr>
	
	<?php
	  $sql="select * from lxgjclass order by lx_gjid asc";
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	 
	     if(mysql_num_rows($rs)>=1){
		 $i=0;
		     while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
			 $i=$i+1;
			 ?>
	
	<form name="cform<?=$i?>" method="post" onSubmit="return nclass()" action="">
	<tr>
	<td width="191" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["lx_gjid"]?></td>	
	<td width="180" bgcolor="#FFFFFF" class="title">
	  <input name="gjedit" value="editok" type="hidden">
	  <input name="lx_gjid" value="<?php echo $row["lx_gjid"]?>" type="hidden">
	  <input type="text" name="lx_gjcl" value="<?php echo $row["lx_gjcl"]?>" maxlength="40" style="width:100px;"/></td>
	<td width="296" align="center" bgcolor="#FFFFFF" class="title"><input type="text" name="lx_gqico" value="<?=$row["lx_gqico"]?>" readonly size="25">
	  <input type="button" value="更换" onClick="window.open('up2.php?formname=cform<?=$i?>&editname=lx_gqico&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')"></td>
	<td width="160" align="center" bgcolor="#FFFFFF" class="title"><input name="lx_gjtj" type="radio" value=1 <?php if($row["lx_gjtj"]==1){echo "checked";}?>>
是
  <input type="radio" name="lx_gjtj" value="0" <?php if($row["lx_gjtj"]==0){echo "checked";}?>>
否</td>

<!--	<td width="153" bgcolor="#FFFFFF" class="title"><input type="text" name="pb_link" id="pb_link" value="< ?php echo $row["pb_link"]?>" maxlength="40" style="width:200px;"/></td>-->
    <td width="516" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" onClick="if(document.cform<?php echo $i;?>.lx_gjcl.value==''){alert('标题为空');document.cform<?php echo $i;?>.lx_gjcl.focus();return false;}" value="更新"> 
    　<a href="lx_gj_class.php?id=<?=$row["lx_gjid"]?>&gjdel=okk" onClick="return confirm('是否将此信息删除?')">删除</a></td>
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
    <td colspan="9" class="mian_right_box_title_01">【添加国家分类】</td>
	</tr>
	  <tr>
    <td width="183" height="33" align="right" bgcolor="#FFFFFF" class="title">新增类别标题：
      <input name="gjadd" value="addok" type="hidden"></td>
	<td width="101" colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="lx_gjcl" id="pb_title" value="" maxlength="40" style="width:80px;"/></td>
	<td width="102" bgcolor="#FFFFFF" class="title">国家国旗图标：</td>
	<td width="251" bgcolor="#FFFFFF" class="title"><input type="text" name="lx_gqico" readonly size="25"><input type="button" value="浏览" onClick="window.open('up2.php?formname=formclass&editname=lx_gqico&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')"></td>
	<td width="86" bgcolor="#FFFFFF" class="title">讲座推荐：</td>
	<td width="102" align="center" bgcolor="#FFFFFF" class="title"><input name="lx_gjtj" type="radio" id="radio" value="1" checked>是<input type="radio" name="lx_gjtj" value="0">否</td>
	<!--<td width="98" bgcolor="#FFFFFF" class="title">(可选填)链接地址：</td>
	<td width="212" bgcolor="#FFFFFF" class="title"><input type="text" name="pb_link" id="pb_link" value="< ?php echo $row["pb_link"]?>" maxlength="40" style="width:200px;"/></td>-->
    <td width="512" bgcolor="#FFFFFF" class="title">
	<input type="submit" onClick="if(document.formclass.pb_title.value==''){alert('标题为空');document.formclass.pb_title.focus();return false;}if(document.formclass.pb_pindao.value=='0'){alert('请选择频道');document.formclass.pb_pindao.focus();return false;}" name="Submit" value="添加"></td>
	  </tr>
  </form>
</table>
</div>
</BODY>
</HTML>
