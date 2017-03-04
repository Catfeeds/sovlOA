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
						<dt><img src="/images/lx_t01.jpg" /></dt>
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
						<dt><img src="/images/lx_t02.jpg" /></dt>
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
						<dt><img src="/images/lx_t03.jpg" /></dt>
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
						   //$res = $dblink->findAll('lxnews','','lx_nbool=1','','10');
						   
						   foreach($recnews as $row11){
						?>
						<li><strong>[留学热点]</strong><a href="<?=Yii::app()->createUrl("abroad/newsdetail",array("id"=>$row11['i_id']));?>" title="<?=$row11["i_title"]?>"><?=Common::strCut(strip_tags($row11["i_title"]),38)?></a></li>
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
						<a href="<?=Yii::app()->createUrl("abroad/index");?>">留学频道</a> >> <?=$ic_class?>
						</dd>
						</dl>
					</div>
					<div class="main_news_post_box_list">
                    
						<?php
							  //@$sql="SELECT * FROM lxnews where lx_ncl='".$_GET["cl"]."' order by lx_nid desc limit $page $pagesize ";
							  $res = $dataProvider->getData();
							 foreach($res as $row){		
						?>
                    
						<div class="main_news_post_box_list00">
							<div class="main_news_post_box_list00_t">
							<dl>
							<dt><a href="<?=Yii::app()->createUrl("abroad/newsdetail",array("id"=>$row["i_id"]))?>" title="<?=$row["i_title"]?>"><?=$row["i_title"]?></a></dt>
							<dd><?=date("Y-m-d", strtotime($row["i_submitdate"]));?></dd>
							</dl>
							</div>
							<div class="main_news_post_box_list00_l"><?=Common::strCut(strip_tags($row["i_con"]),280)?> <a href="<?=Yii::app()->createUrl("abroad/newsdetail",array("id"=>$row["i_id"]))?>">查看详细>></a>
							</div>
						</div>
                        
<?php }?>                    

					</div>
					<div class="main_news_post_box_fy">
						                     
						<?php	
							$this->widget('CLinkPager',array(
									'pages'=>$dataProvider->pagination,
									"cssFile"=>"/css/pager.css"
							));
						?>
					</div>
				</div>
			</div>
		</div>