<?php 
include_once("../web_start.php");
$web=getWeb("11");
$behind_title="-培训课程列表页";
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
        </form>
      </ul>
    </div>
    <?php
	  $row0 = $dblink->find('pxsclass','','ps_id='.$_GET["pid"]);
     ?>
    <div class="px_kclist">
      <div class="px_kclist_wz">您当前的位置：<a href="index.php">培训首页</a> >> 课程分类 >> <?=$row0["ps_title"]?></div>
      <div class="px_kclist_fl">
        <ul>
      <?php
      $sql="select * from pxsclass where pb_id=(select pb_id from pxsclass where ps_id=".$_GET["pid"].")";
	  $res = $dblink->fetchAll($sql);
	  foreach($res as $row){    
     ?>
          <li><a href="px_kc_list.php?pid=<?=$row["ps_id"]?>">
            <?=$row["ps_title"]?>
          </a></li>
          <?php }?>
        </ul>
      </div>
      <div class="px_kclist_box01">
        <div class="main_box03_left">
          <div class="main_box03_left_kclist01">
            <div class="main_box03_left_kclist01_title">课程列表</div>
            <div class="main_box03_left_kclist01_title02">
              <dl>
                <dt>培训课程/名称</dt>
                <dd>在线咨询</dd>
                <dd>网上报名</dd>
              </dl>
            </div>
<?php
$pagesize=8;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=$dblink->findAll('pxkkinfo','','pxk_cl='.$_GET["pid"]);
$num = count($numq);
$cp=ceil($num/$pagesize);//函数获取页数
$page=0;
if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      //@$sql="SELECT * FROM pxkkinfo join pxschool on pxkkinfo.pxk_sid=pxschool.pxs_id where pxk_cl=".$_GET["pid"]." order by pxk_id desc limit $page $pagesize ";
	  $res = $dblink->findAll('pxkkinfo','','pxk_cl='.$_GET["pid"],'join pxschool on pxkkinfo.pxk_sid=pxschool.pxs_id',"$page,$pagesize",'pxk_id desc');
	 	   
	  foreach($res as $row){		
?>
            <div class="main_box03_left_kclist01_list">
              <dl>
                <dt>
                  <div class="px_list01">
                    <h1><a href="px_kc_list_details.php?id=<?=$row["pxk_id"]?>"><?=$row["pxk_title"]?></a><span><?=$row["pxk_date"]?></span></h1>
                    <ul>
                      <li>学费：<span><?=$row["pxk_xfei"]?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;网上优惠价格：<span><?=$row["pxk_yhui"]?></span></li>
                      <li>上课地点：<?=$row["pxk_adder"]?></li>
                      <li>学校名称：<a href="px_school/?pid=<?=$row["pxs_id"]?>"><?=$row["pxs_name"]?></a></li>
                    </ul>
                  </div>
                </dt>
                <dd><?php if ($row["pxk_qq"]!=0){echo"<a href=tencent://message/?uin=".$row['pxk_qq']."&Site=一休教育网&Menu=yes><img border='0' src=http://wpa.qq.com/pa?p=1:".$row['pxk_qq'].":7 align='top'/></a>";}else{echo"尚未添加";}?></dd>
                <dd><a href="px_school/baoming.php?pid=<?=$row["pxs_id"]?>"><img src="images/px_wsbm.jpg" /></a></dd>
              </dl>
            </div>
 <?php }?>
            <div class="main_box03_left_kclist01_bottom">
              <ul>
                <li><?php
				echo "共".$cp."页";
if($num > $pagesize){
 if(@$pageval<=1)$pageval=1;

  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <a href=$url?pid=".$_GET["pid"]."&page=".($pageval-1).">上一页</a>";
}
    for ($i=1;$i<=$cp;$i++){
	     if ($i==@$_GET["page"]){
		 echo $i;
		 }else{
	     echo "  <a href=$url?pid=".$_GET["pid"]."&page=".$i.">[".$i."]</a>  ";
		 }
	}
if(@$_GET["page"]<$cp){
echo " <a href=$url?pid=".$_GET["pid"]."&page=".($pageval+1).">下一页</a>";
}
} 
?></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="main_box03_right">
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
            <div class="main_box03_right_box0300">
              <?=$web['z_onegg']?>
            </div>
          </div>
          <div class="main_box03_right_box02">
            <div class="main_box03_right_box02_title">
              <dl>
                <dt>在线问答</dt>
                <dd><a href="px_wd_list.php">更多...</a></dd>
              </dl>
            </div>
            <div class="main_box03_right_box02_list">
              <?php 
		  //$sql="select * from pxwd where px_bool=1 order by px_time desc limit 4";
		  $res = $dblink->findAll('pxwd','','px_bool=1','','4','px_time desc');	 	 
			foreach($res as $row){
		  ?>
              <div class="main_box03_right_box02_list_01">
                <ul>
                  <li><span>【问】：</span><?=$row["px_ask"]?></li>
                  <li><span>【答】：</span><?=$row["px_answer"]?></li>
                </ul>
              </div>
              <?php }?>   
            </div>
          </div>
          <div class="main_box03_right_box03">
            <div class="main_box03_right_box0300"><?=$web['z_right2']?></div>
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
