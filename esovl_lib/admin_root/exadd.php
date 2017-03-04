<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>考试日历列表</TITLE>
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
if (isset($_POST["ex_title"])){

$sql="insert into excal set ex_title='".$_POST["ex_title"]."',ex_m='".$_POST["ex_m"]."',ex_ksbk='".$_POST["ex_ksbk"]."',ex_bmtime='".$_POST["ex_bmtime"]."',ex_bmrk='".$_POST["ex_bmrk"]."',ex_kstime='".$_POST["ex_kstime"]."',ex_ksrk='".$_POST["ex_ksrk"]."',ex_cfrk='".$_POST["ex_cfrk"]."',ex_bool=".$_POST["ex_bool"];
          $rs=mysql_query($sql,$conn);
			if ($rs){
			echo "<script>alert('成功添加一条考试日历!!');location.href='exlist.php';</script>";
			}else{
			exit("添加出现错误，错误信息为：".mysql_error());
			}
		//mysql_free_result($rs);//释放资源
}		
include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('ex_ksbk') ;
$oFCK->BasePath   = $sBasePath ;
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">考试日历：添加，修改介绍相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="exadd.php">添加考试日历</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="exlist.php" >查看考试日历</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" height="437" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="exform" method="post" onSubmit="return exset()" action="">
  <tr>
    <td colspan="5" class="mian_right_box_title_01">【添加考试日历】</td>
	</tr>
	<tr>
	     <td height="14" align="right" bgcolor="#FFFFFF">考试名称：</td>
         <td width="917" bgcolor="#FFFFFF"><input type="text" name="ex_title" style="width:300px;"><span id="extitle">*</span></td>
      </tr>
	<tr>
	  <td height="14" align="right" bgcolor="#FFFFFF">月分：</td>
	  <td bgcolor="#FFFFFF">
	  <select name="ex_m">
	  <option value=0 selected>--请选择--</option>
	    <option value=1>一月分</option>
		<option value=2>二月分</option>
		<option value=3>三月分</option>
		<option value=4>四月分</option>
		<option value=5>五月分</option>
		<option value=6>六月分</option>
		<option value=7>七月分</option>
		<option value=8>八月分</option>
		<option value=9>九月分</option>
		<option value=10>十月分</option>
		<option value=11>十一月分</option>
		<option value=12>十二月分</option>
	    </select>
	  </td>
	  </tr>
	   <tr>
	  <td align="right" bgcolor="#FFFFFF">考试百科：</td>
	  <td width="917" bgcolor="#FFFFFF" style="padding-left:13px;">
	                            <?php
							    $oFCK->Create();
								?></td>
      </tr>
	   
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">报名时间：</td>
                              <td bgcolor="#FFFFFF" style="padding-left:13px;"><textarea name="ex_bmtime" style="width:300px;height:50px;"></textarea><span id="exbmtime">*</span></td>
                            </tr>                          
                           
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">报名入口：</td>
                              <td bgcolor="#FFFFFF" style="padding-left:13px;"><textarea name="ex_bmrk" style="width:300px;height:50px;"></textarea><span id="exbmrk">*</span></td>
                            </tr>
							 
							 <tr>
							   <td height="26" align="right" bgcolor="#FFFFFF">考试时间：</td>
                               <td bgcolor="#FFFFFF" style="padding-left:13px;"><textarea name="ex_kstime" style="width:300px;height:50px;"></textarea><span id="exkstime">*</span></td></tr>
							 <tr>
                              <td height="13" align="right" bgcolor="#FFFFFF">考试入口：</td>
                              <td bgcolor="#FFFFFF" style="padding-left:13px;"><textarea name="ex_ksrk" style="width:300px;height:50px;"></textarea><span id="exksrk">*</span></td>
                            </tr>
							 <tr>
							   <td height="14" align="right" bgcolor="#FFFFFF">查分入口：</td>
							   <td bgcolor="#FFFFFF" style="padding-left:13px;"><textarea name="ex_cfrk" style="width:300px;height:50px;"></textarea><span id="excfrk">*</span></td>
      </tr>
						<tr>
						<td height="36" align="right" bgcolor="#FFFFFF">首页显示：</td>
						<td bgcolor="#FFFFFF"><input type="radio" name="ex_bool" value=1>
是
  <input type="radio" name="ex_bool" value=0 checked>
否</td>
						</tr>
							<tr>
							<td align="right" bgcolor="#FFFFFF">&nbsp;</td>
							<td bgcolor="#FFFFFF"><input name="submitSaveEdit" type="submit" value="保存考试日历设置" />
					         <input type="reset" name="redel" value="重填" /></td></tr></form></table>
</div>
</BODY>
</HTML>
