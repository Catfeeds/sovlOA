<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>学历版企业信息列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery.js" type="text/javascript"></script>
</HEAD>
<?php include("../conn.php");?>
<script type="text/javascript" src="lgHttp.js"></script>
<BODY>
<?php

if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}

  if (isset($_POST["teacher_name"])){ 
      $sql="update qp_teacher set teacher_name='".$_POST["teacher_name"]."',teacher_zhuanye='".$_POST["teacher_zhuanye"]."',npic='".$_POST["npic"]."',teacher_con='".$_POST["teacher_con"]."' where teacher_id=".$_GET["id"];
	//  exit($sql);
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
	
      echo"<script>alert('修改成功');location.href='qp_mslist.php';</script>";
	  }else{
	  
	  exit("更新失败! 错误信息为:".mysql_error());
	  }
  }
      $sql="select * from qp_teacher where teacher_id=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	  $row=mysql_fetch_assoc($rs);
	  }

include('fckeditor/fckeditor.php');
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('teacher_con');
$oFCK->BasePath   = $sBasePath ;
?> 
<br>
<br>
<div class="s_info">
  <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
    <form name="formnews" method="post" onSubmit="return newsset()" action="">
      <tr>
       <td colspan="2" class="mian_right_box_title_01">【编辑学历版新闻信息】</td>
      </tr>
      <tr>
        <td height="38" align="right" bgcolor="#FFFFFF" class="title">教师姓名：</td>
        <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="teacher_name" id="ntitle" value="<?php echo $row["teacher_name"]?>" maxlength="40" style="width:300px;"/>
            <span id="ntil">*</span></td>
      </tr>
      <tr>
        <td height="38" align="right" bgcolor="#FFFFFF" class="title">教师图片：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><input type="text" name="npic" size="50" value="<?php echo $row["npic"];?>"><input type="button" value="浏览" onClick="window.open('up2.php?formname=formnews&editname=npic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')"><input type="button" value="预览" onMouseOver="document.getElementById('showpic').style.display=''" onMouseOut="document.getElementById('showpic').style.display='none'"><div id="showpic" style=" width:50px; height:50px; position:absolute; display:none;"><img src="<?=$row['npic']?>"></div></td>
      </tr>
      <tr>
        <td height="56" align="right" bgcolor="#FFFFFF" class="title">详细介绍：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
		<?php 
		$oFCK->Value  = $row["teacher_con"];
		$oFCK->Create();
		?>
        </td>
      </tr>
      <tr>
        <td height="28" align="right" bgcolor="#FFFFFF" class="title">相关专业：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="teacher_zhuanye" value="<?php echo $row["teacher_zhuanye"];?>"></td>
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
