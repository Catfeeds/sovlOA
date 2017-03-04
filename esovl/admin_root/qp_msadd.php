<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>企培版新闻信息列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
</HEAD>
<?php include("../conn.php");?>
<script type="text/javascript" src="lgHttp.js"></script>
<script language="javascript">
function newsset(){
	   if(document.formnews.news_class.value==""){
	document.getElementById("newsclass").innerHTML="<font color=red>&times;请选择所属类别!</font>";
	document.formnews.news_class.focus();
	return false;
	}else{
	document.getElementById("newsclass").innerHTML="<font color=green><b>√</b></font>";
	}
	
	
		   if(document.formnews.news_title.value==""){
	document.getElementById("ntil").innerHTML="<font color=red>&times;请填写新闻标题!</font>";
	document.formnews.news_title.focus();
	return false;
	}else{
	document.getElementById("ntil").innerHTML="<font color=green><b>√</b></font>";
	}
	
	
		   if(document.formnews.news_zuozhe.value==""){
	document.getElementById("news_zuozhe").innerHTML="<font color=red>&times;请填写新闻标题!</font>";
	document.formnews.news_zuozhe.focus();
	return false;
	}else{
	document.getElementById("news_zuozhe").innerHTML="<font color=green><b>√</b></font>";
	}
	
}
</script>
<BODY>
<?php

if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}

  if (isset($_POST["teacher_name"])){
      $sql="insert into qp_teacher set teacher_name='".$_POST["teacher_name"]."',teacher_zhuanye='".$_POST["teacher_zhuanye"]."',teacher_con='".$_POST["teacher_con"]."',npic='".$_POST["npic"]."'";
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
      echo"<script>alert('信息添加成功');location.href='qp_mslist.php';</script>";  
	  }else{
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }

include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('teacher_con') ;
$oFCK->BasePath   = $sBasePath ;
?> 
<br>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="formnews" method="post" onSubmit="return newsset()" action="">
  <tr>
    <td colspan="2" class="mian_right_box_title_01">【添加企培版新闻信息】</td>
	</tr>
	  <tr>
	    <td height="38" align="right" bgcolor="#FFFFFF" class="title">教师姓名：</td>
	    <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="teacher_name" id="news_title" value="" maxlength="40" style="width:300px;"/>
	      <label id="ntil"></label>
        <span id="ntil">*</span></td>
      </tr>
	 
	  <tr>
	    <td height="41" align="right" bgcolor="#FFFFFF" class="title">教师图片：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="npic" size="50" style="width:300px;"><input type="button" value="浏览" onClick="window.open('up2.php?formname=formnews&editname=npic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=145')"> 
	      尺寸:116x135</td>
      </tr>
	  <tr>
	    <td height="56" align="right" bgcolor="#FFFFFF" class="title">详细介绍：<span id="incon"></span></td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php $oFCK->Create();?></td>
    </tr>
    	  <tr>
	    <td height="36" align="right" bgcolor="#FFFFFF" class="title">相关专业：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title">
          <input type="text" name="teacher_zhuanye" id="news_zuozhe" style="width:300px;"><label id="teacher_zhuanye"></label><span id="ntil">*</span>
        </td>
    </tr>
	  <tr>
	    <td height="29" align="right" bgcolor="#FFFFFF" class="title">&nbsp;</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" value="保存信息"></td>
    </tr>
  </form>
</table>
</div>
</BODY>
</HTML>
