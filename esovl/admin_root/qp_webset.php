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
if (isset($_POST["qp_name"])){
//echo $_POST["z_name"];
					
$sql="update qp_setp set qp_name='".$_POST["qp_name"]."',qp_title='".$_POST["qp_title"]."',qp_Keyword='".$_POST["qp_Keyword"]."',qp_Description='".$_POST["qp_Description"]."',qp_tel='".$_POST["qp_tel"]."',z_logo='".$_POST["z_logo"]."',qp_pic='".$_POST["qp_pic"]."',qp_qq='".$_POST["qp_qq"]."' where qp_id=1";

          $rs=mysql_query($sql,$conn);
			if ($rs){
			echo "<script>alert('信息设置成功!!');</script>";
			}else{
			exit("更新出现错误，请检查重试");
			}
	        //mysql_free_result($rs);
//			echo mysql_error();
}
		$sql="select * from qp_setp where qp_id=1";
		$rs=mysql_query($sql,$conn);
		
		if (mysql_num_rows($rs)>=1){	
		    $row=mysql_fetch_assoc($rs);
						$qp_name=$row["qp_name"];
						$qp_title=$row["qp_title"];
						$qp_Keyword=$row["qp_Keyword"];
						$qp_Description =$row["qp_Description"];
						
						$qp_tel=$row["qp_tel"];
						$z_logo=$row["z_logo"];
						$qp_pic=$row["qp_pic"];
						$qp_qq=$row["qp_qq"];
						
		  }
		  mysql_free_result($rs);
include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('z_onegg') ;
$oFCK->BasePath   = $sBasePath ;


$sBasePathb = 'fckeditor/';
$oFCKb = new FCKeditor('qp_pic') ;
$oFCKb->BasePath   = $sBasePathb ;
?>
<div class="mian_right">
        	<div class="mian_right_box">
            <div class="mian_right_box00">
            	<div class="mian_right_box_title">
                    <div class="mian_right_box_title_01">企培基本信息设置</div>
                	<div class="mian_right_box_title_02"></div>
                </div>
                <div class="mian_right_box_list">
                	<div class="mian_right_box_list00">
                    	<div class="mian_right_box_list_title">
                        	<dl>
                            <dt><img src="images/right_left01bg.jpg" /></dt>
                       	    <dd style="float:left; background:#fff; margin-left:0px;">企培基本信息</dd>
                            <dd><img src="images/right_right01bg.jpg" /></dd>
                            </dl>
                        </div>
                        <div class="mian_right_box_list_text">
                          <table width="1097" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#C8D2F0">
						  <form id="formset" name="formset" method="post" onsubmit="return webset()" action="">
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">网站名称： </td>
                              <td width="917" bgcolor="#FFFFFF" ><input type="text" name="qp_name" id="z_name" value="<?php echo $qp_name;?>" maxlength="40" style="width:300px;"/>
                                <span id="wzmc">*</span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">首页标题(Title)：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="qp_title" id="z_title" value="<?php echo $qp_title;?>" maxlength="140" style="width:300px;"/>
                                <span style="color:#999"> 优化作用，140字以内。</span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">首页关键词(Keyword)：</td>
                              <td bgcolor="#FFFFFF"><textarea name="qp_Keyword"  style="width:300px;height:40px;"><?php echo $qp_Keyword;?></textarea>
                              <span style="color:#999"> 优化关键词，150字以内。</span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">首页信息描述(Description)：</td>
                              <td bgcolor="#FFFFFF"><textarea name="qp_Description" style="width:300px;"><?php echo $qp_Description;?></textarea>
                              <span style="color:#999"> 网站信息描述，200字以内。</span></td>
                            </tr>
                              <tr>
                              <td align="right" bgcolor="#FFFFFF">电话：</td>
                   <td bgcolor="#FFFFFF"><input type="text" name="qp_tel"  value="<?php echo $qp_tel;?>" style="width:300px;"/>
                   <span style="color:#999"> 多个QQ请用逗号隔开,请至少填写1个号码！</span></td>
                            </tr>
                                                     <tr>
                              <td align="right" bgcolor="#FFFFFF">联系qq：</td>
                   <td bgcolor="#FFFFFF"><input type="text" name="qp_qq"  value="<?php echo $qp_qq;?>" style="width:300px;"/>
                   <span style="color:#999"> 多个QQ请用逗号隔开,请至少填写1个号码！</span></td>
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
                              <td align="right" bgcolor="#FFFFFF">动画flash：</td>
                              <td bgcolor="#FFFFFF"> <?php
							   $oFCKb->Value  = $qp_pic;
							   $oFCKb->Create();
							   ?>
                               尺寸(px)：522x207</span></td>
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
