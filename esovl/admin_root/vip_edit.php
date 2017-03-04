<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>会员信息列表</TITLE>
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
  if (isset($_POST["v_class"])){ 
  
      $sql="update vip set v_class=".$_POST["v_class"].",v_strus=".$_POST["v_strus"].",v_con='".$_POST["v_con"]."' where v_id=".$_POST["v_id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
	
      echo"<script>alert('修改成功');location.href='vip_list.php';</script>";	  
	  }else{
	  
	  exit("更新失败! 错误信息为:".mysql_error());
	  }
  }
  
      $sql="select * from vip where v_id=".$_GET["id"];
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
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">会员信息：添加，修改</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="vip_list.php" >查看会员列表</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
  <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
    <form name="vipedit" method="post" action="">
      <tr>
        <td colspan="2" class="mian_right_box_title_01">【编辑会员信息】</td>
      </tr>
      <tr>
        <td height="38" align="right" bgcolor="#FFFFFF" class="title">会员帐号：</td>
        <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="v_name" id="v_name" value="<?php echo $row["v_name"]?>" readonly maxlength="40" style="width:300px;border:0"/>
        <input type="hidden" name="v_id" value="<?php echo $_GET["id"]?>"></td>
      </tr>
      <tr>
        <td height="27" align="right" bgcolor="#FFFFFF" class="title">联系电话：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" \><input type="text" name="v_tel" id="v_tel" value="<?php echo $row["v_tel"]?>" readonly maxlength="40" style="width:300px;border:0"/></td>
      </tr>
      <tr>
        <td height="28" align="right" bgcolor="#FFFFFF" class="title">会员等级：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" \><input type="text" name="v_class" id="ntitle" value="<?php echo $row["v_class"]?>" maxlength="1" onKeyUp="value=value.replace(/[^\d]/g,'')" style="width:50px;"/>
        <span>(0~3) 共4个等级，数越大，权限越高</span></td>
      </tr>
      <tr>
        <td height="36" align="right" bgcolor="#FFFFFF" class="title">冻结帐号：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="radio" name="v_strus" value="1" <?php if($row["v_strus"]==1){?> checked <?php }?>>
          <img src="images/close.gif" width="20" height="20" alt="锁定">
          <input type="radio" name="v_strus" value="0" <?php if($row["v_strus"]==0){?> checked <?php }?>>
          <img src="images/open.gif" width="20" height="20" alt="解锁"></td>
      </tr>
      <tr>
        <td height="28" align="right" bgcolor="#FFFFFF" class="title">备注信息：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title"><textarea name="v_con" style="width:300px;height:60px;"><?php echo $row["v_con"];?></textarea></td>
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
