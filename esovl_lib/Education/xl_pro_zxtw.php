<?php 
include_once("../web_start.php");
if (isset($_GET["sid"])&&$_GET["sid"]&&isset($_GET["kid"])&&$_GET["kid"]){
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
$criteria=new CDbCriteria;
$criteria->addCondition(" s_name = '".$s_name."'");
$criteria->addCondition(" wd_bool = '1'");
$count=$dblink->count("wdonline",$criteria);
$page= isset($_GET['page'])?$_GET['page']:1;//默认页码
$getpageinfo = page($page,$count,$_SERVER['REQUEST_URI'],10);//调用函数，生成分页HTML 和 SQL LIMIT 子句
$criteria->limit=$getpageinfo['sqllimit'];
$newModel=$dblink->selectAll("wdonline",$criteria);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $s_name;?>-在线提问-<?php echo $z_name;?></title>
<meta name="keywords" content="<?php echo $z_keyword?>" />
<meta name="description" content="<?php echo $z_contant?>" />
<link href="/css/css.css" rel="stylesheet" type="text/css" />
<link href="/css/top.css" rel="stylesheet" type="text/css" />
<link href="/css/main.css" rel="stylesheet" type="text/css" />
<link href="/css/bottom.css" rel="stylesheet" type="text/css" />
<script src="/js/style.js"></script>
<script src="/js/xl_fuction.js"></script>
</head>
<?php
 if (isset($_POST["wd_ask"])){
		if ($num=$dblink->countByStr("wdonline",array(),"wd_nc='{$_POST["wd_nc"]}'")){
			echo"<script>alert('已存在相同的问题,请勿重复提交!');</script>";
			echo"<meta http-equiv='refresh' content='0; url={$_SERVER['REQUEST_URI']}'>";
		}else{
			$num=$dblink->insert('wdonline',array("s_name"=>$s_name,"wd_nc"=>$_POST["wd_nc"],"wd_ask"=>$_POST["wd_ask"],"wd_stime"=>date("Y-m-d H:i:s",time())));
			if ($num){
				echo"<script>alert('提问已发出,请等待管理员的审核回复!');</script>";
				echo"<meta http-equiv='refresh' content='0; url={$_SERVER['REQUEST_URI']}'>";
			}else{	  
				exit("添加失败! 错误信息为:");
			}
	   }
  }
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
                	<div id="height01" style="height:20px;"></div>	
                    <div class="main_xl_detail_box03_main_left_box2">
                    	<div class="main_xl_detail_box03_main_left_box2_title"><span>我要提问</span></div>
						<form name="wdform" method="post" onsubmit="return xl_zxwd()" action="">
                        <div class="main_xl_detail_box03_main_left_box2_text">
							 <div class="main_xx_zxtw01">
                             	<dl>
                            	<dt>昵称</dt>
                                <dd>
                                	<h4>
									<?php if($user=Userlogin()){
									echo $user["v_name"];
									?>
									<input type="hidden" value="<?php echo $user["v_name"];?>" name="wd_nc">
									<?php
									 }else{
									 echo "<input type='text' value='' name='wd_nc'>";
									 }
									 ?>
									
									</h4>
                                  <span>您尚未登陆，将以游客身份留言。 [<a href="/vip_login.php">登录</a>] [<a href="/vip_zc.php">注册</a>] 。</span>
                                 </dd>
                            	</dl>
                             </div>
                             <div class="main_xx_zxtw02">
                             	<textarea name="wd_ask" style="font-family:Arial, Helvetica, sans-serif"></textarea>
                             </div>
                             <div class="main_xx_zxtw03"><input type="image" src="/images/xl_tj.jpg" /></div>                       	
                        </div>
						</form>
                    </div>

                  <div class="main_xl_zxtw">
                    	<div class="main_xl_zxtw_box">
						<?php 
	 foreach($newModel as $i=>$row){
						?>
                    	  <div class="main_xl_zxtw_box_list00">
                        	<div class="main_xl_zxtw_box_title00">
                            	<div class="main_xl_zxtw_box_title">
                                	<dl>
                                    <dt>网友：<?php echo $row["wd_nc"];?></dt>
                                    <dd>[<?php echo $row["wd_stime"];?>]</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="main_xl_zxtw_box_list">
                            	<dl>
                                <dt><?php echo $row["wd_ask"];?></dt>
                                <dd>
                                	<ul>
                                    <li><?php echo $row["wd_answer"];?></li>
                                    <li class="main_xl_zxtw_box_list_zxhf"><strong>【在线回复】</strong><?php echo $row["wd_ltime"];?></li>
                                    </ul>
                                </dd>
                                </dl>
                            </div>
                          </div>
							<?php }?>
                            <div class="main_xl_zxtw_box_fy">
                            	<dl>
                                <dt>
								<span class="main_news_right_box03_left">
                                </span>
								</dt>
								<dd>共有<span><?=$getpageinfo['pagetotal']?></span>条记录，当前第<span><?=$getpageinfo['curpage']?></span>页</dd>
                                </dl>
                          </div>
                        </div>
                    </div>
					
                </div>
                <div class="main_xl_detail_box03_main_right">
                	<div class="main_xl_detail_box03_main_right_box1">
                    	<dl>
                        <dt><a href="xl_pro_wsbm.php"><img src="../images/xl_wsbm_anniu.jpg" /></a></dt>
                   	    <dd>地址：<?php echo $z_address;?></dd>
                        </dl>
                  </div>
                    <div class="main_xl_detail_box03_main_right_box2">
                    	<div class="main_xl_detail_box03_main_right_box2_title">
                            <div class="main_xllb_box01_left_list02_box1_title_zi_xx">
                                <dl>
                                <dt><img src="<?=$z_website?>images/xl_title_left.png"></dt>
                                <dd>开课信息</dd>
                                <dt><img src="<?=$z_website?>images/xl_title_right.png"></dt>
                                </dl>
                            </div>
                        </div>
                        <div class="main_xl_detail_box03_main_right_box2_list">
                       	  <div class="main_xl_detail_bmxz"><?php echo $s_kkxx;?></div>
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
                       	  <div class="main_xl_detail_bmxz"><?php echo $s_bmxz;?></div>
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
                       	  <div class="main_xl_detail_bmxz"><?php echo $s_xlxw;?></div>
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