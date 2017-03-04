<?=$this->renderPartial("_schoolleft",array("kefu"=>$kefu));?>
<?php $SchoolModels=$dataProvider->getData();?>
        <div class="new_right">
        	<div class="new_right_box">
            	<div class="new_right_box_title">
                	<ul>
                    	<li class="t_icon"><strong></strong></li>
						<li class="t_title">
								<span class="t_cn">学校环境</span>
								<span class="t_en">Language classes</span>
						</li>
						<li class="t_wz">您现在的位置：<a href="/">一休网</a> > 
							<a href="<?=Yii::app()->createUrl('enterprise/index')?>">企培频道</a> > 
							学校环境
						</li>
                    </ul>
              	</div>  
				 <div class="new_right_box_list_qpkc">
				<?php  	foreach($SchoolModels as $row){?>   
							<div class="new_right_box_list_qpkc_l">
								<div class="new_right_box_list_qpkc_l_pic">
								<a href="<?=Yii::app()->createUrl('enterprise/schoolview',array('id'=>$row->school_id))?>">
									<img src="../admin_root/<?php echo $row["npic"];?> " onLoad="javascript:if(this.width>=this.height&&this.width>=162){this.width=162};if(this.height>this.width&&this.height>=75){this.height=75};">
								</a>
								</div>
								<div class="new_right_box_list_qpkc_l_text">
									<dl>
										<dt>
											<a href="<?=Yii::app()->createUrl('enterprise/schoolview',array('id'=>$row->school_id))?>">
												<?php echo $row["school_title"];?>
											</a>
										</dt>
										<dd class="dd02">
											<?php echo Common::strCut($row["school_con"],480);?>
										</dd>
									</dl>
								</div>
							</div>
				<?php	 }?>
                </div>
				<div class="new_right_box_fy">
			<dl>
				<dt>
					共<?=$dataProvider->totalItemCount?> 条信息
				</dt>
				<dd>
				<?php	$this->widget('CLinkPager',array(
									'pages'=>$dataProvider->pagination,
									"cssFile"=>"/css/pager.css"
							));?>
						
				</dd>
			</dl>
		</div>
            </div>
        </div>
   