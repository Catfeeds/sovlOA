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
					
$sql="update web_step set z_name='".$_POST["z_name"]."',z_title='".$_POST["z_title"]."',z_keyword='".$_POST["z_keyword"]."',z_contant='".$_POST["z_contant"]."',z_banner='".$_POST["z_banner"]."',z_onegg='".$_POST["z_onegg"]."',z_qq='".$_POST["z_qq"]."',z_right1='".$_POST["z_right1"]."',z_right2='".$_POST["z_right2"]."',z_right3='".$_POST["z_right3"]."',z_right4='".$_POST["z_right4"]."',z_logo='".$_POST["z_logo"]."' where z_id=11";

          $rs=mysql_query($sql,$conn);
			if ($rs){
			echo "<script>alert('信息设置成功!!');</script>";
			}else{
			exit("更新出现错误，请检查重试");
			}
	        //mysql_free_result($rs);
//			echo mysql_error();
}
		$sql="select * from web_step where z_id=11";
		$rs=mysql_query($sql,$conn);
		
		if (mysql_num_rows($rs)>=1){	
		    $row=mysql_fetch_assoc($rs);
						$z_name=$row["z_name"];
						$z_title=$row["z_title"];
						$z_keyword=$row["z_keyword"];
						$z_contant=$row["z_contant"];
						
						$z_qq=$row["z_qq"];
						$z_banner=$row["z_banner"];
						$z_logo=$row["z_logo"];
						
						$z_onegg=$row["z_onegg"];
						$z_right1=$row["z_right1"];
						$z_right2=$row["z_right2"];
						$z_right3=$row["z_right3"];
						$z_right4=$row["z_right4"];
		  }
		  mysql_free_result($rs);
include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('z_onegg') ;
$oFCK->BasePath   = $sBasePath ;


$sBasePathb = 'fckeditor/';
$oFCKb = new FCKeditor('z_banner') ;
$oFCKb->BasePath   = $sBasePathb ;

$sBasePath1 = 'fckeditor/';
$oFCK1 = new FCKeditor('z_right1') ;
$oFCK1->BasePath   = $sBasePath1 ;
$sBasePath2 = 'fckeditor/';
$oFCK2 = new FCKeditor('z_right2') ;
$oFCK2->BasePath   = $sBasePath2 ;
$sBasePath3 = 'fckeditor/';
$oFCK3 = new FCKeditor('z_right3') ;
$oFCK3->BasePath   = $sBasePath3 ;
$sBasePath4 = 'fckeditor/';
$oFCK4 = new FCKeditor('z_right4') ;
$oFCK4->BasePath   = $sBasePath4 ;
?>
<div class="mian_right">
        	<div class="mian_right_box">
            <div class="mian_right_box00">
            	<div class="mian_right_box_title">
                    <div class="mian_right_box_title_01">培训基本信息设置</div>
                	<div class="mian_right_box_title_02"></div>
                </div>
                <div class="mian_right_box_list">
                	<div class="mian_right_box_list00">
                    	<div class="mian_right_box_list_title">
                        	<dl>
                            <dt><img src="images/right_left01bg.jpg" /></dt>
                       	    <dd style="float:left; background:#fff; margin-left:0px;">培训基本信息</dd>
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
                              <td align="right" bgcolor="#FFFFFF">Q Q：</td>
                   <td bgcolor="#FFFFFF"><input type="text" name="z_qq"  value="<?php echo $z_qq;?>" style="width:300px;"/>
                   <span style="color:#999"> 多个QQ请用逗号隔开,请至少填写2个号码！</span></td>
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
                              <td align="right" bgcolor="#FFFFFF">动画导航：</td>
                              <td bgcolor="#FFFFFF"> <?php
							   $oFCKb->Value  = $z_banner;
							   $oFCKb->Create();
							   ?>
                               尺寸(px)：950x120</span></td>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">培训首页广告一：</td>
                              <td bgcolor="#FFFFFF"><?php
							   $oFCK->Value  = $z_onegg;
							   $oFCK->Create();
							   ?></td>
                            </tr>
							 <tr>
                              <td align="right" bgcolor="#FFFFFF">培训首页广告二：</td>
                              <td bgcolor="#FFFFFF"><?php
							   $oFCK1->Value  = $z_right1;
							   $oFCK1->Create();
							   ?></td>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">培训首页广告三：</td>
                              <td bgcolor="#FFFFFF"><?php
							   $oFCK2->Value  = $z_right2;
							   $oFCK2->Create();
							   ?></td>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">培训首页广告四：</td>
                              <td bgcolor="#FFFFFF"><?php
							   $oFCK3->Value  = $z_right3;
							   $oFCK3->Create();
							   ?></td>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">培训首页广告五：</td>
                              <td bgcolor="#FFFFFF"><?php
							   $oFCK4->Value  = $z_right4;
							   $oFCK4->Create();
							   ?></td>
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
