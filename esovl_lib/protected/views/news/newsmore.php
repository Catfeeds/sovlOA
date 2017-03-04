<?=$this->renderPartial("_newsleft",array("Nclass"=>$Nclass));?>	
<div class="main_news_right">
<div class="main_news_right_box01">
	<ul>
		<li>您现在的位置：</li>
		<li><a href="/">首页</a><span>>></span></li>
		<li><a href="news.php">资讯中心</a><span>>></span></li>
		<li><strong>全部</strong></li>
	</ul>
</div>

<div class="newsc1_box">
<?php
	
?>
	<div class="newsc1_list">
		<dl style="border:none;">
			<dt>[<?php //echo $row1["n_class"];?>]<a href="news_detail.php?id=<?php //echo $row["nid"];?>"><?php echo //$row["ntitle"];?></a></dt>
			<dd>[<?php //echo date("Y-m-d",strtotime($row["ndate"]));?>]</dd>
		</dl>
		<p class="news_list_text"><?php //echo $Common->strCut(strip_tags($row["ncon"]),100);?></p>
	</div>
	<?php //}}?>
</div>
<?/*
<div class="newsc1_box">
<?php
	$nl=$_GET["nl"];
	$pagesize = 6;
	$criteria=new CDbCriteria;
	if($nl=="tj"){$criteria->condition="nbool = 1";$criteria->order="ndate desc";}
	elseif($nl=="zx"){$criteria->order="ndate desc";}
	elseif($nl=="rm"){$criteria->order="nclick desc";}
	$count=$dblink->count("nnews",$criteria);
	$page= isset($_GET['page'])?$_GET['page']:1;//默认页码
	$getpageinfo = page($page,$count,$_SERVER['REQUEST_URI'],$pagesize);//调用函数，生成分页HTML 和 SQL LIMIT 子句
	$criteria->limit=$getpageinfo['sqllimit'];
	$newsModel=$dblink->selectAll("nnews",$criteria);
	foreach($newsModel as $row){
		$rs2 = $dblink->findAll("nclass",array(),"n_id = '{$row['nclass']}'");
		foreach($rs2 as $row1){
?>
	<div class="newsc1_list">
		<dl style="border:none;">
			<dt>[<?php echo $row1["n_class"];?>]<a href="news_detail.php?id=<?php echo $row["nid"];?>"><?php echo $row["ntitle"];?></a></dt>
			<dd>[<?php echo date("Y-m-d",strtotime($row["ndate"]));?>]</dd>
		</dl>
		<p class="news_list_text"><?php echo $Common->strCut(strip_tags($row["ncon"]),100);?></p>
	</div>
	<?php }}?>
</div>
<div class="main_news_right_box03">
	<?php if($count>6){?>
	<div class="fy">
			<ul>
				<li>共有 <?php echo $getpageinfo['pagetotal']?> 条记录，当前第 <?php echo $getpageinfo['curpage']?> 页</li>
				<?php echo $getpageinfo['pagecode']?>
			</ul>
	</div>
	<?php }?>
</div>*/?>
</div>