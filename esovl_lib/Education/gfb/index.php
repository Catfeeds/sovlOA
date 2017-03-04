<?php
include_once("../../conn.php");

include_once("gf_webstep.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$gf_title?></title>
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
    <?php 
	include("../../top/top_1.html");
	include("../../top/xl_top.html");
	?>
  </div>
  <!-- top End --> 
  
  <!-- main -->
  <div class="main">
    <div class="main_xl_pro">
      <div class="main_xl_pro_box01">
        <div class="main_xl_pro_box01_left">
          <?php
		$sql="select * from xl_s_h where classid=6 limit 4";
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
              <div id="pp<?php echo $i;?>" class=""><a href="<?php echo $row["s_h_http"];?>"><img src="<?=$z_website?>admin_root/<?php echo $row["s_h_pic"];?>"/></a></div>
              <?php }	?>
            </div>
            <div class="main_xl_pro_box01_left_text">
              <ul>
                <?php
				$sql="select * from xl_s_h where classid=6 limit 4";
                $rs=mysql_query($sql); 
				$j=0;
				while ($row=mysql_fetch_assoc($rs)){
				$j=$j+1;
				?>
                <li id="pp<?php echo $j;?>" <?php if($j!=1){echo "class='normaltab1'";}else{echo "class='hovertab1'";}?> >·<a href="<?php echo $row["s_h_http"];?>"><?php echo $row["s_h_title"];?></a></li>
                <?php }?>
              </ul>
            </div>
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
            <li>·<a href="<?=$z_website?>Education/xl_pro_detail.php?kid=<?php echo $row2["kid"];?>&sid=<?php echo $row["s_id"];?>"><?php echo $row1["s_name"];?></a></li>
            <?php }}?>
            </ul>
        </div>
      </div>
      <div class="main_xl_pro_box02">
        <div class="main_xl_pro_box02_title">
          <dl>
            <dt><a href="<?=$z_website?>Education/gfb/">高复班</a></dt>
            <dd><a href="<?=$z_website?>Education/wlys/">网络院校</a></dd>
            <dd><a href="<?=$z_website?>Education/">学历教育</a></dd>
            <dd><a href="<?=$z_website?>Education/zxks/">自学考试</a></dd>
            <dd><a href="<?=$z_website?>Education/gjbx/">国际办学</a></dd>
            <dd><a href="<?=$z_website?>Education/crgk/">成人高考</a></dd>
            <dd><a href="<?=$z_website?>Education/xl_gxjz.php">高校简章</a></dd>
            <dd><a href="<?=$z_website?>Education/xl_pro_search.php">简章搜索</a></dd>
          </dl>
        </div>
        <div class="main_xl_pro_box02_list">
          <div class="main_xl_pro_box02_list00">
            <?php 
if(isset($_POST["xl_skey"])){	
	$skey=@$_POST["xl_skey"];
	echo "<script>location.href='".$z_website."Education/xl_pro_search.php?skey=".$skey."';</script>";	
}
				?>
            <form name="xl_sform" id="xl_sform" method="post" onsubmit="return xl_sou();" action="">
              <ul>
                <li>
                 <!-- <select name="xl_scl" style="width:120px;">
                    <option value=0>--请选择--</option>
                    <option value="学历教育">学历教育</option>
                    <option value="自学考试">自学考试</option>
                    <option value="网络院校">网络院校</option>
                    <option value="成人高考">成人高考</option>
                    <option value="国际办学">国际办学</option>
                    <option value="高校简章">高校简章</option>
                    <option value="简章搜索">简章搜索</option>
                    <option value="高复班">高复班</option>
                  </select>-->
                  填写搜索关键词：
                </li>
                <li>
                  <input name="xl_skey" type="text" style="width:220px;" />
                </li>
                <li>
                  <input  type="image" src="<?=$z_website?>images/ss_pro.jpg" style="cursor:pointer; width:60px; height:24px;"/>
                </li>
              </ul>
            </form>
            <div class="pro_search_key"> <span>搜索关键词：</span> <a href="<?=$z_website?>Education/xl_pro_search.php?skey=<?=urlencode("高起专")?>">高起专</a> <a href="<?=$z_website?>Education/xl_pro_search.php?skey=<?=urlencode("高起本")?>">高起本</a> <a href="<?=$z_website?>Education/xl_pro_search.php?skey=<?=urlencode("成人高复")?>">成人高复</a> <a href="<?=$z_website?>Education/xl_pro_search.php?skey=<?=urlencode("自学考试")?>">自学考试</a> <a href="<?=$z_website?>Education/xl_pro_search.php?skey=<?=urlencode("专升本")?>">专升本</a> <a href="<?=$z_website?>Education/xl_pro_search.php?skey=<?=urlencode("财务管理")?>">财务管理</a> <a href="<?=$z_website?>Education/xl_pro_search.php?skey=<?=urlencode("培训")?>">培训</a></div>
          </div>
        </div>
      </div>
      <div class="main_xllb">
        <div class="gf_xx_kuang">
          <div class="gf_ff_left">
            <div class="gf_ff_tu">
              <?php
		$sql="select * from xl_s_f where classid=6 limit 3";
        $rs=mysql_query($sql);
        //$row=mysql_fetch_assoc($rs);
				$i=0;
				while ($row=mysql_fetch_assoc($rs)){
				$i=$i+1;
?>
              <div id=p<?php echo $i;?>><a href="<?php echo $row["s_h_http"];?>" target=_blank><img border=0 alt=<?php echo $row["s_h_title"];?> src="<?=$z_website?>admin_root/<?php echo $row["s_h_pic"];?>" width=315 height=186 /><span style=" margin-top:5px;margin-left:100px;display:block;"><?php echo $row["s_h_title"];?></span></a></div>
              <?php }?>
            </div>
            <?php
						$sql="select * from ennews where nclass=40 limit 1";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
						$row=mysql_fetch_array($rs,MYSQL_ASSOC);
					?>
       <div class="gf_ff_bt"><a href="<?=$z_website?>Education/gfb/gf_zx_neiye.php?id=<?php echo $row["nid"];?>" title="<?php echo $row["ntitle"];?>"><?php echo msubstr($row["ntitle"],38)?></a></div>
            <div class="gf_nr"><?=msubstr(strip_tags($row["ncon"]),124)?>...<span><a href="<?=$z_website?>Education/gfb/gf_zx_neiye.php?id=<?php echo $row["nid"];?>" title="<?php echo $row["ntitle"];?>">[详细]</a></span></div>
             <?php }?>
            <div class="gf_ff_rz">
              <ul>
              <?php
						$sql="select * from ennews where nclass=40 limit 1,5";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
						?>
                <li><span>·<a href="<?=$z_website?>Education/gfb/gf_zx_neiye.php?id=<?php echo $row["nid"];?>" title="<?php echo $row["ntitle"];?>"><?php echo msubstr($row["ntitle"],70)?></a></span><?=date('Y-m-d',strtotime($row["ndate"]))?></li>
                <?php }}?>
              </ul>
            </div>
          </div>
          <div class="gf_ff_right">
            <div class="gf_ks">
              <div class="gf_ks_lm"><span>考试信息</span><a href="<?=$z_website?>Education/gfb/gf_zx.php?cid=39">更多</a>...</div>
            </div>
            <div class="gf_ks_xian"></div>
            <div class="gf_ks_bt">
              <ul>
              <?php
					$sql="select * from ennews where nclass=39 limit 7";
					$rs=mysql_query($sql);
					if (mysql_num_rows($rs)>=1){
						while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
					?>
				  <li><a href="<?=$z_website?>Education/gfb/gf_zx_neiye.php?id=<?php echo $row["nid"];?>" title="<?php echo $row["ntitle"];?>"><?php echo msubstr($row["ntitle"],23)?></a></li>
                <?php
					}}
					?>
              </ul>
            </div>
          </div>
        </div>
        <div class="gf_xx_kuang_001_02">
          <div class="zx_qr_02_001_0003">
            <div class="zx_qr_02_left">
              <div class="zx_qr_01_01">
                <div class="zx_qr_01_01_01"><img src="<?=$z_website?>images/zx_bg3.jpg" /></div>
                <div id="zx_qr_01_01_02" style="width:607px;">
                  <dl>
                    <dt class="zx_qr_01_01_02_01">三校生高复</dt>
                    <dt class="zx_qr_01_01_02_02">普通高复</dt>
                    <dt class="zx_qr_01_01_02_03">成人高复</dt>
                  </dl>
                  <!--提取KKINFO里面的信息，区分，$sql="select * from kkinfo ";--> 
                </div>
              </div>
              <div class="zx_qr_01_12" style="width:617px;"><!--三校生高复-->
                <div class="zx_qr_02_left_list">
                  <div class="zx_qr_02_left_list_01_003">
                    <dl>
                      <dt>班级名称</dt>
                      <dd>开课日期</dd>
                      <dd style="width:95px;">上课地点</dd>
                      <dd>原价</dd>
                      <dd>网上优惠</dd>
                    </dl>
                  </div>               
            
            <?php 
					$rs1=mysql_query("select * from kkinfo where zyclass like'%三%' order by kkdate desc limit 6",$conn);		 
					if (mysql_num_rows($rs1)>=1){
						$k=0;
	                while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){
						$k=$k+1;
					   $rs_1=mysql_query("select s_name from school where s_id=".$row1["s_id"],$conn); 
		               $rw1=mysql_fetch_assoc($rs_1);
					?>
                    	 <div class="zx_qr_02_left_list_02_004" id="Marquee">
                    <dl>
                      <dt><span>[<a href="<?=$z_website?>Education/gfb/gfb_index.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><?=$row1["zyname"]?></a>]<a href="<?=$z_website?>Education/gfb/gf_bm_lb_xiangxi.php?gid=<?=$row1["kid"]?>" title="<?=$row1["ktitle"]?>"><?=$row1["ktitle"]?></a></span></dt>
                      <dd><?=$row1["kdate"]?></dd>
                      <dd style="width:95px;"><?=$row1["k_adderss"]?></dd>
                      <dd style="text-decoration:line-through;">￥<?=$row1["xfei"]?></dd>
                      <dd><span>￥<?=$row1["yhui"]?></span></dd>
                      <dd><span><a href="<?=$z_website?>Education/gfb/gf_zx_wsbm.php?gid=<?=$row1["kid"]?>">报名</a></span></dd>
                    </dl>
                  </div>
                        
                       <?php if($k>3){
							echo"<div class='zx_qr_01_04'></div>";
							$k=0;
							} ?>
                      <?php }}?>
            
            
                </div>
              </div>
              <div class="zx_qr_01_13" style="width:617px;"><!--普通高复-->
                <div class="zx_qr_02_left_list">
                  <div class="zx_qr_02_left_list_01_003">
                    <dl>
                      <dt>班级名称</dt>
                      <dd>开课日期</dd>
                      <dd style="width:95px;">上课地点</dd>
                      <dd>原价</dd>
                      <dd>网上优惠</dd>
                    </dl>
                  </div>               
            
            <?php 
					$rs1=mysql_query("select * from kkinfo where zyclass like'%普%' order by kkdate desc limit 6",$conn);		 
					if (mysql_num_rows($rs1)>=1){
						$k=0;
	                while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){
						$k=$k+1;
					   $rs_1=mysql_query("select s_name from school where s_id=".$row1["s_id"],$conn); 
		               $rw1=mysql_fetch_assoc($rs_1);
					?>
                    	 <div class="zx_qr_02_left_list_02_004" id="Marquee">
                    <dl>
                      <dt><span>[<a href="<?=$z_website?>Education/gfb/gfb_index.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><?=$row1["zyname"]?></a>]<a href="<?=$z_website?>Education/gfb/gf_bm_lb_xiangxi.php?gid=<?=$row1["kid"]?>" title="<?=$row1["ktitle"]?>"><?=$row1["ktitle"]?></a></span></dt>
                      <dd><?=$row1["kdate"]?></dd>
                      <dd style="width:95px;"><?=$row1["k_adderss"]?></dd>
                      <dd style="text-decoration:line-through;">￥<?=$row1["xfei"]?></dd>
                      <dd><span>￥<?=$row1["yhui"]?></span></dd>
                      <dd><span><a href="<?=$z_website?>Education/gfb/gf_zx_wsbm.php?gid=<?=$row1["kid"]?>">报名</a></span></dd>
                    </dl>
                  </div>
                        
                       <?php if($k>3){
							echo"<div class='zx_qr_01_04'></div>";
							$k=0;
							} ?>
                      <?php }}?>
            
            
                </div>
              </div>
              <div class="zx_qr_01_14" style="width:617px;"><!--成人高复-->
                <div class="zx_qr_02_left_list">
                  <div class="zx_qr_02_left_list_01_003">
                    <dl>
                      <dt>班级名称</dt>
                      <dd>开课日期</dd>
                      <dd style="width:95px;">上课地点</dd>
                      <dd>原价</dd>
                      <dd>网上优惠</dd>
                    </dl>
                  </div>               
            
            <?php 
					$rs1=mysql_query("select * from kkinfo where zyclass like'%成%' order by kkdate desc limit 6",$conn);		 
					if (mysql_num_rows($rs1)>=1){
						$k=0;
	                while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){
						$k=$k+1;
					   $rs_1=mysql_query("select s_name from school where s_id=".$row1["s_id"],$conn); 
		               $rw1=mysql_fetch_assoc($rs_1);
					?>
                    	 <div class="zx_qr_02_left_list_02_004" id="Marquee">
                    <dl>
                      <dt><span>[<a href="<?=$z_website?>Education/gfb/gfb_index.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><?=$row1["zyname"]?></a>]<a href="<?=$z_website?>Education/gfb/gf_bm_lb_xiangxi.php?gid=<?=$row1["kid"]?>" title="<?=$row1["ktitle"]?>"><?=$row1["ktitle"]?></a></span></dt>
                      <dd><?=$row1["kdate"]?></dd>
                      <dd style="width:95px;"><?=$row1["k_adderss"]?></dd>
                      <dd style="text-decoration:line-through;">￥<?=$row1["xfei"]?></dd>
                      <dd><span>￥<?=$row1["yhui"]?></span></dd>
                      <dd><span><a href="<?=$z_website?>Education/gfb/gf_zx_wsbm.php?gid=<?=$row1["kid"]?>">报名</a></span></dd>
                    </dl>
                  </div>
                        
                       <?php if($k>3){
							echo"<div class='zx_qr_01_04'></div>";
							$k=0;
							} ?>
                      <?php }}?>           
            
                </div>
              </div>
            </div>
          </div>
          <div class="zx_qr_02_001_002" style="margin-top:12px;">
            <div class="gf_tj_kc">
            <div class="gf_tj_kc_001">高复推荐学校</div>
            </div>
            <div class="gf_tj_xian"></div>
            <?php 
					$rs1=mysql_query("select * from kkinfo join school on kkinfo.s_id=school.s_id where zyclass like'%高复%' order by kkdate desc limit 1",$conn);		 
					if (mysql_num_rows($rs1)>=1){
					while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){
			?>
            <div class="gf_sxs_bt"><a href="<?=$z_website?>Education/gfb/gfb_index.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><?=$row1["s_name"]?></a></div>
            <div class="gf_sxs_nr"><?=msubstr(strip_tags($row1["zycon"]),230)?>...</div>
            <?php }}?>
            <div class="gf_sxs_lm">
              <ul>
                <?php
					$rs1=mysql_query("select * from kkinfo join school on kkinfo.s_id=school.s_id where zyclass like'%高复%' order by kkdate desc limit 1,3",$conn);		 
					if (mysql_num_rows($rs1)>=1){
					while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){
					?>
                <li>>> <a href="<?=$z_website?>Education/gfb/gfb_index.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><?=$row1["s_name"]?></a>  [<?=$row1["zyclass"]?>]</li>
                <?php }}?>
              </ul>
            </div>
          </div>
        </div>
        <div class="gf_tj_kuang">
          <div class="gf_tj_tu">
            <ul>
              <li><a href="<?=$z_bottom1_link?>"><img src="<?=$z_website?>admin_root/<?=$z_bottom1?>" width="210" height="149" /></a></li>
              <li><a href="<?=$z_bottom2_link?>"><img src="<?=$z_website?>admin_root/<?=$z_bottom2?>" width="210" height="149" /></a></li>
              <li><a href="<?=$z_bottom3_link?>"><img src="<?=$z_website?>admin_root/<?=$z_bottom3?>" width="210" height="149" /></a></li>
              <li><a href="<?=$z_bottom4_link?>"><img src="<?=$z_website?>admin_root/<?=$z_bottom4?>" width="210" height="149" /></a></li>
            </ul>
          </div>
        </div>
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