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
        <div class="top_nav_box01_list00"><a href="/">首页</a></div>
        <div class="top_nav_box01_list01" id="nav_tb_">
			<ul>
				<li id="nav_tb_1" class="nav_hovertab" onmouseover="navHoverLi(1);">
					<h1><a href="/Education/index" onmouseout="navnoHoverLi();">学历</a></h1>
				</li>
				<li id="nav_tb_2" class="nav_normaltab" onmouseover="navHoverLi(2);" onmouseout="navnoHoverLi();">
					<h1><a href="/Training/">培训</a></h1>
				</li>
				<li id="nav_tb_3" class="nav_normaltab" onmouseover="navHoverLi(3);" onmouseout="navnoHoverLi();">
					<h1><a href="/Research">研修</a></h1>
				</li>
				<li class="nav_normaltab"><a href="/Abroad">留学</a></li>
				<li class="nav_normaltab"><a href="/Enterprise">企培</a></li>
				<li class="nav_normaltab"><a href="/news.php">资讯</a></li>
				<li class="nav_normaltab"><a href="/bbs/">社区</a></li>
			</ul>
        </div>
      </div>
      <div class="top_nav_box02">
        <div class="top_nav_box02_box01">
			<img src="/images/nav_line002.jpg" />
		</div>
        <div class="top_nav_box02_box02">
			<div class="nav_dis" id="nav_tbc_01">
				<a href="<?=Yii::app()->createUrl("/education/index")?>">学历教育</a>
				<a href="<?=Yii::app()->createUrl("/education/zxksindex")?>">自学考试</a>
				<a href="<?=Yii::app()->createUrl("/education/wlyxindex")?>">网络院校</a>
				<a href="<?=Yii::app()->createUrl("/education/crgkindex")?>">成人高考</a>
				<a href="<?=Yii::app()->createUrl("/education/gjbxindex")?>">国际办学</a>
				<a href="<?=Yii::app()->createUrl("/education/gxjzindex")?>">高校简章</a>
				<a href="<?=Yii::app()->createUrl("/education/jzsearch")?>">简章搜索</a>
				<a href="<?=Yii::app()->createUrl("/education/gfbindex")?>">高复班</a>
			</div>
			<div class="nav_undis" id="nav_tbc_02">
				<?php      
					foreach(Pxbclass::model()->findAll() as $rowp){
						if ($rowp["pb_pindao"]=="外语频道"){
						echo"<a href='/Training/px_pd01.php'>".$rowp["pb_title"]."</a>";
						}
						 if ($rowp["pb_pindao"]=="高考频道"){
						echo"<a href='/Training/px_pd02.php'>".$rowp["pb_title"]."</a>";
						}
						if ($rowp["pb_pindao"]=="中学生辅导"){
						echo"<a href='/Training/px_pd03.php'>".$rowp["pb_title"]."</a>";
						}  
						if ($rowp["pb_pindao"]=="职业频道"){
						echo"<a href='/Training/px_pd05.php'>".$rowp["pb_title"]."</a>";
						}
						if ($rowp["pb_pindao"]=="早教频道"){
						echo"<a href='/Training/px_pd04.php'>".$rowp["pb_title"]."</a>";
						}
						if ($rowp["pb_pindao"]=="艺术体育"){
						echo"<a href='/Training/px_pd06.php'>".$rowp["pb_title"]."</a>";
						}
						if ($rowp["pb_pindao"]=="少儿频道"){
						echo"<a href='/Training/px_pd07.php'>".$rowp["pb_title"]."</a>";
						}
					}
				 ?>            
				<a href="/Training/px_shcool.php">培训学校</a>
				<a href="/Training/px_shop.php">培训超市</a>          
			</div>          
			<div class="nav_undis" id="nav_tbc_03">
				<a href="/Research/MBA">MBA/EMBA</a>
				<a href="/Research/master">工程硕士</a>
				<a href="/Research/graduate">在职研究生</a>
				<a href="/Research/president">总裁总监研修</a> <a href="/Research/yx_daquan.php">简章大全</a> <a href="/Research/yx_seach.php">简章搜索</a> 
			</div>
        </div>
        <div class="top_nav_box02_box03"><img src="/images/nav_line02.jpg" /></div>
      </div>
    </div>
  </div>
</div>