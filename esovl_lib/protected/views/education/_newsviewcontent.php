
<div class="zx_gg_lm">
	<div class="zx_gg_zl">资　　讯</div>
</div>
<div class="zx_lm_dian"><img src="/images/wl-gg_06.jpg" /></div>
<div class="zx_xx_bt"><?=$newsModel->i_title?></div>
<div class="zx_xx_fb">浏览次数：<?=$newsModel->i_click?> 日期：<?=$newsModel->i_submitdate?>  来源：<?=$web->z_name?></div>
<div class="zx_xx_nr"><?=$newsModel->i_con?></div>
<div class="zx_xx_xian"></div>
<div class="zx_xx_fh">
	<a href="<?=Yii::app()->createUrl("education/newslist",array("id"=>$newsModel->i_class))?>">
		[返回列表]
	</a>
</div>
	