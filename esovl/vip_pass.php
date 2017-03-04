<?php
include("conn.php");
$str=$_GET["user"];
if($str!=""){
$rs=mysql_query("select * from vip where v_pass ='".$str."'");
$num = mysql_num_rows($rs);
//sleep(5);
//echo $num;
	  if ($num>=1){
	  echo 1;
	  }else{
	  echo 0;
	  }
}
?>