<?php
 // Yii::app()->clientScript->registerScriptFile('/js/goldhome.js',CClientScript::POS_END ); 

// Yii::app()->clientScript->registerMetaTag("佳丽，上海佳丽，上海美女，上海约会，上海娱乐，上海会所",'keywords');
// Yii::app()->clientScript->registerMetaTag("上海佳丽网，这里有最新最全的娱乐休闲信息，约会美女，美女排名，佳丽排行榜，上海会所",'description');
// $this->pageTitle = "佳丽三千，金屋藏娇 - 佳丽网";
// echo 213;
?>
<div class="main_xl_pro">
	<?=$this->renderPartial("topindex",array("models"=>$schoolGG));?>
<?php 	if($Nclass->ic_pid=="8"||$Nclass->ic_id=="8"||$Nclass->ic_pid=="10"||$Nclass->ic_id=="10"){?>
			<div class="main_xllb">
				<?php if($Nclass->ic_pid=="8"||$Nclass->ic_id=="8"){?>
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
				<?php	}elseif($Nclass->ic_pid=="10"||$Nclass->ic_id=="10"){
							$this->renderPartial("_newsleft1",array("Nclass"=>$Nclass));
						}?>
				<div class="wl-zx-fd">
					<div class="wl-zx-lj">
							<?=$this->renderPartial("_newslisttitle",array("Nclass"=>$Nclass));?>
					</div>
				</div>
				<div class="wl-wzgg" >
					<?=$this->renderPartial("_newslistcontent",array("dataProvider"=>$dataProvider));?>
				</div>
			</div>
<?php /*	}else if($Nclass->ic_pid=="11230"||$Nclass->ic_id=="10123"){?>
			<div class="main_xllb">
				<?=$this->renderPartial("_newsleft1",array("Nclass"=>$Nclass));?>
				<div class="wl-zx-fd">
					<div class="wl-zx-lj">
							<?=$this->renderPartial("_newslisttitle",array("Nclass"=>$Nclass));?>
					</div>
				</div>
				<div class="wl-wzgg" >
					<?=$this->renderPartial("_newslistcontent",array("dataProvider"=>$dataProvider));?>
				</div>
			</div>
<?php	*/}else{?>
			<div class="zx_zx_dk">
				<div class="zx_zx_fd">
					<div class="zx_zx_lj">
						<?=$this->renderPartial("_newslisttitle",array("Nclass"=>$Nclass));?>
					</div>
				</div>	
				<div class="zx_wzgg">
					<?=$this->renderPartial("_newslistcontent",array("dataProvider"=>$dataProvider));?>
				</div>
			</div>
			<?=$this->renderPartial("_newsright",array("kefu"=>$kefu));?>
<?php 	}?>
</div>