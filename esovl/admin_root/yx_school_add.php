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
      $sql="insert into yx_school set school_name='".$_POST["school_name"]."', s_banner='".$_POST["s_banner"]."', school_kc='".$_POST["school_kc"]."', school_xw='".$_POST["school_xw"]."', school_zs='".$_POST["school_zs"]."', school_sz='".$_POST["school_sz"]."', school_kcsz='".$_POST["school_kcsz"]."', school_bmxz='".$_POST["school_bmxz"]."',nbool=".$_POST["nbool"].",school_tel='".$_POST["school_tel"]."', school_cailiao='".$_POST["school_cailiao"]."'";
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('添加成功');location.href='yx_list_school.php';</script>";
	  }else{	  
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }
include('fckeditor/fckeditor.php');
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('school_kc');
$oFCK->BasePath   = $sBasePath ;

$oFCK1 = new FCKeditor('school_xw');
$oFCK1->BasePath   = $sBasePath ;
$oFCK2 = new FCKeditor('school_zs');
$oFCK2->BasePath   = $sBasePath ;
$oFCK3 = new FCKeditor('school_sz');
$oFCK3->BasePath   = $sBasePath ;
$oFCK4 = new FCKeditor('school_kcsz');
$oFCK4->BasePath   = $sBasePath ;
$oFCK5 = new FCKeditor('school_bmxz');
$oFCK5->BasePath   = $sBasePath ;
$oFCK6 = new FCKeditor('school_cailiao');
$oFCK6->BasePath   = $sBasePath ;
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">学校名称：添加，修改</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="yx_school_add.php" >添加学校信息</a><font color="#0000FF"> | </font><a href="yx_list_school.php" >查看研修学校类别列表</a></td>
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
	<td width="998" bgcolor="#FFFFFF" class="title"><input name="sadd" value="kcok" type="hidden"><input type="text" name="school_name" id="s_name" value="" maxlength="40" style="width:300px;"/></td>
    </tr>
	  <tr>
	    <td width="319" height="22" align="right" bgcolor="#FFFFFF" class="title">学院BANNER：</td>
	    <td bgcolor="#FFFFFF" class="title"><input type="text" name="s_banner" style="width:210px;" readonly/>
          <input name="button" type="button" class="go" onClick="window.open('up2.php?formname=formclass&editname=s_banner&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传Banner图片" />
(Size: 946x115)</td>
	  </tr>
	  <tr>
	    <td width="319" height="21" align="right" bgcolor="#FFFFFF" class="title">课程介绍：</td>
	    <td bgcolor="#FFFFFF" class="title"><?php $oFCK->Create();?></td>
      </tr>
	  <tr>
	    <td width="319" height="23" align="right" bgcolor="#FFFFFF" class="title">学位于证书：</td>
	    <td bgcolor="#FFFFFF" class="title"><?php $oFCK1->Create();?></td>
      </tr>
	  <tr>
	    <td width="319" height="22" align="right" bgcolor="#FFFFFF" class="title">招生对象：</td>
	    <td bgcolor="#FFFFFF" class="title"><?php $oFCK2->Create();?></td>
      </tr>
	  <tr>
	    <td width="319" height="24" align="right" bgcolor="#FFFFFF" class="title">师资配备：</td>
	    <td bgcolor="#FFFFFF" class="title"><?php $oFCK3->Create();?></td>
      </tr>
	  <tr>
	    <td width="319" height="11" align="right" bgcolor="#FFFFFF" class="title">课程设置：</td>
	    <td bgcolor="#FFFFFF" class="title"><?php $oFCK4->Create();?></td>
      </tr>
      	  <tr>
	    <td width="319" height="11" align="right" bgcolor="#FFFFFF" class="title">报名须知：</td>
	    <td bgcolor="#FFFFFF" class="title"><?php $oFCK5->Create();?></td>
      </tr>
      	  <tr>
	    <td width="319" height="11" align="right" bgcolor="#FFFFFF" class="title">申请所需材料：</td>
	    <td bgcolor="#FFFFFF" class="title"><?php $oFCK6->Create();?></td>
      </tr>
       <tr>
	    <td width="319" height="11" align="right" bgcolor="#FFFFFF" class="title">联系电话：</td>
	    <td bgcolor="#FFFFFF" class="title"><input type="text" name="school_tel"></td>
      </tr>
             <tr>
	    <td width="319" height="11" align="right" bgcolor="#FFFFFF" class="title">是否推荐：</td>
	    <td bgcolor="#FFFFFF" class="title"><input type="radio" name="nbool" value="1"><input type="hidden" name="mid" value="<?php echo $mid;?>">
是 
<input type="radio" name="nbool" checked value="0">
否</td>
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
