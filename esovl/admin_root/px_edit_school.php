<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>培训学校名称列表</TITLE>
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
  
  if (isset($_POST["pxs_name"])){
      $sql="update pxschool set pxs_name='".$_POST["pxs_name"]."',pxs_bool=".$_POST["pxs_bool"]." where pxs_id=".$_POST["pxs_id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
	 
      echo"<script>alert('更新成功');location.href='px_list_school.php';</script>";
	  }else{
	  
	  exit("修改失败! 错误信息为:".mysql_error());
	  }
  }

   $sql="select * from pxschool where pxs_id=".$_GET["id"];
	$rs=mysql_query($sql,$conn);
	if (!$rs){exit("编辑出现错误，错误信息为：".mysql_error());}
	$row=mysql_fetch_assoc($rs);

?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">培训学校名称：编辑，修改</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="px_school.php" >添加培训学校信息</a><font color="#0000FF">  |  </font><a href="px_list_school.php" >查看培训学校类别列表</a></td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="formes" method="post" onSubmit="return school()" action="">
  <tr>
    <td colspan="2" class="mian_right_box_title_01">【编辑培训学校分类】</td>
	</tr>
	  <tr>
    <td width="319" height="-2" align="right" bgcolor="#FFFFFF" class="title">培训学校名称：</td>
	<td width="998" bgcolor="#FFFFFF" class="title"><input name="pxs_id" type="hidden" value="<?=$_GET["id"]?>"><input type="text" name="pxs_name" id="pxs_name" value="<?php echo $row["pxs_name"];?>" maxlength="40" style="width:300px;"/></td>
    </tr>
	  <tr>
	    <td width="319" height="7" align="right" bgcolor="#FFFFFF" class="title">是否推荐：</td>
	    <td bgcolor="#FFFFFF" class="title">
        <input type="radio" name="pxs_bool" value=1 <?php if($row["pxs_bool"]==1){echo "checked";}?>>是
	    <input type="radio" name="pxs_bool" value=0 <?php if($row["pxs_bool"]==0){echo "checked";}?>>否
</td>
      </tr>
	  <tr>
	    <td width="319" height="8" align="right" bgcolor="#FFFFFF" class="title">&nbsp;</td>
	    <td bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit2" value="更新学院信息">
        <input type="reset" name="reset" value="重写"></td>
      </tr>
  </form>
</table>
</div>
</BODY>
</HTML>