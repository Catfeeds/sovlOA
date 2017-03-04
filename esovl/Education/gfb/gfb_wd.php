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
<base href="http://<?php echo $_SERVER['SERVER_NAME'];?>/">
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
<script>
function gfwd(){
	 	if(document.gfwdform.wd_nc.value==""){
alert("请填写姓名或昵称");
document.gfwdform.wd_nc.focus();
return false;
}
	
	if(document.gfwdform.wd_email.value==""){
alert("请填写邮箱");
document.gfwdform.wd_email.focus();
return false;
}
	
	if(document.gfwdform.wd_ask.value==""){
alert("请填写您的问题！");
document.gfwdform.wd_ask.focus();
return false;
}
	 }
</script>
</head>
<?php
 $rse=mysql_query("select * from kkinfo join school on kkinfo.s_id=school.s_id where kid=".$kid);
 $rowe=mysql_fetch_assoc($rse);
 if (isset($_POST["wd_ask"])){
		  $sql="insert into wdonline set s_name='".$rowe["s_name"]."',kid=".$kid.",wd_email='".$_POST["wd_email"]."',wd_nc='".$_POST["wd_nc"]."',wd_ask='".$_POST["wd_ask"]."',wd_stime=now()";
		  $rs=mysql_query($sql,$conn);
		  if ($rs){
		   echo"<script>alert('提问已发出,请等待管理员的审核回复!');</script>";
		   echo"<meta http-equiv='refresh' content='0; url=gfb_wd.php'>";
		  }else{	  
		  exit("添加失败! 错误信息为:".mysql_error());
		  }
	   }
  ?>
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
            <li><a href="vip_zc.php">注册</a><span>|</span></li>
            <li><a href="vip_login.php">登陆</a><span>|</span></li>
            <li><a href="vip_center.php">我的一休</a><span>|</span></li>
            <li><a href="about.php?cid=10">帮助中心</a><span>|</span></li>
            <li><a href="javascript:void(null);">网站导航</a><span>|</span></li>
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
      <div class="gf_index_gg_001_002_01">
        <div class="gf_index_bt_bj_001" style="width:758px;">
          <div class="gf_index_bt_wz_001_002_003">
          在线问答</div>
        </div>
        <div class="yixiu_xxdt_fbnr">
            <div class="gf_bm_001_01">我要提问:<sapn>请提出您对课程有任何疑问，客服老师将第一时间帮您解答。</span><span style="font-size:12px; font-weight:500;"><a href="<?=$z_website?>Education/gfb/gf_bm_lb_xiangxi.php?gid=<?=$kid?>">[查看开班信息]</a></span></div>
            <form method="post" name="gfwdform" onsubmit="return gfwd()" action="">
            <div class="gf_zxwd_005"><strong>昵称：</strong><?php if(isset($_COOKIE["vipname"])){?>
									<input type="text" value="<?php echo $_COOKIE["vipname"];?>" name="wd_nc">
									<?php
									 }else{
									 echo "<input type='text' name='wd_nc'>";
									 }
									 ?></div>
            <div class="gf_zxwd_005"><strong>邮箱：</strong><input name="wd_email" type="text" /></div>
            <div class="gf_zxwd_006"><textarea cols="70" name="wd_ask"  style="font-family:Arial" rows="6"></textarea></div>
            <div class="gf_zxwd_007"><input name="提交" type="submit" value="提交" /></div>
            </form>
            <div class="gf_bm_001_01">课程问答</div>
<?php 
$pagesize=6;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("SELECT * FROM wdonline where s_name='".$s_name."' and wd_bool=1");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from wdonline where s_name='".$s_name."' and wd_bool=1 order by wd_id desc limit $page $pagesize ";     
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }  
   	  if (mysql_num_rows($rs)>=1){	 
	  while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
	  ?>
            <div class="gf_zxwd_001_001">
            	<div class="gf_zxwd_002"><span>留言人：<?=$row["wd_nc"]?></span>  <?=$row["wd_stime"]?></div>
            </div>
            <div class="gf_zxwd_003"><span>问：</span><?=$row["wd_ask"]?></div>
            <div class="gf_zxwd_003"><span>一休网答：</span><?=$row["wd_answer"]?></div>
            <div class="gf_zxwd_xian_004_01"></div>
      <?php }}?>      
            <div style="float:right; margin-top:15px; margin-right:10px; display:inline;">
                <?php
if($num > $pagesize){
 if(@$pageval<=1)$pageval=1;


  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <div class='zx_fy_syy'><a href=$url?gid=".$_GET["gid"]."&page=".($pageval-1)."><img src='../../images/wl-gg_18.jpg' /></a></div>";
}
    for ($i=1;$i<=$cp;$i++){
	     if ($i==@$_GET["page"]){
		 echo " <div class='zx_fy_sz'>".$i."</div> ";
		 }else{
	     echo " <div class='zx_fy_sz'><a href=$url?gid=".$_GET["gid"]."&page=".$i.">".$i."</a></div> ";
		 }
	}
if(@$_GET["page"]<$cp){
echo " <div class='zx_fy_syy'><a href=$url?gid=".$_GET["gid"]."&page=".($pageval+1)."><img src='../../images/wl-gg_28.jpg' /></a></div>";
}

} 
?>
              </div>
             <div style="clear:both; height:12px;"></div>
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