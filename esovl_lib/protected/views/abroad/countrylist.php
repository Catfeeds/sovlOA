<?php
$web=WebStep::model()->findByPk(12);
?>
		<div class="main_news">
			<div class="main_news_post00">
				<div class="main_news_pic">
					<a href="#"><img src="/images/gg_pic.jpg" border="0" /></a>
				</div>
				<div class="main_news_weizhi">
					<strong>您现在的位置：</strong><a href="<?=Yii::app()->createUrl('abroad/index')?>">留学频道</a> >> 留学国家
				</div>
				<div class="main_news_post_text">
					<h1>留学国家</h1>
					<div class="country_a">
						<ul>
							<!-- pic size:115*55px -->
							<?php
							foreach($countryall as $row){
							?>
							<li><img src="/admin_root/<?=$row["ic_icon"]?>" onLoad="javascript:if(this.width>=this.height&&this.width>=25){this.width=25};if(this.height>this.width&&this.height>=17){this.height=17};"/><span><a href="<?=Yii::app()->createUrl('abroad/school',array('id'=>$row["ic_id"]))?>"><?=$row["ic_class"]?></a></span></li>
							<?php }?>
						</ul>
					</div>		
					<div class="main_news_fhlb">
						<ul>
						  <li><img width="15" height="15" src="/images/top.jpg"><a href="#">TOP</a></li>
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
							   $k=0;
							foreach($hotrec as $row11){
							   $k=$k+1;
						?>
						<li><strong>[留学热点]</strong><a href="<?=Yii::app()->createUrl('abroad/newsdetail',array('id'=>$row11["i_id"]))?>" title="<?=$row11["i_title"]?>"><?=Common::strCut(strip_tags($row11["i_title"]),32)?></a></li>
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