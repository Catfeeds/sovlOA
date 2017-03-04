<div class="top_box02_pr_001_002">
      <div class="top_box02_logo_pr_001"><a href="<?=$z_website?>"><img src="<?=$z_website?>images/gfb_01_03.jpg" /></a></div>
      <div class="top_box03_pr_001_002">
        <div class="top_nav_001_01">
          <div class="top_nav_box01_pr_001">
            <div class="top_nav_box01_list00_001"><a href="http://<?php echo $_SERVER['SERVER_NAME'];?>">首页</a></div>
            <div class="top_nav_box01_list01_01" id="nav_tb_">
              <ul>
                <li id="nav_tb_1" class="nav_hovertab_001" onmouseover="navHoverLi(1);">
                  <h1><a href="<?=$z_website?>Education/" onmouseout="navnoHoverLi();">学历</a></h1>
                </li>
                <li id="nav_tb_2" class="nav_normaltab_001" onmouseover="navHoverLi(2);" onmouseout="navnoHoverLi();">
                  <h1><a href="<?=$z_website?>Training/">培训</a></h1>
                </li>
                <li id="nav_tb_3" class="nav_normaltab_001" onmouseover="navHoverLi(3);" onmouseout="navnoHoverLi();">
                  <h1><a href="<?=$z_website?>Research/">研修</a></h1>
                </li>
                <li class="nav_normaltab"><a href="<?=$z_website?>Abroad/">留学</a></li>
                <li class="nav_normaltab"><a href="news.php">资讯</a></li>
                <li class="nav_normaltab"><a href="javascript:void(null);">社区</a></li>
                <li class="nav_normaltab"><a href="<?=$z_website?>Enterprise/">企培</a></li>
               </ul>
            </div>
          </div>
          <div class="top_nav_box02">
            <div class="top_nav_box02_box01_011"><img src="<?=$z_website?>images/gfb_112_08.jpg" /></div>
            <div class="top_nav_box02_box02_001">
              <div class="nav_dis" id="nav_tbc_01"> <a href="<?=$z_website?>Education/">学历教育</a> <a href="<?=$z_website?>Education/zxks/">自学考试</a> <a href="<?=$z_website?>Education/wlys/">网络院校</a> <a href="<?=$z_website?>Education/crgk/">成人高考</a> <a href="<?=$z_website?>Education/gjbx/">国际办学</a> <a href="<?=$z_website?>Education/xl_gxjz.php">高校简章</a> <a href="<?=$z_website?>Education/xl_pro_search.php">简章搜索</a> <a href="<?=$z_website?>Education/gfb/">高复班</a> </div>
              <div class="nav_undis" id="nav_tbc_02">
        <?php      
	     $rsp=mysql_query("select * from pxbclass",$conn);	  	 
	     if(mysql_num_rows($rsp)>=1){
		 $i=0;
		     while ($rowp=mysql_fetch_array($rsp,MYSQL_ASSOC)){
			 $i=$i+1;
             if ($rowp["pb_pindao"]=="外语频道"){
             echo"<a href='".$z_website."Training/px_pd01.php'>".$rowp["pb_title"]."</a>";
             }
              if ($rowp["pb_pindao"]=="高考频道"){
             echo"<a href='".$z_website."Training/px_pd02.php'>".$rowp["pb_title"]."</a>";
             }
             if ($rowp["pb_pindao"]=="中学生辅导"){
             echo"<a href='".$z_website."Training/px_pd03.php'>".$rowp["pb_title"]."</a>";
             }  
             if ($rowp["pb_pindao"]=="职业频道"){
             echo"<a href='".$z_website."Training/px_pd05.php'>".$rowp["pb_title"]."</a>";
             }
             if ($rowp["pb_pindao"]=="早教频道"){
             echo"<a href='".$z_website."Training/px_pd04.php'>".$rowp["pb_title"]."</a>";
             }
             if ($rowp["pb_pindao"]=="艺术体育"){
             echo"<a href='".$z_website."Training/px_pd06.php'>".$rowp["pb_title"]."</a>";
             }
             if ($rowp["pb_pindao"]=="少儿频道"){
             echo"<a href='".$z_website."Training/px_pd07.php'>".$rowp["pb_title"]."</a>";
             }
             }}?>            
            <a href="<?=$z_website?>Training/px_shcool.php">培训学校</a>
            <a href="<?=$z_website?>Training/px_shop.php">培训超市</a> 
              </div>
              <div class="nav_undis" id="nav_tbc_03"> <a href="javascript:void(null);">MBA/EMBA</a> <a href="javascript:void(null);">工程硕士</a> <a href="javascript:void(null);">在职研究生</a> <a href="javascript:void(null);">总裁总监研修</a> <a href="javascript:void(null);">简章大全</a> <a href="javascript:void(null);">简章搜索</a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>