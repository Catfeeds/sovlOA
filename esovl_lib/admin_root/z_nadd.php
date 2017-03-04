<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>新闻信息列表</TITLE>
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
			// items : [
				// 'source', '|', 'undo', 'redo', '|', 'print', 'template', 'code', 'cut', 'copy', 'paste',
				// 'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
				// 'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
				// 'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '|',
				// 'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
				// 'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'multiimage',
				// 'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
				// 'anchor', 'link', 'unlink', '|', 'about'
			// ], 
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
	if(@$_COOKIE["a_class"]>1) {
	  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
	  exit();
	}
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$post = $_POST;
		//print_r($post);exit;
		unset($post['button']);unset($post['checkbox']);
		$num=$dblink->insert('nnews',$post);
		//print_r($post);exit;
		if($num>0){
			//echo "添加成功";
			echo "<script type = 'text/javascript'>alert('用户添加成功');window.location.href = 'z_nlist.php';</script>";
		}else{
			exit('添加信息出错');
		}
	}
?> 
<br/>
	<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
		<tr>
			<th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">新闻信息：添加，修改介绍新闻相关的内容</div></th>
		</tr>
		<tr>
			<td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="z_nadd.php">添加新闻信息</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="z_nlist.php" >查看新闻信息</a><font color="#0000FF">&nbsp;</font></td>
		</tr>
	</table>
<br/>
	<div class="s_info">
		<form name="formnews" method="post" onSubmit="return newsset()" action="">
		<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
			<tr>
				<td colspan="5" class="mian_right_box_title_01">【添加新闻信息】</td>
			</tr> 
			<tr>
				<td height="40" colspan="4" align="right" bgcolor="#FFFFFF" class="title">选择新闻分类</td>
				<td width="80%" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
					<select name="nclass">
						<option value="0">--请选择分类--</option>
						<?php 
							$sql = $dblink->findAll("nclass",array());
							foreach($sql as $row){
						?>
						<option value="<?php echo $row["n_id"]?>"><?php echo $row["n_class"]?></option>
						<?php }?>
					</select><span id="ncl">*</span> 
				</td>
			</tr>
			<tr>
				<td height="31" colspan="4" align="right" bgcolor="#FFFFFF" class="title">信息标题：</td>
				<td bgcolor="#FFFFFF" class="title">
					<span><input type="text" name="ntitle" id="ntitle" value="" maxlength="40" style="width:250px;"/></span>
					<span id="ntil">*</span>　添加新闻小图
					<input type="checkbox" name="checkbox" onClick="opshow()">
					<span id="inshow">展开</span>
					<span id="np1" style="visibility:hidden;width:400px;">
						<input type="text" name="npic" style="width:180px;" readonly/>
						<input name="button" type="button" class="go" onClick="window.open('up2.php?formname=formnews&editname=npic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传图片" />尺寸(px)：330x200
					</span>
				</td>
			</tr>
			<tr>
				<td height="28" colspan="4" align="right" bgcolor="#FFFFFF" class="title">信息内容：<span id="incon"></span></td>
				<td bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
					<span class="title" style="padding-left:12px;">
						<textarea name="ncon" style="width:90%;height:300px;"></textarea>
					</span>
				</td>
			</tr>
			<tr>
				<td height="36" colspan="4" align="right" bgcolor="#FFFFFF" class="title">是否推荐：</td>
				<td bgcolor="#FFFFFF" class="title">
					<input type="radio" name="nbool" value="1">是 
					<input type="radio" name="nbool" checked value="0">否
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
				<td bgcolor="#FFFFFF" class="title"><input type="submit" name="button" value="保存信息"></td>
			</tr>
		</table>
		</form>
	</div>
</BODY>
</HTML>