<dl>
		<dd><span><a href="/news.php">资讯</a></span></dd>
		<dt><img src="/images/bx_hw_03.jpg" width="17" height="30" /></dt>
		<dd><a href="<?=Yii::app()->createUrl("education/newslist",array("id"=>$NclassModel->ic_pid))?>"><?=Icolumn::model()->getNameByid($NclassModel->ic_pid)?></a></dd>
		<dt><img src="/images/bx_hw_03.jpg" width="17" height="30" /></dt>
		<dd><a href="<?=Yii::app()->createUrl("education/newslist",array("id"=>$NclassModel->ic_id))?>"><?=Icolumn::model()->getNameByid($NclassModel->ic_id)?></a></dd>
		<dt><img src="/images/bx_hw_03.jpg" width="17" height="30" /></dt>
		<?php if($newsModel->i_label&&Icolumn::model()->getNameByid($newsModel->i_label)){?>
			<dd><a href="<?=Yii::app()->createUrl("education/newslist",array("id"=>$newsModel->i_label))?>"><?=Icolumn::model()->getNameByid($newsModel->i_label)?></a></dd>
			<dt><img src="/images/bx_hw_03.jpg" width="17" height="30" /></dt>
		<?php }?>
		<dd>详细</dd>
</dl>
