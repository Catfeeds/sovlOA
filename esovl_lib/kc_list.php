<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
include_once("conn.php");

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $z_name;?>-课程列表</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/top.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/bottom.css" rel="stylesheet" type="text/css" />
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
            	<div class="main_ksrl_left_box01_title"><span>培训课程</span></div>
                <div class="main_ksrl_left_box01_list_kc">
                	<div class="main_ksrl_left_box01_list_kc_box01">
                    	<div class="main_ksrl_left_box01_list_box_title"><span>精彩专题</span></div>
                        <div class="main_ksrl_left_box01_list_kc_box01_text">
                        	
							<?php 
						$sq="select * from tjbiao where tj_click=(select max(tj_click) from tjbiao) limit 1";
						$rs=mysql_query($sq);
						if (mysql_num_rows($rs)>=1){
						$row=mysql_fetch_array($rs,MYSQL_ASSOC);
							?>
							<div class="main_ksrl_left_box01_list_kc_box01_text_01">
                            	<div class="main_kc_pic">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td align="center" valign="middle">
<a href="kc_detail.php?id=<?php echo $row["tj_id"];?>"><img src="admin_root/<?php echo $row["tj_pic"];?>" border="0" align="top" onload="javascript:ResizePic(this,85,83)"/></a>
</td>
</tr>
</table>                                	
                                </div>
                                <h1>
        <a href="kc_detail.php?id=<?php echo $row["tj_id"];?>" title="<?php echo$row["tj_title"];?>"><?php echo mb_substr($row["tj_title"],0,10,"gb2312");?></a><br />
        <?php echo mb_substr($row["tj_info"],0,32,"gb2312");?>......<a href="kc_detail.php?id=<?php echo $row["tj_id"];?>">[详细]</a>
                              </h1>
                            </div>
							<?php }?>
                            <!--<div class="main_ksrl_left_box01_list_kc_box01_text_02">
                            	<ul>
                                <li><a href="#">自主学习  同步学习  超前学习</a></li>
                                <li><a href="#">完美学习  巩固学习  全面学习</a></li>
                                <li><a href="#">互动学习  超值价格  丰富课程</a></li>
                                </ul>
                            </div>-->
                        </div>
                    </div>
                    <div class="main_ksrl_left_box01_list_kc_box02">
                    	<div class="main_ksrl_left_box01_list_box_title"><span>名师指导</span></div>
                        <div class="main_kc_mszd">
						
						<?php
						$sql="select * from teacher where t_bool=1 limit 3";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
						?>
                        	<div class="main_kc_mszd_list">
                            	<div class="main_kc_mszd_list_box01">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td align="center" valign="middle">
<a href="msfc.php?id=<?php echo $row["t_id"]?>"><img src="admin_root/<?php echo $row["t_pic"]?>" border="0" align="top" onload="javascript:ResizePic(this,83,87)"/></a>
</td>
</tr>
</table>                                 	
                                </div>
                                <div class="main_kc_mszd_list_box02">
                                    <dl>
                                    <dt><a href="msfc.php?id=<?php echo $row["t_id"]?>"><?php echo $row["t_name"]?>老师</a></dt>
                                    <dd><strong>介绍：</strong><?php echo mb_substr($row["t_con"],0,22,"gb2312");?>...</dd>
                                    </dl>
                                </div>
                            </div>
							<?php }}?>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="main_ksrl_right">
        	<div class="main_ksrl_right_box01">
           		<span>您现在的位置：</span> <a href="/">首页</a> >> <a href="kc_list.php">课程列表</a></div>
            <div class="main_ksrl_right_box02">
            	<div class="main_ksrl_right_box02_title">课程列表</div>
                <div class="main_ksrl_right_box02_list">
                    <div class="main_kc_list">
<?php
$pagesize=7;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("SELECT * FROM tjbiao");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}

	@$sql="select * from tjbiao order by tj_id desc limit $page $pagesize ";
	
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
		  <dt><img src="images/dot_c_s.jpg" /><a href="kc_detail.php?id=<?php echo $row["tj_id"]?>"><?php echo $row["tj_title"]?></a></dt>
		  <dd><?php
		  $td=explode(" ",$row["tj_date"]);
		   echo $td[0];?></dd>
		</dl>
                       
	  <?php
		}
		}
		mysql_free_result($rs);
	  ?>
			
                    </div>
                    <div class="main_news_right_box03" style="border:none; border-top:1px solid #ffcfad;">
                        <div class="main_news_right_box03_left">
<?php
echo "共 $num 条信息";
if($num > $pagesize){
 if(@$pageval<=1)$pageval=1;
echo" <a href=$url?page=1>首页</a> |";
  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <a href=$url?page=".($pageval-1).">上一页</a> |";
}
/*   // for ($i=1;$i<=$cp;$i++){
//	     if ($i==@$_GET["page"]){
//		 echo " ".$i." ";
//		 }else{
//	     echo " <a href=$url?page=".$i.">[".$i."]</a> ";
//		 }
//	}*/
if(@$_GET["page"]<$cp){
echo " <a href=$url?page=".($pageval+1).">下一页</a> |";
}
echo" <a href=$url?page=".$cp.">尾页</a> ";
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
    </div>
    
</div>
<!-- main End -->

<!-- bottom -->
<?php include("bottom/bottom.html");?>
<!-- bottom End -->
</div>

</body>
</html>