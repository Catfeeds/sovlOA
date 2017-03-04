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

if (isset($_POST["pxmb_xxjs"])){

        $sql3="select * from pxmb_step where pxs_name='".$_SESSION["pxmbsname"]."'";
		$rs3=mysql_query($sql3,$conn);		
		if (mysql_num_rows($rs3)>=1){
$sql="update pxmb_step set pxmb_xxjs='".$_POST["pxmb_xxjs"]."',pxmb_bmlc='".$_POST["pxmb_bmlc"]."',pxmb_jgfx='".$_POST["pxmb_jgfx"]."' where pxs_name='".$_SESSION["pxmbsname"]."'";
}else{

		$sql="insert into pxmb_step set pxmb_xxjs='".$_POST["pxmb_xxjs"]."',pxmb_bmlc='".$_POST["pxmb_bmlc"]."',pxmb_jgfx='".$_POST["pxmb_jgfx"]."' whrere pxs_name='".$_SESSION["pxmbsname"]."'";
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
		$sql="select * from pxmb_step where pxs_name='".$_SESSION["pxmbsname"]."'";
		$rs=mysql_query($sql,$conn);
		
		if (mysql_num_rows($rs)>=1){
		$row=mysql_fetch_array($rs,MYSQL_ASSOC);
		     $pxmb_xxjs=$row["pxmb_xxjs"];
		     $pxmb_bmlc=$row["pxmb_bmlc"];		
			 $pxmb_jgfx=$row["pxmb_jgfx"];
//			 $mb_kfzx=$row["mb_kfzx"];
//			 $mb_mzsm=$row["mb_mzsm"];
//			 $mb_ggfw=$row["mb_ggfw"];
		  }else{
		     $pxmb_xxjs="";
		     $pxmb_bmlc="";		
			 $pxmb_jgfx="";
//			 $mb_kfzx="";
//			 $mb_mzsm="";
//			 $mb_ggfw="";
		  }
include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('pxmb_xxjs') ;
$oFCK2 = new FCKeditor('pxmb_bmlc') ;
$oFCK3 = new FCKeditor('pxmb_jgfx') ;

$oFCK->BasePath   = $sBasePath ;
$oFCK2->BasePath   = $sBasePath ;
$oFCK3->BasePath   = $sBasePath ;
?>
<div class="mian_right">
        	<div class="mian_right_box">
            <div class="mian_right_box00">
            	<div class="mian_right_box_title">
                    <div class="mian_right_box_title_01">学校模板-信息设置</div>
                	<div class="mian_right_box_title_02"><?php echo $_SESSION["pxmbsname"];?></div>
                </div>
                <div class="mian_right_box_list">
                	<div class="mian_right_box_list00">
                    	<div class="mian_right_box_list_title">
                        	<dl>
                            <dt><img src="images/right_left01bg.jpg" /></dt>
                       	    <dd style="float:left; background:#fff; margin-left:0px;">培训模板站点基本信息</dd>
                            <dd><img src="images/right_right01bg.jpg" /></dd>
                            </dl>
                        </div>
                        <div class="mian_right_box_list_text">
                          <table width="1097" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#C8D2F0">
						  <form id="mbform" name="mbform" method="post" action="">
							 <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">学校介绍：</td>
                              <td width="917" bgcolor="#FFFFFF">
							  <?php
							   $oFCK->Value  = $pxmb_xxjs;
							   $oFCK->Create();
							   ?></span></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">报名流程：</td>
                              <td bgcolor="#FFFFFF">
							   <?php
							   $oFCK2->Value  = $pxmb_bmlc;
							   $oFCK2->Create();
							   ?></td>
                            </tr>
                            <tr>
                              <td width="173" align="right" bgcolor="#FFFFFF">机构分校：</td>
                              <td bgcolor="#FFFFFF"><?php
							   $oFCK3->Value  = $pxmb_jgfx;
							   $oFCK3->Create();
							   ?></td>
                            </tr>
							 <tr>
							   <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
							   <td bgcolor="#FFFFFF"><input name="submitSaveEdit" type="submit" value="保存培训学校基本信息" /></td>
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
