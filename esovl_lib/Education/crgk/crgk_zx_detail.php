<?php
include_once("../../conn.php");

include_once("cr_webstep.php");
?>
<?php
			mysql_query("update ennews set nclick=nclick+1 where nid=".$_GET["id"],$conn);//更新浏览次数
			$sql="select * from ennews where nid=".$_GET["id"];
			$rs=mysql_query($sql);
			$coun=mysql_num_rows($rs);
			if ($coun>=1){
			$row=mysql_fetch_array($rs,MYSQL_ASSOC);
			$nid=$row["nid"];
			$nclass=$row["nclass"];
			$ntitle=$row["ntitle"];
			$ncon=$row["ncon"];
			$nclick=$row["nclick"];
			$nbool=$row["nbool"];
			$ndate=$row["ndate"];

				  $rs1=mysql_query("select n_class from enclass where n_id=".$row["nclass"]);
				  $row1=mysql_fetch_array($rs1,MYSQL_ASSOC);
				  $ction=$row1["n_class"];              
		
			}else{
			exit("对不起，没有找到相关信息！");
			}
			mysql_free_result($rs1);
			mysql_free_result($rs);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$ntitle?>--<?=$ction?></title>
<meta name="keywords" content="<?=$cr_keyword?>" />
<meta name="description" content="<?=$cr_contant?>" />
<base href="http://<?php echo $_SERVER['SERVER_NAME'];?>/">
<link href="../../css/css.css" rel="stylesheet" type="text/css" />
<link href="../../css/top.css" rel="stylesheet" type="text/css" />
<link href="../../css/main.css" rel="stylesheet" type="text/css" />
<link href="../../css/bottom.css" rel="stylesheet" type="text/css" />
<script src="../../js/jquery.js"></script>
<script src="../../js/style.js"></script>
</head>
<body>

        <div class="wrapper">
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
              <div id="tbc_0<?php echo $i;?>" class=""><a href="<?php echo $row["zxks/s_h_http"];?>"><img src="admin_root/<?php echo $row["s_h_pic"];?>"/></a></div>
                      <?php }?>
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
                    <li>·<a href="Education/xl_pro_detail.php?kid=<?php echo $row2["kid"];?>&amp;sid=<?php echo $row["s_id"];?>"><?php echo $row1["s_name"];?></a></li>
                    <?php }}?>
                  </ul>
                </div>
              </div>
              <div class="zx_zx_dk">
                  <div class="zx_zx_fd">
                    <div class="zx_zx_lj">
                    	<dl>
                          <dd><span><a href="#">首页</a></span></dd>
                          <dt><img src="../../images/bx_hw_03.jpg" width="17" height="30" /></dt>
                          <dd><a href="Education/crgk/">成人高考</a></dd>
                          <dt><img src="../../images/bx_hw_03.jpg" width="17" height="30" /></dt>
                          <dd><a href="Education/crgk/crgk_zx.php?nclass=<?=$nclass?>"><?=$ction?></a></dd>
                          <dt><img src="../../images/bx_hw_03.jpg" width="17" height="30" /></dt>
                          <dd>详细</dd>
                          <dt><img src="../../images/bx_hw_03.jpg" width="17" height="30" /></dt>
                        </dl>
                     </div>
                  </div>
                  <div class="zx_wzgg">
                    <div class="zx_gg_lm">
                      <div class="zx_gg_zl">资　　讯</div>
                    </div>
                    <div class="zx_lm_dian"><img src="../../images/wl-gg_06.jpg" /></div>
                    <div class="zx_xx_bt"><?=$ntitle?></div>
                    <div class="zx_xx_fb">浏览次数：<?=$nclick?> 日期：<?=$ndate?>  来源：<?=$z_name?></div>
                    <div class="zx_xx_nr"><?=$ncon?></div>
                    <div class="zx_xx_xian"></div>
                    <div class="zx_xx_fh"><a href="Education/crgk/crgk_zx.php?nclass=<?=$nclass?>">[返回列表]</a></div>
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
              <div class="zx_hw_dk" style="height:159px;">
                <div class="zx_hw_bj">
                  <div class="zx_hw_bt"><span>名校推荐</span></div>
                </div>
                <div class="zx_hw_xian"></div>
                <div class="zx_hw_xw2">
                  <ul>
                    <?php
      $sql="select * from kkinfo where bk_id=4 order by kkdate desc limit 5";
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	  
	 if (mysql_num_rows($rs)>=1){
	 while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){ 
		 $rsa=mysql_query("select s_name,s_xyjs from school where s_id=".$row["s_id"],$conn); 
		 $rowa=mysql_fetch_assoc($rsa);
                            ?>
                  <li><a href="Education/xl_pro_detail.php?kid=<?=$row["kid"]?>&amp;sid=<?=$row["s_id"]?>">
                      <?=$rowa["s_name"]?>
                    </a></li>
                    <?php }}?>
                  </ul>
                </div>
              </div>
              <div class="zx_hw_dk">
                <div class="zx_hw_bj">
                  <div class="zx_hw_bt"><span>历年真题</span><a href="Education/crgk/crgk_zx.php?nclass=43">更多...</a></div>
                </div>
                <div class="zx_hw_xian"></div>
                <div class="zx_hw_xw">
                  <ul>
                    <?php
						$sql="select * from ennews where nclass=43 and nbool=1 order by ndate desc limit 5";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
						?>
                    <li><a href="Education/crgk/crgk_zx_detail.php?id=<?php echo $row["nid"];?>" title="<?php echo $row["ntitle"];?>"><?php echo msubstr($row["ntitle"],23)?></a></li>
                    <?php
						}}
						?>
                  </ul>
                </div>
              </div>
              <div class="zx_hw_dk">
               	  <div class="zx_hw_bj">
                    	<div class="zx_hw_bt"><span>成考资讯</span><a href="Education/crgk/crgk_zx.php?nclass=44">更多...</a></div>
              </div>
                    <div class="zx_hw_xian"></div>
            <div class="zx_hw_xw">
                    	<ul>
                        	<?php
						$sql="select * from ennews where nclass=44 and nbool=1 order by ndate desc limit 8";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
						?>
                <li><a href="Education/crgk/crgk_zx_detail.php?id=<?php echo $row["nid"];?>" title="<?php echo $row["ntitle"];?>"><?php echo msubstr($row["ntitle"],23)?></a></li>                 
                        <?php
						}}
						?>
                        </ul>
                </div>
                </div>
              </div>
            </div>
          </div>
  <!-- bottom -->
  <?php include("../../bottom/bottom.html");?>
  <!-- bottom End --> 
        </div>

</body>
</html>