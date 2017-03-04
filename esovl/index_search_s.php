<?php 
include_once("conn.php");

//include_once("xl_webstep.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>学校搜索-<?php echo $z_name;?></title>
<meta name="keywords" content="<?php echo $z_keyword?>" />
<meta name="description" content="<?php echo $z_contant?>"/>
<base href="http://<?php echo $_SERVER['SERVER_NAME'];?>">
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/top.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/bottom.css" rel="stylesheet" type="text/css" />
<script src="stHttp.js"></script>
<script src="js/style.js"></script>
</head>
<body>
<div class="wrapper">
  <!-- top -->
  <div class="top">
<?php 
include("top/top_1.html");
include("top/index_top1.html");
?>
  </div>
  <!-- top End -->
  <!-- main -->
  <div class="main">
    <div class="main_xl_pro">
      <div class="main_xl_pro_box03">
        <div class="main_xl_pro_box03_left">
          <div class="main_xl_pro_box03_left_01">
            <ul>
              <li>所有分类</li>
              <li>学校</li>
              <li>搜索条件：
<?php
$sshow="";	
if($_POST["school_key"]!=""){
$sshow=$_POST["school_key"];
echo "<font color='red'>".$sshow."</font>";
}
?></li>
            </ul>
          </div>
          <div class="main_xl_pro_box03_left_03">
            <div class="main_xl_pro_box03_left_03_b01">
              <div class="main_xl_pro_box03_left_03_b01_left">
                
              </div>
<?php
//$pagesize=5;
//$url=$_SERVER["REQUEST_URI"];
//$url=parse_url($url);
//@$url=$url[path];
////echo $url;
//
//if (@$_GET["sschool"]!=""||@$_GET["szyclass"]!=""||@$_GET["szyname"]!=""||@$_GET["skey"]!=""){
//$numq=mysql_query("SELECT * FROM kkinfo where ".@$str_sid." zyclass like '%".@$_GET["szyclass"]."%' and zyname like '%".@$_GET["szyname"]."%' and ktitle like '%".@$_GET["skey"]."%' and ktitle like'%".@$_GET["skey"]."%'");
//}else{
//$numq=mysql_query("SELECT * FROM kkinfo");
//}
//$num = mysql_num_rows($numq);
//$cp=ceil($num/$pagesize);//函数获取页数
//if(@$_GET[page]){
//$pageval=@$_GET[page];
//$page=($pageval-1)*$pagesize;
//$page.=',';
//}
//jump();?>
            </div>
            <div class="main_xl_pro_box03_left_03_b02">
<?php
echo"学历教育学校<br>";
//mysql_query("select * from school join kkinfo on school.s_id=kkinfo.s_id where s_name like '%".$scon."%'");
 $rs=mysql_query("select * from (select kid,ktitle,s_id from kkinfo group by s_id) as k join school on k.s_id=school.s_id where school.s_name like '%".$sshow."%'");
	//$rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	 if (mysql_num_rows($rs)>=1){
	 while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
?>
              <div class="main_xl_pro_box03_left_03_b03_list" onmouseover="this.style.background='#f9f9f9'" onmouseout="this.style.background='#fff'">
              <table width="724" height="39" border="0" cellspacing="0" cellpadding="0">
                  <tr height="25">
                    <td height="36" colspan="2"><strong><a href="Education/xl_pro_detail.php?kid=<?=$row["kid"]?>&sid=<?=$row["s_id"]?>"><?=$row["s_name"]?></a></strong></td>
                  </tr>
                  <tr height="50">
                    <td align="center" valign="top" width="13%"><strong>学校介绍：</strong></td>
                    <td width="87%" valign="top"><?php echo msubstr(strip_tags($row["s_xyjs"]),100);?>..</td>
                  </tr>
                </table>
              </div>
<?php }}?>

<?php
echo"培训学校<br>";

//mysql_query("select * from school join kkinfo on school.s_id=kkinfo.s_id where s_name like '%".$scon."%'");
 $rs1=mysql_query("select * from pxschool join pxmb_step on pxschool.pxs_name=pxmb_step.pxs_name where pxmb_step.pxs_name like '%".$sshow."%'");
	//$rs=mysql_query($sql,$conn);
	  if (!$rs1){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	 if (mysql_num_rows($rs1)>=1){
	 while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){
?>
              <div class="main_xl_pro_box03_left_03_b03_list" onmouseover="this.style.background='#f9f9f9'" onmouseout="this.style.background='#fff'">
              <table width="724" height="39" border="0" cellspacing="0" cellpadding="0">
                  <tr height="25">
                    <td height="36" colspan="2"><strong><a href="Training/px_school/?pid=<?=$row1["pxs_id"]?>"><?=$row1["pxs_name"]?></a></strong></td>
                  </tr>
                  <tr height="50">
                    <td align="center" valign="top" width="13%"><strong>学校介绍：</strong></td>
                    <td width="87%" valign="top"><?php echo msubstr(strip_tags($row1["pxmb_xxjs"]),100);?>..</td>
                  </tr>
               </table>
              </div>
<?php }}?>
<?php
echo"留学学校<br>";

//mysql_query("select * from school join kkinfo on school.s_id=kkinfo.s_id where s_name like '%".$scon."%'");
 $rs1=mysql_query("select * from lxschool where lxs_name like '%".$sshow."%'");
	//$rs=mysql_query($sql,$conn);
	  if (!$rs1){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	 if (mysql_num_rows($rs1)>=1){
	 while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){
?>
              <div class="main_xl_pro_box03_left_03_b03_list" onmouseover="this.style.background='#f9f9f9'" onmouseout="this.style.background='#fff'">
              <table width="724" height="39" border="0" cellspacing="0" cellpadding="0">
                  <tr height="25">
                    <td height="36" colspan="2"><strong><a href="Abroad/lx_abroad.php?sid=<?=$row1["lxs_id"]?>"><?=$row1["lxs_name"]?></a></strong></td>
                  </tr>
                  <tr height="50">
                    <td align="center" valign="top" width="13%"><strong>学校介绍：</strong></td>
                    <td width="87%" valign="top"><?php echo msubstr(strip_tags($row1["lxs_xxjs"]),100);?>..</td>
                  </tr>
               </table>
              </div>
<?php }}?>
            </div>
          </div>
        </div>
        <div class="main_xl_pro_box03_right">
          <div class="main_xl_pro_box03_right_box00">
            <div class="main_box01_right_01_pr">
              <ul>
                <ul>
                  <li><a href=tencent://message/?uin=<?php echo $qq1;?>&Site=<?php echo $z_name;?>&Menu=yes><img border="0" src=http://wpa.qq.com/pa?p=1:<?php echo $qq1;?>:1 alt="在线咨询1" /></a></li>
                  <li><a href=tencent://message/?uin=<?php echo $qq2;?>&Site=<?php echo $z_name;?>&Menu=yes><img border="0" src=http://wpa.qq.com/pa?p=1:<?php echo $qq2;?>:1 alt="在线咨询2" /></a></li>
                </ul>
              </ul>
            </div>
          </div>
          <div class="main_xl_pro_box03_right_box01">
            <div class="main_xl_pro_box03_right_box01_title">热点推荐</div>
            <div class="main_xl_pro_box03_right_box01_list">
              <ul>
                <?php
						$sql="select * from xxtj where xx_bool=1 limit 5";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
				?>
                <li><a href="<?php echo $row["xx_http"]?>" target="_blank"><?php echo $row["xx_name"]?></a></li>
                <?php
						}}
				?>
              </ul>
            </div>
          </div>
          <div class="main_xl_pro_box03_right_box01">
            <div class="main_xl_pro_box03_right_box01_title">你浏览过的学校</div>
            <div class="main_xl_pro_box03_right_box01_list">
              <ul>
<?php
	if(isset($_SESSION["kkid"])){
	$cstr=substr(@$_SESSION["kkid"],1);
	$sql="select * from kkinfo where kid in (".$cstr.")";
	$rs=mysql_query($sql);
	if (mysql_num_rows($rs)>=1){
	while ($row=mysql_fetch_assoc($rs)){
	$rs1=mysql_query("select s_name from school where s_id=".$row["s_id"]);
	$row1=mysql_fetch_assoc($rs1);
?>
                <li><a href="Education/xl_pro_detail.php?kid=<?php echo $row["kid"];?>&sid=<?php echo $row["s_id"];?>"><?php echo $row1["s_name"];?></a></li>
                <?php }}}?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- main End -->
  <!-- bottom -->
  <?php include("bottom/bottom.html");?>
  <!-- bottom End -->
</div>
</body>
</html>
