<?php include("../conn.php");?>
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>编辑新闻风采</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
</HEAD>

<script type="text/javascript" src="lgHttp.js"></script>
<script>

function tsset(){//index-teacher
	
	if(document.tecform.ne_name.value==0){
	document.getElementById("nname").innerHTML="<font color=red>&times;请填写新闻姓名!</font>";
	document.tecform.ne_name.focus();
	return false;
	}else{
		  document.getElementById("nname").innerHTML="<font color=green><b>√</b></font>";
		  }
	
	   	
	if(document.tecform.ne_pic.value==""){
	document.getElementById("npic").innerHTML="<font color=red>&times;请上传图片!</font>";
	document.tecform.ne_pic.focus();
	return false;
	}else{
	document.getElementById("npic").innerHTML="<font color=green><b>√</b></font>";
	}
		  
}
</script>
<body>
<?php 
if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}
if (isset($_POST["ne_name"])){

$sql="update tpnews set ne_name='".$_POST["ne_name"]."',s_name='".$_SESSION["mbsname"]."',ne_info='".$_POST["ne_info"]."',ne_pic='".$_POST["ne_pic"]."',ne_date='".$_POST["ne_date"]."',ne_bool=".$_POST["ne_bool"]." where ne_id=".$_POST["ne_id"];
          $rs=mysql_query($sql,$conn);
			if ($rs){
			echo "<script>alert('更新成功!!');location.href='mb_newslist.php';</script>";
			}else{
			exit("更新出现错误，错误信息为：".mysql_error());
			}
		//mysql_free_result($rs);//释放资源
}	

    $sql="select * from tpnews where ne_id=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	  $row=mysql_fetch_assoc($rs);
	  }
	  	
include('fckeditor/fckeditor.php');
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('ne_info');
$oFCK->BasePath   = $sBasePath ;
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_righne_box_title_01" style="text-align:left;color:white;">新闻风采：编辑，修改介绍相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="mb_newsadd.php">编辑新闻风采</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="mb_newslist.php" >查看新闻风采</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" height="259" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="tecform" method="post" onSubmit="return teset()" action="">
  <tr>
    <td colspan="5" class="mian_righne_box_title_01">【编辑新闻风采】</td>
	</tr>
	   <tr>
	  <td align="right" bgcolor="#FFFFFF">新闻姓名：</td>
	  <td width="917" bgcolor="#FFFFFF"><input type="hidden" name="ne_id" id="ne_id" value="<?php echo $_GET["id"]?>"/><input type="text" name="ne_name" id="ne_name" value="<?php echo $row["ne_name"]?>" maxlength="40" style="width:300px;"/><span id="tname">*</span></td>
      </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">新闻照片：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="ne_pic" value="<?php echo $row["ne_pic"]?>" style="width:210px;" readonly/>
<input type="button" class="go" onClick="window.open('up2.php?formname=tecform&editname=ne_pic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传小图" />
                                <span id="tpic">*</span><span style="color:#999"> 尺寸(px)：150x150</span></td>
                            </tr>
						 <tr>
						  <td height="28" align="right" bgcolor="#FFFFFF">首页推荐：</td>
						  <td bgcolor="#FFFFFF"><input type="radio" name="ne_bool" value="1" <?php if ($row["ne_bool"]==1){?>checked<?php }?>>
							是
							<input type="radio" name="ne_bool" value="0" <?php if ($row["ne_bool"]==0){?>checked<?php }?>>
							否</td>
						 </tr>
							 <tr>
							   <td align="right" bgcolor="#FFFFFF">课程信息：</td>
                               <td bgcolor="#FFFFFF">
							   <?php 
							   $oFCK->Value  = $row["ne_info"];
							   $oFCK->Create();
							   ?></td></tr>
							 <tr>
                              <td align="right" bgcolor="#FFFFFF">更新时间：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="ne_date" value="<?php echo date("Y-m-d H:i:s");?>" style="width:210px;" readonly/></td>
                            </tr>
							 <tr>
							   <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
							   <td bgcolor="#FFFFFF"><input name="submitSaveEdit" type="submit" value="保存图片新闻设置" />
					           <input type="reset" name="redel" value="重填" /></td>
						    </tr>
  </form>
</table>
</div>
</BODY>
</HTML>
