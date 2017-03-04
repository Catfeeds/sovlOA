<?php 
include_once("../web_start.php");
$rowa=$dblink->find("yx_step",array(),"yx_id =2");
//$rowb=$dblink->find("yx_hd",array(),"hd_id=2");
?>
<?php include('Research_head.php');?>
<body>
<div class="wrapper">
<!-- top -->
<?php include('yx_top.html'); ?>
<!-- top end -->
<!-- main -->
<div class="main">

<div class="mba_left">
    <div class="mba_tjleft" style="margin-top:0;">
        <div class="mba_tj_top">
             <dl><dt>推荐学校</dt><dd>&nbsp;</dd><dd class="mba_tj_tel">咨询热线:<span><?=$z_tel;?></span></dd></dl>
        </div>
        <div class="mba_tj_mid">
            <div class="mba_crlie">
				<?php
				$row1=$dblink->findAll('yx_school',array(),"nbool='1'",'','','school_id desc');				
				foreach($row1 as $v){
				$yxk_school=$v["school_id"];
				?>  
							<div class="mba_tj_mcon01">             
								<div class="mba_xt_left">								 
									<span class="mab_tj_xt"><img src="/admin_root/<?=$v["s_banner"]?>" width="115" height="93" /></span>
									<span class="mba_tj_xt"><?=$v["school_name"]?></span>
								</div>                        
								<div class="mba_tj_li">
									<ul>
									<?php
									$row2=$dblink->findAll('yx_kaike',array(),"yxk_school='$yxk_school' and yxk_cl ='MBA/EMBA'",'','0,5','yxk_id desc');
									foreach($row2 as $v){
									?> 
									<li><a href="/Research/yxschool.php?id=<?=$v["yxk_id"]?>"><?=$Common->strCutAndTags($v["yxk_title"],26,'..')?>..</a></li>
									<?php }?>
									</ul>
								</div>
							</div>
				<?php }?>    
			</div>
        </div>
        <div class="mba_tj_bot"><img src="/Research/images/mba_tj02.jpg" width="681" height="2" /></div>
    </div>
</div>
<?php include("right.php");?>
<!-- main end -->
<!-- bottom -->
<?php include('yx_bottom.html'); ?>
<!-- bottom end -->
</div>
</div>
</body>
</html>