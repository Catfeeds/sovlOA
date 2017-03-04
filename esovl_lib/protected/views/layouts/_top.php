<div id="content1"></div>
<div class="top_box01">
  <div class="top_box01_00"><img src="/images/top01_left.jpg" /></div>
  <div class="top_box01_center">
    <?/*<div class="top_box01_center_text01"> 您好，<font color="red"><?php echo @$_SESSION["vip"];?></font> 欢迎光临<?php echo @$z_name;?>！</div>*/?>
    <div class="top_box01_center_text02">
<ul>
<?php
	if(!Yii::app()->user->isGuest){?>
		<li><a href='<?=Yii::app()->createUrl("user/index")?>'>我的一休</a><span>|</span></li>
		<li><a href='/about.php?cid=10'>帮助中心</a><span>|</span></li>
        <li><a href='javascript:void(null);'>网站导航</a><span>|</span></li>
        <li><a href='javascript:void(null);'><strong>上海站</strong>-选择城市</a></li>
		<li><span><a href="<?=Yii::app()->createUrl("site/logout")?>">退出</a></span></li>
<? 	}else{ ?>
		<li><a href='<?=Yii::app()->createUrl("site/reger")?>'>注册</a><span>|</span></li>
        <li><a href='<?=Yii::app()->createUrl("site/login")?>'>登陆</a><span>|</span></li>
        <li><a href='/about.php?cid=10'>帮助中心</a><span>|</span></li>
        <li><a href='javascript:void(null);'>网站导航</a><span>|</span></li>
        <li><a href='javascript:void(null);'><strong>上海站</strong>-选择城市</a></li>
<?	}?>
     </ul>
    </div>
</div>
<div class="top_box01_00"><img src="/images/top01_right.jpg" /></div>
</div>

