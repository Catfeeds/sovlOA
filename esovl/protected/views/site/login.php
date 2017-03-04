
<div class="main_vip">
    	<div class="main_vip_left">
        	<div class="main_vip_left_box">
            	<div class="main_vip_left_box_top"><img src="/images/vip_topbg.jpg" /></div>
                <div class="main_vip_left_box_list">
               	  <div class="main_vip_left_box_list_box">
                    	<div class="main_vip_left_box_list_box01"><span>会员登录</span></div>
						<?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'login',
                        'enableAjaxValidation'=>false,
                        'htmlOptions'=>array("onSubmit"=>"return loXMLHttp()")
						)); ?>
                        <div class="main_vip_left_box_list_box02">
                          <dl>
                            <dt>用户名：</dt>
                            <dd style="background-image:url(/images/name00.jpg);">
							<?=CHtml::textField("LoginForm[username]",$model->username?$model->username:"",array("class"=>"txt_7","onfocus"=>"changeDefaultValue('on')", "onblur"=>"changeDefaultValue('out')"));?>
                            </dd><dt style="width:110px; text-indent:8px;text-align:left;"><span id="luser"><?="".@$model->errors["username"][0].""?></span></dt>
                          </dl>
                          <dl>
                            <dt>密码：</dt>
                            <dd style="background-image:url(/images/password.jpg);">
                                <?php echo $form->passwordField($model,'password',array()); ?>
                            </dd><dt style="width:110px; text-indent:8px; text-align:left;"><span style="color:red"><?="".@$model->errors["password"][0].""?></span></dt>
                          </dl>
						   <dl>
                            <dt>&nbsp;</dt>
                            <dd >
                                  <?php echo $form->checkBox($model,'rememberMe',array("id"=>"rememberMe","style"=>"width:15px")); ?>
									<label for="rememberMe">一周内自动登录</label>
                            </dd></span></dt>
                          </dl>
						
                          <div class="main_vip_left_box_list_box02_anniu"> <input type="image" src="/images/vip_dl.jpg" /> <a href="#" onclick="alert('暂未开通此功能..')">忘记密码？</a> </div>
                        </div>
						 <?php $this->endWidget(); ?>
               	  </div>
                </div>
                <div class="main_vip_left_box_bottom"><img src="/images/vip_bottombg.jpg" /></div>
            </div>
        </div>
        <div class="main_vip_right">
            <div class="main_vip_left_box">
            	<div class="main_vip_left_box_top"><img src="/images/vip_topbg.jpg" /></div>
                <div class="main_vip_left_box_list">
                	<div class="main_vip_left_box_list_box">
                    	<div class="main_vip_left_box_list_box01"><span>新会员注册</span></div>
                        <div class="main_vip_left_box_list_right02">
                        	<div class="main_vip_left_box_list_right02_list">
                            	<h1>注册一休网，成为会员特权更多：</h1>
                                <ul>
                                <li>1.轻松三步搞定注册</li>
                          		<li>2.享受更多贴心专享服务</li>
                                <li>3.更多的学习资料下载</li>
                                </ul>
                                <div class="main_vip_left_box_list_right02_list_anniu"><a href="<?=Yii::app()->createUrl("site/reger")?>"><img src="/images/vip_zcxyh.jpg" /></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main_vip_left_box_bottom"><img src="/images/vip_bottombg.jpg" /></div>
            </div>  
        </div>
    </div>
