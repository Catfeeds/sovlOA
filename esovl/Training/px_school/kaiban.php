<?php
include("../../web_start.php");
include("px_step.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$pxs_name?>-开班信息</title>
<link href="css/px_school.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="wrapper"> 
  <!-- top -->
  <?php include('top.html');?>
  <!-- top emd  --> 
  
  <!-- mian  -->
  <?php include('left.html');?>
  <div class="school_mian_right">
       <div class="achool_jianjie_nr">
    	<div class="school_jianjie_bt">开班信息</div>
        <div class="school_jianjie_kuang">
       	  <div class="school_kaiban_bj">
            
   <table width="650" cellpadding="1" cellspacing="1" bgcolor="#cccccc">
  <tr>
    <td bgcolor="#E8E8FF"><strong><span style="width:200px;">班级名称</span></strong></td>
    <td bgcolor="#E8E8FF"><strong><span style="width:106px;">上课地点</span></strong></td>
    <td bgcolor="#E8E8FF"><strong>开班日期</strong></td>
    <td bgcolor="#E8E8FF"><strong>学时</strong></td>
    <td bgcolor="#E8E8FF"><strong>学校价格</strong></td>
    <td bgcolor="#E8E8FF"><strong>网上优惠</strong></td>
    <td bgcolor="#E8E8FF">&nbsp;</td>
  </tr>
  
  
   <?php  
$pagesize=18;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq = $dblink->findAll('pxkkinfo','',"pxk_sid=".$_SESSION["pid"]);
$num = count($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}

      @$sql="SELECT * FROM pxkkinfo where pxk_sid=".$_SESSION["pid"]." limit $page $pagesize";
	  $res = $dblink->fetchAll($sql);
	  foreach($res as $row){		
?>
  <tr>
    <td height="40" bgcolor="#FFFFFF"><span style="width:200px;">
      <?=$row["pxk_title"]?>
    </span></td>
    <td bgcolor="#FFFFFF"><span style="width:106px;">
      <?=$row["pxk_adder"]?>
    </span></td>
    <td bgcolor="#FFFFFF"><?=$row["pxk_time"]?></td>
    <td bgcolor="#FFFFFF"><?=$row["pxk_xshi"]?></td>
    <td bgcolor="#FFFFFF"><?=$row["pxk_xfei"]?></td>
    <td bgcolor="#FFFFFF"><?=$row["pxk_yhui"]?></td>
    <td bgcolor="#FFFFFF"><a href="baoming.php"><strong style="color:red">报名</strong></a></td>
  </tr> 
   <?php }?> 
   </table>
<?php
				echo "共".$cp."页";
if($num > $pagesize){
 if(@$pageval<=1)$pageval=1;

  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <a href=$url?page=".($pageval-1).">上一页</a>";
}
    for ($i=1;$i<=$cp;$i++){
	     if ($i==@$_GET["page"]){
		 echo $i;
		 }else{
	     echo "  <a href=$url?page=".$i.">[".$i."]</a>  ";
		 }
	}
if(@$_GET["page"]<$cp){
echo " <a href=$url?page=".($pageval+1).">下一页</a>";
}
} 
?>
          </div>
        </div>
    </div>
  </div>
  <!-- mian emd --> 
  <!-- bottom -->
  <?php include('bottom.html');?>
  <!-- bottom End --> 
</div>
</body>
</html>
