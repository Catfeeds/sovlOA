<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>学校名称列表</TITLE>
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
  
  if (isset($_POST["sadd"])){
      $sql="insert into school set s_name='".$_POST["s_name"]."', s_banner='".$_POST["s_banner"]."', s_xyjs='".$_POST["s_xyjs"]."', s_bxys='".$_POST["s_bxys"]."', s_zsdx='".$_POST["s_zsdx"]."', s_xxhj='".$_POST["s_xxhj"]."', s_kkxx='".$_POST["s_kkxx"]."', s_bmxz='".$_POST["s_bmxz"]."', s_xlxw='".$_POST["s_xlxw"]."'";
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('添加成功');location.href='xl_list_school.php';</script>";
	  }else{	  
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }
  
include('fckeditor/fckeditor.php');
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('s_xyjs');
$oFCK->BasePath   = $sBasePath ;

$oFCK1 = new FCKeditor('s_xxhj');
$oFCK1->BasePath   = $sBasePath ;
$oFCK2 = new FCKeditor('s_kkxx');
$oFCK2->BasePath   = $sBasePath ;
$oFCK3 = new FCKeditor('s_bmxz');
$oFCK3->BasePath   = $sBasePath ;
$oFCK4 = new FCKeditor('s_xlxw');
$oFCK4->BasePath   = $sBasePath ;
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">学校名称：添加，修改</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="xl_school.php" >添加学校信息</a><font color="#0000FF"> | </font><a href="xl_list_school.php" >查看学校类别列表</a></td>
  </tr>
</table>

<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="formclass" method="post" onSubmit="return school()" action="">
  <tr>
    <td colspan="2" class="mian_right_box_title_01">【添加学校分类】</td>
	</tr>
	  <tr>
    <td width="319" height="-2" align="right" bgcolor="#FFFFFF" class="title">网院名称：</td>
	<td width="998" bgcolor="#FFFFFF" class="title"><input name="sadd" value="kcok" type="hidden"><input type="text" name="s_name" id="s_name" value="" maxlength="40" style="width:300px;"/></td>
    </tr>
	  <tr>
	    <td width="319" height="22" align="right" bgcolor="#FFFFFF" class="title">学院BANNER：</td>
	    <td bgcolor="#FFFFFF" class="title"><input type="text" name="s_banner" style="width:210px;" readonly/>
          <input name="button" type="button" class="go" onClick="window.open('up2.php?formname=formclass&editname=s_banner&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传Banner图片" />
(Size: 946x115)</td>
	  </tr>
	  <tr>
	    <td width="319" height="21" align="right" bgcolor="#FFFFFF" class="title">学院介绍：</td>
	    <td bgcolor="#FFFFFF" class="title"><?php $oFCK->Create();?></td>
      </tr>
	  <tr>
	    <td width="319" height="114" align="right" bgcolor="#FFFFFF" class="title">办学优势：</td>
	    <td bgcolor="#FFFFFF" class="title"><textarea name="s_bxys" style="width:500px;height:100px;"></textarea></td>
      </tr>
	  <tr>
	    <td width="319" height="22" align="right" bgcolor="#FFFFFF" class="title">招生对象：</td>
	    <td bgcolor="#FFFFFF" class="title"><textarea name="s_zsdx" style="width:500px;height:100px;"></textarea></td>
      </tr>
	  <tr>
	    <td width="319" height="23" align="right" bgcolor="#FFFFFF" class="title">学校环境：</td>
	    <td bgcolor="#FFFFFF" class="title"><?php $oFCK1->Create();?></td>
      </tr>
	  <tr>
	    <td width="319" height="22" align="right" bgcolor="#FFFFFF" class="title">开课信息：</td>
	    <td bgcolor="#FFFFFF" class="title"><?php $oFCK2->Create();?></td>
      </tr>
	  <tr>
	    <td width="319" height="24" align="right" bgcolor="#FFFFFF" class="title">报名须知：</td>
	    <td bgcolor="#FFFFFF" class="title"><?php $oFCK3->Create();?></td>
      </tr>
	  <tr>
	    <td width="319" height="11" align="right" bgcolor="#FFFFFF" class="title">学历学位：</td>
	    <td bgcolor="#FFFFFF" class="title"><?php $oFCK4->Create();?></td>
      </tr>
	  <tr>
	    <td width="319" height="16" align="right" bgcolor="#FFFFFF" class="title">&nbsp;</td>
	    <td bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit2" value="添加学院信息">　
	      <input type="reset" name="reset" value="重写"></td>
      </tr>
  </form>
</table>
</div>
</BODY>
</HTML>
