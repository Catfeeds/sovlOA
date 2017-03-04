<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>留学学校名称列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
</HEAD>
<?php include("../conn.php");?>
<script type="text/javascript" src="lgHttp.js"></script>
<script>
function lxschool(){//xl-zhaosheng school
 if(document.lxsfrom.lxs_gjid.value==""){
	alert('请选择国家!');
	document.lxsfrom.lxs_gjid.focus();
	return false;
	} 

  if(document.lxsfrom.lxs_name.value==""){
	alert('请填写学校名称!');
	document.lxsfrom.lxs_name.focus();
	return false;
	}
	
 if(document.lxsfrom.lxs_banner.value==""){
	alert('请上传Banner图片!');
	document.lxsfrom.lxs_banner.focus();
	return false;
	}		  
}
</script>
<BODY>
<?php
if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}
  
  if (isset($_POST["sadd"])){
      $sql="insert into lxschool set lxs_gjid=".$_POST["lxs_gjid"].",lxs_name='".$_POST["lxs_name"]."', lxs_banner='".$_POST["lxs_banner"]."',lxs_logo='".$_POST["lxs_logo"]."', lxs_xxjs='".$_POST["lxs_xxjs"]."', lxs_kcys='".$_POST["lxs_kcys"]."', lxs_zsjz='".$_POST["lxs_zsjz"]."', lxs_shhj='".$_POST["lxs_shhj"]."', lxs_xgxx='".$_POST["lxs_xgxx"]."',lxs_tjbool=".$_POST["lxs_tjbool"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('添加成功');location.href='lx_list_school.php';</script>";
	  }else{	  
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }
  
include('fckeditor/fckeditor.php');
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('lxs_xxjs');
$oFCK->BasePath   = $sBasePath ;
$oFCK1 = new FCKeditor('lxs_shhj');
$oFCK1->BasePath   = $sBasePath ;
$oFCK2 = new FCKeditor('lxs_xgxx');
$oFCK2->BasePath   = $sBasePath ;
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">留学学校名称：添加，修改</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="lx_school.php" >添加留学学校信息</a><font color="#0000FF"> | </font><a href="lx_list_school.php" >查看留学学校类别列表</a></td>
  </tr>
</table>

<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="lxsfrom" method="post" action="">
  <tr>
    <td colspan="2" class="mian_right_box_title_01">【添加留学学校分类】</td>
	</tr>
	  <tr>
    <td width="319" height="-2" align="right" bgcolor="#FFFFFF" class="title">所属国家：</td>
	<td width="998" bgcolor="#FFFFFF" class="title">
    <select name="lxs_gjid" id="select">
	 <option value="">--请选择国家--</option>
   <?php
	  $sql="select * from lxgjclass";
	  $rs=mysql_query($sql,$conn);	 
	     if(mysql_num_rows($rs)>=1){
		     while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
	?>
	 <option value="<?=$row["lx_gjid"]?>"><?=$row["lx_gjcl"]?></option>
   <?php }}?>       
	    </select>
    <font color="red">*</font>
    </td>
    </tr>
	  <tr>
	    <td width="319" height="-1" align="right" bgcolor="#FFFFFF" class="title">学校名称：</td>
	    <td bgcolor="#FFFFFF" class="title"><input name="sadd" value="kcok" type="hidden">
        <input type="text" name="lxs_name" value="" maxlength="40" style="width:300px;"/><font color="red">*</font></td>
      </tr>
	  <tr>
	    <td width="319" height="22" align="right" bgcolor="#FFFFFF" class="title">学校BANNER：</td>
	    <td bgcolor="#FFFFFF" class="title"><input type="text" name="lxs_banner" style="width:210px;" readonly/>
<input name="button" type="button" class="go" onClick="window.open('up2.php?formname=lxsfrom&editname=lxs_banner&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传Banner图片" />(Size: 946x115)<font color="red">*</font></td>
	  </tr>
      <tr>
	    <td height="21" align="right" bgcolor="#FFFFFF" class="title">学校小图/LOGO：</td>
	    <td bgcolor="#FFFFFF" class="title"><input type="text" size="50" name="lxs_logo">
        <input type="button" name="button2" onClick="window.open('up2.php?formname=lxsfrom&editname=lxs_logo&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传学校logo">
        (size:90*92)</td>
      </tr>
	  <tr>
	    <td width="319" height="21" align="right" bgcolor="#FFFFFF" class="title">学校介绍：</td>
	    <td bgcolor="#FFFFFF" class="title"><?php $oFCK->Create();?></td>
      </tr>
	  <tr>
	    <td width="319" height="114" align="right" bgcolor="#FFFFFF" class="title">课程优势：</td>
	    <td bgcolor="#FFFFFF" class="title"><textarea name="lxs_kcys" style="width:500px;height:100px;"></textarea></td>
      </tr>
	  <tr>
	    <td width="319" height="22" align="right" bgcolor="#FFFFFF" class="title">招生简章：</td>
	    <td bgcolor="#FFFFFF" class="title"><textarea name="lxs_zsjz" style="width:500px;height:100px;"></textarea></td>
      </tr>
	  <tr>
	    <td width="319" height="23" align="right" bgcolor="#FFFFFF" class="title">学校生活环境：</td>
	    <td bgcolor="#FFFFFF" class="title"><?php $oFCK1->Create();?></td>
      </tr>
	  <tr>
	    <td width="319" height="11" align="right" bgcolor="#FFFFFF" class="title">相关学校推荐：</td>
	    <td bgcolor="#FFFFFF" class="title"><?php $oFCK2->Create();?></td>
      </tr>
	  <tr>
	    <td width="319" height="12" align="right"  bgcolor="#FFFFFF" class="title">优先显示：</td>
	    <td bgcolor="#FFFFFF" class="title"><input type="radio" name="lxs_tjbool" value=1 checked>是<input type="radio" name="lxs_tjbool" value=0>否</td>
      </tr>
	  <tr>
	    <td width="319" height="16" align="right" bgcolor="#FFFFFF" class="title">&nbsp;</td>
	    <td bgcolor="#FFFFFF" class="title"><input type="submit" onClick="return lxschool()" value="添加学校信息">
	      <input type="reset" name="reset" value="重写"></td>
      </tr>
  </form>
</table>
</div>
</BODY>
</HTML>
