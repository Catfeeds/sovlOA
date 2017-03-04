<?php
$web=WebStep::model()->findByPk(12);
?>
<!--[if gte IE 6]><script language="javascript" src="/js/abroad/ie6png.js" type="text/javascript" ></script><![endif]-->
		<div class="main_news">
			<div class="main_news_post00">
				<div class="main_news_pic">
					<?=$web->z_right1?>
				</div>
				<div class="main_news_weizhi">
				<strong>您现在的位置：</strong><a href="<?=Yii::app()->createUrl('abroad/index');?>"><?=$web->z_name;?></a> >> 正文
				</div>
				<div class="main_news_post_text">
					<h1><?=$details->vi_title?></h1>
					<h2>发表于：<?=$details->vi_submitdate?>  作者：<?=$details->vi_author?> 浏览：<?=$details->vi_click?>次</h2><br />
					<span class="text"><?=$details->vi_con?></span>
					<div class="main_news_fhlb">
						<ul>
						  <li><img width="15" height="15" src="/images/top.jpg"><a href="#">TOP</a></li>
						  <li><img width="15" height="15" src="/images/bottom.jpg"><a href="<?=Yii::app()->createUrl("abroad/vnewslist",array("cl"=>$details->vi_class))?>">[返回列表]</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="main_news_sidebar">
				<div class="main_news_sidebar_box01">
					<div class="main_news_sidebar_box01_qq">
<ul>

<?php
					$lx_qq=$web->z_qq;// 网站QQ	
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
							foreach($recnews as $row){
						?>
							<li><strong>[留学热点]</strong><a href="<?=Yii::app()->createUrl('abroad/vnewsdetail',array('id'=>$row->vi_id));?>" title="<?=$row->vi_title?>"><?=Common::strCut($row->vi_title,32)?></a></li>
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
							<li><strong>[热门专业]</strong><a href="#">申请加盟一休教育网地方站</a></li>							
						</ul>
					</div>
				</div>
				<div class="main_news_sidebar_box01">
					<div class="main_news_sidebar_box01_title">
						<span>报名流程</span>
					</div>
					<div class="main_news_sidebar_box01_list">
						<div class="main_news_sidebar_box01_list_pic">
						<?=$web->z_right2?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>