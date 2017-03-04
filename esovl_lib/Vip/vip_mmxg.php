<?php 
include_once("../conn.php");
include_once("../webstep.php");
?>
<?php 
if($_SESSION["yes"]!=571){
	echo "<script>alert('您没有登录');location.href='../vip_login.php';</script>";
	}
?>
<?php
$v_id=$_GET["v_id"];
echo "$v_id";
     $sql="select * from vip where v_pass=".md5($_POST["v_pass"]);; 
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
?> 
