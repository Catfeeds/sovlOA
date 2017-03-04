<?php
include_once("../web_start.php");
$web=getWeb("12");

$rowk = $dblink->find('lxbclass','',"lb_id=".$_GET["bid"]);
$btitle=$rowk["lb_title"];			

$web['z_title'] = '热门课程--'.$z_name;
include_once('Abroad_header.php');
?>

<!--[if gte IE 6]><script language="javascript" src="js/ie6png.js" type="text/javascript" ></script><![endif]-->
<body>
<div class="wrapper">
	<!-- top -->
	<?php include("lxtop.php"); ?>
	<!-- top end -->
	<!-- main -->
	<div class="main">
		<div class="main_news">
			<div class="main_news_post00">
				<div class="main_news_pic">
					<a href="#"><img src="images/gg_pic.jpg" border="0" /></a>
				</div>
				<div class="main_news_weizhi">
					<strong>您现在的位置：</strong>
						<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/"><?=$z_name?></a> >> <a href="/Abroad/">留学频道</a> >> <?=$btitle?>
				</div>
				<div class="main_news_post_box">
					<div class="main_news_post_box_title">
						<dl>
						<dt><?=$btitle?>列表</dt>						
						</dl>
					</div>
					<div class="main_news_post_box_list">
                    
<?php
	  $res = $dblink->findAll('lxsclass','',"lb_id=".$_GET["bid"],'','','ls_id asc');
	  
	 foreach($res as $row){		
?>
                    
						<div class="main_news_post_box_list00">
							<div class="main_news_post_box_list00_t">
							<dl>
							<dt><a href="lx_sdnews_list.php?sid=<?=$row["ls_id"]?>" title="<?=$row["ls_title"]?>"><?=$row["ls_title"]?></a></dt>							
							</dl>
							</div>
				<div class="main_news_post_box_list00_l">
                 <?php
				  $res14 = $dblink->findAll('lxsdnews','',"lx_sdscl=".$row["ls_id"],'','0,6','lx_sdid asc');
				  foreach($res14 as $row14){					     					            
                 ?> 
<span class="sdn"><a href="lx_sdnews_detail.php?id=<?=$row14["lx_sdid"]?>"><?=$row14["lx_sdtitle"]?></a>　　<?=date("Y-m-d", strtotime($row14["lx_sdate"]));?></span><?php }?>
				</div>         
						</div>
                        
<?php }?>                    

					</div>

				</div>
			</div>
			<div class="main_news_sidebar">
				<div class="main_news_sidebar_box01">
					<div class="main_news_sidebar_box01_qq">
<ul>
<li><a title="在线咨询1" href="tencent://message/?uin=313865736&amp;Site=一休教育网&amp;Menu=yes"><img border="0" align="top" src="http://wpa.qq.com/pa?p=1:313865736:1"></a></li>
<li><a title="在线咨询2" href="tencent://message/?uin=540395592&amp;Site=一休教育网&amp;Menu=yes"><img border="0" align="top" src="http://wpa.qq.com/pa?p=1:540395592:1"></a></li>
<li><a title="在线咨询1" href="tencent://message/?uin=313865736&amp;Site=一休教育网&amp;Menu=yes"><img border="0" align="top" src="http://wpa.qq.com/pa?p=1:313865736:1"></a></li>
<li><a title="在线咨询2" href="tencent://message/?uin=540395592&amp;Site=一休教育网&amp;Menu=yes"><img border="0" align="top" src="http://wpa.qq.com/pa?p=1:540395592:1"></a></li>
</ul>						
					</div>
				</div>
				<div class="main_news_sidebar_box01">
					<div class="main_news_sidebar_box01_title">
						<span>热点推荐</span>
					</div>
					<div class="main_news_sidebar_box01_list">
						<ul>
<?php
	$res = $dblink->findAll('lxnews','','lx_nbool=1','','8');
	   $k=0;
   foreach($res as $row11){
	   $k=$k+1;
?>
		<li><strong>[留学热点]</strong><a href="lx_news_detail.php?id=<?=$row11["lx_nid"]?>" title="<?=$row11["lx_ntitle"]?>"><?=$Common->strCut($row11["lx_ntitle"],47)?></a></li>
<?php }?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- main end -->
	<!-- bottom -->
	<?php include("lxbottom.php"); ?>
	<!-- bottom end -->
</div>
</body>
</html>