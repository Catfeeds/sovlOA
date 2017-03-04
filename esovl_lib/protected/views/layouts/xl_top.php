<div class="top_box02_pr">
  <div class="top_box02_logo_pr"><a href="/"><img src="/admin_root/<?php echo $web["z_logo"];?>" /></a></div>
  <div class="top_box02_guangao" style="font-size:16px; font-weight:bold; text-align:center; color:#eb5801;">
    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="700" height="50">
		<param name="movie" value="/admin_root/<?php echo $web["z_banner"];?>" />
		<param name="quality" value="high" />
		<param name="wmode" value="transparent" />
		<embed src="/admin_root/<?php echo $web["z_banner"];?>" width="700" height="60" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent"></embed>
    </object>
  </div>
  
  <div class="top_box03_pr">
    <div class="top_nav">
		<div class="top_nav_box01_pr">
			<?=$this->renderPartial('/layouts/_nav_menu')?>
		</div>
		<div class="top_nav_box02">
			<div class="top_nav_box02_box01">
				<img src="/images/nav_line002.jpg" />
			</div>
		  <?=$this->renderPartial('/layouts/_nav_list')?>
		   <div class="top_nav_box02_box03"><img src="/images/nav_line02.jpg" /></div>
		</div>
   
    </div>
  </div>
</div>