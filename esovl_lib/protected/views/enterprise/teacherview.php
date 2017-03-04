<?=$this->renderPartial("_teacherleft",array("kefu"=>$kefu));?>
 
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
					<a href="<?=Yii::app()->createUrl('enterprise/teachers')?>">教师风采</a> >
					教师介绍
				</li>
            </ul>
      	</div>
        <?php echo $row["titlec"];?>
        <div class="new_right_box_list_jsfc">
            <div class="new_right_box_list_jsfc_l02">
                <!-- pic size:116*135px -->
                <div class="new_right_box_list_jsfc_l_pic"><a href="javascript:void(0)"><img src="<?=$TeacherModel->npic?"/admin_root/".$TeacherModel->npic:DEFAULTIMAGE?>" /></a></div>
                <div class="new_right_box_list_jsfc_l_text">
                    <p class="msfc">
                   <a href="javascript:void(0)"><?php echo $TeacherModel->teacher_name;?><br><span><?php echo $TeacherModel->teacher_zhuanye;?></span></a>
                   <?php echo $TeacherModel->teacher_con;?>
                    </p>
                </div>
             </div>
        </div>
        <div class="new_right_box_fy">
        	<dl>
				<dt>&nbsp;</dt>
				<dd>
					<a href="<?=Yii::app()->createUrl("enterprise/teachers")?>">
						[返回列表]
					</a>
				</dd>
			</dl>
        </div>
    </div>
</div>