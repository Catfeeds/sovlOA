<?php
include_once("../web_start.php");
$web=getWeb("12");

$dblink->query("update lxsdnews set lx_sdclick=lx_sdclick+1 where lx_sdid=".$_GET["id"]);
$row = $dblink->find('lxsdnews','',"lx_sdid=".$_GET["id"]);
$lx_sdtitle=$row["lx_sdtitle"];
$lx_sdscl=$row["lx_sdscl"];
$lx_sdcon=$row["lx_sdcon"];
$lx_sdsource=$row["lx_sdsource"];
$lx_sdclick=$row["lx_sdclick"];
$lx_sdate=$row["lx_sdate"];	  

$rowk = $dblink->find('lxsclass','',"ls_id=".$lx_sdscl);
$stitle=$rowk["ls_title"];	

$web['z_title'] = $lx_sdtitle.'--'.$stitle;
include_once('Abroad_header.php');
?>

<!--[if gte IE 6]><script language="javascript" src="js/ie6png.js" type="text/javascript" ></script><![endif]-->
<body>
<div class="wrapper">
	<!-- top -->
	<?php include("lxtop.php");?>
	<!-- top end -->
	<!-- main -->
	<div class="main">
		<?php include("gqtop.php");?>
		<div class="main_news">
			<div class="main_news_post00">
				<div class="main_news_pic">
					<?=$web['z_right1']?>
				</div>
				<div class="main_news_weizhi">
				<strong>您现在的位置：</strong><a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/"><?=$z_name?></a> >> <a href="/Abroad/">留学频道</a> >> <a href="lx_sdnews_list.php?sid=<?=$lx_sdscl?>"><?=$stitle?></a> >> 正文
				</div>
				<div class="main_news_post_text">
					<h1><?=$lx_sdtitle?></h1>
					<h2>发表于：<?=$lx_sdate?>  来源：<?=$lx_sdsource?> 浏览：<?=$lx_sdclick?>次</h2><br />

					<span class="text"><?=$lx_sdcon?></span>
					<div class="main_news_fhlb">
						<ul>
						  <li><img width="15" height="15" src="images/top.jpg"><a href="#">TOP</a></li>
						  <li><img width="15" height="15" src="images/bottom.jpg"><a href="lx_sdnews_list.php?sid=<?=$lx_sdscl?>">[返回列表]</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="main_news_sidebar">
				<div class="main_news_sidebar_box01">
					<div class="main_news_sidebar_box01_qq">
<ul>
<?php
					$lx_qq=$web["z_qq"];// 网站QQ	
					$lx_qq=explode(",",$lx_qq); //分割QQ
					$qcount=count($lx_qq);
                    if($qcount>=4){
					    for ($i=0;$i<=3;$i++){
						echo "<li><a title='在线咨询1' href='tencent://message/?uin=".$lx_qq[$i]."&amp;Site=一休教育网&amp;Menu=yes'><img border='0' align='top' src='http://wpa.qq.com/pa?p=1:".$lx_qq[$i].":1'></a></li>";
						}
					}else{
						for ($i=0;$i<=$qcount-1;$i++){
						echo "<li><a title='在线咨询1' href='tencent://message/?uin=".$lx_qq[$i]."&amp;Site=一休教育网&amp;Menu=yes'><img border='0' align='top' src='http://wpa.qq.com/pa?p=1:".$lx_qq[$i].":1'></a></li>";
						}
						}
				  ?>
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
		<li><strong>[留学热点]</strong><a href="lx_news_detail.php?id=<?=$row11["lx_nid"]?>" title="<?=$row11["lx_ntitle"]?>"><?=$Common->strCut($row11["lx_ntitle"],32)?></a></li>
<?php }?>
						</ul>
					</div>
				</div>
				<div class="main_news_sidebar_box01">
				  <div class="main_news_sidebar_box01_title">
						<span>报名流程</span>
				  </div>
					<div class="main_news_sidebar_box01_list">
						<div class="main_news_sidebar_box01_list_pic">
						<?=$web['z_right2']?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- main end -->
	<!-- bottom -->
	<?php include("lxbottom.php");?>
	<!-- bottom end -->
</div>
</body>
</html>