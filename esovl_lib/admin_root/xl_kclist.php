<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>开课信息列表</TITLE>
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
    $sql="delete from kkinfo where kid=".$_GET["id"];
	$rs=mysql_query($sql);
	if ($rs) echo"<script>alert('删除成功');location.href='xl_kclist.php';</script>";
	
}

$pagesize=20;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("SELECT * FROM kkinfo");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from kkinfo order by bk_id asc,kkdate desc limit $page $pagesize ";     
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">开课信息：添加，修改资讯相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="xl_kcadd.php">添加开课信息</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="xl_kclist.php" >查看开课信息</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form action="" method="post" name="formDel">
  <tr>
    <td width="27" height="25" class="mian_right_box_title_01">ID</td>
	<td width="145" class="mian_right_box_title_01">招生学校</td>
	<td width="100" class="mian_right_box_title_01">简章大类</td>
	<td width="98" class="mian_right_box_title_01">专业类别</td>
	<td width="95" class="mian_right_box_title_01">专业名称</td>
	<td width="224" class="mian_right_box_title_01">开班名称</td>
	<td width="78" class="mian_right_box_title_01">学费</td>
	<td width="80" class="mian_right_box_title_01">上课类型</td>
	<td width="117" class="mian_right_box_title_01">开班日期</td>
	<td width="85" class="mian_right_box_title_01">学历类型</td>
	<td width="54" class="mian_right_box_title_01">学分</td>
	<td width="105" class="mian_right_box_title_01">添加日期</td>
	<td width="92" align="center" class="mian_right_box_title_01">操作</td>
	</tr>
	
	<?php
	//开始循环
	if (mysql_num_rows($rs)>=1){
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
	     $rs1=mysql_query("select s_name from school where s_id=".$row["s_id"],$conn); 
		  $rw=mysql_fetch_assoc($rs1);
		   $rs5=mysql_query("select bk_title from xlbk where bk_id=".$row["bk_id"],$conn); 
		  $rw5=mysql_fetch_assoc($rs5);
		  
	?>
  <tr>
    <td width="27" height="29" bgcolor="#FFFFFF" class="title"><?php echo $row["kid"];?></td>
	<td width="145" bgcolor="#FFFFFF" class="title"><?php echo $rw["s_name"];?></td>
	<td width="100" bgcolor="#FFFFFF" class="title"><?php echo $rw5["bk_title"];?></td>
	<td width="98" bgcolor="#FFFFFF" class="title"><?php echo $row["zyclass"];?></td>
	<td width="95" bgcolor="#FFFFFF" class="title"><?php echo $row["zyname"];?></td>
	<td width="224" bgcolor="#FFFFFF" class="title"><?php echo $row["ktitle"];?></td>
	<td width="78" bgcolor="#FFFFFF" class="title"><?php echo $row["xfei"];?></td>
	<td width="80" bgcolor="#FFFFFF" class="title"><?php echo $row["kcal"];?></td>
	<td width="117" bgcolor="#FFFFFF" class="title"><?php echo $row["kdate"];?></td>
	<td width="85" bgcolor="#FFFFFF" class="title"><?php echo $row["xlcal"];?></td>
	<td width="54" bgcolor="#FFFFFF" class="title"><?php echo $row["xfen"];?></td>
	<td bgcolor="#FFFFFF" class="title"><?php echo $row["kkdate"];?></td>
	<td width="92" align="center" bgcolor="#FFFFFF" class="title"><a href="xl_kcedit.php?id=<?php echo $row["kid"];?>">修改</a> <a href="xl_kclist.php?del=ok&id=<?php echo $row["kid"]?>" onClick="return confirm('是否将此信息删除?')">删除</a></td>
	</tr>
  <?php
   }
  }
   ?>
  </form>
     <tr>
    <td height="29" colspan="13" align="center" bgcolor="#FFFFFF" class="title">
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
