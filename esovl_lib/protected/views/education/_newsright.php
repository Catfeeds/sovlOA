<?php 
	$defaultArr["0"]=array("0"=>"1|自考学校","1"=>"1|热点资讯","2"=>"1|热门推荐");
	$defaultArr["9"]=array("0"=>"4|名校推荐","1"=>"47|历年真题","2"=>"9|成考资讯");
	$arr=@$thisId&&isset($defaultArr[$thisId])?$defaultArr[$thisId]:$defaultArr[0];
?>
<div class="zxks_xx_right">   
    <div class="zx_zxfs">
		<div class="main_box01_right_01_pr">
       		<ul>
			<?php 	foreach ($kefu as $val){?>
						<li><a href="tencent://message/?uin=<?=$val['number']?>&Site=<?=$this->pageTitle?>&Menu=yes" title="<?=$val['name']?>"><img border="0" src=http://wpa.qq.com/pa?p=1:<?=$val['number']?>:1 align="top"/></a></li>
			<?php 	}?>
			</ul>
		</div>
    </div>
	<div class="zx_hw_dk">
    	<div class="zx_hw_bj">
        	<div class="zx_hw_bt"><span><?php $arr1=explode("|",$arr[0]);echo $arr1[1]?></span></div>
        </div>
        <div class="zx_hw_xian"></div>
        <div class="zx_hw_xw2">
        	<ul>
			<?php 	$criteria=new CDbCriteria;
					$criteria->limit=5;
					$criteria->with='schoolinfo';
					$criteria->addCondition("bk_id={$arr1[0]}");
					$criteria->order='kkdate desc';
					$models=Kkinfo::model()->findAll($criteria);
					foreach ($models as $row){  ?>
						<li>
							<a href="<?=Yii::app()->createUrl("education/school",array('id'=>$row->s_id))?>" title="<?php echo $row->schoolinfo["s_name"];?>">
								<?=$row->schoolinfo->s_name?>
							</a>
						</li>
			<?php }?>
            </ul>
        </div>
    </div>
    <div class="zx_hw_dk">
        <div class="zx_hw_bj">
            <div class="zx_hw_bt"><span><?php $arr2=explode("|",$arr[1]);echo $arr2[1]?></span></div>
        </div>
        <div class="zx_hw_xian"></div>
        <div class="zx_hw_xw">
        	<ul>
            <?php	$classModel=Icolumn::model()->find("ic_id ='{$arr2[0]}'");
					if($classModel->ic_pid=="0"){
						$models=Information::model()->getAllByPid($classModel->ic_id,5,"i_click desc");
					}else{
						$models=Information::model()->getAllByLable(array($classModel->ic_id),5,$classModel->ic_pid,"i_click desc");
					}
				foreach($models as $row){?>
					<li>
						<a href="<?=Yii::app()->createUrl("education/newsview",array('id'=>$row["i_id"]))?>" title="<?php echo $row["i_title"];?>">
							<?php echo Common::strCut($row["i_title"],33)?>
						</a>
					</li>                 
            <?php	}?>
            </ul>
        </div>
    </div>
    
	<div class="zx_hw_dk">
		<div class="zx_hw_bj">
        	<div class="zx_hw_bt"><span><?php $arr3=explode("|",$arr[2]);echo $arr3[1]?></span></div>
        </div>
        <div class="zx_hw_xian"></div>
        <div class="zx_hw_xw">
        	<ul>
            <?php	$classModel=Icolumn::model()->find("ic_id ='{$arr3[0]}'");
					if($classModel->ic_pid=="0"){
						$models=Information::model()->getAllByPid($classModel->ic_id,5,"i_updatetime desc",true);
					}else{
						$models=Information::model()->getAllByid($classModel->ic_id,5,"i_click desc");
					}
					foreach($models as $row){?>
						<li>							
							<a href="<?=Yii::app()->createUrl("education/newsview",array('id'=>$row["i_id"]))?>" title="<?php echo $row["i_title"];?>">
								<?php echo Common::strCutAndTags($row["i_title"],33)?>
							</a>
						</li>
			<?php	}?>
            </ul>
        </div>
    </div>
</div>