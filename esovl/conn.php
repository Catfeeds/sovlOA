<?php
include_once("web_start.php");
@session_start();
include("function.php");//���ú���ҳ
/**
* FILE_NAME:conn.php 
* ���ݿ�����
* concat('',id)  ������������������ƴ��һ�������ַ��� ģ����ѯIDʱ����
* @copyright Copyright (c) 2010-2015  www.phpwebgo.com
* @author  phpwebgo@gmail.com
* @package core
* @version 2010-7-31  ����02:36:58
*/
 $conn=mysql_connect("10.172.46.114","esovl","Esovl2012") or die("���ݿ���������Ӵ���".mysql_error());
 mysql_select_db("esovldata",$conn) or die("���ݿ���ʴ���".mysql_error());
 mysql_query("set names 'utf8'");
 date_default_timezone_set("Asia/Shanghai");//����ʱ�����8Сʱʱ���
 date_default_timezone_set('PRC'); 
 ?> 