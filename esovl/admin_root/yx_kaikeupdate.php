<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>编辑研修研修开课信息</TITLE>
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
   $sql="update yx_kaike set yxk_cl='".$_POST["yxk_cl"]."',yxk_xshi='".$_POST["yxk_xshi"]."',class_title=".$_POST["class_title"].",yxk_school=".$_POST["yxk_school"].",yxk_title='".$_POST["yxk_title"]."',pxk_pic='".$_POST["pxk_pic"]."',yxk_con='".$_POST["yxk_con"]."',yxk_xfei='".$_POST["yxk_xfei"]."',yxk_yhui='".$_POST["yxk_yhui"]."',yxk_time ='".$_POST["yxk_time"]."',yxk_time='".$_POST["yxk_time"]."',yxk_tel='".$_POST["yxk_tel"]."',yxk_qq='".$_POST["yxk_qq"]."',yxk_duix='".$_POST["yxk_duix"]."',yxk_adder='".$_POST["yxk_adder"]."',yxk_line='".$_POST["yxk_line"]."',pxk_bool='".$_POST["pxk_bool"]."' where yxk_id=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	
      echo"<script>alert('修改成功');location.href='yx_kclist.php';</script>";
	  }else{	  
	  exit("更新失败! 错误信息为:".mysql_error());
	  }
}
$sql="select * from yx_kaike where yxk_id=".$_GET["id"];
$rs=mysql_query($sql,$conn);
if (!$rs){	 
exit("查询失败! 错误信息为:".mysql_error());
}else{
$row=mysql_fetch_assoc($rs);
}
include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('yxk_con') ;
$oFCK->BasePath   = $sBasePath ;
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">研修开课信息：添加，修改介绍企业相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="px_kcadd.php">添加研修开课信息</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="px_kclist.php" >查看研修开课信息</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
  <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
    <form name="pxkkform" method="post" onSubmit="return pxkaike()" action="">
      <tr>
        <td colspan="4" class="mian_right_box_title_01">【编辑研修开课信息】</td>
      </tr>
	  <tr>
	  <td height="7" align="right" bgcolor="#FFFFFF" class="title">学样类别：</td>
	  <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
      <select name="yxk_cl">
	  <?php 
      $sql2="select * from yx_kaike where yxk_id=".$_GET["id"];
	  $rs2=mysql_query($sql2,$conn);
	  if (mysql_num_rows($rs2)>=1){
	  while ($row2=mysql_fetch_array($rs2,MYSQL_ASSOC)){
      ?>
	  <option value="<?php echo $row2["yxk_cl"]?>"><?php echo $row2["yxk_cl"]?></option>
      <option value="MBA/EMBA">MBA/EMBA</option> 
      <option value="工程硕士">工程硕士</option>
      <option value="在职研究生">在职研究生</option>
          <option value="总裁总监研修">总裁总监研修</option>
	      <?php }}?>
	 </select><span id="p_pxlb">*</span></td>
	  </tr>
      <tr>
	    <td height="3" align="right" bgcolor="#FFFFFF" class="title">选择专业：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
	      <input type="hidden" name="class_title" value="<?=$_GET["id"]?>">
          <select name="class_title">
            <?php
      $sql_1="select * from yx_class";
	  $rs_1=mysql_query($sql_1,$conn);
	  if (mysql_num_rows($rs_1)>=1){
	  while ($row_1=mysql_fetch_array($rs_1,MYSQL_ASSOC)){
      ?>
            <option value="<?php echo $row_1["class_id"]?>" <?php if ($row_1["class_id"]==$row["class_title"]){echo "selected";}?>><?php echo $row_1["class_title"]?></option>
            <?php
          }
		  }?>
          </select>
        <span id="p_xxxz">*</span></td>
      </tr>
	  <tr>
	    <td height="3" align="right" bgcolor="#FFFFFF" class="title">研修学校：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
	      <input type="hidden" name="pxk_id" value="<?=$_GET["id"]?>">
          <select name="yxk_school">
            <?php 
      $sql_1="select * from yx_school";
	  $rs_1=mysql_query($sql_1,$conn);
	  if (mysql_num_rows($rs_1)>=1){
	  while ($row_1=mysql_fetch_array($rs_1,MYSQL_ASSOC)){
      ?>
            <option value="<?php echo $row_1["school_id"]?>" <?php if ($row_1["school_id"]==$row["yxk_school"]){echo "selected";}?>><?php echo $row_1["school_name"]?></option>
            <?php
            }
		  }?>
          </select>
        <span id="p_xxxz">*</span></td>
      </tr>
	  <tr>
	    <td height="3" align="right" bgcolor="#FFFFFF" class="title">研修图片：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title" ><input type="text" name="pxk_pic" value="<?=$row["pxk_pic"]?>" style="width:210px;" readonly/>
          <input name="button" type="button" class="go" onClick="window.open('up2.php?formname=pxkkform&editname=pxk_pic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传图片" />
        <span id="logdex">*</span><span style="color:#999"> 尺寸(px)：245x188</span></td>
      </tr>
	  <tr>
	    <td height="38" align="right" bgcolor="#FFFFFF" class="title">开班名称：</td>
	    <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title">
        <input type="text" name="yxk_title" id="pxk_title" value="<?=$row["yxk_title"]?>" maxlength="100" style="width:300px;"/><span id="p_kbmc">*</span></td>
      </tr>
	 
	  <tr>
	    <td height="56" align="right" bgcolor="#FFFFFF" class="title">专业介绍：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
		<?php 
		$oFCK->Value  = $row["yxk_con"];
		$oFCK->Create();
		?></td>
    </tr>
	  <tr>
	    <td height="29" align="right" bgcolor="#FFFFFF" class="title">学　费：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" value="<?=$row["yxk_xfei"]?>" maxlength="100" name="yxk_xfei"></td>
    </tr>
	  <tr>
	    <td height="34" align="right" bgcolor="#FFFFFF" class="title">优惠价：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" value="<?=$row["yxk_yhui"]?>" maxlength="100" name="yxk_yhui"></td>
      </tr>
	  <tr>
	    <td height="31" align="right" bgcolor="#FFFFFF" class="title">研修开课时间：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" value="<?=$row["yxk_time"]?>" name="yxk_time"></td>
      </tr>
	  <tr>
	    <td height="33" align="right" bgcolor="#FFFFFF" class="title">学时：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" value="<?=$row["yxk_xshi"]?>" name="yxk_xshi"></td>
      </tr>

	  <tr>
	    <td height="27" align="right" bgcolor="#FFFFFF" class="title">联系电话：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" value="<?=$row["yxk_tel"]?>" name="yxk_tel"><span id="p_lxdh">*</span></td>
      </tr>
	  <tr>
	    <td height="30" align="right" bgcolor="#FFFFFF" class="title">在线QQ：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text"  maxlength="12" onKeyUp="value=value.replace(/[^\d]/g,'')" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" value="<?=$row["yxk_qq"]?>" name="yxk_qq"></td>
      </tr>
	  <tr>
	    <td height="29" align="right" bgcolor="#FFFFFF" class="title">招生对象：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="yxk_duix" value="<?=$row["yxk_duix"]?>" style="width:180px;"></td>
      </tr>
      	  <tr>
	    <td height="29" align="right" bgcolor="#FFFFFF" class="title">上课地点：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="yxk_adder" id="pxk_adder" value="<?=$row["yxk_adder"]?>" style="width:180px;">
	      <span id="p_skdd">*</span></td>
      </tr>
	  <tr>
	    <td height="36" align="right" bgcolor="#FFFFFF" class="title">公交线路：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="yxk_line" id="pxk_line" value="<?=$row["yxk_line"]?>" style="width:180px;"></td>
      </tr>
      <tr>
        <td height="14" colspan="1" align="right" bgcolor="#FFFFFF" class="title">是否推荐：</td>
        <td bgcolor="#FFFFFF" class="title"><input type="radio" name="pxk_bool" value=1 <?php if($row["pxk_bool"]==1){echo "checked";}?>>
          是
            <input type="radio" name="pxk_bool" value=0 <?php if($row["pxk_bool"]==0){echo "checked";}?>>
        否 </td>
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