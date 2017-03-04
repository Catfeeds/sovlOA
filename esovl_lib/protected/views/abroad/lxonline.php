<link href="/css/abroad/lxschool.css" rel="stylesheet" type="text/css" />
<!--[if gte IE 6]><script language="javascript" src="/js/abroad/ie6png.js" type="text/javascript" ></script><![endif]-->
<? /*<script language="javascript" src="/js/abroad/lxwsbm.js" type="text/javascript" ></script>*/?>
<script src="/js/jquery.validity/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
 (function() {
        jQuery.validator.addMethod("telephone", function(value, element) {
            return this.optional(element) || /^1[0-9]{10}$/.test(value);
        }, "请填写正确的手机号码");
    })();
$(document).ready(function() {
	$("#lxwsbmform").validate({
		rules: {
			lxbm_xxmc: "required",
			lxbm_zymc: "required",
			lxbm_name: {
				required: true,
				maxlength: 4
			},
			lxbm_tel: {
				required: true
			},
			lxbm_sfz: {
				required: true,
				minlength: 15,
				maxlength: 18,
			},
			lxbm_address: "required",
			lxbm_email: {
				required: true,
				email:true
			},
		},
		messages: {
			lxbm_xxmc: "请输入学校名称",
			lxbm_zymc: "请选择专业名称",
			lxbm_name: {
				required: "请输入姓名",
				maxlength: "你只能输入4个字之内"
			},
			lxbm_tel: {
				required: "请输入电话或者手机号码"
			},
			lxbm_sfz: {
				required: "请输入身份证号码",
				minlength: "请输入正确的身份证号码",
				maxlength: "请输入正确的身份证号码"
			},
			lxbm_address:"请输入学校名称",
			lxbm_email: {
				required: "请输入正确的email地址",
				email:"请输入正确的email地址"
			},
		}
	});
});
</script>
<style type = "text/css">
.error{font-size;12px;color:#FF4500;}
</style>
<div class="main00">
	<div class="school">
		<div class="school_logo"><img src="/admin_root/<?=$lxcon->lxs_banner?>" /></div>
		<div class="school_weizhi">您当前的位置：<a href="/abroad/index">留学频道</a> >> <a href="<?=Yii::app()->createUrl('abroad/lxabroad');?>"><?=$lxcon->lxs_name?></a></div>
		<div class="school_box">
			<?=$this->renderPartial('_schleft',array('action'=>''));?>
			<div class="school_box_cen">
				<div class="school_box_cen_online">
					<div class="school_box_cen_online_title">网上报名</div>
				 <? /* ?>
				 <form name="lxwsbmform" method="post" onsubmit="return lxwsbm()" action="">
					<div class="school_box_cen_online_wsbm">
						<div class="main_wsbm_box_left_box_list02">
							<dl>
								<dt>学校名称</dt>
								<dd><h2><input type="text" name="lxbm_xxmc" readonly="" value="<?=$lxcon->lxs_name?>"></h2><span id="lxbmxxmc"><strong>*</strong></span></dd>
							</dl>
							<dl>
							<dt>专业名称</dt>
								<dd>
								<select name="lxbm_zymc">
								<option value="0">请选择专业名称</option> 
								<?php 
								$criteria = new CDbCriteria;
								$criteria->addCondition("lxk_sid=".$_SESSION["sid"]);
								if(isset($_GET["kid"])){
									$criteria1 = new CDbCriteria;
									$criteria1->addCondition("lxk_id=".$_GET["kid"]);
									$row0 = Lxkkinfo::model()->find($criteria1);
									$lxkzy=$row0["lxk_zy"];
								}else{
									$lxkzy="0";
								}	
								$res = Lxkkinfo::model()->findAll($criteria);
								
								foreach($res as $row){?>                   	
								<option value="<?=$row["lxk_zy"]?>" <?php if($lxkzy==$row["lxk_zy"]){echo"selected";}?>><?=$row["lxk_zy"]?></option>
								<?php }?>
								</select><span id="lxbmzymc"><strong>*</strong>请选择专业名称</span>
							</dd>
							</dl>
							<dl>
								<dt>姓名</dt>
								<dd><h2><input type="text" maxlength="4" onkeyup="value=value.replace(/[^\u4E00-\u9FA5]/g,'')" name="lxbm_name"></h2><span id="lxbmname"><strong>*</strong>请输入中文名</span></dd>
							</dl>
							<dl>
								<dt>手机/电话</dt>
								<dd><h2><input type="text" style="ime-mode:disabled" onkeypress="if (event.keyCode!=46 &amp;&amp; event.keyCode!=45 &amp;&amp; (event.keyCode&lt;48 || event.keyCode&gt;57)) event.returnValue=false" name="lxbm_tel"></h2><span id="lxbmtel"><strong>*</strong>电话和手机至少输入一项</span></dd>
							</dl>
							<dl>
								<dt>身 份 证</dt>
								<dd><h2><input type="text" name="lxbm_sfz"></h2><span id="lxbmsfz"><strong>*</strong>用于报名确认，请填写真实身份证号码</span></dd>
							</dl>
							<dl>
								<dt>通讯地址</dt>
								<dd><h2><input type="text" name="lxbm_address"></h2><span id="lxbmaddress"><strong>*</strong>用于寄发相关的材料，非常重要</span></dd>
							</dl>
							<dl>
								<dt>电子邮箱</dt>
								<dd><h2><input type="text" name="lxbm_email"></h2> <span id="lxbmemail"><strong>*</strong>请输入您最常使用的电子邮件地址</span></dd>
							</dl>
							<dl style="height:100px;">
								<dt>备注说明</dt>
								<dd style="height:100px;"><textarea style="font-family:Arial, Helvetica, sans-serif" name="lxbm_con"></textarea></dd>
							</dl>
							<div class="wsbm_anniu"><input type="image" src="images/wsbm.jpg"></div>
						</div>
					</div>
				 </form>   
				<? */ ?>
						<?php $form=$this->beginWidget('CActiveForm', array(
														'id'=>'lxwsbmform',
														'enableAjaxValidation'=>false,
												));
						?>		
						
					<div class="school_box_cen_online_wsbm">
						<div class="main_wsbm_box_left_box_list02">
							<dl>
								<dt>学校名称</dt>
								<dd>
									<h2><?php echo $form->textField($lxbm,'lxbm_xxmc',array("name"=>"lxbm_xxmc",'value'=>$lxcon->lxs_name,"readonly"=>"readonly")); ?></h2>&nbsp;
									<label for="lxbm_xxmc" generated="true" class="error"><?=$lxbm->hasErrors('lxbm_xxmc')?$form->error($lxbm,'lxbm_xxmc'):"<strong>*</strong> <span></span>"?></label>
								</dd>
							</dl>
							<dl>
							<?php 
								$criteria = new CDbCriteria;
								$criteria->addCondition("lxk_sid=".$_SESSION["sid"]);
								if(isset($_GET["kid"])){
									$criteria1 = new CDbCriteria;
									$criteria1->addCondition("lxk_id=".$_GET["kid"]);
									$row0 = Lxkkinfo::model()->find($criteria1);
									$lxkzy=$row0["lxk_zy"];
								}else{
									$lxkzy="0";
								}	
								$res = Lxkkinfo::model()->findAll($criteria);
								
								$toarray = '';
								foreach($res as $val){
									$toarray[$val->lxk_zy] = $val->lxk_zy;
								}
							?>
							<dt>专业名称</dt>
								<dd>
								<?php echo $form->dropDownList($lxbm, "lxbm_zymc",$toarray,array("name"=>"lxbm_zymc","empty"=>"请选择专业名称" ));?>&nbsp;
								<label for="lxbm_zymc" generated="true" class="error"><?=$lxbm->hasErrors('lxbm_zymc')?$form->error($lxbm,'lxbm_zymc'):"<strong>*</strong> <span>请选择专业名称</span>"?></label>
							</dd>
							</dl>
							<dl>
								<dt>姓名</dt>
								<dd>
									<h2><?php echo $form->textField($lxbm,'lxbm_name',array("name"=>"lxbm_name")); ?></h2>&nbsp;
									<label for="lxbm_name" generated="true" class="error"><?=$lxbm->hasErrors('lxbm_name')?$form->error($lxbm,'lxbm_name'):"<strong>*</strong> <span>请输入中文名</span>"?></label>
								</dd>
							</dl>
							<dl>
								<dt>手机/电话</dt>
								<dd>
									<h2><?php echo $form->textField($lxbm,'lxbm_tel',array("name"=>"lxbm_tel")); ?></h2>&nbsp;
									<label for="lxbm_tel" generated="true" class="error"><?=$lxbm->hasErrors('lxbm_tel')?$form->error($lxbm,'lxbm_tel'):"<strong>*</strong> <span>电话和手机至少输入一项</span>"?></label>
								</dd>
							</dl>
							<dl>
								<dt>身 份 证</dt>
								<dd>
									<h2><?php echo $form->textField($lxbm,'lxbm_sfz',array("name"=>"lxbm_sfz")); ?></h2>&nbsp;
									<label for="lxbm_sfz" generated="true" class="error"><?=$lxbm->hasErrors('lxbm_sfz')?$form->error($lxbm,'lxbm_sfz'):"<strong>*</strong> <span>用于报名确认，请填写真实身份证号码</span>"?></label>
								</dd>
							</dl>
							<dl>
								<dt>通讯地址</dt>
								<dd>
									<h2><?php echo $form->textField($lxbm,'lxbm_address',array("name"=>"lxbm_address")); ?></h2>&nbsp;
									<label for="lxbm_address" generated="true" class="error"><?=$lxbm->hasErrors('lxbm_address')?$form->error($lxbm,'lxbm_address'):"<strong>*</strong> <span>用于寄发相关的材料，非常重要</span>"?></label>
								</dd>
							</dl>
							<dl>
								<dt>电子邮箱</dt>
								<dd>
									<h2><?php echo $form->textField($lxbm,'lxbm_email',array("name"=>"lxbm_email")); ?></h2>&nbsp;
									<label for="lxbm_email" generated="true" class="error"><?=$lxbm->hasErrors('lxbm_email')?$form->error($lxbm,'lxbm_email'):"<strong>*</strong> <span>请输入您最常使用的电子邮件地址</span>"?></label>
								</dd>
							</dl>
							<dl style="height:100px;">
								<dt>备注说明</dt>
								<dd><?php echo $form->textArea($lxbm,'lxbm_con',array("name"=>"lxbm_con","style"=>"width:200px;")); ?>&nbsp;
									<label for="lxbm_con" generated="true" class="error"><?=$lxbm->hasErrors('lxbm_con')?$form->error($lxbm,'lxbm_con'):""?></label>
									<?php echo $form->hiddenField($lxbm,'lxbm_gjid',array("name"=>"lxbm_gjid",'value'=>$lxcon->lxs_gjid)); ?>
								</dd>
							</dl>
							<div class="wsbm_anniu"><input type="image" src="/images/wsbm.jpg"></div>
						</div>
					</div>
						
						
						<?php $this->endWidget(); ?>
				</div>
			</div>
			<?=$this->renderPartial('_schright');?>
		</div>
	</div>
</div>