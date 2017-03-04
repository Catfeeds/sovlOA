<?php include_once("web_start.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$z_name?>-资讯中心</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/top.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/bottom.css" rel="stylesheet" type="text/css" />
<script src="js/style.js"></script>
</head>
<body>
<div class="wrapper">
<!-- top -->
<div class="top">
<?php 
include("top/top_1.html");
include("top/index_top1.html");
?> 
</div>
<!-- top End -->
<!-- main -->
<div class="main">
	<div class="main_N">
    	<div class="main_N_left">
        	<div class="main_N_left_title">
            	<dl>
					<dt>教育动态</dt>
					<dd>
						<?php
						$sql = $dblink->findAll("nclass",array(),"","","","n_id asc");
						foreach($sql as $row){
						//print_r($row);
						?>
						<a href="newscl.php?cl=<?=$row["n_id"]?>" title="<?=$row["n_class"]?>"><?=$row["n_class"]?></a><span>|</span>
						<?php }?>
					</dd>
                </dl>
            </div>
            <div class="main_N_left_box01">
            	<div class="main_N_left_box01_title">
					<dl><dt><span><a href="newscl.php?cl=<?php echo $row["n_id"];?>" title="<?php echo $row["n_class"];?>"><?php echo $row["n_class"];?></a>图片</span>新闻</dt><dd><a href="tpnewscl.php">更多>></a></dd></dl>
				</div>
                <div class="main_N_left_box01_list">
					 <?php
					 $sql = $dblink->findAll("nnews",array(),"","","4","ndate desc");
					 foreach($sql as $row){
					// print_r($row);
					 ?>
					<div class="main_N_left_box01_list00">
						<dl>
							<dt>
								<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
									<tr>
										<td align="center" valign="middle">
											<a href="news_detail.php?id=<?php echo $row["nid"];?>"><img src="<?=$z_website?>admin_root/<?=$row["npic"]?>" border="0" align="top" onload="if(this.width>152){this.width=152}if(this.height>96){this.height=96}"/></a>
										</td>
									</tr>
								</table>                        
							</dt>
							<dd><a title="<?php echo $row["ntitle"]?>" href="news_detail.php?id=<?php echo $row["nid"];?>"><?php echo $Common->strCut(strip_tags($row["ntitle"]),35);?></a></dd>
						</dl>
					</div>
					<?php }?>
				</div>
            </div>
            <div class="main_N_left_box01">
			<?php
				$j=0;
				$sql = $dblink->findAll("nclass",array());
				foreach($sql as $row){
				$j=$j+1;
			?>
            	<div class="main_N_left_box01_00">
                	<div class="main_N_left_box01_title">
						<dl><dt><span><?=$row["n_class"]?></span></dt><dd><a href="newscl.php?cl=<?php echo $row["n_id"];?>" title="<?php echo $row["n_class"];?>">更多>></a></dd></dl>
                	</div>
					<div class="main_N_left_box01_l_list">                    
					<?php
						$sq2 = $dblink->findAll("nnews",array(),"nclass= '{$row['n_id']}'","","10");
						foreach($sq2 as $row2){
					?>
						<dl><dt><span>·</span><a href="news_detail.php?id=<?php echo $row2["nid"];?>"><?=$row2["ntitle"]?></a></dt><dd><?=date("Y-m-d",strtotime($row2["ndate"]))?></dd></dl>
					<?php }?>
					</div>
				</div>
				<?php if($j==4){ //广告图片为学历教育后台设置 ?>
				<div class="main_N_left_box02"><a href="<?=$xl_gglink?>"><img src="<?=$z_website?>admin_root/<?=$xl_onegg?>" /></a></div>
				<?php }}?>   
            </div>           
        </div>
        <div class="main_N_right">
        	<div class="main_N_right_box01">
            	<div class="main_N_right_box01_title"><dl><dt>推荐新闻</dt><dd><a href="more_newscl.php?nl=tj">更多>></a></dd></dl></div>
                <div class="main_N_right_box01_list">
					<div class="zx_qr_01_12" style="width:auto;">
						<?php
							$sql = $dblink->findAll("nnews",array(),"nbool= 1","","1","ndate asc");
							foreach($sql as $row){
						?>
						<div class="zx_qr_01_02">
							<div class="zx_qr_01_02_ru_new"><a title="<?=$row["ntitle"]?>" href="news_detail.php?id=<?php echo $row["nid"];?>"><?php echo $Common->strCut(strip_tags($row["ntitle"]),35);?></a></div>
							<div class="zx_qr_01_02_rd_new" title="<?php echo $row["ncon"]?>" ><?php echo $Common->strCut(strip_tags($row["ncon"]),88);?></div>
						</div>
						<?php }?>
						<div class="zx_qr_01_03">
							<ul>
							<?php
								$sql = $dblink->findAll("nnews",array(),"nbool= 1","","5","ndate desc");
								foreach($sql as $row){
							?>
								<li><span>·</span><a title="<?php echo $row["ntitle"]?>" href="news_detail.php?id=<?php echo $row["nid"];?>"><?=$row["ntitle"]?></a></li>
							<?php }?>
							</ul>
						</div>

					</div>
				</div>
            </div>
            <div class="main_N_right_box01">
       	    	<a href="<?php echo $xl_z_right1_link?>"><img src="<?php echo $z_website?>admin_root/<?php echo $xl_z_right1?>" onload="if(this.width>220){this.width=220}"/></a>
            </div>
            <div class="main_N_right_box01">
            	<div class="main_N_right_box01_title"><dl><dt>最新新闻</dt><dd><a href="more_newscl.php?nl=zx">更多>></a></dd></dl></div>
                <div class="main_N_right_box01_list">
					<div class="zx_qr_01_12" style="width:auto;">
						<?php
						$sql = $dblink->findAll("nnews",array(),"","","1","ndate desc");
						foreach($sql as $row){
						?>
						<div class="zx_qr_01_02">
							<div class="zx_qr_01_02_ru_new"><a title="<?php echo $row["ntitle"]?>" href="news_detail.php?id=<?php echo $row["nid"];?>"><?php echo $Common->strCut(strip_tags($row["ntitle"]),35);?></a></div>
							<div class="zx_qr_01_02_rd_new"><?php echo $Common->strCut(strip_tags($row["ncon"]),88);?></div>
						</div>
						<?php }?>
						<div class="zx_qr_01_03">
							<ul>
							<?php
								$sql = $dblink->findAll("nnews",array(),"","","5","ndate desc");
								foreach($sql as $row){
							?>
								<li><span>·</span><a title="<?php echo $row["ntitle"]?>" href="news_detail.php?id=<?php echo $row["nid"];?>"><?=$row["ntitle"]?></a></li>
							<?php }?>
							</ul>
						</div>

					</div>
				</div>
            </div>
            <div class="main_N_right_box01">
       	    	<a href="<?=$xl_z_right2_link?>"><img src="<?=$z_website?>admin_root/<?=$xl_z_right2?>" onload="if(this.width>220){this.width=220}"/></a>
            </div>
            <div class="main_N_right_box01">
            	<div class="main_N_right_box01_title"><dl><dt>热门新闻</dt><dd><a href="more_newscl.php?nl=rm">更多>></a></dd></dl></div>
                <div class="main_N_right_box01_list">
					<div class="zx_qr_01_12" style="width:auto;">
						<?php
							$sql = $dblink->findAll("nnews",array(),"","","1","nclick desc");
							foreach($sql as $row){
							 ?>
						<div class="zx_qr_01_02">
							<div class="zx_qr_01_02_ru_new"><a href="news_detail.php?id=<?php echo $row["nid"];?>"><?=$row["ntitle"]?></a></div>
							<div class="zx_qr_01_02_rd_new"><?php echo $Common->strCut(strip_tags($row["ncon"]),88);?></div>
						</div>
						<?php }?>
						<div class="zx_qr_01_03">
							<ul>
							<?php
								 $sql = $dblink->findAll("nnews",array(),"","","5","nclick desc");
								 foreach($sql as $row){
								 ?>
								<li><span>·</span><a title="<?php echo $row["ntitle"]?>" href="news_detail.php?id=<?php echo $row["nid"];?>"><?=$row["ntitle"]?></a></li>
							<?php }?>
							</ul>
						</div> 
					</div>
              </div>
            </div>
      </div>
    </div>
</div>
<!-- main End -->
<!-- bottom -->
<?php include("bottom/bottom.html");?>
<!-- bottom End -->
</div>
</body>
</html>