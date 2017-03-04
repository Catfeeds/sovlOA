<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>频道列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
</HEAD>
<?php include("../conn.php");?>
<script type="text/javascript" src="lgHttp.js"></script>
<BODY>
<?php
if (@$_COOKIE["a_class"]>1){
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}
  
  if (isset($_POST["kcedit"])){//频道值是数值型
      $sql="update pindao set pin_title='".$_POST["pin_title"]."',pin_pic1='".$_POST["pin_pic1"]."',pin_pic2='".$_POST["pin_pic2"]."',pin_pic3='".$_POST["pin_pic3"]."',pin_pic4='".$_POST["pin_pic4"]."' where pin_id=".$_POST["pin_id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('更新成功');location.href='px_pindao.php';</script>";	  
	  }else{	  
	  exit("修改失败! 错误信息为:".mysql_error());
	  }
  }
  
  if (@$_GET["action"]=="del"){//频道值是数值型

      $sql="delete from pindao where pin_id=".$_GET["pinid"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('删除成功');location.href='px_pindao.php';</script>";
	  }else{	  
	  exit("删除失败! 错误信息为:".mysql_error());
	  }
  }

  if (isset($_POST["zyadd"])){
      $sql="insert into pindao set pin_title='".$_POST["pin_title"]."',pin_pic1='".$_POST["pin_pic1"]."',pin_pic2='".$_POST["pin_pic2"]."',pin_pic3='".$_POST["pin_pic3"]."',pin_pic4='".$_POST["pin_pic4"]."'";
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	 
      echo"<script>alert('添加成功');location.href='px_pindao.php';</script>";
	  }else{	  
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  } 
?> 
<br>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
  <tr>
    <td class="mian_right_box_title_01">类别ID：</td>
	<td class="mian_right_box_title_01">类别标题：</td>
	<td width="151" class="mian_right_box_title_01">频道广1</td>
	<td width="168" class="mian_right_box_title_01">频道广2</td>
	<td width="173" class="mian_right_box_title_01">频道广3</td>
	<td width="179" class="mian_right_box_title_01">频道广4</td>

<!--	<td class="mian_right_box_title_01">大类链接：</td>-->
	<td class="mian_right_box_title_01">操作</td>
  </tr>
	<?php
	  $sql="select * from pindao order by pin_id asc";
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	     if(mysql_num_rows($rs)>=1){
		 $i=0;
		     while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
			 $i=$i+1;
			 ?>

	<form name="cform<?php echo $i?>" method="post" onSubmit="return nclass()" action="">
	<tr>
	<td width="68" align="center" bgcolor="#FFFFFF" class="title"><?php echo $row["pin_id"]?></td>	
	<td width="111" bgcolor="#FFFFFF" class="title">
	  <input name="kcedit" value="editok" type="hidden">
	  <input name="pin_id" value="<?php echo $row["pin_id"]?>" type="hidden">
	  <input type="text" name="pin_title" value="<?php echo $row["pin_title"]?>" maxlength="40" style="width:80px;"/></td>
	<td align="center" bgcolor="#FFFFFF" class="title"><input type="text" name="pin_pic1" style="width:80px;" value="<?=$row["pin_pic1"]?>" readonly/>
      <input type="button" class="go" onClick="window.open('up2.php?formname=cform<?=$i?>&editname=pin_pic1&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="换图" />
      <span style="color:#999"> </span></td>
	<td align="center" bgcolor="#FFFFFF" class="title"><input type="text" name="pin_pic2" style="width:80px;" value="<?=$row["pin_pic2"]?>" readonly/>
      <input type="button" class="go" onClick="window.open('up2.php?formname=cform<?=$i?>&editname=pin_pic2&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="换图" />
      <span style="color:#999"></span></td>
	<td align="center" bgcolor="#FFFFFF" class="title"><input type="text" name="pin_pic3" style="width:80px;" value="<?=$row["pin_pic3"]?>" readonly/>
      <input type="button" class="go" onClick="window.open('up2.php?formname=cform<?=$i?>&editname=pin_pic3&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="换图" />
      <span style="color:#999"></span></td>
	<td align="center" bgcolor="#FFFFFF" class="title"><input type="text" name="pin_pic4" style="width:80px;" value="<?=$row["pin_pic4"]?>" readonly/>
      <input type="button" class="go" onClick="window.open('up2.php?formname=cform<?=$i?>&editname=pin_pic4&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="换图" />
      <span style="color:#999"></span></td>
<!--	<td width="153" bgcolor="#FFFFFF" class="title"><input type="text" name="pb_link" id="pb_link" value="< ?php echo $row["pb_link"]?>" maxlength="40" style="width:200px;"/></td>-->
    <td width="245" bgcolor="#FFFFFF"><input type="submit" name="Submit" onClick="if(document.cform<?php echo $i;?>.pb_title.value==''){alert('标题为空');document.cform<?php echo $i;?>.pb_title.focus();return false;}" value="更新">
      　<a href="px_pindao.php?action=del&pinid=<?=$row["pin_id"]?>">删除</a></td>
	  </tr>
  </form>
  <?php
			 }
		 }
	  }
	?>
</table>
</div>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="formclass" method="post" action="">
  <tr>
    <td colspan="4" class="mian_right_box_title_01">【添加频道分类】</td>
	</tr>
	  <tr>
    <td width="175" height="0" align="right" bgcolor="#FFFFFF" class="title">新增频道：</td>
	<td bgcolor="#FFFFFF" class="title"><input name="zyadd" value="kcok" type="hidden"><input type="text" name="pin_title" id="pin_title" value="" maxlength="40" style="width:120px;"/></td>
	<!--<td width="98" bgcolor="#FFFFFF" class="title">(可选填)链接地址：</td>
	<td width="212" bgcolor="#FFFFFF" class="title"><input type="text" name="pb_link" id="pb_link" value="<?php echo $row["pb_link"]?>" maxlength="40" style="width:200px;"/></td>-->
    </tr>
	  <tr>
	    <td width="175" height="0" align="right" bgcolor="#FFFFFF" class="title">频道广告1：</td>
	    <td bgcolor="#FFFFFF" class="title"><input type="text" name="pin_pic1" style="width:210px;" readonly/>
          <input type="button" class="go" onClick="window.open('up2.php?formname=formclass&editname=pin_pic1&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传小图" />          <span style="color:#999"> 尺寸(px)：250x180</span></td>
      </tr>
	  <tr>
	    <td width="175" height="1" align="right" bgcolor="#FFFFFF" class="title">频道广告2：</td>
	    <td bgcolor="#FFFFFF" class="title"><input type="text" name="pin_pic2" style="width:210px;" readonly/>
          <input type="button" class="go" onClick="window.open('up2.php?formname=formclass&editname=pin_pic2&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传小图" />
        <span style="color:red"> 尺寸(px)：952x91</span></td>
      </tr>
	  <tr>
	    <td width="175" height="3" align="right" bgcolor="#FFFFFF" class="title">频道广告3：</td>
	    <td bgcolor="#FFFFFF" class="title"><input type="text" name="pin_pic3" style="width:210px;" readonly/>
          <input type="button" class="go" onClick="window.open('up2.php?formname=formclass&editname=pin_pic3&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传小图" /><span style="color:#999"> 尺寸(px)：277x181</span></td>
      </tr>
	  <tr>
	    <td width="175" height="8" align="right" bgcolor="#FFFFFF" class="title">频道广告4：</td>
	    <td bgcolor="#FFFFFF" class="title"><input type="text" name="pin_pic4" style="width:210px;" readonly/>
          <input type="button" class="go" onClick="window.open('up2.php?formname=formclass&editname=pin_pic4&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传小图" />          <span style="color:#999"> 尺寸(px)：277x181</span></td>
      </tr>
	  <tr>
	    <td width="175" height="16" align="right" bgcolor="#FFFFFF" class="title">&nbsp;</td>
	    <td bgcolor="#FFFFFF" class="title"><input type="submit" onClick="if(document.formclass.pb_title.value==''){alert('标题为空');document.formclass.pb_title.focus();return false;}if(document.formclass.pb_pindao.value=='0'){alert('请选择频道');document.formclass.pb_pindao.focus();return false;}" name="Submit2" value="添加"></td>
      </tr>
  </form>
</table>
</div>
</BODY>
</HTML>
