<script src="/js/jquery.validity/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
$.validator.setDefaults({
	submitHandler: function() { alert("submitted!"); }
});
 (function() {
        jQuery.validator.addMethod("telephone", function(value, element) {
            return this.optional(element) || /^1[0-9]{10}$/.test(value);
        }, "请填写正确的手机号码");
    })();
$().ready(function() {
	// validate the comment form when it is submitted
	

	// validate signup form on keyup and submit
	$("#wsbmForm").validate({
		rules: {
			bm_xxname: "required",
			bm_zyclass: "required",
			bm_zycaption: "required",
			bm_name: {
				required: true,
				maxlength: 4
			},
			bm_tel: {
				required: true,
                telephone: true,
			},
			bm_sfz: {
				required: true,
				minlength: 15,
				maxlength: 18,
			},
			bm_address: "required",
			bm_email: {
				required: true,
				email: true
			},	
		},
		messages: {
			bm_xxname: "请输入学院名称",
			bm_zyclass: "请选择专业类别",
			bm_zycaption: "请选择专业名称",
			bm_name: {
				required: "请输入姓名",
				maxlength: "你只能输入4个字之内"
			},
			bm_tel: {
				required: "请填写一个手机号码",
			},
			bm_sfz: {
				required: "请输入身份证号码",
				minlength: "请输入正确的身份证号码",
				maxlength: "请输入正确的身份证号码"
			},
			bm_address: "请输入你的通讯地址",
			bm_email: {
				required: "请输入邮箱地址",
				email: "请输入正确的邮箱地址",
			},
		}
	});
});
</script>
<div class="main_xl_detail_box03">
    <div class="main_xl_detail_box03_main">
        <div class="main_xl_detail_box03_main_left">
        	<div id="height0" style="height:40px;"></div>
            <div class="main_xl_detail_box03_main_left_box2">
            	<div class="main_xl_detail_box03_main_left_box2_title"><span>网上报名</span></div>
                <div class="main_xl_detail_box03_main_left_box2_text">
					<div class="main_xl_wsbm">
						<?php $form=$this->beginWidget('CActiveForm', array(
								'id'=>'wsbmForm',
								'enableAjaxValidation'=>false,
						));
						$Xlcalmodel=Xlcal::model()->getAllZyList();
						$Xlmcmodel=Xlmc::model()->getAllKcList();
						$XlcalSelect="";
						$XlmcSelect="";
						if(isset($_GET['kid'])&&$_GET['kid']){
							$kkmodel=Kkinfo::model()->findByPk($_GET['kid']);
							if($kkmodel){
								foreach($Xlcalmodel as $key=>$val)$XlcalSelect=$kkmodel->zyclass==$val?$key:$XlcalSelect;
								foreach($Xlmcmodel 	as $key=>$val)$XlmcSelect=$kkmodel->zyname==$val?$key:$XlmcSelect;
							}
						}?>
						<div class="main_wsbm_box_left_box_list02">
							<dl>
								<dt>学校名称</dt>
								<dd>
									<h2 style="background:none">
										<?php echo $form->textField($WsbmModel,'bm_xxname',array("name"=>"bm_xxname","readonly"=>'readonly',"value"=>$model->s_name)); ?>
									</h2>
									<label for="bm_xxname" generated="true" class="error"><?=$WsbmModel->hasErrors('bm_xxname')?$form->error($WsbmModel,'bm_xxname'):""?></label>
								</dd>
							</dl>

							<dl>
								<dt>专业类别</dt>
								<dd>
									<?php echo $form->dropDownList($WsbmModel, "bm_zyclass",$Xlcalmodel,array("name"=>"bm_zyclass","empty"=>"--请选择--",'options' => array($XlcalSelect=> array('selected'=>'selected'))));?>
									<label for="bmzyclass" generated="true" class="error"><?=$WsbmModel->hasErrors('bmzyclass')?$form->error($WsbmModel,'bmzyclass'):""?></label>
								</dd>
							</dl>

							<dl>
								<dt>专业名称</dt>
								<dd>
									<?php echo $form->dropDownList($WsbmModel, "bm_zycaption",$Xlmcmodel,array("name"=>"bm_zycaption","empty"=>"--请选择--" ,'options' => array($XlmcSelect=> array('selected'=>'selected'))));?>
									<label for="bm_zycaption" generated="true" class="error"><?=$WsbmModel->hasErrors('bm_zycaption')?$form->error($WsbmModel,'bm_zycaption'):""?></label>
								</dd>
							</dl>

							<dl>
								<dt>姓名</dt>
								<dd>
									<h2><?php echo $form->textField($WsbmModel,'bm_name',array("name"=>"bm_name")); ?></h2>
									<label for="bm_name" generated="true" class="error"><?=$WsbmModel->hasErrors('bm_name')?$form->error($WsbmModel,'bm_name'):"<strong>*</strong>请输入中文名</span>"?></label>
								</dd>
							</dl>

							<dl>
								<dt>手机</dt>
								<dd>
									<h2><?php echo $form->textField($WsbmModel,'bm_tel',array("name"=>"bm_tel")); ?></h2>
									<label for="bm_tel" generated="true" class="error"><?=$WsbmModel->hasErrors('bm_tel')?$form->error($WsbmModel,'bm_tel'):"<strong>*</strong>请输入中文名手机</span>"?></label>
								</dd>
							</dl>

							<dl>
								<dt>身 份 证</dt>
								<dd>
									<h2><?php echo $form->textField($WsbmModel,'bm_sfz',array("name"=>"bm_sfz")); ?></h2>
									<label for="bm_sfz" generated="true" class="error"><?=$WsbmModel->hasErrors('bm_sfz')?$form->error($WsbmModel,'bm_sfz'):"<strong>*</strong>用于报名确认，请填写真实身份证号码</span>"?></label>
								</dd>
							</dl>

							<dl>
								<dt>通讯地址</dt>
								<dd>
									<h2><?php echo $form->textField($WsbmModel,'bm_address',array("name"=>"bm_address")); ?></h2>
									<label for="bm_address" generated="true" class="error"><?=$WsbmModel->hasErrors('bm_address')?$form->error($WsbmModel,'bm_address'):"<strong>*</strong>用于寄发相关的材料，非常重要</span>"?></label>
								</dd>
							</dl>

							<dl>
								<dt>电子邮箱</dt>
								<dd>
									<h2><?php echo $form->textField($WsbmModel,'bm_email',array("name"=>"bm_email")); ?></h2>
									<label for="bm_email" generated="true" class="error"><?=$WsbmModel->hasErrors('bm_email')?$form->error($WsbmModel,'bm_email'):"<strong>*</strong>请输入您最常使用的电子邮件地址</span>"?></label>
								</dd>
							</dl>


							<dl style="height:100px;">
							<dt style="height: 100px;">备注说明</dt>
							<dd style="height: 100px;">
								<?php echo $form->textArea($WsbmModel,'bm_con',array("name"=>"bm_con"),array("style"=>"font-family:Arial, Helvetica, sans-serif")); ?>
									<label for="bm_con" generated="true" class="error"><?=$WsbmModel->hasErrors('bm_con')?$form->error($WsbmModel,'bm_con'):""?></label>
							</dd>
							</dl>

							<div class="wsbm_anniu"><input type="image" src="/images/wsbm.jpg"></div>
							
						</div>
						<?php $this->endWidget(); ?>
                    </div>                     	
                </div>
            </div>
        </div>
        <?=$this->renderPartial("_schoolright",array("model"=>$model));?>
    </div>
</div>
