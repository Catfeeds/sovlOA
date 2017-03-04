<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>企业信息列表</TITLE>
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
  if (isset($_POST["cp_title"])){
      $sql="update cpinfo set cp_title='".$_POST["cp_title"]."',cp_info='".$_POST["cp_info"]."',cp_banner='".$_POST["cp_banner"]."',cp_date='".$_POST["cp_date"]."' where cp_id=".$_POST["cp_id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
      echo"<script>alert('修改成功');location.href='z_cpinfo.php';</script>";	  
	  }else{
	  
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }
  $sql="select * from cpinfo where cp_id=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
		  $row=mysql_fetch_assoc($rs);
	  }

include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('cp_info') ;
$oFCK->BasePath   = $sBasePath ;
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">企业信息：添加，修改介绍企业相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="z_infoadd.php">添加企业信息</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="z_cpinfo.php" >查看企业信息</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="forminfo" method="post" onSubmit="return infoset()" action="">
  <tr>
    <td colspan="5" class="mian_right_box_title_01">【编辑企业信息】</td>
	</tr>
	  <tr>
    <td height="33" colspan="4" align="right" bgcolor="#FFFFFF" class="title">信息标题：</td>
	<td width="919" bgcolor="#FFFFFF" class="title"><input type="hidden" name="cp_id" id="cp_id" value="<?php echo $row["cp_id"]?>"/><input type="text" name="cp_title" id="cp_title" value="<?php echo $row["cp_title"]?>" maxlength="40" style="width:300px;"/><span id="intitle">*</span></td>
    </tr>
	  <tr>
	    <td height="27" colspan="4" align="right" bgcolor="#FFFFFF" class="title">bnaner图：</td>
        <td bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><input type="text" name="cp_banner" value="<?php echo $row["cp_banner"];?>" style="width:210px;" readonly/>
          <input name="button" type="button" class="go" onClick="window.open('up2.php?formname=forminfo&editname=cp_banner&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传Logo" />
          <span id="logdex">*</span><span style="color:#999"> 尺寸(px)：165x120</span> <span style="margin-left:20px; position:relative;" onMouseOver="document.getElementById('showlg').style.display=''" onMouseOut="document.getElementById('showlg').style.display='none'">预览
 <div id="showlg" style="width:50px;height:50px; display:none; position:absolute; top:-120px;left:-73px;"><img src="<?php echo $row["cp_banner"];?>" width="186" height="113" /></div>
        </span></td>
    </tr>
	  <tr>
	    <td height="28" colspan="4" align="right" bgcolor="#FFFFFF" class="title">信息内容：<span id="incon"></span></td>
	    <td bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><span class="title" style="padding-left:12px;">
	    <?php 
		$oFCK->Value  = $row["cp_info"];
		$oFCK->Create();
		?>
	    </span></td>
      </tr>
	  <tr>
	    <td height="38" colspan="4" align="right" bgcolor="#FFFFFF" class="title">提交时间：</td>
        <td bgcolor="#FFFFFF" class="title"><input type="text" name="cp_date" id="cp_date" value="<?php echo date("Y-m-d H:i:s");?>" maxlength="40" style="width:300px;"/></td>
    </tr>
	  <tr>
	    <td height="29" colspan="4" align="right" bgcolor="#FFFFFF" class="title">&nbsp;</td>
        <td bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" value="保存信息"></td>
    </tr>

  </form>
</table>
</div>
</BODY>
</HTML>
