<?php
Yii::app()->clientScript->registerMetaTag("关键子",'keywords');
Yii::app()->clientScript->registerMetaTag("介绍",'description');
$this->pageTitle = $newsModel->i_title."-".$web->z_name."-".$web->beizhu;
?>
<div class="main_xl_pro">
	<?=$this->renderPartial("topindex",array("models"=>$schoolGG));?>
	<?php 
		if($NclassModel->ic_id=="8"||$NclassModel->ic_id=="10"){?>
			<div class="main_xllb">
				<?php 	if($NclassModel->ic_id=="8"){?>
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
				<?php 	}elseif($NclassModel->ic_id=="10"){
							$this->renderPartial("_newsleft1",array("Nclass"=>$Nclass));
						}?>
				<div class="wl-zx-fd">
					<div class="wl-zx-lj">
						<?=$this->renderPartial("_newsviewtitle",array("newsModel"=>$newsModel,"NclassModel"=>$NclassModel));?>
					</div>
				</div>
				<div class="wl-wzgg" style="">
					<?=$this->renderPartial("_newsviewcontent",array("newsModel"=>$newsModel,"web"=>$web));?>
				</div>
			</div>
<?php 	}elseif($NclassModel->ic_id=="11"){?>
			 <div class="main_xllb">
				<div class="gf_zx_left">
					<div class="zx_zx_fd_001">
						<div class="zx_zx_lj">	
							<?=$this->renderPartial("_newsviewtitle",array("newsModel"=>$newsModel,"NclassModel"=>$NclassModel));?>
						 </div>
					</div>
				<div class="zx_wzgg_001">
					<?=$this->renderPartial("_newsviewcontent",array("newsModel"=>$newsModel,"web"=>$web));?>
				</div>
				</div> 
				<?=$this->renderPartial("_newsright2",array("web"=>$web));?>
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
					<?=$this->renderPartial("_newsviewcontent",array("newsModel"=>$newsModel,"web"=>$web));?>
				</div>
			</div> 
			<?=$this->renderPartial("_newsright",array("kefu"=>$kefu,"thisId"=>$NclassModel->ic_id));?>
<?php 	}?>
</div>