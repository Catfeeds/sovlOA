<div class="main_xl_pro">
    <?=$this->renderPartial("topindex",array("models"=>$gjbxschoolGG));?>
    <div class="main_xl_pro_box02">
        <div class="main_xl_pro_box02_title">
			<dl>
				<dt><a href="<?=Yii::app()->createUrl("/education/gjbxindex")?>">国际办学</a></dt>
				<dd><a href="<?=Yii::app()->createUrl("/education/wlyxindex")?>">网络院校</a></dd>
				<dd><a href="<?=Yii::app()->createUrl("/education/index")?>">学历教育</a></dd>
				<dd><a href="<?=Yii::app()->createUrl("/education/zxksindex")?>">自学考试</a></dd>
				<dd><a href="<?=Yii::app()->createUrl("/education/crgkindex")?>">成人高考</a></dd>
				
				<dd><a href="<?=Yii::app()->createUrl("/education/gxjzindex")?>">高校简章</a></dd>
				<dd><a href="<?=Yii::app()->createUrl("/education/jzsearch")?>">简章搜索</a></dd>
				<dd><a href="<?=Yii::app()->createUrl("/education/gfbindex")?>">高复班</a></dd>
				
			</dl>
        </div>
    </div>
    <div class="main_xllb">
      	<div class="hz-k1"><img src="/images/bx-hz_03.jpg" width="3" height="35" /></div>
        <div class="hz-k2">
			<div class="hz-bt">中外合作</div>
        </div>
      	<div class="hz-k1"><img src="/images/bx-hz_06.jpg" width="4" height="35" /></div>
        <div class="hz-dk">
        	<div class="hz-dian"><img src="/images/bx-hz_11.jpg" width="7" height="4" /></div>
			<div class="hz-lx">
				<div class="hz-lx-tu"><img src="/images/bx-hz_15.jpg" width="235" height="253" /></div>
				<div class="hz-lx-kuang">
					<div class="hz-lx-bt">海外留学项目</div>
					<div class="lx-hx"></div>
					<div class="hz-lx-gg">
						<ul>
						<?php 	$criteria=new CDbCriteria;
								$criteria->limit=8;
								 $criteria->with='schoolinfo';
								$criteria->addCondition(" bk_id=2");
								$criteria->order='kkdate desc';
								$models=Kkinfo::model()->findAll($criteria);
								foreach($models as $row1){?>									
								<li><a target="_blank" href="<?=Yii::app()->createUrl("education/school",array("id"=>$row1->s_id,"type"=>"zyjs","kid"=>$row1->kid))?>"><?=$row1->ktitle?></a></li>
						<?php 	}?>
									
						</ul>
					</div>
				</div>
				<div class="hz-hw-dk">
					<div class="hz-hw-bj">
						<div class="hz-hw-bt"><span>热点资讯</span><a target="_blank" href="<?=Yii::app()->createUrl("education/newslist",array('id'=>10,"type"=>"hot"))?>">更多>></a></div>
					</div>
					<div class="hz-hw-xian"></div>
					<div class="hz-hw-xw">
						<ul>
						<?php 	$models=Information::model()->getAllByid(10,6,"i_click desc");
								foreach($models as $row){?>
									<li><a target="_blank" href="<?=Yii::app()->createUrl("education/newsview",array('id'=>$row["i_id"]))?>" title="<?=$row["i_title"]?>"><?=Common::strCut($row["i_title"],30);?></a></li>
						<?php 	}?>                            
						</ul>
					</div>
				</div>
			</div>
		</div>
        <div class="hz-k3"><img src="/images/bx-hzz_18.jpg" width="950" height="4" /></div>
        <div class="hz-k1"><img src="/images/bx-hz_03.jpg" width="3" height="35" /></div>
        <div class="hz-k2">
			<div class="hz-bt">国际办学</div>
        </div>
      	<div class="hz-k1"><img src="/images/bx-hz_06.jpg" width="4" height="35" /></div>
        <div class="hz-dk">
        	<div class="hz-dian"><img src="/images/bx-hz_11.jpg" width="7" height="4" /></div>
			<div class="hz-lx">
				<div class="hz-lx-tu"><img src="/images/bx-hz_18.jpg" width="235" height="253" /></div>
				<div class="hz-lx-kuang">
					<div class="hz-lx-bt">名校推荐</div>
					<div class="lx-hx"></div>
					<div class="hz-lx-gg">
						<ul>
						<?php 	$criteria=new CDbCriteria;
								$criteria->limit=8;
								$criteria->with='schoolinfo';
								$criteria->addCondition(" bk_id=6");
								$criteria->order='kkdate desc';
								$models=Kkinfo::model()->findAll($criteria);
								foreach($models as $row1){?>
									<li><a target="_blank" href="<?=Yii::app()->createUrl("education/school",array("id"=>$row1->s_id))?>"><?=$row1->schoolinfo->s_name?></a></li>
						<?php 	}?>
						</ul>
					</div>
				</div>
				<div class="hz-hw-dk">
					<div class="hz-hw-bj">
						<div class="hz-hw-bt"><span>海外新闻</span><a target="_blank" href="<?=Yii::app()->createUrl("education/newslist",array('id'=>46,"type"=>"hot"))?>">更多>></a></div>
					</div>
					<div class="hz-hw-xian"></div>
					<div class="hz-hw-xw">
						<ul>
						<?php	
						$models=Information::model()->getAllByLable(array('46'),'6','');
						//getAllByid(46,6,"i_click desc");
								foreach($models as $row){?>
								<li><a target="_blank" href="<?=Yii::app()->createUrl("education/newsview",array('id'=>$row["i_id"]))?>" title="<?=$row["i_title"]?>"><?=Common::strCut($row["i_title"],30);?></a></li>
						<?php	}?>
							
						</ul>
					</div>
				</div>
			</div>
        </div>
        <div class="hz-k3"><img src="/images/bx-hzz_18.jpg" width="950" height="4" /></div>
    </div>
</div>
           