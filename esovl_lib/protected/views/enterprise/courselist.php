<?=$this->renderPartial("_courseleft",array("kefu"=>$kefu));?>
<?php $KcModels=$dataProvider->getData();?>
        <div class="new_right">
        	<div class="new_right_box">
            	<div class="new_right_box_title">
                	<ul>
                    	<li class="t_icon"><strong></strong></li>
						<li class="t_title">
								<span class="t_cn">企培课程</span>
								<span class="t_en">Language classes</span>
						</li>
						<li class="t_wz">您现在的位置：<a href="/">一休网</a> > 
							<a href="<?=Yii::app()->createUrl('enterprise/index')?>">企培频道</a> > 
							<a href="<?=$show=="list"?"javascript::void(0)":Yii::app()->createUrl('enterprise/courses')?>">企培课程</a>
							<?=$show=="index"?" > ".$KcModels[0]->qpk_title:""?>
						</li>
                    </ul>
              	</div>  
				<div class="new_right_box_list_qpkc">
				<?php  	foreach($KcModels as $val){?>   
							<div class="new_right_box_list_qpkc_l">
								<div class="new_right_box_list_qpkc_l_pic">
									<a href='<?=Yii::app()->createUrl('enterprise/courses',array('id'=>$val->qpk_id))?>' >
										<img src="/admin_root/<?php echo $val["npic"];?>" onLoad="javascript:if(this.width>=this.height&&this.width>=162){this.width=162};if(this.height>this.width&&this.height>=75){this.height=75};">
									</a>
								</div>
								<div class="new_right_box_list_qpkc_l_text">
									<dl>
									<dt>
										<h5>
											<a href="<?=Yii::app()->createUrl('enterprise/courses',array('id'=>$val->qpk_id))?> ">
												<?php echo $val["qpk_title"];?>
											</a>
										</h5>
										<span><a href="<?=Yii::app()->createUrl('enterprise/courses',array('id'=>$val->qpk_id))?>	">更多..</a></span>
									</dt>    
									<?php   $str=$show=="list"?"limit 6":"";
											$models=QpKaikeClass::model()->findAll(" qpk_id= '{$val["qpk_id"]}' {$str}");
											foreach ($models as $row2){?>		  
												<dd><a href="<?=Yii::app()->createUrl('enterprise/courseview',array('id'=>$row2->kk_id))?>"><?php echo $row2["kk_title"];?></a></dd>
									<?php 	}?>        
									</dl>
								</div>
							</div>
<?php }?>
                </div>
				<div class="new_right_box_fy">
			<dl>
				
				<dt>
					共<?=$dataProvider->totalItemCount?> 条信息
				</dt>
				<dd>
				<?php	if($show=="list"){
							$this->widget('CLinkPager',array(
									'pages'=>$dataProvider->pagination,
									"cssFile"=>"/css/pager.css"
							));
						}elseif($show=="index"){?>
							<a href="<?=Yii::app()->createUrl("enterprise/courses")?>">
							[返回列表]
							</a>
				<?php 	}?>
				</dd>
			</dl>
		</div>
            </div>
        </div>
   