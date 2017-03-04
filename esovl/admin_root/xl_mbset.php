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
if (isset($_POST["mb_banner"])){
        $sql3="select * from mb_step where s_name='".$_SESSION["mbsname"]."'";
		$rs3=mysql_query($sql3,$conn);		
		if (mysql_num_rows($rs3)>=1){
$sql="update mb_step set mb_tj='".$_POST["mb_tj"]."',mb_logo='".$_POST["mb_logo"]."',mb_banner='".$_POST["mb_banner"]."',mb_tel='".$_POST["mb_tel"]."',mb_kftime='".$_POST["mb_kftime"]."',mb_adderss='".$_POST["mb_adderss"]."',mb_pic1='".$_POST["mb_pic1"]."',mb_pic2='".$_POST["mb_pic2"]."',mb_pic3='".$_POST["mb_pic3"]."',mb_pic4='".$_POST["mb_pic4"]."' where s_name='".$_SESSION["mbsname"]."'";}
        else{
		$sql="insert into mb_step set mb_tj='".$_POST["mb_tj"]."',mb_logo='".$_POST["mb_logo"]."',mb_banner='".$_POST["mb_banner"]."',mb_tel='".$_POST["mb_tel"]."',mb_kftime='".$_POST["mb_kftime"]."',mb_adderss='".$_POST["mb_adderss"]."',mb_pic1='".$_POST["mb_pic1"]."',mb_pic2='".$_POST["mb_pic2"]."',mb_pic3='".$_POST["mb_pic3"]."',mb_pic4='".$_POST["mb_pic4"]."', s_name='".$_SESSION["mbsname"]."'";
		}
          $rs=mysql_query($sql,$conn);
			if ($rs){
			echo "<script>alert('信息设置成功!!');</script>";
			}else{
			echo $sql;
			exit("设置出现错误，请检查重试");
			}
	        //mysql_free_result($rs);
//			echo mysql_error();
}
		$sql="select * from mb_step where s_name='".$_SESSION["mbsname"]."'";
		$rs=mysql_query($sql,$conn);
		
		if (mysql_num_rows($rs)>=1){
		$row=mysql_fetch_array($rs,MYSQL_ASSOC);
		     $mb_tj=$row["mb_tj"];
		     $mb_logo=$row["mb_logo"];		
			 $mb_banner=$row["mb_banner"];
			 $mb_pic1=$row["mb_pic1"];
			 $mb_pic2=$row["mb_pic2"];
			 $mb_pic3=$row["mb_pic3"];
			 $mb_pic4=$row["mb_pic4"];
			 $mb_tel=$row["mb_tel"];
			 $mb_adderss=$row["mb_adderss"];
			 $mb_kftime=$row["mb_kftime"];
		  }else{
		     $mb_tj=0;
		     $mb_logo="";
		     $mb_banner="";
			 $mb_pic1="";
			 $mb_pic2="";
			 $mb_pic3="";
			 $mb_pic4="";
			 $mb_tel="";
             $mb_adderss="";
			 $mb_kftime="";
		  }
	     
?>
<div class="mian_right">
        	<div class="mian_right_box">
            <div class="mian_right_box00">
            	<div class="mian_right_box_title">
                    <div class="mian_right_box_title_01">学校模板-信息设置</div>
                	<div class="mian_right_box_title_02"><?php echo $_SESSION["mbsname"];?></div>
                </div>
                <div class="mian_right_box_list">
                	<div class="mian_right_box_list00">
                    	<div class="mian_right_box_list_title">
                        	<dl>
                            <dt><img src="images/right_left01bg.jpg" /></dt>
                       	    <dd style="float:left; background:#fff; margin-left:0px;">模板站点基本信息</dd>
                            <dd><img src="images/right_right01bg.jpg" /></dd>
                            </dl>
                        </div>
                        <div class="mian_right_box_list_text">
                          <table width="1097" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#C8D2F0">
						  <form id="mbform" name="mbform" method="post" onsubmit="return mbset()" action="">
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">学校推荐：</td>
                              <td width="917" bgcolor="#FFFFFF"><input type="radio" name="mb_tj" value=1 <?php if($mb_tj==1){echo "checked";}?>/>
                              是
                              <input name="mb_tj" type="radio" value=0 <?php if($mb_tj==0){echo "checked";}?> /> 
                              否 <span style="color:#999">在首页推荐处显示</span></td>
                            </tr>
							<tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">学校logo：</td>
                              <td width="917" bgcolor="#FFFFFF"><input type="text" name="mb_logo" value="<?php echo $mb_logo;?>" style="width:210px;" readonly="readonly"/>
                                <input name="button42" type="button" class="go" onclick="window.open('up2.php?formname=mbform&amp;editname=mb_logo&amp;uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传logo" />
                                <span id="logdex">*</span><span style="color:#999"> 尺寸(px)：88x80</span></td>
                            </tr>
							 <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">学校模板banner：</td>
                              <td width="917" bgcolor="#FFFFFF"><input type="text" name="mb_banner" value="<?php echo $mb_banner;?>" style="width:210px;" readonly="readonly"/>
                                <input name="button42" type="button" class="go" onclick="window.open('up2.php?formname=mbform&amp;editname=mb_banner&amp;uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传banner" />
                                <span id="logdex">*</span><span style="color:#999"> 尺寸(px)：950x120</span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">联系电话：</td>
                              <td bgcolor="#FFFFFF">
                                <input type="text" name="mb_tel" id="mb_tel" value="<?php echo $mb_tel;?>" maxlength="15" style="width:210px;"/>
                             <span style="color:#999"> 如：021-23651478 </span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">客服时间：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="mb_kftime" id="mb_kftime" value="<?php echo $mb_kftime;?>" maxlength="40" style="width:210px;"/>
                                <span style="color:#999"> 如：周一至周五 9：00~19：00 周六周日 9：00~17：30 </span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">报名地址： </td>
                              <td bgcolor="#FFFFFF">
                                <input type="text" name="mb_adderss" id="mb_adderss" value="<?php echo $mb_adderss;?>" maxlength="200" style="width:210px;"/>
                              <span style="color:#999">填写本学校的报名地址</span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">图片轮播一：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="mb_pic1" value="<?php echo $mb_pic1;?>" style="width:210px;" readonly="readonly"/>
                                <input name="button4" type="button" class="go" onclick="window.open('up2.php?formname=mbform&amp;editname=mb_pic1&amp;uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传图片一" />
                                <span id="logdex">*</span><span style="color:#999"> 尺寸(px)：658x248</span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">图片轮播二：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="mb_pic2" value="<?php echo $mb_pic2;?>" style="width:210px;" readonly="readonly"/>
                                <input name="button3" type="button" class="go" onclick="window.open('up2.php?formname=mbform&amp;editname=mb_pic2&amp;uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传图片二" />
                                <span id="logdex">*</span><span style="color:#999"> 尺寸(px)：658x248</span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">图片轮播三：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="mb_pic3" value="<?php echo $mb_pic3;?>" style="width:210px;" readonly="readonly"/>
                                <input name="button2" type="button" class="go" onclick="window.open('up2.php?formname=mbform&amp;editname=mb_pic3&amp;uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传图片三" />
                                <span id="logdex">*</span><span style="color:#999"> 尺寸(px)：658x248</span></td>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">图片轮播四：</td>
                              <td bgcolor="#FFFFFF"><input type="text" name="mb_pic4" value="<?php echo $mb_pic4;?>" style="width:210px;" readonly/>
                                <input name="button" type="button" class="go" onclick="window.open('up2.php?formname=mbform&editname=mb_pic4&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')" value="上传图片四" />
                                <span id="logdex">*</span><span style="color:#999"> 尺寸(px)：658x248</span></td>
                            </tr>
							 <tr>
							   <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
							   <td bgcolor="#FFFFFF"><input name="submitSaveEdit" type="submit" value="保存学校模板基本信息" /></td>
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
