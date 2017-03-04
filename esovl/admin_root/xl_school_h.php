<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>学历首页学校广告列表</TITLE>
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
      $sql="update xl_s_h set s_h_title='".$_POST["s_h_title"]."', s_h_pic='".$_POST["s_h_pic"]."', s_h_http='".$_POST["s_h_http"]."' where s_h_id=".$_POST["s_h_id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('更新成功');location.href='xl_school_h.php?id=".$_POST["cid"]."';</script>";	  
	  }else{	  
	  exit("修改失败! 错误信息为:".mysql_error());
	  }
  }
  
    if (isset($_GET["kcdel"])){
      $sql="delete from xl_s_h where s_h_id=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('删除成功');location.href='xl_school_h.php?id=".$_GET["cid"]."';</script>";
	  }else{	  
	  exit("修改失败! 错误信息为:".mysql_error());
	  }
  }

  if (isset($_POST["zyadd"])){
      $sql="insert into xl_s_h set s_h_title='".$_POST["s_h_title"]."', s_h_pic='".$_POST["s_h_pic"]."', s_h_http='".$_POST["s_h_http"]."',classid=".$_POST["cid"];
	 
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('添加成功');location.href='xl_school_h.php?id=".$_POST["cid"]."';</script>";
	  }else{	  
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }
  
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">学历横幅广告：添加，修改</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
  <tr>
    <td class="mian_right_box_title_01">类别ID：</td>
	<td width="207" class="mian_right_box_title_01">类别标题：</td>
	<td width="306" class="mian_right_box_title_01">学校广告图</td>
	<td width="246" class="mian_right_box_title_01">广告链接地址</td>
	<td class="mian_right_box_title_01">操作</td>
  </tr>
	
	<?php
	  $sql="select * from xl_s_h where classid=".$_GET["id"];
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
	<td width="102" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["s_h_id"]?></td>
	
	<td bgcolor="#FFFFFF" class="title">
	  <input name="kcedit" value="editok" type="hidden">
	  <input name="s_h_id" value="<?php echo $row["s_h_id"]?>" type="hidden"><input name="cid" value="<?php echo $_GET["id"]?>" type="hidden">
	  <input type="text" name="s_h_title" id="s_h_title" value="<?php echo $row["s_h_title"]?>" maxlength="40" style="width:120px;"/></td>
    <td bgcolor="#FFFFFF" class="title"><input type="text" name="s_h_pic" value="<?php echo $row["s_h_pic"]?>" style="width:150px;" readonly/>
      <input name="button2" type="button" class="go" onClick="window.open('up2.php?formname=cform<?php echo $i?>&editname=s_h_pic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="更换广告图" /></td>
    <td bgcolor="#FFFFFF" class="title"><input type="text" name="s_h_http" value="<?php echo $row["s_h_http"]?>" style="width:150px;"></td>
    <td width="463" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" onClick="if(document.cform<?php echo $i;?>.s_h_title.value==''){alert('标题为空');document.cform<?php echo $i;?>.s_h_title.focus();return false;}" value="更新"> 
      <a href="xl_school_h.php?kcdel=ok&id=<?=$row["s_h_id"]?>&cid=<?=$_GET["id"]?>">删除</a></td>
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
<form name="formclassh" method="post" action="">
  <tr>
    <td colspan="7" class="mian_right_box_title_01">【添加横幅广告】(4幅以内,前台只能显示四幅)</td>
	</tr>
	  <tr>
    <td width="98" height="33" align="right" bgcolor="#FFFFFF" class="title">新增类别标题：</td>
	<td width="153" colspan="-2" bgcolor="#FFFFFF" class="title"><input name="zyadd" value="kcok" type="hidden"><input name="cid" value="<?php echo $_GET["id"]?>" type="hidden">
	  <input type="text" name="s_h_title" id="s_h_title" value="" maxlength="40" style="width:120px;"/></td>
    <td width="50" bgcolor="#FFFFFF" class="title">广告图：</td>
    <td width="378" bgcolor="#FFFFFF" class="title"><input type="text" name="s_h_pic" style="width:150px;" readonly/>
        <input name="button" type="button" class="go" onClick="window.open('up2.php?formname=formclassh&editname=s_h_pic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传广告图" />                   size：722x88</td>
    <td width="91" bgcolor="#FFFFFF" class="title">链接地址：</td>
    <td width="138" bgcolor="#FFFFFF" class="title"><input type="text" name="s_h_http"></td>
    <td width="197" bgcolor="#FFFFFF" class="title">
	  <input type="submit" onClick="if(document.formclassh.s_h_title.value==''){alert('标题为空');document.formclassh.s_h_title.focus();return false;}if(document.formclassh.s_h_pic.value==''){alert('请上传广告图片');document.formclassh.s_h_pic.focus();return false;}" name="Submit" value="添加"></td>
    </tr>
  </form>
</table>
</div>
</BODY>
</HTML>
