<?=$this->renderPartial("_newsleft",array("kefu"=>$kefu));?>
<div class="new_right">
	<div class="new_right_box">
		<div class="new_right_box_title">
			<ul>
				<li class="t_icon"><strong></strong></li>
				<li class="t_title">
					<span class="t_cn"></span>
					<span class="t_en">School News</span>
				</li>
				<li class="t_wz">您现在的位置：
				<a href="/">一休网</a> > 
				
				<a href="<?=Yii::app()->createUrl("education/newslist",array("id"=>$NclassModel->ic_id))?>"><?=Icolumn::model()->getNameByid($NclassModel->ic_id)?></a></dd>
				 >
				<?php if($newsModel->i_label&&Icolumn::model()->getNameByid($newsModel->i_label)){?>
					<a href="<?=Yii::app()->createUrl("education/newslist",array("id"=>$newsModel->i_label))?>"><?=Icolumn::model()->getNameByid($newsModel->i_label)?></a></dd>
					>
				<?php }?>
				<strong>详细</strong></li>
			</ul>
		</div>
		<div class="new_right_box_xx">
			<h1><?php echo $newsModel->i_title;?></h1>
			<h2>发表于：<?php echo $newsModel->i_submitdate?date('Y-m-d H:i:s',$newsModel->i_submitdate):"";?>  作者：<?php echo $newsModel->i_author;?>来源：双威教育  浏览：<?php echo $newsModel->i_click;?>次</h2>
			<p>
				<?php echo $newsModel->i_con;?>
			</p>
		</div>
		<div class="new_right_box_fy">
			<dl>
				<dt>&nbsp;</dt>
				<dd>
					<a href="<?=Yii::app()->createUrl("enterprise/newslist",array("id"=>$newsModel->i_class))?>">
					[返回列表]
					</a>
				</dd>
			</dl>
		</div>
	</div>
</div>