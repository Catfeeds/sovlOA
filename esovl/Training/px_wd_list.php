<?php 
include_once("../web_start.php");

$web=getWeb("11");
$web['z_title']='在线问答-'.$web['z_name'];
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
        </form>
      </ul>
    </div>
    <div class="px_kclist">
    	<div class="px_kclist_wz">您当前的位置：<a href="index.php">培训首页</a> >> <a href="px_wd_list.php">在线问答</a></div>
      <div class="px_kclist_box01">
        <div class="main_box03_left_0003">
          <div class="mian_left_news_lb" style="margin-top:0;">
            <div class="mian_left_news_bj">
              <div class="mian_left_news_lb_mc">在线问答</div>
            </div>
<div class="px_zxwd">
                <form name="pxwdform" method="post" onsubmit="return px_zxwd()" action="">
           <dl><dt><textarea name="px_ask" cols="" rows=""></textarea></dt><dd><input name="" type="submit" value="提交留言" /></dd></dl>
                </form>
            </div>
<?php
$pagesize=8;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$num = $dblink->countByStr('pxwd','',"px_bool=1");
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
		@$sql="select * from pxwd where px_bool=1 order by px_time desc limit $page $pagesize ";
		$res = $dblink->fetchAll($sql);
		foreach($res as $row){         
		
?>
            <div class="mian_left_news_bt"><span style="font-size:12px;"><?=$row["px_ask"]?></span>
              <?=date('Y-m-d',strtotime($row["px_time"]))?>
            </div>
            <div class="mian_left_news_jxnr"><?=$row["px_answer"]?></div>
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
            <dl><dt>培训学校推荐</dt></dl>
          </div>
          <div class="main_box03_right_box02_list">
            <div class="main_box03_right_box02_list_01_cjwt">
              <ul>
      <?php
		$res = $dblink->findAll('pxschool','','','','','pxs_bool desc');
	  
	
		foreach($res as $row){
             ?>
                <li><span>·</span><a href="px_school/?pid=<?=$row["pxs_id"]?>"><?=$row["pxs_name"]?></a></li>
     <?php }?>
              </ul>
            </div>
          </div>
        </div>
        <div class="main_box03_right_box03">
            <div class="main_box03_right_box0300"><?=$web['z_right1']?></div>
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
            <div class="main_box03_right_box0300"><?=$web['z_right2']?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
 if (isset($_POST["px_ask"])){
	$rsa = $dblink->findAll('pxwd','',"px_ask='".$_POST["px_ask"]."'");
	if (count($rsa)>=1){
   echo"<script>alert('已存在相同的问题,请勿重复提交');</script>";
  }else{
		  $sql="insert into pxwd set px_ask='".$_POST["px_ask"]."',px_time=now()";
		  $rs = $dblink->query($sql);         
         if ($rs){
		   echo"<script>alert('提问已发出,请等待管理员的审核回复!');</script>";
		  // echo"<meta http-equiv='refresh' content='0; url=px_wd_list.php'>";
		  }
	   }
  }
  ?>
  <!-- main End -->
  <!-- bottom -->
    <?php include("pxbottom.html");?>
  <!-- bottom End -->
</div>
</body>
</html>
