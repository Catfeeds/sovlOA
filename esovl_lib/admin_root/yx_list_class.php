<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>培训大类列表</TITLE>
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
  
      $sql="delete from yx_class where class_id=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	
      echo"<script>alert('删除成功');location.href='yx_list_class.php';</script>";
	  }else{	  
	  exit("删除失败! 错误信息为:".mysql_error());
	  }
  }
if (isset($_POST["kcedit"])){//频道值是数值型
      $sql="update yx_class set class_title='".$_POST["class_title"]."',class_pindao='".$_POST["class_pindao"]."' where class_id=".$_POST["class_id"];
	// exit($sql);
	 $rs=mysql_query($sql,$conn);
	  if ($rs){
	 
      echo"<script>alert('更新成功');location.href='yx_list_class.php';</script>";	  
	  }else{
	  
	  exit("修改失败! 错误信息为:".mysql_error());
	  }
  }



?> 
<br>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">研修学校专业：添加，修改</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="yx_kaike_class.php">添加研修专业信息</a></td>
  </tr>
</table>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
  <tr>
    <td class="mian_right_box_title_01">类别ID：</td>
	<td class="mian_right_box_title_01">类别标题：</td>
	<td class="mian_right_box_title_01">所属频道</td>

<!--	<td class="mian_right_box_title_01">大类链接：</td>-->
	<td class="mian_right_box_title_01">操作</td>
  </tr>
	
	<?php
	  $sql="select * from yx_class";
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

	<td width="160" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["class_id"]?></td>
	
	<td width="265" bgcolor="#FFFFFF" class="title">
	  <input name="kcedit" value="editok" type="hidden">
	  <input name="class_id" value="<?php echo $row["class_id"]?>" type="hidden">
	 <?php echo $row["class_title"]?></td>
	<td width="173" align="center" bgcolor="#FFFFFF" class="title" >
<?php echo $row["class_pindao"]?>
</td>
<!--	<td width="153" bgcolor="#FFFFFF" class="title"><input type="text" name="pb_link" id="pb_link" value="< ?php echo $row["pb_link"]?>" maxlength="40" style="width:200px;"/></td>-->
    <td width="522" bgcolor="#FFFFFF" class="title" align="center">
  <a href="yx_list_update.php?id=<?php echo $row["class_id"];?>">更改</a>   &nbsp;<a href="yx_list_class.php?del=ok&id=<?php echo $row["class_id"];?>" onClick="return confirm('确定将此研修删除吗?')">删除</a>
    </td>
	  </tr>
  </form>
  <?php
	}
	}
	}
	?>
</table>
</div>
<br>
</div>
</BODY>
</HTML>