<?php
@session_start();
include("function.php");//公用函数页
/**
* FILE_NAME:conn.php 
* 数据库连接
* concat('',id)  本函数将是两个参数拼到一起，生成字符串 模糊查询ID时候用
* @copyright Copyright (c) 2010-2015  www.phpwebgo.com
* @author  phpwebgo@gmail.com
* @package core
* @version 2010-7-31  下午02:36:58
*/
 $conn=mysql_connect("esovldata.db.6968333.hostedresource.com","esovldata","Admin123456") or die("数据库服务器连接错误".mysql_error());
 mysql_select_db("esovldata",$conn) or die("数据库访问错误".mysql_error());
 mysql_query("set names 'utf8'");
 date_default_timezone_set("Asia/Shanghai");//设置时区解决8小时时间差
 date_default_timezone_set('PRC');
 
 function utf_substr($str,$len)
{
	$str=strip_tags($str);
for($i=0;$i<$len;$i++)
{
$temp_str=substr($str,0,1);
if(ord($temp_str) > 127)
{
$i++;
if($i<$len)
{
$new_str[]=substr($str,0,3);
$str=substr($str,3);
}
}
else
{
$new_str[]=substr($str,0,1);
$str=substr($str,1);
}
}
return join($new_str);
}
 ?> 