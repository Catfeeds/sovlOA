<dl>
	<dd><span><a href="/news/index">资讯</a></span></dd>
	<?php 	if($Nclass->ic_pid!=="0"){
				if($Nclass->ic_type=="tags"){
					$PNclModel=Icolumn::model()->find("ic_id ='{$Nclass->ic_pid}}'");?>
					<dt><img src="/images/bx_hw_03.jpg" width="17" height="30" /></dt>
					<dd><a href="<?=Yii::app()->createUrl("education/newslist",array("id"=>$PNclModel->ic_pid))?>"><?=Icolumn::model()->getNameByid($PNclModel->ic_pid)?></a></dd>
	<?php 		}?>
			<dt><img src="/images/bx_hw_03.jpg" width="17" height="30" /></dt>
			<dd><a href="<?=Yii::app()->createUrl("education/newslist",array("id"=>$Nclass->ic_pid))?>"><?=Icolumn::model()->getNameByid($Nclass->ic_pid)?></a></dd>
	<?php 	}?>
	<dt><img src="/images/bx_hw_03.jpg" width="17" height="30" /></dt>
	<dd><a href="<?=Yii::app()->createUrl("education/newslist",array("id"=>$Nclass->ic_id))?>"><?=Icolumn::model()->getNameByid($Nclass->ic_id)?></a></dd>
</dl>
