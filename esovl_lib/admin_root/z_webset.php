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
if (isset($_POST["z_name"])){
//echo $_POST["z_name"];
$sql="update web_step set z_name='".$_POST["z_name"]."',z_title='".$_POST["z_title"]."',z_keyword='".$_POST["z_keyword"]."',z_contant='".$_POST["z_contant"]."',z_tel='".$_POST["z_tel"]."',z_fax='".$_POST["z_fax"]."',z_qq='".$_POST["z_qq"]."',z_msn='".$_POST["z_msn"]."',z_code=".$_POST["z_code"].",z_email='".$_POST["z_email"]."',z_website='".$_POST["z_website"]."',z_logo='".$_POST["z_logo"]."',z_icp='".$_POST["z_icp"]."',z_address='".$_POST["z_address"]."' where z_id=0";
          $rs=mysql_query($sql,$conn);
			if ($rs){
			echo "<script>alert('信息设置成功!!');</script>";
			}else{
			exit("更新出现错误，请检查重试");
			}
//mysql_free_result($rs);
//			echo mysql_error();
}
		$sql="select * from web_step where z_id=0";
		$rs=mysql_query($sql,$conn);
		
		if (mysql_num_rows($rs)>=1){	
		    $row=mysql_fetch_assoc($rs);
						$z_name=$row["z_name"];
						$z_title=$row["z_title"];
						$z_keyword=$row["z_keyword"];
						$z_contant=$row["z_contant"];
						$z_tel=$row["z_tel"];
						$z_fax=$row["z_fax"];
						$z_qq=$row["z_qq"];
						$z_msn=$row["z_msn"];
						$z_code=$row["z_code"];
						$z_email=$row["z_email"];
						$z_website=$row["z_website"];
						$z_logo=$row["z_logo"];
						$z_icp=$row["z_icp"];
						$z_address=$row["z_address"];
		  }
		  mysql_free_result($rs);
?>
<div class="mian_right">
        	<div class="mian_right_box">
            <div class="mian_right_box00">
            	<div class="mian_right_box_title">
                    <div class="mian_right_box_title_01">站点基本信息设置</div>
                	<div class="mian_right_box_title_02"></div>
                </div>
                <div class="mian_right_box_list">
                	<div class="mian_right_box_list00">
                    	<div class="mian_right_box_list_title">
                        	<dl>
                            <dt><img src="images/right_left01bg.jpg" /></dt>
                       	    <dd style="float:left; background:#fff; margin-left:0px;">站点基本信息</dd>
                            <dd><img src="images/right_right01bg.jpg" /></dd>
                            </dl>
                        </div>
                        <div class="mian_right_box_list_text">
                          <table width="1097" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#C8D2F0">
						  <form id="formset" name="formset" method="post" onsubmit="return webset()" action="">
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">网站名称： </td>
                              <td width="917" bgcolor="#FFFFFF" ><input type="text" name="z_name" id="z_name" value="<?php echo $z_name;?>" maxlength="40" style="width:300px;"/>
                                <span id="wzmc">*</span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">首页标题(Title)：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="z_title" id="z_title" value="<?php echo $z_title;?>" maxlength="140" style="width:300px;"/>
                                <span style="color:#999"> 优化作用，140字以内。</span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">首页关键词(Keyword)：</td>
                              <td bgcolor="#FFFFFF"><textarea name="z_keyword"  style="width:300px;height:40px;"><?php echo $z_keyword;?></textarea>
                              <span style="color:#999"> 优化关键词，150字以内。</span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">首页信息描述(Description)：</td>
                              <td bgcolor="#FFFFFF"><textarea name="z_contant" style="width:300px;"><?php echo $z_contant;?></textarea>
                              <span style="color:#999"> 网站信息描述，200字以内。</span></td>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">电　　话：</td>
                              <td bgcolor="#FFFFFF"><input type="text" maxlength="13" name="z_tel" value="<?php echo $z_tel;?>" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/>
                                <span id="dianhua"> *</span><span style="color:#999"> 如：021-23561478</span></td>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">传　　真：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="z_fax" value="<?php echo $z_fax;?>" maxlength="15"/></td>
                            </tr>
                           
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">Q Q：</td>
                   <td bgcolor="#FFFFFF"><input type="text" name="z_qq"  value="<?php echo $z_qq;?>" style="width:300px;"/>
                   <span style="color:#999"> 多个QQ请用逗号隔开,请至少填写2个号码！</span></td>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">MSN：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="z_msn" value="<?php echo $z_msn;?>" maxlength="40"/><span style="color:#999"> 暂且限定一个</span></td>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">邮　　编：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="z_code" value="<?php echo $z_code;?>" onkeyup="value=value.replace(/[^\d]/g,'')" maxlength="6"/><span id="youbian"> *</span></td>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">E-MAIL：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="z_email" value="<?php echo $z_email;?>" maxlength="50"/><span id="youxiang"> *</span></td>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">网　　址：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="z_website" value="<?php echo $z_website;?>"  maxlength="40"/> <span id="wangzhi"> *</span><span style="color:#999"> 如：http://www.baidu.com/</span></td>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">首页LOGO：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="z_logo" value="<?php echo $z_logo;?>" style="width:210px;" readonly/>
                                <input name="button" type="button" class="go" onclick="window.open('up2.php?formname=formset&editname=z_logo&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传Logo" />
                                <span id="logdex">*</span><span style="color:#999"> 尺寸(px)：165x120</span>
								<span style="margin-left:20px; position:relative;" onmouseover="document.getElementById('showlg').style.display=''" onmouseout="document.getElementById('showlg').style.display='none'">预览
								<div id="showlg" style="width:50px;height:50px; display:none; position:absolute; top:-120px;left:-73px;"><img src="<?php echo $z_logo;?>" width="186" height="113" /></div>
								</span></td>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">ICP备案号：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="z_icp" value="<?php echo $z_icp;?>" maxlength="30"/>
                              <span id="icpdex">*</span></td>
                            </tr>
							<tr>
                              <td align="right" bgcolor="#FFFFFF">地　　址：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="z_address" value="<?php echo $z_address;?>" style="width:300px;"/>
                              <span id="adddex">*</span></td>
                            </tr>
							 <tr>
							   <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
							   <td bgcolor="#FFFFFF"><input name="submitSaveEdit" type="submit" value="保存基本信息设置" /></td>
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
