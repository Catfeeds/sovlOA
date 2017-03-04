<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" CONTENT="text/html; charset=utf-8" />
<title>文章分类列表</title>
<link href="images/root.css" rel="stylesheet" type="text/css" />
</head>
<?php 
	include_once("../conn.php");
	include_once("../web_start.php");
?>
<script type="text/javascript" src="lgHttp.js"></script>
<body>
<?php
	if (@$_COOKIE["a_class"]>1) {
		echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
		exit();
	}
	if (isset($_GET["del"])&&$_GET["del"]=="okk"){
		$del = $dblink->delete("nnews","nclass = {$_GET['id']}");//先删除新闻表中相关类目的所有信息
		$rs = $dblink->delete("nclass","n_id = {$_GET['id']}");
		if ($rs){	 
			echo"<script>alert('删除成功');location.href='z_nclass.php';</script>";	  
		}else{	  
			exit("删除失败!");
		}
	}
	
	// if(@$_GET['action']=="del"){
		// $sql="delete from classinfo where c_id=".$_GET["id"];
		// $rs=$db->exec($sql);	
		// if ($rs) {echo"<script>alert('删除成功');location.href='bdClassList.php';</script>";}else{exit("删除出错!");}
	// }
	
	if (isset($_POST["nedit"])){
		$post = $_POST;
		unset($post['nedit']);unset($post['Submit']);
		$num = $dblink->update("nclass",$post,"n_id = '{$post['n_id']}'");
		//print_r($post);exit;
		if($num==0||$num==1){
			echo "<script>alert('信息已更新');location.href='z_nclass.php'</script>";exit;
		}else{
			echo "更新出错，请检查！";
		}
	}
?> 
<br/>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
	<tr>
		<th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">文章分类：添加，修改</div></th>
	</tr>
	<tr>
		<td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="z_nadd.php">添加首页新闻</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="z_nlist.php" >查看文章列表</a><font color="#0000FF">&nbsp;</font></td>
	</tr>
</table>
<br/>
<div class="s_info">
	<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
		<tr>
			<td colspan="5" class="mian_right_box_title_01">【文章分类列表】</td>
		</tr>
		<?php
			$sql = $dblink->findAll("nclass",array(),"","","","n_id asc");
			$i=0;
			foreach($sql as $row){
			$i=$i+1;
		?>
		<form name="cform<?php echo $i?>" method="post" onSubmit="return nclass()" action="">
		<tr>
			<td width="205" height="33" align="right" bgcolor="#FFFFFF" class="title">分类ID：</td>
			<td width="102" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["n_id"]?></td>
			<td width="103" align="right" bgcolor="#FFFFFF" class="title">分类标题：</td>
			<td width="486" colspan="-2" bgcolor="#FFFFFF" class="title">
				<input name="nedit" value="editok" type="hidden">
				<input name="n_id" value="<?php echo $row["n_id"]?>" type="hidden">
				<input type="text" name="n_class" id="n_class" value="<?php echo $row["n_class"]?>" maxlength="40" style="width:300px;"/></td>
			<td width="432" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" onClick="if(document.cform<?php echo $i;?>.n_class.value==''){alert('标题为空');document.cform<?php echo $i;?>.n_class.focus();return false;}" value="更新">　<a href="z_nclass.php?id=<?=$row["n_id"]?>&del=okk" onClick="return confirm('谨慎！本操作将删除此类目下所有信息！')">删除</a></td>
		</tr>
		</form>
			<?php }?>
	</table>
</div>
<br/>
<div class="s_info">
	<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
		<form name="formclass" method="post" action="">
			<tr>
				<td colspan="3" class="mian_right_box_title_01">【添加新闻分类】</td>
			</tr>
			<tr>
				<?php
					if($_SERVER['REQUEST_METHOD']=='POST'){
						$post = $_POST;
					//	print_r($post);exit;
						unset($post['nadd']);unset($post['Submit']);
						$num=$dblink->insert('nclass',$post);
						if($num>0){echo "<script type = 'text/javascript'>alert('用户添加成功');window.location.href = 'z_nclass.php';</script>";}else{exit('添加信息出错');}
					}
				?>
				<td width="412" height="33" align="right" bgcolor="#FFFFFF" class="title">新增分类标题：</td>
				<td width="347" colspan="-2" bgcolor="#FFFFFF" class="title">
					<input name="nadd" value="nok" type="hidden"><input type="text" name="n_class" id="n_class" value="" maxlength="40" style="width:300px;"/>
				</td>
				<td width="571" bgcolor="#FFFFFF" class="title">
					<input type="submit" onClick="if(document.formclass.n_class.value==''){alert('标题为空');document.formclass.n_class.focus();return false;}" name="Submit" value="添加">
				</td>
			</tr>
		</form>
	</table>
</div>
</body>
</html>
