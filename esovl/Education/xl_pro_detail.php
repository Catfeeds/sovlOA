<?php 
include_once("../web_start.php");
// echo "<pre>";
// print_r($_SERVER['REQUEST_URI']);
if (isset($_GET["sid"])&&$_GET["sid"]&&isset($_GET["kid"])&&$_GET["kid"]){
	//$_SESSION["sid"]=$_GET["sid"];//国外空间上莫名不能用。以下写数据库代替SESSION传值
	// $num=$dblink->update("school",array("s_bj"=>"0"));//把当前状态都变成非活动
	// setcookie("")setcookie("u_checkstr",$checkstr,$time,"/");
	$row=$dblink->find("school",array(),"s_id='{$_GET["sid"]}'");
	$num=$dblink->update("school",array("s_click"=>$row["s_click"]+1),"s_id='{$_GET["sid"]}'");//更新浏览次数
	$s_name=$row["s_name"];//学院名称
	$s_id=$row["s_id"];
	$s_banner=$row["s_banner"];//学院banner
	$s_xyjs=$row["s_xyjs"];// 学院介绍
	$s_banner=$row["s_banner"];//学院banner
	$s_bxys=$row["s_bxys"];//办学优势
	$s_zsdx=$row["s_zsdx"];//招生对象
	$s_xxhj=$row["s_xxhj"];//学校环境
	$s_kkxx=$row["s_kkxx"];//开课信息
	$s_bmxz=$row["s_bmxz"];//报名须知
	$s_xlxw=$row["s_xlxw"];//学历学位
	$s_click=$row["s_click"];

	$row2=$dblink->find("kkinfo",array(),"kid='{$_GET["kid"]}'");
	$kid=$row2["kid"];
	$zycon=$row2["zycon"];
	$zyclass=$row2["zyclass"];
	$zyname=$row2["zyname"];
}else{
	exit('参数有误！');
}


include_once("Education_header.php");
?>

<body>
<div class="wrapper">
<!-- top -->
<div class="top">
  <?php 
	include("../top/top_1.html");
	include("../top/xl_top.html");
	?>
</div>
<!-- top End -->

<!-- main -->
<div class="main">	
    <div class="main_xl_detail">
    	<?php include("xl_pro_top.html");?>
		
        <div class="main_xl_detail_box03">
        	
            <div class="main_xl_detail_box03_main">
            	<div class="main_xl_detail_box03_main_left">
                	<div class="main_xl_detail_box03_main_left_box1">
					<?php echo nl2br($s_xyjs);?>
                    </div>
					
					<a id="bxys">&nbsp;</a>
                    <div class="main_xl_detail_box03_main_left_box2">
                    	<div class="main_xl_detail_box03_main_left_box2_title"><span>办校优势</span></div>
                        <div class="main_xl_detail_box03_main_left_box2_text">
<?php echo $s_bxys;?>                    	
                        </div>
                    </div>
                    <a id="zsdx">&nbsp;</a>
                    <div class="main_xl_detail_box03_main_left_box2">
                    	<div class="main_xl_detail_box03_main_left_box2_title"><span>招生对象</span></div>
                        <div class="main_xl_detail_box03_main_left_box2_text">
<?php echo $s_zsdx;?>                       	
                        </div>
                    </div>
					<a id="zyjs">&nbsp;</a>
                    <div class="main_xl_detail_box03_main_left_box2">
                    	<div class="main_xl_detail_box03_main_left_box2_title"><span>专业课程</span></div>
                        <div class="main_xl_detail_box03_main_left_box2_text">
<table width="590" border="1" cellpadding="1" cellspacing="1" style="color:#333;">
  <tr align="center" valign="middle">
    <td width="84">专业名称</td>
    <td width="193">开班名称</td>
    <td width="72">类别</td><td width="44">学制</td><td width="79">学制类别</td><td width="38">学费</td><td width="64">&nbsp;</td>
  </tr>
<?php 
$rs1=$dblink->findAll("kkinfo",array(),"s_id= '{$s_id}'");
foreach($rs1 as $row){
  ?>
  <tr align="center" valign="middle">
    <td><span><a href="xl_pro_zyjs.php?kid=<?php echo $row["kid"];?>&sid=<?php echo $row["s_id"];?>"><?php echo $row["zyname"];?></a></span></td>
    <td><?php echo $row["ktitle"];?></td>
    <td><?php echo $row["zyclass"];?></td>
    <td><?php echo $row["ktime"];?></td>
    <td><?php echo $row["kcal"];?></td>
    <td><?php echo $row["xfei"];?></td>
    <td><a href="xl_pro_wsbm.php?kid=<?php echo $row["kid"];?>&sid=<?php echo $row["s_id"];?>">网上报名>></a></td>
  </tr>
  <?php }?>
</table>
</div>
</div>
                    
                    <div class="main_xl_detail_box03_main_left_box2">
                    	<div class="main_xl_detail_box03_main_left_box2_title"><span>我要提问</span></div>
						<form name="wdform" method="post" onsubmit="return xl_zxwd()" action="xl_pro_zxtw.php">
                        <div class="main_xl_detail_box03_main_left_box2_text">
							 <div class="main_xx_zxtw01">
                             	<dl>
                            	<dt>昵称</dt>
                                <dd>
                                	<h4><?php if(isset($_COOKIE["uname"])){
									echo $_COOKIE["uname"];
									?>
									<input type="hidden" value="<?php echo $_COOKIE["uname"];?>" name="wd_nc">
									<?php
									 }else{
									 echo "<input type='text' value='' name='wd_nc'>";
									 ?></h4>
									<span>您尚未登陆，将以游客身份留言。 [<a href="vip_login.php">登录</a>] [<a href="vip_zc.php">注册</a>] 。</span>
								  <? }?>
                                 </dd>
                            	</dl>
                             </div>
                             <div class="main_xx_zxtw02">
                             	<textarea name="wd_ask" style="font-family:Arial, Helvetica, sans-serif"></textarea>
                             </div>
                             <div class="main_xx_zxtw03"><input type="image" src="<?=$z_website?>images/xl_tj.jpg" /></div>                       	
                        </div>
						</form>
                    </div>
                    
                </div>
                <div class="main_xl_detail_box03_main_right">
                	<div class="main_xl_detail_box03_main_right_box1">
                    	<dl>
                        <dt><a href="xl_pro_wsbm.php"><img src="<?=$z_website?>images/xl_wsbm_anniu.jpg" /></a></dt>
                   	    <dd>地址：<?php echo $z_address;?></dd>
                        </dl>
                    </div>
                    <div class="main_xl_detail_box03_main_right_box2">
                    	<div class="main_xl_detail_box03_main_right_box2_title">
                            <div class="main_xllb_box01_left_list02_box1_title_zi_xx">
                                <dl>
                                <dt><img src="<?=$z_website;?>images/xl_title_left.png"></dt>
                                <dd>开课信息</dd>
                                <dt><img src="<?=$z_website;?>images/xl_title_right.png"></dt>
                                </dl>
                            </div>
                        </div>
                        <div class="main_xl_detail_box03_main_right_box2_list">
                        	<div class="main_xl_detail_bmxz">
<?php echo $s_kkxx;?>

                            </div>
                        </div>
                    </div>
                    
                    <div class="main_xl_detail_box03_main_right_box2">
                    	<div class="main_xl_detail_box03_main_right_box2_title">
                            <div class="main_xllb_box01_left_list02_box1_title_zi_xx">
                                <dl>
                                <dt><img src="<?=$z_website?>images/xl_title_left.png"></dt>
                                <dd>报名须知</dd>
                                <dt><img src="<?=$z_website?>images/xl_title_right.png"></dt>
                                </dl>
                            </div>
                        </div>
                        <div class="main_xl_detail_box03_main_right_box2_list">
                       	  <div class="main_xl_detail_bmxz">
						<?php echo $s_bmxz;?>
						</div>
                        </div>
                    </div>
                    <div class="main_xl_detail_box03_main_right_box2">
                    	<div class="main_xl_detail_box03_main_right_box2_title">
                            <div class="main_xllb_box01_left_list02_box1_title_zi_xx">
                                <dl>
                                <dt><img src="<?=$z_website?>images/xl_title_left.png"></dt>
                                <dd>学历与学位</dd>
                                <dt><img src="<?=$z_website?>images/xl_title_right.png"></dt>
                                </dl>
                            </div>
                        </div>
                        <div class="main_xl_detail_box03_main_right_box2_list">
                       	  <div class="main_xl_detail_bmxz">
<?php echo $s_xlxw;?>
						  </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
</div>
<!-- main End -->

<!-- bottom -->
<?php include("../bottom/bottom.html");?>
<!-- bottom End -->
</div>

</body>
</html>