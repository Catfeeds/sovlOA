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
	
if (isset($_POST["z_title"])){
echo $_POST["mid"];
$sql="update web_step set z_title='".$_POST["z_title"]."',z_keyword='".$_POST["z_keyword"]."',z_contant='".$_POST["z_contant"]."',z_bmtj='".$_POST["z_bmtj"]."',z_tel='".$_POST["z_tel"]."',z_banner='".$_POST["z_banner"]."',z_onegg='".$_POST["z_onegg"]."',z_gglink='".$_POST["z_gglink"]."',z_right1='".$_POST["z_right1"]."',z_right1_link='".$_POST["z_right1_link"]."',z_right2='".$_POST["z_right2"]."',z_right2_link='".$_POST["z_right2_link"]."',z_right3='".$_POST["z_right3"]."',z_right3_link='".$_POST["z_right3_link"]."' where z_id=".$_POST["mid"];

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
                        <div class="mian_right_box_list_text">
                          <table width="1097" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#C8D2F0">
						  <form id="formset" name="formset" method="post" onsubmit="return xlset()" action="">
                            <tr>
                              <td width="62" rowspan="10" align="center" valign="middle" bgcolor="#FFFFFF" style="color:red;writing-mode:tb-rl;width:18px; line-height:100%; letter-spacing:10px; font-weight:bold"><?php echo $z_beizhu;?><input name="mid" type="hidden" value="<?php echo $mid;?>"/></td>
                              <td width="128" align="right" bgcolor="#FFFFFF">标题(Title)：</td>
                              <td width="897" bgcolor="#FFFFFF"><input type="text" name="z_title" id="z_title" value="<?php echo $z_title;?>" maxlength="140" style="width:300px;"/>
                                <span style="color:#999"> 优化作用，140字以内。</span></td>
                            </tr>
                            <tr>
                              <td width="128" align="right" bgcolor="#FFFFFF">关键词(Keyword)：</td>
                              <td bgcolor="#FFFFFF"><textarea name="z_keyword"  style="width:300px;height:40px;"><?php echo $z_keyword;?></textarea>
                              <span style="color:#999"> 优化关键词，150字以内。</span></td>
                            </tr>
                            <tr>
                              <td width="128" align="right" bgcolor="#FFFFFF">描述(Description)：</td>
                              <td bgcolor="#FFFFFF"><textarea name="z_contant" style="width:300px;"><?php echo $z_contant;?></textarea>
                              <span style="color:#999"> 网站信息描述，200字以内。</span></td>
                            </tr>
                            <tr>
                              <td width="128" align="right" bgcolor="#FFFFFF">报名条件：</td>
                              <td bgcolor="#FFFFFF"> 
							  <?php
							   $oFCK->Value  = $z_bmtj;
							   $oFCK->Create();
							   ?></td>
                            </tr>
                            
                            <tr>
                              <td width="128" align="right" bgcolor="#FFFFFF">报名电话：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="z_tel" id="z_tel" value="<?php echo $z_tel;?>" maxlength="15" style="width:210px;"/></td>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">动画导航：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="z_banner" value="<?php echo $z_banner;?>" style="width:210px;" readonly/>
                                <input name="button" type="button" class="go" onclick="window.open('up2.php?formname=formset&editname=z_banner&uppath=upload&style=swf','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传banner动画" />
                                <span id="xlban">*</span><span style="color:#999"> 尺寸(px)：950x141</span></td>
                            </tr>
							 <tr>
							   <td align="right" bgcolor="#FFFFFF">首页中间独立广告：</td>
				<td bgcolor="#FFFFFF"><input type="text" name="z_onegg" value="<?php echo $row["z_onegg"];?>" style="width:210px;" readonly="readonly"/>
                                 <input name="button2" type="button" class="go" onclick="window.open('up2.php?formname=formset&amp;editname=z_onegg&amp;uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传广告图" />
<span id="xlonegg">*</span><span style="color:#999"> 尺寸(px)：415x102</span> 广告链接：<input name="z_gglink" type="text" value="<?php echo $row["z_gglink"];?>" />
                                 <span style="color:#999">http://</span></td>
						    </tr>
							 <tr>
							   <td align="right" bgcolor="#FFFFFF">首页右侧广告一：</td>
							   <td bgcolor="#FFFFFF"><input type="text" name="z_right1" value="<?php echo $row["z_right1"];?>" style="width:210px;" readonly="readonly"/>
                                 <input name="button22" type="button" class="go" onclick="window.open('up2.php?formname=formset&amp;editname=z_right1&amp;uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传广告图" />
<span id="xlonegg">*</span><span style="color:#999"> 尺寸(px)：167x104</span> 广告链接：<input name="z_right1_link" type="text" value="<?php echo $row["z_right1_link"];?>" />
                                 <span style="color:#999">http://</span></td>
						    </tr>
							 <tr>
							   <td align="right" bgcolor="#FFFFFF">首页右侧广告二：</td>
							   <td bgcolor="#FFFFFF"><input type="text" name="z_right2" value="<?php echo $row["z_right2"];?>" style="width:210px;" readonly="readonly"/>
                                 <input name="button23" type="button" class="go" onclick="window.open('up2.php?formname=formset&amp;editname=z_right2&amp;uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传广告图" />
<span id="xlonegg">*</span><span style="color:#999"> 尺寸(px)：167x104</span> 广告链接：<input name="z_right2_link" type="text" value="<?php echo $row["z_right2_link"];?>" />
                                 <span style="color:#999">http://</span></td>
						    </tr>
							 <tr>
							   <td align="right" bgcolor="#FFFFFF">首页内容底部广告：</td>
							   <td bgcolor="#FFFFFF"><input type="text" name="z_right3" value="<?php echo $row["z_right3"];?>" style="width:210px;" readonly="readonly"/>
                                 <input name="button232" type="button" class="go" onclick="window.open('up2.php?formname=formset&amp;editname=z_right3&amp;uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传广告图" />
<span id="xlonegg">*</span><span style="color:#999"> 尺寸(px)：618x119</span> 广告链接：<input name="z_right3_link" type="text" value="<?php echo $row["z_right3_link"];?>" />
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
