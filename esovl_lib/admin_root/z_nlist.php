<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<meta http-equiv="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>新闻信息列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />

</HEAD>
<?php 
	include_once("../conn.php");
	include_once("../web_start.php");
?>
<BODY>
<?php
	if (@$_COOKIE["a_class"]>1) {
	  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
	  exit();
	}
	if (@$_GET["del"]=="ok"){
		$del = $dblink->delete("nnews","nid = {$_GET['id']}");
		if ($del){	 
			//echo "成功";
			echo"<script>alert('删除成功');location.href='z_nlist.php';</script>";	  
		}else{	  
			exit("删除失败!");
		}
	}
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">新闻信息：添加，修改资讯相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="z_nadd.php">添加新闻信息</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="z_nlist.php" >查看新闻信息</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
	<form action="" method="post" name="formDel">
		<tr>
			<td width="127" height="25" class="mian_right_box_title_01">ID</td>
			<td width="325" class="mian_right_box_title_01">信息标题</td>
			<td width="268" class="mian_right_box_title_01">新闻小图</td>
			<td width="176" class="mian_right_box_title_01">信息类别</td>
			<td width="180" class="mian_right_box_title_01">更新时间</td>
			<td width="86" align="center"class="mian_right_box_title_01">人气</td>
			<td width="175" align="center" class="mian_right_box_title_01">操作</td>
		</tr>
		<?php
			$criteria=new CDbCriteria;
			$count=$dblink->count("nnews",$criteria);
			$page= isset($_GET['page'])?$_GET['page']:1;//默认页码
			$getpageinfo = page($page,$count,$_SERVER['REQUEST_URI'],15);//调用函数，生成分页HTML 和 SQL LIMIT 子句
			$criteria->limit=$getpageinfo['sqllimit'];
			$newsModel=$dblink->selectAll("nnews",$criteria);
			foreach($newsModel as $row){
				$rs1 = $dblink->findAll("nclass",array(),"n_id = {$row['nclass']}");
				foreach($rs1 as $rw){
		?>
		<tr>
			<td width="127" height="29" bgcolor="#FFFFFF" class="title"><?php echo $row["nid"];?></td>
			<td width="325" bgcolor="#FFFFFF" class="title"><a href="z_nedit.php?id=<?php echo $row["nid"];?>"><?php echo $row["ntitle"];?></a></td>
			<td width="268" bgcolor="#FFFFFF" class="title"><?=$row["npic"]?></td>
			<td width="176" bgcolor="#FFFFFF" class="title"><?php echo $rw["n_class"];?></td>
			<td width="180" bgcolor="#FFFFFF" class="title"><?php echo $row["ndate"];?></td>
			<td width="86" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["nclick"];?></td>
			<td width="175" align="center" bgcolor="#FFFFFF" class="title"><a href="z_nedit.php?id=<?php echo $row["nid"];?>">修改</a> <a href="z_nlist.php?del=ok&id=<?php echo $row["nid"]?>" onClick="return confirm('是否将此信息删除?')">删除</a></td>
		</tr>
	<?php }}?>
	</form>
		<tr>
			<td height="29" colspan="7" width="100%" bgcolor="#FFFFFF" class="title">
				<?php if($count>15){?>
				<div class="fy">
					<ul>
						<li>共有 <?php echo $getpageinfo['pagetotal']?> 条记录，当前第 <?php echo $getpageinfo['curpage']?> 页</li>
						<?php echo $getpageinfo['pagecode']?>
					</ul>
				</div>
				<?php }?>
			</td>
		</tr>
</table>
</BODY>
</HTML>
