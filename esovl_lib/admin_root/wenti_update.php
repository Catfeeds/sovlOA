<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>研修版信息列表</TITLE>
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
  if (isset($_POST["cj_wenti"])){ 
  	 // exit($_POST["ndate"]);
	$sql="update yx_changj set cj_wenti='".$_POST["cj_wenti"]."',cj_huif='".$_POST["cj_huif"]."',cj_pindao='".$_POST["cj_pindao"]."' where cj_id=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
	
      echo"<script>alert('修改成功');location.href='yx_wenti_list.php';</script>";
	  }else{
	  
	  exit("更新失败! 错误信息为:".mysql_error());
	  }
  }
  	$sql="select * from yx_changj where cj_id=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	  $row=mysql_fetch_assoc($rs);
	  }

include('fckeditor/fckeditor.php');
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('cj_huif');
$oFCK->BasePath   = $sBasePath ;
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">研修版信息：添加，修改介绍企业相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
  <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
    <form name="formnews" method="post" onSubmit="return newsset()" action="">
      <tr>
        <td colspan="5" class="mian_right_box_title_01">【编辑研修版新闻信息】</td>
      </tr>
      <tr>
        <td height="40" colspan="4" align="right" bgcolor="#FFFFFF" class="title">选择频道：</td>
        <td width="919" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><input name="id" value="<?php echo $_GET["id"]?>" type="hidden"><select name="cj_pindao">
      
  <option value="<?php echo $row["cj_pindao"]?>"><?php echo $row["cj_pindao"]?></option>
	     <option value="MBA/EMBA">MBA/EMBA</option> 
          <option value="工程硕士">工程硕士</option>
          <option value="在职研究生">在职研究生</option>
          <option value="总裁总监研修">总裁总监研修</option>

          </select>
        <span id="ncl">*</span> </td>
        
      </tr>
            
      <tr>
        <td height="38" colspan="4" align="right" bgcolor="#FFFFFF" class="title">信息标题：</td>
        <td width="919" bgcolor="#FFFFFF" class="title"><input type="text" name="cj_wenti" id="ntitle" value="<?php echo $row["cj_wenti"]?>" maxlength="40" style="width:300px;"/><input type="hidden" name="mid" value="<?php echo $mid;?>">
            <span id="ntil">*</span></td>
      </tr>
      <tr>
        <td height="56" colspan="4" align="right" bgcolor="#FFFFFF" class="title">信息内容：</td>
        <td bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
		<?php 
		$oFCK->Value  = $row["cj_huif"];
		$oFCK->Create();
		?></td>
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
