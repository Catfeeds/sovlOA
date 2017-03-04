<?php
/* 服务器配置*/
define('PIC_PATH',$_SERVER['DOCUMENT_ROOT']."/upload");//上传图片文件夹的物理路径
define('DOMAIN',"http://".$_SERVER["SERVER_NAME"]);//------服务器
define('DOCUMENTROOT',$_SERVER['DOCUMENT_ROOT']);//根目录
define('IMAGEPATH',$_SERVER['DOCUMENT_ROOT']."/admin_root/");//根目录
define('DEFAULTIMAGE','/images/defaultimage.gif');

define('UC_DBHOST', 'localhost');
define('UC_DBUSER', 'root');
define('UC_DBPW', '123456');
define('UC_DBNAME', 'ultrax');
define('UC_DBCHARSET', 'utf8');
define('UC_DBTABLEPRE', '`ultrax`.pre_ucenter_');
define('UC_DBCONNECT', '0');
define('UC_KEY', '123456');
define('UC_API', 'http://test.esovl.cc/bbs/uc_server');
define('UC_CHARSET', 'utf-8');
define('UC_IP', '');
define('UC_APPID', '2');
define('UC_PPP', '20');
?>