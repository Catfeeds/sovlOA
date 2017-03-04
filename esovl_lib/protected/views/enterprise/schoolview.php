<?=$this->renderPartial("_schoolleft",array("kefu"=>$kefu));?>
 
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
					<a href="<?=Yii::app()->createUrl('enterprise/schoolss')?>">学校环境</a> >
					详情
				</li>
            </ul>
      	</div>
        <div class="new_right_box_list_qpkc">
               	  	<div class="new_right_box_list_qpkc_l heightauto">
                        <div class="new_right_box_list_qpkc_l_text">
                        	<dl>
								<dt>
									<?php echo $SchoolModel->school_title;?>
								</dt>
								<dd class="dd02 heightauto">
								<img align='left' style='padding-right:10px' src="<?php echo $SchoolModel->npic?"/admin_root/".$SchoolModel->npic:DEFAULTIMAGE;?>">
									<?php echo $SchoolModel->school_con;?>
								</dd>
                            </dl>
                        </div>
                    </div>
                </div>
        <div class="new_right_box_fy">
        	<dl>
				<dt>&nbsp;</dt>
				<dd>
					<a href="<?=Yii::app()->createUrl("enterprise/schools")?>">
						[返回列表]
					</a>
				</dd>
			</dl>
        </div>
    </div>
</div>