<?php 
include_once("../web_start.php");
if($user=Userlogin()){

}else{
// echo "<script>alert('您没有登录');location.href='/vip_login.php';</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一休网--会员首页</title>
<link href="/css/css.css" rel="stylesheet" type="text/css" />
<link href="/css/top.css" rel="stylesheet" type="text/css" />
<link href="/css/main.css" rel="stylesheet" type="text/css" />
<link href="/css/bottom.css" rel="stylesheet" type="text/css" />
<link href="/css/vip.css" rel="stylesheet" type="text/css" />
<script src="/js/style.js">
</script>
</head>
<body>
<div class="wrapper">
<!-- top -->
<?php 
include("../top/top_1.html");
include("../top/index_top1.html");
?>
<!-- top End -->
<!-- main -->
<div class="main">
	<div class="vip">
    	<div class="vip_title"><em>会员首页</em></div>
        <div class="vip_box">
<?
include("vip_left.php");
?>
        </div>
            <div class="vip_box_right">
            	<div class="vip_box_right_b00">
                	<div class="vip_box_right_b">
                    	<div class="vip_box_right_b_list01">
                        	<div class="vip_box_right_b_list01_title">
                            	<dl><dt>会员新闻</dt><dd><a href="vip_nlist.php">更多>></a></dd></dl>
                            </div>
                            <div class="vip_box_right_b_list01_text">
<?php
$sql="select * from vip_news order by news_id desc limit 0,5";
$rs=$dblink->findAll("vip_news",array(),"","","0,5","news_id desc");
foreach ($rs as $row){?>
<dl><dt>·<a href="vip_nedit.php?nid=<?php echo $row["news_id"];?>" ><?php echo utf_substr($row["news_title"],80);?></a></dt><dd>2011-09-06</dd></dl>
<?php }?>
                </div>
                        </div>
                        <div class="vip_box_right_b_list01">
                        	<div class="vip_box_right_b_list01_title">
                            	<dl><dt>推荐院校</dt><dd><a href="#">更多>></a></dd></dl>
                            </div>
<div class="vip_box_right_b_list01_pic">
<?php
$sql="select * from mb_step where mb_tj=1 limit 0,3";
$rs=mysql_query($sql);
$coun=mysql_num_rows($rs);
if ($coun>=1){
$i=0;
while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){						
$i=$i+1;
?>
                
<dl>
<dt>
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td align="center" valign="middle">
<a href="../school/?sid=<?php echo $row["mb_id"];?>" target="_blank"><img src="../admin_root/<?php echo $row["mb_logo"];?>" width="97" height="86" onLoad="javascript:if(this.width>=this.height&&this.width>=97){this.width=97};if(this.height>this.width&&this.height>=86){this.height=86};"/></a>
</td>
</tr>
</table>
                            
                                </dt>
                                <dd><a href="../school/?sid=<?php echo $row["mb_id"];?>" target="_blank"><?php echo utf_substr($row["s_name"],14);?></a></dd>
                                </dl>
<?php
}}
?>
                           </div>
                        </div>
                        <div class="vip_box_right_b_list01_d">
                        	<div class="vip_box_right_b_list01_title_d">
                            	<dl><dt>培训课程</dt><dd><a href="#">更多>></a></dd></dl>
                            </div>
                            <div class="vip_box_right_b_list01_text_d">
<div class="zx_qr_02_left_list">
<div class="zx_qr_02_left_list_01_003">
<dl>
<dt>班级名称</dt>
<dd>开课日期</dd>
<dd style="width:95px;">上课地点</dd>
<dd>原价</dd>
<dd>网上优惠</dd>
</dl>
</div>
<div id="Marquee" class="zx_qr_02_left_list_02_004">
<dl>
<dt><span>[<a href="#">财务管理</a>]<a href="#">2010年专升本B1002(应试技巧班)-高数</a></span></dt>
<dd>预约开班</dd>
<dd style="width:95px;">上海市虹口区西体育会路369号</dd>
<dd style="text-decoration:line-through;">￥310</dd>
<dd><span>￥300</span></dd>
<dd><span><a href="#">报名</a></span></dd>
</dl>
<dl>
<dt><span>[<a href="#">财务管理</a>]<a href="#">2010年专升本B1002(应试技巧班)-高数</a></span></dt>
<dd>预约开班</dd>
<dd style="width:95px;">上海市虹口区西体育会路369号</dd>
<dd ste="text-decoration:line-through;">￥310</dd>
<dd><spayln>￥300</span></dd>
<dd><span><a href="#">报名</a></span></dd>
</dl>
<dl>
<dt><span>[<a href="#">财务管理</a>]<a href="#">2010年专升本B1002(应试技巧班)-高数</a></span></dt>
<dd>预约开班</dd>
<dd style="width:95px;">上海市虹口区西体育会路369号</dd>
<dd style="text-decoration:line-through;">￥310</dd>
<dd><span>￥300</span></dd>
<dd><span><a href="#">报名</a></span></dd>
</dl>
<dl>
<dt><span>[<a href="#">财务管理</a>]<a href="#">2010年专升本B1002(应试技巧班)-高数</a></span></dt>
<dd>预约开班</dd>
<dd style="width:95px;">上海市虹口区西体育会路369号</dd>
<dd style="text-decoration:line-through;">￥310</dd>
<dd><span>￥300</span></dd>
<dd><span><a href="#">报名</a></span></dd>
</dl>
<dl>
<dt><span>[<a href="#">财务管理</a>]<a href="#">2010年专升本B1002(应试技巧班)-高数</a></span></dt>
<dd>预约开班</dd>
<dd style="width:95px;">上海市虹口区西体育会路369号</dd>
<dd style="text-decoration:line-through;">￥310</dd>
<dd><span>￥300</span></dd>
<dd><span><a href="#">报名</a></span></dd>
</dl>
<dl>
<dt><span>[<a href="#">财务管理</a>]<a href="#">2010年专升本B1002(应试技巧班)-高数</a></span></dt>
<dd>预约开班</dd>
<dd style="width:95px;">上海市虹口区西体育会路369号</dd>
<dd style="text-decoration:line-through;">￥310</dd>
<dd><span>￥300</span></dd>
<dd><span><a href="#">报名</a></span></dd>
</dl>
</div>
</div>
</div>
                        </div>
                    </div>   
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