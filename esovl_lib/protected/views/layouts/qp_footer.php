<div class="bottom">
	<div id="albumform" style="display: none">
		<?=$this->renderPartial('/education/_albumform');?>
	</div>
    <div class="bottom_box01">
        <h1>
        <?php	$rs=Cpinfo::model()->findAll("cp_id<>10");
			foreach($rs as $k=>$row){?>
				<a href="<?=Yii::app()->createUrl("site/about",array("id"=>$row["cp_id"]))?>"><?=$row["cp_title"]?></a>
		<?php	echo $k+1!==count($rs)?"<span>-</span>":"";
			}?>
		</h1>
        <p>
			联系电话：<?php echo $web->z_tel;?>  地址：<?php echo $web->z_address;?><br />
			Copyright &copy; 2011, 版权所有 一休网  <?php echo $web->z_icp;?>
		</p>
    </div>
</div>    
    
    
    
    
    
    