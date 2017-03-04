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
  if (isset($_POST["pxk_title"])){
  
      $sql="update pxkkinfo set pxk_cl=".$_POST["pxk_cl"].",pxk_sid=".$_POST["pxk_sid"].",pxk_title='".$_POST["pxk_title"]."',pxk_pic='".$_POST["pxk_pic"]."',pxk_con='".$_POST["pxk_con"]."',pxk_xfei='".$_POST["pxk_xfei"]."',pxk_yhui='".$_POST["pxk_yhui"]."',pxk_time='".$_POST["pxk_time"]."',pxk_xshi='".$_POST["pxk_xshi"]."',pxk_tel='".$_POST["pxk_tel"]."',pxk_qq='".$_POST["pxk_qq"]."',pxk_duix='".$_POST["pxk_duix"]."',pxk_adder='".$_POST["pxk_adder"]."',pxk_line='".$_POST["pxk_line"]."',pxk_bool=".$_POST["pxk_bool"]." where pxk_id=".$_POST["pxk_id"];

	  $rs=mysql_query($sql,$conn);
	  if ($rs){	
      echo"<script>alert('修改成功');location.href='px_kclist.php';</script>";
	  }else{	  
	  exit("更新失败! 错误信息为:".mysql_error());
	  }
  }
  
      $sql="select * from pxkkinfo where pxk_id=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	  $row=mysql_fetch_assoc($rs);
	  }
include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('pxk_con') ;
$oFCK->BasePath   = $sBasePath ;
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">培训开课信息：添加，修改介绍企业相关的内容</div></th>
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
        <td colspan="4" class="mian_right_box_title_01">【编辑培训开课信息】</td>
      </tr>
	  <tr>
	  <td height="7" align="right" bgcolor="#FFFFFF" class="title">学样类别：</td>
	  <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
      <select name="pxk_cl">
	  <?php 
      $sql2="select * from pxsclass";
	  $rs2=mysql_query($sql2,$conn);
	  if (mysql_num_rows($rs2)>=1){
	  while ($row2=mysql_fetch_array($rs2,MYSQL_ASSOC)){
      ?>
	      <option value="<?php echo $row2["ps_id"]?>" <?php if ($row2["ps_id"]==$row["pxk_cl"]){echo "selected";}?>><?php echo $row2["ps_title"]?></option>
	      <?php }}?>
	 </select><span id="p_pxlb">*</span></td>
	  </tr>
	  <tr>
	    <td height="3" align="right" bgcolor="#FFFFFF" class="title">培训学校：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
	      <input type="hidden" name="pxk_id" value="<?=$_GET["id"]?>">
          <select name="pxk_sid">
            <?php 
      $sql_1="select * from pxschool";
	  $rs_1=mysql_query($sql_1,$conn);
	  if (mysql_num_rows($rs_1)>=1){
	  while ($row_1=mysql_fetch_array($rs_1,MYSQL_ASSOC)){
      ?>
            <option value="<?php echo $row_1["pxs_id"]?>" <?php if ($row_1["pxs_id"]==$row["pxk_sid"]){echo "selected";}?>><?php echo $row_1["pxs_name"]?></option>
            <?php
          }
		  }?>
          </select>
        <span id="p_xxxz">*</span></td>
      </tr>
	  <tr>
	    <td height="3" align="right" bgcolor="#FFFFFF" class="title">培训图片：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title" ><input type="text" name="pxk_pic" value="" style="width:210px;" readonly/>
          <input name="button" type="button" class="go" onClick="window.open('up2.php?formname=pxkkform&editname=pxk_pic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传图片" />
        <span id="logdex">*</span><span style="color:#999"> 尺寸(px)：245x188</span></td>
      </tr>
	  <tr>
	    <td height="38" align="right" bgcolor="#FFFFFF" class="title">开班名称：</td>
	    <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title">
        <input type="text" name="pxk_title" id="pxk_title" value="<?=$row["pxk_title"]?>" maxlength="100" style="width:300px;"/><span id="p_kbmc">*</span></td>
      </tr>
	 
	  <tr>
	    <td height="56" align="right" bgcolor="#FFFFFF" class="title">专业介绍：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
		<?php 
		$oFCK->Value  = $row["pxk_con"];
		$oFCK->Create();
		?></td>
    </tr>
	  <tr>
	    <td height="29" align="right" bgcolor="#FFFFFF" class="title">学　费：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" value="<?=$row["pxk_xfei"]?>" maxlength="100" name="pxk_xfei"></td>
    </tr>
	  <tr>
	    <td height="34" align="right" bgcolor="#FFFFFF" class="title">优惠价：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" value="<?=$row["pxk_yhui"]?>" maxlength="100" name="pxk_yhui"></td>
      </tr>
	  <tr>
	    <td height="31" align="right" bgcolor="#FFFFFF" class="title">培训开课时间：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" value="<?=$row["pxk_time"]?>" name="pxk_time"></td>
      </tr>
	  <tr>
	    <td height="33" align="right" bgcolor="#FFFFFF" class="title">学时：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" value="<?=$row["pxk_xshi"]?>" name="pxk_xshi"></td>
      </tr>

	  <tr>
	    <td height="27" align="right" bgcolor="#FFFFFF" class="title">联系电话：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" value="<?=$row["pxk_tel"]?>" name="pxk_tel"><span id="p_lxdh">*</span></td>
      </tr>
	  <tr>
	    <td height="30" align="right" bgcolor="#FFFFFF" class="title">在线QQ：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text"  maxlength="12" onKeyUp="value=value.replace(/[^\d]/g,'')" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" value="<?=$row["pxk_qq"]?>" name="pxk_qq"></td>
      </tr>
	  <tr>
	    <td height="29" align="right" bgcolor="#FFFFFF" class="title">招生对象：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="pxk_duix" value="<?=$row["pxk_duix"]?>" style="width:180px;"></td>
      </tr>
      	  <tr>
	    <td height="29" align="right" bgcolor="#FFFFFF" class="title">上课地点：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="pxk_adder" id="pxk_adder" value="<?=$row["pxk_adder"]?>" style="width:180px;">
	      <span id="p_skdd">*</span></td>
      </tr>
	  <tr>
	    <td height="36" align="right" bgcolor="#FFFFFF" class="title">公交线路：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="pxk_line" id="pxk_line" value="<?=$row["pxk_line"]?>" style="width:180px;"></td>
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
