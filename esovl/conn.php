<?php
include_once("web_start.php");
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
 $conn=mysql_connect("10.172.46.114","esovl","Esovl2012") or die("数据库服务器连接错误".mysql_error());
 mysql_select_db("esovldata",$conn) or die("数据库访问错误".mysql_error());
 mysql_query("set names 'utf8'");
 date_default_timezone_set("Asia/Shanghai");//设置时区解决8小时时间差
 date_default_timezone_set('PRC'); 
 ?> 