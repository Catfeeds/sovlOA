<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>学历基本信息设置</title>
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
if (isset($_POST["xl_title"])){

$sql="update xl_step set xl_title='".$_POST["xl_title"]."',xl_keyword='".$_POST["xl_keyword"]."',xl_contant='".$_POST["xl_contant"]."',xl_bmtj='".$_POST["xl_bmtj"]."',xl_bmtel='".$_POST["xl_bmtel"]."',xl_banner='".$_POST["xl_banner"]."',xl_onegg='".$_POST["xl_onegg"]."',xl_gglink='".$_POST["xl_gglink"]."'";

          $rs=mysql_query($sql,$conn);
			if ($rs){
			echo "<script>alert('信息设置成功!!');</script>";
			}else{
			exit("更新出现错误，请检查重试");
			}
	        //mysql_free_result($rs);
//			echo mysql_error();
}
		$sql="select * from xl_step limit 1";
		$rs=mysql_query($sql,$conn);
		
		if (mysql_num_rows($rs)>=1){		
		    $row=mysql_fetch_array($rs,MYSQL_ASSOC);
		
			 $xl_title=$row["xl_title"];
			 $xl_keyword=$row["xl_keyword"];
			 $xl_contant=$row["xl_contant"];
			 $xl_banner=$row["xl_banner"];	
			 $xl_bmtj=$row["xl_bmtj"];
			 $xl_bmtel=$row["xl_bmtel"];
			  $xl_onegg=$row["xl_onegg"];
			   $xl_gglink=$row["xl_gglink"];
		  }
include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('xl_bmtj') ;
$oFCK->BasePath   = $sBasePath ;
?>
<div class="mian_right">
        	<div class="mian_right_box">
            <div class="mian_right_box00">
            	<div class="mian_right_box_title">
                    <div class="mian_right_box_title_01">学历教育基本信息设置</div>
                	<div class="mian_right_box_title_02"></div>
                </div>
                <div class="mian_right_box_list">
                	<div class="mian_right_box_list00">
                    	<div class="mian_right_box_list_title">
                        	<dl>
                            <dt><img src="images/right_left01bg.jpg" /></dt>
                       	    <dd style="float:left; background:#fff; margin-left:0px;">学历教育站点基本信息</dd>
                            <dd><img src="images/right_right01bg.jpg" /></dd>
                            </dl>
                        </div>
                        <div class="mian_right_box_list_text">
                          <table width="1097" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#C8D2F0">
						  <form id="formset" name="formset" method="post" onsubmit="return xlset()" action="">
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">学历版块标题(Title)：</td>
                              <td width="917" bgcolor="#FFFFFF"><input type="text" name="xl_title" id="xl_title" value="<?php echo $xl_title;?>" maxlength="140" style="width:300px;"/>
                                <span style="color:#999"> 优化作用，140字以内。</span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">学历版块关键词(Keyword)：</td>
                              <td bgcolor="#FFFFFF"><textarea name="xl_keyword"  style="width:300px;height:40px;"><?php echo $xl_keyword;?></textarea>
                              <span style="color:#999"> 优化关键词，150字以内。</span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">信息描述(Description)：</td>
                              <td bgcolor="#FFFFFF"><textarea name="xl_contant" style="width:300px;"><?php echo $xl_contant;?></textarea>
                              <span style="color:#999"> 网站信息描述，200字以内。</span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">学历版块报名条件：</td>
                              <td bgcolor="#FFFFFF"> 
							  <?php
							   $oFCK->Value  = $xl_bmtj;
							   $oFCK->Create();
							   ?></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">学历版块报名电话：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="xl_bmtel" id="xl_bmtel" value="<?php echo $xl_bmtel;?>" maxlength="15" style="width:210px;"/></td>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">学历版块动画导航：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="xl_banner" value="<?php echo $xl_banner;?>" style="width:210px;" readonly/>
                                <input name="button" type="button" class="go" onclick="window.open('up2.php?formname=formset&editname=xl_banner&uppath=upload&style=swf','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传banner动画" />
                                <span id="xlban">*</span><span style="color:#999"> 尺寸(px)：165x120</span></td>
                            </tr>
							 <tr>
							   <td align="right" bgcolor="#FFFFFF">首页中间独立广告：</td>
							   <td bgcolor="#FFFFFF"><input type="text" name="xl_onegg" value="<?php echo $xl_onegg;?>" style="width:210px;" readonly="readonly"/>
                                 <input name="button2" type="button" class="go" onclick="window.open('up2.php?formname=formset&amp;editname=xl_onegg&amp;uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传广告图" />
                                 <span id="xlonegg">*</span><span style="color:#999"> 尺寸(px)：415x102</span>
                                 广告链接：<input name="xl_gglink" type="text" value="<?php echo $xl_gglink;?>" />
                                 <span style="color:#999">http://</span>
                               </td>
						    </tr>
							 <tr>
							   <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
							   <td bgcolor="#FFFFFF"><input name="submitSaveEdit" type="submit" value="保存学历基本信息" /></td>
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
