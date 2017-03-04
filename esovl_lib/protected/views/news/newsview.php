<?=$this->renderPartial("_newsleft",array("NclassModel"=>$NclassModel));?>
<div class="main_news_right">
    <div class="main_news_right_detail">
		<div class="main_news_right_detail_box01">
			<div class="main_news_right_detail_box01_left"> <span>资讯</span> </div>
			<div class="main_news_right_detail_box01_right"> 
				您现在的位置：<a href="/">首页</a> >> 
				<a href="<?=Yii::app()->createUrl("news/index")?>">资讯中心</a> >>
				<a href="<?=Yii::app()->createUrl("news/newslist",array("id"=>$NclassModel->ic_id))?>"><?=Icolumn::model()->getNameByid($NclassModel->ic_id)?></a> >>
				<?php if($newsModel->i_label&&Icolumn::model()->getNameByid($newsModel->i_label)){?>
					<a href="<?=Yii::app()->createUrl("news/newslist",array("id"=>$newsModel->i_label))?>"><?=Icolumn::model()->getNameByid($newsModel->i_label)?></a> >>
				<?php }?>
				<strong>详细</strong>
			</div>
		</div>
		<div class="main_news_right_detail_box02">
			<h1><?php //echo $ntitle;?><?php echo $newsModel->i_title;?></h1>
			<h2>发表于：<?php echo $newsModel->i_submitdate?date('Y-m-d H:i:s',$newsModel->i_submitdate):"";?>  作者：<?php echo $newsModel->i_author;?>来源：一休网 浏览：<?php echo $newsModel->i_click;?>次</h2>
			<h2>
				<!--Passit BUTTON BEGIN-->
				<div class="passit_def_div"><a class="passit_default" target="_blank">分享到 :</a></div>
				<script type="text/javascript">
					var passit_title = "";//自定义分享标题，删除和留空表示使用默认
					var passit_url = "";//自定义分享网址，删除和留空表示使用默认
					var passit_content= "";//自定义分享内容，删除和留空表示使用默认Meta中的描述
					var passit_image= "";//自定义分享图片，删除和留空表示不分享图片
					var sina_appkey= "";//sina微博appkey,删除和留空表示使用默认
					var qq_appkey= "";//腾讯微博appkey,删除和留空表示使用默认
				</script>
				<script type="text/javascript">
					bookmark_service_div="qq,kxzt,qqxy,baiduHi,bookmark,baidu,douban,sohuweibo,163weibo,more";
					bookmark_service="share,sinaweibo,qqweibo,tianysq,yahoo,qqkj,xnzt,more";
				</script>
				<script type="text/javascript" src=" http://www.passit.cn/js/passit_default_bar_new.js?pub=8630&simple=1" charset="UTF-8"></script>
				<!--Passit BUTTON END-->
			</h2>
			<div class="main_news_right_detail_box02_text"><?php echo $newsModel->i_con;?></div>
		</div>
		<div class="main_news_right_detail_box03">
			<ul>
				<li><img src="images/top.jpg" width="15" height="15" /><a href="#">TOP</a></li>
				<li><img src="images/bottom.jpg" width="15" height="15" /><a href="<?=Yii::app()->createUrl("news/newslist",array("id"=>$newsModel->i_class))?>">[返回列表]</a></li>
			</ul>
		</div>
        <div><script type="text/javascript" id="wumiiRelatedItems"></script></div>
    </div>
</div>
<script type="text/javascript">
    var wumiiPermaLink = ""; //请用代码生成文章永久的链接
    var wumiiTitle = ""; //请用代码生成文章标题
    var wumiiTags = ""; //请用代码生成文章标签，以英文逗号分隔，如："标签1,标签2"
    var wumiiSitePrefix = " http://www.esovl.com/";
    var wumiiParams = "&num=5&mode=3&pf=JAVASCRIPT";
</script>
<script type="text/javascript" src=" http://widget.wumii.com/ext/relatedItemsWidget.htm"></script>