<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>研修名称列表</TITLE>
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

if (@$_GET["del"]=="ok"){ 
  
      $sql="delete from pxschool where pxs_id=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	
      echo"<script>alert('删除成功');location.href='px_list_school.php';</script>";
	  }else{	  
	  exit("删除失败! 错误信息为:".mysql_error());
	  }
  }
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">研修学校名称：添加，修改</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="yx_school_add.php">添加研修校训信息</a><font color="#0000FF">  |  </font><a href="yx_list_school.php" >查看研修学校列表</a></td>
  </tr>
</table>
<br>
<div class="pxs_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
  <tr>
    <td class="mian_right_box_title_01">名称ID：</td>
	<td class="mian_right_box_title_01">名称标题：</td>
	<td class="mian_right_box_title_01">操作</td>
  </tr>s
	<?php
	  $sql="select * from yx_school";
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	 
	     if(mysql_num_rows($rs)>=1){
		 $i=0;
		     while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
			 $i=$i+1;
			 ?>
	
	<form name="cform<?php echo $i?>" method="post" onSubmit="return nclass()" action="">
	  <tr>

	<td width="124" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["school_id"]?></td>
	
	<td width="477" colspan="-2" bgcolor="#FFFFFF" class="title">
	  <input name="kcedit" value="editok" type="hidden">
	  <input name="pxs_id" value="<?php echo $row["school_id"]?>" type="hidden">
	  <input type="text" name="pxs_name" id="pxs_name" value="<?php echo $row["school_name"]?>" readonly maxlength="40" style="width:300px;"/></td>
	<td width="527" bgcolor="#FFFFFF" class="title"><a href="yx_school_update.php?id=<?php echo $row["school_id"];?>">编辑信息</a> 　<a href="px_list_school.php?del=ok&id=<?php echo $row["pxs_id"];?>" onClick="return confirm('确定将此研修删除吗?')">删除</a> </td>
	  </tr>
  </form>
  <?php
			 }
		 }
	  }
	?>
</table>
</div>

</BODY>
</HTML>
