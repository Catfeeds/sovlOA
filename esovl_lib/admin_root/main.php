<?php include_once("../conn.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>mian_right</title>
<link href="images/root.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1{color: #0099FF;font-weight: bold;}
.forumrowhighlight span{ display:block; height:20px; line-height:20px; color:#000; float:left; margin:0;}
.forumrowhighlight #spnTime{color:#FF0000;}
-->
</style>
</head>
<?php
//设置管理级别
if(isset($_COOKIE["admin_root"])){		
function acl(){
switch($_COOKIE["a_class"]){
case 1:
return "超级管理员";
break;
case 2:
return "普通管理员";
break;
case 3:
return "初级管理员";
break;
case 4:
return "模块管理员";
break;	
default:
return "权限未划分";
}	
}
}else{
echo"<script>alert('登陆超时！');location.href='login.php';</script>";
}
?>
<body  style="overflow-x:hidden; overflow-y:auto;">
<br />
<table width="95%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" align="left"><img src="images/Explain.gif" width="18" height="18" /><span>【一休教育网站管理面板】</span></th>
  </tr>
  <tr>
    <td height="22" bgcolor="#EFFCF8" class="forumrow"> 　→ 欢迎管理员 <font color=red><?php echo $_COOKIE["admin_root"]?></font> 进入后台 　您的管理权限级别是：[<font color=red><?php echo acl();?></font>] 　<?php echo $_COOKIE["a_con"]?></td>
  </tr>
</table>
<br />
<table width="95%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
<tr>
<th height="24" align="left"><img src="images/Explain.gif" width="18" height="18" /><span>【系统说明帮助】</span></th>
</tr>
<tr>
<td valign="top" bgcolor="#EFFCF8" class="forumrow"><strong> 前 言</strong><br />
        　　《一休教育网》－是双威教育集团旗下品牌之一。为考生提供最全面的培训求学招生考试信息,最丰富的学习备考资料,最专业的培训辅导课程。上海北京等地各类培训课程网上优惠报名，涵盖：外语、计算机、职业资格、文体艺术、 管理培训等以及学历教育、在职研究生/工程硕士招生。网上报名，优惠便捷。电话：021-58734554。
		<div style="height:5px;"/></div>

      <strong>知识产权声明</strong><br />
      　　《一休教育网》系双威集团教育事业部自主研发的国内权威的教育服务门户网站。依法享有该软件的一切版权等知识产权，并已向国家版权局申请《中华人民共和国软件著作权登记》。<br />
      　　对任何侵犯《一休教育网》之版权的行为，上海双威教育集团将依据《著作权法》、《计算机软件保护条例》等相关法律、法规，追究其经济责任和法律责任。根据中华人民共和国有关法律,法规,规章关于保护知识产权的规定,未经一休教育网同意任何复制和转载一休教育网网站内容的行为是被严格禁止的。<br />
      　　网站中所提供的教育服务都是经过国家教育部授权,受中华人民共和国法律保护。在法律许可的最大范围内，一休教育网将积极保护其知识产权，包括诉诸刑事法律。<br />
      ===================================================<br />
      版权所有  侵权必究</td>
  </tr>
</table>
<br />
<table width="95%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" colspan="2" align="left"><img src="images/Explain.gif" width="18" height="18" /><span>【服务器信息】</span></th>
</tr>
<tr>
<td width="50%" height="24" bgcolor="#EFFCF8" class="forumrow">服务器标识：<?php echo $_SERVER['SERVER_SOFTWARE']?></td>
<td width="50%" height="24" bgcolor="#EFFCF8" class="forumrowhighlight">当前请求的User-Agent的头信息：<?php echo $_SERVER['HTTP_USER_AGENT']?></td>
</tr>
<tr>
<td width="50%" height="24" bgcolor="#EFFCF8" class="forumrow">请求页面的通信协议名称和版本：<?php echo $_SERVER['SERVER_PROTOCOL']?></td>
<td width="50%" height="24" bgcolor="#EFFCF8" class="forumrowhighlight">当前运行脚本的服务器IP地址：<?php echo $_SERVER['SERVER_ADDR']?></td>
</tr>
<tr>
<td height="24" bgcolor="#EFFCF8" class="forumrow">显示服务器使用的CGI脚本规范：<?php echo $_SERVER['GATEWAY_INTERFACE']?></td>
<td height="24" bgcolor="#EFFCF8" class="forumrowhighlight">当前运行脚本的客户端IP地址：<?php echo $_SERVER['REMOTE_ADDR']?></td>
</tr>
<tr>
<td height="24" bgcolor="#EFFCF8" class="forumrow">返回服务器处理请求的端口：<?php echo $_SERVER['SERVER_PORT']?></td>
<td height="24" bgcolor="#EFFCF8" class="forumrowhighlight">域名网址：<?php echo $_SERVER['SERVER_NAME']?></td>
</tr>
<tr>
<td height="24" bgcolor="#EFFCF8" class="forumrow">返回连接到服务器时所使用的端口：<?php echo $_SERVER['SERVER_PORT']?></td>
    <td height="24" bgcolor="#EFFCF8" class="forumrowhighlight"><span>当前服务器时间：</span><span id="spnTime"></span>

<script language="javascript">
var http;
function createXMLHttp(){
    if(window.ActiveXObject){
        http = new ActiveXObject("Microsoft.XMLHTTP");
    }
    else if(window.XMLHttpRequest){
		http = new XMLHttpRequest();
    }
}
createXMLHttp();
http.open("HEAD",".",false);
http.send(null);
var curDate = new Date;
var offsetTime = curDate - Date.parse(http.getResponseHeader("Date"));
setInterval(function()
{
    curDate.setTime(new Date - offsetTime);
    document.getElementById("spnTime").innerHTML = curDate.toLocaleString();
}, 1000);
</script></td>
  </tr>
  <tr>
    <td height="24" bgcolor="#EFFCF8" class="forumrow">FSO文本文件读写：      <?PHP
		if ($handle=fopen("images/root.css","r")){
	  echo"<font color=green><b>√</b></font>";
	  fclose($handle);
	   }else{
      echo"<font color=red><b>×</b></font>";
	   }
    ?></td>
    <td height="24" bgcolor="#EFFCF8" class="forumrowhighlight">站点物理路径：<?php echo $_SERVER['DOCUMENT_ROOT']?></td>
  </tr>
  <tr>
    <td width="50%" height="24" bgcolor="#EFFCF8" class="forumrow">当前页面物理路径：<?php echo $_SERVER["SCRIPT_FILENAME"]?></td>
    <td width="50%" height="24" bgcolor="#EFFCF8" class="forumrowhighlight">虚拟路径：<?php echo $_SERVER['SCRIPT_NAME']?></td>
  </tr>
  <tr>
    <td height="24" colspan="2" bgcolor="#EFFCF8" class="forumrowhighlight" >客户端浏览器要求： IE5.5或以上，并关闭所有弹窗的阻拦程序；服务器建议采用：Windows 2000或Windows 2003 Server。</td>
  </tr>
</table>
<br />
<?php
$m_SQL = "select a_user from admin";
$rs = mysql_query($m_SQL);
$m_ManageNumber = mysql_num_rows($rs);
mysql_free_result($rs); 

$m_SQL = "select v_name from vip";
$rs = mysql_query($m_SQL);
$m_UserNumber = mysql_num_rows($rs);
mysql_free_result($rs); 

$m_SQL = "select wd_id from wdonline";
$rs = mysql_query($m_SQL);
$m_Message = mysql_num_rows($rs);
mysql_free_result($rs); 

$m_SQL = "select wd_id from wdonline where wd_bool=1";
$rs = mysql_query($m_SQL);
$m_Message_bool = mysql_num_rows($rs);
mysql_free_result($rs); 

$m_SQL = "select nid from nnews";
$rs = mysql_query($m_SQL);
$m_News = mysql_num_rows($rs);
mysql_free_result($rs); 

$m_SQL = "select bm_id from wsbm where bm_bool=0";
$rs = mysql_query($m_SQL);
$m_Bm = mysql_num_rows($rs);
mysql_free_result($rs); 

$m_SQL = "select cp_id from cpinfo";
$rs = mysql_query($m_SQL);
$m_About = mysql_num_rows($rs);
mysql_free_result($rs); 

$m_SQL = "select yq_id from yqlj";
$rs = mysql_query($m_SQL);
$m_FriendLink = mysql_num_rows($rs);
mysql_free_result($rs); 
//提取备案号
$m_SQL = "select z_icp from web_step";
$rs = mysql_query($m_SQL);
$row = mysql_fetch_assoc($rs);
$m_icp=$row["z_icp"];
mysql_free_result($rs); 
?>
<table width="95%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
<tr>
<th height="22" colspan="2" align="left"><img src="images/Explain.gif" width="18" height="18" /><span>【网站快捷信息显示】</span></th>
</tr>
<tr>
<td width="50%" bgcolor="#EFFCF8" class="style1">一休教育网站管理系统 Build 101010</td>
<td width="50%" bgcolor="#EFFCF8" class="forumrowhighlight">新闻动态：<font color="red"><b><?php echo $m_News;?></b></font>条 在线订单：<font color="red"><b><%=m_Order%></b></font>条 其他信息：<font color="red"><b><%=m_Others%></b></font>条 报名信息：<font color="red"><b><?php echo $m_Bm;?></b></font>条</td>
</tr>
<tr>
<td width="50%" bgcolor="#EFFCF8" class="forumrow">管 理 员：<font color="red"><b><?php echo $m_ManageNumber;?></b></font>个 注册会员：<font color="red"><b><?php echo $m_UserNumber;?></b></font>个 留言：<font color="red"><b><?php echo $m_Message;?></b></font>(已审<?php echo $m_Message_bool;?>条) 应聘信息：<font color="red"><b><%=m_Talents%></b></font>条</td>
    <td width="50%" bgcolor="#EFFCF8" class="forumrowhighlight">企业信息：<font color="red"><b><?php echo $m_About;?></b></font>条 下载信息：<font color="red"><b><%=m_Download%></b></font>条 友情链接：<font color="red"><b><?php echo $m_FriendLink;?></b></font>条 人才信息：：<font color="red"><b><%=m_Jobs%></b></font>条</td>
</tr>
</table>
<br />
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td align="center">Copyright &copy; 2010 <a href="http://www.esovl.com/"  title="一休教育，成就辉煌人生！" target="_blank"><b>www.esovl<font color="#CC0000">.com</font></b></a> All Rights Reserved. <?php echo $m_icp;?></td>
  </tr>
</table>
</body>
</html>