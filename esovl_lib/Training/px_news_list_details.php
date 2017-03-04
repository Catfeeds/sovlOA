<?php 
include_once("../web_start.php");
?>
<?php
	$browse = $dblink->query("update ennews set nclick=nclick+1 where nid=".$_GET["id"]);	
	$rowa = $dblink->find('ennews','',"nid=".$_GET["id"],'join enclass on enclass.n_id=ennews.nclass');
?>
<?php 
$web=getWeb("11");
$web['z_title']=$rowa["ntitle"]."-".$web['z_name'];
include_once("Training_header.php");
?>

<body>
<div class="wrapper">
  <!-- top -->
  <?php include("pxtop.html")?>
  <!-- top End -->
  <!-- main -->
  <div class="main">
    <div class="px_gg"><?=$web['z_banner']?></div>
    <div class="px_ss">
      <ul>
     <?php 
if(isset($_POST["xl_skey"])){
	$skey=@$_POST["xl_skey"];
	echo "<script>location.href='../Education/xl_pro_search.php?skey=".$skey."';</script>";	
}
	?>
      <form name="xl_sform" id="xl_sform" method="post" onsubmit="return xl_sou();" action="">
        <li>
          <input name="xl_skey" type="text" style="width:220px;" />
        </li>
        <li>
          <input name="input" type="image" src="images/ss_pro.jpg" style="width:60px;height:24px;" />
        </li>
        <li><span>搜索关键词：</span><a href="#">考研</a> <a href="#">普通高考</a> <a href="#">成人高考</a> <a href="#">自考</a> <a href="#">在职硕士</a></li>
        </ul>
      </form>
    </div>
    <div class="px_kclist">
<div class="px_kclist_wz">您当前的位置：<a href="index.php">培训首页</a> >> <a href="px_news_list.php?cl=<?=$rowa["nclass"]?>"><?=$rowa["n_class"]?>新闻列表</a> >>新闻详细</div>
      <div class="px_kclist_box01">
        <div class="main_box03_left">
          <div class="main_box03_left_news">
            <div class="main_box03_left_news_title"><span><?=$rowa["n_class"]?>新闻详细</span></div>
			  <div class="main_box03_left_news_list_d">
              <h1><?=$rowa["ntitle"]?></h1>
              <h2><?php echo $z_name?> <?=date('Y-m-d',strtotime($rowa["ndate"]))?>&nbsp;&nbsp;浏览次数：<?=$rowa["nclick"]?></h2>
              <div class="main_box03_left_news_list_d_text"> <?=$rowa["ncon"]?><br/ ><span style="width:640px; border-top:1px solid #ccc; margin-left:10px; display:inline; float:left; text-align:right;"><a href="px_news_list.php?cl=<?=$rowa["nclass"]?>">返回列表</a></span></div>
            </div>
          </div>
        </div>
        <div class="main_box03_right">
          <div class="main_box03_right_box02">
            <div class="main_box03_right_box02_title">
              <dl>
                <dt>最新资讯</dt>
                <dd>&nbsp;</dd>
              </dl>
            </div>
            <div class="main_box03_right_box02_list">
              <div class="main_box03_right_box02_list_kc">
                <?php
	  //$sql="select * from ennews where nclass=".$rowa["nclass"]." order by ndate desc limit 6";
	  $res = $dblink->findAll('ennews','',"nclass=".$rowa["nclass"],'','6','ndate desc');
	  foreach($res as $row){
             ?>
                <dl>
                  <dt><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>">
                    <?=$Common->strCut($row["ntitle"],26)?>
                  </a></dt>
                  <dd>
                    <?=$row["ndate"]?>
                  </dd>
                </dl>
                <?php }?>
              </div>
            </div>
          </div>
          <div class="main_box03_right_box02">
            	<div class="main_box03_right_box02_title">
                <dl><dt>推荐课程</dt></dl>
                </div>
                <div class="main_box03_right_box02_list">
                <div class="main_box03_right_box02_list_kc">
      <?php
	  //$sql="select * from pxkkinfo order by pxk_bool desc";     
	  $res = $dblink->findAll('pxkkinfo','','','','','pxk_bool desc');
	 foreach($res as $row){
             ?>                 
          <dl><dt><a href="px_kc_list_details.php?id=<?=$row["pxk_id"]?>" title="<?=$row["pxk_title"]?>"><?=$Common->strCut($row["pxk_title"],26)?> </a></dt><dd><?=$row["pxk_date"]?></dd></dl>
     <?php }?>
                    </div>
                    
                </div>
            </div>
          <div class="main_box03_right_box03">
            <div class="main_box03_right_box0300"><?=$web['z_right1']?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- main End -->
  <!-- bottom -->
  <?php include("pxbottom.html");?>
  <!-- bottom End -->
</div>
</body>
</html>
