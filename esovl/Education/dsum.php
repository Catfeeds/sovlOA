<?php 
include_once("../conn.php");
mysql_query("update xl_ask set w_click=w_click+1 where w_id=".$_GET["id"],$conn);//更新浏览次数
$rs=mysql_query("select * from  xl_ask where w_id=".$_GET["id"],$conn);

$row=mysql_fetch_array($rs,MYSQL_ASSOC);
echo $row["w_click"];
?>