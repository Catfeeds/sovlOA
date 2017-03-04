<?php include("../conn.php");?>
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>师生信息列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
</HEAD>
<script type="text/javascript" src="lgHttp.js"></script>
<script>

function tsset(){//index-teacher
	
	if(document.tecform.ts_name.value==0){
	document.getElementById("tname").innerHTML="<font color=red>&times;请填写师生姓名!</font>";
	document.tecform.ts_name.focus();
	return false;
	}else{
		  document.getElementById("tname").innerHTML="<font color=green><b>√</b></font>";
		  }
	
	if(document.tecform.ts_zy.value==0){
	document.getElementById("tszy").innerHTML="<font color=red>&times;请填写专业!</font>";
	document.tecform.ts_zy.focus();
	return false;
	}else{
		  document.getElementById("tszy").innerHTML="<font color=green><b>√</b></font>";
		  }
   	
	if(document.tecform.ts_pic.value==""){
	document.getElementById("tpic").innerHTML="<font color=red>&times;请上传照片!</font>";
	document.tecform.ts_pic.focus();
	return false;
	}else{
	document.getElementById("tpic").innerHTML="<font color=green><b>√</b></font>";
	}
		  
}
</script>
<body>
<?php 
if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}
if (isset($_POST["ts_name"])){
//echo $_POST["g_name"];
$sql="insert into tsfencai set ts_name='".$_POST["ts_name"]."',s_name='".$_SESSION['mbsname']."',ts_class='".$_POST["ts_class"]."',ts_zy='".$_POST["ts_zy"]."',ts_info='".$_POST["ts_info"]."',ts_pic='".$_POST["ts_pic"]."',ts_bool=".$_POST["ts_bool"].",ts_date='".$_POST["ts_date"]."'";
          $rs=mysql_query($sql,$conn);
			if ($rs){
			echo "<script>alert('成功添加一条师生信息!!');location.href='mb_tslist.php';</script>";
			}else{
			exit("添加出现错误，错误信息为：".mysql_error());
			}
		//mysql_free_result($rs);//释放资源
}		
include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('ts_info') ;
$oFCK->BasePath   = $sBasePath ;
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_rights_box_title_01" style="text-align:left;color:white;">师生信息：添加，修改介绍相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="mb_tsadd.php">添加师生信息</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="mb_tslist.php" >查看师生信息</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" height="266" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="tecform" method="post" onSubmit="return tsset()" action="">
  <tr>
    <td colspan="5" class="mian_rights_box_title_01">【添加师生信息】</td>
	</tr>
	   <tr>
	  <td height="27" align="right" bgcolor="#FFFFFF">类　　别：</td>
	  <td width="917" bgcolor="#FFFFFF"><input name="ts_class" type="radio" value="teacher" checked>
	    教师<input type="radio" name="ts_class" value="student">学生</td>
      </tr>
	   <tr>
	     <td height="27" align="right" bgcolor="#FFFFFF">师生姓名：</td>
         <td width="917" bgcolor="#FFFFFF"><input type="text" name="ts_name" id="ts_name" maxlength="40" style="width:200px;"/>
         <span id="tname">*</span></td>
      </tr>
	   <tr>
	     <td height="27" align="right" bgcolor="#FFFFFF">专　　业：</td>
	     <td bgcolor="#FFFFFF"><input type="text" name="ts_zy" id="ts_zy" maxlength="20" style="width:200px;"/>
         <span id="tszy">*</span></td>
      </tr>
	  
                            <tr>
                              <td height="36" align="right" bgcolor="#FFFFFF">师生照片：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="ts_pic" style="width:210px;" readonly/>
<input type="button" class="go" onClick="window.open('up2.php?formname=tecform&editname=ts_pic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传小图" />
                                <span id="tpic">*</span><span style="color:#999"> 尺寸(px)：150x150</span>							  </td>
                            </tr>
							 <tr>
							   <td height="26" align="right" bgcolor="#FFFFFF">师生信息：</td>
                               <td bgcolor="#FFFFFF"><?php $oFCK->Create();?></td></tr>
							 <tr>
                              <td height="28" align="right" bgcolor="#FFFFFF">首页推荐：</td>
                              <td bgcolor="#FFFFFF"><input type="radio" name="ts_bool" value="1">
                                是
                                <input type="radio" name="ts_bool" value="0" checked>
                                否</td>
                            </tr>
						<tr>
						<td height="29" align="right" bgcolor="#FFFFFF">提交时间：</td>
						<td bgcolor="#FFFFFF"><input type="text" name="ts_date" value="<?php echo date("Y-m-d H:i:s");?>" style="width:210px;" readonly/></td>
						</tr>
							<tr>
							<td align="right" bgcolor="#FFFFFF">&nbsp;</td>
							<td bgcolor="#FFFFFF"><input name="submitSaveEdit" type="submit" value="保存师生信息设置" />
					         <input type="reset" name="redel" value="重填" /></td></tr></form></table>
</div>
</BODY>
</HTML>
