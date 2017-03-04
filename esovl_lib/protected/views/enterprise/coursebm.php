<script src="/js/jquery.validity/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">


 (function() {
        jQuery.validator.addMethod("telephone", function(value, element) {
            return this.optional(element) || /^1[0-9]{10}$/.test(value);
        }, "请填写正确的手机号码");
    })();
$(document).ready(function() {
	<?php if(Yii::app()->user->hasFlash('message')): ?>
        jw.pop.alert("<?=Yii::app()->user->getFlash('message')?>",{autoClose:3000})
		// setTimeout("window.location.href='<?=Yii::app()->createUrl("education/school",array("id"=>$_GET['id']))?>'",3000);
	<?php endif; ?>
	$("#wsbmForm").validate({
		rules: {
			user_zhuanye: "required",
			user_name: {
				required: true,
				maxlength: 4
			},
			user_tel: {
				required: true,
                telephone: true,
			},
			user_num: {
				required: true,
				minlength: 15,
				maxlength: 18,
			},
			user_dizhi: "required",
			user_mail: {
				required: true,
				email: true
			},	
		},
		messages: {
			user_zhuanye: "请输入企培课程名",
			user_name: {
				required: "请输入姓名",
				maxlength: "你只能输入4个字之内"
			},
			user_tel: {
				required: "请填写一个手机号码",
			},
			user_num: {
				required: "请输入身份证号码",
				minlength: "请输入正确的身份证号码",
				maxlength: "请输入正确的身份证号码"
			},
			user_dizhi: "请输入你的通讯地址",
			user_mail: {
				required: "请输入邮箱地址",
				email: "请输入正确的邮箱地址",
			},
		}
	});
});
</script>
<?=$this->renderPartial("_courseleft",array("kefu"=>$kefu));?>
<div class="new_right">
        	<div class="new_right_box">
            	<div class="new_right_box_title">
                	<ul>
                    	<li class="t_icon"><strong>1</strong></li>
           		  <li class="t_title">
                        	<span class="t_cn">网上报名</span>
                            <span class="t_en">Language classes</span>
                      </li>
                      <li class="t_wz">您现在的位置：<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>">一休网</a> > <a href="#">企培频道</a> > <a href="#"><strong>网上报名</strong></a></li>
                    </ul>
              	</div>
                <div class="new_right_box_list_qpkc">
					<?/*<form name="formnews" method="post" onSubmit="return newsset()" action="">                	
					<div class="main_wsbm_box_left_box_list02">
					<dl>
					<dt>企培课程名</dt>
					<dd>
					<h2>
					<input type="text" name="user_zhuanye" readonly="" value="<?php echo $kk_title;?>">
					</h2>
					</dl>
					<dl>
					<dt>姓名</dt>
					<dd><h2><input type="text" maxlength="4" onKeyUp="value=value.replace(/[^\u4E00-\u9FA5]/g,'')" name="user_name"><label id="username"></label></h2><span id="bmname"><strong>*</strong>请输入中文名</span></dd>
					</dl>
					<dl>
					<dt>手机/电话</dt>
					<dd><h2><input type="text" style="ime-mode:disabled" onKeyPress="if (event.keyCode!=46 &amp;&amp; event.keyCode!=45 &amp;&amp; (event.keyCode&lt;48 || event.keyCode&gt;57)) event.returnValue=false" name="user_tel"><label id="usertel"></label></h2><span id="bmtel"><strong>*</strong>电话和手机至少输入一项</span></dd>
					</dl>
					<dl>
					<dt>身 份 证</dt>
					<dd><h2><input type="text" name="user_num"><label id="usernum"></label></h2><span id="bmsfz"><strong>*</strong>用于报名确认，请填写真实身份证号码</span></dd>
					</dl>
					<dl>
					<dt>通讯地址</dt>
					<dd><h2><input type="text" name="user_dizhi"><label id="userdizhi"></label></h2><span id="bmaddress"><strong>*</strong>用于寄发相关的材料，非常重要</span></dd>
					</dl>
					<dl>
					<dt>电子邮箱</dt>
					<dd>
					<h2>
					<input type="text" name="user_mail"><label id="usermail"></label>
					</h2>
					<span id="bmemail"><strong>*</strong>请输入您最常使用的电子邮件地址</span></dd>
					</dl>
					<dl style="height:100px;">
					<dt style="height: 100px;">备注说明</dt>
					<dd style="height: 100px;"><textarea style="font-family:Arial, Helvetica, sans-serif" name="user_con"></textarea></dd>
					</dl>
					<div class="wsbm_anniu"><input type="image" src="/images/wsbm.jpg">
					</form>
					</div>
					</div>  */?>
					<?php $form=$this->beginWidget('CActiveForm', array(
								'id'=>'wsbmForm',
								'enableAjaxValidation'=>false,
						));
						$QpKaike=QpKaike::model()->getAllLbList();
						$QpKaikeClass=QpKaikeClass::model()->getAllKcList();
						$selectId="";
						if(isset($_GET['id'])&&$_GET['id']){
							$Kcmodel=QpKaikeClass::model()->findByPk($_GET['id']);
							if($Kcmodel){
								$selectId=$_GET['id'];
							}
						}
						foreach($QpKaikeClass as $key=>$val){
							unset($QpKaikeClass[$key]);
							if(isset($QpKaike[$key])){
								$QpKaikeClass[$QpKaike[$key]]=$val;
							}
						}
						?>
						<div class="main_wsbm_box_left_box_list02">
							

							<dl>
								<dt>企培课程名</dt>
								<dd>
									<?php echo $form->dropDownList($WsbmModel, "user_zhuanye",$QpKaikeClass,array("name"=>"user_zhuanye","empty"=>"--请选择--" ,'options' => array($selectId=> array('selected'=>'selected'))));?>
									<label for="user_zhuanye" generated="true" class="error"><?=$WsbmModel->hasErrors('user_zhuanye')?$form->error($WsbmModel,'user_zhuanye',array(),false):""?></label>
								</dd>
							</dl>

							<dl>
								<dt>姓名</dt>
								<dd>
									<h2><?php echo $form->textField($WsbmModel,'user_name',array("name"=>"user_name")); ?></h2>
									<label for="user_name" generated="true" class="error"><?=$WsbmModel->hasErrors('user_name')?$form->error($WsbmModel,'user_name'):"<strong>*</strong><span>请输入中文名</span>"?></label>
								</dd>
							</dl>

							<dl>
								<dt>手机</dt>
								<dd>
									<h2><?php echo $form->textField($WsbmModel,'user_tel',array("name"=>"user_tel")); ?></h2>
									<label for="user_tel" generated="true" class="error"><?=$WsbmModel->hasErrors('user_tel')?$form->error($WsbmModel,'user_tel'):"<strong>*</strong><span>请输入中文名手机</span>"?></label>
								</dd>
							</dl>

							<dl>
								<dt>身 份 证</dt>
								<dd>
									<h2><?php echo $form->textField($WsbmModel,'user_num',array("name"=>"user_num")); ?></h2>
									<label for="user_num" generated="true" class="error"><?=$WsbmModel->hasErrors('user_num')?$form->error($WsbmModel,'user_num'):"<strong>*</strong><span>用于报名确认，请填写真实身份证号码</span>"?></label>
								</dd>
							</dl>

							<dl>
								<dt>通讯地址</dt>
								<dd>
									<h2><?php echo $form->textField($WsbmModel,'user_dizhi',array("name"=>"user_dizhi")); ?></h2>
									<label for="user_dizhi" generated="true" class="error"><?=$WsbmModel->hasErrors('user_dizhi')?$form->error($WsbmModel,'user_dizhi'):"<strong>*</strong><span>用于寄发相关的材料，非常重要</span>"?></label>
								</dd>
							</dl>

							<dl>
								<dt>电子邮箱</dt>
								<dd>
									<h2><?php echo $form->textField($WsbmModel,'user_mail',array("name"=>"user_mail")); ?></h2>
									<label for="user_mail" generated="true" class="error"><?=$WsbmModel->hasErrors('user_mail')?$form->error($WsbmModel,'user_mail'):"<strong>*</strong><span>请输入您最常使用的电子邮件地址</span>"?></label>
								</dd>
							</dl>


							<dl style="height:100px;">
							<dt style="height: 100px;">备注说明</dt>
							<dd style="height: 100px;">
								<?php echo $form->textArea($WsbmModel,'user_con',array("name"=>"user_con"),array("style"=>"font-family:Arial, Helvetica, sans-serif")); ?>
									<label for="user_con" generated="true" class="error"><?=$WsbmModel->hasErrors('user_con')?$form->error($WsbmModel,'user_con'):""?></label>
							</dd>
							</dl>

							<div class="wsbm_anniu"><input type="image" src="/images/wsbm.jpg"></div>
							
						</div>
						<?php $this->endWidget(); ?>
                </div>
            </div>
</div>