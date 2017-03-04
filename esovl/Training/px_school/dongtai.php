<?php
include("../../web_start.php");
include("px_step.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$pxs_name?>-学校动态</title>
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
    	<div class="school_jianjie_bt">机构动态</div>
        <div class="school_jianjie_kuang">
         <?php
		 $pagesize=2;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$num = $dblink->countByStr('pxmbnews',array(),"pxs_name='".$_SESSION["pxs_name"]."'");
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}

	  	  @$sql = "select * from pxmbnews where pxs_name='".$_SESSION["pxs_name"]."' limit $page $pagesize";
		  $res = $dblink->fetchAll($sql);
          foreach($res as $row){?>
            <div class="school_dongtai_lb">
        	<dl><dd><a href="dongtai_details.php?id=<?=$row["pxnid"]?>"><?=$row["pxntitle"]?></a></dd><dd style="width:100px; font-weight:normal; color:#666;">浏览次数：<?=$row["pxnclick"]?></dd><dt>[<?=$row["pxndate"]?>]</dt></dl>
            <span>&nbsp;&nbsp;&nbsp;&nbsp;<?php if (strlen(strip_tags($row["pxncon"]))>300){echo $Common->strCut(strip_tags($row["pxncon"]),300);}else{echo strip_tags($row["pxncon"]);}?><a href="dongtai_details.php?id=<?=$row["pxnid"]?>">详细</a></span>            
        </div>
        <?php }?>
      <div class="fy">    
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
?></div>  
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
