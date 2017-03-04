<?php
include_once("../../conn.php");

include("../xl_pro_public.php");
include_once("gf_webstep.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$s_name?></title>
<meta name="keywords" content="<?=$gf_keyword?>" />
<meta name="description" content="<?=$gf_contant?>" />
<link href="../../css/css.css" rel="stylesheet" type="text/css" />
<link href="../../css/top.css" rel="stylesheet" type="text/css" />
<link href="../../css/main.css" rel="stylesheet" type="text/css" />
<link href="../../css/bottom.css" rel="stylesheet" type="text/css" />
<SCRIPT src="../../js/Comm.js"></SCRIPT>
<script src="../../js/jquery.js"></script>
<script src="../../js/style.js"></script>
<script src="../../js/zxks.js"></script>
<link href="../../css/main2.css" rel="stylesheet" type="text/css" />
<SCRIPT>regEvent(window,'onload',function() {SwitchPanel('p','on','off',4,false,2000)});</SCRIPT>
<SCRIPT>regEvent(window,'onload',function() {SwitchPanel('pp','on','off',4,false,3000)});</SCRIPT>
</head>
<body>
<div class="wrapper">
  <!-- top -->
  <div class="top">
    <div class="top_box01">
      <div class="top_box01_00"><img src="<?=$z_website?>images/top01_left.jpg" /></div>
      <div class="top_box01_center">
        <div class="top_box01_center_text01"> 您好，<font color="red"><?php echo @$_COOKIE["vipname"];?></font> 欢迎光临<?php echo $z_name;?>！</div>
        <div class="top_box01_center_text02">
          <ul>
            <li><a href="<?=$z_website?>vip_zc.php">注册</a><span>|</span></li>
            <li><a href="<?=$z_website?>vip_login.php">登陆</a><span>|</span></li>
            <li><a href="<?=$z_website?>vip_center.php">我的一休</a><span>|</span></li>
            <li><a href="<?=$z_website?>about.php?cid=10">帮助中心</a><span>|</span></li>
            <li><a href="javascript:void(null);"><strong>上海站</strong>-选择城市</a></li>
          </ul>
        </div>
      </div>
      <div class="top_box01_00"><img src="<?=$z_website?>images/top01_right.jpg" /></div>
    </div>
    <?php include('gfb_mune.php');?>
  </div>
  <!-- top End --> 
  
  <!-- main -->
  <div class="main">
    <div class="gfb_index_tu_01"><img src="<?=$z_website?>admin_root/<?php echo $s_banner;?>" /></div>
    <div class="gfb_index_fu_nov">
      <div class="gfb_index_fu_nov_01">
        <div class="gf_index_nov_top"><img src="<?=$z_website?>images/gfb_index_16.jpg" width="178" height="9" /></div>
        <div class="gf_index_nov_contant">
          <div class="gf_index_nov_001">
            <ul>
              <li><a href="<?=$z_website?>Education/gfb/gfb_index.php">学校首页</a></li>
              <li><a href="<?=$z_website?>Education/gfb/gfb_index.php#gsjj">学校简介</a></li>
              <li><a href="<?=$z_website?>Education/gfb/gfb_list.php?nclass=5">学校动态</a></li>
              <li><a href="<?=$z_website?>Education/gfb/gfb_wd.php">在线问答</a></li>
              <li><a href="<?=$z_website?>Education/gfb/gfb_kczx.php">课程中心</a></li>
            </ul>
          </div>
        </div>
        <div class="gf_index_nov_bottom"><img src="<?=$z_website?>images/gfb_index_27.jpg" width="178" height="9" /></div>
      </div>
      <div class="gf_index_gg_001_002">
        <div class="gf_index_bt_bj_001">
          <div class="gf_index_bt_wz_001_002"><span>学校动态</span><a href="<?=$z_website?>Education/gfb/gfb_list.php?nclass=5">更多</a>...</div>
        </div>
        <div class="gf_index_dt_bt">
          <ul>
          <?php
			  $sql="select * from mbnews where s_name='".$s_name."' and nclass=5 order by ndate desc limit 4";
			  $rs=mysql_query($sql);
			  if (mysql_num_rows($rs)>=1){
				  while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
			  ?>
          <li><span><a href="<?=$z_website?>Education/gfb/gfb_list_show.php?id=<?=$row["nid"]?>"><?=$row["ntitle"]?> </a></span><?php echo date("Y-m-d",strtotime($row["ndate"]));?></li>
            <?php }}?>
          </ul>
        </div>
        <div style="clear:both; height:12px;"></div>
      </div>
      <div class="gf_index_gg">
        <div class="gf_index_bt_bj">
          <div class="gf_index_bt_wz"><span>网站公告</span><a href="<?=$z_website?>Education/gfb/gfb_list.php?nclass=1">更多</a>...</div>
        </div>
        <div class="gf_index_gg_bt">
          <dl>
          
          <?php
			  $sql="select * from mbnews where s_name='".$s_name."' and nclass=1 order by ndate desc limit 4";
			  $rs=mysql_query($sql);
			  if (mysql_num_rows($rs)>=1){
				  $k=0;
				  while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
					  $k=$k+1;
			  ?>
            <dd><?=$k?>.</dd>
            <dt><span><a href="<?=$z_website?>Education/gfb/gfb_list_show.php?id=<?=$row["nid"]?>"><?=msubstr($row["ntitle"],24)?></a></span><?php echo date("Y-m-d",strtotime($row["ndate"]));?></dt>
           <?php }}?>
          </dl>
        </div>
      </div>
    </div>
    <!--    <div class="gf_jd_banner"><img src="../../images/gfb_index_31.jpg" width="948" height="89" /></div>-->
    <div class="gf_index_kuang_left">
      <div class="gf_index_about_left">
        <div class="gf_index_about_bj">
          <div class="gf_index_about_bt"><a id="gsjj">公司简介</a></div>
          <div class="gf_index_about_bt_001"></div>
        </div>
        <div class="gf_index_about_bk">
          <div class="gf_index_about_nr"><?php echo $s_xyjs;?></div>
        </div>
      </div>
      <div class="gf_index_about_left">
        <div class="gf_index_about_bj">
          <div class="gf_index_about_bt">专业课程</div>
          <div class="gf_index_about_bt_001">点击查看详细专业介绍，如有疑问请留言或致电给我们。</div>
        </div>
        <div class="gf_index_about_bk_011">
          <div class="gf_index_wd">
            <table width="650" border="1" cellpadding="0" cellspacing="0" style="color:#333;">
              <tr align="center" valign="middle">
                <td width="109">专业名称</td>
                <td width="260">班级名称</td>
                <td width="80">类别</td>
                <td width="67">关注人次</td>
                <td width="53">优惠价</td>
                <td width="67">&nbsp;</td>
              </tr>
<?php 
$str="select * from kkinfo where zyclass like'%高复%' and s_id=".$s_id;///当前活动的学校ID号在xl_pro_public.php中已取出。
$rs1=mysql_query($str,$conn);
if($rs1){
$snum=mysql_num_rows($rs1);
if ($snum>=1){
while($row=mysql_fetch_array($rs1,MYSQL_ASSOC)){

//}
?>
              <tr align="center" valign="middle">
                <td><span><a href="<?=$z_website?>Education/gfb/gf_bm_lb_xiangxi.php?gid=<?=$row["kid"]?>" title="<?=$row["ktitle"]?>"><?php echo $row["zyname"];?></a></span></td>
                <td><a href="<?=$z_website?>Education/gfb/gf_bm_lb_xiangxi.php?gid=<?=$row["kid"]?>" title="<?=$row["ktitle"]?>"><?php echo $row["ktitle"];?></a></td>
                <td><?php echo $row["zyclass"];?></td>
                <td><?php echo $row["kclick"];?></td>
                <td><?php echo $row["yhui"];?>元</td>
                <td><a href="<?=$z_website?>Education/gfb/gf_zx_wsbm.php?gid=<?=$row["kid"]?>">报名&gt;&gt;</a></td>
              </tr>
              <?php }}}?>
            </table>
          </div>
          <div style="clear:both; height:12px;"></div>
        </div>
      </div>
    </div>
    <div class="gf_index_kuang_right">
      <div class="gf_index_gg_001">
        <div class="gf_index_bt_bj">
          <div class="gf_index_bt_wz_001"><span>报名须知</span></div>
        </div>
        <div class="gf_index_bm_xz"><?php echo $s_bmxz;?></div>
        <div style="clear:both; height:12px;"></div>
      </div>
    </div>
  </div>
  <!-- main End --> 
  
  <!-- bottom -->
  <?php include("../../bottom/bottom.html");?>
  <!-- bottom End --> 
</div>
</body>
</html>