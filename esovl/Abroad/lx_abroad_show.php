<?php
include_once("../web_start.php");
$web=getWeb("12");

if(isset($_GET["sid"])){
	$dblink->query("update lxschool set lxs_bj=0");
	$dblink->query("update lxschool set lxs_bj=1 where lxs_id=".$_GET["sid"]);
}
$row = $dblink->find('lxschool','','lxs_bj=1');

$lxs_id=$row["lxs_id"];
$lxs_gjid=$row["lxs_gjid"];
$lxs_name =$row["lxs_name"];
$lxs_banner=$row["lxs_banner"];
$lxs_logo=$row["lxs_logo"];
$lxs_xxjs=$row["lxs_xxjs"];
$lxs_kcys=$row["lxs_kcys"];
$lxs_zsjz=$row["lxs_zsjz"];
$lxs_shhj=$row["lxs_shhj"];
$lxs_xgxx=$row["lxs_xgxx"];
   
$web['z_title'] = $lxs_name.'--留学频道';
include_once('Abroad_header.php');

?>

<link href="css/lxschool.css" rel="stylesheet" type="text/css" />
<!--[if gte IE 6]><script language="javascript" src="js/ie6png.js" type="text/javascript" ></script><![endif]-->
<body>
<div class="wrapper">
	<!-- top -->
	<?php include("lxtop.php");?>
	<!-- top end -->
	<!-- main -->
	<div class="main00">
		<div class="school">
			<div class="school_logo"><img src="../admin_root/<?=$lxs_banner?>" /></div>
			<div class="school_weizhi">您当前的位置：<a href="/Abroad/">留学频道</a> >> <a href="lx_abroad.php"><?=$lxs_name?></a></div>
			<div class="school_box">
				<div class="school_box_left">
					<div class="school_box_left_nav">
						<dl>
                        <?php if($_GET["action"]=="lxs_xxjs"){?>
						<dt><a href="lx_abroad_show.php?action=lxs_xxjs" id="lx_icon01">学校简介</a></dt>
                        <?php }else{?>
                        <dd><a href="lx_abroad_show.php?action=lxs_xxjs" id="lx_icon01">学校简介</a></dd>
                        <?php }?>
                        <?php if($_GET["action"]=="lxs_kcys"){?>
						<dt><a href="lx_abroad_show.php?action=lxs_kcys" id="lx_icon02">课程优势</a></dt>
                         <?php }else{?>
                        <dd><a href="lx_abroad_show.php?action=lxs_kcys" id="lx_icon02">课程优势</a></dd>
                        <?php }?>
                        
                        <?php if($_GET["action"]=="lxs_zsjz"){?>
						<dt><a href="lx_abroad_show.php?action=lxs_zsjz" id="lx_icon03">招生简章</a></dt>
                         <?php }else{?>
                        <dd><a href="lx_abroad_show.php?action=lxs_zsjz" id="lx_icon03">招生简章</a></dd>
                        <?php }?>
                        <?php if($_GET["action"]=="lxs_shhj"){?>
						<dt><a href="lx_abroad_show.php?action=lxs_shhj" id="lx_icon04">学习生活</a></dt>
                         <?php }else{?>
                        <dd><a href="lx_abroad_show.php?action=lxs_shhj" id="lx_icon04">学习生活</a></dd>
                        <?php }?>
						<dd><a href="lx_advisory.php" id="lx_icon05">专家咨询</a></dd>
						</dl>
					</div>
					<div class="school_box_left_tool">
						<div class="school_box_left_tool_title"><span>留学工具</span></div>					
<div class="main_box02_right_list02"> <a href="http://time.123cha.com/" target="_blank"><img src="images/tool01.jpg" /></a> <a href="http://weather.news.sina.com.cn/"  target="_blank"><img src="images/tool02.jpg" /></a> <a href="http://jipiao.oklx.com/search.aspx"  target="_blank"><img src="images/tool03.jpg" /></a> <a href="http://renzheng.cscse.edu.cn/"  target="_blank"><img src="images/tool04.jpg" /></a> <a href="http://www.boc.cn/sourcedb/whpj/"  target="_blank"><img src="images/tool05.jpg" /></a> <a href="http://www.jsj.edu.cn/index.php/default/"  target="_blank"><img src="images/tool06.jpg" /></a> </div>
					</div>
				</div>
				<div class="school_box_cen">
                  <?php if($_GET["action"]=="lxs_xxjs"){?>
					<div class="school_box_cen_list">
						<div class="school_box_cen_list_title">
							<dl>
								<dt><img src="images/xx_t01.jpg" /></dt>
								
							</dl>
						</div>
						<div class="school_box_cen_list_text">
                        <?=$lxs_xxjs?>
						</div>
					</div>
                    <?php }?>
                    <?php if($_GET["action"]=="lxs_kcys"){?>
					<div class="school_box_cen_list">
						<div class="school_box_cen_list_title">
							<dl>
								<dt><img src="images/xx_t02.jpg" /></dt>
								
							</dl>
						</div>
						<div class="school_box_cen_list_text">
                   <?=$lxs_kcys?>
						</div>
					</div>
                    <?php }?>
                    <?php if($_GET["action"]=="lxs_zsjz"){?>
					<div class="school_box_cen_list">
						<div class="school_box_cen_list_title">
							<dl>
								<dt><img src="images/xx_t03.jpg" /></dt>								
							</dl>
						</div>
						<div class="school_box_cen_list_text">
                 <?=$lxs_zsjz?>
                 <table width="508" border="1" cellpadding="1" cellspacing="1" style="color:#333;margin-top:20px;">
  <tr align="center" valign="middle">
    <td width="63"><strong>国家</strong></td>
    <td width="79"><strong>专业名称</strong></td>
    <td width="149"><strong>开班名称</strong></td><td width="75"><strong>学费</strong></td><td width="88">&nbsp;</td>
  </tr>
<?php 
$res = $dblink->findAll('lxkkinfo as a','',"lxk_sid=".$lxs_id,'join lxgjclass as b on a.lxk_gjid=b.lx_gjid');

foreach($res as $row){

//}
  ?>
  <tr align="center" valign="middle">
    <td><?php echo $row["lx_gjcl"];?></td>
    <td><?php echo $row["lxk_zy"];?></td>
    <td><u><a href="lx_course.php?kid=<?=$row["lxk_id"]?>"><?php echo $row["lxk_title"];?></a></u></td>

    <td style="color:red;"><?php echo $row["lxk_xuefei"];?></td>
    <td><a href="lx_online.php">网上报名>></a></td>
  </tr>
  <?php }?>
</table>
						</div>
					</div>
                    <?php }?>
                    <?php if($_GET["action"]=="lxs_shhj"){?>
					<div class="school_box_cen_list">
						<div class="school_box_cen_list_title">
							<dl>
								<dt><img src="images/xx_t04.jpg" /></dt>								
							</dl>
						</div>
						<div class="school_box_cen_list_text">
                    <?=$lxs_shhj?>
						</div>
					</div>
                    <?php }?>
				</div>
				<div class="school_box_right">
					<div class="school_box_right_b01">
						<div class="school_box_right_b01_00">
							<div class="school_box_right_b01_00_t"><img src="images/t00.jpg" /></div>
							<div class="school_box_right_b01_00_c">
								<div class="school_box_right_b01_00_c_t">
									<h1>一休咨询</h1>
									<img src="images/c_linebg.jpg" />
								</div>
								<div class="school_box_right_b01_00_c_l">
<ul>
<?php                  $lx_qq=$web["z_qq"];// 网站QQ	
					   $lx_qq=explode(",",$lx_qq); //分割QQ
					   $qcount=count($lx_qq);
						for ($i=0;$i<=$qcount-1;$i++){
						echo "<li><a title='在线咨询1' href='tencent://message/?uin=".$lx_qq[$i]."&amp;Site=一休教育网&amp;Menu=yes'><img border='0' align='top' src='http://wpa.qq.com/pa?p=1:".$lx_qq[$i].":1'></a></li>";
						}						
?>
</ul>									
								</div>
								<div class="school_box_right_b01_00_c_tle">
									<?=$lx_bmtel?>
								</div>
								<div class="school_box_right_b01_00_c_wsbm"><a href="lx_online.php"><img src="images/xx_wsbm.jpg" /></a></div>
							</div>
							<div class="school_box_right_b01_00_b"><img src="images/b00.jpg" /></div>
						</div>
						
						<div class="school_box_right_b01_01"><img src="images/xx_jt.jpg" /></div>
						
						<div class="school_box_right_b01_00">
							<div class="school_box_right_b01_00_t"><img src="images/t00.jpg" /></div>
							<div class="school_box_right_b01_00_c">
								<div class="school_box_right_b01_00_c_t">
									<h1>相关学校推荐</h1>
									<img src="images/c_linebg.jpg" />
								</div>
								<div class="school_box_right_b01_00_c_xxtj">
									<?=$lxs_xgxx?>
								</div>
							</div>
							<div class="school_box_right_b01_00_b"><img src="images/b00.jpg" /></div>
						</div>
						
						<div class="school_box_right_b01_01"><img src="images/xx_jt.jpg" /></div>
						
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