<div class="main_xl_pro_box01">
	<div class="main_xl_pro_box01_left">
		<div class="right_box01">
			<div class="main_xl_pro_box01_left_pic">
			<?php	foreach($models as $i=>$row){?>
						<div id="pp<?php echo $i+1;?>" class=""><a href="<?php echo $row["s_h_http"];?>"><img src="/admin_root/<?php echo $row["s_h_pic"];?>"/></a></div>
			<?php 	}?>
			</div>
			<div class="main_xl_pro_box01_left_text">
				<ul>
				<?php	foreach($models as $i=>$row){?>
							<li id="pp<?php echo $i+1;?>" <?php echo "class='normaltab'";?>>·<a href="<?php echo $row["s_h_http"];?>"><?php echo $row["s_h_title"];?></a></li>
				<?php 	}?>
				</ul>
			</div>
		</div>
    </div>
    <div class="main_xl_pro_box01_right">
		<ul>
        <?php	$criteria=new CDbCriteria;
				$criteria->limit='5';
				$criteria->order='lq_date desc';
				$model=Luqu::model()->findAll($criteria);
				foreach($model as $row){
					$row1=School::model()->find("s_id='{$row["s_id"]}'");
					// $row2=Kkinfo::model()->find("s_id='{$row["s_id"]}'");?>
					<li>·<a target="_blank" href="<?=Yii::app()->createUrl("education/school",array("id"=>$row["s_id"]))?>"><?php echo $row1["s_name"];?></a></li>
		<?php 	}?>
		</ul>
    </div>
</div>