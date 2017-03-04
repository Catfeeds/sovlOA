<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>下载资料列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.STYLE2 {color: #FF0000}
-->
</style>
</HEAD>
<?php include("../conn.php");?>
<script type="text/javascript" src="lgHttp.js"></script>
<BODY>
<?php

if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}
  if (isset($_POST["w_title"])){
      $sql="insert into xl_ask set w_title='".$_POST["w_title"]."',w_con='".$_POST["w_con"]."',w_downcl='".$_POST["w_downcl"]."',w_pindao='".$_POST["w_pindao"]."'";
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
      echo"<script>alert('信息添加成功');location.href='xl_down_list.php?c=".$_POST["w_downcl"]."';</script>";	
	  }else{	  
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }

?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">下载资料：添加，修改介绍新闻相关的内容</div></th>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="askform" method="post" onSubmit="if(document.askform.w_title.value==''){alert('标题为空');document.askform.w_title.focus();return false;}if(document.askform.pb_pindao.value==''){alert('请选择频道');document.askform.pb_pindao.focus();return false;}if(document.askform.w_con.value==''){alert('请上传资料');document.askform.w_con.focus();return false;}" action="">
  <tr>
    <td colspan="2" class="mian_right_box_title_01">【添加下载资料】</td>
	</tr>
	  <tr>
    <td align="right" bgcolor="#FFFFFF" class="title">信息标题：</td>
	<td width="766" colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="w_title" id="w_title" value="" maxlength="40" style="width:200px;"/><span id="ntil">*</span></td>
    </tr>
	 <tr>
	    <td height="28" align="right" bgcolor="#FFFFFF" class="title">频道分类：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title">　<select name="w_pindao">
    <option value="" selected>--选择频道--</option>
    <?php
	  $sql="select * from pindao order by pin_id asc";
	  $rs=mysql_query($sql,$conn);
	       if(mysql_num_rows($rs)>=1){		
		     while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){			
			 ?>
	  <option value="<?=$row["pin_title"]?>"><?=$row["pin_title"]?></option>
      <?php }}?>  
	  </select></td>
      </tr>
	  <tr>
	    <td height="27" align="right" bgcolor="#FFFFFF" class="title">信息内容：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title"><input name="w_con" type="text" value="" readonly size="30"> 
        <input name="Submit22" type="button" class="go" onClick="window.open('up3.php?formname=askform&editname=w_con','','status=no,scrollbars=no,top=20,left=110,width=420,height=165')" value="上传资料">

注：资料格式.doc、xls、pdf、rar类资料。<span class="STYLE2">(资料请小于1M)</span></td>
    </tr>
	  
	  <tr>
	    <td height="29" align="right" bgcolor="#FFFFFF" class="title">
        <?php if (isset($_GET["c"])){echo "<input type='hidden' name='w_downcl' value='".$_GET["c"]."'>";}?>
	      
       </td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" value="保存信息"></td>
    </tr>
  </form>
</table>
</div>
</BODY>
</HTML>
