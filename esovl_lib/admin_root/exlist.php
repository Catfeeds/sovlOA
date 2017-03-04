<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>考试日历列表</TITLE>
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
    $sql="delete from excal where ex_id=".$_GET["id"];
	$rs=mysql_query($sql);
	if ($rs) echo"<script>alert('删除成功');location.href='exlist.php';</script>";
	
}

$pagesize=20;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("SELECT * from excal");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from excal order by ex_id desc limit $page $pagesize ";     
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">考试日历：添加，修改资讯相关的内容</div></th>
  </tr>
<tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="exadd.php">添加考试日历</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="exlist.php" >查看考试日历</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form action="" method="post" name="formDel">
  <tr>
    <td width="82" height="25" class="mian_right_box_title_01">ID</td>
	<td width="228" class="mian_right_box_title_01">标题目</td>
	<td width="209" class="mian_right_box_title_01">报名时间</td>
	<td width="291" class="mian_right_box_title_01">报名入口</td>
	<td width="137" class="mian_right_box_title_01">首页滚动显示</td>
	<td width="109" class="mian_right_box_title_01">考试入口</td>
	<td width="135" class="mian_right_box_title_01">考试时间</td>
	
	<td width="124" align="center" class="mian_right_box_title_01">操作</td>
	</tr>
	<?php
	//开始循环
	if (mysql_num_rows($rs)>=1){
	$i=0;
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
     $i=$i+1;
	?>
  <tr>
    <td width="82" height="29" bgcolor="#FFFFFF" class="title"><?php echo $row["ex_id"];?></td>
	<td width="228" bgcolor="#FFFFFF" class="title"><a href="exedit.php?id=<?php echo $row["ex_id"];?>"><?php echo $row["ex_title"];?></a></td>
	<td width="209" bgcolor="#FFFFFF" class="title"><?php echo $row["ex_bmtime"];?></td>
	<td width="291" bgcolor="#FFFFFF" class="title"><?php echo $row["ex_bmrk"];?></td>
	<td width="137" bgcolor="#FFFFFF" class="title"><?php if ($row["ex_bool"]==1){echo "是";}else{echo"否";}?></td>
	<td width="109" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["ex_ksrk"]?></td>
	<td width="135" bgcolor="#FFFFFF" class="title"><?php echo $row["ex_kstime"];?></td>
	
	<td width="124" align="center" bgcolor="#FFFFFF" class="title"><a href="exedit.php?id=<?php echo $row["ex_id"];?>">修改</a> <a href="exlist.php?del=ok&id=<?php echo $row["ex_id"]?>" onClick="return confirm('是否将此信息删除?')">删除</a></td>
	</tr>
  <?php
   }
  }
   ?>
  </form>
	
    <td height="29" colspan="10" align="center" bgcolor="#FFFFFF" class="title">
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
