<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>企培版新闻信息列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
</HEAD>
<?php include("../conn.php");?>
<script type="text/javascript" src="lgHttp.js"></script>
<script language="javascript">
function newsset(){
	   if(document.formnews.news_class.value==""){
	document.getElementById("newsclass").innerHTML="<font color=red>&times;请选择所属类别!</font>";
	document.formnews.news_class.focus();
	return false;
	}else{
	document.getElementById("newsclass").innerHTML="<font color=green><b>√</b></font>";
	}
	
	
		   if(document.formnews.news_title.value==""){
	document.getElementById("ntil").innerHTML="<font color=red>&times;请填写新闻标题!</font>";
	document.formnews.news_title.focus();
	return false;
	}else{
	document.getElementById("ntil").innerHTML="<font color=green><b>√</b></font>";
	}
	
	
		   if(document.formnews.news_zuozhe.value==""){
	document.getElementById("news_zuozhe").innerHTML="<font color=red>&times;请填写新闻标题!</font>";
	document.formnews.news_zuozhe.focus();
	return false;
	}else{
	document.getElementById("news_zuozhe").innerHTML="<font color=green><b>√</b></font>";
	}
	
}
</script>
<BODY>
<?php

if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}

  if (isset($_POST["news_class"])){
      $sql="insert into qp_news set news_class=".$_POST["news_class"].",news_title='".$_POST["news_title"]."',news_zuozhe='".$_POST["news_zuozhe"]."',news_laiyuan='".$_POST["news_laiyuan"]."',news_con='".$_POST["news_con"]."',nbool=".$_POST["nbool"].",ndate='".$_POST["ndate"]."',npic='".$_POST["npic"]."'";
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
      echo"<script>alert('信息添加成功');location.href='qp_nlist.php';</script>";  
	  }else{
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }

include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('news_con') ;
$oFCK->BasePath   = $sBasePath ;
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">企培版新闻信息：添加，修改介绍新闻相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow">&nbsp;</td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="formnews" method="post" onSubmit="return newsset()" action="">
  <tr>
    <td colspan="5" class="mian_right_box_title_01">【添加企培版新闻信息】</td>
	</tr> 
	<tr>
	    <td height="40" colspan="4" align="right" bgcolor="#FFFFFF" class="title">选择新闻分类</td>
        <td width="919" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
		
		<select name="news_class">
		<option value="">--请选择分类--</option>
	  <?php 
      $sql="select * from qp_news_class";
	  $rs=mysql_query($sql,$conn);
	  if (mysql_num_rows($rs)>=1){
	  while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
      ?>
		  <option value="<?php echo $row["class_id"]?>"><?php echo $row["class_title"]?></option>
		  <?php
          }
		  }?>
		
        </select>
        <label id="newsclass"></label>
		<span id="ncl">*</span> </td>
	  </tr>
	  <tr>
    <td height="38" colspan="4" align="right" bgcolor="#FFFFFF" class="title">信息标题：</td>
	<td width="919" bgcolor="#FFFFFF" class="title"><input type="text" name="news_title" id="news_title" value="" maxlength="40" style="width:300px;"/>
    <label id="ntil"></label>
    <span id="ntil">*</span></td>
    </tr>
	 
	  <tr>
	    <td height="41" colspan="4" align="right" bgcolor="#FFFFFF" class="title">插入图片：</td>
	    <td bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><input type="text" name="npic" size="50"><input type="button" value="浏览" onClick="window.open('up2.php?formname=formnews&editname=npic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')"></td>
      </tr>
	  <tr>
	    <td height="56" colspan="4" align="right" bgcolor="#FFFFFF" class="title">信息内容：<span id="incon"></span></td>
        <td bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php $oFCK->Create();?></td>
    </tr>
	  <tr>
	    <td height="36" colspan="4" align="right" bgcolor="#FFFFFF" class="title">是否推荐：</td>
        <td bgcolor="#FFFFFF" class="title"><input type="radio" name="nbool" value="1"><input type="hidden" name="mid" value="<?php echo $mid;?>">
          是 
          <input type="radio" name="nbool" checked value="0">
          否</td>
    </tr>
    	  <tr>
	    <td height="36" colspan="4" align="right" bgcolor="#FFFFFF" class="title">新闻作者：</td>
        <td bgcolor="#FFFFFF" class="title">
          <input type="text" name="news_zuozhe" id="news_zuozhe"><label id="newszuozhe"></label><span id="ntil">*</span>
          </td>
    </tr>
    	  <tr>
	    <td height="36" colspan="4" align="right" bgcolor="#FFFFFF" class="title">新闻来源：</td>
        <td bgcolor="#FFFFFF" class="title"><input type="text" name="news_laiyuan" value="一休教育网">
          </td>
    </tr>
	  <tr>
	    <td height="28" colspan="4" align="right" bgcolor="#FFFFFF" class="title">提交时间：</td>
	    <td bgcolor="#FFFFFF" class="title"><input type="text" name="ndate" id="ndate" value="<?php echo date("Y-m-d H:i:s");?>" maxlength="40" style="width:300px;"/></td>
      </tr>
	  <tr>
	    <td height="29" colspan="4" align="right" bgcolor="#FFFFFF" class="title">&nbsp;</td>
        <td bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" value="保存信息"></td>
    </tr>
  </form>
</table>
</div>
</BODY>
</HTML>
