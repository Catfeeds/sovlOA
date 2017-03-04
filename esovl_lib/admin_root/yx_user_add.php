<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>录取信息列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
</HEAD>
<?php include("../conn.php");?>
<script type="text/javascript">
function luqu(){
	if(document.kaikeform.s_id.value==0){
	alert('请选择学校');
	document.kaikeform.s_id.focus();
	return false;
	}
	if(document.kaikeform.lq_zy.value==0){
	alert('请选择专业');
	document.kaikeform.lq_zy.focus();
	return false;
	}
	if(document.kaikeform.lq_name.value==0){
	alert('填写录取姓名');
	document.kaikeform.lq_name.focus();
	return false;
	}
}
</script>
<BODY>
<?php
if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}
  if (isset($_POST["lq_name"])){

      $sql="insert into yx_luqu set school_id=".$_POST["school_id"].",lq_name='".$_POST["lq_name"]."',lq_date='".$_POST["lq_date"]."',lq_zy='".$_POST["lq_zy"]."'";
/*	  exit($sql);*/
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
      echo"<script>alert('信息添加成功');location.href='yx_lq_list.php';</script>";
	  }else{
	  echo $sql;
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }

?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">录取信息：添加，修改</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="kaikeform" method="post" onSubmit="return luqu()" action="">
  <tr>
    <td colspan="2" class="mian_right_box_title_01">【添加录取信息】</td>
	</tr> 
	<tr>
	    <td height="27" align="right" bgcolor="#FFFFFF" class="title">选择已开课学校：</td>
        <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
		<input name="cid" value="<?php echo $_GET["id"]?>" type="hidden">
		<select name="school_id">
		<option value=0>--请选择学校--</option>
	  <?php 
      $sql="select * from yx_school ";// $sql="select * from yx_school where school_id in (select s_id from kkinfo)";
	  $rs=mysql_query($sql,$conn);
	  if (mysql_num_rows($rs)>=1){
	  while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
      ?>
		  <option value="<?php echo $row["school_id"]?>"><?php echo $row["school_name"]?></option>
		  <?php
          }
		  }?>
        </select>
		<span id="k_school">*</span> </td>
	  </tr>
	<tr>
    	  <td height="30" align="right" bgcolor="#FFFFFF" class="title">所学专业名称：</td>
	  <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
	    <select name="lq_zy">
          <option value=0>--请选择专业--</option> 
          <?php 
      $sql="select * from yx_class";
	  $rs=mysql_query($sql,$conn);
	  if (mysql_num_rows($rs)>=1){
	  while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
      ?>
          <option value="<?php echo $row["class_title"]?>"><?php echo $row["class_title"]?></option>
          <?php
          }
		  }?>
        </select>
	    <span id="k_school2">*</span></td>
	  </tr>
	  <tr>
    <td height="38" align="right" bgcolor="#FFFFFF" class="title">录取学员姓名：</td>
	<td width="919" colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="lq_name" id="lq_name" value="" maxlength="20" style="width:150px;"/><span id="k_lq_name">*</span></td>
    </tr>
	  <tr>
      <tr>
    <td height="38" align="right" bgcolor="#FFFFFF" class="title">录取学员时间：</td>
	<td width="919" colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="lq_date" id="ndate" value="<?php echo date("Y-m-d H:i:s");?>" maxlength="40" style="width:300px;"/><span id="k_lq_name">*</span></td>
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