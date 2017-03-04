<?php
 // Yii::app()->clientScript->registerScriptFile('/js/goldhome.js',CClientScript::POS_END ); 

// Yii::app()->clientScript->registerMetaTag("佳丽，上海佳丽，上海美女，上海约会，上海娱乐，上海会所",'keywords');
// Yii::app()->clientScript->registerMetaTag("上海佳丽网，这里有最新最全的娱乐休闲信息，约会美女，美女排名，佳丽排行榜，上海会所",'description');
// $this->pageTitle = "佳丽三千，金屋藏娇 - 佳丽网";
// echo 213;
?>
<script>
$(document).ready(function(){
	<?php if(Yii::app()->user->hasFlash('message')): ?>
        jw.pop.alert("<?=Yii::app()->user->getFlash('message')?>",{autoClose:3000})
		// setTimeout("window.location.href='<?=Yii::app()->createUrl("education/school",array("id"=>$_GET['id']))?>'",3000);
	<?php endif; ?>
})

</script>
<div class="main_xl_detail">
	<?php 
	$show=isset($_GET['type'])&&in_array($_GET['type'],array("hj","wd","bm","zyjs"))?$_GET['type']:"view";
	$this->renderPartial("_schooltop",array("model"=>$model,"show"=>$show));
	$this->renderPartial("_school{$show}",array("model"=>$model,"WsbmModel"=>$WsbmModel));
	?>
</div>
