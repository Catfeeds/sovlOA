<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>广告信息列表</TITLE>
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
    $sql="delete from guanggao where g_id=".$_GET["id"];
	$rs=mysql_query($sql);
	if ($rs) echo"<script>alert('删除成功');location.href='GuangGaoList.php';</script>";
	
}

$pagesize=20;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("SELECT * FROM guanggao");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from guanggao order by g_date desc limit $page $pagesize ";     
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">广告信息：添加，修改介绍企业相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="z_guanggao.php">添加广告信息</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="GuangGaoList.php" >查看广告信息</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<table width="95%" height="69" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form action="DelContent.asp?Result=About" method="post" name="formDel">
  <tr>
    <td width="43" height="27" class="mian_right_box_title_01">ID</td>
	<td width="316" class="mian_right_box_title_01">信息标题</td>
	<td width="268" class="mian_right_box_title_01">网址</td>
	<td width="290" class="mian_right_box_title_01">广告图</td>
	<td width="170" class="mian_right_box_title_01">更新时间</td>
	<td width="78" align="center"class="mian_right_box_title_01">浏览量</td>
	<td width="153" align="center" class="mian_right_box_title_01">操作</td>
	</tr>
	
	<?php
	//开始循环
	if (mysql_num_rows($rs)>=1){
	$i=0;
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
     $i=$i+1;
	?>
  <tr>
    <td width="43" height="29" bgcolor="#FFFFFF" class="title"><?php echo $row["g_id"];?></td>
	<td width="316" bgcolor="#FFFFFF" class="title"><a href="z_infoedit.php?id=<?php echo $row["g_id"];?>"><?php echo $row["g_name"];?></a></td>
	<td width="268" bgcolor="#FFFFFF" class="title"><a href="z_infoedit.php?id=<?php echo $row["g_id"];?>"><?php echo $row["g_website"];?></a></td>
	<td width="290" bgcolor="#FFFFFF" class="title"><?php echo $row["g_pic"];?><span style="margin-left:20px; position:relative; cursor:hand;" onMouseOver="document.getElementById('show<?php echo $i;?>').style.display=''" onMouseOut="document.getElementById('show<?php echo $i;?>').style.display='none'">预览
	  <div id="show<?php echo $i;?>" style="width:50px;height:50px; display:none; position:absolute; top:-90px;left:50px;"><img src="<?php echo $row["g_pic"];?>" width="100" height="100" /></div></span></td>
	<td width="170" bgcolor="#FFFFFF" class="title"><?php echo $row["g_date"];?></td>
	<td width="78" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["g_click"];?></td>
	<td width="153" align="center" bgcolor="#FFFFFF" class="title"><a href="GuangGaoEdit.php?id=<?php echo $row["g_id"];?>">修改</a>   <a href="GuangGaoList.php?del=ok&id=<?php echo $row["g_id"]?>" onClick="return confirm('是否将此信息删除?')">删除</a></td>
	</tr>
	
	
  <?php
   }
  }
   ?>
  </form>
   <tr>
    <td height="29" colspan="7" align="center" bgcolor="#FFFFFF" class="title">
      <?php
echo "共 $num 条";
if($num > $pagesize){
 if(@$pageval<=1)$pageval=1;


  if(@$_GET[page]!=""&&@$_GET[page]>1){
echo" <a href=$url?page=".($pageval-1).">上一页</a>";
}
if(@$_GET[page]<$cp){
echo " <a href=$url?page=".($pageval+1).">下一页</a>";
}
 
} 
	 ?>
   </td>
	</tr>
</table>
</BODY>
</HTML>
