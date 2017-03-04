<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>常见问题列表</TITLE>
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
    $sql="delete from xl_ask where w_id=".$_GET["id"];
	$rs=mysql_query($sql);
	if ($rs) echo"<script>alert('删除成功');location.href='xl_ask_list.php';</script>";
	
}

$pagesize=20;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("SELECT * FROM xl_ask");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from xl_ask limit $page $pagesize ";     
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误问题为:".mysql_error());
	  }
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">常见问题：添加，修改资讯相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="xl_ask_add.php">添加常见问题</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="xl_ask_list.php" >查看常见问题</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form action="" method="post" name="formDel">
  <tr>
    <td width="127" height="25" class="mian_right_box_title_01">ID</td>
	<td width="435" class="mian_right_box_title_01">问题标题</td>
	<td width="139" align="center"class="mian_right_box_title_01">关注度</td>
	<td width="166" align="center" class="mian_right_box_title_01">操作</td>
	</tr>
	
	<?php
	//开始循环
	if (mysql_num_rows($rs)>=1){
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
   ?>
  <tr>
    <td width="127" height="29" bgcolor="#FFFFFF" class="title"><?php echo $row["w_id"];?></td>
	<td width="435" bgcolor="#FFFFFF" class="title"><a href="xl_ask_edit.php?id=<?php echo $row["w_id"];?>"><?php echo $row["w_title"];?></a></td>
	<td width="139" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["w_click"];?></td>
	<td width="166" align="center" bgcolor="#FFFFFF" class="title"><a href="xl_ask_edit.php?id=<?php echo $row["w_id"];?>">修改</a> <a href="xl_ask_list.php?del=ok&id=<?php echo $row["w_id"]?>" onClick="return confirm('是否将此问题删除?')">删除</a></td>
	</tr>
  <?php
   }
  }
   ?>
  </form>
     <tr>
    <td height="29" colspan="5" align="center" bgcolor="#FFFFFF" class="title">
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
