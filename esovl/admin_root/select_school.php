<?php include("../conn.php");?>
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>学校名称列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
</HEAD>

<script type="text/javascript" src="lgHttp.js"></script>
<BODY>
<?php
if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}  

if (@$_GET["select"]=="ok"){ 
$_SESSION['mbsid'] = $_GET["id"];//添加SESSION值为选择的学校ID
$_SESSION['mbsname'] = $_GET["sname"];   
     echo"<script>alert('选择成功');window.parent.frames[0].location.href='mb_menu.php';</script>";
  }
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">选择一个学校，为其创建模板网站      
    </div></th>
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

	<td width="124" align="center" bgcolor="#FFFFFF"><?php echo $row["s_id"]?></td>
	
	<td width="378" colspan="-2" bgcolor="#FFFFFF" class="title">
	  <input name="kcedit" value="editok" type="hidden">
	  <input name="s_id" value="<?php echo $row["s_id"]?>" type="hidden">
	  <input type="text" name="s_name" id="s_name" value="<?php echo $row["s_name"]?>" maxlength="40" style="width:300px;"/></td>
	<td width="631" style="color:#FFF;" bgcolor="#FFFFFF" onMouseOver="this.style.color='red';" onMouseOut="this.style.color='#fff';" class="title"><a href="select_school.php?select=ok&id=<?php echo $row["s_id"];?>&sname=<?php echo $row["s_name"];?>" onClick="return confirm('确定选择此学校吗?')">选择</a>　(<?php echo $row["s_name"]?>)</td>
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
