<?php $web=WebStep::model()->findByPk(0);?>
<div class="main_xl_detail_box03_main_right">
    <div class="main_xl_detail_box03_main_right_box1">
        <dl>
            <dt><a href="<?=Yii::app()->createUrl("education/school",array("id"=>$_GET['id'],"type"=>"bm"))?>"><img src="/images/xl_wsbm_anniu.jpg" /></a></dt>
            <dd>地址：<?php echo $web->z_address;?></dd>
        </dl>
    </div>
    <div class="main_xl_detail_box03_main_right_box2">
        <div class="main_xl_detail_box03_main_right_box2_title">
            <div class="main_xllb_box01_left_list02_box1_title_zi_xx">
                <dl>
                <dt><img src="/images/xl_title_left.png"></dt>
                <dd>开课信息</dd>
                <dt><img src="/images/xl_title_right.png"></dt>
                </dl>
            </div>
        </div>
        <div class="main_xl_detail_box03_main_right_box2_list">
        	<div class="main_xl_detail_bmxz">
				<?php echo $model->s_kkxx;?>
            </div>
        </div>
    </div>
    <div class="main_xl_detail_box03_main_right_box2">
		<div class="main_xl_detail_box03_main_right_box2_title">
			<div class="main_xllb_box01_left_list02_box1_title_zi_xx">
				<dl>
					<dt><img src="/images/xl_title_left.png"></dt>
					<dd>报名须知</dd>
					<dt><img src="/images/xl_title_right.png"></dt>
				</dl>
			</div>
		</div>
		<div class="main_xl_detail_box03_main_right_box2_list">
			<div class="main_xl_detail_bmxz">
				<?php echo $model->s_bmxz;?>
			</div>
		</div>
	</div>
    <div class="main_xl_detail_box03_main_right_box2">
    	<div class="main_xl_detail_box03_main_right_box2_title">
            <div class="main_xllb_box01_left_list02_box1_title_zi_xx">
                <dl>
                <dt><img src="/images/xl_title_left.png"></dt>
                <dd>学历与学位</dd>
                <dt><img src="/images/xl_title_right.png"></dt>
                </dl>
            </div>
        </div>
        <div class="main_xl_detail_box03_main_right_box2_list">
			<div class="main_xl_detail_bmxz">
				<?php echo $model->s_xlxw;?>
			</div>
        </div>
    </div>
</div>
