<?php
@ $db = new mysqli('localhost','root','123456','test_data');
	if (mysqli_connect_errno()) 
	{
	echo "error:不能连接数据库. 请重试。";
	exit;
	}
	$db -> set_charset('utf8');
?>