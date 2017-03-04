<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>一休网--会员首页</title>
	<link href="/css/css.css" rel="stylesheet" type="text/css" />
	<link href="/css/top.css" rel="stylesheet" type="text/css" />
	<link href="/css/main.css" rel="stylesheet" type="text/css" />
	<link href="/css/bottom.css" rel="stylesheet" type="text/css" />
	<link href="/css/vip.css" rel="stylesheet" type="text/css" />
	<script src="/js/style.js"></script>
	</head>
    <body>
		<div class="wrapper" >
		<div class="top">
			<?php 
			$web=WebStep::model()->findByPk(0);
			echo $this->renderPartial('/layouts/_top');
			$actionID = $this->getAction()->getId();
			if($actionID=="login"||$actionID=="logout"){
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
