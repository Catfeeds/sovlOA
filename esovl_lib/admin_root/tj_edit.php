<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>推荐信息列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
</HEAD>
<?php include("../conn.php");?>
<script type="text/javascript" src="lgHttp.js"></script>
<body>
<?php 
if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}
if (isset($_POST["tj_title"])){

$sql="update tjbiao set tj_class='".$_POST["tj_class"]."',tj_title='".$_POST["tj_title"]."',tj_pic='".$_POST["tj_pic"]."',tj_info='".$_POST["tj_info"]."',tj_bool=".$_POST["tj_bool"].",tj_date='".$_POST["tj_date"]."' where tj_id=".$_POST["tj_id"];
          $rs=mysql_query($sql,$conn);
			if ($rs){
			echo "<script>alert('成功编辑一条推荐信息!!');location.href='tj_list.php';</script>";
			}else{
			exit("编辑出现错误，错误信息为：".mysql_error());
			}
		//mysql_free_result($rs);//释放资源
}	


   $sql="select * from tjbiao where tj_id=".$_GET["id"];
	$rs=mysql_query($sql,$conn);
	if (!$rs){exit("编辑出现错误，错误信息为：".mysql_error());}
	$row=mysql_fetch_array($rs,MYSQL_ASSOC);
	
include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('tj_info') ;
$oFCK->BasePath   = $sBasePath ;
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">推荐信息：编辑，修改介绍相关的内容</div></th>
  </tr>
<tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="tj_add.php">编辑推荐信息</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="tj_list.php" >查看推荐信息</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" height="337" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="tjform" method="post" onSubmit="return tjset()" action="">
  <tr>
    <td colspan="5" class="mian_right_box_title_01">【编辑推荐信息】</td>
	</tr>
	   <tr>
	  <td align="right" bgcolor="#FFFFFF">推荐类别：</td>
	  <td width="917" bgcolor="#FFFFFF">
	    <input name="tj_id" value="<?php echo $_GET["id"]?>" type="hidden">
		<select name="tj_class">		
		<option value="热门课程" <?php if ($row["tj_class"]=="热门课程"){echo "selected";}?>>热门课程</option>
		</select>
	    <span id="tjclass">*</span></td>
      </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">标题：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="tj_title" id="tj_title" value="<?php echo $row["tj_title"]?>" maxlength="140" style="width:300px;"/><span id="tjtitle">*</span></td>
                            </tr>                          
                           
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">图片：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="tj_pic" value="<?php echo $row["tj_pic"]?>"  style="width:210px;" readonly/>
<input type="button" class="go" onClick="window.open('up2.php?formname=tjform&editname=tj_pic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传小图" /><span id="tjpic">*</span><span style="color:#999"> 尺寸(px)：150x150</span></td>
                            </tr>
							 
							 <tr>
							   <td height="26" align="right" bgcolor="#FFFFFF">课程信息：</td>
                               <td bgcolor="#FFFFFF">
							   <?php
							    $oFCK->Value  = $row["tj_info"];
							    $oFCK->Create();
								?></td></tr>
							 <tr>
                              <td height="28" align="right" bgcolor="#FFFFFF">首页推荐：</td>
                              <td bgcolor="#FFFFFF"><input type="radio" name="tj_bool" value="1" <?php if ($row["tj_bool"]==1){echo "checked";}?>>
                                是
                                <input type="radio" name="tj_bool" value="0" <?php if ($row["tj_bool"]==0){echo "checked";}?>>
                                否</td>
                            </tr>
						<tr>
						<td height="29" align="right" bgcolor="#FFFFFF">更新时间：</td>
						<td bgcolor="#FFFFFF"><input type="text" name="tj_date" value="<?php echo date("Y-m-d H:i:s");?>" style="width:210px;" readonly/></td>
						</tr>
							<tr>
							<td align="right" bgcolor="#FFFFFF">&nbsp;</td>
							<td bgcolor="#FFFFFF"><input name="submitSaveEdit" type="submit" value="保存推荐信息设置" />
					         <input type="reset" name="redel" value="重填" /></td></tr></form></table>
</div>
</BODY>
</HTML>
