<?php
include("../conn.php");
include("mb_step.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_SESSION["s_name"];?>-资料下载</title>
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
        	<div class="main_xyjs_left_box_title_zsjz"><?php echo $_SESSION["s_name"];?>--资料下载</div>
			<div class="main_tab">
            	<div class="main_tab_box01">
                	<dl>
                    <dt>网院入学模拟题</dt>
                    <dd>点击下载</dd>
                    </dl>
              </div>
                <div class="main_tab_box02">
                	
				<?php
$pagesize=10;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("SELECT * FROM mb_download where w_dclass='模拟题下载' and s_name='".$_SESSION["s_name"]."'");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from mb_download where w_dclass='模拟题下载' and s_name='".$_SESSION["s_name"]."' order by w_id desc limit $page $pagesize ";     
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	  
	 if (mysql_num_rows($rs)>=1){
	 $i=0;
	 while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
     $i=$i+1;	 
            
?>	
					
					<dl>
                    <dt><?php echo $row["w_title"];?></dt>
                    <dd><a href="../admin_root/<?php echo $row["w_con"];?>"><img src="images/djxz.jpg" /></a></dd>
                    </dl>
                 
       <?php }}?>           
                    
                </div>
				<div class="main_news_right_box03">
            	<div class="main_news_right_box03_left" style="font-size:12px;padding-left:20px;">
      <?php
echo "共{$num}条信息";
if($num > $pagesize){
if(@$pageval<=1)$pageval=1;


  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <a href=$url?page=".($pageval-1).">上一页</a>";
}
    for ($i=1;$i<=$cp;$i++){
	     if ($i==@$_GET["page"]){
		 echo " ".$i." ";
		 }else{
	     echo " <a href=$url?page=".$i.">[".$i."]</a> ";
		 }
	}
if(@$_GET["page"]<$cp){
echo " <a href=$url?page=".($pageval+1).">下一页</a>";
}

} 
?> <span><?php if(isset($_GET["page"])){echo $_GET["page"];}else{echo 1;}?></span>/<span><?php echo $cp;?></span>页，每页显示<span><?php echo $pagesize;?></span>条
                </div>
               
            </div>
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
