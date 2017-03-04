<?php 
include_once("../conn.php");

include_once("xl_webstep.php");
?>
<?php
       $rs1=mysql_query("select n_class from enclass where n_id=".$_GET["cl"]);
	   $row1=mysql_fetch_array($rs1,MYSQL_ASSOC);
	   $ction=$row1["n_class"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$ction?>-资讯中心-学历教育</title>
<base href="http://<?php echo $_SERVER['SERVER_NAME'];?>/">
<link href="../css/css.css" rel="stylesheet" type="text/css" />
<link href="../css/top.css" rel="stylesheet" type="text/css" />
<link href="../css/main.css" rel="stylesheet" type="text/css" />
<link href="../css/bottom.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery.js"></script>
<script src="../js/style.js"></script>
</head>
<body>
<div class="wrapper">
          <div class="top">
   <?php 
	include("../top/top_1.html");
	include("../top/xl_top.html");
	?>
          </div>
          <div class="main">
            <div class="main_xl_pro">
              <div class="main_xl_pro_box01">
                <div class="main_xl_pro_box01_left">
                  <?php
				$sql="select * from xl_s_h limit 3";
       			$rs=mysql_query($sql);
        			//$row=mysql_fetch_assoc($rs);
				?>
                  <div class="right_box01">
                    <div class="main_xl_pro_box01_left_pic">
                      <?php
						$i=0;
						while ($row=mysql_fetch_assoc($rs)){
						$i=$i+1;
						?>
                      <div id="tbc_0<?php echo $i;?>" class=""><a href="<?php echo $row["zxks/s_h_http"];?>"><img src="<?=$z_website?>admin_root/<?php echo $row["s_h_pic"];?>"/></a></div>
                      <?php }	?>
                    </div>
                    <div class="main_xl_pro_box01_left_text">
                      <ul>
                        <?php
							$sql="select * from xl_s_h limit 3";
                			$rs=mysql_query($sql); 
							$j=0;
							while ($row=mysql_fetch_assoc($rs)){
							$j=$j+1;
							?>
                        <li id="tb_<?php echo $j;?>" <?php if($j!=1){echo "class='normaltab1'";}else{echo "class='hovertab1'";}?> onmouseover="HoverLi(3);OvHoverLi(<?php echo $j;?>);">·<a href="<?php echo $row["zxks/s_h_http"];?>"><?php echo $row["s_h_title"];?></a></li>
                        <?php }?>
                      </ul>
                    </div>
                    <script type="text/javascript">
function g(o){return document.getElementById(o);}
function HoverLi(n){
for(var i=1;i<=3;i++){g('tb_'+i).className='normaltab1';g('tbc_0'+i).className='undis';}g('tbc_0'+n).className='dis';g('tb_'+n).className='hovertab1';
}
function OvHoverLi(n){
for(var i=1;i<=3;i++){g('tb_'+i).className='normaltab1';g('tbc_0'+i).className='undis';}g('tbc_0'+n).className='dis';g('tb_'+n).className='hovertab1';
}
        </script> 
                  </div>
                </div>
                <div class="main_xl_pro_box01_right">
                  <ul>
                    <?php 
	  				$sql="select * from luqu order by lq_date desc limit 5 ";     
	  				$rs=mysql_query($sql,$conn);
	  				if (!$rs){  
	  					exit("数据库操作失败! 错误信息为:".mysql_error());
	 				}
	  				if (mysql_num_rows($rs)>=1){
						while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
	     					$rs1=mysql_query("select s_name from school where s_id=".$row["s_id"],$conn); 
		  					$row1=mysql_fetch_assoc($rs1);
		  				
           					$rs2=mysql_query("select * from kkinfo where s_id=".$row["s_id"]." limit 1");
							$row2=mysql_fetch_assoc($rs2);
	  				?>
                    <li>·<a href="xl_pro_detail.php?kid=<?php echo $row2["kid"];?>&amp;sid=<?php echo $row["s_id"];?>"><?php echo $row1["s_name"];?></a></li>
                    <?php }}?>
                  </ul>
                </div>
              </div>
              <div class="main_xl_pro_box02">
                <div class="main_xl_pro_box02_title">
                  <dl>
                    <dt><a href="<?=$z_website?>Education/">学历教育</a></dt>
                    <dd><a href="<?=$z_website?>Education/zxks/">自学考试</a></dd>
                    <dd><a href="<?=$z_website?>Education/wlys/">网络院校</a></dd>
                    <dd><a href="<?=$z_website?>Education/crgk/">成人高考</a></dd>
                    <dd><a href="<?=$z_website?>Education/gjbx/">国际办学</a></dd>
                    <dd><a href="<?=$z_website?>Education/xl_gxjz.php">高校简章</a></dd>
                    <dd><a href="<?=$z_website?>Education/xl_pro_search.php">简章搜索</a></dd>
                    <dd><a href="<?=$z_website?>Education/gfb/">高复班</a></dd>
                  </dl>
                </div>
                <div class="main_xl_pro_box02_mu1"><img src="<?=$z_website?>images/zx_01.jpg" /></div>
                <div class="main_xl_pro_box02_mu2">
                  <div>
                    <ul>
                      <li class="zx_li_1"><img src="<?=$z_website?>images/zx_04.jpg" /></li>
                      <li class="zx_li_2">
                        <div class="zx_li_2_dv1">
                          <dl>
                            <dt><a href="<?=$z_website?>Education/zxks/zx_nlist.php?cid=22">自考政策</a></dt>
                            <dt><a href="<?=$z_website?>Education/zxks/zx_nlist.php?cid=23">报名信息</a></dt>
                            <dt><a href="<?=$z_website?>Education/zxks/zx_nlist.php?cid=24">自考常识</a></dt>
                            <dt><a href="<?=$z_website?>Education/zxks/zx_nlist.php?cid=25">各地新闻</a></dt>
                            <dt><a href="<?=$z_website?>Education/zxks/zx_nlist.php?cid=26">自考辅导</a></dt>
                            <dt><a href="<?=$z_website?>Education/zxks/zx_nlist.php?cid=27">成绩查询</a></dt>
                          </dl>
                        </div>
                      </li>
                      <li class="zx_li_6"></li>
                      <li class="zx_li_4"><img src="<?=$z_website?>images/zx_05.jpg" /></li>
                      <li class="zx_li_5">
                        <div class="zx_li_2_dv1">
                          <dl>
                            <dt><a href="<?=$z_website?>Education/zxks/zx_nlist.php?cid=28">择校指南</a></dt>
                            <dt><a href="<?=$z_website?>Education/zxks/zx_school.php">自考院校</a></dt>
                            <dt><a href="<?=$z_website?>Education/zxks/zx_ask.php">自考问答</a></dt>
                            <dt><a href="<?=$z_website?>Education/zxks/zx_nlist.php?cid=30">复习备考</a></dt>
                            <dt><a href="<?=$z_website?>Education/zxks/zx_zkzy.php">自考专业</a></dt>
                            <dt><a href="<?=$z_website?>Education/zxks/zx_nlist.php?cid=31">经验分享</a></dt>
                          </dl>
                        </div>
                      </li>
                      <li class="zx_li_6"></li>
                      <li class="zx_li_7"><img src="<?=$z_website?>images/zx_06.jpg" /></li>
                      <li class="zx_li_8">
                        <div class="zx_li_2_dv1">
                          <dl>
                            <dt><a href="<?=$z_website?>Education/zxks/zx_gaoqizhuan.php">高起专</a></dt>
                            <dt class="zx_li_2_dv1_1"><a href="<?=$z_website?>Education/zxks/zx_zhuansben.php">专升本</a></dt>
                            <dt><a href="<?=$z_website?>Education/zxks/zx_gaoqiben.php">高起本</a></dt>
                            <dt><a href="<?=$z_website?>Education/zxks/zx_nlist.php?cid=32">试题库</a></dt>
                          </dl>
                        </div>
                      </li>
                      <li class="zx_li_6"></li>
                      <li class="zx_li_7"><img src="<?=$z_website?>images/zx_07.jpg" /></li>
                      <li class="zx_li_9">
                        <div class="zx_li_2_dv1">
                          <dl>
                            <dt><a href="<?=$z_website?>Education/zxks/zx_nlist.php?cid=33">考试计划</a></dt>
                            <dt><a href="<?=$z_website?>Education/xl_gxjz.php">简章大全</a></dt>
                          </dl>
                        </div>
                      </li>
                      <li class="zx_li_6"></li>
                      <li class="zx_li_10">自考不限户口、职业、年龄、学历、一律免考入学，多种形式上课，专业任选</li>
                    </ul>
                  </div>
                </div>
                <div class="main_xl_pro_box02_mu3"><img src="<?=$z_website?>images/zx_03.jpg" /></div>
              </div>
              <div class="zx_zx_dk">
                <div class="zx_zx_fd">
                  <div class="zx_zx_lj">
                    <dl>
                      <dd><span><a href="#">首页</a></span></dd>
                      <dt><img src="<?=$z_website?>images/bx_hw_03.jpg" width="17" height="30" /></dt>
                      <dd><a href="<?=$z_website?>Education/zxks/">学历教育</a></dd>
                      <dt><img src="<?=$z_website?>images/bx_hw_03.jpg" width="17" height="30" /></dt>
                      <dd><?=$ction?></dd>
                      <dt><img src="<?=$z_website?>images/bx_hw_03.jpg" width="17" height="30" /></dt>
                    </dl>
                  </div>
                </div>
                <div class="zx_wzgg">
                  <div class="zx_gg_lm">
                    <div class="zx_gg_zl"><?=$ction?></div>
                  </div>
                  <div class="zx_lm_dian"><img src="<?=$z_website?>images/wl-gg_06.jpg" /></div>
<?php
$pagesize=6;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("SELECT * FROM ennews where nclass=".$_GET["cl"]);
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from ennews where nclass=".$_GET["cl"]." order by ndate desc limit $page $pagesize ";     
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	  
	 if (mysql_num_rows($rs)>=1){
	 $i=0;
	 while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
     $i=$i+1;	 
	         
		if($i==1&&@$page<2){	 
?>
                  <div class="zx_xw_dk">
                    <div class="zx_xw_tu"><img src="<?=$z_website?>admin_root/<?=$row["npic"]?>" alt=<?=$row["ntitle"]?>/></div>
                    <div class="zx_xw_bt"><a href="<?=$z_website?>Education/xl_news_detail.php?id=<?php echo $row["nid"];?>"><?=$row["ntitle"]?></a></div>
                    <div class="zx_xw_sj" style="float:right;width:80px;">
                      <?=date('Y-m-d',strtotime($row["ndate"]))?>
                    </div>
                    <div class="zx_xw_nr"><?=msubstr(strip_tags($row["ncon"]),170)?>.. </div>
                  </div>
                  <?php }else{?>
                  <div class="zx_xw_dk2">
                    <div class="zx_wzgg_bt"><span><a href="<?=$z_website?>Education/xl_news_detail.php?id=<?php echo $row["nid"];?>"><?=$row["ntitle"]?></a></span>
                      <?=date('Y-m-d',strtotime($row["ndate"]))?>
                    </div>
                    <div class="zx_wzgg_nr">
                      <?=msubstr(strip_tags($row["ncon"]),180)?>
                      .. <span><a href="<?=$z_website?>Education/xl_news_detail.php?id=<?=$row["nid"]?>">查看详细>></a></span></div>
                  </div>
                  <?php }}}?>
                  <div class="zx_gg_fy"> <span style=" display:block;float:left;"><?php echo "共 $num 条信息";?></span>
                    <div style="float:right;">
<?php
if($num > $pagesize){
 if(@$pageval<=1)$pageval=1;


  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <div class='zx_fy_syy'><a href=$url?cl=".$_GET["cl"]."&page=".($pageval-1)."><img src='../images/wl-gg_18.jpg' /></a></div>";
}
    for ($i=1;$i<=$cp;$i++){
	     if ($i==@$_GET["page"]){
		 echo " <div class='zx_fy_sz'>".$i."</div> ";
		 }else{
	     echo " <div class='zx_fy_sz'><a href=$url?cl=".$_GET["cl"]."&page=".$i.">".$i."</a></div> ";
		 }
	}
if(@$_GET["page"]<$cp){
echo " <div class='zx_fy_syy'><a href=$url?cl=".$_GET["cl"]."&page=".($pageval+1)."><img src='../images/wl-gg_28.jpg' /></a></div>";
}

} 
?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="zxks_xx_right">
                <div class="zx_zxfs">
                  <div class="main_box01_right_01_pr">
                    <ul>
<li><a href=tencent://message/?uin=<?php echo $qq1;?>&Site=<?php echo $z_name;?>&Menu=yes title="在线咨询1"><img border="0" src=http://wpa.qq.com/pa?p=1:<?php echo $qq1;?>:1 align="top"/></a></li>
<li><a href=tencent://message/?uin=<?php echo $qq2;?>&Site=<?php echo $z_name;?>&Menu=yes title="在线咨询2"><img border="0" src=http://wpa.qq.com/pa?p=1:<?php echo $qq2;?>:1 align="top"/></a></li>
                </ul>
                  </div>
                </div>
                <div class="zx_hw_dk">
                  <div class="zx_hw_bj">
                    <div class="zx_hw_bt"><span>热门推荐</span></div>
                  </div>
                  <div class="zx_hw_xian"></div>
                  <div class="zx_hw_xw">
                    <ul>
                      <?php
						$sql="select * from ennews where ntype=2 and nbool=1 order by ndate desc limit 5";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
						?>
                <li><a href="<?=$z_website?>Education/zxks/zx_nlist_detail.php?id=<?php echo $row["nid"];?>" title="<?php echo $row["ntitle"];?>"><?=utf_substr($row["ntitle"],23)?></a></li>
                      <?php
						}}
						?>
                    </ul>
                  </div>
                </div>
                <div class="zx_hw_dk" style="height:159px;">
                  <div class="zx_hw_bj">
                    <div class="zx_hw_bt"><span>自考学校</span></div>
                  </div>
                  <div class="zx_hw_xian"></div>
                  <div class="zx_hw_xw2">
                    <ul>
                      <?php
      $sql="select * from kkinfo where bk_id=1 order by kkdate desc limit 5";
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	  
	 if (mysql_num_rows($rs)>=1){
	
	 while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){ 
		 $rsa=mysql_query("select s_name,s_xyjs from school where s_id=".$row["s_id"],$conn); 
		 $rowa=mysql_fetch_assoc($rsa);
                            ?>
                      <li><a href="<?=$z_website?>Education/xl_pro_detail.php?kid=<?=$row["kid"]?>&sid=<?=$row["s_id"]?>"><?=$rowa["s_name"]?></a></li>
                      <?php }}?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
<!-- bottom -->
  <?php include("../bottom/bottom.html");?>
  <!-- bottom End -->  
        </div>  
 
</div>
</body>
</html>