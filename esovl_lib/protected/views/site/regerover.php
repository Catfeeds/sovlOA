<script>
$(document).ready(function(){
	$.ajax({
		type: 'POST',
		url: '/bbs/member.php?mod=logging&action=login&loginsubmit=yes&infloat=yes&lssubmit=yes',
		data: {'fastloginfield':"username",'username':"<?=$model["username"]?>","password":'<?=$model["password"]?>',"quickforward":"yes","handlekey":"yes"},
		async:false,
		success:function(msg){
			if(msg){
				alert('注册成功');
			}
		}
	});
})
</script>
<?php   
echo $script;   
/*
<script type="text/javascript">setTimeout('location.href="<?php echo Yii::app()->createUrl("user/index")// echo Yii::app()->user->returnUrl ?>"',3000);</script>  
登录成功，正在返回用户首页...  
*/
?>  
    <div class="main_vip">
      <div class="main_vip_yhzc">
        	<div class="main_vip_yhzc_top">
                <span style="color:#fe8b18; font-size:20px; margin-left:5px;">
                <img src="/images/xl.jpg" />恭喜您已成为一休教育网会员
                </span>
            </div>
          <div class="main_vip_yhzc_center">
          	<div class="main_vip_yhzc_center_box">
            	<div class="main_vip_zcwc_box01">
                    	<dl>
                    	  <dt>用 户 名:</dt>
                    	  <dd><?php echo $model["username"]?></dd>
						  </dl>						
                        <dl>
							<dt>电子邮箱:</dt>
							<dd><?php echo $model["email"]?></dd>
						</dl>
                </div>
                <div class="main_vip_zcwc_box02">
                	<div class="main_vip_zcwc_box02_anniu">
                        <a href="/bbs/" target="_blank"><img src="/images/jyyxlt.jpg" /></a>
                        <a href="/Vip/vip_index.php" target="_blank"><img src="/images/jyhyzx.jpg" /></a>
                    </div>
                </div>
            </div>
          </div>
         <div class="main_vip_yhzc_bottom"><img src="/images/vip_bottom00bg.jpg" /></div>
      </div>
    </div>

