<?php 
   $controllerID = $this->getId();
                   
?>
<div class="top_nav_box01_list00"><a href="/" onmouseover="navHoverLi(0	);" >首页</a></div>
<div class="top_nav_box01_list01" id="nav_tb_">
	<ul>
		<li class="<?=$controllerID=="education"?"nav_hovertab":"nav_normaltab"?>"  onmouseover="navHoverLi(1);">
			<h1><a href="<?=Yii::app()->createUrl("education/index")?>" >学历</a></h1>
		</li>
		<li class="<?=$controllerID=="training"?"nav_hovertab":"nav_normaltab"?>" onmouseover="navHoverLi(2)">
			<h1><a href="<?=Yii::app()->createUrl("training/index")?>">培训</a></h1>
		</li>
		<li class="<?=$controllerID=="research"?"nav_hovertab":"nav_normaltab"?>" onmouseover="navHoverLi(3)" >
			<h1><a href="<?=Yii::app()->createUrl("research/index")?>">研修</a></h1>
		</li>
		<li class="<?=$controllerID=="abroad"?"nav_hovertab":"nav_normaltab"?>" onmouseover="navHoverLi(4)">
			<h1><a href="<?=Yii::app()->createUrl("abroad/index")?>">留学</a></h1>
		</li>
		<li class="<?=$controllerID=="enterprise"?"nav_hovertab":"nav_normaltab"?>" onmouseover="navHoverLi(5)">
			<h1><a href="<?=Yii::app()->createUrl("enterprise/index")?>">企培</a></h1>
		</li>
		<li class="<?=$controllerID=="news"?"nav_hovertab":"nav_normaltab"?>" onmouseover="navHoverLi(6)">
			<h1><a href="/news/index">资讯</a></h1>
		</li>
		<li class="nav_normaltab" onmouseover="navHoverLi(7)">
			<h1><a href="/bbs/">社区</a></h1>
		</li>
	</ul>
</div>
