<?php 
include_once("../conn.php");

?>
<?php
  if (isset($_POST["wd_name"])){
      $sql="insert into qp_wd set wd_name='".$_POST["wd_name"]."',wd_con='".$_POST["wd_con"]."',wd_ttime=date(now())";

	  $rs=mysql_query($sql,$conn);
	  if ($rs){
      echo"<script>alert('提交成功');location.href='qp_faq.php';</script>";  
	  }else{
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>企培学员问答</title>
<link href="css/qpcss.css" rel="stylesheet" type="text/css" />
<link href="css/qptop.css" rel="stylesheet" type="text/css" />
<link href="css/qpmain.css" rel="stylesheet" type="text/css" />
<link href="css/qpbottom.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js" language="javascript" type="text/javascript"></script>
<!--<script src="js/style.js" language="javascript" type="text/javascript"></script>-->
</head>

<body>
<div id="wrapper_bg">
<div class="wrapper">
	<!-- strat top -->
	<?php	include_once("top.php");?>
    <!-- end top -->
    <!-- strat main -->
    <div class="main">
    	<div class="new_left">
        	<div class="main_left_box01">
            	<div class="main_left_box01_Ntitle">
                	<span>学员问答</span>
                </div>
                <div class="main_left_box01_list00">
                	<div class="main_left_box01_Nlist">
                      <ul>
                          <li><a href="qp_faq.php">学员问答</a></li>
                      </ul>
                    </div>
                </div>
            </div>
            <?php include_once("left.php");?>
            
        </div>
        <div class="new_right">
        	<div class="new_right_box">
            	<div class="new_right_box_title">
                	<ul>
                    	<li class="t_icon"><strong>1</strong></li>
           		  <li class="t_title">
                        	<span class="t_cn">学员问答</span>
                            <span class="t_en">Students FAQ</span>
                      </li>
                      <li class="t_wz">您现在的位置：<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>">一休网</a> > <a href="../Enterprise">企培频道</a> > <a href="qp_faq.php"><strong>学员问答</strong></a></li>
                    </ul>
              	</div>
                <div class="new_right_box_list_xywd">
                   
<script type="text/javascript">
$(document).ready(function(){
  $("#lyb_anniu01").click(function(){
  $("#lyb_anniu02").show();
  $("#lyb_anniu01").hide(500);
  $("#main_lyb_list").show(1000);
  });
  $("#lyb_anniu02").click(function(){
  $("#lyb_anniu02").hide();
  $("#lyb_anniu01").show(500);
  $("#main_lyb_list").hide(1000);
  });
});
</script>
<script language="javascript">
function newsset(){
	   if(document.formnews.wd_name.value==""){
	document.getElementById("wdname").innerHTML="<font color=red>&times;</font>";
	document.formnews.wd_name.focus();
	return false;
	}else{
	document.getElementById("wdname").innerHTML="<font color=green><b>√</b></font>";
	}
	
	
		   if(document.formnews.wd_con.value==""){
	document.getElementById("wdcon").innerHTML="<font color=red>&times;</font>";
	document.formnews.wd_con.focus();
	return false;
	}else{
	document.getElementById("wdcon").innerHTML="<font color=green><b>√</b></font>";
	}
	
	
		   if(document.formnews.news_zuozhe.value==""){
	document.getElementById("news_zuozhe").innerHTML="<font color=red>&times;请填写新闻标题!</font>";
	document.formnews.news_zuozhe.focus();
	return false;
	}else{
	document.getElementById("news_zuozhe").innerHTML="<font color=green><b>√</b></font>";
	}
	
}
</script>
<div class="main_lyb_anniu">
<a style="display:none;" id="lyb_anniu01" href="JavaScript:void(0);">显示提问框</a>
<a id="lyb_anniu02" href="JavaScript:void(0);">隐藏提问框</a>
</div>
<div id="main_lyb_list">
<form name="formnews" method="post" onSubmit="return newsset()" action="">
<div class="main_lyb_list_left">
<dl><dt>昵称：</dt><dd><input type="text" name="wd_name" value="游客"><label id="wdname"></label></dd></dl>
<dl>您尚未登陆，将以游客身份留言</dl>
<dl><span>[<a href="#">登录</a>] [<a href="#">注册</a>] 。</span></dl>
</div>
<div class="main_lyb_list_right">
<h1>请填写你的问题</h1>
<textarea name="wd_con"></textarea><label id="wdcon"></label>
<input type="submit" value="提交">
</form>
</div>
</div>

<div class="main_xl_zxtw">
<div class="main_xl_zxtw_box">
<?php
$pagesize=10;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
//$_SESSION["cl"]=@$_GET["cl"];
$numq=mysql_query("SELECT * FROM qp_wd where px_bool=1");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数
if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from qp_wd where px_bool=1 order by wd_id desc limit $page $pagesize "; 
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	 if (mysql_num_rows($rs)>=1){
	 $i=0;
	 while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
     $i=$i+1;	 
?>
    
<div class="main_xl_zxtw_box_list00">
<div class="main_xl_zxtw_box_title00">
<div class="main_xl_zxtw_box_title">
<dl>
<dt>网友：<?php echo $row["wd_name"];?></dt>
<dd>[<?php echo $row["wd_ttime"];?>]</dd>
</dl>
</div>
</div>
<div class="main_xl_zxtw_box_list">
<dl>
<dt><?php echo $row["wd_con"];?></dt>
<dd>
<ul>
<li><?php echo $row["wd_huif"];?>。</li>
<li class="main_xl_zxtw_box_list_zxhf"><strong>【在线回复】</strong><?php echo $row["wd_htime"];?></li>
</ul>
</dd>
</dl>
</div>
</div>
<?php }}?>

</div>
</div>


                   
                </div>
                <div class="new_right_box_fy">
                	<dl><dt>
                   <?php

if($num > $pagesize){
	echo "<a href=$url?page=".(1).">首页</a>&nbsp;|&nbsp;";
 if(@$pageval<=1)$pageval=1;
  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <a href=$url?page=".($pageval-1).">上一页</a>";
}else{
	echo "上一页";
}echo "&nbsp;";
if(@$_GET["page"]<$cp){
echo " <a href=$url?page=".($pageval+1).">下一页</a>";
}else{
echo "下一页";	
} 

 echo "&nbsp;|&nbsp;<a href=$url?page=".($cp).">尾页</a>";
}
?>

                   </dt><dd>
				   第<span><?php 
if(@$_GET[page]<1){
echo "1";
}else{

echo "".@$_GET[page]."";
}

?></span>页，共<span><?php echo $cp;?></span>页，每页<span><?php echo $pagesize;?></span>条。</dd></dl>
                </div>
            </div>
        </div>
    </div>
    <!-- end main -->
    <!-- strat bottom -->
     <?php	include_once("bottom.php");?>
    <!-- end bottom -->
</div>
</div>
</body>
</html>