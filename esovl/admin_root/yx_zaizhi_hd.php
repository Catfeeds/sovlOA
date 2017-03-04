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
if (isset($_POST["hd_pic1"])){
//echo $_POST["z_name"];
$sql="update yx_hd set hd_pic1='".$_POST["hd_pic1"]."',hd_link1='".$_POST["hd_link1"]."',hd_pic2='".$_POST["hd_pic2"]."',hd_link2='".$_POST["hd_link2"]."',hd_pic3='".$_POST["hd_pic3"]."',hd_link3='".$_POST["hd_link3"]."',hd_pic4='".$_POST["hd_pic4"]."',hd_link4='".$_POST["hd_link4"]."',hd_title1='".$_POST["hd_title1"]."',hd_title2='".$_POST["hd_title2"]."',hd_title3='".$_POST["hd_title3"]."',hd_title4='".$_POST["hd_title4"]."' where hd_id=4";
          $rs=mysql_query($sql,$conn);
			if ($rs){
			echo "<script>alert('信息设置成功!!');</script>";
			}else{
			exit("更新出现错误，请检查重试");
			}
	        //mysql_free_result($rs);
//			echo mysql_error();
}
		$sql="select hd_pic1,hd_link1,hd_pic2,hd_link2,hd_pic3,hd_link3,hd_pic4,hd_link4,hd_title1,hd_title2,hd_title3,hd_title4 from yx_hd where hd_id=4";
		$rs=mysql_query($sql,$conn);
		
		if (mysql_num_rows($rs)>=1){
		    $row=mysql_fetch_assoc($rs);
					$hd_pic1=$row["hd_pic1"];
					$hd_link1 =$row["hd_link1"];
					$hd_pic2=$row["hd_pic2"];
					$hd_link2 =$row["hd_link2"];
					$hd_pic3=$row["hd_pic3"];
					$hd_link3 =$row["hd_link3"];
					$hd_pic4=$row["hd_pic4"];
					$hd_link4 =$row["hd_link4"];
					$hd_title1=$row["hd_title1"];
					$hd_title2=$row["hd_title2"];
					$hd_title3=$row["hd_title3"];
					$hd_title4=$row["hd_title4"];
		  }
		  mysql_free_result($rs);
?>
<div class="mian_right">
        	<div class="mian_right_box">
            <div class="mian_right_box00">
            	<div class="mian_right_box_title">
                    <div class="mian_right_box_title_01">研修基本信息设置</div>
                	<div class="mian_right_box_title_02"></div>
                </div>
                <div class="mian_right_box_list">
                	<div class="mian_right_box_list00">
                    	<div class="mian_right_box_list_title">
                        	<dl>
                            <dt><img src="images/right_left01bg.jpg" /></dt>
                       	    <dd style="float:left; background:#fff; margin-left:0px;">研修幻灯图片设置</dd>
                            <dd><img src="images/right_right01bg.jpg" /></dd>
                            </dl>
                        </div>
                        <div class="mian_right_box_list_text">
                          <table width="1097" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#C8D2F0">
						  <form id="formset" name="formset" method="post" onsubmit="return webpic()" action="">
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">幻灯图片地址1：</td>
                              <td width="917" bgcolor="#FFFFFF"><input type="text" name="hd_pic1" value="<?php echo $hd_pic1;?>" style="width:210px;" readonly/>
<input  type="button" class="go" onclick="window.open('up2.php?formname=formset&editname=hd_pic1&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传图片1" />
                                <span id="pc1">*</span><span style="color:#999"> 尺寸(px)：400x210</span>
								<span style="margin-left:20px; position:relative;" onmouseover="document.getElementById('show1').style.display=''" onmouseout="document.getElementById('show1').style.display='none'">预览<div id="show1" style="width:50px;height:50px; display:none; position:absolute; top:-120px;left:-73px;"><img src="<?php echo $hd_pic1;?>" width="186" height="113" /></div>
								</span></td>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">链接地址1：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="hd_link1" value="<?php echo $hd_link1;?>" maxlength="120" style="width:210px"/>
                              <span id="icpdex">*</span><span style="color:#999"> 使用绝对地址：http://</span></td>
                            </tr>
                                                        <tr>
                              <td align="right" bgcolor="#FFFFFF">幻灯片标题1：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="hd_title1" value="<?php echo $hd_title1;?>" maxlength="120" style="width:210px"/>
                             </td>
                            </tr>
							<tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">幻灯图片地址2：</td>
                              <td width="917" bgcolor="#FFFFFF"><input type="text" name="hd_pic2" value="<?php echo $hd_pic2;?>" style="width:210px;" readonly/>
                                <input type="button" class="go" onclick="window.open('up2.php?formname=formset&amp;editname=hd_pic2&amp;uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传图片2" />
                                <span id="pc2">*</span><span style="color:#999"> 尺寸(px)：400x210</span>
								<span style="margin-left:20px; position:relative;" onmouseover="document.getElementById('show2').style.display=''" onmouseout="document.getElementById('show2').style.display='none'">预览<div id="show2" style="width:50px;height:50px; display:none; position:absolute; top:-120px;left:-73px;"><img src="<?php echo $hd_pic2;?>" width="186" height="113" /></div>
								</span></td>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">链接地址2：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="hd_link2" value="<?php echo $hd_link2;?>" maxlength="120" style="width:210px"/>
                              <span id="icpdex">*</span><span style="color:#999"> 使用绝对地址：http://</span></td>
                            </tr>
                                                        <tr>
                              <td align="right" bgcolor="#FFFFFF">幻灯片标题2：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="hd_title2" value="<?php echo $hd_title2;?>" maxlength="120" style="width:210px"/>
                              </td>
                            </tr>
							<tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">幻灯图片地址3：</td>
                              <td width="917" bgcolor="#FFFFFF"><input type="text" name="hd_pic3" value="<?php echo $hd_pic3;?>" style="width:210px;" readonly/>
                                <input name="button" type="button" class="go" onclick="window.open('up2.php?formname=formset&editname=hd_pic3&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传图片3" />
                                <span id="pc3">*</span><span style="color:#999"> 尺寸(px)：400x210</span>
								<span style="margin-left:20px; position:relative;" onmouseover="document.getElementById('show3').style.display=''" onmouseout="document.getElementById('show3').style.display='none'">预览<div id="show3" style="width:50px;height:50px; display:none; position:absolute; top:-120px;left:-73px;"><img src="<?php echo $hd_pic3;?>" width="186" height="113" /></div>
								</span></td>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">链接地址3：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="hd_link3" value="<?php echo $hd_link3;?>" maxlength="120" style="width:210px"/>
                              <span id="icpdex">*</span><span style="color:#999"> 使用绝对地址：http://</span></td>
                            </tr>
                                                        <tr>
                              <td align="right" bgcolor="#FFFFFF">幻灯片标题3：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="hd_title3" value="<?php echo $hd_title3;?>" maxlength="120" style="width:210px"/>
                             </td>
                            </tr>
							<tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">幻灯图片地址4：</td>
                              <td width="917" bgcolor="#FFFFFF"><input type="text" name="hd_pic4" value="<?php echo $hd_pic4;?>" style="width:210px;" readonly/>
                                <input type="button" class="go" onclick="window.open('up2.php?formname=formset&amp;editname=hd_pic4&amp;uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传图片4" />
                                <span id="pc4">*</span><span style="color:#999"> 尺寸(px)：400x210</span>
								<span style="margin-left:20px; position:relative;" onmouseover="document.getElementById('show4').style.display=''" onmouseout="document.getElementById('show4').style.display='none'">预览<div id="show4" style="width:50px;height:50px; display:none; position:absolute; top:-120px;left:-73px;"><img src="<?php echo $hd_pic4;?>" width="186" height="113" /></div>
								</span></td>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">链接地址4：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="hd_link4" value="<?php echo $hd_link4;?>" maxlength="120" style="width:210px"/>
                              <span id="icpdex">*</span><span style="color:#999"> 使用绝对地址：http://</span></td>
                            </tr>
                                                        <tr>
                              <td align="right" bgcolor="#FFFFFF">幻灯片标题4：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="hd_title4" value="<?php echo $hd_title4;?>" maxlength="120" style="width:210px"/>
                             </td>
                            </tr>
							 <tr>
							   <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
							   <td bgcolor="#FFFFFF"><input name="submitSaveEdit" type="submit" value="保存幻灯图片信息" /></td>
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
