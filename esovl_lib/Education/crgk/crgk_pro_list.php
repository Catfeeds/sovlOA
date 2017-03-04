<?php
include_once("../../conn.php");

include_once("cr_webstep.php");
?>
<?php $ction="招生简章";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>成人高考-<?=$ction?></title>
<meta name="keywords" content="<?=$cr_keyword?>" />
<meta name="description" content="<?=$cr_contant?>" />
<base href="http://<?php echo $_SERVER['SERVER_NAME'];?>/">
<link href="../../css/css.css" rel="stylesheet" type="text/css" />
<link href="../../css/top.css" rel="stylesheet" type="text/css" />
<link href="../../css/main.css" rel="stylesheet" type="text/css" />
<link href="../../css/bottom.css" rel="stylesheet" type="text/css" />
<link href="../../css/main3.css" rel="stylesheet" type="text/css" />
<script src="../../js/style.js"></script>
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
      <div class="main_crgkzx">
  	  	<div class="main_crgkzx_01"></div>
        <div class="main_crgkzx_02">
       		<div class="zx_zx_dk">
                  <div class="zx_zx_fd">
                    <div class="zx_zx_lj">
                        <dl>
                          <dd><span><a href="#">首页</a></span></dd>
                          <dt><img src="../../images/bx_hw_03.jpg" width="17" height="30" /></dt>
                          <dd><a href="Education/crgk/">成人高考</a></dd>
                          <dt><img src="../../images/bx_hw_03.jpg" width="17" height="30" /></dt>
                          <dd><?=$ction?></dd>
                          <dt><img src="../../images/bx_hw_03.jpg" width="17" height="30" /></dt>
                        </dl>
                    </div>
                  </div>
                  <div class="zx_wzgg">
                    <div class="zx_gg_lm">
                      <div class="zx_gg_zl"><?=$ction?></div>
                    </div>
                    <div class="zx_lm_dian"><img src="../../images/wl-gg_06.jpg" /></div>
<?php
$pagesize=5;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("select * from kkinfo join school on kkinfo.s_id=school.s_id where bk_id=4");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from kkinfo join school on kkinfo.s_id=school.s_id where bk_id=4 order by kkdate desc limit $page $pagesize ";     
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	  
	 if (mysql_num_rows($rs)>=1){
	 $i=0;
	 while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
     $i=$i+1;	 
	         
?>
   <table width="724" height="186" cellspacing="1" cellpadding="1" border="1">
  <tr height="35">
    <td colspan="5" class="asdfqwer"><strong><a href="Education/xl_pro_detail.php?kid=<?php echo $row["kid"];?>&sid=<?php echo $row["s_id"];?>"><?php echo $row["zyclass"]?></a>－<span><a href="Education/xl_pro_zyjs.php?kid=<?php echo $row["kid"];?>&sid=<?php echo $row["s_id"];?>"><?php echo $row["ktitle"]?></a></span></strong></td>
    </tr>
  <tr height="50">
    <td align="center" valign="top" width="12%"><strong>专业介绍：</strong></td>
    <td colspan="3" valign="top"><?php echo msubstr(strip_tags($row["zycon"]),0,240);?>..</td>
    <td class="asdfqwer"><a href="Education/xl_pro_zyjs.php?kid=<?php echo $row["kid"];?>&sid=<?php echo $row["s_id"];?>">查看招生简章>></a></td>
    </tr>
  <tr height="30">
    <td align="center" valign="top"><strong>专业类别：</strong></td>
    <td width="19%" valign="top"><?php echo $row["zyclass"];?></td>
    <td align="center" valign="top" width="12%"><strong>课程时间：</strong></td>
    <td colspan="2" valign="top"><?php echo $row["ktime"];?></td>
    </tr>
  <tr height="30">
    <td align="center" valign="top"><strong>学&nbsp;&nbsp;&nbsp;费：</strong></td>
    <td valign="top"><?php echo $row["xfei"];?>元/年</td>
    <td align="center" valign="top"><strong>专业名称：</strong></td>
    <td width="43%" valign="top"><?php echo $row["zyname"];?></td>
    <td width="14%" class="asdfqwer"><a href="Education/xl_pro_zxtw.php?kid=<?php echo $row["kid"];?>&sid=<?php echo $row["s_id"];?>">我要咨询>></a></td>
  </tr>
  <tr height="30">
    <td align="center" valign="top"><strong>上课类型：</strong></td>
    <td valign="top"><?php echo $row["kcal"];?></td>
    <td align="center" valign="top"><strong>开班日期：</strong></td>
    <td valign="top"><?php echo $row["kdate"];?></td>
    <td class="asdfqwer"><a href="Education/xl_pro_wsbm.php?kid=<?php echo $row["kid"];?>&sid=<?php echo $row["s_id"];?>">网上报名>></a></td>
  </tr>
</table><br>
<?php }}?>       
                    <div class="zx_gg_fy">
                    <span style=" display:block;float:left;"><?php echo "共 $num 条信息";?></span>
                    <div style="float:right;">
<?php
if($num > $pagesize){
 if(@$pageval<=1)$pageval=1;

  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <div class='zx_fy_syy'><a href=$url?page=".($pageval-1)."><img src='../../images/wl-gg_18.jpg' /></a></div>";
}
    for ($i=1;$i<=$cp;$i++){
	     if ($i==@$_GET["page"]){
		 echo " <div class='zx_fy_sz'>".$i."</div> ";
		 }else{
	     echo " <div class='zx_fy_sz'><a href=$url?page=".$i.">".$i."</a></div> ";
		 }
	}
if(@$_GET["page"]<$cp){
echo " <div class='zx_fy_syy'><a href=$url?page=".($pageval+1)."><img src='../../images/wl-gg_28.jpg' /></a></div>";
}

} 
?>
</div>    </div>
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
        <li><a href="Education/xl_pro_detail.php?kid=<?=$row["kid"]?>&amp;sid=<?=$row["s_id"]?>"><?=$rowa["s_name"]?></a></li>
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
  </div>
  <!-- main End --> 
  
  <!-- bottom -->
  <?php include("../../bottom/bottom.html");?>
  <!-- bottom End --> 
</div>
</body>
</html>
