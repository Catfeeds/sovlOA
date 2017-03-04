<?=$this->renderPartial("_faqleft",array("kefu"=>$kefu));?>
<?php $FAQmodels=$dataProvider->getData();?>
<div class="new_right">
	<div class="new_right_box">
    	<div class="new_right_box_title">
        	<ul>
            	<li class="t_icon"><strong></strong></li>
				<li class="t_title">
						<span class="t_cn">在线问答</span>
						<span class="t_en">Students FAQ</span>
				</li>
				<li class="t_wz">您现在的位置：<a href="/">一休网</a> > 
					<a href="<?=Yii::app()->createUrl('enterprise/index')?>">企培频道</a> > 
					学校环境
				</li>
            </ul>
      	</div>  
		<div class="new_right_box_list_xywd">
			<script type="text/javascript">
			$(document).ready(function(){
			  $("#lyb_anniu01").click(function(){
			  $("#lyb_anniu02").show();
			  $("#lyb_anniu01").hide(500);
			  $("#main_lyb_list").show(1000);
			  });
			  $("#lyb_anniu02").click(function(){
			  $("#lyb_anniu02").hide();
			  $("#lyb_anniu01").show(500);
			  $("#main_lyb_list").hide(1000);
			  });
			});
			</script>
			<script type="text/javascript">
				//学历在线提问
				function checkzxwd(){
					 var nickname = $.trim($("#wd_name").val());
					 var content = $.trim($("#wd_con").val());
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
					var url="<?=Yii::app()->createUrl("/enterprise/savezxwd");?>"
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
				
			</script>
			<div class="main_lyb_anniu">
				<a style="display:none;" id="lyb_anniu01" href="JavaScript:void(0);">显示提问框</a>
				<a id="lyb_anniu02" href="JavaScript:void(0);">隐藏提问框</a>
			</div>
			<div id="main_lyb_list">
				<form id="wdform" method="post" onSubmit="return false" action="">
					<div class="main_lyb_list_left">
					<?php 	if(!Yii::app()->user->isGuest){
								$uid=Yii::app()->user->id;?>
								<dl>
									<dt>昵称：</dt>
									<dd><?=$uname=Vip::model()->getNicknameByUcid($uid);?><input type="hidden" value="<?php echo $uname;?>" id="wd_name" name="wd_name"></dd>
								</dl>
					<?php	}else{?>
								<dl>
									<dt>昵称：</dt>
									<dd><input type="" value="" id="wd_name" name="wd_name"></dd>
								</dl>
								<dl>您尚未登陆，将以游客身份留言。</dl>
								<dl>
									<span>
										[<a href="javascript:createAlbum()">登录</a>] 
										[<a target="_blank" href="<?=Yii::app()->createUrl("/site/reger");?>">注册</a>] 。
									</span>
								</dl>
					<?php 	}?>
					</div>
					<div class="main_lyb_list_right">
					<h1>请填写你的问题</h1>
					<textarea id="wd_con" name="wd_con"></textarea> 
					<input type="botton" onclick='checkzxwd()' value="提交">
				</form>
				</div>
			</div>
			<div class="main_xl_zxtw">
				<div class="main_xl_zxtw_box">
				<?php  	foreach($FAQmodels as $row){?>   
							<div class="main_xl_zxtw_box_list00">
								<div class="main_xl_zxtw_box_title00">
									<div class="main_xl_zxtw_box_title">
										<dl>
											<dt>网友：<?php echo $row["wd_name"];?></dt>
											<dd>[<?php echo $row["wd_ttime"];?>]</dd>
										</dl>
									</div>
								</div>
								<div class="main_xl_zxtw_box_list">
									<dl>
										<dt><?php echo $row["wd_con"];?></dt>
										<dd>
											<ul>
												<li><?php echo $row["wd_huif"];?>。</li>
												<li class="main_xl_zxtw_box_list_zxhf"><strong>【在线回复】</strong><?php echo $row["wd_htime"];?></li>
											</ul>
										</dd>
									</dl>
								</div>
							</div>
				<?php }?>
				</div>
			</div>
        </div>
		<div class="new_right_box_fy">
			<dl>
				<dt>
					共<?=$dataProvider->totalItemCount?> 条信息
				</dt>
				<dd>
				<?php	$this->widget('CLinkPager',array(
									'pages'=>$dataProvider->pagination,
									"cssFile"=>"/css/pager.css"
							));?>
				</dd>
			</dl>
		</div>
    </div>
</div>
