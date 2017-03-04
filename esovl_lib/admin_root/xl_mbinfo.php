<?php include("../conn.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>学校信息设置</title>
<link href="images/root.css" rel="stylesheet" type="text/css" /></head>

<script type="text/javascript" src="lgHttp.js"></script>
<body>
<?php 
if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}

if (isset($_POST["mb_zszy"])){

        $sql3="select * from mb_step where s_name='".$_SESSION["mbsname"]."'";
		$rs3=mysql_query($sql3,$conn);		
		if (mysql_num_rows($rs3)>=1){
$sql="update mb_step set mb_zszy='".$_POST["mb_zszy"]."',mb_zxns='".$_POST["mb_zxns"]."',mb_lxwm='".$_POST["mb_lxwm"]."',mb_kfzx='".$_POST["mb_kfzx"]."',mb_mzsm='".$_POST["mb_mzsm"]."',mb_ggfw='".$_POST["mb_ggfw"]."' where s_name='".$_SESSION["mbsname"]."'";

}else{

		$sql="insert into mb_step set mb_zszy='".$_POST["mb_zszy"]."',mb_zxns='".$_POST["mb_zxns"]."',mb_lxwm='".$_POST["mb_lxwm"]."',mb_kfzx='".$_POST["mb_kfzx"]."',mb_mzsm='".$_POST["mb_mzsm"]."',mb_ggfw='".$_POST["mb_ggfw"]."' whrere s_name='".$_SESSION["mbsname"]."'";
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
		     $mb_zszy=$row["mb_zszy"];
		     $mb_lxwm=$row["mb_lxwm"];		
			 $mb_zxns=$row["mb_zxns"];
			 $mb_kfzx=$row["mb_kfzx"];
			 $mb_mzsm=$row["mb_mzsm"];
			 $mb_ggfw=$row["mb_ggfw"];
		  }else{
		     $mb_zszy="";
		     $mb_lxwm="";		
			 $mb_zxns="";
			 $mb_kfzx="";
			 $mb_mzsm="";
			 $mb_ggfw="";
		  }
include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('mb_zszy') ;
$oFCK2 = new FCKeditor('mb_lxwm') ;
$oFCK3 = new FCKeditor('mb_zxns') ;
$oFCK4 = new FCKeditor('mb_kfzx') ;
$oFCK5 = new FCKeditor('mb_mzsm') ;
$oFCK6 = new FCKeditor('mb_ggfw') ;

$oFCK->BasePath   = $sBasePath ;
$oFCK2->BasePath   = $sBasePath ;
$oFCK3->BasePath   = $sBasePath ;
$oFCK4->BasePath   = $sBasePath ;
$oFCK5->BasePath   = $sBasePath ;
$oFCK6->BasePath   = $sBasePath ;
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
						  <form id="mbform" name="mbform" method="post" action="">
							 <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">招生专业：</td>
                              <td width="917" bgcolor="#FFFFFF">
							  <?php
							   $oFCK->Value  = $mb_zszy;
							   $oFCK->Create();
							   ?></span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">联系我们：</td>
                              <td bgcolor="#FFFFFF">
							   <?php
							   $oFCK2->Value  = $mb_lxwm;
							   $oFCK2->Create();
							   ?></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">招贤纳士：</td>
                              <td bgcolor="#FFFFFF"><?php
							   $oFCK3->Value  = $mb_zxns;
							   $oFCK3->Create();
							   ?></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">客服中心：</td>
                              <td bgcolor="#FFFFFF"><?php
							   $oFCK4->Value  = $mb_kfzx;
							   $oFCK4->Create();
							   ?></td>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#FFFFFF">免责申明：</td>
                              <td bgcolor="#FFFFFF"><?php
							   $oFCK5->Value  = $mb_mzsm;
							   $oFCK5->Create();
							   ?></td>
                            </tr>
							<tr>
                              <td align="right" bgcolor="#FFFFFF">广告服务：</td>
                              <td bgcolor="#FFFFFF"><?php
							   $oFCK6->Value  = $mb_ggfw;
							   $oFCK6->Create();
							   ?></td>
                            </tr>
							 <tr>
							   <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
							   <td bgcolor="#FFFFFF"><input name="submitSaveEdit" type="submit" value="保存学校基本信息" /></td>
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
