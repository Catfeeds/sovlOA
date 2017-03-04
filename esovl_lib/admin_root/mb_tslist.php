<?php include("../conn.php");?>
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>新闻信息列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />

</HEAD>
<BODY>
<?php
if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}
if (@$_GET["del"]=="ok"){
    $sql="delete from tsfencai where ts_id=".$_GET["id"];
	$rs=mysql_query($sql);
	if ($rs) echo"<script>alert('删除成功');location.href='mb_tslist.php';</script>";
	
}

$pagesize=20;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("SELECT * FROM tsfencai where s_name='".$_SESSION['mbsname']."'");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from tsfencai where s_name='".$_SESSION['mbsname']."' order by ts_date desc limit $page $pagesize ";     
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_rights_box_title_01" style="text-align:left;color:white;">新闻信息：添加，修改资讯相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="mb_newsadd.php">添加教师信息</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="mb_tslist.php" >查看教师信息</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form action="" method="post" name="formDel">
  <tr>
    <td width="71" height="25" class="mian_rights_box_title_01">ID</td>
	<td width="120" class="mian_rights_box_title_01">姓名</td>
	<td width="146" class="mian_rights_box_title_01">类别</td>
	<td width="146" class="mian_rights_box_title_01">专业</td>
	<td width="257" class="mian_rights_box_title_01">照片预览</td>
	<td width="79" class="mian_rights_box_title_01">推荐状态</td>
	<td width="161" class="mian_rights_box_title_01">更新时间</td>
	
	<td width="139" align="center" class="mian_rights_box_title_01">操作</td>
	</tr>
	<?php
	//开始循环
	if (mysql_num_rows($rs)>=1){
	$i=0;
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
     $i=$i+1;
	?>
  <tr>
    <td width="71" height="29" bgcolor="#FFFFFF" class="title"><?php echo $row["ts_id"];?></td>
	<td width="120" bgcolor="#FFFFFF" class="title"><a href="mb_tsedit.php?id=<?php echo $row["ts_id"];?>"><?php echo $row["ts_name"];?></a></td>
	<td width="146" bgcolor="#FFFFFF" class="title"><?php echo $row["ts_class"];?></td>
	<td width="146" bgcolor="#FFFFFF" class="title"><?php echo $row["ts_zy"];?></td>
	<td width="257" bgcolor="#FFFFFF" class="title"><?php echo $row["ts_pic"];?><span style="margin-left:20px; position:relative; cursor:hand;" onMouseOver="document.getElementById('show<?php echo $i;?>').style.display=''" onMouseOut="document.getElementById('show<?php echo $i;?>').style.display='none'">预览
	  <div id="show<?php echo $i;?>" style="width:50px;height:50px; display:none; position:absolute; top:-90px;left:50px;"><img src="<?php echo $row["ts_pic"];?>" width="100" height="100" /></div></span></td>
	<td width="79" align="center" bgcolor="#FFFFFF" class="title"><?php if ($row["ts_bool"]==1){echo"是";}else{echo"否";}?></td>
	<td width="161" bgcolor="#FFFFFF" class="title"><?php echo $row["ts_date"];?></td>
	
	<td width="139" align="center" bgcolor="#FFFFFF" class="title"><a href="mb_tsedit.php?id=<?php echo $row["ts_id"];?>">修改</a> <a href="mb_tslist.php?del=ok&id=<?php echo $row["ts_id"]?>" onClick="return confirm('是否将此信息删除?')">删除</a></td>
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
