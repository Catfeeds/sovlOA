<div class="new_left">
	<div class="main_left_box01">
    	<div class="main_left_box01_Ntitle">
        	<span>新闻中心</span>
        </div>
        <div class="main_left_box01_list00">
        	<div class="main_left_box01_Nlist">
				<ul>
				<?php 	$Class=Icolumn::model()->getAllByPid(5);
						foreach($Class as $val){?>
							<li><a href="<?=Yii::app()->createUrl('enterprise/newslist',array('id'=>$val))?>"><?php echo Icolumn::model()->getNameByid($val);?></a></li>
				<?php 	}?>
						<li><a href="<?=Yii::app()->createUrl('enterprise/newslist',array('id'=>5))?>">最新新闻</a></li>
				</ul>
            </div>
        </div>
    </div>
	<?=$this->renderPartial('_kfleft',array('kefu'=>$kefu));?>
</div>