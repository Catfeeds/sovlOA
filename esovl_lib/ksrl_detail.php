<?php 
include_once("conn.php");
	
?>
<?php

			$sql="select * from excal where ex_id=".$_GET["id"];
			$rs=mysql_query($sql);
			$coun=mysql_num_rows($rs);
			if ($coun>=1){
			$row=mysql_fetch_assoc($rs);
			$ex_id=$row["ex_id"];
			$ex_title=$row["ex_title"];
			$ex_ksbk=$row["ex_ksbk"];
			$ex_bmtime=$row["ex_bmtime"];
			$ex_bmrk=$row["ex_bmrk"];
			$ex_kstime=$row["ex_kstime"];
			$ex_ksrk=$row["ex_ksrk"];
			$ex_cfrk=$row["ex_cfrk"];
				  	
			}else{
			exit("对不起，没有找到相关信息！");
			}
			mysql_free_result($rs);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $ex_title?>--考试日历详细</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/top.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/bottom.css" rel="stylesheet" type="text/css" />
<script src="js/style.js"></script>
</head>

<body>

<div class="wrapper">

<!-- top -->
<div class="top">
<?php 
include("top/top_1.html");
include("top/index_top1.html");
?> 
</div>
<!-- top End -->

<!-- main -->
<div class="main">
	
    <div class="main_ksrl">
    	<div class="main_ksrl_left">
        	<div class="main_ksrl_left_box01">
            	<div class="main_ksrl_left_box01_title"><span>考试日历</span></div>
                <div class="main_ksrl_left_box01_list">
                	<div class="main_ksrl_left_box01_list_box">
                    	<div class="main_ksrl_left_box01_list_box_title"><span>按时间查询</span></div>
                        <div class="main_ksrl_left_box01_list_box_text">
      <select name="moth" onchange="javascript:window.location.href=(this.options[this.selectedIndex].value)">
	  <option value=0 selected>--请选择--</option>
	    <option value="ksrl.php?mon=1">一月分</option>
		<option value="ksrl.php?mon=2">二月分</option>
		<option value="ksrl.php?mon=3">三月分</option>
		<option value="ksrl.php?mon=4">四月分</option>
		<option value="ksrl.php?mon=5">五月分</option>
		<option value="ksrl.php?mon=6">六月分</option>
		<option value="ksrl.php?mon=7">七月分</option>
		<option value="ksrl.php?mon=8">八月分</option>
		<option value="ksrl.php?mon=9">九月分</option>
		<option value="ksrl.php?mon=10">十月分</option>
		<option value="ksrl.php?mon=11">十一月分</option>
		<option value="ksrl.php?mon=12">十二月分</option>
	    </select>
                        </div>
                    </div>
                    
                    <!--<div class="main_ksrl_left_box01_list_box">
                    	<div class="main_ksrl_left_box01_list_box_title"><span>按分类查询</span></div>
                        <div class="main_ksrl_left_box01_list_box_text">
                            <select name="">
                              <option>请选择种类</option>
                              <option>英语</option>
                              <option>网页设计</option>
                            </select>
                        </div>
                    </div>-->
                    
                </div>
            </div>
            <div class="main_ksrl_left_box02">
            	<div class="main_ksrl_left_box02_title">
                	<dl><dt><img src="images/ksyl_d.jpg" />考试日历搜索</dt><dd>&nbsp;</dd></dl>
                </div>
                <div class="main_ksrl_left_box02_list">
                	<form name="sform" action="ksrl.php" method="post">
					<ul><li><input name="sou" type="text" /></li><li><img src="images/ksrl_ss.jpg" width="46" height="24" onclick="document.sform.submit()" style="cursor:pointer;"/></li></ul>
					</form>
                </div>
            </div>
        </div>
        <div class="main_ksrl_right">
        	<div class="main_ksrl_right_box01">
       		  <span>您现在的位置：</span> <a href="/">首页</a> >> <a href="ksrl.php">考试日历</a> >> <?php echo $ex_title;?> >> <strong>详细</strong></div>
            <div class="main_ksrl_right_box02">
            	<div class="main_ksrl_right_box02_title">考试日历 >> <span><?php echo $ex_title;?></span></div>
                <div class="main_ksrl_right_box02_list">
                	<div class="main_ksrl_right_box02_list_detail01">
                    	<ul>
                        <li><strong>报名时间：</strong><?php echo $ex_bmtime;?></li>
                        <li><strong>报名入口：</strong><?php echo $ex_bmrk;?></li>
                        <li><strong>考试时间：</strong><?php echo $ex_kstime;?></li>
                        <li><strong>考试入口：</strong><?php echo $ex_ksrk;?></li>
                        <li><strong>查分入口：</strong><?php echo $ex_cfrk;?></li>
                        </ul>
                  </div>
                    <div class="main_ksrl_right_box02_list_detail02"><strong>考试百科：</strong><br /><?php echo $ex_ksbk;?>
                    <br />                    
                    
                  </div>
              </div>
            </div>
        </div>
    </div>
    
</div>
<!-- main End -->

<!-- bottom -->
<?php include("bottom/bottom.html");?>
<!-- bottom End -->

</div>

</body>
</html>
