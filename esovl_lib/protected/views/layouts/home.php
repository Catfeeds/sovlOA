<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<?php 
		$web=WebStep::model()->findByPk(0);
		Yii::app()->clientScript->registerMetaTag($web->z_keyword,'keywords');
		Yii::app()->clientScript->registerMetaTag($web->z_contant,'description');
		$this->pageTitle =$web->z_title;?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="/js/common/common.css" rel="stylesheet" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <script src="/js/jquery.js" type="text/javascript"></script>
		<script src="/js/common/common.js" type="text/javascript"></script>
		<link href="/css/css.css" rel="stylesheet" type="text/css" />
		<link href="/css/top.css" rel="stylesheet" type="text/css" />
		<link href="/css/main.css" rel="stylesheet" type="text/css" />
		<link href="/css/bottom.css" rel="stylesheet" type="text/css" />
		<script src="/js/area.js"></script>
		<script src="/stHttp.js"></script>
		<script src="/js/hyHttp.js"></script> 
		<script src="/js/style.js"></script>
		<!--[if lte IE 6]>
		<script src="js/ie6png.js"></script>
		<![endif]-->
	</head>
    <body>
		<div class="wrapper" id="body1">
		<div class="top">
			<?php 			
			echo $this->renderPartial('/layouts/_top');
			$actionID = $this->getAction()->getId();
			if($actionID=="login"||$actionID=="logout"||$actionID=="reger"){
				$this->renderPartial('/layouts/vip_top',array("web"=>$web));
			}else{
				$this->renderPartial('/layouts/home_top',array("web"=>$web));
			}
			?>
		</div>
      
        <?php /*
        if($this->topbreadcrumbs) {
		echo 123;
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
        }*/
        ?>
        <div class="main">
            <?php  echo $content; ?>
        </div>
        <?=$this->renderPartial('/layouts/_footer',array("web"=>$web));?>
        </div>
    </body>
</html>
