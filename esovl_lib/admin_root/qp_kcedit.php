<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>编辑培训培训开课信息</TITLE>
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
  if (isset($_POST["qpk_id"])){
  
      $sql="update qp_kaike_class set qpk_id=".$_POST["qpk_id"].",kk_title='".$_POST["kk_title"]."',kk_kcts='".$_POST["kk_kcts"]."',kk_pxmb='".$_POST["kk_pxmb"]."',kk_jcts='".$_POST["kk_jcts"]."',kk_xxjb='".$_POST["kk_xxjb"]."',kk_sfbt='".$_POST["kk_sfbt"]."' where kk_id=".$_GET["id"];

	  $rs=mysql_query($sql,$conn);
	  if ($rs){	
      echo"<script>alert('修改成功');location.href='qp_kclist.php';</script>";
	  }else{	  
	  exit("更新失败! 错误信息为:".mysql_error());
	  }
  }
  
      $sql="select * from qp_kaike_class where kk_id=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	  $row=mysql_fetch_assoc($rs);
	  }
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

<br>
<div class="s_info">
  <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
    <form name="pxkkform" method="post" onSubmit="return pxkaike()" action="">
      <tr>
        <td colspan="4" class="mian_right_box_title_01">【编辑培训开课信息】</td>
      </tr>
	  <tr>
	  <td height="7" align="right" bgcolor="#FFFFFF" class="title">学样类别：</td>
	  <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
      <select name="qpk_id">
	  <?php 
      $sql2="select * from qp_kaike";
	  $rs2=mysql_query($sql2,$conn);
	  if (mysql_num_rows($rs2)>=1){
	  while ($row2=mysql_fetch_array($rs2,MYSQL_ASSOC)){
      ?>
	      <option value="<?php echo $row2["qpk_id"]?>" <?php if ($row2["qpk_id"]==$row["qpk_id"]){echo "selected";}?>><?php echo $row2["qpk_title"]?></option>
	      <?php }}?>
	 </select><span id="p_pxlb">*</span></td>
	  </tr>
	  <tr>
	    <td height="38" align="right" bgcolor="#FFFFFF" class="title">开班名称：</td>
	    <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title">
        <input type="text" name="kk_title" id="pxk_title" value="<?=$row["kk_title"]?>" maxlength="100" style="width:300px;"/><span id="p_kbmc">*</span></td>
      </tr>
	 
	  <tr>
	    <td height="56" align="right" bgcolor="#FFFFFF" class="title">课程特色：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
		<?php 
		$oFCKa->Value  = $row["kk_kcts"];
		$oFCKa->Create();
		?></td>
    </tr>
    	  <tr>
	    <td height="56" align="right" bgcolor="#FFFFFF" class="title">培训目标：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
		<?php 
		$oFCKb->Value  = $row["kk_pxmb"];
		$oFCKb->Create();
		?></td>
    </tr>	  <tr>
	    <td height="56" align="right" bgcolor="#FFFFFF" class="title">教材特色：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
		<?php 
		$oFCKc->Value  = $row["kk_jcts"];
		$oFCKc->Create();
		?></td>
    </tr>	  <tr>
	    <td height="56" align="right" bgcolor="#FFFFFF" class="title">学习级别：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
		<?php 
		$oFCKd->Value  = $row["kk_xxjb"];
		$oFCKd->Create();
		?></td>
    </tr>	  <tr>
	    <td height="56" align="right" bgcolor="#FFFFFF" class="title">收费标准：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
		<?php 
		$oFCKe->Value  = $row["kk_sfbt"];
		$oFCKe->Create();
		?></td>
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
