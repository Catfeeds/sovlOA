<div class="main_box03_right">
	<div class="main_box03_right_box02">
		<div class="main_box03_right_box02_title">
			<dl><dt>推荐课程</dt></dl>
		</div>
		<div class="main_box03_right_box02_list">
			<div class="main_box03_right_box02_list_kc">
				<?php
					$res = Pxkkinfo::model()->getAllByinfo('pxk_bool desc','10');
					foreach($res as $row){
				?>
				<dl>
					<dt>
						<a href="<?=Yii::app()->createUrl("/training/pxkcview",array('id'=>$row['pxk_id']))?>" title="<?=$row["pxk_title"]?>">
							<?php echo Common::strCut($row["pxk_title"],26);?>
						</a>
					</dt>
					<dd><?=$row["pxk_date"]?></dd>
				</dl>
				<?php }?>
			</div>
		</div>
	</div>
	<div class="main_box03_right_box03">
		<div class="main_box03_right_box0300">
			<?=$web['z_onegg']?>
		</div>
	</div>
	<div class="main_box03_right_box02">
		<div class="main_box03_right_box02_title">
			<dl>
				<dt>在线问答</dt>
				<dd><a href="<?=Yii::app()->createUrl("/training/zxwdlist")?>">更多...</a></dd>
			</dl>
		</div>
		<div class="main_box03_right_box02_list">
			<?php
				$res = Pxwd::model()->getAllbool(true,'4','px_time desc');
				foreach($res as $row){
			?>
			<div class="main_box03_right_box02_list_01">
				<ul>
					<li><span>【问】：</span><?=$row["px_ask"]?></li>
					<li><span>【答】：</span><?=$row["px_answer"]?></li>
				</ul>
			</div>
			<?php }?>
		</div>
	</div>
	<div class="main_box03_right_box03">
		<div class="main_box03_right_box0300"><?=$web['z_right2']?></div>
	</div>
</div>