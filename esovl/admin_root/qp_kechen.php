<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>开课信息列表</TITLE>
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
  if (isset($_POST["kk_title"])){
      $sql="insert into qp_kaike_class set qpk_id=".$_POST["qpk_id"].",kk_title='".$_POST["kk_title"]."',kk_kcts='".$_POST["kk_kcts"]."',kk_pxmb='".$_POST["kk_pxmb"]."',kk_jcts='".$_POST["kk_jcts"]."',kk_xxjb='".$_POST["kk_xxjb"]."',kk_sfbt='".$_POST["kk_sfbt"]."'";
	$rs=mysql_query($sql,$conn);
	  if ($rs){
      echo"<script>alert('信息添加成功');location.href='qp_kclist.php';</script>";
	  }else{
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }
?> 
<?php
include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCKa = new FCKeditor('kk_kcts') ;
$oFCKa->BasePath   = $sBasePath ;

$sBasePath = 'fckeditor/';
$oFCKb = new FCKeditor('kk_pxmb') ;
$oFCKb->BasePath   = $sBasePath ;

$sBasePath = 'fckeditor/';
$oFCKc = new FCKeditor('kk_jcts') ;
$oFCKc->BasePath   = $sBasePath ;

$sBasePath = 'fckeditor/';
$oFCKd = new FCKeditor('kk_xxjb') ;
$oFCKd->BasePath   = $sBasePath ;

$sBasePath = 'fckeditor/';
$oFCKe = new FCKeditor('kk_sfbt') ;
$oFCKe->BasePath   = $sBasePath ;
?>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="kaikeform" method="post" onSubmit="return kaike()" action="">
  <tr>
    <td colspan="2" class="mian_right_box_title_01">【添加开课信息】</td>
	</tr> 
	<tr>
	    <td height="36" align="right" bgcolor="#FFFFFF" class="title">选择简章大类：</td>
        <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
          <select name="qpk_id">
		  <option value=0>-请选择-</option>
	 <?php 
      $sql="select * from qp_kaike";
	  $rs=mysql_query($sql,$conn);
	  if (mysql_num_rows($rs)>=1){
	  while ($rw=mysql_fetch_array($rs,MYSQL_ASSOC)){
      ?>
           
			<option value=<?php echo $rw["qpk_id"];?>><?php echo $rw["qpk_title"];?></option>
	  <?php }}?>
          </select>
          <span id="k_bk">*</span></td>
	  </tr>
	  <tr>
	    <td height="38" align="right" bgcolor="#FFFFFF" class="title">开班名称：</td>
	    <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="kk_title" id="ktitle" value="" maxlength="40" style="width:300px;"/><span id="k_ktitle">*</span></td>
      </tr>
	 
	  <tr>
	    <td height="56" align="right" bgcolor="#FFFFFF" class="title">课程特色：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><textarea name="kk_kcts" style="width:500px; height:200px;"></textarea><span id="k_zycon">*</span></td>
    </tr>
    	  <tr>
	    <td height="56" align="right" bgcolor="#FFFFFF" class="title">培训目标：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><textarea name="kk_pxmb" style="width:500px; height:200px;"></textarea><span id="k_zycon">*</span></td>
    </tr>
    	  <tr>
	    <td height="56" align="right" bgcolor="#FFFFFF" class="title">教材特色：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><textarea name="kk_jcts" style="width:500px; height:200px;"></textarea><span id="k_zycon">*</span></td>
    </tr>
    	  <tr>
	    <td height="56" align="right" bgcolor="#FFFFFF" class="title">学校级别：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><textarea name="kk_xxjb" style="width:500px; height:200px;"></textarea><span id="k_zycon">*</span></td>
    </tr>
    	  <tr>
	    <td height="56" align="right" bgcolor="#FFFFFF" class="title">收费标准：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><textarea name="kk_sfbt" style="width:500px; height:200px;"></textarea><span id="k_zycon">*</span></td>
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
