<?php
include("../conn.php");
include("mb_step.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_SESSION["s_name"];?>-学院介绍</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/top.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/bottom.css" rel="stylesheet" type="text/css" />
<script src="js/js.js" type="text/javascript"></script>
</head> 
<body>
<div class="wrapper">
<?php if(isset($_GET["n"])){
switch ($_GET["n"]) {//其他文件格式可以在下面增加判断
		case 'lxwm' : 
		$mname="联系我们";
		$minfo=$mb_lxwm;		  
			break;
		case 'zszy' : 
		$mname="招生专业";
		$minfo=$mb_zszy;		  
			break;
		case 'zxns' : 
		$mname="招贤纳士";
		$minfo=$mb_zxns;
			break;
		case 'kfzx' :
		$mname="客服中心";
		$minfo=$mb_kfzx;
			break;
		case 'mzsm' : 
		$mname="免责申明";
		$minfo=$mb_mzsm;
		   
			break;
		case 'ggfw' : 
		$mname="广告服务";
		$minfo=$mb_ggfw;
			break;
	}
}else{
$mname="学院介绍";
$minfo=$mb_xyjs;
}?>

<!-- top -->
<?php include("mb_top.html");?>
<!-- top end -->
<!-- main -->
<div class="main">
  <div class="main_xyjs">
  	<div class="main_xyjs_left">
    	<div class="main_xyjs_left_box01"><img src="images/left_top_bg.jpg" width="656" height="14" /></div>
        <div class="main_xyjs_left_box">
        	<div class="main_xyjs_left_box_title"><?php echo $mname;?></div>
            <div class="main_xyjs_left_box_text"><?php echo $minfo;?></div>
        </div>
        <div class="main_xyjs_left_box01"><img src="images/left_bottom_bg.jpg" width="656" height="14" /></div>
    </div>
    <?php include("mb_left.html");?>
  </div>
</div>
<!-- main end -->
<!-- bottom -->
<?php include("mb_bottom.html");?>
<!-- bottom end -->
</div>

</body>
</html>
