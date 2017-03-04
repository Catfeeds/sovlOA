<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>总站基本信息设置</title>
<link href="images/root.css" rel="stylesheet" type="text/css" />
</head>
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
$sql="update web_step set g_name='".$_POST["g_name"]."',g_title='".$_POST["g_title"]."',g_keyword='".$_POST["g_keyword"]."',g_contant='".$_POST["g_contant"]."',g_tel='".$_POST["g_tel"]."',g_fax='".$_POST["g_fax"]."',g_qq='".$_POST["g_qq"]."',g_msn='".$_POST["g_msn"]."',g_code=".$_POST["g_code"].",g_email='".$_POST["g_email"]."',g_website='".$_POST["g_website"]."',g_pic='".$_POST["g_pic"]."',g_icp='".$_POST["g_icp"]."',g_address='".$_POST["g_address"]."'";
          $rs=mysql_query($sql,$conn);
			if ($rs){
			echo "<script>alert('信息设置成功!!');</script>";
			}else{
			exit("更新出现错误，请检查重试");
			}
	        //mysql_free_result($rs);
//			echo mysql_error();
}
		$sql="select * from web_step";
		$rs=mysql_query($sql,$conn);
		
		if (mysql_num_rows($rs)>=1){	
		    $row=mysql_fetch_assoc($rs);
						$g_name=$row["g_name"];
						$g_title=$row["g_title"];
						$g_keyword=$row["g_keyword"];
						$g_contant=$row["g_contant"];
						$g_tel=$row["g_tel"];
						$g_fax=$row["g_fax"];
						$g_qq=$row["g_qq"];
						$g_msn=$row["g_msn"];
						$g_code=$row["g_code"];
						$g_email=$row["g_email"];
						$g_website=$row["g_website"];
						$g_pic=$row["g_pic"];
						$g_icp=$row["g_icp"];
						$g_address=$row["g_address"];
		  }
		  mysql_free_result($rs);
?>
<div class="mian_right">
        	<div class="mian_right_box">
            <div class="mian_right_box00">
            	<div class="mian_right_box_title">
                    <div class="mian_right_box_title_01">站点基本信息设置</div>
                	<div class="mian_right_box_title_02"><a href="g_website.php">基本信息</a> | <a href="g_cpinfo.php">公司信息</a> | <a href="g_guanggao.php">广告专栏</a> | <a href="g_indexpic.php">首页图片轮播</a></div>
                </div>
                <div class="mian_right_box_list">
                	<div class="mian_right_box_list00">
                    	<div class="mian_right_box_list_title">
                        	<dl>
                            <dt><img src="images/right_left01bg.jpg" /></dt>
                       	    <dd style="float:left; background:#fff; margin-left:0px;">首页广告列表</dd>
                            <dd><img src="images/right_right01bg.jpg" /></dd>
                            </dl>
                        </div>
                        <div class="mian_right_box_list_text">
                          <table width="1097" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#C8D2F0">
						  <form id="formset" name="formset" method="post" onsubmit="return webset()" action="">
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">广告名称： </td>
                              <td width="917" bgcolor="#FFFFFF"><input type="text" name="g_name" id="g_name" value="<?php echo $g_name;?>" maxlength="40" style="width:300px;"/>
                                <span id="wzmc">*</span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">广告标题(Title)：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="g_title" id="g_title" value="<?php echo $g_title;?>" maxlength="140" style="width:300px;"/>
                                <span style="color:#999"> 优化作用，140字以内。</span></td>
                            </tr>
                           
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">网　　址：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="g_website" value="<?php echo $g_website;?>"  maxlength="40"/> <span id="wangzhi"> *</span><span style="color:#999"> 如：http://www.baidu.com/</span></td>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">首页展示图：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="g_pic" value="<?php echo $g_pic;?>" style="width:210px;" readonly/>
<input name="Submit22" type="button" class="go" onclick="window.open('up2.php','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传小图" />
                                <span id="logdex">*</span><span style="color:#999"> 尺寸(px)：165x120</span>
								<span style="margin-left:20px; position:relative;" onmouseover="document.getElementById('showlg').style.display=''" onmouseout="document.getElementById('showlg').style.display='none'">预览<div id="showlg" style="width:50px;height:50px; display:none; position:absolute; top:-120px;left:-73px;"><img src="<?php echo $g_pic;?>" width="186" height="113" /></div>
								</span></td>
                            </tr>
							 <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">广告详情：</td>
                              <td bgcolor="#FFFFFF"><textarea name="g_contant" style="width:300px;"><?php echo $g_contant;?></textarea>
                              <span style="color:#999"> 网站信息描述，200字以内。</span></td>
                            </tr>
							 <tr>
                              <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
                              <td bgcolor="#FFFFFF"><input name="submitSaveEdit" type="submit" value="保存广告信息设置" />
                               (后期根据需要调整)</td>
                            </tr>
							 <tr>
							   <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
							   <td bgcolor="#FFFFFF">&nbsp;</td>
						    </tr></form>	
                          </table>
                      </div>
                    </div>
                    
              </div>
            </div>
            </div>
</div>

</body>
</html>
