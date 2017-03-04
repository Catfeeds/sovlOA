<?php
error_reporting(0); 
$shou=$_GET['shou'];
//echo $shou;
if ($shou!=''){
header("Content-Type:text/XML; charset=utf-8");
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
echo "<data>";
include_once ("phpconn.php");
$web=$_SERVER["HTTP_USER_AGENT"]; 
if (strstr($web,"Firefox")){
$shou=iconv("utf-8","gb2312",$shou);
}
if (strstr($web,"GTB")){
	echo "<web>";
	echo "ie6";
	echo "</web>";
}
include_once("data_array.php");
foreach($field as $arr){
$query="select ".$arr[a]." from ".$arr[b]." where ".$arr[a]." like '%$shou%' limit 5";
$result=$db->query($query);

while($row=$result->fetch_assoc()){
	echo "<alltitle>";
	echo $row[$arr[a]];
	echo "</alltitle>";
}
}
/*$query="select ktitle from kkinfo where ktitle like '%$shou%'";
$result=$db->query($query);
while($row=$result->fetch_assoc()){
	echo "<alltitle>";
	echo $row['ktitle'];
	echo "</alltitle>";
}
*/
echo "</data>";
$db->close();
}
?>