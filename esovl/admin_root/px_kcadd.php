<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>添加培训开课信息</TITLE>
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
  if (isset($_POST["pxk_title"])){

      $sql="insert into pxkkinfo set pxk_cl=".$_POST["pxk_cl"].",pxk_sid=".$_POST["pxk_sid"].",pxk_title='".$_POST["pxk_title"]."',pxk_pic='".$_POST["pxk_pic"]."',pxk_con='".$_POST["pxk_con"]."',pxk_xfei='".$_POST["pxk_xfei"]."',pxk_yhui='".$_POST["pxk_yhui"]."',pxk_time='".$_POST["pxk_time"]."',pxk_xshi='".$_POST["pxk_xshi"]."',pxk_tel='".$_POST["pxk_tel"]."',pxk_qq='".$_POST["pxk_qq"]."',pxk_duix='".$_POST["pxk_duix"]."',pxk_adder='".$_POST["pxk_adder"]."',pxk_line='".$_POST["pxk_line"]."',pxk_date=now()";
	
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
      echo"<script>alert('培训信息添加成功');location.href='px_kclist.php';</script>";
	  }else{
	  
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }
include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('pxk_con') ;
$oFCK->BasePath   = $sBasePath ;
?>

<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">培训开课信息：添加，修改介绍新闻相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="px_kcadd.php">添加培训开课信息</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="px_kclist.php" >查看培训开课信息</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="pxkkform" method="post" onSubmit="return pxkaike()" action="">
  <tr>
    <td colspan="2" class="mian_right_box_title_01">【添加培训开课信息】</td>
	</tr>
	<tr>
	  <td height="32" align="right" bgcolor="#FFFFFF" class="title">培训分类：</td>
	  <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
	    <select name="pxk_cl">
	      <option value=0>--请培训种类--</option>
	      <?php 
      $sql="select * from pxsclass";
	  $rs=mysql_query($sql,$conn);
	  if (mysql_num_rows($rs)>=1){
	  while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
      ?>
	      <option value="<?php echo $row["ps_id"]?>"><?php echo $row["ps_title"]?></option>
	      <?php }}?>
	      </select><span id="p_pxlb">*</span></td>
	  </tr>
	<tr>
	  <td height="26" align="right" bgcolor="#FFFFFF" class="title">选择学校：</td>
	  <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
	    <select name="pxk_sid">
	      <option value=0>--请选择学校--</option>
	      <?php 
      $sql="select * from pxschool";
	  $rs=mysql_query($sql,$conn);
	  if (mysql_num_rows($rs)>=1){
	  while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
      ?>
	      <option value="<?php echo $row["pxs_id"]?>"><?php echo $row["pxs_name"]?></option>
	      <?php
          }
		  }?>
	      </select>
        <span id="p_xxxz">*</span></td>
	  </tr>
	  <tr>
	    <td height="28" align="right" bgcolor="#FFFFFF" class="title">开班名称：</td>
	    <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title">
        <input type="text" name="pxk_title" id="pxk_title" value="" maxlength="100" style="width:300px;"/><span id="p_kbmc">*</span></td>
      </tr>
	  <tr>
	    <td height="28" align="right" bgcolor="#FFFFFF" class="title">宣传图片：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="pxk_pic" value="" style="width:210px;" readonly/>
          <input name="button" type="button" class="go" onClick="window.open('up2.php?formname=pxkkform&editname=pxk_pic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传图片" />
        <span id="logdex">*</span><span style="color:#999"> 尺寸(px)：245x188</span></td>
      </tr>
	 
	  <tr>
	    <td height="56" align="right" bgcolor="#FFFFFF" class="title">专业介绍：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
		<?php $oFCK->Create();?></td>
    </tr>
	  <tr>
	    <td height="29" align="right" bgcolor="#FFFFFF" class="title">学　费：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text"  maxlength="100" name="pxk_xfei"></td>
    </tr>
	  <tr>
	    <td height="34" align="right" bgcolor="#FFFFFF" class="title">优惠价：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text"  maxlength="100" name="pxk_yhui"></td>
      </tr>
	  <tr>
	    <td height="31" align="right" bgcolor="#FFFFFF" class="title">开课时间：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="pxk_time"></td>
      </tr>
	  <tr>
	    <td height="33" align="right" bgcolor="#FFFFFF" class="title">学时：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="pxk_xshi"></td>
      </tr>

	  <tr>
	    <td height="27" align="right" bgcolor="#FFFFFF" class="title">联系电话：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="pxk_tel"><span id="p_lxdh">*</span></td>
      </tr>
	  <tr>
	    <td height="30" align="right" bgcolor="#FFFFFF" class="title">在线QQ：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text"  maxlength="12" onKeyUp="value=value.replace(/[^\d]/g,'')" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))"  name="pxk_qq"></td>
      </tr>
	  <tr>
	    <td height="29" align="right" bgcolor="#FFFFFF" class="title">招生对象：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="pxk_duix" style="width:180px;"></td>
      </tr>
      	  <tr>
	    <td height="29" align="right" bgcolor="#FFFFFF" class="title">上课地点：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="pxk_adder" id="pxk_adder" style="width:180px;">
	      <span id="p_skdd">*</span></td>
      </tr>
	  <tr>
	    <td height="36" align="right" bgcolor="#FFFFFF" class="title">公交线路：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="pxk_line" id="pxk_line" style="width:180px;"></td>
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
