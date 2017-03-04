<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>留学报名列表列表</TITLE>
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
  if (isset($_POST["lxbm_id"])){ 
  
      $sql="update lxbm set lxbm_bool=".$_POST["lxbm_bool"]." where lxbm_id=".$_POST["lxbm_id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
	
      echo"<script>alert('修改成功');location.href='lxbm_list.php';</script>";	  
	  }else{
	  
	  exit("更新失败! 错误信息为:".mysql_error());
	  }
  }
  
      $sql="select * from lxbm join lxgjclass on lxbm.lxbm_gjid=lxgjclass.lx_gjid where lxbm_id=".$_GET["id"];
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
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">留学报名列表：添加，修改相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="bm_list.php" >查看网上留学报名列表</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
  <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
    <form name="formnews" method="post" action="">
      <tr>
        <td colspan="5" class="mian_right_box_title_01">【编辑】</td>
      </tr>
      <tr>
        <td height="42" colspan="4" align="right" bgcolor="#FFFFFF" class="title">姓　　名：</td>
        <td width="806" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php echo $row["lxbm_name"];?>
          <input type="hidden" name="lxbm_id" value="<?php echo $_GET["id"]?>"></td>
      </tr>
       <tr>
        <td height="38" colspan="4" align="right" bgcolor="#FFFFFF" class="title">留学国家：</td>
        <td width="806" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php echo $row["lx_gjcl"];?></td>
      </tr>
      <tr>
        <td height="39" colspan="4" align="right" bgcolor="#FFFFFF" class="title">招生学校：</td>
        <td width="806" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php echo $row["lxbm_xxmc"];?></td>
      </tr>
     
      <tr>
        <td height="35" colspan="4" align="right" bgcolor="#FFFFFF" class="title">专业名称：</td>
        <td bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php echo $row["lxbm_zymc"];?></td>
      </tr>
      <tr>
        <td height="40" colspan="4" align="right" bgcolor="#FFFFFF" class="title">联系电话：</td>
        <td bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php echo $row["lxbm_tel"];?></td>
      </tr>
      <tr>
        <td height="36" colspan="4" align="right" bgcolor="#FFFFFF" class="title">电子邮箱：</td>
        <td bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php echo $row["lxbm_email"];?></td>
      </tr>
      <tr>
        <td height="34" colspan="4" align="right" bgcolor="#FFFFFF" class="title">地　　址：</td>
        <td bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php echo $row["lxbm_address"];?></td>
      </tr>
      <tr>
        <td height="40" colspan="4" align="right" bgcolor="#FFFFFF" class="title">身分证号：</td>
        <td bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php echo $row["lxbm_sfz"];?></td>
      </tr>
      <tr>
        <td height="44" colspan="4" align="right" bgcolor="#FFFFFF" class="title">备　　注：</td>
        <td bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php echo $row["lxbm_con"];?></td>
      </tr>
      <tr>
        <td height="36" colspan="4" align="right" bgcolor="#FFFFFF" class="title">处理状态：</td>
        <td bgcolor="#FFFFFF" class="title"><input type="radio" name="lxbm_bool" value=1 <?php if($row["lxbm_bool"]==1){?> checked <?php }?>>
          已处理
            <input type="radio" name="lxbm_bool" value=0 <?php if($row["lxbm_bool"]==0){?> checked <?php }?>>
          未处理</td>
      </tr>
      <tr>
        <td height="28" colspan="4" align="right" bgcolor="#FFFFFF" class="title">提交时间：</td>
        <td bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php echo $row["lxbm_date"];?></td>
      </tr>
      <tr>
        <td height="29" colspan="4" align="right" bgcolor="#FFFFFF" class="title">&nbsp;</td>
        <td bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" value="更改信息"></td>
      </tr>
    </form>
  </table>
</div>
</BODY>
</HTML>
