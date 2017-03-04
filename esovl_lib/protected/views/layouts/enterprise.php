<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<?php 
		$qpweb=QpSetp::model()->findByPk(1);
		$web=WebStep::model()->findByPk(0);
		Yii::app()->clientScript->registerMetaTag($qpweb->qp_Keyword,'keywords');
		Yii::app()->clientScript->registerMetaTag($qpweb->qp_Description,'description');
		$this->pageTitle =$qpweb->qp_title;?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
		<link href="/css/enterprise/qpcss.css" rel="stylesheet" type="text/css" />
		<link href="/css/enterprise/qptop.css" rel="stylesheet" type="text/css" />
		<link href="/css/enterprise/qpmain.css" rel="stylesheet" type="text/css" />
		<link href="/css/enterprise/qpbottom.css" rel="stylesheet" type="text/css" />
		<link href="/css/css.css" rel="stylesheet" type="text/css" />
		<link href="/js/common/common.css" rel="stylesheet" />
        <script src="/js/jquery.js" type="text/javascript"></script>
		<script src="/js/common/common.js" type="text/javascript"></script>
		<script src="/js/style.js"></script>
		<!--<script src="/js/enterprise/style.js" language="javascript" type="text/javascript"></script>-->
		<script>
				function headAjaxLogin(){
					var uname = $.trim($("#a_uname").val());
                    var upwd = $.trim($("#a_upwd").val());
                    var url="<?=Yii::app()->createUrl("/site/login");?>"
                    if(uname==""){
                        jw.pop.alert("请输入用户名！",{
                            zIndex:10001,
                            icon:2
                        });
                        return false;
                    }
                    if(upwd==""){
                        jw.pop.alert("请输入密码！",{
                            zIndex:10001,
                            icon:2
                        });
                        return false;
                    }
                    $.post(url,$("#headAjaxLoginForm").serialize(),function(msg){
                        jw.pop.alert(msg,{
                            zIndex:10001,
                            icon:2
                        });
						var patt = new RegExp('登录成功');
						if(patt.test(msg)){
							setTimeout("window.location.reload();",2000);
						}else{
							createAlbum();
						}
                    },"html")
				}
		</script>
	</head>
    <body>
		<div id="wrapper_bg">
				<div class="wrapper" >
				<div class="top">
						<div class="top_box01">
						<?php 	if(Yii::app()->user->isGuest){?>
									<form id="headAjaxLoginForm">
										<ul>
											<li><label class="icon_user">用户名：</label><input id='a_uname' name="LoginForm[username]" type="text" /></li>
											<li><label>密码：</label><input id='a_upwd' type="password" name="LoginForm[password]" /><input type="hidden" value='1' name="loginType"></li>
											<li><img onclick ='headAjaxLogin()' src="/images/lx_dl.gif" /></li>
											<li><a target="_blank" href="<?=Yii::app()->createUrl("site/reger")?>"><img src="/images/lx_zc.gif" /></a></li>
											<li><a href="#">忘记密码？</a></li>
										</ul>
									</form>
						<? 	}else{ ?>
								<ul>
									<li><span><a href="<?=Yii::app()->createUrl("site/logout")?>">退出</a></span></li>
								</ul>
						<?	}?>
						<p class="add">
							网站导航：
							<a target="_blank" href="<?=Yii::app()->createUrl("education/index")?>">学历</a> |
							<a target="_blank" href="<?=Yii::app()->createUrl("training/index")?>">培训</a> |
							<a target="_blank" href="<?=Yii::app()->createUrl("research/index")?>">研修</a> | 
							<a target="_blank" href="<?=Yii::app()->createUrl("abroad/index")?>">留学</a> |
							<a target="_blank" href="<?=Yii::app()->createUrl("news/index")?>">资讯</a> |
							<a target="_blank" href="/bbs">社区</a>
						</p>
					</div>
					<div class="logo"><img src="/images/qplogo.jpg" /></div>
					<div class="nav">
						<ul>
							<li><a href="/">一休首页</a></li>
							 <li><a href="<?=Yii::app()->createUrl("enterprise/index")?>">企培首页</a></li>
							<li><a href="<?=Yii::app()->createUrl('enterprise/about')?>">企培中心</a></li>
							<li><a href="<?=Yii::app()->createUrl('enterprise/courses')?>">企培课程</a></li>
							<li><a href="<?=Yii::app()->createUrl('enterprise/teachers')?>">学校老师</a></li>
							<li><a href="<?=Yii::app()->createUrl('enterprise/schools')?>">学校环境</a></li>
							<li><a href="<?=Yii::app()->createUrl('enterprise/newslist')?>">新闻中心</a></li>
							<li><a href="<?=Yii::app()->createUrl('enterprise/faq')?>">在线问答</a></li>
							<?/*<li><a href="#">联系我们</a></li>*/?>
						</ul>
					</div>
				</div>
				<div class="main">
					<?php  echo $content; ?>
				</div>
				<?=$this->renderPartial('/layouts/qp_footer',array("web"=>$web));?>
				</div>
		</div>
    </body>
</html>
