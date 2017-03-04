<div class="new_left">
	<div class="main_left_box01">
    	<div class="main_left_box01_Ntitle">
        	<span>企培课程</span>
        </div>
        <div class="main_left_box01_list00">
        	<div class="main_left_box01_Nlist">
				<ul>
				<?php 	$Class=QpKaike::model()->findAll();
						foreach($Class as $val){?>
							<li><a href="<?=Yii::app()->createUrl('enterprise/courses',array('id'=>$val->qpk_id))?>"><?php echo $val->qpk_title;?></a></li>
				<?php 	}?>
				</ul>
            </div>
        </div>
    </div>
	<?=$this->renderPartial('_kfleft',array('kefu'=>$kefu));?>
</div>