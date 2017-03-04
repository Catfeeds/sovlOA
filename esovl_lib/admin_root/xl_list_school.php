<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>学校名称列表</TITLE>
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
	  
	  $rs0=mysql_query("select s_name from school where s_id=".$_GET["id"],$conn);
	  $row0=mysql_fetch_array($rs0,MYSQL_ASSOC);//查询出删除学校的名称
	  
	  $sq3="delete from mb_step where s_name='".$row0["s_name"]."'";
	  mysql_query($sq3,$conn);//同步删除模板学校信息
	  
	  $sq4="delete from kkinfo where s_id=".$_GET["id"];
	  mysql_query($sq4,$conn);//同步删除KKINFO中开班的信息
	  
	  $sq5="delete from luqu where s_id=".$_GET["id"];
	  mysql_query($sq5,$conn);//同步删除LUQU中学生录取的信息
	  
	  $sql="delete from school where s_id=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);  
	  
	  if ($rs){	
      echo"<script>alert('删除成功');location.href='xl_list_school.php';</script>";
	  }else{	  
	  exit("删除失败! 错误信息为:".mysql_error());
	  }
  }
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">学校名称：添加，修改</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="xl_school.php" >添加学校信息</a><font color="#0000FF">  |  </font><a href="xl_list_school.php" >查看学校类别列表</a></td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
  <tr>
    <td class="mian_right_box_title_01">名称ID：</td>
	<td class="mian_right_box_title_01">名称标题：</td>
	<td class="mian_right_box_title_01">操作</td>
  </tr>
	
	<?php
	  $sql="select * from school";
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

	<td width="124" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["s_id"]?></td>
	
	<td width="477" colspan="-2" bgcolor="#FFFFFF" class="title">
	  <input name="kcedit" value="editok" type="hidden">
	  <input name="s_id" value="<?php echo $row["s_id"]?>" type="hidden">
	  <input type="text" name="s_name" value="<?php echo $row["s_name"]?>" readonly maxlength="40" style="width:300px;"/></td>
	<td width="527" bgcolor="#FFFFFF" class="title"><a href="xl_edit_school.php?id=<?php echo $row["s_id"];?>">编辑信息</a> 　<a href="xl_list_school.php?del=ok&id=<?php echo $row["s_id"];?>" onClick="return confirm('确定将此学校删除吗?')">删除</a> </td>
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
