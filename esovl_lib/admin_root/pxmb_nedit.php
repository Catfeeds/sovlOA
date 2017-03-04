<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>培训版企业信息列表</TITLE>
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
  if (isset($_POST["pxntitle"])){ 
  
      $sql="update pxmbnews set pxntitle='".$_POST["pxntitle"]."',pxnclass=".$_POST["pxnclass"].",pxncon='".$_POST["pxncon"]."',pxnbool=".$_POST["pxnbool"]." where pxnid=".$_POST["pxnid"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
	
      echo"<script>alert('修改成功');location.href='pxmb_nlist.php';</script>";	  
	  }else{
	  echo $sql;
	  exit("更新失败! 错误信息为:".mysql_error());
	  }
  }
  
      $sql="select * from pxmbnews where pxnid=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	  $row=mysql_fetch_assoc($rs);
	  }

include('fckeditor/fckeditor.php');
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('pxncon');
$oFCK->BasePath   = $sBasePath ;
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">培训版企业信息：添加，修改介绍企业相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><A href="pxmb_nadd.php">添加培训模板新闻信息</A> | <A href="pxmb_nlist.php">查看培训模板新闻信息</A> </td>
  </tr>
</table>
<br>
<div class="s_info">
  <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
    <form name="formnews" method="post" onSubmit="return pxnewsset()" action="">
      <tr>
        <td colspan="5" class="mian_right_box_title_01">【编辑培训版新闻信息】</td>
      </tr>
      <tr>
        <td height="40" colspan="4" align="right" bgcolor="#FFFFFF" class="title">选择新闻分类：</td>
        <td width="919" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><input name="pxnid" value="<?php echo $_GET["id"]?>" type="hidden"><select name="pxnclass">
      
     <?php 
      $sql="select * from pxmbclass";
	  $rs=mysql_query($sql,$conn);
	  if (mysql_num_rows($rs)>=1){
	  while ($rw=mysql_fetch_array($rs,MYSQL_ASSOC)){
      ?>
            <option value="<?php echo $rw["pxn_id"]?>" <?php if($rw["pxn_id"]==$row["pxnclass"]){?> selected <?php }?>><?php echo $rw["pxn_class"]?></option>
            <?php
          }
		  }?>
          </select>
        <span id="ncl">*</span> </td>
      </tr>
      <tr>
        <td height="38" colspan="4" align="right" bgcolor="#FFFFFF" class="title">信息标题：</td>
        <td width="919" bgcolor="#FFFFFF" class="title"><input type="text" name="pxntitle" id="pxntitle" value="<?php echo $row["pxntitle"]?>" maxlength="40" style="width:300px;"/>
            <span id="ntil">*</span></td>
      </tr>
      <tr>
        <td height="56" colspan="4" align="right" bgcolor="#FFFFFF" class="title">信息内容：</td>
        <td bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
		<?php 
		$oFCK->Value  = $row["pxncon"];
		$oFCK->Create();
		?></td>
      </tr>
      <tr>
        <td height="36" colspan="4" align="right" bgcolor="#FFFFFF" class="title">是否推荐：</td>
        <td bgcolor="#FFFFFF" class="title"><input type="radio" name="pxnbool" value="1" <?php if($row["pxnbool"]==1){?> checked <?php }?>>
          是
          <input type="radio" name="pxnbool" value="0" <?php if($row["pxnbool"]==0){?> checked <?php }?>>
          否</td>
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
