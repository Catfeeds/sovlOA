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
<script>
function lxwd(){
//alert('000000');
	if(document.lxwdform.lxwd_name.value=="")
{
alert('请填写您的姓名');
document.lxwdform.lxwd_name.focus();
return false;
}

if(document.lxwdform.lxwd_question.value=="")
{
alert('请填写要咨询的问题');
document.lxwdform.lxwd_question.focus();
return false;
}
}
</script>
<?php
 if (isset($_POST["lxwd_question"])){
 $num = $dblink->countByStr('lxwd','',"lxwd_question='".$_POST["lxwd_question"]."'");
      if ($num){
	  echo"<script>alert('已存在相同的问题,请勿重复提交!');</script>";
	   echo"<meta http-equiv='refresh' content='0; url=lx_advisory.php'>";
	  }else{
		  $sql="insert into lxwd set lxwd_name='".$_POST["lxwd_name"]."',lxwd_question='".$_POST["lxwd_question"]."',lxwd_tel='".$_POST["lxwd_tel"]."',lxwd_xxmc='".$_POST["lxwd_xxmc"]."',lxwd_date=now()";
		  $rs=$dblink->query($sql);
		  if ($rs){
		   echo"<script>alert('提问已发出,请等待管理员的审核回复!');</script>";
		   echo"<meta http-equiv='refresh' content='0; url=lx_abroad.php'>";
		  }else{	  
		  exit("添加失败! ");
		  }
	   }
  }
  ?>
<body>
<div class="wrapper">
	<!-- top -->
	<?php include("lxtop.php"); ?>
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
						<dd><a href="lx_abroad_show.php?action=lxs_xxjs" id="lx_icon01">学校简介</a></dd>
                        <dd><a href="lx_abroad_show.php?action=lxs_kcys" id="lx_icon02">课程优势</a></dd>
						<dt><a href="lx_abroad_show.php?action=lxs_zsjz" id="lx_icon03">招生简章</a></dt>
                        <dd><a href="lx_abroad_show.php?action=lxs_shhj" id="lx_icon04">学习生活</a></dd>
						<dd><a href="lx_advisory.php" id="lx_icon05">专家咨询</a></dd>
						</dl>
					</div>
					<div class="school_box_left_tool">
						<div class="school_box_left_tool_title"><span>留学工具</span></div>					
<div class="main_box02_right_list02"> <a href="http://time.123cha.com/" target="_blank"><img src="images/tool01.jpg" /></a> <a href="http://weather.news.sina.com.cn/"  target="_blank"><img src="images/tool02.jpg" /></a> <a href="http://jipiao.oklx.com/search.aspx"  target="_blank"><img src="images/tool03.jpg" /></a> <a href="http://renzheng.cscse.edu.cn/"  target="_blank"><img src="images/tool04.jpg" /></a> <a href="http://www.boc.cn/sourcedb/whpj/"  target="_blank"><img src="images/tool05.jpg" /></a> <a href="http://www.jsj.edu.cn/index.php/default/"  target="_blank"><img src="images/tool06.jpg" /></a> </div>
					</div>
				</div>
				<div class="school_box_cen">
					<div class="school_box_cen_list">
						<div class="school_box_cen_list_title">
							<dl>
								<dt><img src="images/xx_t05.jpg" />
<a style="display:none;" id="lyb_anniu01" href="JavaScript:void(0);"><img src="images/xx_wytw.jpg" /></a>
<a id="lyb_anniu02" href="JavaScript:void(0);" style="display:block;"><img src="images/xx_wytw02.jpg" /></a>
								</dt>
							</dl>
						</div>
						<div class="school_box_cen_list_text">
<div id="main_lyb_list" style="display:block;">
<form name="lxwdform" onsubmit="return lxwd()" method="post" action="lx_advisory.php">
<div class="main_lyb_list_left">
<dl><dt>姓名：</dt><dd><input type="text" value="<?php if(isset($_COOKIE["vipname"])){echo $_COOKIE["vipname"];}?>" name="lxwd_name"></dd></dl>
<dl><dt>咨询学校：</dt><dd><input type="text" value="<?=$lxs_name?>" readonly="readonly" name="lxwd_xxmc"></dd></dl>
<dl><dt>联系方式：</dt><dd><input type="text" name="lxwd_tel"></dd></dl>
</div>
<div class="main_lyb_list_right">
<h1>请填写你的问题</h1>
<textarea name="lxwd_question"></textarea>
<input type="submit" value="提交">
</div>
</form>
</div>
	
<?php
$pagesize=7;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$num = $dblink->countByStr('lxwd','',"lxwd_xxmc='".$lxs_name."' and lxwd_bool=1");
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from lxwd where lxwd_xxmc='".$lxs_name."' and lxwd_bool=1 order by lxwd_id desc limit $page $pagesize ";     
	  $res = $dblink->fetchAll($sql);
    if (count($res)>=1){
			 
?>
                  <div class="main_xl_zxtw">
                    	<div class="main_xl_zxtw_box">
						<?php 
	 if (count($res)>=1){
	 $i=0;
	 foreach($res as $row){
     $i=$i+1;	 
						?>
                    	  <div class="main_xl_zxtw_box_list00">
                        	<div class="main_xl_zxtw_box_title00">
                            	<div class="main_xl_zxtw_box_title">
                                	<dl>
                                    <dt>昵称：<?php echo $row["lxwd_name"];?></dt>
                                    <dd>[<?php echo $row["lxwd_date"];?>]</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="main_xl_zxtw_box_list">
                            	<dl>
                                <dt><?php echo $row["lxwd_question"];?></dt>
                                <dd>
                                	<ul>
                                    <li><?php echo $row["lxwd_answer"];?></li>
                                    <li class="main_xl_zxtw_box_list_zxhf"><strong>【在线回复】</strong><?php echo $row["lxwd_ltime"];?></li>
                                    </ul>
                                </dd>
                                </dl>
                            </div>
                          </div>
							<?php }}?>
                            <div class="main_xl_zxtw_box_fy">
                            	<dl>
                                <dt><span class="main_news_right_box03_left">
                                  <?php
echo "共 $num 条信息";
if($num > $pagesize){
 if(@$pageval<=1)$pageval=1;


  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <a href=$url?page=".($pageval-1).">上一页</a>";
}else{echo"上一页";}
    for ($i=1;$i<=$cp;$i++){
	     if ($i==@$_GET["page"]){
		 echo " ".$i." ";
		 }else{
	     echo " <a href=$url?page=".$i.">[".$i."]</a> ";
		 }
	}
if(@$_GET["page"]<$cp){
echo " <a href=$url?page=".($pageval+1).">下一页</a>";
}else{echo"下一页";}

} 
	 ?>
                                </span></dt>
        <dd>当前第<span><?php if(!isset($_GET["page"])){echo "1";}else{echo @$_GET["page"];}?></span>页，共<span><?php echo $cp;?></span>页，每页显示<span><?php echo $pagesize;?></span>条</dd>
                                </dl>
                          </div>
                        </div>
                    </div>
           <?php }?> 			
						</div>
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
						echo "<li><a title='在线咨询1' href='tencent://message/?uin=".$lx_qq[$i]."&amp;Site=一休教育网&amp;Menu=yes'><img border='0' align='top' src='http://wpa.qq.com/pa?p=3:".$lx_qq[$i].":7'></a></li>";
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
									<?=$lxs_xgxx?></div>
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