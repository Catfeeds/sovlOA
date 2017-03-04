<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>列表</TITLE>
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
    $sql="delete from yx_user where user_id=".$_GET["id"];
	$rs=mysql_query($sql);
	if ($rs) echo"<script>alert('删除成功');location.href='yx_bm_list.php';</script>";
	
}

$pagesize=15;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("SELECT * FROM yx_user");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from yx_user order by user_bool asc,user_id desc limit $page $pagesize ";
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">研修网上报名：添加，修改研修相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><font color="#0000FF">&nbsp;</font><a href="yx_bm_list.php" >查看研修报名列表</a></td>
  </tr>
</table>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
  <form action="" method="post" name="formDel">
    <tr>
      <td width="32" height="25" class="mian_right_box_title_01">ID</td>
      <td width="87" class="mian_right_box_title_01">姓名</td>
      <td width="171" class="mian_right_box_title_01">学校名称</td>
      <td width="93" class="mian_right_box_title_01">课程类别</td>

      <td width="109" class="mian_right_box_title_01">联系电话</td>
      <td width="149" class="mian_right_box_title_01">电子邮箱</td>
      <td width="174" class="mian_right_box_title_01">报名时间</td>
      <td width="77" class="mian_right_box_title_01">处理状态</td>
      <td width="131" align="center" class="mian_right_box_title_01">操作</td>
    </tr>
    <?php
	//开始循环
	if (mysql_num_rows($rs)>=1){
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
	?>
    <tr>
      <td width="32" height="29" bgcolor="#FFFFFF" class="title"><?php echo $row["user_id"];?></td>
      <td width="87" bgcolor="#FFFFFF" class="title"><a href="qp_bmedit.php?id=<?php echo $row["user_id"];?>"><?php echo $row["user_name"];?></a></td>
      <td width="171" bgcolor="#FFFFFF" class="title"><?php echo $row["user_school"];?></td>
      <td width="93" bgcolor="#FFFFFF" class="title"><?php echo $row["user_kec"];?></td>
      <td width="109" bgcolor="#FFFFFF" class="title"><?php echo $row["user_tel"];?></td>
      <td width="149" bgcolor="#FFFFFF" class="title"><?php echo $row["user_mail"];?></td>
      <td width="174" bgcolor="#FFFFFF" class="title"><?php echo $row["user_date"];?></td>
      <td width="77" bgcolor="#FFFFFF" class="title">
	  <?php if($row["user_bool"]==1){
	  echo"<font color=green>已处理</font>";
	  }else{
	  echo"<font color=r>未处理</font>";
	  }?></td>
      <td width="131" align="center" bgcolor="#FFFFFF" class="title"><a href="yx_bm_list2.php?id=<?php echo $row["user_id"];?>">详情</a> <a href="yx_bm_list.php?del=ok&id=<?php echo $row["user_id"]?>" onClick="return confirm('是否将此信息删除?')">删除</a></td>
    </tr>
    <?php
   }
  }
   ?>
  </form>
  <tr>
    <td height="29" colspan="12" align="center" bgcolor="#FFFFFF" class="title"><?php
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
