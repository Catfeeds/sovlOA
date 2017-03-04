<?php
session_start();
header('Content-type: text/html;charset=utf-8');
include_once("dbconfig.php");
include_once("Mysql.class.php");
include_once("Page.class.php");
include_once("CDbCriteria.php");
include_once('CommonS.php');
date_default_timezone_set("PRC");
$dblink=mysql::getInstance($config);
$Common=new CommonS();
$db=$dblink->getDb();
//得到各导航页的基础信息
function getWeb($id){
	global $dblink;
	$web_step=$dblink->find("web_step",array(),"z_id ='{$id}'");
	return($web_step);
}
function Userlogin(){
	if(isset($_COOKIE['uid'])&&$_COOKIE['uid']){
		global $dblink;
		$user=$dblink->find("vip",array(),"v_ucid='{$_COOKIE['uid']}'");
		if($user){
			return $user;
		}
	}
		return false;
	
}
$web_step=$dblink->find("web_step",array(),"z_id ='0'");
$z_name=$web_step["z_name"];//网站名称
$z_title=$web_step["z_title"];// 网站标题
$z_keyword=$web_step["z_keyword"];// 网站优化关键词
$z_contant=$web_step["z_contant"];// 网站优化描述
$z_tel=$web_step["z_tel"];// 网站电话
$z_fax=$web_step["z_fax"];// 网站传真
$z_qq=$web_step["z_qq"];// 网站QQ	
$z_qq=explode(",", $z_qq); //分割QQ
$qq1=$z_qq[0];
$qq2=$z_qq[1];
$z_msn=$web_step["z_msn"];// 网站MSN
$z_code=$web_step["z_code"];// 网站邮编
$z_email=$web_step["z_email"];// 网站邮箱
$z_website="/";//$web_step["z_website"];// 网站网址
$z_logo=$web_step["z_logo"];// 网站LOGO 
$z_icp=$web_step["z_icp"];// 网站ICP 		   
$z_address=$web_step["z_address"];// 公司地址 
$z_pic1=$web_step["z_pic1"];// 首页幻灯图1
$z_pic2=$web_step["z_pic2"];// 首页幻灯图1
$z_pic3=$web_step["z_pic3"];// 首页幻灯图1
$z_pic4=$web_step["z_pic4"];// 首页幻灯图1
$z_pic5=$web_step["z_pic5"];// 首页幻灯图1
$z_pic6=$web_step["z_pic6"];// 首页幻灯图1
$z_link1=$web_step["z_link1"];// 幻灯链接1
$z_link2=$web_step["z_link2"];// 幻灯链接1
$z_link3=$web_step["z_link3"];// 幻灯链接1
$z_link4=$web_step["z_link4"];// 幻灯链接1
$z_link5=$web_step["z_link5"];// 幻灯链接1
$z_link6=$web_step["z_link6"];// 幻灯链接1

?>