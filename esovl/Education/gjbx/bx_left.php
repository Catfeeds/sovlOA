<div class="bx_zx_left">
          <div class="bz_news_dh"><img src="<?=$z_website?>images/bx-zx_03.jpg" width="245" height="24" /></div>
          <div class="bx_news_contant">
            <div class="bx_news_nov">
              <ul>
                <li <?php if($row['n_id']==37 or @$classid==37) echo "class='gjbx_1'"?>><a href="Education/gjbx/bx_zx.php?classid=37">热点资讯</a></li>
                <li <?php if($row['n_id']==36 or @$classid==36) echo "class='gjbx_1'"?>><a href="Education/gjbx/bx_zx.php?classid=36">海外新闻</a></li>
              </ul>
            </div>
          </div>
          <div class="bx_news_bommom"><img src="<?=$z_website?>images/bx-zx_07.jpg" width="245" height="4" /></div>
          
          <div class="wl-gg">
            <div class="wl-gg-left"><img src="<?=$z_website?>images/wl-zc_27.jpg" /></div>
            <div class="wl-gg-contant">
              <div class="gg-bt">热门点击排行榜</div>
            </div>
            <div class="wl-gg-right"><img src="<?=$z_website?>images/wl-zc_30.jpg" /></div>
            <div class="wl-gg-dk">
              <div class="bx_tj_bt">
                <dl>
            <?php	
			if(isset($classid)){
				$numq=mysql_query("select * from ennews where nclass='$classid' order by nclick desc limit 10");	
				}else{
					$numq=mysql_query("select * from ennews where nclass in (36,37) order by nclick desc limit 10");	
					}
				$i=0;
		    while($row=mysql_fetch_assoc($numq)){
				$i=$i+1;
			?>
                  <dd><?=$i?></dd>
                  <dt><span><a href="Education/gjbx/bx_zx_neiye.php?id=<?=$row['nid']?>" title="<?=$row['ntitle']?>"><?=utf_substr($row['ntitle'],26)?>..</a></span><?=$row["nclick"]?></dt>
            <?php }?>
                </dl>
                <div style="clear:both; height:12px;"></div>
              </div>
            </div>
          </div>
        </div>