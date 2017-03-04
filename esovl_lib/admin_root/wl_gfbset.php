<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>基本信息设置</title>
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
$mid=$_GET['id'];
if ($mid==""){
	exit;
}
	
if (isset($_POST["z_bottom1"])){

$sql="update web_step set z_bottom1='".$_POST["z_bottom1"]."',z_bottom1_link='".$_POST["z_bottom1_link"]."',z_bottom2='".$_POST["z_bottom2"]."',z_bottom2_link='".$_POST["z_bottom2_link"]."',z_bottom3='".$_POST["z_bottom3"]."',z_bottom3_link='".$_POST["z_bottom3_link"]."',z_bottom4='".$_POST["z_bottom4"]."',z_bottom4_link='".$_POST["z_bottom4_link"]."',z_bottom5='".$_POST["z_bottom5"]."',z_bottom5_link='".$_POST["z_bottom5_link"]."' where z_id=".$_POST["mid"];

          $rs=mysql_query($sql,$conn);
			if ($rs){
			echo "<script>alert('信息设置成功!!');</script>";
			}else{
			exit("更新出现错误，请检查重试");
			}
	        //mysql_free_result($rs);
//			echo mysql_error();
}
		$sql="select * from web_step where z_id='$mid'";
		$rs=mysql_query($sql,$conn);
		
		if (mysql_num_rows($rs)>=1){		
		    $row=mysql_fetch_array($rs,MYSQL_ASSOC);
		
			 $z_title=$row["z_title"];
			 $z_keyword=$row["z_keyword"];
			 $z_contant=$row["z_contant"];
			 $z_banner=$row["z_banner"];	
			 $z_bmtj=$row["z_bmtj"];
			 $z_tel=$row["z_tel"];
			  $z_beizhu=$row["beizhu"];
			  //没有的字段请直接用$row[""]提取
			
		  }
include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('z_bmtj') ;
$oFCK->BasePath   = $sBasePath ;
?>
<div class="mian_right">
        	<div class="mian_right_box">
            <div class="mian_right_box00">
            	<div class="mian_right_box_title">
                    <div class="mian_right_box_title_01"><?php echo $z_beizhu;?>信息设置</div>
                	<div class="mian_right_box_title_02"></div>
                </div>
                <div class="mian_right_box_list">
                	<div class="mian_right_box_list00">
                    	<div class="mian_right_box_list_title">
                        	<dl>
                            <dt><img src="images/right_left01bg.jpg" /></dt>
                       	    <dd style="float:left; background:#fff; margin-left:0px;"><?php echo $z_beizhu;?>基本信息</dd>
                            <dd><img src="images/right_right01bg.jpg" /></dd>
                            </dl>
                        </div>
                        <div class="mian_right_box_list_text1">
                          <table width="100%" height="207" border="0" cellpadding="1" cellspacing="1" bgcolor="#C8D2F0">
						  <form id="formset0" name="formset0" method="post" onsubmit="return xlset()" action="">
                            <tr>
                              <td width="18" rowspan="6" align="center" valign="middle" bgcolor="#ffffff" style="color:red; width:18px; letter-spacing:10px; font-weight:bold"><?php echo $z_beizhu;?><input name="mid" type="hidden" value="<?php echo $mid;?>"/></td>
                             
                            </tr>
                            <tr>
						      <td width="259" align="right" bgcolor="#FFFFFF">首页底部广告一：</td>
				<td width="1054" bgcolor="#FFFFFF"><input type="text" name="z_bottom1" value="<?php echo $row["z_bottom1"];?>" style="width:210px;" readonly="readonly"/>
                                 <input name="button2" type="button" class="go" onclick="window.open('up2.php?formname=formset0&editname=z_bottom1&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传广告图" />                    <span style="color:#999"> 尺寸(px)：210x149</span> 广告链接：
<input name="z_bottom1_link" type="text" value="<?php echo $row["z_bottom1_link"];?>" />
                                <span style="color:#999">http://</span>                               </td>
						    </tr>
							 <tr>
							   <td height="38" align="right" bgcolor="#FFFFFF">首页底部广告二：</td>
							   <td bgcolor="#FFFFFF"><input type="text" name="z_bottom2" value="<?php echo $row["z_bottom2"];?>" style="width:210px;" readonly="readonly"/>
							     <input name="button22" type="button" class="go" onclick="window.open('up2.php?formname=formset0&editname=z_bottom2&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传广告图" />							     <span style="color:#999">尺寸(px)：210x149</span> 广告链接：<input name="z_bottom2_link" type="text" value="<?php echo $row["z_bottom2_link"];?>" />
                                 <span style="color:#999">http://</span></td>
						    </tr>
							 <tr>
							   <td height="36" align="right" bgcolor="#FFFFFF">首页底部广告三：</td>
							   <td bgcolor="#FFFFFF"><input type="text" name="z_bottom3" value="<?php echo $row["z_bottom3"];?>" style="width:210px;" readonly="readonly"/>
                                 <input name="button23" type="button" class="go" onclick="window.open('up2.php?formname=formset0&editname=z_bottom3&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传广告图" />                                 <span style="color:#999">尺寸(px)：210x149</span> 广告链接：<input name="z_bottom3_link" type="text" value="<?php echo $row["z_bottom3_link"];?>" />
                                 <span style="color:#999">http://</span></td>
						    </tr>
							 <tr>
							   <td height="14" align="right" bgcolor="#FFFFFF">首页底部广告四：</td>
							   <td bgcolor="#FFFFFF"><input type="text" name="z_bottom4" value="<?php echo $row["z_bottom4"];?>" style="width:210px;" readonly="readonly"/>
                                 <input name="button232" type="button" class="go" onclick="window.open('up2.php?formname=formset0&editname=z_bottom4&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传广告图" />                                 <span style="color:#999"> 尺寸(px)：210x149</span> 广告链接：<input name="z_bottom4_link" type="text" value="<?php echo $row["z_bottom4_link"];?>" />
<span style="color:#999">http://</span></td>
						    </tr>
							 <tr>
							   <td height="31" align="right" bgcolor="#FFFFFF">内页右边广告：</td>
							   <td bgcolor="#FFFFFF"><input type="text" name="z_bottom5" value="<?php echo $row["z_bottom5"];?>" style="width:210px;" readonly="readonly"/>
                                 <input name="button" type="button" class="go" onclick="window.open('up2.php?formname=formset0&amp;editname=z_bottom5&amp;uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传广告图" />
                                 <span style="color:#999"> 尺寸(px)：222x120</span> 广告链接：
                                 <input name="z_bottom5_link" type="text" value="<?php echo $row["z_bottom5_link"];?>" />
                               <span style="color:#999">http://</span></td>
						    </tr>
							 <tr>
							   <td colspan="2" align="right" bgcolor="#FFFFFF">&nbsp;</td>
							   <td bgcolor="#FFFFFF"><input name="submitSaveEdit" type="submit" value="保存<?php echo $z_beizhu;?>基本信息" /></td>
						    </tr>
						  </form>	
                          </table>
                      </div>
                    </div>
                    
              </div>
            </div>
            </div>
</div>

</body>
</html>
