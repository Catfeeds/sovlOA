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
  if (isset($_POST["yxk_title"])){

      $sql="insert into yx_kaike set yxk_cl='".$_POST["yxk_cl"]."',yxk_school=".$_POST["yxk_school"].",class_title=".$_POST["class_title"].",yxk_title='".$_POST["yxk_title"]."',pxk_pic='".$_POST["pxk_pic"]."',yxk_con='".$_POST["yxk_con"]."',yxk_xfei='".$_POST["yxk_xfei"]."',yxk_yhui='".$_POST["yxk_yhui"]."',yxk_time='".$_POST["yxk_time"]."',yxk_xshi='".$_POST["yxk_xshi"]."',yxk_tel='".$_POST["yxk_tel"]."',yxk_qq='".$_POST["yxk_qq"]."',yxk_duix='".$_POST["yxk_duix"]."',yxk_adder='".$_POST["yxk_adder"]."',yxk_line='".$_POST["yxk_line"]."'";
	
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
      echo"<script>alert('研修信息添加成功');location.href='yx_kclist.php';</script>";
	  }else{
	  
	  exit("添加失败! 错误信息为:".mysql_error());
	}
  }
include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('yxk_con') ;
$oFCK->BasePath   = $sBasePath ;
?>

<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">研修开课信息：添加，修改介绍新闻相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="yx_kcadd.php">添加研修开课信息</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="yx_kclist.php" >查看研修开课信息</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="pxkkform" method="post" onSubmit="return pxkaike()" action="">
  <tr>
    <td colspan="2" class="mian_right_box_title_01">【添加研修开课信息】</td>
	</tr>
	<tr>
	  <td height="32" align="right" bgcolor="#FFFFFF" class="title">研修分类：</td>
	  <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
	    <select name="yxk_cl">
	      <option value=0>--请选择研修分类--</option>
	     <option value="MBA/EMBA">MBA/EMBA</option>
          <option value="工程硕士">工程硕士</option>
          <option value="在职研究生">在职研究生</option>
          <option value="总裁总监研修">总裁总监研修</option>
	      </select><span id="p_pxlb">*</span></td>
          
	  </tr>
      <tr>
	  <td height="26" align="right" bgcolor="#FFFFFF" class="title">选择专业：</td>
	  <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
	    <select name="class_title">
	      <option value=0>--请选择专业--</option>
	      <?php 
      $sql="select * from yx_class";
	  $rs=mysql_query($sql,$conn);
	  if (mysql_num_rows($rs)>=1){
	  while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
      ?>
	      <option value="<?php echo $row["class_id"]?>"><?php echo $row["class_title"]?></option>
	      <?php
          }
		  }?>
	      </select>
        <span id="p_xxxz">*</span></td>
	  </tr>
	<tr>
	  <td height="26" align="right" bgcolor="#FFFFFF" class="title">选择学校：</td>
	  <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
	    <select name="yxk_school">
	      <option value=0>--请选择学校--</option>
	      <?php 
      $sql="select * from yx_school";
	  $rs=mysql_query($sql,$conn);
	  if (mysql_num_rows($rs)>=1){
	  while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
      ?>
	      <option value="<?php echo $row["school_id"]?>"><?php echo $row["school_name"]?></option>
	      <?php
          }
		  }?>
	      </select>
        <span id="p_xxxz">*</span></td>
	  </tr>
	  <tr>
	    <td height="28" align="right" bgcolor="#FFFFFF" class="title">开课名称：</td>
	    <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title">
        <input type="text" name="yxk_title" id="pxk_title" value="" maxlength="100" style="width:300px;"/><span id="p_kbmc">*</span></td>
      </tr>
	  <tr>
	    <td height="28" align="right" bgcolor="#FFFFFF" class="title">宣传图片：</td>
	   <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="pxk_pic" value="" style="width:210px;" readonly/>
          <input name="button" type="button" class="go" onClick="window.open('up2.php?formname=pxkkform&editname=pxk_pic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传图片" />
        <span id="logdex">*</span><span style="color:#999"> 尺寸(px)：245x188</span></td>
      </tr>
	 
	  <tr>
	    <td height="56" align="right" bgcolor="#FFFFFF" class="title">课程信息介绍：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
		<?php $oFCK->Create();?></td>
    </tr>
	  <tr>
	    <td height="29" align="right" bgcolor="#FFFFFF" class="title">学　费：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text"  maxlength="100" name="yxk_xfei"></td>
    </tr>
	  <tr>
	    <td height="34" align="right" bgcolor="#FFFFFF" class="title">优惠价：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text"  maxlength="100" name="yxk_yhui"></td>
      </tr>
	  <tr>
	    <td height="31" align="right" bgcolor="#FFFFFF" class="title">开课时间：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="yxk_time"></td>
      </tr>
	  <tr>
	    <td height="33" align="right" bgcolor="#FFFFFF" class="title">学时：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="yxk_xshi"></td>
      </tr>

	  <tr>
	    <td height="27" align="right" bgcolor="#FFFFFF" class="title">联系电话：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="yxk_tel"><span id="p_lxdh">*</span></td>
      </tr>
	  <tr>
	    <td height="30" align="right" bgcolor="#FFFFFF" class="title">在线QQ：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text"  maxlength="12" onKeyUp="value=value.replace(/[^\d]/g,'')" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))"  name="yxk_qq"></td>
      </tr>
	  <tr>
	    <td height="29" align="right" bgcolor="#FFFFFF" class="title">招生对象：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="yxk_duix" style="width:180px;"></td>
      </tr>
      	  <tr>
	    <td height="29" align="right" bgcolor="#FFFFFF" class="title">上课地点：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="yxk_adder" id="pxk_adder" style="width:180px;">
	      <span id="p_skdd">*</span></td>
      </tr>
	  <tr>
	    <td height="36" align="right" bgcolor="#FFFFFF" class="title">公交线路：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="yxk_line" id="pxk_line" style="width:180px;"></td>
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