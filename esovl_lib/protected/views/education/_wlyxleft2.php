
                <div class="wl-gg">
					<div class="wl-gg-left"><img src="/images/wl-zc_27.jpg" /></div>
					<div class="wl-gg-contant">
						<div class="gg-bt">网络教育新闻</div>
						<div class="gg-more"><a href="<?=Yii::app()->createUrl("education/newslist",array('id'=>42))?>">MORE+</a></div>
					</div>
					<div class="wl-gg-right"><img src="/images/wl-zc_30.jpg" /></div>
					<div class="wl-gg-dk" style="height: 245px;">
						<div class="wl-gg-bt">
							<ul>
							<?php 	$news=Information::model()->getAllByLable(array("42"),6,8);
									foreach($news as $row){
										echo "<li><a href='".Yii::app()->createUrl("education/newsview",array('id'=>$row["i_id"]))."'>".$row['i_title']."</a></li>";
									}?>
							</ul>
						</div>
					</div>
                </div>