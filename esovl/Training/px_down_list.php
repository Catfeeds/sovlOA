<?php 
include_once("../web_start.php");

$web=getWeb("11");
$web['z_title']='培训资料下载-'.$web['z_name'];
include_once("Training_header.php");
?>
<script src="js/pxstyle.js"></script>
<body>
<div class="wrapper">
  <!-- top -->
  <?php include("pxtop.html")?>
  <!-- top End -->
  <!-- main -->
  <div class="main">
    <div class="px_gg">
      <?=$web['z_banner']?>
    </div>
    <div class="px_ss">
      <ul>
        <li>
          <input name="input" type="text" />
        </li>
        <li>
          <select name="select">
            <option>所在省</option>
          </select>
        </li>
        <li>
          <select name="select">
            <option>请选择...</option>
          </select>
        </li>
        <li>
          <input name="input2" type="image" src="images/ss_pro.jpg" style="width:60px;height:24px;" />
        </li>
        <li><span>搜索关键词：</span><a href="#">考研</a> <a href="#">普通高考</a> <a href="#">成人高考</a> <a href="#">自考</a> <a href="#">在职硕士</a></li>
      </ul>
    </div>
    <div class="px_kclist">
      <div class="px_kclist_box01">
        <div class="main_box03_left_0003">
          <div class="mian_left_lj">
            <div class="mian_left_lj_001">您当前的页面地址：<a href="index.php">培训首页</a> >
              资料下载列表</div>
          </div>
          <div class="mian_left_news_lb">
            <div class="mian_left_news_bj">
              <div class="mian_left_news_lb_mc">
                资料下载列表</div>
            </div>
<?php
$pagesize=15;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$num = $dblink->countByStr('xl_ask','',"w_downcl='px'");
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from xl_ask where w_downcl='px' order by w_id desc limit $page $pagesize ";    
	  $res=$dblink->fetchAll($sql);
	  
	 foreach($res as $row){         
		
?>
     <div class="mian_left_news_bt">
     	<dl>
        <dt><?=$row["w_title"]?></dt>
        <dd><a href="admin_root/<?php echo $row["w_con"];?>" target="_blank"><img src="../images/djxz.jpg" /></a></dd>
        </dl>
     </div>
            
            <div class="mian_left_news_xux"></div>
            <?php }?>
            <div class="mian_left_mews_fanyi">
              <?php
if($num > $pagesize){
 if(@$pageval<=1)$pageval=1;

  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <a href=$url?page=".($pageval-1).">上一页</a>";
}
    for ($i=1;$i<=$cp;$i++){
	     if ($i==@$_GET["page"]){
		 echo $i;
		 }else{
	     echo "  <a href=$url?page=".$i.">[".$i."]</a>  ";
		 }
	}
if(@$_GET["page"]<$cp){
echo " <a href=$url?page=".($pageval+1).">下一页</a>";
}

} 
?>
            </div>
          </div>
          <div style="clear:both; float:left; height:12px;"></div>
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
				@$sql="select * from ennews where nclass=37 order by ndate desc limit 6"; //热点资讯
				$res = $dblink->fetchAll($sql);
				//$res = array();
				foreach($res as $row){
				?>
                <dl>
                  <dt>
					  <a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>">
						<?=$Common->strCut($row["ntitle"],26)?>
					  </a>
				  </dt>
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
