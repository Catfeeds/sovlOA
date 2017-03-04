<div class="school_box_right">
	<div class="school_box_right_b01">
		<div class="school_box_right_b01_00">
			<div class="school_box_right_b01_00_t"><img src="/images/t00.jpg" /></div>
			<div class="school_box_right_b01_00_c">
				<div class="school_box_right_b01_00_c_t">
					<h1>一休咨询</h1>
					<img src="/images/c_linebg.jpg" />
				</div>
				<div class="school_box_right_b01_00_c_l">
				<ul>
				<?php    
						$web=WebStep::model()->findByPk(12);              
						$lx_qq=$web->z_qq;// 网站QQ	
						$lx_qq=explode(",",$lx_qq); //分割QQ
						$qcount=count($lx_qq);
						for ($i=0;$i<=$qcount-1;$i++){
						echo "<li><a title='在线咨询1' href='tencent://message/?uin=".$lx_qq[$i]."&amp;Site=一休教育网&amp;Menu=yes'><img border='0' align='top' src='http://wpa.qq.com/pa?p=1:".$lx_qq[$i].":1'></a></li>";
						}						
				?>
				</ul>									
				</div>
				<div class="school_box_right_b01_00_c_tle">
					<?=$web->z_tel;?>
				</div>
				<div class="school_box_right_b01_00_c_wsbm"><a href="<?=Yii::app()->createUrl('abroad/lxonline');?>"><img src="/images/xx_wsbm.jpg" /></a></div>
			</div>
			<div class="school_box_right_b01_00_b"><img src="/images/b00.jpg" /></div>
		</div>
		
		<div class="school_box_right_b01_01"><img src="/images/xx_jt.jpg" /></div>
		
		<div class="school_box_right_b01_00">
			<div class="school_box_right_b01_00_t"><img src="/images/t00.jpg" /></div>
			<div class="school_box_right_b01_00_c">
				<div class="school_box_right_b01_00_c_t">
					<h1>相关学校推荐</h1>
					<img src="/images/c_linebg.jpg" />
				</div>
				<div class="school_box_right_b01_00_c_xxtj">
				<?
					if(isset($_SESSION["sid"])&&$_SESSION["sid"]!=''){
						$criteria = new CDbCriteria;
						$criteria->addCondition("lxs_id={$_SESSION["sid"]}");
						$criteria->select = 'lxs_xgxx';
						$res = Lxschool::model()->find($criteria);
					}else{
						echo "<script>alert('未选择学校');window.location.href = '/abroad/index/';</script>";
					}
				?>
					<?=$res->lxs_xgxx?>
				</div>
			</div>
			<div class="school_box_right_b01_00_b"><img src="/images/b00.jpg" /></div>
		</div>
		
		<div class="school_box_right_b01_01"><img src="/images/xx_jt.jpg" /></div>
		
	</div>
</div>