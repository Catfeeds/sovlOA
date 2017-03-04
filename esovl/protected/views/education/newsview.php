<?php
?>
<div class="main_xl_pro">
	<?=$this->renderPartial("topindex",array("models"=>$schoolGG));?>
	<?php 
		if($NclassModel->ic_id=="8"){?>
		<div class="main_xllb">
			<div class="wl-zx">
				<?=$this->renderPartial("_wlyxleft1");?>
				<?=$this->renderPartial("_wlyxleft2");?>
			</div>
			<div class="wl-xw-left"><img src="/images/wl-xw_05.jpg" /></div>
			<div class="wl-xw-contant">
				<div class="wl-xw">
					<ul>
					<?php 	$news=Information::model()->getAllByLable(array("43"),3,8);
							foreach($news as $row){
								echo "<li><a href='".Yii::app()->createUrl("education/newsview",array('id'=>$row["i_id"]))."'>".$row['i_title']."</a></li>";
							}?>
					</ul>
				</div>
			</div>
        <div class="wl-xw-right"><img src="/images/wl-xw_08.jpg" /></div>
        <div class="wl-zx-fd">
			<div class="wl-zx-lj">
					<dl>
							<dd><span><a href="/news.php">资讯</a></span></dd>
							<dt><img src="/images/bx_hw_03.jpg" width="17" height="30" /></dt>
							<dd><a href="<?=Yii::app()->createUrl("education/newslist",array("id"=>$NclassModel->ic_pid))?>"><?=Icolumn::model()->getNameByid($NclassModel->ic_pid)?></a></dd>
							<dt><img src="/images/bx_hw_03.jpg" width="17" height="30" /></dt>
							<dd><a href="<?=Yii::app()->createUrl("education/newslist",array("id"=>$NclassModel->ic_id))?>"><?=Icolumn::model()->getNameByid($NclassModel->ic_id)?></a></dd>
							<dt><img src="/images/bx_hw_03.jpg" width="17" height="30" /></dt>
							<?php if($newsModel->i_label&&Icolumn::model()->getNameByid($newsModel->i_label)){?>
								<dd><a href="<?=Yii::app()->createUrl("education/newslist",array("id"=>$newsModel->i_label))?>"><?=Icolumn::model()->getNameByid($newsModel->i_label)?></a></dd>
								<dt><img src="/images/bx_hw_03.jpg" width="17" height="30" /></dt>
							<?php }?>
							<dd>详细</dd>
					</dl>
			</div>
        </div>
		<div class="zx_wzgg" style="float:right;width:694px">
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
				</div>
		</div>
<?php 	}else{?>
			<div class="zx_zx_dk">
				<div class="zx_zx_fd">
					<div class="zx_zx_lj">
						<dl>
						<dd><span><a href="/news.php">资讯</a></span></dd>
						<dt><img src="/images/bx_hw_03.jpg" width="17" height="30" /></dt>
						<dd><a href="<?=Yii::app()->createUrl("education/newslist",array("id"=>$NclassModel->ic_pid))?>"><?=Icolumn::model()->getNameByid($NclassModel->ic_pid)?></a></dd>
						<dt><img src="/images/bx_hw_03.jpg" width="17" height="30" /></dt>
						<dd><a href="<?=Yii::app()->createUrl("education/newslist",array("id"=>$NclassModel->ic_id))?>"><?=Icolumn::model()->getNameByid($NclassModel->ic_id)?></a></dd>
						<dt><img src="/images/bx_hw_03.jpg" width="17" height="30" /></dt>
						<?php if($newsModel->i_label&&Icolumn::model()->getNameByid($newsModel->i_label)){?>
							<dd><a href="<?=Yii::app()->createUrl("education/newslist",array("id"=>$newsModel->i_label))?>"><?=Icolumn::model()->getNameByid($newsModel->i_label)?></a></dd>
							<dt><img src="/images/bx_hw_03.jpg" width="17" height="30" /></dt>
						<?php }?>
						<dd>详细</dd>
						</dl>
					</div>
				</div>
				<div class="zx_wzgg">
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
				</div>
			</div> 
			<?=$this->renderPartial("_newsright",array("kefu"=>$kefu));?>
<?php 	}?>
</div>