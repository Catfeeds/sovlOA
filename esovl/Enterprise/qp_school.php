<?php 
include_once("../conn.php");
include_once("../webstep.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>企培学校环境</title>
<link href="css/qpcss.css" rel="stylesheet" type="text/css" />
<link href="css/qptop.css" rel="stylesheet" type="text/css" />
<link href="css/qpmain.css" rel="stylesheet" type="text/css" />
<link href="css/qpbottom.css" rel="stylesheet" type="text/css" />
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
                	<span>学校环境</span>
                </div>
                <div class="main_left_box01_list00">
                	<div class="main_left_box01_Nlist">
                      <ul>
                          <li><a href="qp_school.php">学校环境</a></li>
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
                        	<span class="t_cn">学校环境</span>
                            <span class="t_en">Language classes</span>
                      </li>
<li class="t_wz">您现在的位置：<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>">一休网</a> > <a href="../Enterprise">企培频道</a> > <a href="qp_school.php"><strong>学校环境</strong></a></li>
                    </ul>
              	</div>
                <div class="new_right_box_list_qpkc">
<?php
$pagesize=10;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$_SESSION["cl"]=@$_GET["cl"];
$numq=mysql_query("SELECT * FROM qp_school ");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数
if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from qp_school order by school_id desc limit $page $pagesize "; 
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());  
	  }
	 if (mysql_num_rows($rs)>=1){
	 $i=0;
	 while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
     $i=$i+1;	 
?>
                  	<div class="new_right_box_list_qpkc_l">
                    	<div class="new_right_box_list_qpkc_l_pic">
                        <a href="qp_school_detial.php?id=<?php echo $row["school_id"];?>"><img src="../admin_root/<?php echo $row["npic"];?> " onLoad="javascript:if(this.width>=this.height&&this.width>=162){this.width=162};if(this.height>this.width&&this.height>=75){this.height=75};"></a>
                        </div>
                        <div class="new_right_box_list_qpkc_l_text">
                        	<dl>
                            <dt><a href="qp_school_detial.php?id=<?php echo $row["school_id"];?>"><?php echo $row["school_title"];?></a></dt>
                            <dd class="dd02">
<?php echo utf_substr($row["school_con"],480);?>
							</dd>
                            </dl>
                        </div>
                    </div>
<?php }}?>           
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
}?>
</dt>
<dd>第<span>
<?php
if(@$_GET[page]<1){
echo "1";
}else{
echo "".@$_GET[page]."";
}?>
</span>页，共<span><?php echo $cp;?></span>页，每页<span><?php echo $pagesize;?></span>条。</dd></dl>
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