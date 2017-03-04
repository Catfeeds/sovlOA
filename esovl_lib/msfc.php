<?php
include_once("conn.php");

?>
<?php
ob_start();//COOK值前荩妫?
			//mysql_query("update teacher set nclick=nclick+1 where t_id=".$_GET["id"],$conn);//
			$sql="select * from teacher where t_id=".$_GET["id"];
			$rs=mysql_query($sql);
			$coun=mysql_num_rows($rs);
			if ($coun>=1){
			$row=mysql_fetch_array($rs,MYSQL_ASSOC);
			$t_id=$row["t_id"];
			$t_name=$row["t_name"];
			$t_jg=$row["t_jg"];
			$t_pic=$row["t_pic"];
			$t_fzkc=$row["t_fzkc"];
			$t_con=$row["t_con"];
			$t_info=$row["t_info"];
			$t_bool=$row["t_bool"];
			$t_date=$row["t_date"];
	
			}else{
			exit("圆没业息");
			}
			mysql_free_result($rs);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
<?php 
if (strpos(@$_COOKIE["kof"],$_GET["id"])<1){
setcookie("kof",@$_COOKIE["kof"].",".$_GET["id"]);
}
$count_id=@$_COOKIE["kof"];//娲OOKie值
ob_end_flush()
?>
<!-- main -->
<div class="main">
	
    <div class="main_msfc">
    	<div class="main_msfc_left">
        	<div class="main_msfc_left_box01">
            	<div class="main_msfc_left_box01_title"><span>教师介绍</span></div>
                <div class="main_msfc_left_box01_list">
                	<div class="main_msfc_left_box01_list_box">
                        <div class="main_msfc_left_box01_list_box01">
                        	<div class="main_msfc_left_box01_list_box01_pic00">
                            	<div class="main_msfc_left_box01_list_box01_pic">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td align="center" valign="middle"><img src="admin_root/<?php echo $t_pic;?>" border="0" align="top" /></td>
</tr>
</table> 
                                </div>
                                <h1><?php echo $t_name;?></h1>
                            </div>
                            <div class="main_msfc_left_box01_list_box01_text">
                            	<dl>
                                <dt>所属机构</dt>
                                <dd><?php echo $t_jg;?></dd>
                                </dl>
                                <dl>
                                <dt>所授课程</dt>
                                <dd><?php echo $t_fzkc;?></dd>
                                </dl>
                                <dl>
                                <dt>机构介绍</dt>
                                <dd><?php echo $t_con;?></dd>
                                </dl>
                            </div>
                        </div>
                        <div class="main_msfc_left_box01_list_box02">
                        	<div class="main_msfc_left_box01_list_box02_title"><?php echo $t_name;?>师诘目纬息</div>
                            <!--<div class="main_msfc_left_box01_list_box02_text">
                            	<ul>
                                <li><a href="#">2010驶舜实窬5530027030</a></li>
                                <li><a href="#">2010驶舜实窬5530027030</a></li>
                                <li><a href="#">2010驶舜实窬5530027030</a></li>
                                <li><a href="#">2010驶舜实窬5530027030</a></li>
                                </ul>
                            </div>-->
                            <div class="main_msfc_left_box01_list_box02_text"><?php echo $t_info;?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main_msfc_right">
        	<div class="main_msfc_right_box01">
            	<div class="main_msfc_right_box01_title">所有教师</div>
                <div class="main_msfc_right_box01_list">
                	<ul>
					<?php
						$sql="select * from teacher where t_bool=1 ";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
						?>
                    <li><img src="images/dot_msfc.jpg" /><a href="msfc.php?id=<?php echo $row["t_id"];?>"><?php echo $row["t_name"];?></a></li>
                    <?php
						}}
						?>
                    </ul>
                </div>
            </div>
            <div class="main_msfc_right_box01">
            	<div class="main_msfc_right_box01_title">浏览过的教师</div>
                <div class="main_msfc_right_box01_list">
                	<ul>
					<?php
					if(isset($_COOKIE["kof"])){
					$count_id=substr($count_id,1);
						$sql="select * from teacher where t_id in (".$count_id.")";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_assoc($rs)){
						?>
                    <li><img src="images/dot_msfc.jpg" /><a href="msfc.php?id=<?php echo $row["t_id"];?>"><?php echo $row["t_name"];?></a></li>
                   <?php }}}?>
                    </ul>
                </div>
            </div
            
        ></div>
    </div>
    
</div>
<!-- main End -->

<!-- bottom -->
<?php include("bottom/bottom.html");?>
<!-- bottom End -->

</div>

</body>
</html>
