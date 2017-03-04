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
            <div class="zx_hw_bt"><span>热门推荐</span></div>
        </div>
        <div class="zx_hw_xian"></div>
        <div class="zx_hw_xw">
        	<ul>
            <?php	$models=Information::model()->getAllByPid(1,5,"i_updatetime desc",true);
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
    <div class="zx_hw_dk" style="height:159px;">
    	<div class="zx_hw_bj">
        	<div class="zx_hw_bt"><span>自考学校</span></div>
        </div>
        <div class="zx_hw_xian"></div>
        <div class="zx_hw_xw2">
        	<ul>
			<?php 	$criteria=new CDbCriteria;
					$criteria->limit=5;
					$criteria->with='schoolinfo';
					$criteria->addCondition("bk_id=1");
					$criteria->order='kkdate desc';
					$models=Kkinfo::model()->findAll($criteria);
					foreach ($models as $row){  ?>
						<li>
							<a href="Education/xl_pro_detail.php?kid=<?=$row["kid"]?>&sid=<?=$row["s_id"]?>">
								<?=$row->schoolinfo->s_name?>
							</a>
						</li>
			<?php }?>
            </ul>
        </div>
    </div>
	<div class="zx_hw_dk">
		<div class="zx_hw_bj">
        	<div class="zx_hw_bt"><span>热点资讯</span></div>
        </div>
        <div class="zx_hw_xian"></div>
        <div class="zx_hw_xw">
        	<ul>
            <?php	$models=Information::model()->getAllByPid(1,5,"i_click desc",false);
					foreach($models as $row){?>
						<li>
							<a href="Education/xl_news_detail.php?id=<?php echo $row["i_id"];?>" title="<?=$row["i_title"]?>">
								<?php echo Common::strCutAndTags($row["i_title"],33)?>
							</a>
						</li>
			<?php	}?>
            </ul>
        </div>
    </div>
</div>