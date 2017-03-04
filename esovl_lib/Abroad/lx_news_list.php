<?php
include_once("../web_start.php");
$web=getWeb("12");

$getcl=$_GET["cl"];
switch($getcl){
	case"0":
	   $showcl="各国资讯";
	   break;	
	case"cgal":
	   $showcl="成功案例";
		break;	
	case"hggl":
	   $showcl="回国归来";
		break;	
	case"mjhw":
	   $showcl="漫镜海外";
		break;	
	case"ymhw":
	   $showcl="移民海外";
		break;	
	case"hwsh":
	   $showcl="海外生活";
		break;		
	case"msjz":
	   $showcl="面试讲座";
		break;
	}	

	$web['z_title'] = $showcl.'--留学频道';
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
			<div class="main_news_sidebar">
				<div class="main_news_sidebar_box01">
					<div class="main_news_sidebar_box01_title">
						<span>留学资讯分类</span>
					</div>
					<div class="main_news_sidebar_box01_list">
						<div class="main_news_sidebar_box01_list00">
<div class="nav_sub_box margin15">
<dl>
<dt><img src="images/lx_t01.jpg" /></dt>
<dd>
<a href="lx_news_list.php?cl=0">热门资讯</a>
<a href="lx_news_list.php?cl=msjz">面试讲座</a>
<a href="country_gq_list.php">留学国家</a>
<a href="lx_rdtj_list.php">热点推荐</a>
</dd>
</dl>
</div>
<div class="nav_sub_box margin15">
<dl>
<dt><img src="images/lx_t02.jpg" /></dt>
<dd>
<a href="sdnews_blist.php?bid=1">留学宝典</a>
<a href="sdnews_blist.php?bid=2">留学考试</a>
<a href="lx_news_list.php?cl=hwsh">海外生活</a>
<a href="lx_sdnews_list.php?sid=41">留学申请</a>
<a href="lx_sdnews_list.php?sid=44">奖学金</a>
</dd>
</dl>
</div>
<div class="nav_sub_box margin15">
<dl>
<dt><img src="images/lx_t03.jpg" /></dt>
<dd>
<a href="lx_news_list.php?cl=cgal">成功案例</a>
<a href="lx_news_list.php?cl=hggl">回国归来</a>
<a href="lx_news_list.php?cl=mjhw">漫镜海外</a>
<a href="lx_news_list.php?cl=ymhw">移民海外</a>
</dd>
</dl>
</div>
						</div>
					</div>
				</div>
				<div class="main_news_sidebar_box01">
					<div class="main_news_sidebar_box01_title">
						<span>热点推荐</span>
					</div>
					<div class="main_news_sidebar_box01_list">
						<ul>							
<?php
   $res = $dblink->findAll('lxnews','','lx_nbool=1','','10');
   
	   $k=0;
   foreach($res as $row11){
	   $k=$k+1;
?>
<li><strong>[留学热点]</strong><a href="lx_news_detail.php?id=<?=$row11["lx_nid"]?>" title="<?=$row11["lx_ntitle"]?>"><?=$Common->strCut(strip_tags($row11["lx_ntitle"]),38)?></a></li>
<?php }?>
						</ul>
					</div>
				</div>
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
			</div>
            
			<div class="main_news_post">
				<div class="main_news_post_box">
					<div class="main_news_post_box_title">
						<dl>
						<dt>考试学习资讯</dt>
						<dd>
						<strong>您现在的位置：</strong>
						<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/"><?=$z_name?></a> >> <a href="/Abroad/">留学频道</a> >> <?=$showcl?>
						</dd>
						</dl>
					</div>
					<div class="main_news_post_box_list">
                    
<?php
$pagesize=6;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$num = $dblink->countByStr('lxnews','',"lx_ncl='".$_GET["cl"]."'");
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="SELECT * FROM lxnews where lx_ncl='".$_GET["cl"]."' order by lx_nid desc limit $page $pagesize ";
	  $res = $dblink->fetchAll($sql); 
	 foreach($res as $row){		
?>
                    
						<div class="main_news_post_box_list00">
							<div class="main_news_post_box_list00_t">
							<dl>
							<dt><a href="lx_news_detail.php?id=<?=$row["lx_nid"]?>" title="<?=$row["lx_ntitle"]?>"><?=$row["lx_ntitle"]?></a></dt>
							<dd><?=date("Y-m-d", strtotime($row["lx_ndate"]));?></dd>
							</dl>
							</div>
				<div class="main_news_post_box_list00_l"><?=$Common->strCut(strip_tags($row["lx_ncon"]),280)?> <a href="lx_news_detail.php?id=<?=$row["lx_nid"]?>">查看详细>></a>
							</div>
						</div>
                        
<?php }?>                    

					</div>
					<div class="main_news_post_box_fy">
						<ul>                           
<?php
if($num > $pagesize){
 if(@$pageval<=1)$pageval=1;
 if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <li><a href=$url?cl=".$_GET["cl"]."&page=".($pageval-1)." class='width48'>上一页</a></li>";
}
    for ($i=1;$i<=$cp;$i++){
	     if ($i==@$_GET["page"]){
		 echo "<li><a href='#' class='fy_bg'>".$i."</a></li>";
		 }else{
	     echo "  <li><a href=$url?cl=".$_GET["cl"]."&page=".$i.">".$i."</a></li>  ";
		 }
	}
if(@$_GET["page"]<$cp){
echo " <li><a href=$url?cl=".$_GET["cl"]."&page=".($pageval+1)." class='width48'>下一页</a></li>";
}
} 
?>
						</ul>
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