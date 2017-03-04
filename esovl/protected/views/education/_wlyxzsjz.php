<?php
		$criteria=new CDbCriteria;
		$criteria->limit='3';
		$criteria->addCondition("bk_id=3");
		$criteria->order='kid desc';
		$criteria->with='schoolinfo';
		$rs=Kkinfo::model()->findAll($criteria);
		foreach($rs as $row){	?>						
			<div class="wl-zj-tp">
				<a target="_blank" href="<?=Yii::app()->createUrl("education/school",array("id"=>$row["s_id"]))?>"><img src="/admin_root/<?php echo $row->schoolinfo['s_logo']?>" width="110" height="100"/></a><br />
				<a target="_blank" href="<?=Yii::app()->createUrl("education/school",array("id"=>$row["s_id"]))?>"><?php echo $row->schoolinfo->s_name?></a>
			</div>
<?php 	}?>
	<div class="zj-xx"></div>
	<div class="wl-zj-xx">
		<ul>
		<?php 	//$rs=$dblink->findAll("kkinfo",array(),"","","","s_id desc");
			$criteria=new CDbCriteria;
			$criteria->limit='7';
			$criteria->order='s_id desc';
			$rs=Kkinfo::model()->findAll($criteria);
				foreach($rs as $i=>$row){
					// if($i>7)break;
					
					echo "<li><a href='".Yii::app()->createUrl("education/school",array("id"=>$row["s_id"],"type"=>"zyjs","kid"=>$row["kid"]))."'>".$row['ktitle']."</a></li>";
				}?>
		</ul>
	</div>