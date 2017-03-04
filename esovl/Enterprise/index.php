<?php 
include_once("../conn.php");
include_once("../webstep.php");
?>
<?php
$sql="select * from qp_setp where qp_id=1";
		$rs=mysql_query($sql,$conn);
		if (mysql_num_rows($rs)>=1){	
		    $row=mysql_fetch_assoc($rs);
						$qp_title=$row["qp_title"];
						$qp_Keyword=$row["qp_Keyword"];
						$qp_Description=$row["qp_Description"];
						$qp_tel=$row["qp_tel"];
						$qp_pic=$row["qp_pic"];
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$qp_title?></title>
<meta name="keywords" content="<?=$qp_Keyword?>" />
<meta name="description" content="<?=$qp_Description?>" />
<link href="css/qpcss.css" rel="stylesheet" type="text/css" />
<link href="css/qptop.css" rel="stylesheet" type="text/css" />
<link href="css/qpmain.css" rel="stylesheet" type="text/css" />
<link href="css/qpbottom.css" rel="stylesheet" type="text/css" />
<script src="../js/style.js"></script>
<!--<script src="js/style.js" language="javascript" type="text/javascript"></script>--> 
</head>
<body>
<div id="wrapper_bg">
  <div class="wrapper">
    <!-- strat top -->
    <?php	include_once("top.php");?>	
    <!-- end top -->	
    <!-- strat main -->
    <div class="main">
      <div class="main_left">
        <div class="main_left_box01">
          <div class="main_left_box01_title">
            <dl>
              <dt>最新资讯</dt>
              <dd><a href="qp_new_list.php?cl=9">MORE</a></dd>
            </dl>
          </div>
          <div class="main_left_box01_list00">
            <div class="main_left_box01_list">
              <ul>
<?php
$sql="select * from qp_news where news_class='9' order by news_id desc limit 0,8";
$rs=mysql_query($sql);
if (mysql_num_rows($rs)>=1){
$k=0;
while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
$k=$k+1;
?>
<li><span>
<?=$k?>
.</span><a href="qp_new_detial.php?cl=<?php echo $row["news_id"];?>"><?php echo utf_substr($row["news_title"],22);?></a></li>
<?php }}?>
              </ul>
            </div>
          </div>
        </div>
<?php	include_once("left.php");?>
        <div class="main_left_box01">
          <div class="main_left_box01_title">
            <dl>
              <dt>名师风采</dt>
              <dd><a href="qp_teacher.php">MORE</a></dd>
            </dl>
          </div>
          <div class="main_left_box01_list00">
            <div class="main_left_box01_list_msfc" style="height:200px;">

<div class="main_left_box01_list_msfc_box" id="Marquee2" >
<?php
$sql="select * from qp_teacher order by teacher_id desc";
$rs=mysql_query($sql);
if (mysql_num_rows($rs)>=1){
while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
?>
<dl style="height:200px; border-bottom:1px #CCC dotted;">   	         
                <div class="main_left_box01_list_msfc_box_pic">
                <a href="qp_teacher_detial.php?id=<?php echo $row["teacher_id"];?>"><img src="../admin_root/<?php echo $row["npic"];?>" width="70" height="80" /></a></div>
                <p class="msfc"> <a href="qp_teacher_detial.php?id=<?php echo $row["teacher_id"];?>"> <?php echo $row["teacher_name"];?><br />
<span><?php echo $row["teacher_zhuanye"];?></span> </a> <strong>讲师介绍：</strong> <?php echo utf_substr($row["teacher_con"],80);?>.. </p>
      </dl>        
<?php }}?>             
          </div>
            </div>
             <script src="js/xlgund2.js"></script>
          </div>
        </div>
      </div>
      <div class="main_cen">
        <!-- pic size:522*207px -->
        <div class="main_cen_flaash"><img src="images/flash01.jpg" /></div>
        <div class="main_cen_box01">
          <div class="main_cen_box01_title"><strong>企培项目</strong><span>|</span><a href="qp_course.php">更多>></a></div>
          <div class="main_cen_box01_pic">
            <ul>
<!-- pic size:162*75px -->
<?php
$sql="select * from qp_kaike order by qpk_id desc limit 0,6";
$rs=mysql_query($sql);
if (mysql_num_rows($rs)>=1){
while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
?>
              <li><a href="qp_course_list.php?cl=<?php echo $row["qpk_id"];?>"><img src="../admin_root/<?php echo $row["npic"];?>" onLoad="javascript:if(this.width>=this.height&&this.width>=162){this.width=162};if(this.height>this.width&&this.height>=75){this.height=75};"/></a></li>
<?php }}?>
            </ul> 
          </div>
          <div class="main_cen_box01_list">我们这边现在在招呼叫中心
<?php                            
      $sq2="select * from qp_kaike order by qpk_num asc limit 0,3"; 
	  $rs2=mysql_query($sq2,$conn);
	  if (mysql_num_rows($rs2)>=1){
	  while ($row2=mysql_fetch_array($rs2,MYSQL_ASSOC)){ 
?>
            <dl>
            <dt><?php echo $row2["qpk_title"];?></dt>
<?php                            
$sql="select * from qp_kaike_class where qpk_id=".$row2["qpk_id"]." order by kk_id desc limit 0,6"; 
$rs=mysql_query($sql,$conn);
if (mysql_num_rows($rs)>=1){
while($row=mysql_fetch_array($rs,MYSQL_ASSOC)){ 
?>
              <dd><a href="qp_course_detial.php?cl=<?php echo $row["kk_id"];?>"><?php echo $row["kk_title"];?></a></dd>
<?php }}?>
              <h2><a href="qp_course_list.php?cl=<?php echo $row2["qpk_id"];?>">更多..</a></h2>
            </dl>
<?php }}?>
          </div>
        </div>z
      </div>
      <div class="main_right">
        <div class="main_right_box01">
          <div class="main_right_box01_title"> <span>中心介绍</span>
<?php
$sql="select * from qp_zhongxin";
$rs=mysql_query($sql,$conn);
if (mysql_num_rows($rs)>=1){	
$row=mysql_fetch_assoc($rs);
$qp_con=$row["qp_con"];
$npic =$row["npic"];
}?>
          </div>
          <div class="main_right_box01_list00">
        <div class="sharp color1"> <b class="b1"></b><b class="b2"></b><b class="b3"></b><b class="b4"></b>
              <div class="content">
                <div>
                 <img src="../admin_root/<?php echo $npic;?>" onLoad="javascript:if(this.width>=this.height&&this.width>=90){this.width=90};if(this.height>this.width&&this.height>=60){this.height=60};"/>
                 <?php echo utf_substr($row["qp_con"],158);?>.. 
                 </div>
                <h3><a href="qp_new_detial2.php">详细>></a></h3>
              </div>
              <b class="b5"></b><b class="b6"></b><b class="b7"></b><b class="b8"></b> </div>
      </div>
       </div>
        <div class="main_right_box01">
         <div class="main_right_box01_title"> <span>学员问答</span> </div> 
          <div class="main_right_box01_list00">
           <div class="sharp color1"> <b class="b1"></b><b class="b2"></b><b class="b3"></b><b class="b4"></b>
            <div class="content">
             <div>
              <div class="main_box02_right_list03">
<ul>
<?php
$sql="select * from qp_wd where px_bool='1' order by wd_id desc limit 0,3";
$rs=mysql_query($sql);
if (mysql_num_rows($rs)>=1){
while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
?>
<li>
[ 问 ]<font color="#000000"><?php echo utf_substr($row["wd_con"],30);?>..<?php echo $row["wd_ttime"];?></font><br />
[ 答 ]<font color="#000000"><?php echo utf_substr($row["wd_huif"],30);?>..<?php echo $row["wd_htime"];?></font>
</li>
<?php }}?> 
</ul>
                  </div>
                </div>
                <h3><a href="qp_faq.php">更多>></a></h3>
              </div>
              <b class="b5"></b><b class="b6"></b><b class="b7"></b><b class="b8"></b></div>
          </div>
        </div>
      </div>
    </div>
<!-- end main -->
<!-- strat bottom -->
<?php	include_once("bottom.php");?>
<!-- end bottom -->
</div>
</div>
</body>
</html>