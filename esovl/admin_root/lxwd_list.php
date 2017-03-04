<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>留学在线提问列表</TITLE>
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
    $sql="delete from lxwd where lxwd_id=".$_GET["id"];
	$rs=mysql_query($sql);
	if ($rs) echo"<script>alert('删除成功');location.href='lxwd_list.php';</script>";
	
}

$pagesize=20;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("SELECT * FROM lxwd");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from lxwd order by lxwd_bool asc ,lxwd_id desc limit $page $pagesize ";     
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误问题为:".mysql_error());
	  }
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">留学在线问答：添加，修改相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="lxwd_list.php" >查看留学在线问答</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form action="" method="post" name="formDel">
  <tr>
    <td width="88" height="25" class="mian_right_box_title_01">ID</td>
	<td width="331" class="mian_right_box_title_01">问题标题</td>
	<td width="265" class="mian_right_box_title_01">咨询学校</td>
	<td width="220" class="mian_right_box_title_01">联系电话</td>
	<td width="97" class="mian_right_box_title_01">提问人昵称</td>
	<td width="139" class="mian_right_box_title_01">提问时间</td>
	<td width="91" class="mian_right_box_title_01">回复状态</td>

	<td width="103" align="center" class="mian_right_box_title_01">操作</td>
	</tr>
	
	<?php
	//开始循环
	if (mysql_num_rows($rs)>=1){
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
   ?>
  <tr>
    <td width="88" height="29" bgcolor="#FFFFFF" class="title"><?php echo $row["lxwd_id"];?></td>
	<td width="331" bgcolor="#FFFFFF" class="title"><a href="lxwd_edit.php?id=<?php echo $row["lxwd_id"];?>"><?php echo $row["lxwd_question"];?></a></td>
	<td width="265" bgcolor="#FFFFFF" class="title"><?php echo $row["lxwd_xxmc"];?></td>
	<td width="220" bgcolor="#FFFFFF" class="title"><?php echo $row["lxwd_tel"];?></td>
	<td width="97" bgcolor="#FFFFFF" class="title"><?php echo $row["lxwd_name"];?></td>
	<td width="139" bgcolor="#FFFFFF" class="title"><?php echo $row["lxwd_date"];?></td>
	<td width="91" bgcolor="#FFFFFF" class="title">
	<?php if($row["lxwd_bool"]==1){
	  echo"<font color=red>已回复</font>";
	  }else{
	  echo"<font color=green>未回复</font>";
	  }?></td>
	<td width="103" align="center" bgcolor="#FFFFFF" class="title"><a href="lxwd_edit.php?id=<?php echo $row["lxwd_id"];?>">回复</a> <a href="lxwd_list.php?del=ok&id=<?php echo $row["lxwd_id"]?>" onClick="return confirm('是否将此问题删除?')">删除</a></td>
	</tr>
  <?php
   }
  }
   ?>
  </form>
     <tr>
    <td height="29" colspan="11" align="center" bgcolor="#FFFFFF" class="title">
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
