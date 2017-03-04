<div class="bx_zx_left">
          <div class="bz_news_dh"><img src="/images/bx-zx_03.jpg" width="245" height="24" /></div>
          <div class="bx_news_contant">
            <div class="bx_news_nov">
				<ul>
				<?php $TagsModel=Icolumn::model()->getAllTagsByid(10,false,6);
						foreach($TagsModel as $val){?>
							<li <?=isset($_GET['id'])&&$_GET['id']==$val->ic_id?"class='gjbx_1'":""?> ><a href="<?=Yii::app()->createUrl("education/newslist/",array("id"=>$val->ic_id))?>"><?=$val->ic_class?></a></li>
				<?php 	}?>
                </ul>
            </div>
          </div>
          <div class="bx_news_bommom"><img src="/images/bx-zx_07.jpg" width="245" height="4" /></div>
          
          <div class="wl-gg">
            <div class="wl-gg-left"><img src="/images/wl-zc_27.jpg" /></div>
            <div class="wl-gg-contant">
              <div class="gg-bt">热门点击排行榜</div>
            </div>
            <div class="wl-gg-right"><img src="/images/wl-zc_30.jpg" /></div>
            <div class="wl-gg-dk">
              <div class="bx_tj_bt">
                <dl>
				
            <?php	$models=Information::model()->getAllByid(10,'6','i_click desc');
						//getAllByid(46,6,"i_click desc");
								foreach($models as $i=>$row){?>
								
                  <dd><?=$i+1?></dd>
                  <dt><span><a href="<?=Yii::app()->createUrl("education/newsview",array('id'=>$row["i_id"]))?>" title="<?=$row['i_title']?>"><?=Common::strCut($row['i_title'],33)?></a></span><?=$row["i_click"]?><font size="-3" color="#808080">次</font></dt>
            <?php }?>
                </dl>
                <div style="clear:both; height:12px;"></div>
              </div>
            </div>
          </div>
        </div>