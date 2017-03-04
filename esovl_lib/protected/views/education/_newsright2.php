<?php $web=WebStep::model()->findByPk(6);?>
<div class="gf_zx_right">
	<div class="gf_kc_kuang">
    	<div class="gf_kc_bj">
        	<div class="gf_kc_bt">高复推荐课程</div>
        </div>
        <div class="gf_kc_mc"><span>课程名称</span>报名</div>
        <div class="gf_kc_bt_001">
        	<dl>
			<?php 	$kkinfomodels=Kkinfo::model()->getAllByZyclass("高复",4);
					foreach($kkinfomodels as $row1){?>
					<dd><a target="_blank" href="<?=Yii::app()->createUrl("education/school",array("id"=>$row1["s_id"],"type"=>"zyjs","kid"=>$row1["kid"]))?>" title="<?=$row1["ktitle"]?>"><?=$row1["ktitle"]?></a></dd>
					<dt><a target="_blank" href="<?=Yii::app()->createUrl("education/school",array("id"=>$row1["s_id"],"type"=>"bm","kid"=>$row1["kid"]))?>">立即报名</a></dt>
			<?php 	}?>		
            </dl>
        </div>
        <div style="clear:both; height:12px;"></div>
    </div>
    <div style="clear:both; height:12px;"></div>
    <div class="gf_kc_kuang">
    	<div class="gf_kc_bj">
        	<div class="gf_kc_bt">推荐资讯</div>
        </div>
        <div class="gf_zx_tu"><a href="<?=$web->z_bottom5_link?>"><img src="/admin_root/<?=$web->z_bottom5?>" width="222" height="120" /></a></div>
        <div class="gf_zx_bt_001">
        	<ul>
			<?php 	$newsModel=Information::model()->getAllByLable(array("50","51"),7,11,"i_submitdate desc",true);
					foreach($newsModel as $row){?>
						<li>							
							<a target="_blank" href="<?=Yii::app()->createUrl("education/newsview",array('id'=>$row["i_id"]))?>" title="<?php echo $row["i_title"];?>">
								<?php echo Common::strCutAndTags($row["i_title"],70)?>
							</a>
						</li>
			<?php 	}?>		
            </ul>
        </div>
        <div style="clear:both; height:12px;"></div>
    </div>
</div>