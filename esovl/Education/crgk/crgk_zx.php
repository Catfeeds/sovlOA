<?php
include_once("../../conn.php");

include_once("cr_webstep.php");
?>
<?php
       $rs1=mysql_query("select n_class from enclass where n_id=".$_GET["nclass"]);
	   $row1=mysql_fetch_array($rs1,MYSQL_ASSOC);
	   $ction=$row1["n_class"];
?>
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
                      <div class="zx_gg_zl">资　　讯</div>
                    </div>
                    <div class="zx_lm_dian"><img src="../../images/wl-gg_06.jpg" /></div>
<?php
$pagesize=8;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("SELECT * FROM ennews where nclass=".$_GET["nclass"]);
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from ennews where nclass=".$_GET["nclass"]." order by ndate desc limit $page $pagesize ";     
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	  
	 if (mysql_num_rows($rs)>=1){
	 $i=0;
	 while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
     $i=$i+1;	         
?>                 
           <div class="zx_xw_dk2">
           <div class="zx_wzgg_bt"><span><a href="Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>"><?=$row["ntitle"]?></a></span><?=date('Y-m-d',strtotime($row["ndate"]))?></div>
           <div class="zx_wzgg_nr"><?=utf_substr($row["ncon"],200)?>.. <span><a href="Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>">查看详细>></a></span></div>
           </div>
                   
<?php }}?>                    
                    <div class="zx_gg_fy">
                    <span style=" display:block;float:left;"><?php echo "共 $num 条信息";?></span>
                    <div style="float:right;">
<?php
if($num > $pagesize){
 if(@$pageval<=1)$pageval=1;


  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <div class='zx_fy_syy'><a href=$url?nclass=".$_GET["nclass"]."&page=".($pageval-1)."><img src='../../images/wl-gg_18.jpg' /></a></div>";
}
    for ($i=1;$i<=$cp;$i++){
	     if ($i==@$_GET["page"]){
		 echo " <div class='zx_fy_sz'>".$i."</div> ";
		 }else{
	     echo " <div class='zx_fy_sz'><a href=$url?nclass=".$_GET["nclass"]."&page=".$i.">".$i."</a></div> ";
		 }
	}
if(@$_GET["page"]<$cp){
echo " <div class='zx_fy_syy'><a href=$url?nclass=".$_GET["nclass"]."&page=".($pageval+1)."><img src='../../images/wl-gg_28.jpg' /></a></div>";
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
