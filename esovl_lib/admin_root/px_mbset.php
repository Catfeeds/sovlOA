<?php include("../conn.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>学校模板基本信息设置</title>
<link href="images/root.css" rel="stylesheet" type="text/css" /></head>
<script type="text/javascript" src="lgHttp.js"></script>
<body>
<?php 
if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}
if (isset($_POST["pxmb_banner"])){
        $sql3="select * from pxmb_step where pxs_name='".$_SESSION["pxmbsname"]."'";
		$rs3=mysql_query($sql3,$conn);		
		if (mysql_num_rows($rs3)>=1){
$sql="update pxmb_step set pxmb_tj=".$_POST["pxmb_tj"].",pxmb_banner='".$_POST["pxmb_banner"]."',pxmb_tel='".$_POST["pxmb_tel"]."',pxmb_email='".$_POST["pxmb_email"]."',pxmb_skdz='".$_POST["pxmb_skdz"]."',pxmb_adderss='".$_POST["pxmb_adderss"]."',pxmb_qq1='".$_POST["pxmb_qq1"]."',pxmb_tname1='".$_POST["pxmb_tname1"]."',pxmb_qq2='".$_POST["pxmb_qq2"]."',pxmb_tname2='".$_POST["pxmb_tname2"]."',pxmb_pic1='".$_POST["pxmb_pic1"]."',pxmb_pic2='".$_POST["pxmb_pic2"]."',pxmb_pic3='".$_POST["pxmb_pic3"]."',pxmb_pic4='".$_POST["pxmb_pic4"]."',pxmb_pic5='".$_POST["pxmb_pic5"]."' where pxs_name='".$_SESSION["pxmbsname"]."'";
}
        else{
		$sql="insert into pxmb_step set pxs_name='".$_SESSION["pxmbsname"]."',pxmb_tj=".$_POST["pxmb_tj"].",pxmb_banner='".$_POST["pxmb_banner"]."',pxmb_tel='".$_POST["pxmb_tel"]."',pxmb_email='".$_POST["pxmb_email"]."',pxmb_skdz='".$_POST["pxmb_skdz"]."',pxmb_adderss='".$_POST["pxmb_adderss"]."',pxmb_qq1='".$_POST["pxmb_qq1"]."',pxmb_tname1='".$_POST["pxmb_tname1"]."',pxmb_qq2='".$_POST["pxmb_qq2"]."',pxmb_tname2='".$_POST["pxmb_tname2"]."',pxmb_pic1='".$_POST["pxmb_pic1"]."',pxmb_pic2='".$_POST["pxmb_pic2"]."',pxmb_pic3='".$_POST["pxmb_pic3"]."',pxmb_pic4='".$_POST["pxmb_pic4"]."',pxmb_pic5='".$_POST["pxmb_pic5"]."'";

		}
		
          $rs=mysql_query($sql,$conn);
			if ($rs){
			echo "<script>alert('信息设置成功!!');</script>";
			}else{
			
			exit("设置出现错误，请检查重试");
			}
	        //mysql_free_result($rs);
//			echo mysql_error();
}
		$sql="select * from pxmb_step where pxs_name='".$_SESSION["pxmbsname"]."'";
		$rs=mysql_query($sql,$conn);
		
		if (@mysql_num_rows($rs)>=1){
		$row=mysql_fetch_array($rs,MYSQL_ASSOC);	
		     $pxmb_tj=$row["pxmb_tj"];
		     $pxmb_banner=$row["pxmb_banner"];		
			 $pxmb_tel=$row["pxmb_tel"];
			 $pxmb_email=$row["pxmb_email"];
			 $pxmb_skdz=$row["pxmb_skdz"];
			 $pxmb_adderss=$row["pxmb_adderss"];
			 $pxmb_qq1=$row["pxmb_qq1"];
			 $pxmb_tname1=$row["pxmb_tname1"];
			 $pxmb_qq2=$row["pxmb_qq2"];
			 $pxmb_tname2=$row["pxmb_tname2"];
			 $pxmb_pic1=$row["pxmb_pic1"];
			 $pxmb_pic2=$row["pxmb_pic2"];
			 $pxmb_pic3=$row["pxmb_pic3"];
			 $pxmb_pic4=$row["pxmb_pic4"];
			 $pxmb_pic5=$row["pxmb_pic5"];
		  }else{
		     $pxmb_tj=0;
		     $pxmb_banner="";		
			 $pxmb_tel="";
			 $pxmb_email="";
			 $pxmb_skdz="";
			 $pxmb_adderss="";
			 $pxmb_qq1="";
			 $pxmb_tname1="";
			 $pxmb_qq2="";
			 $pxmb_tname2="";
			 $pxmb_pic1="";
			 $pxmb_pic2="";
			 $pxmb_pic3="";
			 $pxmb_pic4="";
			 $pxmb_pic5="";
		}
	     
?>
<div class="mian_right">
        	<div class="mian_right_box">
            <div class="mian_right_box00">
            	<div class="mian_right_box_title">
                    <div class="mian_right_box_title_01">培训学校模板-信息设置</div>
                	<div class="mian_right_box_title_02"><?php echo $_SESSION["pxmbsname"];?></div>
                </div>
                <div class="mian_right_box_list">
                	<div class="mian_right_box_list00">
                    	<div class="mian_right_box_list_title">
                        	<dl>
                            <dt><img src="images/right_left01bg.jpg" /></dt>
                       	    <dd style="float:left; background:#fff; margin-left:0px;">培训学校模板基本信息</dd>
                            <dd><img src="images/right_right01bg.jpg" /></dd>
                            </dl>
                        </div>
                        <div class="mian_right_box_list_text">
                          <table width="1097" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#C8D2F0">
						  <form id="pxmbform" name="pxmbform" method="post" onsubmit="return mbset()" action="">
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">学校推荐：</td>
                              <td width="917" bgcolor="#FFFFFF">
                              <input type="radio" name="pxmb_tj" value=1 <?php if($pxmb_tj==1){echo "checked";}?>/>
                              是
                              <input name="pxmb_tj" type="radio" value=0 <?php if($pxmb_tj==0){echo "checked";}?> /> 
                              否 <span style="color:#999">在首页推荐处显示</span></td>
                            </tr>
							
							 <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">学校模板banner：</td>
                              <td width="917" bgcolor="#FFFFFF"><input type="text" name="pxmb_banner" value="<?=$pxmb_banner?>" style="width:210px;" readonly="readonly"/>
                                <input name="button42" type="button" class="go" onclick="window.open('up2.php?formname=pxmbform&amp;editname=pxmb_banner&amp;uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传banner" />
                                <span id="logdex">*</span><span style="color:#999"> 尺寸(px)：950x100</span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">招生热线：</td>
                              <td bgcolor="#FFFFFF">
                <input type="text" name="pxmb_tel" value="<?=$pxmb_tel?>" maxlength="15" style="width:210px;"/>
                             <span style="color:#999"> 如：021-23651478 </span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">电子邮箱：</td>
                              <td bgcolor="#FFFFFF">
                <input type="text" name="pxmb_email" value="<?=$pxmb_email?>" maxlength="50" style="width:210px;"/>
                             <span style="color:#999"> 如：esovl@163.com</span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">上课地址：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="pxmb_skdz" id="pxmb_skdz" value="<?=$pxmb_skdz?>" maxlength="40" style="width:210px;"/>
                              <span style="color:#999">填写本学校的上课地址</span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">报名地址： </td>
                              <td bgcolor="#FFFFFF">
  <input type="text" name="pxmb_adderss" id="pxmb_adderss" value="<?=$pxmb_adderss?>" maxlength="200" style="width:210px;"/>
                              <span style="color:#999">填写本学校的报名地址</span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">QQ1：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="pxmb_qq1" id="pxmb_qq1" value="<?=$pxmb_qq1?>" maxlength="100" style="width:90px;"/>
                              <span style="color:#999">填写QQ</span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">老师姓名</td>
                              <td bgcolor="#FFFFFF"><span style="color:#999">
                            <input type="text" name="pxmb_tname1" value="<?=$pxmb_tname1?>"/>
                              </span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">QQ2：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="pxmb_qq2" id="pxmb_qq2" value="<?=$pxmb_qq2?>" maxlength="100" style="width:90px;"/>
                              <span style="color:#999">填写QQ2</span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">老师姓名</td>
                              <td bgcolor="#FFFFFF"><span style="color:#999">
                                <input type="text" name="pxmb_tname2" value="<?=$pxmb_tname2?>"/>
                              </span></td>
                            </tr>
                            <tr>
                            <td width="173" align="right" bgcolor="#FFFFFF">图片轮播一：</td>
                            <td bgcolor="#FFFFFF"><input type="text" name="pxmb_pic1" value="<?=$pxmb_pic1?>" style="width:210px;" readonly="readonly"/>
                                <input name="button4" type="button" class="go" onclick="window.open('up2.php?formname=pxmbform&editname=pxmb_pic1&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传图片一" />
                           <span id="logdex">*</span><span style="color:#999"> 尺寸(px)：674x205</span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">图片轮播二：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="pxmb_pic2" value="<?=$pxmb_pic2?>" style="width:210px;" readonly="readonly"/>
                                <input name="button3" type="button" class="go" onclick="window.open('up2.php?formname=pxmbform&amp;editname=pxmb_pic2&amp;uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传图片二" />
                                <span id="logdex">*</span><span style="color:#999"> 尺寸(px)：674x205</span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">图片轮播三：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="pxmb_pic3" value="<?=$pxmb_pic3?>" style="width:210px;" readonly="readonly"/>
                                <input name="button2" type="button" class="go" onclick="window.open('up2.php?formname=pxmbform&amp;editname=pxmb_pic3&amp;uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传图片三" />
                                <span id="logdex">*</span><span style="color:#999"> 尺寸(px)：674x205</span></td>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">图片轮播四：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="pxmb_pic4" value="<?=$pxmb_pic4?>" style="width:210px;" readonly/>
                                <input name="button" type="button" class="go" onclick="window.open('up2.php?formname=pxmbform&editname=pxmb_pic4&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传图片四" />
                                <span id="logdex">*</span><span style="color:#999"> 尺寸(px)：674x205</span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">图片轮播五：</td>
                              <td width="917" bgcolor="#FFFFFF"><input type="text" name="pxmb_pic5" value="<?=$pxmb_pic5?>" style="width:210px;" readonly="readonly"/>
                                <input name="button42" type="button" class="go" onclick="window.open('up2.php?formname=pxmbform&amp;editname=pxmb_pic5&amp;uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传图片五" />
                                <span id="logdex">*</span><span style="color:#999"> 尺寸(px)：674x205</span></td>
                            </tr>
							 <tr>
							   <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
							   <td bgcolor="#FFFFFF"><input name="submitSaveEdit" type="submit" value="保存培训学校模板信息" /></td>
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
