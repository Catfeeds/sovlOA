<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>名校推荐与直达列表</TITLE>
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
  
  if (isset($_POST["yqedit"])){
      $sql="update yqlj set yq_title='".$_POST["yq_title"]."',yq_link='".$_POST["yq_link"]."' where yq_id=".$_POST["yq_id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('更新成功');location.href='yqlist.php';</script>";	  
	  }else{	  
	  exit("修改失败! 错误信息为:".mysql_error());
	  }
  }
  
   if (isset($_GET["yqdel"])){
      $sq="delete from yqlj where yq_id=".$_GET["id"];
	  $rss=mysql_query($sq,$conn);
	  if ($rss){	 
      echo"<script>alert('删除成功');location.href='yqlist.php';</script>";	  
	  }else{	  
	  exit("删除失败! 错误信息为:".mysql_error());
	  }
  }

  if (isset($_POST["yqadd"])){
      $sql="insert into yqlj set yq_title='".$_POST["yq_title"]."',yq_link='".$_POST["yq_link"]."'";
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('添加成功');location.href='yqlist.php';</script>";	  
	  }else{	  
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }
  
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">合作机构：添加，修改</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow">&nbsp;</td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
  <tr>
    <td class="mian_right_box_title_01">ID：</td>
	<td class="mian_right_box_title_01">标题</td>

	<td width="466" class="mian_right_box_title_01">链接地址首页推荐</td>
	<td class="mian_right_box_title_01">操作</td>
  </tr>
	
	<?php
	  $sql="select * from yqlj";
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	 
	     if(mysql_num_rows($rs)>=1){
		 $i=0;
		     while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
			 $i=$i+1;
			 ?>
	
	<form name="yqform<?php echo $i?>" method="post" action="">
	  <tr>

	<td width="173" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["yq_id"];?></td>
	
	<td width="470" bgcolor="#FFFFFF" class="title"><input name="yqedit" value="editok" type="hidden">
      <input name="yq_id" value="<?php echo $row["yq_id"]?>" type="hidden">
      <input type="text" name="yq_title" id="yq_title" value="<?php echo $row["yq_title"]?>" maxlength="40" style="width:220px;"/></td>

    <td bgcolor="#FFFFFF" class="title"><input type="text" name="yq_link" id="yq_link" value="<?php echo $row["yq_link"]?>" maxlength="40" style="width:220px;"/></td>
    <td width="218" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" onClick="if(document.yqform<?php echo $i;?>.yq_title.value==''){alert('标题为空');document.yqform<?php echo $i;?>.yq_title.focus();return false;}if(document.yqform<?php echo $i;?>.yq_link.value==''){alert('链接为空');document.yqform<?php echo $i;?>.yq_link.focus();return false;}" value="更新">
      <a href="yqlist.php?yqdel=ook&id=<?php echo $row["yq_id"]?>" onClick="return confirm('是否将此信息删除?')">删除</a></td>
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
<form name="yqform" method="post" action="">
  <tr>
    <td colspan="6" class="mian_right_box_title_01">【添加合作机构】</td>
	</tr>
	  <tr>
    <td width="177" height="33" align="right" bgcolor="#FFFFFF" class="title">新增标题：</td>
	<td width="301" align="left" bgcolor="#FFFFFF" class="title"><input name="yqadd" value="yqok" type="hidden">
      <input type="text" name="yq_title" id="yq_title" value="" maxlength="40" style="width:220px;"/></td>
	
	<td width="162" colspan="-2" align="center" bgcolor="#FFFFFF" class="title">链接地址：</td>
    <td width="469" bgcolor="#FFFFFF" class="title"><input type="text" name="yq_link" id="yq_link" value="http://" maxlength="40" style="width:220px;"/></td>
    <td width="215" bgcolor="#FFFFFF" class="title">
	<input type="submit" onClick="if(document.yqform.yq_title.value==''){alert('标题为空');document.yqform.yq_title.focus();return false;}if(document.yqform.yq_link.value==''){alert('链接地址为空');document.yqform.yq_link.focus();return false;}" name="Submit" value="添加"></td>
	  </tr>
  </form>
</table> 
</div>
</BODY>
</HTML>
