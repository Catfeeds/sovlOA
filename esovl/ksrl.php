<?php 
include_once("conn.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $z_name;?>-考试日历</title>
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
	
    <div class="main_ksrl">
    	<div class="main_ksrl_left">
        	<div class="main_ksrl_left_box01">
            	<div class="main_ksrl_left_box01_title"><span>考试日历</span></div>
                <div class="main_ksrl_left_box01_list">
                	<div class="main_ksrl_left_box01_list_box">
                    	<div class="main_ksrl_left_box01_list_box_title"><span>按时间查询</span></div>
                        <div class="main_ksrl_left_box01_list_box_text">
      <select name="moth" onchange="javascript:window.location.href=(this.options[this.selectedIndex].value)">
	  <option value=0 selected>--请选择--</option>
	    <option value="ksrl.php?mon=1">一月分</option>
		<option value="ksrl.php?mon=2">二月分</option>
		<option value="ksrl.php?mon=3">三月分</option>
		<option value="ksrl.php?mon=4">四月分</option>
		<option value="ksrl.php?mon=5">五月分</option>
		<option value="ksrl.php?mon=6">六月分</option>
		<option value="ksrl.php?mon=7">七月分</option>
		<option value="ksrl.php?mon=8">八月分</option>
		<option value="ksrl.php?mon=9">九月分</option>
		<option value="ksrl.php?mon=10">十月分</option>
		<option value="ksrl.php?mon=11">十一月分</option>
		<option value="ksrl.php?mon=12">十二月分</option>
	    </select>
                        </div>
                    </div>
                    
                    <!--<div class="main_ksrl_left_box01_list_box">
                    	<div class="main_ksrl_left_box01_list_box_title"><span>按分类查询</span></div>
                        <div class="main_ksrl_left_box01_list_box_text">
                            <select name="">
                              <option>请选择种类</option>
                              <option>英语</option>
                              <option>网页设计</option>
                            </select>
                        </div>
                    </div>-->
                    
                </div>
            </div>
            <div class="main_ksrl_left_box02">
            	<div class="main_ksrl_left_box02_title">
                	<dl><dt><img src="images/ksyl_d.jpg" />考试日历搜索</dt><dd>&nbsp;</dd></dl>
                </div>
                <div class="main_ksrl_left_box02_list">
                	<form name="sform" action="ksrl.php" method="post">
					<ul><li><input name="sou" type="text" /></li><li><img src="images/ksrl_ss.jpg" width="46" height="24" onclick="document.sform.submit()" style="cursor:pointer;"/></li></ul>
					</form>
                </div>
            </div>
        </div>
        <div class="main_ksrl_right">
        	<div class="main_ksrl_right_box01">
           		<span>您现在的位置：</span> <a href="/">首页</a> >> <a href="ksrl.php">考试日历</a><?php if(isset($_GET["mon"])){echo " >> ".$_GET["mon"]."月分";}?><?php if(isset($_POST["sou"])&&$_POST["sou"]<>""){echo " >> ".$_POST["sou"];}?></div>
            <div class="main_ksrl_right_box02">
            	<!--<div class="main_ksrl_right_box02_title">最新考试日历</div>-->
                <div class="main_ksrl_right_box02_list">
                	<div class="main_ksrl_right_box02_list_title">
                    	<dl><dt>考试名称</dt><dd>报名时间</dd><dd>考试时间</dd><dd style="width:142px;">考试辅导</dd></dl>
                    </div>
<div class="main_ksrl_right_box02_list_box1">
			  
<?php
$pagesize=6;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
if (isset($_GET["mon"])){
$numq=mysql_query("SELECT * FROM excal where ex_m=".$_GET["mon"]);
}else{	
$numq=mysql_query("SELECT * FROM excal"); 
}

$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}

	if (isset($_GET["mon"])){
	@$sql="select * from excal where ex_m=".$_GET["mon"]." order by ex_id desc limit $page $pagesize ";
	}else{
		  if(isset($_POST["sou"])){
			  @$sql="select * from excal where ex_title like '%".$_POST["sou"]."%'";
			  }else{
			  @$sql="select * from excal order by ex_id desc limit $page $pagesize ";
			  }
	
	}
	
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	  
	 if (mysql_num_rows($rs)>=1){
	 $i=0;
	 while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
     $i=$i+1;	 
	 ?>
                      <dl><dt><a href="ksrl_detail.php?id=<?php echo $row["ex_id"]?>" title="<?php echo $row["ex_title"]?>"><?php echo $row["ex_title"]?></a></dt><dd><?php echo $row["ex_bmtime"]?></dd><dd><?php echo $row["ex_kstime"]?></dd><dd style="width:142px;"><a href="#">题库|资料</a></dd></dl>                
                    <?php
					}
					}
					mysql_free_result($rs);
					?>
<div class="main_news_right_box03_ksrl">
            	<div class="main_news_right_box03_left">
<?php
if(!isset($_POST["sou"])){
if(isset($_GET["mon"])){
echo "共 $num 条信息";
if($num > $pagesize){
 if(@$pageval<=1)$pageval=1;


  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <a href=$url?mon=".$_GET["mon"]."&page=".($pageval-1).">上一页</a>";
}
    for ($i=1;$i<=$cp;$i++){
	     if ($i==@$_GET["page"]){
		 echo " ".$i." ";
		 }else{
	     echo " <a href=$url?mon=".$_GET["mon"]."&page=".$i.">[".$i."]</a> ";
		 }
	}
if(@$_GET["page"]<$cp){
echo " <a href=$url?mon=".$_GET["mon"]."&page=".($pageval+1).">下一页</a>";
}

} 
}else{
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
}
	 ?>
                </div>
                <div class="main_news_right_box03_right">
                	当前第<span><?php echo @$_GET[page];?></span>页，共<span><?php echo $cp;?></span>页，每页显示<span><?php echo $pagesize;?></span>条
                </div>
                <?php }?>
            </div>
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