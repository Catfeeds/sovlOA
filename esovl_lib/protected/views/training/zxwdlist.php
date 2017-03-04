<div class="px_ss">
	<ul>
		<?php 
			// if(isset($_POST["xl_skey"])){	
				// $skey=@$_POST["xl_skey"];
				// echo "<script>location.href='../Education/xl_pro_search.php?skey=".$skey."';</script>";	
			// }
		?>
		<form name="xl_sform" id="xl_sform" method="post" onsubmit="return xl_sou();" action="">
			<li>
				<input name="xl_skey" type="text" style="width:220px;" />
			</li>
			<li>
				<input name="input" type="image" src="/images/ss_pro.jpg" style="width:60px;height:24px;" />
			</li>
			
			<li><span>搜索关键词：</span><a href="#">考研</a> <a href="#">普通高考</a> <a href="<?=YII::app()->createUrl("/education/crgkindex");?>">成人高考</a> <a href="<?=YII::app()->createUrl("/education/zxksindex");?>">自考</a> <a href="#">在职硕士</a></li>
		</form>
	</ul>
</div>
<div class="px_kclist">
    <div class="px_kclist_wz">您当前的位置：<a href="<?=Yii::app()->createUrl("/training/index")?>">培训首页</a> >> <a href="<?=Yii::app()->createUrl('/training/zxwdlist')?>">在线问答</a></div>
	<div class="px_kclist_box01">
		<div class="main_box03_left_0003">
			<div class="mian_left_news_lb" style="margin-top:0;">
				<script type="text/javascript" language="javascript">
					//利用ajax方式来进行表单的提交
					function checkzxwd(){
						var content = $.trim($("#px_ask").val());
						if(content==""){
							jw.pop.alert("请填写您的问题",{
									zIndex:10001,
									icon:2
							});
							return false;
						}
						var url="<?=Yii::app()->createUrl("/training/savezxwd");?>"
						$.post(url,$("#pxwdform").serialize(),function(msg){
							jw.pop.alert(msg,{
								zIndex:10001,
								icon:2
							});
							if(msg=="提问已发出,请等待管理员的审核回复!"){
								setTimeout("window.location.reload();",2000);
							}
						},"html");
					}
				</script>
				<div class="mian_left_news_bj">
					<div class="mian_left_news_lb_mc">在线问答</div>
				</div>
				<div class="px_zxwd" id="px_zxwd">
					<form id="pxwdform" method="post" onsubmit="return false" action="">
						<dl>
							<dt><textarea name="px_ask" id="px_ask"></textarea></dt>
							<dd><input type="button" onclick="checkzxwd()" value="提交留言" /></dd>
						</dl>
					</form>
				</div>
				<?php      
					$NewsModels = $dataProvider->getData();
					foreach($NewsModels as $row){
						if(!empty($row['px_answer'])){
				?>
					<div class="mian_left_news_bt"><span style="font-size:12px;"><?=$row["px_ask"]?></span><?=date('Y-m-d',strtotime($row["px_time"]))?></div>
					<div class="mian_left_news_jxnr"><?=$row["px_answer"]?></div>
					<div class="mian_left_news_xux"></div>
				<?php }}?>
				<div class="mian_left_mews_fanyi">
					<?php if(($dataProvider->totalItemCount)>=8){?>
					共<?=$dataProvider->totalItemCount?> 条信息
					<?php	
						$this->widget('CLinkPager',array(
							'pages'=>$dataProvider->pagination,
							"cssFile"=>"/css/pager.css"
						));
					?>
					<?php }?>
				</div>
			</div>
			<div style="clear:both; float:left; height:12px;"></div>
		</div>
		<div class="main_box03_right">
			<div class="main_box03_right_box02">
				<div class="main_box03_right_box02_title">
					<dl><dt>培训学校推荐</dt></dl>
				</div>
				<div class="main_box03_right_box02_list">
					<div class="main_box03_right_box02_list_01_cjwt">
						<ul>
							<?php
								$criteria=new CDbCriteria;
								$criteria->order='pxs_bool desc';
								$res = Pxschool::model()->findAll($criteria);
								foreach($res as $row){
							?>
								<li><span>·</span><a href="px_school/?pid=<?=$row["pxs_id"]?>"><?=$row["pxs_name"]?></a></li>
							<?php }?>
						</ul>
					</div>
				</div>
			</div>
			<div class="main_box03_right_box03">
				<div class="main_box03_right_box0300"><?=$web['z_right1']?></div>
			</div>
			<div class="main_box03_right_box02">
				<div class="main_box03_right_box02_title">
					<dl><dt>推荐课程</dt></dl>
				</div>
				<div class="main_box03_right_box02_list">
					<div class="main_box03_right_box02_list_kc">
						<?php
							$res = Pxkkinfo::model()->getAllByinfo('pxk_bool desc');
							foreach($res as $row){
						?>                 
						<dl><dt><a href="px_kc_list_details.php?id=<?=$row["pxk_id"]?>" title="<?=$row["pxk_title"]?>"><?=Common::strCut($row['pxk_title'],30)?> </a></dt><dd><?=$row["pxk_date"]?></dd></dl>
						<?php }?>
					</div>
					
				</div>
			</div>
			<div class="main_box03_right_box03">
				<div class="main_box03_right_box0300"><?=$web['z_right2']?></div>
			</div>
		</div>
	</div>
</div>