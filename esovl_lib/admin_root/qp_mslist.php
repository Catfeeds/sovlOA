<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>学历版新闻信息列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />

</HEAD>
<?php include("../conn.php");?>
<BODY>
<?php
if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}
if (@$_GET["del"]=="ok"){
    $sql="delete from qp_teacher where teacher_id=".$_GET["id"];
	$rs=mysql_query($sql);
	if ($rs) echo"<script>alert('删除成功');location.href='qp_mslist.php';</script>";
	
}
$pagesize=10;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("SELECT * FROM qp_teacher");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数
if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
@$sql="select * from qp_teacher order by teacher_id desc limit $page $pagesize "; 
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
?>
<br>

<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form action="" method="post" name="formDel">
  <tr>
    <td width="35" height="25" class="mian_right_box_title_01">ID</td>
    <td width="86" class="mian_right_box_title_01">教师姓名</td>
	<td width="422" class="mian_right_box_title_01">相关专业</td>
	<td width="50" class="mian_right_box_title_01">图片</td>
	<td width="120" align="center" class="mian_right_box_title_01">操作</td>
	</tr>
	
	<?php
	//开始循环
	$k=1;
	if (mysql_num_rows($rs)>=1){
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
		  
	?>
  <tr>
    <td width="35" height="29" bgcolor="#FFFFFF" class="title"><?php echo $row["teacher_id"];?></td>
    <td width="86" bgcolor="#FFFFFF" class="title"><?php echo $row["teacher_name"];?></td>
	<td width="422" bgcolor="#FFFFFF" class="title"><?php echo $row["teacher_zhuanye"];?></td>
	<td width="50" bgcolor="#FFFFFF" class="title">
	<?php 
	if($row['npic']!=''){
		?>
    <input type="button" value="预览" onMouseOver="document.getElementById('<?=$k;?>').style.display=''" onMouseOut="document.getElementById('<?=$k;?>').style.display='none'"><div id="<?=$k;?>" style="position:absolute; display:none;"><img src="<?=$row["npic"]?>" width="146"></div> 
    
    <?php
	$k++;
	}?>
    
    </td>
	
	<td width="120" align="center" bgcolor="#FFFFFF" class="title"><a href="qp_msedit.php?id=<?php echo $row["teacher_id"];?>">修改</a> <a href="qp_mslist.php?del=ok&id=<?php echo $row["teacher_id"]?>" onClick="return confirm('是否将此信息删除?')">删除</a></td>
	</tr>
  <?php
   }
  }
   ?>
  </form>
     <tr>
    <td height="29" colspan="8" align="center" bgcolor="#FFFFFF" class="title">
<?php
echo "共 $num 条";
if($num > $pagesize){
 if(@$pageval<=1)$pageval=1;


  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <a href=$url?page=".($pageval-1).">上一页</a>";
}
for ($i=1;$i<=$cp;$i++){
echo " <a href=$url?page=".$i.">[".$i."]</a> ";
}
if(@$_GET["page"]<$cp){
echo " <a href=$url?page=".($pageval+1).">下一页</a>";
}
 echo " ".@$_GET[page]."/".$cp."页";
} 
?></td>
	</tr>
</table>
</BODY>
</HTML>
