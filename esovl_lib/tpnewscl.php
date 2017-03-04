<?php 
include_once("conn.php");
include_once("web_start.php");	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一休网-资讯中心</title>
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
				<div class="main_news">
					<?php include("left/news_left.html");?>
					<div class="main_news_right">
						<div class="main_news_right_box01">
							<ul>
							<li>您现在的位置：</li>
							<li><a href="/">首页</a><span>>></span></li>
							<li><a href="news.php">资讯中心</a><span>>></span></li>
							<li><strong>全部</strong></li>
							</ul>
						</div>
						<div class="new_pic_margin">
						<?php
							$criteria=new CDbCriteria;
							$criteria->condition="npic<>''";
							$count=$dblink->count("nnews",$criteria);
							$page= isset($_GET['page'])?$_GET['page']:1;//默认页码
							$getpageinfo = page($page,$count,$_SERVER['REQUEST_URI'],12);//调用函数，生成分页HTML 和 SQL LIMIT 子句
							$criteria->limit=$getpageinfo['sqllimit'];
							$newsModel=$dblink->selectAll("nnews",$criteria);
							$i=0;
							//echo $getpageinfo['pagecode'];
							foreach($newsModel as $row){
								$i=$i+1;
								$rs2 = $dblink->findAll("nclass",array(),"n_id = '{$row['nclass']}'");
								foreach($rs2 as $row1){
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
									<dd><a href="news_detail.php?id=<?php echo $row["nid"];?>"><?=$row["ntitle"]?></a></dd>
								</dl>
							</div>
						<?php }}?>           
						</div>
						<div class="main_news_right_box03">
						<?php if($count>12){?>
							<div class="fy">
								<ul>
									<li>共有 <?php echo $getpageinfo['pagetotal']?> 条记录，当前第 <?php echo $getpageinfo['curpage']?> 页</li>
									<?php echo $getpageinfo['pagecode']?>
								</ul>
							</div>
						<?php }?>
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