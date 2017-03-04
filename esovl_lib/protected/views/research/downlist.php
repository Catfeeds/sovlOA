<?php
$sql="select * from yx_step where yx_id=1";
		$rs=mysql_query($sql,$conn);
		
		if (mysql_num_rows($rs)>=1){	
		    $row=mysql_fetch_assoc($rs);
						$yx_name=$row["yx_name"];
						$yx_title=$row["yx_title"];
						$yx_Keyword=$row["yx_Keyword"];
						$yx_Description=$row["yx_Description"];
						
						$yx_qq=$row["yx_qq"];
						$yx_logo=$row["yx_logo"];
						$yx_gg=$row["yx_gg"];
}
?>
<?php
$sql="select * from yx_hd where hd_id=8";
		$rs=mysql_query($sql,$conn);
		
		if (mysql_num_rows($rs)>=1){	
		    $row=mysql_fetch_assoc($rs);
						$hd_link3=$row["hd_link3"];
						$hd_pic3=$row["hd_pic3"];

						
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>研修下载列表页</title>
<meta name="keywords" content="<?php echo $yx_Keyword?>" />
<meta name="description" content="<?php echo $yx_Description?>" />
<link href="css/yxcss.css" rel="stylesheet" type="text/css" />
<link href="css/yxtop.css" rel="stylesheet" type="text/css" />
<link href="css/yxmain.css" rel="stylesheet" type="text/css" />
<link href="css/yxbottom.css" rel="stylesheet" type="text/css" />
<!--[if gte IE 6]><script language="javascript" src="js/ie6png.js" type="text/javascript" ></script><![endif]-->
<script language="javascript" src="js/yx_nav.js" type="text/javascript" ></script>
</head>
<body>
<div class="wrapper">
<!-- top -->
	<?php include('yx_top.html'); ?>
<!-- top end -->
<!-- main -->
	<div class="main">
	  <div class="main_box01">
		  <img src="images/ggpic.jpg" />
	  </div>
<div class="main_box03">
<div class="main_box03_01">
        <div class="main_box03_02_left">
			<div class="main_box03_02_lefta">
					<div class="main_box01_right_top">
						<dl>
						<dt>热点推荐</dt>
                         <?php
						$sql="select * from yx_news where news_id=10";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							$rowa=mysql_fetch_array($rs,MYSQL_ASSOC);
							}
						?>
						<dd><a href="re_news_list.php?cl=<?php echo $rowa["news_id"];?>">MORE>></a></dd>
						</dl>
					</div>
					<div class="zxkb">
					  <div class="zxkb_list">
                                              <?php
						$sql="select * from yx_news where nbool='1' order by ndate desc limit 0,6";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
						?>
		                <dl><dd><a href="re_news_show.php?id=<?php echo $row["news_id"];?>"><?php echo utf_substr($row["news_title"],26);?>..</a></dd><dt><?php echo $row["ndate"];?></dt></dl>
						<?php }}?>
                        </div>
					</div>
					<div class="main_box01_right_bottom"><img src="images/right1_bottombg.jpg" /></div>
				</div>
            <div class="main_box03_02_leftb">
					<div class="main_box01_right_top">
						<dl>
						<dt>一休网快报</dt>
                        <?php
						$sql="select * from yx_news where news_id=9";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							$rowa=mysql_fetch_array($rs,MYSQL_ASSOC);
							}
						?>
						<dd><a href="re_news_list.php?cl=<?php echo $rowa["news_id"];?>">MORE>></a></dd>
						</dl>
					</div>
					<div class="zxkb">
						<div class="zxkb_pic"><a href="<?php echo $hd_link3?>"><img src="../admin_root/<?php echo $hd_pic3;?>" /></a></div>
						 <div class="zxkb_list">
				                             <?php 
						$sql="select * from yx_news where class_name='9' and nbool='1' limit 0,4";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
						while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
						?>
				            <dl><dd><a href="re_news_show.php?id=<?php echo $row["news_id"];?>"><?php echo utf_substr($row["news_title"],26);?>..</a></dd><dt><?php echo $row["ndate"];?></dt></dl>
                            <?php }}?>
						</div>
					</div>
					<div class="main_box01_right_bottom"><img src="images/right1_bottombg.jpg" /></div>
				</div>
        </div>
<div class="main_box03_02_right_dh"><strong>您的位置：<a href="#">一修教育网</a> > <a href="#">研修</a> > <?=$ction?></strong></div>
<div class="main_box03_02_right">
<div class="main_box03_01_left_03"><img src="images/left1_topbg.jpg" /></div>
<div class="main_box03_01_left_02_newlist">

<div class="yx_down_list">
<?php
$pagesize=10;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("SELECT * FROM yx_down");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from yx_down where down_id order by down_id desc limit $page $pagesize ";     
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	  
	 if (mysql_num_rows($rs)>=1){
	 $i=0;
	 while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
     $i=$i+1;	 
?>
	<dl>
    <dt><?php echo utf_substr($row["down_title"],36);?></dt>
    <dd><a href="../admin_root/<?php echo $row["w_con"];?>"><img src="images/yx_xz.jpg" /></a></dd>
    </dl>
<?php }}?> 
</div>
                                   
<div class="main_box03_01_rigth_list04">
<ul>
<?php
echo"<li class='fy01'> <a href=$url?page=".(1).">首页</a></li>";
if($num > $pagesize){
if(@$pageval<=1)$pageval=1;


  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo"<li> <a  class='fy01'href=$url?page=".($pageval-1).">上一页</a></li>";
}else{
	echo "<li>下一页</li>";
	}
    for ($i=1;$i<=$cp;$i++){
	     if ($i==@$_GET["page"]){
		 echo " <li>".$i."</li> ";
		 }else{
	     echo "<li> <a  class='aover' href=$url?page=".$i.">[".$i."]</a> </li>";
		 }
	}
if(@$_GET["page"]<$cp){
echo "<li > <a class='fy01' href=$url?page=".($pageval+1).">下一页</a></li>";
}else{
	echo "<li>下一页</li>";
	}

} 
echo "<li> <a  class='fy01'href=$url?page=".($cp).">末页</a></li>";
?>
          <!--<ul>
          <li><a href="#" class="fy01">首页</a></li>
          <li><a href="#" class="fy01">上一页</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#" class="aover">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#" class="fy01">下一页</a></li>
          <li><a href="#" class="fy01">尾页</a></li>
          </ul>
   --></ul>
          </div>
</div>
<div class="main_box03_01_left_03"><img src="images/left1_bottombg.jpg" /></div>
</div>
</div>
</div>
</div>
<!-- main end -->

<!-- bottom -->
	<?php include('yx_bottom.html'); ?>
<!-- bottom end -->	
</div>
</body>
</html>