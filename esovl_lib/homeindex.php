<?php  
include_once("conn.php");

include_once("web_start.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $z_title?></title>
<meta name="keywords" content="<?php echo $z_keyword?>" />
<meta name="description" content="<?php echo $z_contant?>" />
<meta name="wumiiVerification" content="b7ec76bc-ed23-48b6-8988-676cdae5a3fa" />
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/top.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/bottom.css" rel="stylesheet" type="text/css" />
<script src="stHttp.js"></script>
<script src="js/style.js"></script>
<!--[if lte IE 6]>
<script src="js/ie6png.js"></script>
<![endif]-->
</head>
<body>
<div class="wrapper" id="body1">
<!--搜索下拉框隐藏-->
<div class="top">
<?php 
include("top/top_1.html");
include("top/index_top1.html");
?>
</div>
<!-- main -->
<div class="main">
	<div class="main_box01">
    	<div class="main_box01_left">
        	<div class="main_box01_left_01"><img src="images/tel.jpg" /></div>
            <div class="main_box01_left_02"><a href="javascript:void(null);"><img src="images/wlxy.jpg" /></a></div>
        </div>
        <div class="main_box01_center"><div class="main_box01_center_flash"><?php include("Switch_pic.html");?></div></div>
        <div class="main_box01_right">
        	<div class="main_box01_right_01">
            	<ul>
<li><a href=tencent://message/?uin=<?php echo $qq1;?>&Site=<?php echo $z_name;?>&Menu=yes title="在线咨询1"><img border="0" src=http://wpa.qq.com/pa?p=1:<?php echo $qq1;?>:1 align="top"/></a></li>
<li><a href=tencent://message/?uin=<?php echo $qq2;?>&Site=<?php echo $z_name;?>&Menu=yes title="在线咨询2"><img border="0" src=http://wpa.qq.com/pa?p=1:<?php echo $qq2;?>:1 align="top"/></a></li>
                </ul>
            </div>
            <div class="main_box01_right_02">
            	<div class="main_box01_right_02_box">
                	<div class="main_box01_right_02_box01"><img src="images/yxdt.jpg" width="171" height="35" /></div>
                    <div class="main_box01_right_02_box02">
                    	<ul>
<?php
$sql="select * from nnews where nbool=1 order by ndate desc limit 5";
$rs=mysql_query($sql);
if (mysql_num_rows($rs)>=1){
$i=0;
while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){						
$i=$i+1;
?>
<li>
<span><?=$i?>.</span>
<a href="news_detail.php?id=<?php echo $row["nid"];?>" title="<?php echo $row["ntitle"];?>"><?php echo $row["ntitle"];?></a>
</li>
<?php }}mysql_free_result($rs);?>
                        </ul>
</div>
                    <div class="main_box01_right_02_box03"><img src="images/yxdt_bottom.jpg" width="171" height="10" /></div>
                </div>
            </div>
        </div>
    </div>
    <div class="main_box02">
    	<div class="main_box02_00">
        	<div class="main_box02_00_left">名校直达</div>
            <div class="main_box02_00_right">
<?php
$sql="select * from mb_step where mb_tj=1 limit 10";
$rs=mysql_query($sql);
$coun=mysql_num_rows($rs);
if ($coun>=1){
$i=0;
while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){						
$i=$i+1;?>
<a href="school/?sid=<?php echo $row["mb_id"];?>" target="_blank"><?php echo $row["s_name"];?></a>
<?php
if ($i!=$coun){echo"<span>|</span>";}}}
mysql_free_result($rs);
?>         
            </div>
        </div> 
    </div>
    <div class="main_box03">
    	<div class="main_box03_left">
        	<div class="main_box03_left_title">
            <span>提供<strong>215</strong>家知名培训机构，<strong>8256</strong>门培训课程的咨询报名服务</span>
            </div>
        	<div class="main_box03_left_list">
<?php
			    $sql="select * from kcbname limit 6";
				$rs=mysql_query($sql);
				if (mysql_num_rows($rs)>=1){
				while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
?>
        	  <div class="main_box03_left_list00">
<table width="100%" height="100%" border="1" cellspacing="0" cellpadding="0" onmouseout="this.style.border='1px solid #f4f4f4';this.style.background='#fff'" onmousemove="this.style.border='1px solid #7cc0e3';this.style.background='#f4f8fb'">
  <tr>
    <td width="40" height="97" align="center" valign="middle" bgcolor="#f5f5f5"><h1><?php echo $row["kc_bname"]?></h1></td>
    <td style="padding:10px;;">
<?php
				$sq="select * from kcsname where kcbid=".$row["kc_id"];
				$rs1=mysql_query($sq);
				if (mysql_num_rows($rs1)>=1){
					while ($rw=mysql_fetch_array($rs1,MYSQL_ASSOC)){
?>
<a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/<?php echo $rw["kc_http"]?>" target="_blank"><?php echo $rw["kc_sname"]?></a>
<?php }}mysql_free_result($rs1);?>
    </td>
  </tr>
</table>
</div>
<?php
}}mysql_free_result($rs);
?>              
          </div>
            <div class="main_box03_left_more">
            	<div class="main_box03_left_more_ck"><a href="#">查看所有分类↑</a></div> 
            </div>
        </div>
        <div class="main_box03_right">
        	<div class="main_box03_right_title">
            	<div class="main_box03_right_title_name">考试日历</div>
                <div class="main_box03_right_title_more"><a href="ksrl.php">更多>></a></div>
            </div>
            <div class="main_box03_right_list">
            	<div class="main_box03_right_list_01">
                	<dl>
                    <dt>考试名称</dt>
                    <dt>开考时间</dt>
                    <dt>考试辅导</dt>
                    </dl>
                </div>
				<div class="main_box03_right_list_02" id="mq" onmouseout="document.getElementsByTagName('main_box03_right_list_02').idName = 'mq';" onmouseover="document.getElementsByTagName('main_box03_right_list_02').idName = '';">
<?php
				$sql="select * from excal limit 9";
				$rs=mysql_query($sql);
				if (mysql_num_rows($rs)>=1){
					while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
?>
                    <dl>
                    <dt><a href="ksrl_detail.php?id=<?php echo $row["ex_id"]?>" title="<?php echo $row["ex_title"]?>"><?php echo $row["ex_title"]?></a></dt>
                    <dt><?php echo $row["ex_bmtime"]?></dt>
                    <dt>课程辅导</dt>
                    </dl>                   
                    <?php }}mysql_free_result($rs);?>
                </div>
				<script src="js/gund.js"></script>
            </div>
        </div>
</div>
    <div class="main_box04">
    	<div class="main_box04_title">
        	<div class="main_box04_title_left">一休带你逛</div>
            <div class="main_box04_title_right">
            	<dl>
                <dt><img src="images/dng_left.jpg" width="6" height="30" /></dt>
<dd>
<?php
						$sql="select * from mxtj where mx_class='一休带你逛' and mx_bool=1 limit 10";
                        $rs=mysql_query($sql);
						$coun=mysql_num_rows($rs);
						if ($coun>=1){
	                    $i=0;
						while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
						$i=$i+1;
						if ($i==$coun){
						?>
						<a href="<?php echo $row["mx_link"]?>" target="_blank"><?php echo $row["mx_title"]?></a>
						<?php
						}else{
						?>
                        <a href="<?php echo $row["mx_link"]?>" target="_blank"><?php echo $row["mx_title"]?></a><span>|</span>
						<?php 
						}}}
						mysql_free_result($rs);
						?>
                </dd>
                <dt><img src="images/dng_right.jpg" width="6" height="30" /></dt>
                </dl>
            </div>
        </div>
        <div class="main_box04_box">
        	<div class="main_box04_box_left">
            	<div class="main_box04_box_left_box01">
                	<div class="main_box04_box_left_box01_list">
                    	<div class="main_box04_box_left_box01_list_pic00" onmouseover="this.style.border='1px solid #ff5714'" onmouseout="this.style.border='1px solid #ced0c5'">
                        	<div class="main_box04_box_left_box01_list_pic">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td align="center" valign="middle">
<?php
$sql="select * from ennews where npic!='0' order by nid desc";
		$rs=mysql_query($sql,$conn);
		if (mysql_num_rows($rs)>=1){	
		    $row=mysql_fetch_assoc($rs);
			$nid=$row["nid"];
			$ntitle=$row["ntitle"];
			$ncon=$row["ncon"];
			$npic=$row["npic"];
}?>
<a href="Training/px_news_list_details.php?id=<?php echo $row["nid"];?>">
<img src="../admin_root/<?php echo $npic;?>" onLoad="javascript:if(this.width>=this.height&&this.width>=88){this.width=88};if(this.height>this.width&&this.height>=98){this.height=98};" 
 border="0" align="top" />
</a>
</td>
</tr>
</table>
                       </div>
                        </div>
                        <div class="main_box04_box_left_box01_list_text">
<?php
$sql="select * from ennews";
		$rs=mysql_query($sql,$conn);
		if (mysql_num_rows($rs)>=1){
		    $row=mysql_fetch_assoc($rs);
			$ntitle=$row["ntitle"];
			$ncon=$row["ncon"];
}?>
                        	<dl>
                            <dt><span>■</span><a href="Training/px_news_list_details.php?id=<?php echo $row["nid"];?>"><?php echo utf_substr($ntitle,28);?></a></dt>
                            <dd><?php echo utf_substr($ncon,76);?></dd>
                            </dl>
                            <h1>
<?php
$sql="select * from pxsclass order by ps_id desc limit 0,6";
$rs=mysql_query($sql);
if (mysql_num_rows($rs)>=1){
while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
?>
[<a href="Training/px_kc_list.php?pid=<?php echo $row["pb_id"];?>"><?php echo $row["ps_title"];?></a>]<span></span>
<?php }}?>
                            </h1>
                        </div>
                    </div>
                    <div class="main_box04_box_left_box01_list">
                    	<div class="main_box04_box_left_box01_list_pic00" onmouseover="this.style.border='1px solid #ff5714'" onmouseout="this.style.border='1px solid #ced0c5'">
                        	<div class="main_box04_box_left_box01_list_pic">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td align="center" valign="middle">
<?php
$sql="select * from yx_news where npic!='0' order by news_id desc";
		$rs=mysql_query($sql,$conn);
		if (mysql_num_rows($rs)>=1){	
		    $row=mysql_fetch_assoc($rs);
			$news_id=$row["news_id"];
			$npic=$row["npic"];
}?>
<a href="Research/re_news_show.php?id=<? echo $row["news_id"];?>"><img src="../admin_root/<?php echo $npic;?>"  onLoad="javascript:if(this.width>=this.height&&this.width>=88){this.width=88};if(this.height>this.width&&this.height>=98){this.height=98};"
 border="0" align="top" /></a>
</td>
</tr>
</table>
                        </div>
                        </div>
                        <div class="main_box04_box_left_box01_list_text">
<?php
$sql="select * from yx_news order by news_id desc";
		$rs=mysql_query($sql,$conn);
		if (mysql_num_rows($rs)>=1){	
		    $row=mysql_fetch_assoc($rs);
			$news_title=$row["news_title"];
			$news_con=$row["news_con"];
}?>
                            <dl>
                            <dt><span>■</span><a href="Research/re_news_show.php?id=<? echo $row["news_id"];?>"><?php echo utf_substr($news_title	,28);?></a></dt>
                            <dd><?php echo utf_substr($news_con,72);?>...</dd>
                            </dl>
                            <h1>
                            <ul>
<?php
$sql="select * from yx_kaike order by yxk_id desc limit 0,2";
$rs=mysql_query($sql);
if (mysql_num_rows($rs)>=1){
while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
?>
<li>[<?php echo $row["yxk_cl"];?>] <a href="Research/yxschool.php?id=<?php echo $row["yxk_id"];?>"><?php echo utf_substr($row["yxk_title"],32);?></a><span></span></li>
<?php }}?>                </ul>
                          </h1>
                    </div>
                    </div>
                    <div class="main_box04_box_left_box01_list">
                    	<div class="main_box04_box_left_box01_list_pic00" onmouseover="this.style.border='1px solid #ff5714'" onmouseout="this.style.border='1px solid #ced0c5'">
                        	<div class="main_box04_box_left_box01_list_pic">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td align="center" valign="middle">
<?php
$sql="select * from qp_news where npic!='0' order by news_id desc";
		$rs=mysql_query($sql,$conn);
		if (mysql_num_rows($rs)>=1){	
		    $row=mysql_fetch_assoc($rs);
			$news_id=$row["news_id"];
			$npic=$row["npic"];
}?>
<a href="Enterprise/qp_new_detial.php?cl=<?php echo $row["news_id"];?>"><img src="../admin_root/<?php echo $npic;?>"  onLoad="javascript:if(this.width>=this.height&&this.width>=88){this.width=88};if(this.height>this.width&&this.height>=98){this.height=98};" 
 border="0" align="top" /></a>
</td>
</tr>
</table>
</div>
</div>
<div class="main_box04_box_left_box01_list_text">
<dl>
<?php
$sql="select * from qp_news order by news_id desc";
		$rs=mysql_query($sql,$conn);
		if (mysql_num_rows($rs)>=1){	
		    $row=mysql_fetch_assoc($rs);
			$news_title=$row["news_title"];
			$news_con=$row["news_con"];
}?>
                            <dt><span>■</span><a href="Enterprise/qp_new_detial.php?cl=<?php echo $row["news_id"];?>"><?php echo utf_substr($news_title	,28);?></a></dt>
                            <dd><?php echo utf_substr($news_con,72);?>...</dd>
                            </dl>
                            <h1>
                           	<ul>
<?php
$sql="select * from qp_kaike_class order by kk_id desc limit 0,2";
$rs=mysql_query($sql);
if (mysql_num_rows($rs)>=1){
while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
?>
<li>[<?php echo $row["kk_title"];?>]<a href="Enterprise/qp_course_detial.php?cl=<?php echo $row["kk_id"];?>"><?php echo utf_substr($row["kk_kcts"],20);?></a><span></span></li>
<?php }}?>
                            </ul>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="main_box04_box_left_box02">
                	
                    <div class="main_box04_box_left_box01_list_left">
                    	<div class="main_box04_box_left_box02_list_pic00" onmouseover="this.style.border='1px solid #ff5714'" onmouseout="this.style.border='1px solid #ced0c5'" >
                        	<div class="main_box04_box_left_box02_list_pic">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td align="center" valign="middle">
<?php
$sql="select * from lxnews where lx_npic!='0' order by lx_nid desc";
		$rs=mysql_query($sql,$conn);
		if (mysql_num_rows($rs)>=1){	
		    $row=mysql_fetch_assoc($rs);
			$lx_nid=$row["lx_nid"];
			$lx_npic=$row["lx_npic"];
}?>
<a href="Abroad/lx_news_detail.php?id=<?php echo $row["lx_nid"];?>"><img src="../admin_root/<?php echo $lx_npic;?>" onLoad="javascript:if(this.width>=this.height&&this.width>=135){this.width=135};if(this.height>this.width&&this.height>=100){this.height=100};" 
 border="0" align="top" /></a>
</td>
</tr>
</table>                            
                            </div>
                        </div>
                        <div class="main_box04_box_left_box02_list_text">
<ul>
<?php
$sql="select * from lxnews order by lx_nid desc limit 1,5";
$rs=mysql_query($sql);
if (mysql_num_rows($rs)>=1){
while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
?>
<li><a href="Abroad/lx_news_detail.php?id=<?php echo $row["lx_nid"];?>"><?php echo utf_substr($row["lx_ntitle"],30);?></a></li>
<?php }}?>
                            </ul>
                        </div>
                    </div>
                    <div class="main_box04_box_left_box01_list_left">
                    	<div class="main_box04_box_left_box02_list_pic00" onmouseover="this.style.border='1px solid #ff5714'" onmouseout="this.style.border='1px solid #ced0c5'" >
                        	<div class="main_box04_box_left_box02_list_pic">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td align="center" valign="middle">
<?php
$sql="select * from kkinfo where k_pic!='0' order by kid desc";
$rs=mysql_query($sql);
if (mysql_num_rows($rs)>=1){
while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
?>
<a href="Education/xl_pro_detail.php?kid=<?php echo $row["kid"];?>"><img src="../admin_root/<?php echo $row["k_pic"];?>" onLoad="javascript:if(this.width>=this.height&&this.width>=135){this.width=135};if(this.height>this.width&&this.height>=100){this.height=100};" 
 border="0" align="top" /></a>
 <?php }}?>
</td>
</tr>
</table>                            
</div>
                        </div>
                        <div class="main_box04_box_left_box02_list_text">
                        	<ul>
<?php
$sql="select * from kkinfo order by kid desc limit 0,5";
$rs=mysql_query($sql);
if (mysql_num_rows($rs)>=1){
while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
?>
                            <li><span>[<?php echo $row["zyclass"];?>]</span><a href="Education/xl_pro_detail.php?kid=<?=$row["kid"]?>&sid=<?=$row["s_id"]?>"><?php echo utf_substr($row["ktitle"],20);?></a></li>
<?php }}?>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="main_box04_box_left_box01_list_left">
                        <div class="main_box04_box_left_box01_list_left_box">
                        <div class="main_box04_box_left_box01_list_left_box_02">
                            	<dl id="gtb_" class="gtb_">
<?php
$sql="select * from pxsclass order by ps_id desc limit 0,5";
$rs=mysql_query($sql);
if (mysql_num_rows($rs)>=1){
$k=0;
$str="";
while ($row1=mysql_fetch_array($rs,MYSQL_ASSOC)){
$k=$k+1;
$str=$str.",".$row1["ps_id"];
//echo $str."<br>";
?>
<dd id="gtb_<?=$k?>" <?php if($k==1){echo"class='ghovertab'";}else{echo"class='gnormaltab'";}?> onmouseover="gHoverLi(<?=$k?>);"><a href="Training/px_kc_list.php?pid=<?php echo $row1["ps_id"];?>"><?php echo utf_substr($row1["ps_title"],4);?></a></dd>
<?php }}?>
</dl>
</div>
<?php
$arr=explode(",", $str);
//print_r($arr);
for($i=1;$i<=5;$i++){
$sql="select * from pxkkinfo where pxk_cl=".$arr[$i]." order by pxk_id desc limit 0,5";
//echo "$sql";
$rs=mysql_query($sql);
if (mysql_num_rows($rs)>=1){
$k=0;
while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
$k=$k+1;
?>
                        <div <?php if($k==1){echo"class='gdis'";}else{echo"class='gundis'";}?> id="gtbc_0<?=$i?>">
                        	<div class="main_box04_box_left_box01_list_left_box_01">
                            	<div class="main_box04_box_left_box01_list_left_box_01_pic">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td align="center" valign="middle">
<a href="Training/px_kc_list_details.php?id=<?php echo $row["pxk_id"];?>"><img src="../admin_root/<?php echo $row["pxk_pic"];?>" border="0" align="top" onLoad="javascript:if(this.width>=this.height&&this.width>=135){this.width=135};if(this.height>this.width&&this.height>=100){this.height=100};"/></a>
</td>
</tr>
</table>                                
                                </div>
                                <div class="main_box04_box_left_box01_list_left_box_01_list">
<dl>
                                    <dt><a href="Training/px_kc_list_details.php?id=<?php echo $row["pxk_id"];?>"><?=$row["pxk_title"]?></a></dt>
                                    <dd>开班时间：<?php echo $row["pxk_time"];?><br />
                                    报名费用<span>￥:<?php echo $row["pxk_xfei"];?>(元)</span></dd>
</dl>
                                    <div class="anniu00"><a href="Training/px_school/baoming.php?pid=<?=$row["pxk_sid"]?>">我要报名</a></div>
                                </div>
                            </div>
                        </div>
<?php }}}?>
                        </div>

                    </div>
                </div>
            </div>
            <div class="main_box04_box_right">
            	<div class="main_box04_box_right_title">
                	<dl id="b1">
                    <dt onmouseover="openbox_tj_01_01();o_01_01();">本月推荐</dt>
                    <dd onmouseover="openbox_tj_01_02();o_01_02();">热门课程</dd>
                    </dl>
                    <dl id="r1" style="display:none;">
                    <dd onmouseover="openbox_tj_01_01();o_01_01();">本月推荐</dd>
                    <dt onmouseover="openbox_tj_01_02();o_01_02();">热门课程</dt>
                    </dl>
                </div>
                <div class="main_box04_box_right_list" id="brtj">
                  <div class="main_box04_box_right_list01">
<?php
						$sql="select * from mb_step where mb_tj=1 limit 2";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
						while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
?>
                    <div class="main_box04_box_right_list01_js">
                      <div class="main_box04_box_right_list01_js_pic00">
                        <div class="main_box04_box_right_list01_js_pic">
                          <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
                            <tr>
                              <td align="center" valign="middle"><a href="school/?sid=<?php echo $row["mb_id"];?>" target="_blank"><img src="admin_root/<?php echo $row["mb_logo"]?>" border="0" align="top" onload="javascript:ResizePic(this,88,78)" /></a> </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                      <dl>
                        <dt>
                        <a href="school/?sid=<?php echo $row["mb_id"]?>" target="_blank"><?php echo $row["s_name"];?></a>
                        </dt>
                      </dl>
                    </div>
                    <?php }}?>
                  </div>
<div class="main_box04_box_right_list02">
<?php
$sql="select * from mb_step where mb_tj<>1 limit 5";
$rs=mysql_query($sql);
if (mysql_num_rows($rs)>=1){
while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
?>
                    	<dl>
                        <dt><img src="images/dot.jpg" width="4" height="7" /></dt>
                   	    <dd><a href="school/?sid=<?php echo $row["mb_id"]?>" target="_blank"><?php echo $row["s_name"]?></a></dd>
                        </dl>                       
<?php }}?>
                  </div>
              </div>
                <div class="main_box04_box_right_list" id="rmkc" style="display:none;">
                	<div class="main_box04_box_right_list01">
<?php
						$sql="select * from teacher where t_bool=1 limit 2";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
						while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
?>
                        <div class="main_box04_box_right_list01_js">
                        	<div class="main_box04_box_right_list01_js_pic00">
                            	<div class="main_box04_box_right_list01_js_pic">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td align="center" valign="middle">
<a href="msfc.php?id=<?php echo $row["t_id"]?>"><img src="admin_root/<?php echo $row["t_pic"]?>" border="0" align="top" onload="javascript:ResizePic(this,88,78)"></a>
</td>
</tr>
</table>                                 
</div>
</div>
                            <dl>
                            <dt><a href="msfc.php?id=<?php echo $row["t_id"]?>">
							<?php echo $row["t_name"]?></a></dt>
                            <dd><?php echo $row["t_fzkc"]?></dd>
                            </dl>
                        </div>
<?php
}}
?>
                    </div>
                    <div class="main_box04_box_right_list02">
<?php
						$sql="select * from tjbiao where tj_bool=1 limit 5";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
						while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
?>	
                    	<dl>
                        <dt><img src="images/dot.jpg" width="4" height="7" /></dt>
                   	    <dd><a href="kc_detail.php?id=<?php echo $row["tj_id"]?>"><?php echo $row["tj_title"]?></a></dd>
                        </dl>
                        <?php }}?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main_box05">
    	<div class="main_box05_title">
        	<div class="main_box05_title_01">热门推荐</div>
            <div class="main_box05_title_02">
            	<ul>
<?php
$sql="select * from mxtj where mx_class='热门推荐' and mx_bool=1 limit 10";
$rs=mysql_query($sql);
$coun=mysql_num_rows($rs);
if ($coun>=1){
$i=0;
while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
$i=$i+1;
if ($i==$coun){
?>						
<li>
<a href="<?php echo $row["mx_link"]?>" target="_blank"><?php echo $row["mx_title"]?></a>
</li>
<?php					}else{
						?>
                        <li><a href="<?php echo $row["mx_link"]?>" target="_blank"><?php echo $row["mx_title"]?></a><span>|</span></li>
<?php }}}
mysql_free_result($rs);
?>
                </ul>
            </div>
            <div class="main_box05_title_03"> .</div>
        </div>	
        <div class="main_box05_list">
<?php
						$sql="select * from guanggao limit 12";
                        $rs=mysql_query($sql);
						$coun=mysql_num_rows($rs);
						if ($coun>=1){
	                    $i=0;
						while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){						
						$i=$i+1;
?>		 	
        	<div class="main_box05_list00">
            <div class="main_box05_list00_pic">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td align="center" valign="middle">
<a href="<?php echo $row["g_website"]?>" target="_blank">
<img src="admin_root/<?php echo $row["g_pic"]?>" border="0" align="top" onload="javascript:ResizePic(this,116,116)"/>
</a>
</td>
</tr>
</table>                 
</div>
<h1>
<a href="#"><?php echo $row["g_name"]?></a>
</h1>
</div>
<?php 
}}
mysql_free_result($rs);
?>
</div>
    </div>
      <div class="main_box06">
          <div class="main_box06_top"><img src="images/bottom_bg_top.jpg" /></div>
          <div class="main_box06_cen">
              <div class="main_box06_cen_list">
                  <dl>
                  <dt>如何报名</dt>
                  <dd><a href="#">如何报名</a></dd>
                <dd><a href="#">网上报名</a></dd>
                <dd><a href="#">电话报名</a></dd>
                <dd><a href="#">报名步骤</a></dd>
                </dl>
            </div>
            <div class="main_box06_cen_list">
            	<dl>
                <dt>售后服务</dt>
                <dd><a href="#">退课说明</a></dd>
                <dd><a href="#">换课手续</a></dd>
                </dl>
            </div>
            <div class="main_box06_cen_list">
            	<dl>
                <dt>支付方式</dt>
                <dd><a href="#">现金/银行卡支付</a></dd>
                <dd><a href="#">第三方网上支付</a></dd>	
                <dd><a href="#">如何使用储值账户</a></dd>
                </dl>
            </div>
            <div class="main_box06_cen_list">
            	<dl>
                <dt>我的订单</dt>
                <dd><a href="#">如何查询订单</a></dd>
                <dd><a href="#">订单状态</a></dd>
                <dd><a href="#">订单操作</a></dd>
                </dl> 
             </div>
            <div class="main_box06_cen_list">
            	<dl>
                <dt>会员中心</dt>
                <dd><a href="#">会员服务</a></dd>
                <dd><a href="#">积分说名</a></dd>
                <dd><a href="#">抵用券使用</a></dd>
                </dl> 
            </div>
            <div class="main_box06_cen_list">
            	<dl>
                <dt>帮助中心</dt>
                <dd><a href="#">找回密码</a></dd>
                <dd><a href="#">常见问题</a></dd>
                <dd><a href="#">建议意见</a></dd>
                </dl> 
            </div>       
        </div>
        <div class="main_box06_top"><img src="images/bottom_bg_bottom.jpg" /></div>
    </div>
</div>
<?php
//设置浏览COOKIE值
$_COOKIE["ca"]="";//浏览教师初始化
?>
<!--man end-->
<?php include("bottom/bottom.html");?>
</div>
</body>
</html>