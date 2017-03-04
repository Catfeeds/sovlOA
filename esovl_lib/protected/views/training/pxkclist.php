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
			<li><span>搜索关键词：</span><a href="#">考研</a> <a href="#">普通高考</a> <a href="<?=YII::app()->createUrl("/education/crgkindex");?>">成人高考</a> <a href="#">自考</a> <a href="#">在职硕士</a></li>
		</form>
	</ul>
</div>
<div class="px_kclist">
	<div class="px_kclist_wz">您当前的位置：<a href="/">一休网</a> >> <a href="<?=Yii::app()->createUrl('/training/index')?>">培训首页</a> >> 课程分类 >> <?=$Nclass["ic_class"]?></div>
	<div class="px_kclist_fl">
		<ul>
			<?php
				$res = Icolumn::model()->getAllNameByid($Nclass['ic_pid']);
				foreach($res as $row){   
			?>
			<li>
				<a href="<?=Yii::app()->createUrl("/training/pxkclist",array('id'=>$row['ic_id']));?>"><?=$row["ic_class"]?></a>
			</li>
			<?php }?>
		</ul>
	</div>
	<div class="px_kclist_box01">
		<div class="main_box03_left">
			<div class="main_box03_left_kclist01">
				<div class="main_box03_left_kclist01_title">课程列表</div>
				<div class="main_box03_left_kclist01_title02">
					<dl>
						<dt>培训课程/名称</dt>
						<dd>在线咨询</dd>
						<dd>网上报名</dd>
					</dl>
				</div>
				<?php
					$NewsModels = $dataProvider->getData();
					foreach($NewsModels as $k=>$row){
						$criteria=new CDbCriteria;
						$criteria->addCondition("pxs_id ='{$row['pxk_sid']}'");
						$pxschool = Pxschool::model()->findAll($criteria);
						foreach($pxschool as $school){
				?>
					<div class="main_box03_left_kclist01_list">
						<dl>
							<dt>
								<div class="px_list01">
									<h1>
										<?/*<a href="px_kc_list_details.php?id=<?=$row["pxk_id"]?>"><?=$row["pxk_title"]?></a>*/?>
										<a href="<?=Yii::app()->createUrl("/training/pxkcview",array("id"=>$row['pxk_id']))?>"><?=$row["pxk_title"]?></a>
										<span><?=$row["pxk_date"]?></span>
									</h1>
									<ul>
										<li>学费：<span><?=$row["pxk_xfei"]?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;网上优惠价格：<span><?=$row["pxk_yhui"]?></span></li>
										<li>上课地点：<?=$row["pxk_adder"]?></li>
										<li>学校名称：<a href="px_school/?pid=<?=$school["pxs_id"]?>"><?=$school["pxs_name"]?></a></li>
									</ul>
								</div>
							</dt>
							<dd><?php if ($row["pxk_qq"]!=0){echo"<a href=tencent://message/?uin=".$row['pxk_qq']."&Site=一休教育网&Menu=yes><img border='0' src=http://wpa.qq.com/pa?p=1:".$row['pxk_qq'].":7 align='top'/></a>";}else{echo"尚未添加";}?></dd>
							<dd><a href="px_school/baoming.php?pid=<?=$school["pxs_id"]?>"><img src="/images/px_wsbm.jpg" /></a></dd>
						</dl>
					</div>
				<?php }}?>
				<div class="main_box03_left_kclist01_bottom">
					<ul>
						<li>
							共<?=$dataProvider->totalItemCount?> 条信息
							<?php	
								$this->widget('CLinkPager',array(
									'pages'=>$dataProvider->pagination,
									"cssFile"=>"/css/pager.css"
								));
							?>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<?=$this->renderPartial("_newslistright",array('web'=>$web));?>
	</div>
</div>