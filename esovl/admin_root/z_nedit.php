<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>企业信息列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
</HEAD>
<?php include_once("../conn.php");include_once("../web_start.php");?>
<script type="text/javascript" src="lgHttp.js"></script>
<script charset="utf-8" src="../js/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="../js/kindeditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="../js/kindeditor/plugins/code/prettify.js"></script>
<script>
	KindEditor.ready(function(K){
		var editor1 = K.create('textarea[name="ncon"]', {
			allowFileManager : true,
			afterCreate : function() {
				var self = this;
				K.ctrl(document, 13, function() {
					self.sync();
					K('form[name=formnews]')[0].submit();
				});
				K.ctrl(self.edit.doc, 13, function() {
					self.sync();
					K('form[name=formnews]')[0].submit();
				});
			}
		});
		prettyPrint();
	});
</script>
<script>
function opshow(){
	if(document.getElementById("np1").style.visibility=="hidden"){
	     document.getElementById("np1").style.visibility="visible";
		 document.getElementById("inshow").innerHTML="隐藏";
	}else{
		 document.getElementById("np1").style.visibility="hidden";
		 document.getElementById("inshow").innerHTML="展开";
	}
}
</script>

<BODY>
<?php
	if (@$_COOKIE["a_class"]>1) {
	  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
	  exit();
	}
	//修改
	if(isset($_POST['Submit'])){
		$post = $_POST;
		//print_r($post);exit;
		unset($post['Submit']);
		echo $num=$dblink->update("nnews",$post,"nid= '{$_GET['id']}'");
		//print_r($post);exit;
		if($num==0||$num==1){
			echo "<script>alert('信息已更新');location.href='z_nlist.php'</script>";
		}
	}
	$row = $dblink->find("nnews",array(),"nid = '{$_GET['id']}'");
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">企业信息：添加，修改介绍企业相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="z_nadd.php">添加企业信息</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="z_nlist.php" >查看企业信息</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
	<form name="formnews" method="post" onSubmit="return newsset()" action="">
		<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
			<tr>
				<td colspan="5" class="mian_right_box_title_01">【编辑新闻信息】</td>
			</tr>
			<tr>
				<td height="40" colspan="4" align="right" bgcolor="#FFFFFF" class="title">选择新闻分类：</td>
				<td width="919" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
					<input name="nid" value="<?php echo $_GET["id"]?>" type="hidden">
					<select name="nclass">
						<?php
							$sql = $dblink->findAll("nclass",array());
							foreach($sql as $rw){
						?>
						<option value="<?php echo $rw["n_id"]?>" <?php if($rw["n_id"]==$row["nclass"]){echo "selected='selected'";}?>>
							<?php echo $rw["n_class"]?>
						</option>
						<?php }?>
					</select>
					<span id="ncl">*</span> 
				</td>
			</tr>
			<tr>
				<td height="38" colspan="4" align="right" bgcolor="#FFFFFF" class="title">信息标题：</td>
				<td width="919" bgcolor="#FFFFFF" class="title">
					<input type="text" name="ntitle" id="ntitle" value="<?php echo $row["ntitle"]?>" maxlength="40" style="width:250px;"/><span id="ntil">*</span>　添加新闻小图
					<input type="checkbox" name="checkbox" value="" onClick="opshow()"><span id="inshow">隐藏</span><span id="np1" style="visibility:visible;width:400px;">
					<input type="text" name="npic" value="<?php echo $row["npic"]?>" style="width:180px;"/>
					<input name="button" type="button" class="go" onClick="window.open('up2.php?formname=formnews&editname=npic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传图片" />尺寸(px)：330x200 </span>
					<span onmouseout="document.getElementById('showlg').style.display='none'" onmouseover="document.getElementById('showlg').style.display=''" style="margin-left:20px; position:relative;">预览
						<div style="width: 50px; height: 50px; position:absolute;top:-120px; left: -73px; display: none;" id="showlg">
							<img width="150" height="200" src="<?php echo $row["npic"];?>">
						</div>
					</span>
				</td>
			</tr>
			<tr>
				<td height="56" colspan="4" align="right" bgcolor="#FFFFFF" class="title">信息内容：</td>
				<td bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
					<textarea type="text" name="ncon" style="width:950px;height:300px;"><?php echo $row['ncon'];?></textarea>
				</td>
			</tr>
			<tr>
				<td height="36" colspan="4" align="right" bgcolor="#FFFFFF" class="title">是否推荐：</td>
				<td bgcolor="#FFFFFF" class="title">
					<input type="radio" name="nbool" value="1" <?php if($row["nbool"]==1){echo "checked = 'checked'";}?>>是 
					<input type="radio" name="nbool" value="0" <?php if($row["nbool"]==0){echo "checked = 'checked'";}?>>否
				</td>
			</tr>
			<tr>
				<td height="28" colspan="4" align="right" bgcolor="#FFFFFF" class="title">提交时间：</td>
				<td bgcolor="#FFFFFF" class="title">
					<input type="text" name="ndate" id="ndate" value="<?php echo date("Y-m-d H:i:s");?>" maxlength="40" style="width:300px;"/>
				</td>
			</tr>
			<tr>
				<td height="29" colspan="4" align="right" bgcolor="#FFFFFF" class="title">&nbsp;</td>
				<td bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" value="保存信息"></td>
			</tr>
		</table>
	</form>
</div>
</BODY>
</HTML>
