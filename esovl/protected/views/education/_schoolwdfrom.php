
<div class="main_xl_detail_box03_main_left_box2">
    <div class="main_xl_detail_box03_main_left_box2_title"><span>我要提问</span></div>
	<form id="wdform" method="post" action="">
         <div class="main_xl_detail_box03_main_left_box2_text">
			 <div class="main_xx_zxtw01">
              	<dl>
					<dt>昵称</dt>
					<dd>
						<h4>
						<?php 	if(!Yii::app()->user->isGuest){
									$uid=Yii::app()->user->id;
									echo $uname=Vip::model()->getNicknameByUcid($uid);?>
									<input type="hidden" value="<?php echo $uname;?>" id="wd_nc" name="wd_nc">
						<?php	}else{
									echo "<input type='text' value='' id='wd_nc' name='wd_nc'>";?></h4>
									<span>您尚未登陆，将以游客身份留言。 [<a href="javascript:createAlbum()">登录</a>] [<a target="_blank" href="<?=Yii::app()->createUrl("/site/reger");?>">注册</a>] 。</span>
						<?php 	}?>
						<input type="hidden" value="<?=$model->s_name;?>" id="wd_nc" name="s_name">
						
					</dd>
             	</dl>
              </div>
              <div class="main_xx_zxtw02">
              	<textarea id="wd_ask" name="wd_ask" style="font-family:Arial, Helvetica, sans-serif"></textarea>
              </div>
              <div class="main_xx_zxtw03"><img src="/images/xl_tj.jpg" onclick='checkzxwd()'/></div>                       	
         </div>
	</form>
 </div>
 <div id="albumform" style="display: none">
    <?=$this->renderPartial('_albumform');?>
</div>

<script type="text/javascript">
	//学历在线提问
	function checkzxwd(){
		 var nickname = $.trim($("#wd_nc").val());
         var content = $.trim($("#wd_ask").val());
		if(nickname==""){
			jw.pop.alert("请填写昵称",{
					zIndex:10001,
					icon:2
			});
			return false;
		}
		if(content==""){
			jw.pop.alert("请填写您的问题",{
					zIndex:10001,
					icon:2
			});
			return false;
		}
		var url="<?=Yii::app()->createUrl("/education/Savezxwd");?>"
		$.post(url,$("#wdform").serialize(),function(msg){
			jw.pop.alert(msg,{
                 zIndex:10001,
                 icon:2
             });
			if(msg=="提问已发出,请等待管理员的审核回复!"){
				setTimeout("window.location.reload();",2000);
			}
        },"html")
	}
	function createAlbum(){
           var content = "<div id='alertform'>"+$("#albumform").html()+"</div>";
            jw.pop.customtip(
            "用户登录",
            content,
            {
                hasBtn_ok:true,
                hasBtn_cancel:true,
                zIndex:10000,
                ok: function(){
                    var username = $.trim($("#alertform form input[name='LoginForm[username]']").val());
                    var password = $.trim($("#alertform form input[name='LoginForm[password]']").val());
                    var url="<?=Yii::app()->createUrl("/site/login");?>"
                    if(username==""){
                        jw.pop.alert("请输入用户名！",{
                            zIndex:10001,
                            icon:2
                        });
                        return false;
                    }
                    if(password==""){
                        jw.pop.alert("请输入密码！",{
                            zIndex:10001,
                            icon:2
                        });
                        return false;
                    }
                    $.post(url,$("#alertform form").serialize(),function(msg){
                        jw.pop.alert(msg,{
                            zIndex:10001,
                            icon:2
                        });
						var patt = new RegExp('登录成功');
						if(patt.test(msg)){
							setTimeout("window.location.reload();",2000);
						}else{
							createAlbum();
						}
                    },"html")
                },
                btn_float:"center"
            }
        );
    }
</script>
