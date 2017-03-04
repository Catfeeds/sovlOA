<div class="school_box_left">
	<div class="school_box_left_nav">
		<dl>
			<?php if($action=="lxs_xxjs"){?>
			<dt><a href="<?=Yii::app()->createUrl('abroad/abroadshow',array('action'=>'lxs_xxjs'))?>" id="lx_icon01">学校简介</a></dt>
			<?php }else{?>
			<dd><a href="<?=Yii::app()->createUrl('abroad/abroadshow',array('action'=>'lxs_xxjs'))?>" id="lx_icon01">学校简介</a></dd>
			<?php }?>
			<?php if($action=="lxs_kcys"){?>
			<dt><a href="<?=Yii::app()->createUrl('abroad/abroadshow',array('action'=>'lxs_kcys'))?>" id="lx_icon02">课程优势</a></dt>
			 <?php }else{?>
			<dd><a href="<?=Yii::app()->createUrl('abroad/abroadshow',array('action'=>'lxs_kcys'))?>" id="lx_icon02">课程优势</a></dd>
			<?php }?>		
			<?php if($action=="lxs_zsjz"){?>
			<dt><a href="<?=Yii::app()->createUrl('abroad/abroadshow',array('action'=>'lxs_zsjz'))?>" id="lx_icon03">招生简章</a></dt>
			 <?php }else{?>
			<dd><a href="<?=Yii::app()->createUrl('abroad/abroadshow',array('action'=>'lxs_zsjz'))?>" id="lx_icon03">招生简章</a></dd>
			<?php }?>
			<?php if($action=="lxs_shhj"){?>
			<dt><a href="<?=Yii::app()->createUrl('abroad/abroadshow',array('action'=>'lxs_shhj'))?>" id="lx_icon04">学习生活</a></dt>
			 <?php }else{?>
			<dd><a href="<?=Yii::app()->createUrl('abroad/abroadshow',array('action'=>'lxs_shhj'))?>" id="lx_icon04">学习生活</a></dd>
			<?php }?>
			<?php if($action=="lxs_zjzx"){?>
			<dt><a href="<?=Yii::app()->createUrl('abroad/lxadvisory')?>" id="lx_icon05">专家咨询</a></dt>
			 <?php }else{?>
			<dd><a href="<?=Yii::app()->createUrl('abroad/lxadvisory')?>" id="lx_icon05">专家咨询</a></dd>
			<?php }?>
		</dl>
	</div>
	<div class="school_box_left_tool">
		<div class="school_box_left_tool_title"><span>留学工具</span></div>					
		<div class="main_box02_right_list02"> 
			<a href="http://time.123cha.com/" target="_blank"><img src="/images/tool01.jpg" /></a> 
			<a href="http://weather.news.sina.com.cn/"  target="_blank"><img src="/images/tool02.jpg" /></a> 
			<a href="http://jipiao.oklx.com/search.aspx"  target="_blank"><img src="/images/tool03.jpg" /></a> 
			<a href="http://renzheng.cscse.edu.cn/"  target="_blank"><img src="/images/tool04.jpg" /></a> 
			<a href="http://www.boc.cn/sourcedb/whpj/"  target="_blank"><img src="/images/tool05.jpg" /></a> 
			<a href="http://www.jsj.edu.cn/index.php/default/"  target="_blank"><img src="/images/tool06.jpg" /></a>
		</div>
	</div>
</div>