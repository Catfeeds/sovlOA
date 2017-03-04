<?php ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>一休网站管理系统-后台管理</title>
<link href="images/root.css" rel="stylesheet" type="text/css" />
<script language="javaScript" src="images/admin.js"></script>
<?php
if (isset($_COOKIE["admin_root"])){
	if ($_COOKIE["admin_root"]==""){
	Header("Location:login.php");
	}
}else{
 Header("Location:login.php");
}
if (empty($_COOKIE["admin_root"])){
Header("Location:login.php");
}
?>
<meta content="mshtml 6.00.6000.16640" name="generator">

</head> 
<body style="background:#3d5e87;">
<!--导航部分-->
<div class="top_table">
	<div class="top_table_leftbg">
		<div class="system_logo"><a href="admin_main.php" title="返回主菜单"><img src="images/logo_001.jpg" border="0" alt="返回主菜单"/></a></div>
<div class="menu">
<ul>
  <li id="menu_0" onMouseOver="Menus.Show(this,0)" onClick="getleftbar(this);"><a href="#">学历</a>
  		<div class="menu_childs" onMouseOut="Menus.Hide(0);">
  		<ul> 
    		<li><a href="m_xlzs.html" target="frmleft">学历教育</a></li>
    		<li><a href="m_zxks.html" target="frmleft">自学考试</a></li>
			<li><a href="m_wlys.html" target="frmleft">网络学院</a></li>
            <li><a href="m_crgk.html" target="frmleft">成人高考</a></li>
    		<li><a href="m_gjbx.html" target="frmleft">国际办学</a></li>			
			<li><a href="m_gfb.html" target="frmleft">高复班</a></li>            
   		</ul>
   		</div>
  </li>
  <li id="menu_1" onMouseOver="Menus.Show(this,0)" onClick="getleftbar(this);"><a href="m_px.html" target="frmleft">培训</a>
  		<div class="menu_childs" onMouseOut="Menus.Hide(0);">
  		<!--<ul>
    		<li><a href="#" target="frmleft">企业信息列表</a></li>
    		<li><a href="#" target="frmleft">添加企业信息</a></li>
			<li><a href="#" target="frmleft">生成企业信息列表</a></li>
   		</ul>-->
   		</div>
  </li>
  <li id="menu_2" onMouseOver="Menus.Show(this,0)" onClick="getleftbar(this);"><a href="m_yanxiu.html" target="frmleft">研修</a>
  		<div class="menu_childs" onMouseOut="Menus.Hide(0);">
  		<ul>
    		<li><a href="m_mba.html" target="frmleft">MBA/EMBA</a></li>
    		<li><a href="m_shus.html" target="frmleft">工程硕士</a></li>
			<li><a href="m_zaizhi.html" target="frmleft">在职研究生</a></li>
			<li><a href="m_zongcai.html" target="frmleft">总裁总监研修</a></li>
			<li><a href="m_jianzhang.html" target="frmleft">简章大全</a></li>
			<li><a href="m_sousuo.html" target="frmleft">简章搜索</a></li>
   		</ul>
   		</div>
  </li>
  <li id="menu_3" onMouseOver="Menus.Show(this,0)" onClick="getleftbar(this);"><a href="m_lx.html" target="frmleft">留学</a>
  		<div class="menu_childs" onMouseOut="Menus.Hide(0);">
  		<!--<ul>
    		<li><a href="#" target="frmleft">企业信息列表</a></li>
    		<li><a href="#" target="frmleft">添加企业信息</a></li>
			<li><a href="#" target="frmleft">生成企业信息列表</a></li>
   		</ul>-->
   		</div>
</li>
<li id="menu_4" onMouseOver="Menus.Show(this,0)" onClick="getleftbar(this);"><a href="#">资讯</a>
  		<div class="menu_childs" onMouseOut="Menus.Hide(0);">
  		<ul>
    		<li><a href="#" target="frmleft">企业信息列表</a></li>
    		<li><a href="#" target="frmleft">添加企业信息</a></li>
			<li><a href="#" target="frmleft">生成企业信息列表</a></li>
   		</ul>
   		</div>
  </li>
  <li id="menu_5" onMouseOver="Menus.Show(this,0)" onClick="getleftbar(this);"><a href="m_qipei.html" target="frmleft">企培</a>
  		<div class="menu_childs" onMouseOut="Menus.Hide(0);">
  		<!--<ul>
    		<li><a href="#" target="frmleft">企业信息列表</a></li>
    		<li><a href="#" target="frmleft">添加企业信息</a></li>
			<li><a href="#" target="frmleft">生成企业信息列表</a></li>
   		</ul>-->
   		</div>
  </li>
  <li id="menu_6" onMouseOver="Menus.Show(this,0)" onClick="getleftbar(this);"><a href="#">人才</a>
  		<div class="menu_childs" onMouseOut="Menus.Hide(0);">
			<ul>
    		<li><a href="#" target="frmleft">企业信息列表</a></li>
    		<li><a href="#" target="frmleft">添加企业信息</a></li>
			<li><a href="#" target="frmleft">生成企业信息列表</a></li>
   		</ul>
   	</div>
  </li>
  <li id="menu_7" onMouseOver="Menus.Show(this,0)" onClick="getleftbar(this);"><a href="#">社区</a>
  		<div class="menu_childs" onMouseOut="Menus.Hide(0);">
  		<ul>
    		<li><a href="#" target="frmleft">企业信息列表</a></li>
    		<li><a href="#" target="frmleft">添加企业信息</a></li>
			<li><a href="#" target="frmleft">生成企业信息列表</a></li>
   		</ul>
   		</div>
  </li>
  <li id="menu_8" onMouseOver="Menus.Show(this,0)" onClick="getleftbar(this);"><a href="m_vip.html" target="frmleft">会员</a>
  		<div class="menu_childs" onMouseOut="Menus.Hide(0);">
  		<!--<ul>
    		<li><a href="#" target="frmleft">待定待定</a></li>
    		<li><a href="#" target="frmleft">待定待定待定</a></li>
			<li><a href="#" target="frmleft">待定待定待定待定</a></li>
   		</ul>-->
   		</div>
  </li>
  <li id="menu_9" onMouseOver="Menus.Show(this,0)" onClick="getleftbar(this);"><a href="#">待定</a>
  		<div class="menu_childs" onMouseOut="Menus.Hide(0);">
  		<ul>
    		<li><a href="#" target="frmleft">待定待定</a></li>
    		<li><a href="#" target="frmleft">待定待定待定</a></li>
			<li><a href="#" target="frmleft">待定待定待定待定</a></li>
   		</ul>
   		</div>
  </li>
</ul>
</div>
</div>
</div>
<!--导航部分结束-->
<table width="100%" height="700" border="0" cellspacing="0" cellpadding="0" style="background:#3d5e87;">
  <tr>
    <td width="180" height="100%" valign="top" id="left_box01" style="background:#000">
    <iframe class="left_iframe" id="frmleft" name="frmleft" src="menu.html" style="height:700px;" frameborder="0"></iframe>
    </td>
    <td width="9" height="100%" align="center" valign="middle" style=" overflow:hidden;">
    <div class="anniu">
    <a href="#" id="xs01" onclick="openbox_01()" ><img src="images/dk.gif" border="0"/></a>
    <a href="#" id="gb01" onclick="openbox_02()" style="display:none;"><img src="images/xs.gif" border="0"/></a>
 </div>
    </td>
    <td height="100%" width="100%;" valign="top">
      <iframe class="main_iframe" id="frmright" name="frmright" src="main.php" style="height:700px;" frameborder="0"></iframe>
    </td>
  </tr>
</table>

</body>
</html>