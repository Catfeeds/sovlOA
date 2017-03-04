<?php
include("../../web_start.php");
include("px_step.php");
?>
<?php if($_GET["t"]=="shizi"){$ca="师资介绍";}if($_GET["t"]=="huanjin"){$ca="学校环境";}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$pxs_name?>-<?=$ca?></title>
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
    	<div class="school_jianjie_bt"><?=$ca?></div>
      <div class="school_jianjie_kuang">
<?php
$pagesize=8;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$num = $dblink->countByStr('szfencai',array(),"sz_class='".$ca."'");
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}

	  	  @$sql="select * from szfencai where sz_class='".$ca."' limit $page $pagesize";          
		  $res = $dblink->fetchAll($sql);
          foreach($res as $row){?>
       	<div class="cshool_shizi_dk">
            	<div class="school_shizi_tu"><a href="shizi_deails.php?sid=<?=$row["sz_id"]?>"><img src="../../admin_root/<?=$row["sz_pic"]?>" style=" display:block; margin:0 auto;" onload="javascript:if(this.width>this.height&&this.width>=136){this.width=136};if(this.height>this.width&&this.height>=95){this.height=95};"/></a></div>
                <div class="school_shizi_js"><span>姓名：<?=$row["sz_name"]?></span><br />
介绍：<?=$row["sz_info"]?></div>
				<div style="clear:both; height:10px; float:left;"></div>
        </div>
        <?php }?>  
          
      </div>
      
    </div>
     <?php
	echo "共".$cp."页";
if($num > $pagesize){
 if(@$pageval<=1)$pageval=1;

  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <a href=$url?t=".$_GET["t"]."&page=".($pageval-1).">上一页</a>";
}
    for ($i=1;$i<=$cp;$i++){
	     if ($i==@$_GET["page"]){
		 echo $i;
		 }else{
	     echo "  <a href=$url?t=".$_GET["t"]."&page=".$i.">[".$i."]</a>  ";
		 }
	}
if(@$_GET["page"]<$cp){
echo " <a href=$url?t=".$_GET["t"]."&page=".($pageval+1).">下一页</a>";
}
} 
?>
  </div>
  <!-- mian emd --> 
  <!-- bottom -->
  <?php include('bottom.html');?>
  <!-- bottom End --> 
</div>
</body>
</html>
