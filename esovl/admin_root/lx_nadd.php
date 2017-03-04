<?php include("../conn.php");?>
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>留学版新闻新闻列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="lgHttp.js"></script>
</HEAD>

<BODY>
<?php
if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}

  if (isset($_POST["lx_ntitle"])){
      $sql="insert into lxnews set lx_gjcl=".$_POST["lx_gjcl"].",lx_ncl='".$_POST["lx_ncl"]."',lx_ntitle='".$_POST["lx_ntitle"]."',lx_npic='".$_POST["lx_npic"]."',lx_nsp='".$_POST["lx_nsp"]."',lx_ncon='".$_POST["lx_ncon"]."',lx_nbool=".$_POST["lx_nbool"].",lx_nauthor='".$_POST["lx_nauthor"]."',lx_jzdate='".$_POST["lx_jzdate"]."',lx_ndate='".$_POST["lx_ndate"]."'";
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
      echo"<script>alert('新闻添加成功');location.href='lx_nlist.php';</script>";
	  }else{
		  echo $sql."<br>";
	  exit("添加失败! 错误新闻为:".mysql_error());
	  }
  }

include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('lx_ncon') ;
$oFCK->BasePath = $sBasePath ;
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">留学版新闻新闻：添加，修改介绍新闻相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"></td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="lxnform"  method="post" action="">
  <tr>
    <td colspan="3" class="mian_right_box_title_01">【添加留学版新闻新闻】</td>
	</tr> 
	<tr>
	    <td width="292" height="40" align="right" bgcolor="#FFFFFF" class="title">选择国家分类</td>
        <td colspan="2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
		<select name="lx_gjcl" onBlur="return lxnewsset()">
		<option value="0">--请选择分类--</option>
	  <?php 
      $sql="select * from lxgjclass";
	  $rs=mysql_query($sql,$conn);
	  if (mysql_num_rows($rs)>=1){
	  while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
      ?>
		  <option value="<?=$row["lx_gjid"]?>"><?=$row["lx_gjcl"]?></option>
	  <?php
          }}
	  ?>
		
        </select>
		<span id="lxgjcl">*</span></td>
	  </tr>
	  <tr>
    <td height="32" align="right" bgcolor="#FFFFFF" class="title">选择新闻类别：</td>
	<td colspan="2" bgcolor="#FFFFFF" class="title">
    <input type="radio" name="lx_ncl"  value="0" checked onClick="gethide()">
各国资讯
  <input type="radio" name="lx_ncl" value="cgal" onClick="gethide()">
  成功案例
  <input type="radio" name="lx_ncl" value="hggl" onClick="gethide()">
  回国归来
  <input type="radio" name="lx_ncl" value="mjhw" onClick="gethide()"> 
  漫镜海外
  <input type="radio" name="lx_ncl" value="ymhw" onClick="gethide()"> 
  移民海外
  <input type="radio" name="lx_ncl" value="hwsh" onClick="gethide()">
海外生活 
<input type="radio" name="lx_ncl" value="msjz" onClick="getshow()">
面试讲座</td>
    </tr>
	  <tr>
	    <td height="4" align="right" bgcolor="#FFFFFF" class="title">新闻标题：</td>
	    <td colspan="3" bgcolor="#FFFFFF" class="title"><input type="text" name="lx_ntitle" maxlength="40" style="width:300px;" onBlur="return lxnewsset()"/>
        <span id="lxntitle">*</span></td>
      </tr>
	  <tr>
	    <td height="4" align="right" bgcolor="#FFFFFF" class="title">新闻小图：</td>
	    <td colspan="3" bgcolor="#FFFFFF" class="title"><input type="button" value="浏览" onClick="window.open('up2.php?formname=lxnform&editname=lx_npic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')">
        <input type="text" name="lx_npic" readonly size="50"></td>
      </tr>
	  <tr>
	    <td height="9" align="right" bgcolor="#FFFFFF" class="title">相关视频：</td>
	    <td colspan="3" bgcolor="#FFFFFF" class="title"><input type="text" name="lx_nsp" value="http://" size="50">
	      (输入视频网址)</td>
      </tr>
	  <tr>
	    <td height="56" align="right" bgcolor="#FFFFFF" class="title">新闻内容：<span id="incon"></span></td>
        <td colspan="3" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><?php $oFCK->Create();?></td>
    </tr>
	  <tr>
	    <td height="28" align="right" bgcolor="#FFFFFF" class="title">是否推荐：</td>
        <td colspan="3" bgcolor="#FFFFFF" class="title"><input type="radio" name="lx_nbool" value="1">
          是 
          <input type="radio" name="lx_nbool" checked value="0">
          否</td>
    </tr>
	  <tr>
	    <td height="13" align="right" bgcolor="#FFFFFF" class="title">作者：</td>
	    <td width="212" bgcolor="#FFFFFF"></span><input type="text" name="lx_nauthor"></td>
	    <td width="828" bgcolor="#FFFFFF"><span id="get_msjz_date" style="display:none;">讲座日期：<input type="text" name="lx_jzdate" ></span></td>
      </tr>    
	  <tr>
	    <td height="35" align="right" bgcolor="#FFFFFF" class="title">提交时间：</td>
	    <td colspan="3" bgcolor="#FFFFFF" class="title"><input type="text" name="lx_ndate" id="ndate" value="<?=date("Y-m-d H:i:s")?>" maxlength="40" readonly style="width:300px;"/></td>
      </tr>
	  <tr>
	    <td height="29" align="right" bgcolor="#FFFFFF" class="title">&nbsp;</td>
        <td colspan="3" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" onClick="return lxnewsset()" value="保存新闻"></td>
    </tr>
  </form>
</table>
</div>
</BODY>
</HTML>
