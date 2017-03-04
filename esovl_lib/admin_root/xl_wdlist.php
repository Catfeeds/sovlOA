<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>学历在线提问列表</TITLE>
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
    $sql="delete from wdonline where wd_id=".$_GET["id"];
	$rs=mysql_query($sql);
	if ($rs) echo"<script>alert('删除成功');location.href='xl_wdlist.php';</script>";
	
}

$pagesize=20;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("SELECT * FROM wdonline");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from wdonline order by wd_bool asc ,wd_id desc limit $page $pagesize ";     
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误问题为:".mysql_error());
	  }
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">在线问答：添加，修改相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="xl_wdlist.php" >查看在线问答</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form action="" method="post" name="formDel">
  <tr>
    <td width="107" height="25" class="mian_right_box_title_01">ID</td>
	<td width="162" class="mian_right_box_title_01">报名意向学院</td>
	<td width="522" class="mian_right_box_title_01">问题标题</td>
	<td width="119" class="mian_right_box_title_01">提问人昵称</td>
	<td width="174" class="mian_right_box_title_01">提问时间</td>
	<td width="112" class="mian_right_box_title_01">回复状态</td>

	<td width="122" align="center" class="mian_right_box_title_01">操作</td>
	</tr>
	
	<?php
	//开始循环
	if (mysql_num_rows($rs)>=1){
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
   ?>
  <tr>
    <td width="107" height="29" bgcolor="#FFFFFF" class="title"><?php echo $row["wd_id"];?></td>
	<td width="162" bgcolor="#FFFFFF" class="title"><a href="xl_wdedit.php?id=<?php echo $row["wd_id"];?>"><?php echo $row["s_name"];?></a></td>
	<td width="522" bgcolor="#FFFFFF" class="title"><a href="xl_wdedit.php?id=<?php echo $row["wd_id"];?>"><?php echo $row["wd_ask"];?></a></td>
	<td width="119" bgcolor="#FFFFFF" class="title"><?php echo $row["wd_nc"];?></td>
	<td width="174" bgcolor="#FFFFFF" class="title"><?php echo $row["wd_stime"];?></td>
	<td width="112" bgcolor="#FFFFFF" class="title">
	<?php if($row["wd_bool"]==1){
	  echo"<font color=red>已回复</font>";
	  }else{
	  echo"<font color=green>未回复</font>";
	  }?></td>
	<td width="122" align="center" bgcolor="#FFFFFF" class="title"><a href="xl_wdedit.php?id=<?php echo $row["wd_id"];?>">回复</a> <a href="xl_wdlist.php?del=ok&id=<?php echo $row["wd_id"]?>" onClick="return confirm('是否将此问题删除?')">删除</a></td>
	</tr>
  <?php
   }
  }
   ?>
  </form>
     <tr>
    <td height="29" colspan="9" align="center" bgcolor="#FFFFFF" class="title">
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
