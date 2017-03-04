<?=$this->renderPartial("_newsleft",array("kefu"=>$kefu));?>
<div class="new_right">
	<div class="new_right_box">
                <div class="new_right_box_xx">
                	<h1>企培中心</h1>
                    <h2>	</h2>
                    <p><img align='left' style='padding-right:10px' src='/admin_root/<?php echo $contentModel->npic;?>'/>
						<?php echo $contentModel->qp_con;?>
					</p>
                </div>
                <div class="new_right_box_fy">
                	<dl><dt>&nbsp;</dt><dd><a href="<?=Yii::app()->createUrl('enterprise/index')?>">返回首页>></a></dd></dl>
                </div>
	</div>
</div>