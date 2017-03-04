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
  if (isset($_POST["px_answer"])){ 
  
      $sql="update pxwd set px_answer='".$_POST["px_answer"]."',px_bool=".$_POST["px_bool"]." where px_id=".$_POST["px_id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	
      echo"<script>alert('修改成功');location.href='px_wdlist.php';</script>";	  
	  }else{	  
	  exit("更新失败! 错误信息为:".mysql_error());
	  }
  }
  
      $sql="select * from pxwd where px_id=".$_GET["id"];
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
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><font color="#0000FF">&nbsp;</font><a href="px_wdlist.php" >查看在线问答</a><font color="#0000FF">&nbsp;</font></td>
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
        <td height="38" align="right" bgcolor="#FFFFFF" class="title"><input name="px_id" value="<?php echo $_GET["id"];?>"type="hidden">
        问题：</td>
        <td width="919" colspan="-2" align="left" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">		
		<textarea name="px_ask" id="px_ask" style="width:300px;height:40px;"><?php echo $row["px_ask"];?></textarea>		
		</td>
      </tr>
      <tr>
        <td height="87" align="right" bgcolor="#FFFFFF" class="title">回复：</td>
        <td colspan="-2" align="left" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
          <textarea name="px_answer" style="width:300px;height:80px;"><?php echo $row["px_answer"];?></textarea>
 </td>
      </tr>
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
