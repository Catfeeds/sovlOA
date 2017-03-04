<?php include("../conn.php");?>
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>留学版新闻新闻列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="lgHttp.js"></script>
</HEAD>
<BODY>
<?php
if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}
if (isset($_POST["news_title"])){
$sql="insert into vip_news set news_title='".$_POST["news_title"]."',news_con='".$_POST["news_con"]."',news_time=date(now())";
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
      echo"<script>alert('新闻添加成功');location.href='vip_nlist.php';</script>";
	  }else{
echo $sql."<br>";
exit("添加失败! 错误新闻为:".mysql_error());
}}
include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('news_con') ;
$oFCK->BasePath = $sBasePath ;
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">留学版新闻新闻：添加，修改介绍新闻相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"></td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="lxnform"  method="post" action="">
  <tr>
    <td colspan="3" class="mian_right_box_title_01">【添加留学版新闻新闻】</td>
	</tr>
	  <tr>
	    <td width="292" height="4" align="right" bgcolor="#FFFFFF" class="title">新闻标题：</td>
	    <td width="1040" colspan="3" bgcolor="#FFFFFF" class="title"><input type="text" name="news_title" maxlength="40" style="width:300px;" onBlur="return lxnewsset()"/>
        <span id="lxntitle">*</span></td>
      </tr>
	  <tr>
	    <td height="56" align="right" bgcolor="#FFFFFF" class="title">新闻内容：<span id="incon"></span></td>
        <td colspan="3" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php $oFCK->Create();?></td>
    </tr>

	  <tr>
	  <td height="29" align="right" bgcolor="#FFFFFF" class="title">&nbsp;</td>
      <td colspan="3" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" onClick="return lxnewsset()" value="保存新闻"></td>
</tr>
</form>
</table>
</div>
</BODY>
</HTML>