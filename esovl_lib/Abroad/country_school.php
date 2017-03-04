<?php
include_once("../web_start.php");
$web=getWeb("12");
$row = $dblink->find('lxgjclass','',"lx_gjid=".$_GET["gjid"]);
$guojia=$row["lx_gjcl"];
$web['z_title'] = $guojia.'--留学频道';
include_once('Abroad_header.php');
?>
<script src="js/jquery-1.4a2.min.js" type="text/javascript"></script>
<script src="js/jquery.KinSlideshow-1.1.js" type="text/javascript"></script>
<body>
<div class="wrapper">
	<!-- top -->
	<?php include("lxtop.php"); ?>
	<!-- top end -->
	<!-- main -->
	<div class="main">
		<?php include("gqtop.php");?>
		<div class="lx_weizhi">
			<dl>
				<dt><img src="images/dot_ld.jpg" /><span>留学国家</span> >> <?=$guojia?></dt>
				<dd>您现在的位置：<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/"><?=$z_name?></a> >> <a href="/Abroad/">留学频道</a> >> <strong><?=$guojia?></strong></dd>
			</dl>
		</div>
		<div class="search">
			<div class="search_list">
				<ul>
					<li><input type="text" /></li>
					<li><input type="image" src="images/lx_searchanniu.jpg" /></li>
					<li><strong>关键字：</strong><a href="#">伦敦大学</a> | <a href="#">剑桥大学</a> | <a href="#">牛津大学</a> | <a href="#">伦敦大学</a></li>
				</ul>
			</div>
			<div class="search_tel">
				<dl>
					<dt>咨询热线：<span><?=$web["z_tel"]?></span></dt>
					<dd>
				<?php
					$lx_qq=$web["z_qq"];// 网站QQ	
					$lx_qq=explode(",",$lx_qq); //分割QQ
					$qcount=count($lx_qq);
                    if($qcount>2){
					    for ($i=0;$i<=1;$i++){
						echo "<a title='在线咨询1' href='tencent://message/?uin=".$lx_qq[$i]."&amp;Site=一休教育网&amp;Menu=yes'><img border='0' align='top' src='http://wpa.qq.com/pa?p=1:".$lx_qq[$i].":1'></a>";
						}
					}else{
						for ($i=0;$i<=$qcount-1;$i++){
						echo "<a title='在线咨询1' href='tencent://message/?uin=".$lx_qq[$i]."&amp;Site=一休教育网&amp;Menu=yes'><img border='0' align='top' src='http://wpa.qq.com/pa?p=1:".$lx_qq[$i].":1'></a>";
						}
						}
?>				
					</dd>
				</dl>
			</div>
		</div>
		<div class="country_school">
			<div class="country_school_box01">
				<div class="country_school_box01_left">
					<!-- pic size:352*228px -->
<script type="text/javascript">
$(function(){
        $("#KinSlideshow").KinSlideshow({
                moveStyle:"right",
                titleBar:{titleBar_height:30,titleBar_bgColor:"#08355c",titleBar_alpha:0.5},
                titleFont:{TitleFont_size:12,TitleFont_color:"#FFFFFF",TitleFont_weight:"normal"},
                btn:{btn_bgColor:"#FFFFFF",btn_bgHoverColor:"#1072aa",btn_fontColor:"#000000",
                     btn_fontHoverColor:"#FFFFFF",btn_borderColor:"#cccccc",
                     btn_borderHoverColor:"#1188c0",btn_borderWidth:1}
        });
    })
</script>
<div id="KinSlideshow">
<?php
		$res = $dblink->findAll('lx_hd','',"lxh_gjid=".$_GET["gjid"],'','5');
		foreach($res as $row){
?>
<a href="<?php echo $row["lxh_url"];?>" target=_blank><img border=0 src="../admin_root/<?php echo $row["lxh_pic"];?>" width="354px" height="228px"/></a>             
<?php }?>&nbsp;
</div>        
				</div>
				<div class="country_school_box01_cen">
<div id="px_pd_box03_center_01" class="px_pd_box03_center">
<div class="px_pd_box03_center_box01">

<?php
$row9 = $dblink->find('lxnews','',"lx_gjcl=".$_GET["gjid"],'','1');	   
if ($row9 != '/'){
?>
<dl>
<dt id="new01">
<a href='lx_news_detail.php?id=<?=$row9["lx_nid"]?>'><?=$row9["lx_ntitle"]?></a></dt>
<dd><?=$Common->strCut(strip_tags($row9["lx_ncon"]),200)?><a href='lx_news_detail.php?id=<?=$row9["lx_nid"]?>'>[阅读全文]</a></dd>
</dl>
<?php }?>

</div>
<div class="px_pd_box03_center_box02">
<ul>
<?php
$res = $dblink->findAll('lxnews','',"lx_gjcl=".$_GET["gjid"],'','1,9');
foreach($res as $row10){								  
?>
<li>·<a href="lx_news_detail.php?id=<?=$row10["lx_nid"]?>" title="<?=$row10["lx_ntitle"]?>"><?=$row10["lx_ntitle"]?></a></li>
<?php }?>
</ul>
</div>
</div>
				</div>
				<div class="country_school_box01_right">
<div class="main_box02_right_title">
<dl>
<dt>热门课程</dt>
<dd></dd>
</dl>
</div>
<div class="main_box02_right_list00">
<ul>
<?php
	$res = $dblink->findAll('lxkkinfo','',"lxk_gjid=".$_GET["gjid"]." and lxk_tjbool=1",'join lxgjclass on lxkkinfo.lxk_gjid=lxgjclass.lx_gjid',' 6');	 
	$k=0;
	foreach($res as $row_2){
		$k=$k+1;
	?>
	<li><?=$k?>.<span>[<?=$row_2["lx_gjcl"]?>]</span><a href="#"><?=$row_2["lxk_title"]?></a></li>
	<?php }?>
</ul>
</div>
				</div>
			</div>
			
			<div class="country_school_box02">
				<div class="main_box_left">
					<div class="main_box_left00">
					<div class="main_box_left00_title">
						<dl><dt><span class="color01">院校</span><span class="color02">·</span><span class="color03">排名</span></dt><dd>专家免费咨询热线：<?=$lx_bmtel?></dd></dl>
					</div>
					<div class="main_box_left00_list">
						<div class="country_school_left">
<div class="ranking">
<dl>
<?php
$row_2 = $dblink->find('lxkkinfo','',"lxk_gjid=".$_GET["gjid"]." and lxk_tjbool=1",'join lxgjclass on lxkkinfo.lxk_gjid=lxgjclass.lx_gjid','1','lxk_click desc');
?>
<dt><span>01</span><a href="#"><strong><?=$row_2["lxk_title"]?></strong></a></dt>
<dd><?=$Common->strCut(strip_tags($row_2["lxk_con"]),80)?>.....</dd>
<?php ?>
</dl>
<ul class="f14list">

<?php
$res = $dblink->findAll('lxkkinfo','',"lxk_gjid=".$_GET["gjid"]." and lxk_tjbool=1",'join lxgjclass on lxkkinfo.lxk_gjid=lxgjclass.lx_gjid','1,9','lxk_click desc');
if (count($res)>=1){
$k=1;
foreach($res as $row_2){
$k=$k+1;
?>
<li><span <?php if($k>7){echo"class=blue";}?>><?php if($k<10){echo"0".$k;}else{echo $k;}?></span><a href="#"><?=$row_2["lxk_title"]?></a></li>
<?php }}?>

</ul>
</div>
						</div>
						<div class="country_school_right">
<div class="main_lm_title" style="margin:8px 8px 0 8px;">
<dl><dt style="background:#f6f6f6;">热门学校</dt><dd style="background:#f6f6f6;"></dd></dl>
</div>
<div class="main_lm_list">
<div class="main_lm_list_l03">
<div class="main_box02_left_text11">
<div class="main_box02_left_text_list11">
<div>
<?php
			$res = $dblink->findAll('lxschool','',"lxs_gjid=".$_GET["gjid"]." and lxs_tjbool=1",'','3');
            foreach($res as $row_1){
?>
<div class="main_box02_left_text_list_pic1100">
<table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0" title="<?=$row_1["lxs_name"]?>">
<tbody><tr>
<td valign="middle" align="center">
<a href="lx_abroad.php?sid=<?=$row_1["lxs_id"]?>"><img src="/admin_root/<?=$row_1["lxs_logo"]?>" border="0" align="top"></a></td>
</tr>
</tbody>
</table>
</div>
<?php }?>
</div>
<ul class="lx_xx">
<?php   
			$res = $dblink->findAll('lxschool','',"lxs_gjid=".$_GET["gjid"]." and lxs_tjbool=1",'','11');
            foreach($res as $row_1){
?>
<li>&gt;&gt; <a href="lx_abroad.php?sid=<?=$row_1["lxs_id"]?>"><?=$row_1["lxs_name"]?></a></li>
<?php }?>
</ul>

</div>
</div>
</div>
</div>
						</div>
					</div>
				</div>
				</div>
				<div class="main_box_right">
					<div class="main_box02_right00">
            <div class="main_box02_right_title">
              <dl>
                <dt>专家解答</dt>
                <dd>&nbsp;</dd>
              </dl>
            </div>
            <div class="main_box02_right_list">
              <div class="main_box02_right_list03">
                <ul>
<?php
	  $res = $dblink->findAll('lxwd','','lxwd_bool=1','','3','lxwd_id desc');	  
	  $i=0;
	  foreach($res as $row){
      $i=$i+1;	 
	?>
                  <li><font color="#666">[问]<?=$row["lxwd_question"]?> <?=date("Y-m-d",strtotime($row["lxwd_date"]))?><br />
                    [答]<?=$row["lxwd_answer"]?></font></li>
  <?php }?>           
                 
                </ul>
              </div>
            </div>
          </div>
				</div>
			</div>
			
		</div>		
	</div>
	<!-- main end -->	
	<!-- bottom -->
	<?php include("lxbottom.php"); ?>
	<!-- bottom end -->	
</div>
</body>
</html>