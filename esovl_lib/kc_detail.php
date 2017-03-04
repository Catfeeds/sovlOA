<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
include_once("conn.php");

?>
<?php
			mysql_query("update tjbiao set tj_click=tj_click+1 where tj_id=".$_GET["id"],$conn);//更新浏览次数
			$sql="select * from tjbiao where tj_id=".$_GET["id"];
			$rs=mysql_query($sql);
			$coun=mysql_num_rows($rs);
			if ($coun>=1){
			$row=mysql_fetch_array($rs,MYSQL_ASSOC);
			$tj_id=$row["tj_id"];
			$tj_title=$row["tj_title"];
			$tj_info=$row["tj_info"];
			$tj_click=$row["tj_click"];
			$tj_bool=$row["tj_bool"];
			$tj_date=$row["tj_date"];				           
		
			}else{
			exit("对不起，没有找到相关信息！");
			}
			mysql_free_result($rs);
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $tj_title;?>-课程详细-<?php echo $z_name;?></title>
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
            <a href="kc_detail.php?id=<?php echo $row["tj_id"];?>"  title="<?php echo$row["tj_title"];?>"><?php echo mb_substr($row["tj_title"],0,10,"gb2312");?></a><br />
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
                                    <dd><strong>介绍：</strong><?php echo mb_substr($row["t_con"],0,22,"gb2312");?>......</dd>
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
       			<span>您现在的位置：</span> <a href="/">首页</a> >> <a href="kc_list.php">课程列表</a> >> <strong>详细</strong>
            </div>
            <div class="main_kc_detail">
            	<h1><?php echo $tj_title;?></h1>
            	<div class="main_kc_detail_text">
                	<dl>
                    <dt>课程详情</dt>
                    <dd><?php echo $tj_info;?></dd>
                    </dl>
              </div>
            	<div class="main_kc_detail_box02">
                    <div class="main_news_right_detail_box03">
                	<ul>
					<li><img width="15" height="15" src="images/click_16.gif">浏览：<?php echo $tj_click;?>次</li>
                    <li><img width="15" height="15" src="images/top.jpg"><a href="#">TOP</a></li>
                    <li><img width="15" height="15" src="images/bottom.jpg"><a href="kc_list.php">[返回列表]</a></li>
                    </ul>
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
