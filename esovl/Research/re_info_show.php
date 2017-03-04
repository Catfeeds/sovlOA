<?php 
include_once("../conn.php");
include_once("../webstep.php");
?>
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
			mysql_query("update yx_news set nclick=nclick+1 where news_id=".$_GET["id"],$conn);//更新浏览次数
			$sql="select * from yx_news where news_id=".$_GET["id"];
			$rs=mysql_query($sql);
			$coun=mysql_num_rows($rs);
	/*		if ($coun>=1){*/
			$row=mysql_fetch_array($rs,MYSQL_ASSOC);
			$news_id=$row["news_id"];
			$class_name=$row["class_name"];
			$news_title=$row["news_title"];
			$news_con=$row["news_con"];
			$nclick=$row["nclick"];
			$nbool=$row["nbool"];
			$ndate=$row["ndate"];

			  $rs1=mysql_query("select class_name from yx_news_class where class_id=".$row["class_name"]);
				  $row1=mysql_fetch_array($rs1,MYSQL_ASSOC);
				  $ction=$row1["class_name"];              
/*		
			}else{
			exit("对不起，没有找到相关信息！");
			}
			mysql_free_result($rs1);
			mysql_free_result($rs);*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $yx_title;?></title>
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
						$sql3="select * from yx_news where nbool='1' order by ndate desc limit 0,6";
						$rs=mysql_query($sql3);
						if (mysql_num_rows($rs)>=1){
							while ($row4=mysql_fetch_array($rs,MYSQL_ASSOC)){
						?>
		                <dl><dd><a href="re_news_show.php?id=<?php echo $row4["news_id"];?>"><?php echo utf_substr($row4["news_title"],26);?>..</a></dd><dt><?php echo $row["ndate"];?></dt></dl>
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
						<div class="zxkb_pic"><img src="images/yx_gg01.jpg" width="241" height="104" /></div>
						 <div class="zxkb_list">
                         				         <?php 
						$sq2="select * from yx_news where class_name='9' and nbool='1' limit 0,6";
						$rs=mysql_query($sq2);
						if (mysql_num_rows($rs)>=1){
						while ($row1=mysql_fetch_array($rs,MYSQL_ASSOC)){
						?>
						<dl><dd><a href="re_news_show.php?id=<?php echo $row1["news_id"];?>"><?php echo utf_substr($row1["news_title"],26);?>..</a></dd><dt><?php echo $row1["ndate"];?></dt></dl>
                        <?php }}?>
						</div>
					</div>
					<div class="main_box01_right_bottom"><img src="images/right1_bottombg.jpg" /></div>
					</div>
       			 </div>
            <div class="main_box03_02_right_dh"><strong>您的位置：<a href="#">一修教育网</a> &gt;<a href="re_news_list.php?cl=<?php echo $row["class_name"];?>"><?=$ction?></a> &gt; 新闻详细</strong></div>    
                
<div class="main_box03_02_right">
					<div class="main_box03_01_left_03"><img src="images/left1_topbg.jpg" /></div>
					<div class="main_box03_01_left_02_newlist">
<div class="main_box03_01_left_02_newlist00">           
               <dl>
                 
                  <!--/*<dd class="main_box03_01_rigth_list02"><a href="#">2010年专本科考试逻辑基础练7</a></dd>
                  <dd class="main_box03_01_rigth_list03">2011-05-06</dd>*/-->
                  
            <h1><?php echo utf_substr($row["news_title"],48);?></h1>
            <h2>发表于：<?php echo $row["ndate"];?>来源：一休网 浏览：<?php echo $nclick;?></h2>
                <dd class="main_box03_01_rigth_dt"><?php echo $row["news_con"];?></dd>
              </dl>
</div>                                     
          <div class="main_box03_01_rigth_list05"><img src="images/222.gif" width="7" height="8" />  <a href="#">Top</a></div>
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