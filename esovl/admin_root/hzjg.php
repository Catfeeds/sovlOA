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
  
  if (isset($_POST["hzedit"])){
      $sql="update hzjg set hz_title='".$_POST["hz_title"]."',hz_link='".$_POST["hz_link"]."',hz_logo='".$_POST["hz_logo"]."' where hz_id=".$_POST["hz_id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('更新成功');location.href='hzjg.php';</script>";	  
	  }else{	  
	  exit("修改失败! 错误信息为:".mysql_error());
	  }
  }
  
   if (isset($_GET["hzdel"])){
      $sq="delete from hzjg where hz_id=".$_GET["id"];
	  $rss=mysql_query($sq,$conn);
	  if ($rss){	 
      echo"<script>alert('删除成功');location.href='hzjg.php';</script>";	  
	  }else{	  
	  exit("删除失败! 错误信息为:".mysql_error());
	  }
  }

  if (isset($_POST["hzadd"])){
      $sql="insert into hzjg set hz_title='".$_POST["hz_title"]."',hz_link='".$_POST["hz_link"]."',hz_logo='".$_POST["hz_logo"]."'";
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('添加成功');location.href='hzjg.php';</script>";	  
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
	<td class="mian_right_box_title_01">图片LOGO：</td>
	<td width="328" class="mian_right_box_title_01">链接地址首页推荐</td>
	<td class="mian_right_box_title_01">操作</td>
  </tr>
	
	<?php
	  $sql="select * from hzjg";
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	 
	     if(mysql_num_rows($rs)>=1){
		 $i=0;
		     while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
			 $i=$i+1;
			 ?>
	
	<form name="hzform<?php echo $i?>" method="post" action="">
	  <tr>

	<td width="102" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["hz_id"];?></td>
	
	<td width="291" bgcolor="#FFFFFF" class="title"><input name="hzedit" value="editok" type="hidden">
      <input name="hz_id" value="<?php echo $row["hz_id"]?>" type="hidden">
      <input type="text" name="hz_title" id="hz_title" value="<?php echo $row["hz_title"]?>" maxlength="40" style="width:220px;"/></td>
    <td width="476" bgcolor="#FFFFFF" class="title"><input type="text" name="hz_logo" value="<?php echo $row["hz_logo"]?>"  style="width:210px;" readonly/>
      <input name="button" type="button" class="go" onClick="window.open('up2.php?formname=hzform<?php echo $i?>&editname=hz_logo&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传小图" /><span style="margin-left:20px; position:relative; cursor:hand;" onMouseOver="document.getElementById('show<?php echo $i;?>').style.display=''" onMouseOut="document.getElementById('show<?php echo $i;?>').style.display='none'">预览
	  <div id="show<?php echo $i;?>" style="width:50px;height:50px; display:none; position:absolute; top:-65px;left:50px;"><img src="<?php echo $row["hz_logo"];?>" width="100px"/></div></span></td>
    <td bgcolor="#FFFFFF" class="title"><input type="text" name="hz_link" id="hz_link" value="<?php echo $row["hz_link"]?>" maxlength="40" style="width:220px;"/></td>
    <td width="127" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" onClick="if(document.hzform<?php echo $i;?>.hz_title.value==''){alert('标题为空');document.hzform<?php echo $i;?>.hz_title.focus();return false;}if(document.hzform<?php echo $i;?>.hz_link.value==''){alert('链接为空');document.hzform<?php echo $i;?>.hz_link.focus();return false;}" value="更新">
      <a href="hzjg.php?hzdel=ook&id=<?php echo $row["hz_id"]?>" onClick="return confirm('是否将此信息删除?')">删除</a></td>
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
<form name="hzform" method="post" action="">
  <tr>
    <td colspan="7" class="mian_right_box_title_01">【添加合作机构】</td>
	</tr>
	  <tr>
    <td width="100" height="33" align="right" bgcolor="#FFFFFF" class="title">新增标题：</td>
	<td width="182" align="right" bgcolor="#FFFFFF" class="title"><input name="hzadd" value="hzok" type="hidden">
      <input type="text" name="hz_title" id="hz_title" value="" maxlength="40" style="width:150px;"/></td>
	<td width="93" align="right" bgcolor="#FFFFFF" class="title">机构LOGO：</td>
	<td width="490" align="left" bgcolor="#FFFFFF" class="title"><input type="text" name="hz_logo" value="<?php echo $row["hz_logo"]?>"  style="width:210px;" readonly/>
<input type="button" class="go" onClick="window.open('up2.php?formname=hzform&editname=hz_logo&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传小图" />
<span style="color:#999"> Size：102x67</span></td>
	<td width="86" colspan="-2" align="center" bgcolor="#FFFFFF" class="title">链接地址：</td>
    <td width="243" bgcolor="#FFFFFF" class="title"><input type="text" name="hz_link" id="hz_link" value="http://" maxlength="40" style="width:200px;"/></td>
    <td width="124" bgcolor="#FFFFFF" class="title">
	<input type="submit" onClick="if(document.hzform.hz_title.value==''){alert('标题为空');document.hzform.hz_title.focus();return false;}if(document.hzform.hz_logo.value==''){alert('请上传机构LOGO');document.hzform.hz_logo.focus();return false;}if(document.hzform.hz_link.value==''){alert('链接地址为空');document.hzform.hz_link.focus();return false;}" name="Submit" value="添加"></td>
	  </tr>
  </form>
</table> 
</div>
</BODY>
</HTML>
