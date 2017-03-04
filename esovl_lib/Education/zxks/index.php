<?php

include_once("../../conn.php");
include_once("zx_webstep.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$zx_title?></title>
<meta name="keywords" content="<?=$z_keyword?>" />
<meta name="description" content="<?=$z_contant?>" />
<base href="http://<?php echo $_SERVER['SERVER_NAME'];?>/">
<link href="../../css/css.css" rel="stylesheet" type="text/css" />
<link href="../../css/top.css" rel="stylesheet" type="text/css" />
<link href="../../css/main.css" rel="stylesheet" type="text/css" />
<link href="../../css/bottom.css" rel="stylesheet" type="text/css" />
<SCRIPT src="../../js/Comm.js"></SCRIPT>
<script src="../../js/jquery.js"></script>
<script src="../../js/style.js"></script>
<script src="../../js/zxks2.js"></script>
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
            <div class="main">
              <div class="main_xl_pro">
                <div class="main_xl_pro_box01">
                  <div class="main_xl_pro_box01_left">
                <?php
				$sql="select * from xl_s_h where classid=2 limit 4";
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
                        <div id="pp<?php echo $i;?>" class=""><a href="<?php echo $row["s_h_http"];?>"><img src="admin_root/<?php echo $row["s_h_pic"];?>"/></a></div>
                        <?php }	?>
                      </div>
                      <div class="main_xl_pro_box01_left_text">
                        <ul>
                          <?php
							$sql="select * from xl_s_h where classid=2 limit 4";
                			$rs=mysql_query($sql); 
							$j=0;
							while ($row=mysql_fetch_assoc($rs)){
							$j=$j+1;
							?>
                          <li id="pp<?php echo $j;?>" <?php if($j!=1){echo "class='normaltab1'";}else{echo "class='hovertab1'";}?>">·<a href="<?php echo $row["s_h_http"];?>"><?php echo $row["s_h_title"];?></a></li>
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
                      <li>·<a href="Education/xl_pro_detail.php?kid=<?php echo $row2["kid"];?>&amp;sid=<?php echo $row["s_id"];?>"><?php echo $row1["s_name"];?></a></li>
                      <?php }}?>
                    </ul>
                  </div>
                </div>
                <div class="main_xl_pro_box02">
                  <div class="main_xl_pro_box02_title">
                    <dl>
                      <dt><a>自学考试</a></dt>
                      <dd><a href="Education/">学历教育</a></dd>
                      <dd><a href="Education/wlys/">网络院校</a></dd>
                      <dd><a href="Education/crgk/">成人高考</a></dd>
                      <dd><a href="Education/gjbx/">国际办学</a></dd>
                      <dd><a href="Education/xl_gxjz.php">高校简章</a></dd>
                      <dd><a href="Education/xl_pro_search.php">简章搜索</a></dd>
                      <dd><a href="Education/gfb/">高复班</a></dd>
                    </dl>
                  </div>
                  <div class="main_xl_pro_box02_mu1"><img src="zxks/../images/zx_01.jpg" /></div>
                  <div class="main_xl_pro_box02_mu2">
                  <div>
                    <ul>
                      <li class="zx_li_1"><img src="zxks/../images/zx_04.jpg" /></li>
                      <li class="zx_li_2">
                        <div class="zx_li_2_dv1">
                          <dl>
                            <dt><a href="Education/zxks/zx_nlist.php?cid=22">自考政策</a></dt>
                            <dt><a href="Education/zxks/zx_nlist.php?cid=23">报名信息</a></dt>
                            <dt><a href="Education/zxks/zx_nlist.php?cid=24">自考常识</a></dt>
                            <dt><a href="Education/zxks/zx_nlist.php?cid=25">各地新闻</a></dt>
                            <dt><a href="Education/zxks/zx_nlist.php?cid=26">自考辅导</a></dt>
                            <dt><a href="Education/zxks/zx_nlist.php?cid=27">成绩查询</a></dt>
                          </dl>
                        </div>
                      </li>
                      <li class="zx_li_6"></li>
                      <li class="zx_li_4"><img src="zxks/../images/zx_05.jpg" /></li>
                      <li class="zx_li_5">
                        <div class="zx_li_2_dv1">
                          <dl>
                            <dt><a href="Education/zxks/zx_nlist.php?cid=28">择校指南</a></dt>
                            <dt><a href="Education/zxks/zx_school.php">自考院校</a></dt>
                            <dt><a href="Education/zxks/zx_ask.php">自考问答</a></dt>
                            <dt><a href="Education/zxks/zx_nlist.php?cid=30">复习备考</a></dt>
                            <dt><a href="Education/zxks/zx_zkzy.php">自考专业</a></dt>
                            <dt><a href="Education/zxks/zx_nlist.php?cid=31">经验分享</a></dt>
                          </dl>
                        </div>
                      </li>
                      <li class="zx_li_6"></li>
                      <li class="zx_li_7"><img src="zxks/../images/zx_06.jpg" /></li>
                      <li class="zx_li_8">
                        <div class="zx_li_2_dv1">
                          <dl>
                            <dt><a href="Education/zxks/zx_gaoqizhuan.php">高起专</a></dt>
                            <dt class="zx_li_2_dv1_1"><a href="Education/zxks/zx_zhuansben.php">专升本</a></dt>
                            <dt><a href="Education/zxks/zx_gaoqiben.php">高起本</a></dt>
                            <dt><a href="Education/zxks/zx_nlist.php?cid=32">试题库</a></dt>
                          </dl>
                        </div>
                      </li>
                      <li class="zx_li_6"></li>
                      <li class="zx_li_7"><img src="zxks/../images/zx_07.jpg" /></li>
                      <li class="zx_li_9">
                        <div class="zx_li_2_dv1">
                          <dl>
                            <dt><a href="Education/zxks/zx_nlist.php?cid=33">考试计划</a></dt>
                            <dt><a href="Education/xl_gxjz.php">简章大全</a></dt>
                          </dl>
                        </div>
                      </li>
                      <li class="zx_li_6"></li>
                      <li class="zx_li_10">自考不限户口、职业、年龄、学历、一律免考入学，多种形式上课，专业任选</li>
                    </ul>
                  </div>
                </div>
                  <div class="main_xl_pro_box02_mu3"><img src="zxks/../images/zx_03.jpg" /></div>
                </div>
              </div>
              <div class="zx_zy_01">
                <div class="zx_zy_01_01">
<?php
		$sql="select * from xl_s_f where classid=2 limit 3";
        $rs=mysql_query($sql);
        //$row=mysql_fetch_assoc($rs);
				$i=0;
				while ($row=mysql_fetch_assoc($rs)){
				$i=$i+1;
?>
                  <div id=p<?php echo $i;?>><a href="<?php echo $row["s_h_http"];?>" target=_blank><img border=0 alt=<?php echo $row["s_h_title"];?> src="admin_root/<?php echo $row["s_h_pic"];?>" width=315 height=186 /><span style=" margin-top:5px;margin-left:100px;display:block;"><?php echo $row["s_h_title"];?></span></a></div>
                  <?php }	?>
                </div>
                <div class="zx_zy_01_02">
                  <div class="zx_zy_01_02_01">
                    <dl>
                    <?php
						$sql="select * from ennews where nclass=22 limit 1";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							$row=mysql_fetch_array($rs,MYSQL_ASSOC);
					?>
                      <dt><a href="Education/zxks/zx_nlist_detail.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><?=msubstr($row["ntitle"],46)?></a></dt>
                      <dd><?=msubstr(strip_tags($row["ncon"]),128)?>...</dd>
                        <?php }?>
                    </dl>
                  </div>
                  <div class="zx_zy_01_02_02"></div>
                  <div class="zx_zy_01_02_03">
                    <dl>
                    <?php
						$sql="select * from ennews where nclass=23 limit 4";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
						?>
                      <dt><img src="../../images/zx_bot1.jpg" /></dt>
                      <dd><a href="Education/zxks/zx_nlist_detail.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><?=msubstr($row["ntitle"],32)?></a></dd>
                     <?php }}?>
                    </dl>
                    <dl>
                      <?php
						$sql="select * from ennews where nclass=25 limit 4";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
						?>
                      <dt><img src="../../images/zx_bot1.jpg" /></dt>
                      <dd><a href="Education/zxks/zx_nlist_detail.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><?=msubstr($row["ntitle"],32)?></a></dd>
                     <?php }}?>
                    </dl>
                  </div>
                </div>
                <div class="zx_zy_01_03">
                  <ul>
                    <a href="<?php echo $z_right1_link;?>"><img src="../../admin_root/<?php echo $z_right1;?>" /></a>
                  </ul>
                  <div class="zx_zy_01_03_blank"></div>
                  <ul>
                    <a href="<?php echo $z_right2_link;?>"><img src="../../admin_root/<?php echo $z_right2;?>" /></a>
                  </ul>
                </div>
              </div>
              <div class="zx_qr">
                <div class="zx_qr_01">
                  <div class="zx_qr_01_01">
                    <div class="zx_qr_01_01_01"><img src="../../images/zx_bg3.jpg" /></div>
                    <div id="zx_qr_01_01_021">
                      <dl>
                        <dt class="zx_qr_01_01_02_01">全日制</dt>
                        <dt class="zx_qr_01_01_02_02">业余制</dt>
                        <dt class="zx_qr_01_01_02_03">专科</dt>
                        <dt class="zx_qr_01_01_02_04">本科</dt>
                      </dl>
                      <!--提取KKINFO里面的信息，区分，$sql="select * from kkinfo ";-->
                    </div>
                  </div>
                  <div class="zx_qr_01_12"><!--全日制-->
                  <div class="zx_qr_01_02">
                    <?php 
					$rs1=mysql_query("select kid,ktitle,zyname,zycon,s_id,k_pic from kkinfo where bk_id=1 and kcal like'%全%' order by kkdate desc limit 1",$conn);		 
					if (mysql_num_rows($rs1)>=1){
	                while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){
					   $rs_1=mysql_query("select s_name from school where s_id=".$row1["s_id"],$conn); 
		               $rw1=mysql_fetch_assoc($rs_1);
					?>
                    <div class="zx_qr_01_02_l">
    <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <td align="center" valign="middle"><a href="Education/xl_pro_detail.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><img src="../../admin_root/<?=$row1["k_pic"]?>" /></a></td>
      </tr>
    </table>
                    </div>
                    <div class="zx_qr_01_02_ru"><a href="Education/xl_pro_detail.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><?=$rw1["s_name"]?></a>-<a href="Education/xl_pro_zyjs.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><?=$row1["ktitle"]?></a></div>
                    <div class="zx_qr_01_02_rd"><a href="Education/xl_pro_detail.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><?=msubstr($row1["zycon"],92)?>..</a></div>
                    <?php }}?>
                  </div>
                  <div class="zx_qr_01_03">
                  	<ul>
                    <?php 
					$rs1=mysql_query("select kid,ktitle,zyname,zycon,s_id,k_pic from kkinfo where bk_id=1 and kcal like'%全%' order by kkdate desc limit 1,8",$conn);		 
					if (mysql_num_rows($rs1)>=1){
						$k=0;
	                while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){
						$k=$k+1;
					   $rs_1=mysql_query("select s_name from school where s_id=".$row1["s_id"],$conn); 
		               $rw1=mysql_fetch_assoc($rs_1);
					?>
                    	<li><span>>></span><a href="Education/xl_pro_zyjs.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><?=$row1["ktitle"]?>:<?=$row1["zyname"]?></a></li>
                       <?php if($k>3){
							echo"<div class='zx_qr_01_04'></div>";
							$k=0;
							} ?>
                      <?php }}?>
                    </ul>
                  </div>                  
                
                  </div>
                  <div class="zx_qr_01_13"><!--业余制-->
                  <div class="zx_qr_01_02">
                    <?php 
					$rs1=mysql_query("select kid,ktitle,zycon,s_id,k_pic from kkinfo where bk_id=1 and kcal like'%业余%' order by kkdate desc limit 1",$conn);		 
					if (mysql_num_rows($rs1)>=1){
	                while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){
					   $rs_1=mysql_query("select s_name from school where s_id=".$row1["s_id"],$conn); 
		               $rw1=mysql_fetch_assoc($rs_1);
					?>
                    <div class="zx_qr_01_02_l">
    <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <td align="center" valign="middle"><a href="Education/xl_pro_detail.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><img src="../../admin_root/<?=$row1["k_pic"]?>" /></a></td>
      </tr>
    </table>
                    </div>
                    <div class="zx_qr_01_02_ru"><a href="Education/xl_pro_detail.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><?=$rw1["s_name"]?></a>-<a href="Education/xl_pro_zyjs.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><?=$row1["ktitle"]?></a></div>
                    <div class="zx_qr_01_02_rd"><a href="Education/xl_pro_detail.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><?=msubstr($row1["zycon"],92)?>..</a></div>
                    <?php }}?>
                  </div>
                  <div class="zx_qr_01_03">
                  	<ul>
                    <?php 
					$rs1=mysql_query("select kid,ktitle,zyname,zycon,s_id,k_pic from kkinfo where bk_id=1 and kcal like'%业余%' order by kkdate desc limit 1,8",$conn);		 
					if (mysql_num_rows($rs1)>=1){
						$k=0;
	                while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){
						$k=$k+1;
					   $rs_1=mysql_query("select s_name from school where s_id=".$row1["s_id"],$conn); 
		               $rw1=mysql_fetch_assoc($rs_1);
					?>
                    	<li><span>>></span><a href="Education/xl_pro_zyjs.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><?=$row1["ktitle"]?>:<?=$row1["zyname"]?></a></li>
                       <?php if($k>3){
							echo"<div class='zx_qr_01_04'></div>";
							$k=0;
							} ?>
                      <?php }}?>
                    </ul>
                  </div>                  
                
                  </div>
                  <div class="zx_qr_01_14"><!--专科-->
                  <div class="zx_qr_01_02">
                    <?php 
					$rs1=mysql_query("select kid,ktitle,zycon,s_id,k_pic from kkinfo where bk_id=1 and zyclass like'%高起专%' order by kkdate desc limit 1",$conn);		 
					if (mysql_num_rows($rs1)>=1){
	                while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){
					   $rs_1=mysql_query("select s_name from school where s_id=".$row1["s_id"],$conn); 
		               $rw1=mysql_fetch_assoc($rs_1);
					?>
                    <div class="zx_qr_01_02_l">
    <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <td align="center" valign="middle"><a href="Education/xl_pro_detail.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><img src="../../admin_root/<?=$row1["k_pic"]?>" /></a></td>
      </tr>
    </table>
                    </div>
                    <div class="zx_qr_01_02_ru"><a href="Education/xl_pro_detail.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><?=$rw1["s_name"]?></a>-<a href="Education/xl_pro_zyjs.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><?=$row1["ktitle"]?></a></div>
                    <div class="zx_qr_01_02_rd"><a href="Education/xl_pro_detail.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><?=msubstr($row1["zycon"],92)?>..</a></div>
                    <?php }}?>
                  </div>
                  <div class="zx_qr_01_03">
                  	<ul>
                    <?php 
					$rs1=mysql_query("select kid,ktitle,zyname,zycon,s_id,k_pic from kkinfo where bk_id=1 and zyclass like'%高起专%' order by kkdate desc limit 1,8",$conn);		 
					if (mysql_num_rows($rs1)>=1){
						$k=0;
	                while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){
						$k=$k+1;
					   $rs_1=mysql_query("select s_name from school where s_id=".$row1["s_id"],$conn); 
		               $rw1=mysql_fetch_assoc($rs_1);
					?>
                    	<li><span>>></span><a href="Education/xl_pro_zyjs.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><?=$row1["ktitle"]?>:<?=$row1["zyname"]?></a></li>
                       <?php if($k>3){
							echo"<div class='zx_qr_01_04'></div>";
							$k=0;
							} ?>
                      <?php }}?>
                    </ul>
                  </div>                  
                
                  </div>
                           <div class="zx_qr_01_15"><!--本科-->
                  <div class="zx_qr_01_02">
                    <?php 
					$rs1=mysql_query("select kid,ktitle,zycon,s_id,k_pic from kkinfo where bk_id=1 and zyclass like'%本%' order by kkdate desc limit 1",$conn);		 
					if (mysql_num_rows($rs1)>=1){
	                while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){
					   $rs_1=mysql_query("select s_name from school where s_id=".$row1["s_id"],$conn); 
		               $rw1=mysql_fetch_assoc($rs_1);
					?>
                    <div class="zx_qr_01_02_l">
    <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <td align="center" valign="middle"><a href="Education/xl_pro_detail.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><img src="../../admin_root/<?=$row1["k_pic"]?>" /></a></td>
      </tr>
    </table>
                    </div>
                    <div class="zx_qr_01_02_ru"><a href="Education/xl_pro_detail.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><?=$rw1["s_name"]?></a>-<a href="Education/xl_pro_zyjs.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><?=$row1["ktitle"]?></a></div>
                    <div class="zx_qr_01_02_rd"><a href="Education/xl_pro_detail.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><?=msubstr($row1["zycon"],92)?>..</a></div>
                    <?php }}?>
                  </div>
                  <div class="zx_qr_01_03">
                  	<ul>
                    <?php 
					$rs1=mysql_query("select kid,ktitle,zyname,zycon,s_id,k_pic from kkinfo where bk_id=1 and zyclass like'%本%' order by kkdate desc limit 1,8",$conn);		 
					if (mysql_num_rows($rs1)>=1){
						$k=0;
	                while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){
						$k=$k+1;
					   $rs_1=mysql_query("select s_name from school where s_id=".$row1["s_id"],$conn); 
		               $rw1=mysql_fetch_assoc($rs_1);
					?>
                    	<li><span>>></span><a href="Education/xl_pro_zyjs.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><?=$row1["ktitle"]?>:<?=$row1["zyname"]?></a></li>
                       <?php if($k>3){
							echo"<div class='zx_qr_01_04'></div>";
							$k=0;
							} ?>
                      <?php }}?>
                    </ul>
                  </div>                  
                
                  </div>
                 <!--////-->
                </div>
                <div class="zx_qr_02">
                  <div class="zx_qr_02_left">
                    <div class="zx_qr_02_left_title">
                      <dl>
                        <dt>最新录取</dt>
                        <dd></dd>
                      </dl>
                    </div>
                    <div class="zx_qr_02_left_list">
                      <div class="zx_qr_02_left_list_01">
                        <dl>
                          <dt>学校名称</dt>
                          <dd>专业名称</dd>
                          <dd>学员姓名</dd>
                          <dd>录取时间</dd>
                        </dl>
                      </div>
                      <div class="zx_qr_02_left_list_02" id="Marquee">
                        <?php 
		 $sql="select * from luqu where classid=2 order by lq_date desc limit 7 ";     
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
                        <dl>
                          <dt><span><a href="Education/xl_pro_detail.php?kid=<?php echo $row2["kid"];?>&sid=<?php echo $row["s_id"];?>"><?php echo $row1["s_name"];?></a></span></dt>
                          <dd><span><?php echo $row["lq_zy"];?></span></dd>
                          <dd><?php echo $row["lq_name"];?></dd>
                          <dd><?php echo $row["lq_date"];?></dd>
                        </dl>
                        <?php }}?>
                        <script src="../../js/xlgund.js"></script>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="zx-zk-kuang">
                  <div class="zx-zk-bj">
                    <div class="zx-zk-xts"><span>自考小贴士</span><a href="Education/zxks/zx_nlist.php?cid=21">更多</a></div>
                  </div>
                  <div class="zx-zk-xian"></div>
                  <div class="zx-zk-bt">
                    <ul>
                      <?php
						$sql="select * from ennews where nclass=21 limit 8";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
						?>
                      <li><a href="Education/zxks/zx_nlist_detail.php?id=<?php echo $row["nid"];?>" title="<?php echo $row["ntitle"];?>"><?php echo msubstr($row["ntitle"],23)?></a></li>
                      <?php
						}}
						?>
                    </ul>
                  </div>
                </div>
                <div class="zx_qr_03"><a href="<?php echo $z_right3_link;?>"><img src="../../admin_root/<?php echo $z_right3;?>" /></a></div>
              </div>
            </div>
    <!-- bottom -->
    <?php include("../../bottom/bottom.html");?>
    <!-- bottom End -->
          </div>

</body>
</html>