<?php
include("../conn.php");
include("mb_step.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_SESSION["s_name"];?>-网上报名</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/top.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/bottom.css" rel="stylesheet" type="text/css" />
<script src="js/js.js" type="text/javascript"></script>
</head>

<body>
<?php
if (isset($_POST["bm_name"])){
$sql="insert into wsbm set bm_xxname='".$_POST["bm_xxname"]."',bm_zyclass='".$_POST["bm_zyclass"]."',bm_zycaption='".$_POST["bm_zycaption"]."',bm_name='".$_POST["bm_name"]."',bm_tel='".$_POST["bm_tel"]."',bm_sfz='".$_POST["bm_sfz"]."',bm_address='".$_POST["bm_address"]."',bm_email='".$_POST["bm_email"]."',bm_con='".$_POST["bm_con"]."',bm_date=now()";
        $rs=mysql_query($sql);
		if (!$rs){  
	    exit("数据库操作失败! 错误信息为:".mysql_error());
	    }else{	
		echo"<script>alert('信息添加成功');location.href='mb_xyjs.php';</script>";
		}}
?>
<div class="wrapper">
<!-- top -->
<?php include("mb_top.html");?>
<!-- top end -->

<!-- main -->
<div class="main">
  <div class="main_wsbm">
  	<div class="main_wsbm_box01"><img src="images/jd_wsbm_topbg.jpg" /></div>
    <div class="main_wsbm_box">
    	<div class="main_wsbm_box_left">
        	<div class="main_wsbm_box_left_box01"><img src="images/jd_left_topbg.jpg" /></div>
            <div class="main_wsbm_box_left_box">
            	<div class="main_wsbm_box_left_box_list">
                	<div class="main_wsbm_box_left_box_list01">网上报名</div>
				 <form name="bmform" id="bmform" method="post" onsubmit="return wsbm()" action="">
                    <div class="main_wsbm_box_left_box_list02">
                    	<dl>
                        <dt>学校名称</dt>
                        <dd><h2><input type="text" value="<?php echo $_SESSION["s_name"];?>" readonly name="bm_xxname" /></h2><span id="bmxxname"><strong>*</strong></span></dd>
                        </dl>
                        
                        <dl>
                        <dt>专业类别</dt>
                        <dd>
                        <select name="bm_zyclass">
                          <option value=0>请选择专业类别</option>
						  <?php							
								$str="select * from xlcal";
								$rs1=mysql_query($str,$conn);
								
								if($rs1){
								$snum=mysql_num_rows($rs1);
								
								if ($snum>=1){
								while($row=mysql_fetch_array($rs1,MYSQL_ASSOC)){

						  ?>
                          <option value="<?php echo $row["zy_class"];?>"><?php echo $row["zy_class"];?></option>
                          <?php }}}?>
                        </select><span id="bmzyclass"><strong>*</strong>请选择专业类别</span></dd>
                        </dl>
                        
                        <dl>
                        <dt>专业名称</dt>
                        <dd>
                        <select name="bm_zycaption">
						 <option value=0>请选择专业名称</option>                        	
                          <?php							
								$rs0=mysql_query("select * from xlmc");
    							if (mysql_num_rows($rs0)>=1){
								while($row=mysql_fetch_array($rs0,MYSQL_ASSOC)){
						  ?>
                          <option value="<?php echo $row["mc_title"];?>"><?php echo $row["mc_title"];?></option>
                          <?php }}?>
                        </select><span id="bmzycaption"><strong>*</strong>请选择专业名称</span></dd>
                        </dl>
                        
                        <dl>
                        <dt>姓名</dt>
                        <dd><h2><input type="text" name="bm_name" maxlength="4"></h2><span id="bmname"><strong>*</strong>请输入中文名</span></dd>
                        </dl>
                        
                        <dl>
                        <dt>手机/电话</dt>
                        <dd><h2><input type="text" name="bm_tel" onKeyPress="if (event.keyCode!=46 && event.keyCode!=45 && (event.keyCode<48 || event.keyCode>57)) event.returnValue=false" style="ime-mode:disabled"></h2><span id="bmtel"><strong>*</strong>电话和手机至少输入一项</span></dd>
                        </dl>
                        
                        <dl>
                        <dt>身 份 证</dt>
                        <dd><h2><input type="text" name="bm_sfz"></h2><span id="bmsfz"><strong>*</strong>用于报名确认，请填写真实身份证号码</span></dd>
                        </dl>
                        <dl>
                        <dt>通讯地址</dt>
                        <dd><h2><input type="text" name="bm_address"></h2><span id="bmaddress"><strong>*</strong>用于寄发相关的材料，非常重要</span></dd>
                        </dl>
                        
                        <dl>
                        <dt>电子邮箱</dt>
                        <dd><h2><input type="text" name="bm_email" /></h2> <span id="bmemail"><strong>*</strong>请输入您最常使用的电子邮件地址</span></dd>
                        </dl>
                        
                      <dl style="height:100px;">
                        <dt>备注说明</dt>
                        <dd style="height:100px;"><textarea name="bm_con" style="font-family:Arial, Helvetica, sans-serif"></textarea></dd>
                        </dl>
                        
                        <div class="wsbm_anniu"><input type="image" src="images/wsbm.jpg" /></div>
                        
                  </div>
				  </form>
                </div>
            </div>
            <div class="main_wsbm_box_left_box01"><img src="images/jd_left_bottombg.jpg" /></div>
        </div>
        <div class="main_wsbm_box_right">
        	<div class="main_wsbm_box_right_list">
            	<div class="main_wsbm_box_right_list_top"><span>报名须知</span></div>
                <div class="main_wsbm_box_right_list_cen">
				
<div class="main_wsbm_box_right_list_cen_text">
<?php echo $mb_bmxz;?>              	
</div>
                </div>
                <div class="main_wsbm_box_right_list_bottom"><img src="images/right_bottombg.jpg" /></div>
            </div>
        </div>
    </div>
    <div class="main_wsbm_box02"><img src="images/jd_wsbm_bottombg.jpg" /></div>
  </div>
</div>
<!-- main end -->

<!-- bottom -->
<?php include("mb_bottom.html");?>
<!-- bottom end -->


</div>

</body>
</html>
