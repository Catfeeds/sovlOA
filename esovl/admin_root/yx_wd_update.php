<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>在线问答列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
</HEAD>
<?php include("../conn.php");?>
<script type="text/javascript" src="lgHttp.js"></script>
<BODY>
<?php

if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}
  if (isset($_POST["wd_huif"])){ 
  
      $sql="update yx_wd set wd_huif='".$_POST["wd_huif"]."',huif_time='".$_POST["huif_time"]."',px_bool=".$_POST["px_bool"]." where wd_id=".$_POST["wd_id"];
	 // exit($sql);
	  $rs=mysql_query($sql,$conn);
	  
	  if ($rs){	
      echo"<script>alert('修改成功');location.href='yx_wtlist.php';</script>";	  
	  }else{	  
	  exit("更新失败! 错误信息为:".mysql_error());
	  }
  }
  
      $sql="select * from yx_wd where wd_id=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	  $row=mysql_fetch_assoc($rs);
	  }

?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">在线问答：添加，修改相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><font color="#0000FF">&nbsp;</font><a href="yx_wtlist.php" >查看在线问答</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
  <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
    <form name="askform" method="post" onSubmit="if(document.askform.px_answer.value==''){alert('回复为空');document.askform.px_nc.focus();return false;}" action="">
      <tr>
        <td colspan="2" class="mian_right_box_title_01">【编辑在线问答】</td>
      </tr>
      <tr>
        <td height="38" align="right" bgcolor="#FFFFFF" class="title"><input name="wd_id" value="<?php echo $_GET["id"];?>"type="hidden">
        问题：</td>
        <td width="919" colspan="-2" align="left" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">		
		<textarea name="wd_wenti" id="px_ask" style="width:300px;height:40px;"><?php echo $row["wd_wenti"];?></textarea>		
		</td>
      </tr>
      <tr>
        <td height="87" align="right" bgcolor="#FFFFFF" class="title">回复：</td>
        <td colspan="-2" align="left" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
          <textarea name="wd_huif" style="width:300px;height:80px;"><?php echo $row["wd_huif"];?></textarea>
 </td>
      </tr>
      <tr>
        <td height="87" align="right" bgcolor="#FFFFFF" class="title">回复时间：</td>
        <td colspan="-2" align="left" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
          <input type="text" name="huif_time" id="ndate" value="<?php echo date("Y-m-d H:i:s");?>" maxlength="40" style="width:300px;"/>
 </td>
      <tr>
        <td height="33" align="right" bgcolor="#FFFFFF" class="title">审核：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><input type="radio" name="px_bool" value="1" <?php if($row["px_bool"]==1){?> checked <?php }?>>
          显示
            <input type="radio" name="px_bool" value="0" <?php if($row["px_bool"]==0){?> checked <?php }?>> 
            隐藏</td>
      </tr>
      <tr>
        <td height="29" align="right" bgcolor="#FFFFFF" class="title">&nbsp;</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" value="保存信息"></td>
      </tr>
    </form>
  </table>
</div>
</BODY>
</HTML>
