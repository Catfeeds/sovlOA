<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/css/main2.css" rel="stylesheet" type="text/css" />
<link href="/css/main.css" rel="stylesheet" type="text/css" />
<link href="/css/css.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="wrapper">
		<div class="yixiu_bz_top">
		<div class="yixiu_bz_logo"><a href="/"><img src="/images/about_02.jpg" width="154" height="108" /></a></div>
		<div class="yixiu_bz_gg"><img src="/images/about_05.jpg" width="561" height="19" /></div>
		</div>
		<div class="yixiu_bz_nov">
			<dl>
				<dd><a class="ba" href="/">返回首页</a></dd>
				<dt>|</dt>
				<?php 	$web=WebStep::model()->findByPk(0);
						$models=$models=Cpinfo::model()->findAll();
						foreach($models as $key=>$row1){?> 
							<dd><a class="ba" href="<?=Yii::app()->createUrl("site/about",array("id"=>$row1->cp_id))?>"><?=$row1["cp_title"]?></a></dd>
				<?php 		echo $key<count($models)-1?"<dt>|</dt>":"";
						} ?>
			</dl>
		</div>
		 <?php  echo $content; ?>
	<div class="yixiu_bz_bottom">	
			<div class="yixiu_bz_jz">
			<?php 	foreach($models as $row){?>
					<a href="<?=Yii::app()->createUrl("site/about",array("id"=>$row->cp_id))?>"><?=$row["cp_title"]?></a>
					<?php echo $key<count($models)-1?"<span>-</span>":"";
					}?>  
			 <br />联系电话：<?php echo $web->z_tel?>  地址：<?php echo $web->z_address?><br />
			Copyright <span>&copy;</span> 2010, 版权所有 <?php echo $web->z_name?>  <?php echo $web->z_icp?>            	
			</div>
		</div>
	</div>
</body>
</html>
