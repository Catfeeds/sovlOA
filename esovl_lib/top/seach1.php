<?php
error_reporting(0); 
$name=$_GET['name'];
if ($name!=''){
	$web=$_SERVER["HTTP_USER_AGENT"];
	if (strstr($web,"Firefox")){
		$name=iconv("gb2312","utf-8",$name);
	}	
header("Content-Type:text/XML;charset=gb2312");
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
include_once("phpconn.php");
echo "<data>";
include_once("data_array.php");
foreach($field as $arr){
static $a=1;
$query="select ".$arr[a].",".$arr[c]." from ".$arr[b]." where ".$arr[a]."='$name'";
$result=$db->query($query);
while ($row=$result->fetch_assoc()){
	echo "<mid>";
	echo $row[$arr[c]];
	echo "</mid>";
	echo "<type>";
	echo $a;	
	echo "</type>";
}
$a++;
}
echo "</data>";
}
?>