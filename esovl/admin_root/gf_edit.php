<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>高复报名详细</TITLE>
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
  if (isset($_POST["gf_id"])){ 
  
      $sql="update gfb_bm set gf_bool=".$_POST["gf_bool"]." where gf_id=".$_POST["gf_id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
	
      echo"<script>alert('修改成功');location.href='gfbm_list.php';</script>";
	  }else{
	  
	  exit("更新失败! 错误信息为:".mysql_error());
	  }
  }
  
      $sql="select * from gfb_bm join kkinfo on gfb_bm.kid=kkinfo.kid join school on kkinfo.s_id=school.s_id where gf_id=".$_GET["id"];
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
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">报名列表：添加，修改相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="gfbm_list.php" >查看高复班报名列表</a><font color="#0000FF">&nbsp;</font></td>
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
        <td width="806" colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php echo $row["gf_name"];?>
          <input type="hidden" name="gf_id" value="<?php echo $_GET["id"]?>"></td>
      </tr>
      <tr>
        <td height="39" align="right" bgcolor="#FFFFFF" class="title">招生学校：</td>
        <td width="806" colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php echo $row["s_name"];?></td>
      </tr>
      <tr>
        <td height="38" align="right" bgcolor="#FFFFFF" class="title">专业类别：</td>
        <td width="806" colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php echo $row["zyclass"];?></td>
      </tr>
      <tr>
        <td height="35" align="right" bgcolor="#FFFFFF" class="title">专业名称：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php echo $row["zyname"];?></td>
      </tr>
      <tr>
        <td height="40" align="right" bgcolor="#FFFFFF" class="title">联系电话：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php echo $row["gf_tel"];?></td>
      </tr>
      <tr>
        <td height="36" align="right" bgcolor="#FFFFFF" class="title">电子邮箱：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php echo $row["gf_email"];?></td>
      </tr>
      <tr>
        <td height="34" align="right" bgcolor="#FFFFFF" class="title">地　　址：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php echo $row["gf_adder"];?></td>
      </tr>
      <tr>
        <td height="44" align="right" bgcolor="#FFFFFF" class="title">备　　注：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php echo $row["gf_con"];?></td>
      </tr>
      <tr>
        <td height="36" align="right" bgcolor="#FFFFFF" class="title">处理状态：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="radio" name="gf_bool" value="1" <?php if($row["gf_bool"]==1){?> checked <?php }?>>
          已处理
            <input type="radio" name="gf_bool" value="0" <?php if($row["gf_bool"]==0){?> checked <?php }?>>
          未处理</td>
      </tr>
      <tr>
        <td height="28" align="right" bgcolor="#FFFFFF" class="title">提交时间：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php echo $row["gf_date"];?></td>
      </tr>
      <tr>
        <td height="29" align="right" bgcolor="#FFFFFF" class="title">&nbsp;</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" value="更改信息"></td>
      </tr>
    </form>
  </table>
</div>
</BODY>
</HTML>
