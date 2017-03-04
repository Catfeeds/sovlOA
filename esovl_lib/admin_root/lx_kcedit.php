<?php include("../conn.php");?>
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>编辑留学开课信息</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
<?php
 $sql="select * from lxschool order by lxs_id asc";
 $rs=mysql_query($sql,$conn);
?>
<script language = "JavaScript">
var onecount;
var threecount;
onecount=0;
subcat = new Array();
<?php 
   $count = 0;
   while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
?>
subcat[<?=$count?>] = new Array("<?=$row["lxs_name"]?>","<?=$row["lxs_gjid"]?>","<?=$row["lxs_id"]?>");
<?php
        $count = $count + 1;
   }
?>
		
$onecount=<?=$count?>;

function changelocation(locationid)
    {
    document.lxkkform.lxk_sid.length = 0; 
    var locationid=locationid;
    var i;
    for (i=0;i < $onecount; i++)
        {
            if (subcat[i][1] == locationid)
            { 
             document.lxkkform.lxk_sid.options[document.lxkkform.lxk_sid.length] = new Option(subcat[i][0], subcat[i][2]);
            }        
        }                 
    }    
 
-->
</script>
</HEAD>

<script type="text/javascript" src="lgHttp.js"></script>
<script>
function lxkaike(){
	 if(document.lxkkform.lxk_gjid.value==""){
	alert('请选择国家!');
	document.lxkkform.lxk_gjid.focus();
	return false;
	} 
	
	 if(document.lxkkform.lxk_sid.value==""){
	alert('请选择学校!');
	document.lxkkform.lxk_sid.focus();
	return false;
	} 

  if(document.lxkkform.lxk_title.value==""){
	alert('请填写学校名称!');
	document.lxkkform.lxk_title.focus();
	return false;
	}
	
	 if(document.lxkkform.lxk_zy.value==""){
	alert('请填写专业名称!');
	document.lxkkform.lxk_zy.focus();
	return false;
	}
	
 if(document.lxkkform.lxk_pic.value==""){
	alert('请上传Banner图片!');
	document.lxkkform.lxk_pic.focus();
	return false;
	}	
	}	

</script>
<BODY>
<?php

if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}
  if (isset($_POST["lxk_title"])){  
      $sql="update lxkkinfo set lxk_gjid=".$_POST["lxk_gjid"].",lxk_sid=".$_POST["lxk_sid"].",lxk_title='".$_POST["lxk_title"]."',lxk_zy='".$_POST["lxk_zy"]."',lxk_pic='".$_POST["lxk_pic"]."',lxk_con='".$_POST["lxk_con"]."',lxk_xuefei='".$_POST["lxk_xuefei"]."',lxk_tjbool='".$_POST["lxk_tjbool"]."' where lxk_id=".$_POST["lxk_id"];

	  $rs=mysql_query($sql,$conn);
	  if ($rs){	
      echo"<script>alert('修改成功');location.href='lx_kclist.php';</script>";
	  }else{	  
	  exit("更新失败! 错误信息为:".mysql_error());
	  }
  }
  
      $sql="select * from lxkkinfo where lxk_id=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	  $row=mysql_fetch_assoc($rs);
	  }
include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('lxk_con') ;
$oFCK->BasePath   = $sBasePath ;
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">留学开课信息：添加，修改介绍企业相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="lx_kcadd.php">添加留学开课信息</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="lx_kclist.php" >查看留学开课信息</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
  <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
    <form name="lxkkform" method="post" onSubmit="return lxkaike()" action="">
      <tr>
        <td colspan="5" class="mian_right_box_title_01">【编辑留学开课信息】</td>
      </tr>
	  <tr>
	  <td width="392" height="32" align="right" bgcolor="#FFFFFF" class="title">选择国家：</td>
	  <td width="128" colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
  <select name="lxk_gjid" onChange="changelocation(document.lxkkform.lxk_gjid.options[document.lxkkform.lxk_gjid.options.selectedIndex].value)">
   <?php
	  $sq0="select * from lxgjclass";
	  $rs0=mysql_query($sq0,$conn);	 
	     if(mysql_num_rows($rs0)>=1){
		     while ($row0=mysql_fetch_array($rs0,MYSQL_ASSOC)){
	?>
	 <option value="<?=$row0["lx_gjid"]?>" <?php if($row0["lx_gjid"]==$row["lxk_gjid"]){echo"selected";}?>><?=$row0["lx_gjcl"]?></option>
   <?php }}?>       
  </select><span id="lxgjid">*</span></td>
	  <td width="812" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">留学学校：<span class="title" style="padding-left:12px;">
	    <input type="hidden" name="lxk_id" value="<?=$_GET["id"]?>">
        <select name="lxk_sid">
          <?php 
      $sql_1="select * from lxschool where lxs_gjid=".$row["lxk_gjid"];
	  $rs_1=mysql_query($sql_1,$conn);
	  if (mysql_num_rows($rs_1)>=1){
	  while ($row_1=mysql_fetch_array($rs_1,MYSQL_ASSOC)){
      ?>
          <option value="<?php echo $row_1["lxs_id"]?>" <?php if ($row_1["lxs_id"]==$row["lxk_sid"]){echo "selected";}?>><?php echo $row_1["lxs_name"]?></option>
          <?php }}?>
        </select>
        <span id="p_xxxz">*</span></span></td>
	  </tr>
	  <tr>
	    <td height="3" align="right" bgcolor="#FFFFFF" class="title">留学图片：</td>
	    <td colspan="2" bgcolor="#FFFFFF" class="title" ><input type="text" name="lxk_pic" value="<?=$row["lxk_pic"]?>" style="width:210px;" readonly/>
          <input name="button" type="button" class="go" onClick="window.open('up2.php?formname=lxkkform&editname=lxk_pic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传图片" />
        <span id="logdex">*</span><span style="color:#999"> 尺寸(px)：245x188</span></td>
      </tr>
	  <tr>
	    <td height="38" align="right" bgcolor="#FFFFFF" class="title">开班名称：</td>
	    <td colspan="2" bgcolor="#FFFFFF" class="title">
        <input type="text" name="lxk_title" value="<?=$row["lxk_title"]?>" maxlength="100" style="width:300px;"/><span id="p_kbmc">*</span></td>
      </tr>
	  <tr>
	    <td height="14" align="right" bgcolor="#FFFFFF" class="title">专业名称：</td>
	    <td colspan="2" bgcolor="#FFFFFF" class="title"><input type="text" name="lxk_zy" value="<?=$row["lxk_zy"]?>" maxlength="100" style="width:300px;"/><span id="lxktitle">*</span></td>
      </tr>
	  <tr>
	    <td height="56" align="right" bgcolor="#FFFFFF" class="title">专业介绍：</td>
        <td colspan="2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
		<?php 
		$oFCK->Value  = $row["lxk_con"];
		$oFCK->Create();
		?></td>
    </tr>
     <tr>
	    <td height="7" align="right" bgcolor="#FFFFFF" class="title">学费：</td>
	    <td colspan="2" bgcolor="#FFFFFF" class="title"><input type="text" name="lxk_xuefei" maxlength="100" value="<?=$row["lxk_xuefei"]?>" style="width:100px;"/></td>
      </tr>
    <tr>
	    <td height="14" align="right" bgcolor="#FFFFFF" class="title">是否推荐：</td>
        <td colspan="2" bgcolor="#FFFFFF" class="title">
        <input type="radio" name="lxk_tjbool" value=1 <?php if($row["lxk_tjbool"]==1){echo "checked";}?>>
        是
        <input type="radio" name="lxk_tjbool" value=0 <?php if($row["lxk_tjbool"]==0){echo "checked";}?>> 
        否
</td>
    </tr>
      <tr>
        <td height="14" colspan="1" align="right" bgcolor="#FFFFFF" class="title">&nbsp;</td>
        <td colspan="2" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" value="更改信息"></td>
      </tr>
    </form>
  </table>
</div>
</BODY>
</HTML>
