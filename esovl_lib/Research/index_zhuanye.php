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
             <dl><dt>专业列表</dt><dd>&nbsp;</dd><dd class="mba_tj_tel">咨询热线:<span><?=$z_tel?></span></dd></dl>
        </div>
        <div class="mba_tj_mid">
             <div class="mba_crlie">             
             <?php 
				$row6=$dblink->findAll('yx_class',array(),"class_pindao={$_GET["pd"]}",'','','class_id asc');
				foreach($row6 as $v){
				if($v["class_id"]){
				$class_title=$v["class_id"];
				?>  
						<div class="mba_tj_zy01">															   
											<div class="mba_tjzy1"><span><?=$v["class_title"];?></span></div>												
											<div class="mba_tjzy2">
												<span><a href="/Research/re_news_zhuanye.php?id=<?=$class_title?>"><img src="/admin_root/<?=$v["pxk_pic"]?>" width="75" height="70" /></a></span>
													<?php
														$row7=$dblink->findAll('yx_kaike',array(),"yxk_cl='MBA/EMBA' and class_title='{$class_title}'",'','0,5','yxk_id desc');																	
														foreach($row7 as $key=>$v){
															if($key==0){
														?>
														<span class="con1"><?=$Common->strCutAndTags($v["yxk_con"],120,'..')?><a href="/Research/re_news_zhuanye.php?id=<?=$class_title;?>">详细>></a></span>														
															<?php }else{
																		echo $key==1?'<span class="ul001"><ul>':"";?>
																		<li>·<a href="/Research/yxschool.php?id=<?=$v["yxk_id"]?>" title="<?=$v["yxk_title"]?>"><?=$Common->strCutAndTags($v["yxk_title"],45,'..')?></a></li>														
															<?php		echo $key==(count($v)-1)?'</ul></span>':'';
															}?>
													<?php }?>														
											</div>													
						</div>  
             <?php }}?>            
             </div>
        </div>
        <div class="mba_tj_bot"><img src="/Research/images/mba_tj02.jpg" width="681" height="2" /></div>
    </div>
</div>
<?php include_once("right.php");?>
<!-- main end -->
<!-- bottom -->
<?php include('yx_bottom.html'); ?>
<!-- bottom end -->
</div>
</div>
</body>
</html>