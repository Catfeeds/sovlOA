<?php $array=array(
		"热点"=>array(26=>"查分",27=>"成绩"),
		"动态"=>array(28=>"分数线",29=>"院校"),
		"试题"=>array(30=>"真题",31=>"习题"),
		"网校"=>array(32=>"课程",33=>"优惠"),
		
);

?>
<div class="xl_main_crgk_box02_center_list">
<?php 	foreach($array as $key=>$val){?>
			<div class="main_crgk_box02_center_list00">
				<div class="main_crgk_box02_center_list00_01">
					<dl>
						<dt><?=$key?></dt>
						<dd>
						<?php	$rdNews=Information::model()->getAllByLable(array_keys($val),2,9,"i_click desc");
								foreach ($rdNews as $row){?>
									<a  title="<?=Common::strTags(trim($row["i_title"]))?>" href="<?=Yii::app()->createUrl("education/newsview",array('id'=>$row["i_id"]))?>"><?=Common::strCut(trim($row["i_title"]),36)?></a>&nbsp;
						<?php 	}?>
						</dd>
					</dl>
				</div>
				<?php	foreach($val as $k=>$v){?>
							<div class="main_crgk_box02_center_list00_02">
								<ul>
									<li> 
										<span>[<a href="<?=Yii::app()->createUrl("education/newslist",array('id'=>$k))?>"><?=$v?></a>]</span>
										<?php	$cfNews=Information::model()->getAllByLable(array($k),11,9);
												foreach ($cfNews as $row){?>
													<a title="<?=Common::strTags(trim($row["i_title"]))?>" href="<?=Yii::app()->createUrl("education/newsview",array('id'=>$row["i_id"]))?>"><?=Common::strCut(trim($row["i_title"]),21,"")?></a>&nbsp;
										<?php 	}?>
									</li>
								</ul>
							</div>
				<?php 	}?>
			</div>
<?php 	}?>

<?/*
	<div class="main_crgk_box02_center_list00">
		<div class="main_crgk_box02_center_list00_01">
			<dl>
				<dt>动态</dt>
				<dd>
				<?php 	$dtNews=Information::model()->getAllByLable(array("28","29"),2,"9","i_click desc");
						foreach ($dtNews as $row){?>
							<a href="<?=Yii::app()->createUrl("education/newsview",array('id'=>$row["i_id"]))?>"><?=Common::strCut(trim($row["i_title"]),36)?></a>&nbsp;
				<?php  }?>
				</dd>
			</dl>
		</div>
		<div class="main_crgk_box02_center_list00_02">
			<ul>
				<li>
					<span>[<a href="/Education/crgk/crgk_zx.php?nclass=47">分数线</a>]</span>
					<?php	$fsxNews=Ennews::model()->getHotNews(array("47"),10);
							foreach ($fsxNews as $row){?>
								<a href="/Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>">
									<?=Common::strCut($row["ntitle"],12)?>
								</a>
					<?php 	}?>
				</li>
				<li>
					<span>[<a href="/Education/crgk/crgk_zx.php?nclass=48">院校</a>]</span>
					<?php	$yxNews=Ennews::model()->getHotNews(array("48"),2);
							foreach ($yxNews as $row){?>
								<a href="/Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>">
									<?=Common::strCut($row["ntitle"],36)?>
								</a>
					<?php 	}?>
				</li>
			</ul>
		</div>
	</div>
	<div class="main_crgk_box02_center_list00">
		<div class="main_crgk_box02_center_list00_01">
			<dl>
				<dt>试题</dt>
				<dd>
				<?php	$stNews=Ennews::model()->getHotNews(array("49","50"),2);
						foreach ($stNews as $row){?>
							<a href="/Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>">
								<?=Common::strCut($row["ntitle"],36)?>
							</a>
				<?php 	}?>
				</dd>
			</dl>
		</div>
		<div class="main_crgk_box02_center_list00_02">
			<ul>
				<li> 
					<span>[<a href="/Education/crgk/crgk_zx.php?nclass=49">真题</a>]</span>
					<?php	$ztNews=Ennews::model()->getHotNews(array("49"),2);
							foreach ($ztNews as $row){?>
								<a href="/Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>">
									<?=Common::strCut($row["ntitle"],36)?>
								</a>
					<?php 	}?>
				</li>
				<li> 
					<span>[<a href="/Education/crgk/crgk_zx.php?nclass=50">习题</a>]</span>
					<?php	$xtNews=Ennews::model()->getHotNews(array("50"),2);
							foreach ($xtNews as $row){?>
								<a href="/Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>">
									<?=Common::strCut($row["ntitle"],36)?>
								</a>
					<?php 	}?>
				</li>
			</ul>
		</div>
	</div>
	<div class="main_crgk_box02_center_list00">
		<div class="main_crgk_box02_center_list00_01">
			<dl>
				<dt>网校</dt>
				<dd>
					<?php	$wxNews=Ennews::model()->getHotNews(array("51","52"),2);
							foreach ($wxNews as $row){?>
								<a href="/Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>">
									<?=Common::strCut($row["ntitle"],24)?>
								</a>
					<?php 	}?>
				</dd>
			</dl>
		</div>
		<div class="main_crgk_box02_center_list00_02">
			<ul>
				<li>
					<span>[<a href="/Education/crgk/crgk_zx.php?nclass=51">课程</a>]</span>
					<?php	$kcNews=Ennews::model()->getHotNews(array("51"),2);
							foreach ($kcNews as $row){?>
								<a href="/Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>">
									<?=Common::strCut($row["ntitle"],36)?>
								</a>
					<?php 	}?>
				</li>
				<li> 
					<span>[<a href="/Education/crgk/crgk_zx.php?nclass=52">优惠</a>]</span>
					<?php	$yhNews=Ennews::model()->getHotNews(array("52"),2);
							foreach ($yhNews as $row){?>
								<a href="/Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>">
									<?=Common::strCut($row["ntitle"],36)?>
								</a>
					<?php 	}?>
				</li>
			</ul>
		</div>
	</div>
	*/?>
</div>