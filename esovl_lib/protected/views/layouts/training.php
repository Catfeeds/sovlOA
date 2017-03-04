<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<?php 
		$web=WebStep::model()->findByPk(11);
		Yii::app()->clientScript->registerMetaTag($web->z_keyword,'keywords');
		Yii::app()->clientScript->registerMetaTag($web->z_contant,'description');
		$this->pageTitle =$web->z_title;?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="/js/common/common.css" rel="stylesheet" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <script src="/js/jquery.js" type="text/javascript"></script>
		<script src="/js/common/common.js" type="text/javascript"></script>
		<link href="/css/training/pxcss.css" rel="stylesheet" type="text/css" />
		<link href="/css/training/pxtop.css" rel="stylesheet" type="text/css" />
		<link href="/css/training/pxmain.css" rel="stylesheet" type="text/css" />
		<link href="/css/training/pxbottom.css" rel="stylesheet" type="text/css" />
		<script src="/js/style.js"></script>
		<script language="javascript">
		function opennavbox(ww){
		   document.getElementById(ww).style.display="block";
		}
		function closenavbox(ww){
		   document.getElementById(ww).style.display="none";
		}
		</script>
		<!--[if lte IE 6]>
		<style type="text/css">
		body { behavior:url("csshover.htc"); }
		</style>
		<![endif]-->
	</head>
    <body>
		<div class="wrapper" >
		<div class="top">
			<div class="pxtop01">
		<div class="pxtop01_left">欢迎您
		<?php if(!isset($_COOKIE["vipname"])){?><a href="../vip_login.php">[请登录]</a>，新用户？<a href="../vip_zc.php">[免费注册]</a><?php } else{echo "<span>".$_COOKIE["vipname"]."</span> 光临".$z_name."!";}?></div>
				<div class="pxtop01_right">
			  <ul>
				  <li><a href="../vip_center.php">我的一休</a><span>|</span></li>
				  <li><a href="../about.php?cid=10">帮助中心</a><span>|</span></li>
				  <li><a href="#">网站导航</a><span>|</span></li>
				  <li><a href="#"><strong>上海站-选择城市</strong></a></li>
		</ul>
				</div>
			</div>
			<div class="pxtop02">
				<div class="pxtop02_logo"><a href="http://<?php echo $_SERVER['SERVER_NAME'];?>"><img src="../admin_root/<?=$web['z_logo']?>" width="165" height="100" /></a></div>
				<div class="pxtop02_nav">
					<div class="top_nav">
			<div class="top_nav_box01">
				<?=$this->renderPartial('/layouts/_nav_menu')?>
			</div>
			<div class="top_nav_box02">
				<div class="top_nav_box02_box01"><img src="images/nav_line01.jpg"></div>
				<?=$this->renderPartial('/layouts/_nav_list')?>
			</div>
		</div>
				</div>
			</div>
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
			<div class="px_gg"><?=$web['z_banner']?></div>
            <?php  echo $content; ?>
        </div>
        <?=$this->renderPartial('/layouts/_footer',array("web"=>$web));?>
        </div>
    </body>
</html>
