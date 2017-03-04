<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>添加研修开课信息</TITLE>
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
  if (isset($_POST["kaoshi_title"])){

      $sql="insert into yx_kaoshi set kaoshi_title='".$_POST["kaoshi_title"]."',class_id='".$_POST["class_id"]."',class_pindao='".$_POST["class_pindao"]."',kaoshi_con='".$_POST["kaoshi_con"]."',pxk_pic='".$_POST["pxk_pic"]."'";
//exit($sql);
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
      echo"<script>alert('研修信息添加成功');location.href='yx_kaoshi_list.php';</script>";
	  }else{
	  
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }
include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('kaoshi_con') ;
$oFCK->BasePath   = $sBasePath ;
?>

<br>

<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="pxkkform" method="post" onSubmit="return pxkaike()" action="">
  <tr>
    <td colspan="2" class="mian_right_box_title_01">【添加研修专业信息】</td>
	</tr>
	<tr>
	  <td height="32" align="right" bgcolor="#FFFFFF" class="title">研修分类：</td>
	  <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><span class="title" style="padding-left:12px;">
	    <select name="class_pindao">
	      <option value=0>--请选择研修分类--</option>
	      <option value="MBA/EMBA">MBA/EMBA</option>
	      <option value="工程硕士">工程硕士</option>
	      <option value="在职研究生">在职研究生</option>
	      <option value="总裁总监研修">总裁总监研修</option>
	      </select>
	  </span><span id="p_pxlb">*</span></td>
          
	  </tr>
      <tr>
	  <td height="32" align="right" bgcolor="#FFFFFF" class="title">研修分类：</td>
	  <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><span class="title" style="padding-left:12px;">
	    <select name="class_id"><option value=0>--请选择新闻分类--</option>
        	      <?php 
$sql="select * from yx_kaoshi_class";
$rs=mysql_query($sql,$conn);
if (mysql_num_rows($rs)>=1){
while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
?>
<option value="<?php echo $row["class_name"]?>"><?php echo $row["class_name"]?></option>
 	      <?php
}
 }?>
</select>
	  </span><span id="p_pxlb">*</span></td>
          
	  </tr>
	  <tr>
	    <td height="28" align="right" bgcolor="#FFFFFF" class="title">专业名称：</td>
	    <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title">
        <input type="text" name="kaoshi_title" id="pxk_title" value="" maxlength="100" style="width:300px;"/><span id="p_kbmc">*</span></td>
      </tr>
	  <tr>
	    <td height="28" align="right" bgcolor="#FFFFFF" class="title">宣传图片：</td>
	   <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="pxk_pic" value="" style="width:210px;" readonly/>
          <input name="button" type="button" class="go" onClick="window.open('up2.php?formname=pxkkform&editname=pxk_pic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传图片" />
        <span id="logdex">*</span><span style="color:#999"> 尺寸:75x70</span></td>
      </tr>
	 
	  <tr>
	    <td height="56" align="right" bgcolor="#FFFFFF" class="title">专业介绍</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
		<?php $oFCK->Create();?></td>
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