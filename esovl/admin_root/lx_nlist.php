<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>留学版新闻信息列表</TITLE>
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
    $sql="delete from lxnews where lx_nid=".$_GET["id"];
	$rs=mysql_query($sql);
	if ($rs) echo"<script>alert('删除成功');location.href=lx_nlist.php';</script>";
}

$pagesize=20;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];

$numq=mysql_query("SELECT * FROM lxnews");

$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
if(isset($_GET["ncl"])){
@$sql="select * from lxnews as a join lxgjclass as b on a.lx_gjcl=b.lx_gjid where lx_ncl='".$_GET["ncl"]."' limit $page $pagesize "; 
	}else{
@$sql="select * from lxnews as a join lxgjclass as b on a.lx_gjcl=b.lx_gjid order by a.lx_ncl asc,a.lx_gjcl desc limit $page $pagesize "; 
	}

	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" colspan="3" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">留学版新闻信息：添加，修改资讯相关的内容</div></th>
  </tr>
  <tr>
    <td width="54%" height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><font color="#0000FF">&nbsp;</font></td>
<td width="22%" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow">按类别显示：
	
             <select name="nclass" onChange="location.href='lx_nlist.php?ncl='+this.options[this.selectedIndex].value">
               <option value="" selected>--请选择--</option>			       
               <option value="0">各国资讯</option>	
               <option value="cgal">成功案例</option>	
               <option value="hggl">回国归来</option>	
               <option value="mjhw">漫镜海外</option>	
               <option value="ymhw">移民海外</option>	
               <option value="hwsh">海外生活</option>	
               <option value="msjz">面试讲座</option>	
             </select>	
</td>
    <td width="24%" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow">&nbsp;</td>
  </tr>
</table>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form action="" method="post" name="formDel">
  <tr>
    <td width="42" height="25" class="mian_right_box_title_01">ID</td>
    <td width="126" class="mian_right_box_title_01">国家分类</td>
	<td width="369" class="mian_right_box_title_01">信息标题</td>
	<td width="190" class="mian_right_box_title_01">图片</td>
	<td width="161" class="mian_right_box_title_01">信息类别</td>
	<td width="183" class="mian_right_box_title_01">更新时间</td>
	<td width="115" align="center"class="mian_right_box_title_01">人气</td>
	<td width="148" align="center" class="mian_right_box_title_01">操作</td>
	</tr>
	
	<?php
	//开始循环
	$k=1;
	if (mysql_num_rows($rs)>=1){
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){	    	  
	?>
  <tr>
    <td width="42" height="29" bgcolor="#FFFFFF" class="title"><?php echo $row["lx_nid"];?></td>
    <td width="126" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["lx_gjcl"];?></td>
	<td width="369" bgcolor="#FFFFFF" class="title"><a href="lx_nedit.php?id=<?php echo $row["lx_nid"];?>"><?php echo $row["lx_ntitle"];?></a></td>
	<td width="190" bgcolor="#FFFFFF" class="title">
	<?php 
	if($row['lx_npic']!=''){
	?>
    <input type="button" value="预览" onMouseOver="document.getElementById('<?=$k;?>').style.display=''" onMouseOut="document.getElementById('<?=$k;?>').style.display='none'"><div id="<?=$k;?>" style="position:absolute; display:none;"><img src="<?=$row["lx_npic"]?>"></div> 
    
    <?php
	$k++;
	}?>
    
    </td>
	<td width="161" align="center" bgcolor="#FFFFFF" class="title">
	<?php
	switch($row["lx_ncl"]){
		case"0";
		echo "各国新闻";
		break;
		case"cgal";
		echo "成功案例";
		break;
		case"hggl";
		echo "回国归来";
		break;
		case"mjhw";
		echo "漫境海外";
		break;
		case"ymhw";
		echo "移民海外";
		break;
		case"hwsh";
		echo "海外生活";
		break;
		case"msjz";
		echo "面试讲座";
		break;
		}
	
	?></td>
	<td width="183" bgcolor="#FFFFFF" class="title"><?=$row["lx_ndate"]?></td>
	<td width="115" align="center" bgcolor="#FFFFFF" class="title"><?=$row["lx_nclick"]?></td>
	<td width="148" align="center" bgcolor="#FFFFFF" class="title"><a href="lx_nedit.php?id=<?php echo $row["lx_nid"];?>">修改</a> <a href="lx_nlist.php?del=ok&id=<?php echo $row["lx_nid"]?>" onClick="return confirm('是否将此信息删除?')">删除</a></td>
	</tr>
  <?php }}?>
  </form>
     <tr>
    <td height="29" colspan="8" align="center" bgcolor="#FFFFFF" class="title">
      <?php
echo "共 $num 条";
if($num > $pagesize){
 if(@$pageval<=1)$pageval=1;

if(isset($_GET["nclass"])){
	if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <a href=$url?nclass=".$_GET["nclass"]."&page=".($pageval-1).">上一页</a>";
}
    for ($i=1;$i<=$cp;$i++){
		if ($i==@$_GET["page"]){
	   echo $i;
			}else{
	   echo "<a href=$url?nclass=".$_GET["nclass"]."&page=".$i.">[".$i."]</a>";
		}
	}
if(@$_GET["page"]<$cp){
echo " <a href=$url?nclass=".$_GET["nclass"]."&page=".($pageval+1).">下一页</a>";
}
	}else{
  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <a href=$url?page=".($pageval-1).">上一页</a>";
}
    for ($i=1;$i<=$cp;$i++){
		if ($i==@$_GET["page"]){
	   echo $i;
			}else{
	   echo "<a href=$url?page=".$i.">[".$i."]</a>";
		}
	}
if(@$_GET["page"]<$cp){
echo " <a href=$url?page=".($pageval+1).">下一页</a>";
}
}

 echo " ".@$_GET[page]."/".$cp."页";
} 
	 ?></td>
	</tr>
</table>
</BODY>
</HTML>
