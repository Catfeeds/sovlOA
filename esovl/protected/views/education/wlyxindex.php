<div class="main_xl_pro">
	<?=$this->renderPartial("topindex",array("models"=>$wlyxschoolGG));?>
    <div class="main_xl_pro_box02">
        <div class="main_xl_pro_box02_title">
            <dl>
                <dt><a>网络院校</a></dt>
                <dd><a href="<?=Yii::app()->createUrl("/education/index")?>">学历教育</a></dd>
                <dd><a href="<?=Yii::app()->createUrl("/education/zxksindex")?>">自学考试</a></dd>
                <dd><a href="<?=Yii::app()->createUrl("/education/crgkindex")?>">成人高考</a></dd>
                <dd><a href="<?=Yii::app()->createUrl("/education/gjbxindex")?>">国际办学</a></dd>
                <dd><a href="<?=Yii::app()->createUrl("/education/gxjzindex")?>">高校简章</a></dd>
                <dd><a href="<?=Yii::app()->createUrl("/education/jzsearch")?>">简章搜索</a></dd>
                <dd><a href="<?=Yii::app()->createUrl("/education/gfbindex")?>">高复班</a></dd>
            </dl>
        </div>
    </div>
    <div class="main_xllb">
        <?=$this->renderPartial("_wlyxleft1");?>
        <div class="wl-xw-left"><img src="/images/wl-xw_05.jpg" /></div>
        <div class="wl-xw-contant">
            <div class="wl-xw">
                <ul>
                <?php 	$news=Information::model()->getAllByLable(array("42"),3,8);
						foreach ($news as $row){
							echo "<li><a target='_blank' href='".Yii::app()->createUrl("education/newsview",array('id'=>$row["i_id"]))."' title='".$row["i_title"]."'>".Common::strCut($row["i_title"],30)."</a></li>";
						}?>
                </ul>
            </div>
        </div>
        <div class="wl-xw-right"><img src="/images/wl-xw_08.jpg" /></div>
        <?php 
			$pics="";
			$links="";
			$title='';
			foreach($HomeSlide as $val){
				if($val['pic']){
					$str=$pics||$links||$title?"|":'';
					$pics.=$str."/admin_root/".$val['pic'];
					$links.=$str.$val['link'];
					$title.=$str;//.$val['title'];
				}
			}?>
            <div class="wl-lh">
				<script type="text/javascript">
				<!-- 
				var interval_time=2 ;
				var focus_width=412;
				var focus_height=275;
				var text_height=23;
				var text_mtop = 0;
				var text_lm = 0;
				var textmargin = text_mtop+"|"+text_lm;
				var textcolor = "#005F00";
				var text_align= 'center'; 
				var swf_height = focus_height+text_height+text_mtop; 
				var text_size = 13;
				var borderStyle="0|0x000000|000";
				var pics="<?=$pics;?>";
				var links="<?=$links;?>";
				var texts="<?=$title;?>";
				
				document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash. cab#version=6,0,0,0" width="'+ focus_width +'" height="'+ swf_height +'">');
				document.write('<param name="allowScriptAccess" value="sameDomain"><param name="movie" value="images/hot_new.swf"> <param name="quality" value="high"><param name="Wmode" value="transparent">');
				document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
				document.write('<param name="FlashVars" value="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'&textmargin='+textmargin+'&textcolor='+textcolor+'&borderstyle='+borderStyle+'&text_align='+text_align+'&interval_time='+interval_time+'&textsize='+text_size+'">');
				document.write('<embed src="/images/hot_new.swf" wmode="opaque" FlashVars="pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'&textmargin='+textmargin+'&textcolor='+textcolor+'&borderstyle='+borderStyle+'&text_align='+text_align+'&interval_time='+interval_time+'&textsize='+text_size+'" menu="false" bgcolor="#ffffff" quality="high" width="'+ focus_width +'" height="'+ swf_height +'" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />');	document.write('</object>');
				//-->
				</script> 
            </div>
            <div class="wl-zc-left"><img src="/images/wl-zc_27.jpg" /></div>
            <div class="wl-zc-contant">
				<div class="zc-bt">网络教育政策</div>
				<div class="zc-more"><a href="<?=Yii::app()->createUrl("education/newslist",array('id'=>43))?>">MORE+</a></div>
            </div>
            <div class="wl-zc-right"><img src="/images/wl-zc_30.jpg" /></div>
            <div class="wl-zc-dk">
                <div class="wl-zc-bt">
                    <ul>
					<?php 	$news=Information::model()->getAllByLable(array("43"),3,8);
							foreach($news as $row){
								echo "<li><a href='".Yii::app()->createUrl("education/newsview",array('id'=>$row["i_id"]))."'>".$row['i_title']."</a></li>";
							}?>
                    </ul>
                </div>
            </div>
            <div style="width:950px;">
				<?=$this->renderPartial("_wlyxleft2");?>
                <div class="wl-jz">
					<div class="wl-zj-bt"><img src="/images/wl-jz_60.jpg" /></div>
					<?=$this->renderPartial("_wlyxzsjz");?>
                </div>
                <div class="wl-zc-left">
					<img src="/images/wl-zc_27.jpg" />
				</div>
                <div class="wl-zc-contant">
					<div class="zc-bt">报名流程</div>
                </div>
                <div class="wl-zc-right">
					<img src="/images/wl-zc_30.jpg" />
				</div>
                <div class="wl-zc-dk">
				<?php 	$news=Ennews::model()->getAllNews(array("20"),1,'ndate desc');
						$row=$news[0];?>
					<div class="wl-zc-lc">
						<img src="/admin_root/<?php echo $row['npic']?>" />
					</div>
                </div>
            </div>
            <div class="wl-gg">
                <div class="wl-gg-left"><img src="/images/wl-zc_27.jpg" /></div>
				<div class="wl-gg-contant">
					<div class="gg-bt">基础知识</div>
					<div class="gg-more"><a href="<?=Yii::app()->createUrl("education/newslist",array('id'=>45))?>">MORE+</a></div>
				</div>
				<div class="wl-gg-right"><img src="/images/wl-zc_30.jpg" /></div>
				<div class="wl-gg-dk">
					<div class="wl-gg-bt">
						<ul>
						<?php 	$news=Information::model()->getAllByLable(array("45"),6,8);
								foreach($news as $row){
									echo "<li><a target='_blank' href='".Yii::app()->createUrl("education/newsview",array('id'=>$row["i_id"]))."' title='".$row["i_title"]."'>".Common::strCut($row["i_title"],42)."</a></li>";
								}?>
						</ul>
					</div>
				</div>
            </div>
            <div class="wl-jz">
                <div class="wl-zj-bt"><img src="/images/wl-hd_79.jpg" /></div>
				<?=$this->renderPartial("_wlyxxywd");?>
            </div>
            <div class="wl-zc-left">
				<img src="/images/wl-zc_27.jpg" />
			</div>
            <div class="wl-zc-contant">
				<div class="zc-bt">学习资料</div>
				<div class="gg-more"><a href="<?=Yii::app()->createUrl("education/newslist",array('id'=>44))?>">MORE+</a></div>
            </div>
            <div class="wl-zc-right">
				<img src="/images/wl-zc_30.jpg" />
			</div>
            <div class="wl-zc-dk">
                <div class="wl-zc-bt">
                    <ul>
                    <?php 	$news=Information::model()->getAllByLable(array("44"),6,8);
							foreach($news as $row){
								echo "<li><a target='_blank' href='".Yii::app()->createUrl("education/newsview",array('id'=>$row["i_id"]))."' title='".$row["i_title"]."'>".Common::strCut($row["i_title"],45)."</a></li>";
							}?>
                    </ul>
                </div>
            </div>
    </div>
</div>