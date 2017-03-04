<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>编辑研修研修开课信息</TITLE>
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
if (isset($_POST["class_title"])){
   $sql="update yx_class set class_title='".$_POST["class_title"]."',class_pindao='".$_POST["class_pindao"]."',class_con='".$_POST["class_con"]."',pxk_bool=".$_POST["pxk_bool"].",pxk_pic='".$_POST["pxk_pic"]."' where class_id=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	
      echo"<script>alert('修改成功');location.href='yx_list_class.php';</script>";
	  }else{	  
	  exit("更新失败! 错误信息为:".mysql_error());
}
}
$sql="select * from yx_class where class_id=".$_GET["id"];
$rs=mysql_query($sql,$conn);
if (!$rs){	 
exit("查询失败! 错误信息为:".mysql_error());
}else{
$row=mysql_fetch_assoc($rs);
}
include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('class_con') ;
$oFCK->BasePath   = $sBasePath ;
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">研修开课信息：添加，修改介绍企业相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="px_kcadd.php">添加研修开课信息</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="px_kclist.php" >查看研修开课信息</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
  <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
    <form name="pxkkform" method="post" onSubmit="return pxkaike()" action="">
      <tr>
        <td colspan="4" class="mian_right_box_title_01">【编辑研修开课信息】</td>
      </tr>
	  <tr>
	  <td height="7" align="right" bgcolor="#FFFFFF" class="title">频道类别：</td>
	  <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
      <select name="class_pindao">
	  <?php 
      $sql2="select * from yx_class where class_id=".$_GET["id"];
	  $rs2=mysql_query($sql2,$conn);
	  if (mysql_num_rows($rs2)>=1){
	  while ($row2=mysql_fetch_array($rs2,MYSQL_ASSOC)){
      ?>
	  <option value="<?php echo $row2["class_pindao"]?>"><?php echo $row2["class_pindao"]?></option>
      <option value="MBA/EMBA">MBA/EMBA</option> 
      <option value="工程硕士">工程硕士</option>
      <option value="在职研究生">在职研究生</option>
          <option value="总裁总监研修">总裁总监研修</option>
	      <?php }}?>
	 </select><span id="p_pxlb">*</span></td>
	  </tr>
	  <tr>
	    <td height="3" align="right" bgcolor="#FFFFFF" class="title">研修图片：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title" ><input type="text" name="pxk_pic" value="<?=$row["pxk_pic"]?>" style="width:210px;" readonly/>
          <input name="button" type="button" class="go" onClick="window.open('up2.php?formname=pxkkform&editname=pxk_pic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传图片" />
        <span id="logdex">*</span><span style="color:#999"> 尺寸(px)：75x70</span></td>
      </tr>
	  <tr>
	    <td height="38" align="right" bgcolor="#FFFFFF" class="title">开班名称：</td>
	    <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title">
        <input type="text" name="class_title" id="pxk_title" value="<?=$row["class_title"]?>" maxlength="100" style="width:300px;"/><span id="p_kbmc">*</span></td>
      </tr>
	 
	  <tr>
	    <td height="56" align="right" bgcolor="#FFFFFF" class="title">专业介绍：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
		<?php 
		$oFCK->Value  = $row["class_con"];
		$oFCK->Create();
		?></td>
    </tr>
      <tr>
        <td height="14" colspan="1" align="right" bgcolor="#FFFFFF" class="title">是否推荐：</td>
        <td bgcolor="#FFFFFF" class="title"><input type="radio" name="pxk_bool" value=1 <?php if($row["pxk_bool"]==1){echo "checked";}?>>
          是
            <input type="radio" name="pxk_bool" value=0 <?php if($row["pxk_bool"]==0){echo "checked";}?>>
        否 </td>
      </tr>
      <tr>
        <td height="14" colspan="1" align="right" bgcolor="#FFFFFF" class="title">&nbsp;</td>
        <td bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" value="保存信息"></td>
      </tr>
    </form>
  </table>
</div>
</BODY>
</HTML>