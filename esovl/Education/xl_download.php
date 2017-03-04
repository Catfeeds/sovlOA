<?php 
include_once("../conn.php");

include_once("xl_webstep.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>下载中心-学历教育-<?php echo $xl_title;?></title>
<base href="http://<?php echo $_SERVER['SERVER_NAME'];?>">
<link href="../css/css.css" rel="stylesheet" type="text/css" />
<link href="../css/top.css" rel="stylesheet" type="text/css" />
<link href="../css/main.css" rel="stylesheet" type="text/css" />
<link href="../css/bottom.css" rel="stylesheet" type="text/css" />
<script src="../js/style.js"></script>
<script src="../js/downHttp.js"></script>
</head>

<body>

<div class="wrapper">

<!-- top -->
<div class="top">
<?php 
	include("../top/top_1.html");
	include("../top/xl_top.html");
	?>     
</div>
<!-- top End -->

<!-- main -->
<div class="main">
	
    <div class="main_news">
    	<?php include("xl_down_left.html");?>
        <div class="main_news_right">
        	<div class="main_news_right_box01">
            	<ul>
                <li>您现在的位置：</li>
                <li><a href="/">首页</a><span>>></span></li>
                <li><a href="xl_download.php">下载中心</a><span>>></span></li>
                <li><strong>全部</strong></li>
                </ul>
            </div>
 <div class="main_news_right_box02">
<?php
$pagesize=10;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("SELECT * FROM xl_ask where w_downcl='xl'");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from xl_ask where w_downcl='xl' order by w_id desc limit $page $pagesize ";     
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	  
	 if (mysql_num_rows($rs)>=1){
	 $i=0;
	 while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
     $i=$i+1;	 
            
?>
     <dl><dt><A><?php echo $row["w_title"];?></A></dt><dd>下载次数：[<span id="<?php echo $row["w_id"];?>"><?php echo $row["w_click"];?></span>]</dd>
	 
	 
	 
	 <?php if(isset($_COOKIE["vipname"])){?>
						<dd><a href="admin_root/<?php echo $row["w_con"];?>" target="_blank" onclick="dsumXMLHttp(<?php echo $row["w_id"];?>)"><img src="../images/djxz.jpg" /></a></dd>
						<?php }else{?>
						 <dd><a onclick="alert('对不起您尚未登陆')"><img src="../images/djxz.jpg" style="cursor:pointer;"/></a></dd>
						<?php }?>
	 
     </dl>
        <?php
		}}
		?>           
		<?php
		function dsum($conn){
		$id=$_GET['id'];
		  mysql_query("update xl_ask set w_click=w_click+1 where w_id=".$id,$conn);//更新浏览次数
		  echo "<script>location.href='xl_download.php'</script>";
		}
		?>
		
          </div>
            <div class="main_news_right_box03">
            	<div class="main_news_right_box03_left">
      <?php
echo "共 $num 条信息";
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
?>
                </div>
                <div class="main_news_right_box03_right">
                	当前第<span><?php echo @$_GET[page];?></span>页，共<span><?php echo $cp;?></span>页，每页显示<span><?php echo $pagesize;?></span>条
                </div>
            </div>
        </div>
    </div>
    
</div>
<!-- main End -->

<!-- bottom -->
<?php include("../bottom/bottom.html");?>
<!-- bottom End -->
</div>

</body>
</html>