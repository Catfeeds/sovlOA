<div class="right">
    <div class="mba_tjriht" style="margin-top:0;">
      <div class="mba_03_top"><h5>金牌课程推荐</h5><span></span></div>
                <div class="mba_tjright_list">
                        <ul>
                        <?php 
						$rowk=$dblink->findAll("yx_kaike",array(),"pxk_bool=1",'','0,7',"yxk_id desc");
						foreach($rowk as $v){
						?>
						<li><a href="/Research/yxschool.php?id=<?=$v["yxk_id"]?>" title="<?=$v["yxk_title"]?>"><?=$Common->strCutAndTags($v["yxk_title"],45)?></a></li>
						<?php }?>
						</ul>
                </div>
      <div class="mba_03_bot"></div>
    </div>
    
</div>
<div class="mba_right">
	<div class="mba_tjriht">
      <div class="mba_03_top"></div>
                 <div class="mba_tjright_list"><?=$rowa["yx_gg"]?></div>
      <div class="mba_03_bot"></div>
    </div>
    <div class="mba_tjriht">
      <div class="mba_03_top"><h5>常见问题</h5><span><a href="/Research/re_wenda_list.php">MORE</a></span></div>
                 <div class="mba_tjright_list">
                    <ul>
					<?php
					$row0=$dblink->findAll('yx_changj',array(),"cj_pindao='{$rowa["yx_name"]}'",'','0,9','cj_id desc');						
					foreach($row0 as $v){
					?>
					<li><a href="/Research/re_wenti_show.php?id=<?=$v["cj_id"];?>"><?=$Common->strCutAndTags($v["cj_wenti"],26,'..')?></a></li>
					<?php }?>
					</ul>
                 </div>
      <div class="mba_03_bot"></div>
    </div>
</div>