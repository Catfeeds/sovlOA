<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>教师信息列表</TITLE>
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
if (isset($_POST["t_name"])){
//echo $_POST["g_name"];
$sql="insert into teacher set t_name='".$_POST["t_name"]."',t_jg='".$_POST["t_jg"]."',t_fzkc='".$_POST["t_fzkc"]."',t_con='".$_POST["t_con"]."',t_info='".$_POST["t_info"]."',t_pic='".$_POST["t_pic"]."',t_bool=".$_POST["t_bool"].",t_date='".$_POST["t_date"]."'";
          $rs=mysql_query($sql,$conn);
			if ($rs){
			echo "<script>alert('成功添加一条教师信息!!');location.href='z_teacher.php';</script>";
			}else{
			exit("添加出现错误，错误信息为：".mysql_error());
			}
		//mysql_free_result($rs);//释放资源
}		
include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('t_info') ;
$oFCK->BasePath   = $sBasePath ;
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">教师信息：添加，修改介绍相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="z_tadd.php">添加教师信息</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="z_teacher.php" >查看教师信息</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" height="337" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="tecform" method="post" onSubmit="return teset()" action="">
  <tr>
    <td colspan="5" class="mian_right_box_title_01">【添加教师信息】</td>
	</tr>
	   <tr>
	  <td align="right" bgcolor="#FFFFFF">教师姓名：</td>
	  <td width="917" bgcolor="#FFFFFF"><input type="text" name="t_name" id="t_name" maxlength="40" style="width:300px;"/><span id="tname">*</span></td>
      </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">教育机构：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="t_jg" id="t_jg" maxlength="140" style="width:300px;"/><span id="tjg">*</span></td>
                            </tr>
                           
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">负责课程：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="t_fzkc" maxlength="40" style="width:300px;"/></td>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">教师照片：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="t_pic" style="width:210px;" readonly/>
<input type="button" class="go" onClick="window.open('up2.php?formname=tecform&editname=t_pic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传小图" />
                                <span id="tpic">*</span><span style="color:#999"> 尺寸(px)：150x150</span>							  </td>
                            </tr>
							 <tr>
                              <td align="right" bgcolor="#FFFFFF">教师介绍：</td>
                              <td bgcolor="#FFFFFF"> 　 
                                <textarea name="t_con" style="width:300px;height:100px;"></textarea></td>
                            </tr>
							 <tr>
							   <td height="26" align="right" bgcolor="#FFFFFF">课程信息：</td>
                               <td bgcolor="#FFFFFF"><?php $oFCK->Create();?></td></tr>
							 <tr>
                              <td height="28" align="right" bgcolor="#FFFFFF">首页推荐：</td>
                              <td bgcolor="#FFFFFF"><input type="radio" name="t_bool" value="1">
                                是
                                <input type="radio" name="t_bool" value="0" checked>
                                否</td>
                            </tr>
						<tr>
						<td height="29" align="right" bgcolor="#FFFFFF">提交时间：</td>
						<td bgcolor="#FFFFFF"><input type="text" name="t_date" value="<?php echo date("Y-m-d H:i:s");?>" style="width:210px;" readonly/></td>
						</tr>
							<tr>
							<td align="right" bgcolor="#FFFFFF">&nbsp;</td>
							<td bgcolor="#FFFFFF"><input name="submitSaveEdit" type="submit" value="保存教师信息设置" />
					         <input type="reset" name="redel" value="重填" /></td></tr></form></table>
</div>
</BODY>
</HTML>
