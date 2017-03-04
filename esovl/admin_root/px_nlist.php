<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>培训版新闻信息列表</TITLE>
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
    $sql="delete from ennews where nid=".$_GET["id"];
	$rs=mysql_query($sql);
	if ($rs) echo"<script>alert('删除成功');location.href='exl_nlist.php?id=".$_GET['mid']."';</script>";
	
}
$mid=$_GET['id'];
if ($mid==""){
	exit;
}
$pagesize=20;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
if(isset($_GET["nclass"])){
$numq=mysql_query("SELECT * FROM ennews where ntype='$mid' and nclass=".$_GET["nclass"]);
	}else{
$numq=mysql_query("SELECT * FROM ennews where ntype='$mid'");
}
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}

if(isset($_GET["nclass"])){
@$sql="select * from ennews where ntype='$mid' and nclass=".$_GET["nclass"]." order by nclass , ndate desc limit $page $pagesize ";
}else{
@$sql="select * from ennews where ntype='$mid' order by nclass , ndate desc limit $page $pagesize "; 
	}
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" colspan="3" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">培训版新闻信息：添加，修改资讯相关的内容</div></th>
  </tr>
  <tr>
    <td width="54%" height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><font color="#0000FF">&nbsp;</font></td>
<td width="22%" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow">按类别显示：
	
             <select name="nclass" onChange="location.href='exl_nlist.php?id=<?=$mid?>&nclass='+this.options[this.selectedIndex].value">
             <option value="0" selected>--请选择--</option>
			 <?php
	        $sqll="select * from enclass where n_type='$mid' order by n_id asc";
	        $rss=mysql_query($sqll,$conn); 
	        if(mysql_num_rows($rss)>=1){				
		    while ($rowa=mysql_fetch_array($rss,MYSQL_ASSOC)){ ?>            
               <option value="<?php echo $rowa["n_id"]?>"><?php echo $rowa["n_class"]?></option>
			<?php }}?>
             </select>	
</td>
    <td width="24%" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow">&nbsp;</td>
  </tr>
</table>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form action="" method="post" name="formDel">
  <tr>
    <td width="37" height="25" class="mian_right_box_title_01">ID</td>
    <td width="59" class="mian_right_box_title_01">classid</td>
	<td width="499" class="mian_right_box_title_01">信息标题</td>
	<td width="51" class="mian_right_box_title_01">图片</td>
	<td width="143" class="mian_right_box_title_01">信息类别</td>
	<td width="163" class="mian_right_box_title_01">更新时间</td>
	<td width="102" align="center"class="mian_right_box_title_01">人气</td>
	<td width="128" align="center" class="mian_right_box_title_01">操作</td>
	</tr>
	
	<?php
	//开始循环
	$k=1;
	if (mysql_num_rows($rs)>=1){
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
	     $rs1=mysql_query("select n_class from enclass where n_id=".$row["nclass"],$conn); 
		  $rw=mysql_fetch_array($rs1,MYSQL_ASSOC);
		  
	?>
  <tr>
    <td width="37" height="29" bgcolor="#FFFFFF" class="title"><?php echo $row["nid"];?></td>
    <td width="59" bgcolor="#FFFFFF" class="title"><?php echo $row["nclass"];?></td>
	<td width="499" bgcolor="#FFFFFF" class="title"><a href="px_nedit.php?id=<?php echo $row["nid"];?>&mid=<?=$mid?>"><?php echo $row["ntitle"];?></a></td>
	<td width="51" bgcolor="#FFFFFF" class="title">
	<?php 
	if($row['npic']!=''){
		?>
    <input type="button" value="预览" onMouseOver="document.getElementById('<?=$k;?>').style.display=''" onMouseOut="document.getElementById('<?=$k;?>').style.display='none'"><div id="<?=$k;?>" style="position:absolute; display:none;"><img src="<?=$row["npic"]?>"></div> 
    
    <?php
	$k++;
	}?>
    
    </td>
	<td width="143" bgcolor="#FFFFFF" class="title"><?php echo $rw["n_class"];?></td>
	<td width="163" bgcolor="#FFFFFF" class="title"><?php echo $row["ndate"];?></td>
	<td width="102" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["nclick"];?></td>
	<td width="128" align="center" bgcolor="#FFFFFF" class="title"><a href="px_nedit.php?id=<?php echo $row["nid"];?>&mid=<?php echo $mid;?>">修改</a> <a href="exl_nlist.php?del=ok&mid=<?php echo $mid;?>&id=<?php echo $row["nid"]?>" onClick="return confirm('是否将此信息删除?')">删除</a></td>
	</tr>
  <?php
   }
  }
   ?>
  </form>
     <tr>
    <td height="29" colspan="8" align="center" bgcolor="#FFFFFF" class="title">
      <?php
echo "共 $num 条";
if($num > $pagesize){
 if(@$pageval<=1)$pageval=1;

if(isset($_GET["nclass"])){
	if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <a href=$url?nclass=".$_GET["nclass"]."&page=".($pageval-1)."&id=".$mid.">上一页</a>";
}
    for ($i=1;$i<=$cp;$i++){
		if ($i==@$_GET["page"]){
	   echo $i;
			}else{
	   echo "<a href=$url?nclass=".$_GET["nclass"]."&page=".$i."&id=".$mid.">[".$i."]</a>";
		}
	}
if(@$_GET["page"]<$cp){
echo " <a href=$url?nclass=".$_GET["nclass"]."&page=".($pageval+1)."&id=".$mid.">下一页</a>";
}
	}else{
  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <a href=$url?page=".($pageval-1)."&id=".$mid.">上一页</a>";
}
    for ($i=1;$i<=$cp;$i++){
		if ($i==@$_GET["page"]){
	   echo $i;
			}else{
	   echo "<a href=$url?page=".$i."&id=".$mid.">[".$i."]</a>";
		}
	}
if(@$_GET["page"]<$cp){
echo " <a href=$url?page=".($pageval+1)."&id=".$mid.">下一页</a>";
}
}

 echo " ".@$_GET[page]."/".$cp."页";
} 
	 ?></td>
	</tr>
</table>
</BODY>
</HTML>
