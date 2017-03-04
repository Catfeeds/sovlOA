<script src="/js/enterprise/jquery_code.js" language="javascript" type="text/javascript"></script>
<script>
$(document).ready(function(){
	<?php if(Yii::app()->user->hasFlash('message')): ?>
        jw.pop.alert("<?=Yii::app()->user->getFlash('message')?>",{autoClose:3000})
		// setTimeout("window.location.href='<?=Yii::app()->createUrl("education/school",array("id"=>$_GET['id']))?>'",3000);
	<?php endif; ?>
})

</script>
<?=$this->renderPartial("_courseleft",array("kefu"=>$kefu));?>
<div class="new_right">
    <div class="new_right_box">
    	<div class="new_right_box_title">
        	<ul>
            	<li class="t_icon"><strong></strong></li>
				<li class="t_title">
                	<span class="t_cn"><?=$KCModel->kk_title?></span>
                    <span class="t_en">Language classes</span>
				</li>
				<li class="t_wz">您现在的位置：<a href="/">一休网</a> > 
					<a href="<?=Yii::app()->createUrl('enterprise/index')?>">企培频道</a> > 
					<a href="<?=Yii::app()->createUrl('enterprise/courses')?>">企培课程</a> >
					课程详情
				</li>
            </ul>
      	</div>
        <div class="new_right_box_list_qpkcxx">
          	<div class="new_right_box_list_qpkcxx_left">
       	  		<div class="new_right_box_list_qpkcxx_left_pic"><img src="<?=$KCModel->npic?"/admin_root/".$KCModel->npic:DEFAULTIMAGE?>" onLoad="javascript:if(this.width>=this.height&&this.width>=162){this.width=162};if(this.height>this.width&&this.height>=75){this.height=75};"></div>
          		<div class="new_right_box_list_qpkcxx_left_pic"><a href="<?=Yii::app()->createUrl('enterprise/coursebm',array('id'=>$KCModel->kk_id))?>"><img src="/images/zxbm.jpg"></a></div>
          	</div>
            <div class="new_right_box_list_qpkcxx_right">
            	<div class="new_right_box_list_qpkcxx_right_box">
                	<div class="new_right_box_list_qpkcxx_right_box_title">
                    	<span><?=$KCModel->kk_title?></span>
                    </div>
                    <div class="new_right_box_list_qpkcxx_right_box_l">
                    	<div class="new_right_box_list_qpkcxx_right_box_l_t">
                        	<ul>
                            	<li class="xxk01">课程特色</li>
                                <li>培训目标</li>
                                <li>教材特色</li>
                                <li>学习级别</li>
                                <li>收费标准</li>
                            </ul>
                        </div>
                        <div class="new_right_box_list_qpkcxx_right_box_l_b">
                        	<div>
                        	<div class="xxk"><?=$KCModel->kk_kcts;?></div>
                            </div>
                            <div class="hide">
                            <div class="xxk"><?=$KCModel->kk_pxmb;?></div>
                            </div>
                            <div class="hide">
                        	<div class="xxk"><?=$KCModel->kk_jcts;?></div>
                            </div>
                            <div class="hide">
                            <div class="xxk"><?=$KCModel->kk_xxjb;?></div>
                            </div>
                            <div class="hide">
                            <div class="xxk"><?=$KCModel->kk_sfbt;?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="new_right_box_fy">
        	<dl>
				<dt>&nbsp;</dt>
				<dd>
					<a href="<?=Yii::app()->createUrl("enterprise/courses",array("id"=>$KCModel->qpk_id))?>">
						[返回列表]
					</a>
				</dd>
			</dl>
        </div>
    </div>
</div>