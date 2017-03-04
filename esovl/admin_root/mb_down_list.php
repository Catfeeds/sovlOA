<?php include("../conn.php");?>
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>下载资料列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />

</HEAD>
<BODY>
<?php
if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}
if (@$_GET["del"]=="ok"){
    $sql="delete from mb_download where w_id=".$_GET["id"];
	$rs=mysql_query($sql);
	if ($rs) echo"<script>alert('删除成功');location.href='mb_down_list.php';</script>";
	
}

$pagesize=20;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("SELECT * FROM mb_download where s_name='".$_SESSION['mbsname']."'");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from mb_download where s_name='".$_SESSION['mbsname']."' limit $page $pagesize ";     
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误问题为:".mysql_error());
	  }
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">下载资料：添加，修改资讯相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="mb_down_add.php">添加下载资料</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="mb_down_list.php" >查看下载资料</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form action="" method="post" name="formDel">
  <tr>
    <td width="82" height="25" class="mian_right_box_title_01">ID</td>
	<td width="295" class="mian_right_box_title_01">资料类别</td>
	<td width="411" class="mian_right_box_title_01">资料标题</td>
	<td width="277" align="center"class="mian_right_box_title_01">资料类型</td>
	<td width="259" align="center" class="mian_right_box_title_01">操作</td>
	</tr>
	
	<?php
	//开始循环
	if (mysql_num_rows($rs)>=1){
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
   ?>
  <tr>
    <td width="82" height="29" bgcolor="#FFFFFF" class="title"><?php echo $row["w_id"];?></td>
	<td width="295" height="29" bgcolor="#FFFFFF" class="title"><?php echo $row["w_dclass"];?></td>
	<td width="411" bgcolor="#FFFFFF" class="title"><?php echo $row["w_title"];?></td>
	<td width="277" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["w_con"];?></td>
	<td width="259" align="center" bgcolor="#FFFFFF" class="title"><a href="mb_download_edit.php?id=<?php echo $row["w_id"];?>">修改</a> <a href="mb_down_list.php?del=ok&id=<?php echo $row["w_id"]?>" onClick="return confirm('是否将此问题删除?')">删除</a></td>
	</tr>
  <?php
   }
  }
   ?>
  </form>
     <tr>
    <td height="29" colspan="6" align="center" bgcolor="#FFFFFF" class="title">
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
