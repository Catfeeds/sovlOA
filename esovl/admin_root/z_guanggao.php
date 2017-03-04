<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>广告信息列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
</HEAD>
<?php include("../conn.php");?>
<script type="text/javascript" src="lgHttp.js"></script>
<body>
<?php 
if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}
if (isset($_POST["g_name"])){
//echo $_POST["g_name"];
$sql="insert into guanggao set g_name='".$_POST["g_name"]."',g_keyword='".$_POST["g_keyword"]."',g_con='".$_POST["g_con"]."',g_website='".$_POST["g_website"]."',g_pic='".$_POST["g_pic"]."',g_date='".$_POST["g_date"]."'";
          $rs=mysql_query($sql,$conn);
			if ($rs){
			echo "<script>alert('成功添加一条广告!!');location.href='GuangGaoList.php';</script>";
			}else{
			exit("添加出现错误，错误信息为：".mysql_error());
			}
		//mysql_free_result($rs);//释放资源
}		
include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('g_con') ;
$oFCK->BasePath   = $sBasePath ;
?>
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">广告信息：添加，修改介绍企业相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="z_infoadd.php">添加广告信息</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="GuangGaoList.php" >查看广告信息</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" height="259" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="formgg" method="post" onSubmit="return ggset()" action="">
  <tr>
    <td colspan="5" class="mian_right_box_title_01">【添加广告信息】</td>
	</tr>
	   <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">广告名称：</td>
                              <td width="917" bgcolor="#FFFFFF"><input type="text" name="g_name" id="g_name" maxlength="40" style="width:300px;"/>
                                <span id="gname">*</span></td>
      </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">广告关键词：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="g_keyword" id="g_keyword" maxlength="140" style="width:300px;"/>
                                <span style="color:#999"> 优化作用，140字以内。</span></td>
                            </tr>
                           
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">网　　址：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="g_website" value="http://" maxlength="40"/> <span style="color:#999"> 如：http://www.baidu.com/</span></td>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">首页展示图：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="g_pic" style="width:210px;" readonly/>
<input type="button" class="go" onClick="window.open('up2.php?formname=formgg&editname=g_pic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传小图" />
                                <span id="gpic">*</span><span style="color:#999"> 尺寸(px)：150x150</span>
							  </td>
                            </tr>
							 <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">广告详情：</td>
                              <td bgcolor="#FFFFFF"><?php $oFCK->Create();?>
                              <span style="color:#999"> 填写广告信息描述。</span></td>
                            </tr>
							 <tr>
                              <td align="right" bgcolor="#FFFFFF">提交时间：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="g_date" value="<?php echo date("Y-m-d H:i:s");?>" style="width:210px;" readonly/></td>
                            </tr>
							 <tr>
							   <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
							   <td bgcolor="#FFFFFF"><input name="submitSaveEdit" type="submit" value="保存广告信息设置" />
						         <input type="reset" name="redel" value="重填" />
					           (后期根据需要调整)</td>
						    </tr>

  </form>
</table>
</div>
</BODY>
</HTML>
