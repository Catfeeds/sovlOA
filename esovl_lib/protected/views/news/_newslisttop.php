<!--所处位置Begin-->
<div class="main_news_right_box01">
	<ul>
		<li>您现在的位置：</li>
		<li><a href="/">一休网</a><span>>></span></li>
		<li><a href="<?=Yii::app()->createUrl("news/index")?>">资讯中心</a><span>>></span></li>
		<?php 	if($Nclass&&$Nclass->ic_pid!=="0"){
					if($Nclass->ic_type=="tags"){
						$PNclModel=Icolumn::model()->find("ic_id ='{$Nclass->ic_pid}'");
		?>
						<li><a href="<?=Yii::app()->createUrl("news/newslist",array("id"=>$PNclModel->ic_pid))?>"><?=Icolumn::model()->getNameByid($PNclModel->ic_pid)?></a></li><li><span>>></span></a></li>
		<?php 		}?>
					<li><a href="<?=Yii::app()->createUrl("news/newslist",array("id"=>$Nclass->ic_pid))?>"><?=Icolumn::model()->getNameByid($Nclass->ic_pid)?></a></li><li><span>>></span></a></li>
		<?php 	}else{ }?>
		<li><?php if($Nclass){?><a href="<?=Yii::app()->createUrl("news/newslist",array("id"=>$Nclass->ic_id))?>"><?=Icolumn::model()->getNameByid($Nclass->ic_id)?></a><?php }else{echo "全部";}?></li>
	</ul>
</div>
<!--所处位置End-->