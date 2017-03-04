<?php
include_once("../web_start.php");
$web=getWeb("12");
$web['z_title'] = '一休网--留学频道';
include_once('Abroad_header.php');


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
   
?>

<link href="css/lxschool.css" rel="stylesheet" type="text/css" />
<!--[if gte IE 6]><script language="javascript" src="js/ie6png.js" type="text/javascript" ></script><![endif]-->
<script language="javascript" src="js/lxwsbm.js" type="text/javascript" ></script>
<body>
<div class="wrapper">
	<!-- top -->
	<?php include("lxtop.php"); ?>
	<!-- top end -->
	<!-- main -->
	<div class="main00">
		<div class="school">
			<div class="school_logo"><img src="../admin_root/<?=$lxs_banner?>" /></div>
			<div class="school_weizhi">您当前的位置：<a href="/Abroad/">留学频道</a> >>
              <a href="lx_abroad.php"><?=$lxs_name?></a>
		  </div>
			<div class="school_box">
				<div class="school_box_left">
					<div class="school_box_left_nav">
						<dl>
                        <?php if(@$_GET["action"]=="lxs_xxjs"){?>
						<dt><a href="lx_abroad_show.php?action=lxs_xxjs" id="lx_icon01">学校简介</a></dt>
                        <?php }else{?>
                        <dd><a href="lx_abroad_show.php?action=lxs_xxjs" id="lx_icon01">学校简介</a></dd>
                        <?php }?>
                        <?php if(@$_GET["action"]=="lxs_kcys"){?>
						<dt><a href="lx_abroad_show.php?action=lxs_kcys" id="lx_icon02">课程优势</a></dt>
                         <?php }else{?>
                        <dd><a href="lx_abroad_show.php?action=lxs_kcys" id="lx_icon02">课程优势</a></dd>
                        <?php }?>                        
                        <?php if(@$_GET["action"]=="lxs_zsjz"){?>
						<dt><a href="lx_abroad_show.php?action=lxs_zsjz" id="lx_icon03">招生简章</a></dt>
                         <?php }else{?>
                        <dd><a href="lx_abroad_show.php?action=lxs_zsjz" id="lx_icon03">招生简章</a></dd>
                        <?php }?>
                        <?php if(@$_GET["action"]=="lxs_shhj"){?>
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
					<div class="school_box_cen_online">
						<div class="school_box_cen_online_title">网上报名</div>
                     <form name="lxwsbmform" method="post" onsubmit="return lxwsbm()" action="">
						<div class="school_box_cen_online_wsbm">

<div class="main_wsbm_box_left_box_list02">
<dl>
<dt>学校名称</dt>
<dd><h2><input type="text" name="lxbm_xxmc" readonly="" value="<?=$lxs_name?>"></h2><span id="lxbmxxmc"><strong>*</strong></span></dd>
</dl>
<dl>
<dt>专业名称</dt>
<dd>
<select name="lxbm_zymc">
<option value="0">请选择专业名称</option> 
<?php 
if (isset($_GET["sid"])){
	$str="select * from lxkkinfo where lxk_sid=".$_GET["sid"]; ///////////////这里要提取出专业,根据点学校名称。
}else{
	$str="select * from lxkkinfo where lxk_sid=".$_SESSION["sid"]; 
}
if(isset($_GET["kid"])){
	$row0 = $dblink->find('lxkkinfo','',"lxk_id=".$_GET["kid"]);		  
	$lxkzy=$row0["lxk_zy"];
}else{
	$lxkzy="0";
}	
$res = $dblink->fetchAll($str);
$snum=count($res);

if ($snum>=1){
foreach($res as $row){?>                   	
<option value="<?=$row["lxk_zy"]?>" <?php if($lxkzy==$row["lxk_zy"]){echo"selected";}?>><?=$row["lxk_zy"]?></option>
<?php }}?>
</select><span id="lxbmzymc"><strong>*</strong>请选择专业名称</span></dd>
</dl>
<dl>
<dt>姓名</dt>
<dd><h2><input type="text" maxlength="4" onkeyup="value=value.replace(/[^\u4E00-\u9FA5]/g,'')" name="lxbm_name"></h2><span id="lxbmname"><strong>*</strong>请输入中文名</span></dd>
</dl>
<dl>
<dt>手机/电话</dt>
<dd><h2><input type="text" style="ime-mode:disabled" onkeypress="if (event.keyCode!=46 &amp;&amp; event.keyCode!=45 &amp;&amp; (event.keyCode&lt;48 || event.keyCode&gt;57)) event.returnValue=false" name="lxbm_tel"></h2><span id="lxbmtel"><strong>*</strong>电话和手机至少输入一项</span></dd>
</dl>
<dl>
<dt>身 份 证</dt>
<dd><h2><input type="text" name="lxbm_sfz"></h2><span id="lxbmsfz"><strong>*</strong>用于报名确认，请填写真实身份证号码</span></dd>
</dl>
<dl>
<dt>通讯地址</dt>
<dd><h2><input type="text" name="lxbm_address"></h2><span id="lxbmaddress"><strong>*</strong>用于寄发相关的材料，非常重要</span></dd>
</dl>
<dl>
<dt>电子邮箱</dt>
<dd><h2><input type="text" name="lxbm_email"></h2> <span id="lxbmemail"><strong>*</strong>请输入您最常使用的电子邮件地址</span></dd>
</dl>
<dl style="height:100px;">
<dt>备注说明</dt>
<dd style="height:100px;"><textarea style="font-family:Arial, Helvetica, sans-serif" name="lxbm_con"></textarea></dd>
</dl>
<div class="wsbm_anniu"><input type="image" src="images/wsbm.jpg"></div>
</div>
						
						</div>
                     </form>   
					</div>
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
<?php                  
						$lx_qq=$web["z_qq"];// 网站QQ	
					    $lx_qq=explode(",",$lx_qq); //分割QQ
					    $qcount=count($lx_qq);
						for ($i=0;$i<=$qcount-1;$i++){
						echo "<li><a title='在线咨询1' href='tencent://message/?uin=".$lx_qq[$i]."&amp;Site=一休教育网&amp;Menu=yes'><img border='0' align='top' src='http://wpa.qq.com/pa?p=1:".$lx_qq[$i].":1'></a></li>";
						}						
?>
</ul>									
								</div>
								<div class="school_box_right_b01_00_c_tle">
									010-51651251<br />010-51651251
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
<?php
if (isset($_POST["lxbm_name"])){
$sql="insert into lxbm set lxbm_gjid=".$lxs_gjid.",lxbm_xxmc='".$_POST["lxbm_xxmc"]."',lxbm_zymc='".$_POST["lxbm_zymc"]."',lxbm_name='".$_POST["lxbm_name"]."',lxbm_tel='".$_POST["lxbm_tel"]."',lxbm_sfz='".$_POST["lxbm_sfz"]."',lxbm_address='".$_POST["lxbm_address"]."',lxbm_email='".$_POST["lxbm_email"]."',lxbm_con='".$_POST["lxbm_con"]."',lxbm_date=now()";
        $rs=mysql_query($sql);
		if (!$rs){  
	    exit("数据库操作失败! 错误信息为:".mysql_error());
	    }else{	
		     echo"<script>alert('报名信息提交成功！我们会尽快与您取得联系！');location.href='lx_abroad.php';</script>";
		}       
}
?>
</body>
</html>
