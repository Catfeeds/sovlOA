<?php
include("../conn.php");
include("mb_step.php");
?>
<?php 
$rs2=mysql_query("select * from mbclass where n_id=".$_GET["class"]);
$row2=mysql_fetch_assoc($rs2);
$show_class=$row2["n_class"];//新闻类别
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_SESSION["s_name"];?>-<?php echo $show_class;?></title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/top.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/bottom.css" rel="stylesheet" type="text/css" />
<script src="js/js.js" type="text/javascript"></script>
</head>

<body>

<div class="wrapper">

<!-- top -->
<?php include("mb_top.html");?>
<!-- top end -->

<!-- main -->
<div class="main">
  <div class="main_xyjs">
  	<div class="main_xyjs_left">
    	<div class="main_xyjs_left_box01"><img src="images/left_top_bg.jpg" width="656" height="14" /></div>
        <div class="main_xyjs_left_box">
        	<div class="main_xyjs_left_box_title_zsjz"><?php echo $_SESSION["s_name"];?>--<?php echo $show_class;?></div>
            
            	<div class="main_zsjz">
<?php
$pagesize=8;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("SELECT * FROM mbnews where s_name='".$_SESSION["s_name"]."' and nclass=".$_GET["class"]);
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from mbnews where s_name='".$_SESSION["s_name"]."' and nclass=".$_GET["class"]." order by nclass,ndate desc limit $page $pagesize ";     
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	  
	 if (mysql_num_rows($rs)>=1){
	 $i=0;
	 while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
     $i=$i+1;
			 
?>
			<div class="main_zsjz_list" onmouseover="this.style.background='#edf5fb'"  onmouseout="this.style.background='#fff'">
				<div class="main_zsjz_list_title">
					<dl>
					<dt>·<a href="mb_n_detail.php?id=<?php echo $row["nid"];?>"><?php echo $row["ntitle"];?></a>(<?php echo $row["nclick"];?>)</dt>
					<dd><?php echo time_tran($row["ndate"]);?></dd>
					</dl>
				</div>
				<div class="main_zsjz_list_text">
				<?=utf_substr($row["ncon"],200)?>..</div>
			</div>
 <?php }}?>                                       
                </div>
<div class="main_news_right_box03">
<div class="main_news_right_box03_left" style="text-align:right;padding-right:20px;">
<?php
echo "共{$num}条信息";
if($num > $pagesize){
 if(@$pageval<=1)$pageval=1;


  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <a href=$url?class=".$_GET["class"]."&page=".($pageval-1).">上一页</a>";
}
    for ($i=1;$i<=$cp;$i++){
	     if ($i==@$_GET["page"]){
		 echo " ".$i." ";
		 }else{
	     echo " <a href=$url?class=".$_GET["class"]."&page=".$i.">[".$i."]</a> ";
		 }
	}
if(@$_GET["page"]<$cp){
echo " <a href=$url?class=".$_GET["class"]."&page=".($pageval+1).">下一页</a>";
}

} 
?>
<?php echo @$_GET[page];?>/<?php echo $cp;?>　每页<?php echo $pagesize;?>条</div>
                
            </div>
        </div>
        <div class="main_xyjs_left_box01"><img src="images/left_bottom_bg.jpg" width="656" height="14" /></div>
    </div>
      <?php include("mb_left.html");?>
  </div>
</div>
<!-- main end -->

<!-- bottom -->
<?php include("mb_bottom.html");?>
<!-- bottom end -->


</div>

</body>
</html>
