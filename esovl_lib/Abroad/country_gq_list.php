<?php
include_once("../web_start.php");
$web=getWeb("12");
$web['z_title'] = '留学国家'.'--'.$web['z_name'];
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
					<strong>您现在的位置：</strong><a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/"><?=$z_name?></a> >> <a href="/Abroad/">留学频道</a> >> 留学国家
				</div>
				<div class="main_news_post_text">
					<h1>留学国家</h1>
<div class="country_a">
<ul>
<!-- pic size:115*55px -->
<?php
$res = $dblink->findAll('lxgjclass','',"lx_gqico!=''",'','','lx_gjid asc');
foreach($res as $row){
?>
<li><img src="/admin_root/<?=$row["lx_gqico"]?>" onLoad="javascript:if(this.width>=this.height&&this.width>=25){this.width=25};if(this.height>this.width&&this.height>=17){this.height=17};"/><span><a href="country_school.php?gjid=<?=$row["lx_gjid"]?>"><?=$row["lx_gjcl"]?></a></span></li>
<?php }?>


</ul>
</div>		
					<div class="main_news_fhlb">
						<ul>
						  <li><img width="15" height="15" src="images/top.jpg"><a href="#">TOP</a></li>
						</ul>
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
<li><strong>[留学热点]</strong><a href="lx_news_detail.php?id=<?=$row11["lx_nid"]?>" title="<?=$row11["lx_ntitle"]?>"><?=$Common->strCut(strip_tags($row11["lx_ntitle"]),32)?></a></li>
<?php }?>
						
						</ul>
					</div>
				</div>
				<div class="main_news_sidebar_box01">
					<div class="main_news_sidebar_box01_title">
						<span>学校推荐</span>
					</div>
					<div class="main_news_sidebar_box01_list">
						<ul>
							<li><strong>[留学热点]</strong><a href="#">申请加盟一休教育网地方站</a></li>
							<li><strong>[留学热点]</strong><a href="#">申请加盟一休教育网地方站</a></li>
							<li><strong>[留学热点]</strong><a href="#">申请加盟一休教育网地方站</a></li>
							<li><strong>[留学热点]</strong><a href="#">申请加盟一休教育网地方站</a></li>
							<li><strong>[留学热点]</strong><a href="#">申请加盟一休教育网地方站</a></li>
							<li><strong>[留学热点]</strong><a href="#">申请加盟一休教育网地方站</a></li>
							<li><strong>[留学热点]</strong><a href="#">申请加盟一休教育网地方站</a></li>
							<li><strong>[留学热点]</strong><a href="#">申请加盟一休教育网地方站</a></li>
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