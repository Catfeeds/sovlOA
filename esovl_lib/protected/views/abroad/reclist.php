<?php
$web=WebStep::model()->findByPk(12);
?>
<!--[if gte IE 6]><script language="javascript" src="js/ie6png.js" type="text/javascript" ></script><![endif]-->

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
						   foreach($recnews as $row11){
						?>
						<li><strong>[留学热点]</strong><a href="<?=Yii::app()->createUrl('abroad/newsdetail',array('id'=>$row->i_id));?>" title="<?=$row->i_title?>"><?=Common::strCut($row->i_title,32)?></a></li>
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
						<dt>热门课程推荐</dt>
						<dd>
						<strong>您现在的位置：</strong>
						<a href="/Abroad/">留学频道</a> >> <?=$showcl?>
						</dd>
						</dl>
					</div>
					<div class="main_news_post_box_list">
						<?php
						$pagesize=6;
						$url=$_SERVER["REQUEST_URI"];
						$url=parse_url($url);
						@$url=$url[path];
						$num = $dblink->countByStr('lxkkinfo as a','','lxk_tjbool=1','join lxgjclass as b  on a.lxk_gjid=b.lx_gjid join lxschool as c on a.lxk_sid=c.lxs_id');

						$cp=ceil($num/$pagesize);//函数获取页数

						if(@$_GET[page]){
						$pageval=@$_GET[page];
						$page=($pageval-1)*$pagesize;
						$page.=',';
						}
								@$sql="select * from lxkkinfo as a join lxgjclass as b  on a.lxk_gjid=b.lx_gjid join lxschool as c on a.lxk_sid=c.lxs_id where lxk_tjbool=1 order by lxk_id desc limit $page $pagesize ";
								$res = $dblink->fetchAll($sql);
								foreach($res as $row){		
						?>                 
						<div class="main_news_post_box_list00">
							<div class="main_news_post_box_list00_t">
							<dl>
							<dt><?=$row["lxk_zy"]?></dt>
							<dd>[<font color="red"><?=$row["lxk_xuefei"]?></font>]</dd><dd>[<?=$row["lx_gjcl"]?>]</dd>
                            <dd>[<a href="lx_abroad.php?sid=<?=$row["lxk_sid"]?>"><?=$row["lxs_name"]?></a>]</dd>
							</dl>
							</div>
							<div class="main_news_post_box_list00_l"><?=$Common->strCut(strip_tags($row["lxk_con"]),280)?>..   <a href="lx_course.php?kid=<?=$row["lxk_id"]?>">查看详情>></a></div>
						</div>
                        
				<?php }?>                    

					</div>
					<div class="main_news_post_box_fy">
						<ul>                           
						<?php
						if($num > $pagesize){
						 if(@$pageval<=1)$pageval=1;
						 if(@$_GET["page"]!=""&&@$_GET["page"]>1){
						echo" <li><a href=$url?page=".($pageval-1)." class='width48'>上一页</a></li>";
						}
							for ($i=1;$i<=$cp;$i++){
								 if ($i==@$_GET["page"]){
								 echo "<li><a href='#' class='fy_bg'>".$i."</a></li>";
								 }else{
								 echo "  <li><a href=$url?page=".$i.">".$i."</a></li>  ";
								 }
							}
						if(@$_GET["page"]<$cp){
						echo " <li><a href=$url?page=".($pageval+1)." class='width48'>下一页</a></li>";
						}
						} 
						?>
						</ul>
					</div>
				</div>
			</div>
		</div>