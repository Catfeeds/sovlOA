<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>课程小类列表</TITLE>
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
  
  if (isset($_POST["sedit"])){
      $sql="update kcsname set kc_sname='".$_POST["kc_sname"]."',kc_http='".$_POST["kc_http"]."' where s_id=".$_POST["s_id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
	 
      echo"<script>alert('小类更新成功');location.href='kc_sname.php?bid=".$_POST["s_bid"]."';</script>";	  
	  }else{
	  
	  exit("修改失败! 错误信息为:".mysql_error());
	  }
  }

  if (isset($_POST["kcbid"])){
      $sql="insert into kcsname set kcbid='".$_POST["kcbid"]."',kc_sname='".$_POST["kc_sname"]."'";
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('小类添加成功');location.href='kc_sname.php?bid=".$_POST["kcbid"]."';</script>";	  
	  }else{	  
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }
  
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">课程小类：添加，修改</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="kc_bname.php" >查看课程小类列表</a><a href="kc_sname.php"></a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="kc_sname.php" >查看课程小类列表</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" height="40" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
  <tr>
    <td width="25%" align="center" valign="top" style="color:#fff;">
	  <br>
	  <select name="select" onChange="var jmpURL=this.options[this.selectedIndex].value ; if(jmpURL!='') {window.location=jmpURL;} else {this.selectedIndex=0 ;}" >
      <option selected="selected" value=0>选择课程大类</option>
      
         <?php 
      $sql="select * from kcbname";
	  $rs=mysql_query($sql,$conn);
	  if (mysql_num_rows($rs)>=1){
	  while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
	      if($_GET["bid"]==$row["kc_id"]){
		  $bclass=$row["kc_bname"];
		  }
      ?>
            <option value="kc_sname.php?bid=<?php echo $row["kc_id"]?>" ><?php echo $row["kc_bname"]?></option>
            <?php
          }
		  }
		  mysql_free_result($rs);?>

    </select><?php if (isset($bclass)){echo " 当前大类：[".$bclass."]";}else{echo"　请先选择大类！";}?></td>
	<td width="75%">
	
	<?php 
	if (isset($_GET["bid"])){
	?>
	<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
      <tr>
        <td class="mian_right_box_title_01">小类ID：</td>
        <td class="mian_right_box_title_01">小类标题：</td>
        <td class="mian_right_box_title_01">小类链接网址</td>
        <td class="mian_right_box_title_01">操作</td>
      </tr>
      <?php
	  $sql="select * from kcsname where kcbid=".$_GET["bid"];
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	 
	     if(mysql_num_rows($rs)>=1){
		 $i=0;
		     while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
			 $i=$i+1;
			 ?>
      <form name="sform<?php echo $i?>" method="post" action="">
        <tr>
          <td width="104" align="center" bgcolor="#FFFFFF" class="title"><input type="text" name="s_id" id="s_id" value="<?php echo $row["s_id"]?>" style="width:50px;"/>
           <input type="hidden" name="sedit" value="sok">   <input type="hidden" name="s_bid" value="<?php echo $_GET["bid"];?>"></td>
          <td width="320" bgcolor="#FFFFFF" class="title"><input type="text" name="kc_sname" id="kc_sname" value="<?php echo $row["kc_sname"]?>" maxlength="40" style="width:200px;"/></td>
          <td width="424" bgcolor="#FFFFFF" class="title"><input type="text" name="kc_http" id="kc_http" value="<?php echo $row["kc_http"]?>" maxlength="40" style="width:300px;"/></td>
          <td width="80" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit2" onClick="if(document.sform<?php echo $i;?>.kc_sname.value==''){alert('标题为空');document.sform<?php echo $i;?>.kc_sname.focus();return false;}" value="更新"></td>
        </tr>
      </form>
	  <?php
			 }
		 }
	  }
	?>
    </table>
	<?php }?></td>
  </tr>
</table>
</div>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="formclass" method="post" action="">
  <tr>
    <td colspan="4" class="mian_right_box_title_01">【添加课程分类】</td>
	</tr>
	  <tr>
    <td width="298" height="33" align="right" bgcolor="#FFFFFF" class="title">
	<select name="kcbid">
        <option selected="selected" value=0>选择课程大类</option>
        <?php 
      $sql="select * from kcbname";
	  $rs=mysql_query($sql,$conn);
	  if (mysql_num_rows($rs)>=1){
	  while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
      ?>
        <option value="<?php echo $row["kc_id"]?>" ><?php echo $row["kc_bname"]?></option>
        <?php
          }
		  }
		  mysql_free_result($rs);?>
        </select></td>
	<td width="118" align="right" bgcolor="#FFFFFF" class="title">新增小类标题：</td>
	<td width="346" colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="kc_sname" id="kc_sname" value="" maxlength="40" style="width:300px;"/></td>
    <td width="565" bgcolor="#FFFFFF" class="title">
	<input type="submit" onClick="if(document.formclass.kcbid.value==0){alert('请选择大类');document.formclass.kcbid.focus();return false;}if(document.formclass.kc_sname.value==''){alert('标题为空');document.formclass.kc_sname.focus();return false;}" name="Submit" value="添加"></td>
	  </tr>
  </form>
</table>
</div>
</BODY>
</HTML>
