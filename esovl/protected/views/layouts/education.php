<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="/js/common/common.css" rel="stylesheet" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <script src="/js/jquery.js" type="text/javascript"></script>
		<script src="/js/common/common.js" type="text/javascript"></script>
		<link href="/css/css.css" rel="stylesheet" type="text/css">
		<link href="/css/top.css" rel="stylesheet" type="text/css">
		<link href="/css/main.css" rel="stylesheet" type="text/css">
		<link href="/css/main2.css" rel="stylesheet" type="text/css">
		<link href="/css/bottom.css" rel="stylesheet" type="text/css">
		<script src="/js/style.js"></script>
		<script src="/js/xl_fuction.js"></script>
		<script src="/js/Comm.js"></script>
		<script src="/js/downHttp.js"></script>
		<script src="/js/zxks.js"></script>
		<script src="/js/zxks2.js"></script>
		<link href="/css/main3.css" rel="stylesheet" type="text/css" />
		<?php 
		$controllerID = $this->getId();
        $actionID = $this->getAction()->getId();
        $meconandaction = $controllerID.$actionID;
		if($actionID!=="gxjzindex"){?>
			<script>regEvent(window,'onload',function() {SwitchPanel('p','on','off',4,false,2000)});</script>
		
		<?php }?>
		<script>regEvent(window,'onload',function() {SwitchPanel('pp','on','off',4,false,3000)});</script>
	</head>
    <body>
		<div class="wrapper">
			<div class="top">
				<?php 
				$web=WebStep::model()->findByPk(0);
				?>
				<?=$this->renderPartial('/layouts/_top');?>
				<?=$this->renderPartial('/layouts/xl_top',array("web"=>$web));?>
			</div>
			<?php /*
			if($this->topbreadcrumbs) {
				$return = array();
				$return[] = CHtml::link("首页",array("/site/home"));;
				foreach($this->topbreadcrumbs as $key=>$value) {
					if(is_array($value)) {
						$return[] = CHtml::link($key,$value);
					}else {
						$return[] = CHtml::link($value,"#",array("class"=>"dq"));
					}
				}
				echo '<div class="space">'.implode(">",$return)."</div>";
			} */
			?>
			<div class="main">
				<?php echo $content; ?>
			</div>
			<?=$this->renderPartial('/layouts/_footer',array("web"=>$web));?>
        </div>
    </body>
</html>
