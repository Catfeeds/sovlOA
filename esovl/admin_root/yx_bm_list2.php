<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>培训报名列表列表</TITLE>
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
 if (isset($_POST["user_bool"])){ 
  
      $sql="update yx_user set user_bool=".$_POST["user_bool"]." where user_id=".$_GET["id"];
	  
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
	
      echo"<script>alert('修改成功');location.href='yx_bm_list.php';</script>";
	  }else{
	  
	  exit("更新失败! 错误信息为:".mysql_error());
	  }
  }
  
      $sql="select * from yx_user where user_id=".$_GET["id"];
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
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">编辑报名列表：添加，修改相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="pxpxbm_list.php" >查看培训报名列表</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
  <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
    <form name="formnews" method="post" action="">
      <tr>
        <td colspan="2" class="mian_right_box_title_01">【编辑】</td>
      </tr>
      <tr>
        <td height="42" align="right" bgcolor="#FFFFFF" class="title">姓　　名：</td>
        <td width="806" colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php echo $row["user_name"];?>
          <input type="hidden" name="user_name" value="<?php echo $_GET["id"]?>"></td>
      </tr>
      <tr>
        <td height="39" align="right" bgcolor="#FFFFFF" class="title">招生学校：</td>
        <td width="806" colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php echo $row["user_school"];?></td>
      </tr>
      <tr>
        <td height="38" align="right" bgcolor="#FFFFFF" class="title">专业类别：</tsd>
        <td width="806" colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php echo $row["user_kec"];?></td>
      </tr>
      <tr>
        <td height="40" align="right" bgcolor="#FFFFFF" class="title">联系电话：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php echo $row["user_tel"];?></td>
      </tr>
      <tr>
        <td height="36" align="right" bgcolor="#FFFFFF" class="title">电子邮箱：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php echo $row["user_mail"];?></td>
      </tr>
      
      <tr>
        <td height="44" align="right" bgcolor="#FFFFFF" class="title">备　　注：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php echo $row["user_shuom"];?></td>
      </tr>
      <tr>
        <td height="36" align="right" bgcolor="#FFFFFF" class="title">处理状态：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="radio" name="user_bool" value="1" <?php if($row["user_bool"]==1){?> checked <?php }?>>
          已处理
            <input type="radio" name="user_bool" value="0" <?php if($row["user_bool"]==0){?> checked <?php }?>>
          未处理</td>
      </tr>
  <!--    <tr>
        <td height="28" align="right" bgcolor="#FFFFFF" class="title">提交时间：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php //echo $row["user_date"];?></td>
      </tr>-->
      <tr>
        <td height="29" align="right" bgcolor="#FFFFFF" class="title">&nbsp;</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" value="更改信息"></td>
      </tr>
    </form>
  </table>
</div>
</BODY>
</HTML>
