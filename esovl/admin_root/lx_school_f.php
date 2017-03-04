<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>留学国家广告幻灯</TITLE>
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
  
  if (isset($_GET["del"])){
      $sql="delete from lx_hd where lxh_id=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('删除成功');location.href='lx_school_f.php';</script>";
	  }else{
		  echo $sql;
	  exit("删除失败! 错误信息为:".mysql_error());
	  }
  }

  if (isset($_POST["zyadd"])){
      $sql="insert into lx_hd set lxh_gjid='".$_POST["lxh_gjid"]."',lxh_pic='".$_POST["lxh_pic"]."',lxh_url='".$_POST["lxh_url"]."'";
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('添加成功');location.href='lx_school_f.php';</script>";
	  }else{	  
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }
  
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">学历方形广告：添加，修改</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow">&nbsp;</td>
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
	  $sql="select * from lx_hd join lxgjclass on lx_hd.lxh_gjid=lxgjclass.lx_gjid order by lxh_gjid asc";
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
	<td width="102" align="center" bgcolor="#FFFFFF" class="title"><?=$row["lxh_id"]?></td>	
	<td bgcolor="#FFFFFF" class="title"><input type="text" name="lxh_gjid" value="<?=$row["lxh_gjid"]?>" maxlength="40" style="width:30px;"/><?=$row["lx_gjcl"]?></td>
    <td bgcolor="#FFFFFF" class="title"><input type="text" name="lxh_pic" value="<?=$row["lxh_pic"]?>" style="width:150px;" readonly/></td>
    <td bgcolor="#FFFFFF" class="title"><input type="text" name="lxh_url" value="<?=$row["lxh_url"]?>" style="width:150px;"></td>
    <td width="463" bgcolor="#FFFFFF" class="title"><a href="lx_school_f.php?del=ok&id=<?=$row["lxh_id"]?>">删除</a></td>
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
    <td colspan="7" class="mian_right_box_title_01">【添加留学广告】</td>
	</tr>
	  <tr>
    <td width="126" height="33" align="right" bgcolor="#FFFFFF" class="title">新增类别标题：</td>
	<td width="160" colspan="-2" bgcolor="#FFFFFF" class="title"><input name="zyadd" value="kcok" type="hidden">
	  <select name="lxh_gjid" id="select">
	    <option value="">--请选择国家--</option>
   <?php
	  $sql="select * from lxgjclass";
	  $rs=mysql_query($sql,$conn);	 
	     if(mysql_num_rows($rs)>=1){
		     while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
	?>
	    <option value="<?=$row["lx_gjid"]?>"><?=$row["lx_gjcl"]?></option>
   <?php }}?>
       
	    </select></td>
    <td width="63" bgcolor="#FFFFFF" class="title">广告图：</td>
    <td width="443" bgcolor="#FFFFFF" class="title"><input type="text" name="lxh_pic" style="width:150px;" readonly/>
      <input name="button" type="button" class="go" onClick="window.open('up2.php?formname=formclassh&editname=lxh_pic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传广告图" />                   size：354x228</td>
    <td width="135" bgcolor="#FFFFFF" class="title">链接地址：</td>
    <td width="143" bgcolor="#FFFFFF" class="title"><input type="text" name="lxh_url" value="http://"></td>
    <td width="232" bgcolor="#FFFFFF" class="title">
	  <input type="submit" onClick="if(document.formclassh.lxh_gjid.value==''){alert('请选择国家');document.formclassh.lxh_gjid.focus();return false;}if(document.formclassh.lxh_pic.value==''){alert('请上传图片');document.formclassh.lxh_pic.focus();return false;}" name="Submit" value="添加"></td>
    </tr>
  </form>
</table>
</div>
</BODY>
</HTML>
