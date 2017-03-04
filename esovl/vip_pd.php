<?php
include_once './config.inc.php';
include_once './uc_client/client.php';
if($_GET['type']=='uname'){
	if(uc_user_checkname($_GET['user'])>0){
		echo 0;
	}else{
		echo 1;
	}
}else if($_GET['type']=='email'){
	if(uc_user_checkemail($_GET['email'])>0){
		echo 0;
	}else{
		echo 1;
	}
}
exit;
//т╜охеп╤о
/*
include("conn.php");
$str=$_GET["user"];
if($str!=""){
$rs=mysql_query("select * from vip where v_name ='".$str."'");
$num = mysql_num_rows($rs);
//sleep(5);
//echo $num;
	  if ($num>=1){
	  echo 1;
	  }else{
	  echo 0;
	  }
}
*/
?>