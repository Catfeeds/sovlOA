<div class="main_xl_detail_box01">
	<dl>
		<dt>您现在的位置： 网络学院 >> <?=$model->s_name;?></dt>
		<dd>已有<span><?php echo $model->s_click;?></span>人关注</dd>
	</dl>
</div>
<div class="main_xl_detail_box02">
	<div class="main_xl_detail_box02_pic"><img src="/admin_root/<?php echo $model->s_banner;?>" /></div>
</div>
<div class="main_xl_detail_box03_nav">
    <div class="main_xl_detail_box03_nav00">
    	<ul>
			<li class="<?=$show=="view"?'xx_unhover':"xx_hover"?>" ><a href="<?=Yii::app()->createUrl("education/school",array("id"=>$model->s_id))?>">学院介绍</a></li>
			<li class="<?=$show=="view"?'xx_hover':"xx_hover"?>" ><a href="<?=Yii::app()->createUrl("education/school",array("id"=>$model->s_id))?>#bxys">办校优势</a></li>
			<li class="<?=$show=="view"?'xx_hover':"xx_hover"?>" ><a href="<?=Yii::app()->createUrl("education/school",array("id"=>$model->s_id))?>#zsdx">招生对象</a></li>
			<li class="<?=$show=="zyjs"?'xx_unhover':"xx_hover"?>" ><a href="<?=Yii::app()->createUrl("education/school",array("id"=>$model->s_id))?>#zyjs">专业介绍</a></li>
			<li class="<?=$show=="hj"?'xx_unhover':"xx_hover"?>" ><a href="<?=Yii::app()->createUrl("education/school",array("id"=>$model->s_id,"type"=>"hj"))?>">学校环境</a></li>
			<li class="<?=$show=="wd"?'xx_unhover':"xx_hover"?>" ><a href="<?=Yii::app()->createUrl("education/school",array("id"=>$model->s_id,"type"=>"wd"))?>">在线问答</a></li>
			<li class="<?=$show=="bm"?'xx_unhover':"xx_hover"?>" ><a href="<?=Yii::app()->createUrl("education/school",array("id"=>$model->s_id,"type"=>"bm"))?>">网上报名</a></li>
			<?/*<li class="xx_hover"><a href="#">订单查询</a></li>*/?>
        </ul>
    </div>
</div>