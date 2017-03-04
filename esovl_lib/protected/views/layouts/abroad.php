<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<?php 
		$qpweb=QpSetp::model()->findByPk(1);
		$web=WebStep::model()->findByPk(12);
		Yii::app()->clientScript->registerMetaTag($web->z_keyword,'keywords');
		Yii::app()->clientScript->registerMetaTag($web->z_contant,'description');
		$this->pageTitle =$web->z_title;?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
		<link href="/css/abroad/lxcss.css" rel="stylesheet" type="text/css" />
		<link href="/css/abroad/lxtop.css" rel="stylesheet" type="text/css" />
		<link href="/css/abroad/lxmain.css" rel="stylesheet" type="text/css" />
		<link href="/css/abroad/lxbottom.css" rel="stylesheet" type="text/css" />
		<script language="javascript" src="/js/abroad/jquery.js" type="text/javascript" ></script>
		<script language="javascript" src="/js/abroad/jquery_code.js" type="text/javascript" ></script>
		<!--[if gte IE 6]><script language="javascript" src="/js/abroad/ie6png.js" type="text/javascript" ></script><![endif]-->
	</head>
    <body id="bg000" onload="document.getElementById('wp000').style.height="+aa+"-200+'px';">
		<div class="wrapper" id="wp000">
				<div class="wrapper" id="wp">
				<div class="header">
					<div class="header_box01">
						<p><strong><?=$web->z_name?></strong> -- 留学频道</p>
						<ul>
							<li><label class="icon_user">用户名：</label><input type="text" /></li>
							<li><label>密码：</label><input type="password" /></li>
							<li><img src="/images/lx_dl.gif" /></li>
							<li><img src="/images/lx_zc.gif" /></li>
							<li><a href="#">忘记密码？</a></li>
						</ul>
						<p class="add"><a href="#">设为首页</a> | <a href="#">加入收藏</a></p>
					</div>
					<!-- logo size (175*100)px -->
					<div class="logo"><a href="/"><img src="/images/logo.jpg" /></a></div>
					<div class="nav">
						<div class="nav_main">
							<dl>
								<dt><a href="/Education/">学历</a></dt>
								<dd>
									<a href="/Education/">学历教育</a>|
									<a href="/Education/zxks/">自学考试</a>|
									<a href="/Education/wlyx/">网络院校</a>
								</dd>
							</dl>
							<dl>
								<dt><a href="/Training/">培训</a></dt>
								<dd>
									<a href="/Training/px_pd01.php">外语</a>|
									<a href="/Training/px_pd05.php">职业资格</a>|
									<a href="/Training/px_pd07.php">少儿教育</a>|
									<a href="/Training/px_pd03.php">中小学辅导</a>
								</dd>
							</dl>
							<dl>
								<dt><a href="/Research/">研修</a></dt>
								<dd>
									<a href="/Research/mba/">MBA/EMBA</a>|
									<a href="/Research/master/">工程硕士</a>|
									<a href="/Research/graduate/">在职研究生</a>
								</dd>
							</dl>
						</div>
						<div class="nav_sub">
							<div class="nav_sub_box">
								<dl>
									<dt><img src="/images/lx_t01.jpg" /></dt>
									<dd>
										<a href="lx_news_list.php?cl=0">热门资讯</a>
										<a href="lx_news_list.php?cl=msjz">面试讲座</a>
										<a href="country_gq_list.php">留学国家</a>
										<a href="lx_rdtj_list.php">热点推荐</a>
									</dd>
								</dl>
							</div>
							<div class="nav_sub_box">
								<dl>
									<dt><img src="/images/lx_t02.jpg" /></dt>
									<dd>
										<a href="sdnews_blist.php?bid=1">留学宝典</a>
										<a href="sdnews_blist.php?bid=2">留学考试</a>
										<a href="lx_news_list.php?cl=hwsh">海外生活</a>
										<a href="lx_sdnews_list.php?sid=41">留学申请</a>
										<a href="lx_sdnews_list.php?sid=44">奖学金</a>
									</dd>
								</dl>
							</div>
							<div class="nav_sub_box">
								<dl>
									<dt><img src="/images/lx_t03.jpg" /></dt>
									<dd>
										<a href="lx_news_list.php?cl=cgal">成功案例</a>
										<a href="lx_news_list.php?cl=hggl">回国归来</a>
										<a href="lx_news_list.php?cl=mjhw">漫镜海外</a>
										<a href="lx_news_list.php?cl=ymhw">移民海外</a>
									</dd>
								</dl>
							</div>
						</div>
					</div>   
				</div>
			  
			   
				<div class="main">
					<div class="country_a">
						<ul>
						<?php
						//$sql="select * from lxgjclass where lx_gqico!='' order by lx_gjid asc limit 10";
						$criteria=new CDbCriteria;
						$criteria->addCondition("ic_icon!=''");
						$criteria->order='ic_id asc';
						$criteria->limit='10';						
						$res = Icolumn::model()->findAll($criteria);
						foreach($res as $row){
						?>
						<li><img src="/admin_root/<?=$row["ic_icon"]?>" onLoad="javascript:if(this.width>=this.height&&this.width>=25){this.width=25};if(this.height>this.width&&this.height>=17){this.height=17};"/><span><a href="<?=Yii::app()->createUrl('abroad/school',array('id'=>$row["ic_id"]))?>"><?=$row->ic_class?></a></span></li>
						<?php }?>
						<li><a href="<?=Yii::app()->createUrl('abroad/countrylist')?>" id="more">更多>></a></li>
						</ul>
					</div>
					<?php  echo $content; ?>
				</div>
				<?=$this->renderPartial('/layouts/_footer',array("web"=>$web));?>
				</div>
		</div>
    </body>
</html>
