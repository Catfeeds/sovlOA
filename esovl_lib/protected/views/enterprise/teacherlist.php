<?=$this->renderPartial("_teacherleft",array("kefu"=>$kefu));?>
<?php $KcModels=$dataProvider->getData();?>
        <div class="new_right">
        	<div class="new_right_box">
            	<div class="new_right_box_title">
                	<ul>
                    	<li class="t_icon"><strong></strong></li>
						<li class="t_title">
								<span class="t_cn">教师风采</span>
								<span class="t_en">Teacher style</span>
						</li>
						<li class="t_wz">您现在的位置：<a href="/">一休网</a> > 
							<a href="<?=Yii::app()->createUrl('enterprise/index')?>">企培频道</a> > 
							教师风采
						</li>
                    </ul>
              	</div>  
				 <div class="new_right_box_list_jsfc">
				<?php  	foreach($KcModels as $row){?>   
							<div class="new_right_box_list_jsfc_l">
								<!-- pic size:116*135px -->
								<div class="new_right_box_list_jsfc_l_pic">
									<a href="<?=Yii::app()->createUrl('enterprise/teacherview',array("id"=>$row["teacher_id"]))?>">
										<img src="<?=$row->npic?"/admin_root/".$row->npic:DEFAULTIMAGE?>" onLoad="javascript:if(this.width>=this.height&&this.width>=166){this.width=116};if(this.height>this.width&&this.height>=135){this.height=135};"/>
									</a>
								</div>
								<div class="new_right_box_list_jsfc_l_text">
									<p class="msfc">
										<a href="<?=Yii::app()->createUrl('enterprise/teacherview',array("id"=>$row["teacher_id"]))?>"><?php echo $row["teacher_name"];?><br><span><?php echo $row["teacher_zhuanye"];?></span></a>
										<strong>讲师介绍：</strong>
										<?php echo Common::strCut($row["teacher_con"],280);?><a href="<?=Yii::app()->createUrl('enterprise/teacherview',array("id"=>$row["teacher_id"]))?>">查看详细..</a> 
									</p>
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
   