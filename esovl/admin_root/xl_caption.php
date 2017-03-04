<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>专业名称列表</TITLE>
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
      $sql="update xlmc set mc_title='".$_POST["mc_title"]."' where mc_id=".$_POST["mc_id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
	 
      echo"<script>alert('更新成功');location.href='xl_caption.php';</script>";	  
	  }else{
	  
	  exit("修改失败! 错误信息为:".mysql_error());
	  }
  }

  if (isset($_POST["mcadd"])){
      $sql="insert into xlmc set mc_title='".$_POST["mc_title"]."'";
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('添加成功');location.href='xl_caption.php';</script>";	  
	  }else{	  
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }
  
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">专业名称：添加，修改</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="xl_zyclass.php" >查看专业类别列表</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="xl_caption.php" >查看专业名称列表</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
  <tr>
    <td class="mian_right_box_title_01">名称ID：</td>
	<td class="mian_right_box_title_01">名称标题：</td>
	<td class="mian_right_box_title_01">操作</td>
  </tr>
	
<?php
$sq="select * from xlmc";
$rss=mysql_query($sq,$conn);
if(mysql_num_rows($rss)>=1){
$i=0;
while ($row=mysql_fetch_array($rss,MYSQL_ASSOC)){
$i=$i+1;
?>
<form name="cform<?=$i?>" method="post" onSubmit="return nclass()" action="">
<tr>
<td width="102" align="center" bgcolor="#FFFFFF" class="title"><?=$row["mc_id"]?></td>
<td width="486" colspan="-2" bgcolor="#FFFFFF" class="title">
<input name="kcedit" value="editok" type="hidden">
	  <input name="mc_id" value="<?php echo $row["mc_id"]?>" type="hidden">
	  <input type="text" name="mc_title" id="mc_title" value="<?php echo $row["mc_title"]?>" maxlength="40" style="width:300px;"/></td>
    <td width="432" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" onClick="if(document.cform<?php echo $i;?>.mc_title.value==''){alert('标题为空');document.cform<?php echo $i;?>.mc_title.focus();return false;}" value="更新"></td>
	  </tr>
  </form>
  <?php	 }}?>
</table>
</div>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="formclass" method="post" action="">
  <tr>
    <td colspan="3" class="mian_right_box_title_01">【添加专业分类】</td>
	</tr>
	  <tr>
    <td width="412" height="33" align="right" bgcolor="#FFFFFF" class="title">新增名称标题：</td>
	<td width="347" colspan="-2" bgcolor="#FFFFFF" class="title"><input name="mcadd" value="kcok" type="hidden"><input type="text" name="mc_title" id="mc_title" value="" maxlength="40" style="width:300px;"/></td>
    <td width="571" bgcolor="#FFFFFF" class="title">
      <input type="submit" onClick="if(document.formclass.mc_title.value==''){alert('标题为空');document.formclass.mc_title.focus();return false;}" name="Submit" value="添加"></td>
	  </tr>
  </form>
</table>
</div>
</BODY>
</HTML>