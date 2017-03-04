<?=$this->renderPartial("_newsleft",array("kefu"=>$kefu));?>
<div class="new_right">
	<div class="new_right_box">
		<div class="new_right_box_title">
			<ul>
				<li class="t_icon"><strong></strong></li>
				<li class="t_title">
				<span class="t_cn"></span>
				<span class="t_en">School News</span>
				</li>
				<li class="t_wz">您现在的位置：
					<a href="/">一休网</a> 
					<?php 	if($Nclass->ic_pid!=="0"){
								if($Nclass->ic_type=="tags"){
									$PNclModel=Icolumn::model()->find("ic_id ='{$Nclass->ic_pid}}'");?>
									>
									<a href="<?=Yii::app()->createUrl("enterprise/newslist",array("id"=>$PNclModel->ic_pid))?>"><?=Icolumn::model()->getNameByid($PNclModel->ic_pid)?></a>
					<?php 		}?>
							>
							<a href="<?=Yii::app()->createUrl("enterprise/newslist",array("id"=>$Nclass->ic_pid))?>"><?=Icolumn::model()->getNameByid($Nclass->ic_pid)?></a>
					<?php 	}?>
					>
					<a href="<?=Yii::app()->createUrl("enterprise/newslist",array("id"=>$Nclass->ic_id))?>"><?=Icolumn::model()->getNameByid($Nclass->ic_id)?></a>
					<?php if($Nclass->ic_pid=='0')echo "> 最新新闻"?>
				</li>
			</ul>
		</div>
		<div class="new_right_box_list">
		<?php	$NewsModels=$dataProvider->getData();
				foreach($NewsModels as $k=>$row){?>
					<dl>
						<dt><a href="<?=Yii::app()->createUrl("enterprise/newsview",array("id"=>$row->i_id))?>" title='<?php echo $row["i_title"];?>'><?php echo Common::strCut($row["i_title"],100);?></a></dt>
						<dd><?=$row["i_submitdate"]?date('Y-m-d ',$row["i_submitdate"]):"";?></dd>
					</dl>
		<?php	}?>
		</div>
		<div class="new_right_box_fy">
			<dl>
				<dt>
					共<?=$dataProvider->totalItemCount?> 条信息
				</dt>
				<dd>
				<?php	$this->widget('CLinkPager',array(
							'pages'=>$dataProvider->pagination,
							"cssFile"=>"/css/pager.css"
					));?>
				</dd>
			</dl>
		</div>
	</div>
</div>