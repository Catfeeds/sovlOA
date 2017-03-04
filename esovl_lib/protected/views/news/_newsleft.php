<div class="main_news_left">
	<div class="main_news_left_box01">
		<div class="main_news_left_box01_title">
			<img src="/images/info.jpg" />
		</div>
		<div class="main_news_left_box01_list">
			<div class="main_news_left_box01_list_title">全部资讯</div>
			<div class="main_news_left_box01_list_text">
				<ul>
			   <?php
					$ar = array(
						'学历信息'=>'1',
						'培训信息'=>'2',
						'研修信息'=>'3',
						'学校新闻'=>'65'
					);
					foreach($ar as $key=>$row){
				?>
				<li><img src="/images/dot03.jpg" /><a href="<?=Yii::app()->createUrl('news/newslist',array('id'=>$row))?>" title="<?php echo $key;?>"><?php echo $key;?></a></li>
				<?php }?>
				<li><img src="/images/dot03.jpg" /><a href="<?=Yii::app()->createUrl("news/newslist",array("order"=>"hot"))?>" title="热点资讯">热点资讯</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="main_news_left_box02">
		<div class="main_news_left_box02_title"><span>热点新闻</span></div>
		<div class="main_news_left_box02_list">
			<ul>
				<?php
					$sql = Information::model()->getAllByid('',5,"i_submitdate desc",true);
					foreach($sql as $row){
				?>
				<li><span>.</span><a href="<?=Yii::app()->createUrl("news/newsview",array('id'=>$row['i_id']))?>" title="<?php echo $row["i_title"];?>"><?php echo $row["i_title"];?></a></li>
				<?php }?>
			</ul>
		</div>
	</div>
</div>