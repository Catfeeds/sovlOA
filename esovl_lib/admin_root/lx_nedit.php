<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>留学版信息列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery.js" type="text/javascript"></script>
</HEAD>
<?php include("../conn.php");?>
<script type="text/javascript" src="lgHttp.js"></script>
<BODY>
<?php
if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}
  if (isset($_POST["lx_ntitle"])){   
     $sql="update lxnews set lx_gjcl=".$_POST["lx_gjcl"].",lx_ncl='".$_POST["lx_ncl"]."',lx_ntitle='".$_POST["lx_ntitle"]."',lx_npic='".$_POST["lx_npic"]."',lx_nsp='".$_POST["lx_nsp"]."',lx_ncon='".$_POST["lx_ncon"]."',lx_nbool=".$_POST["lx_nbool"].",lx_nauthor='".$_POST["lx_nauthor"]."',lx_jzdate='".$_POST["lx_jzdate"]."',lx_ndate='".$_POST["lx_ndate"]."' where lx_nid=".$_POST["nid"];;
		
		
	  $rs=mysql_query($sql,$conn);
	  if ($rs){	
      echo"<script>alert('修改成功');location.href='lx_nlist.php';</script>";
	  }else{
	  
	  exit("更新失败! 错误信息为:".mysql_error());
	  }
  }
  
      $sql="select * from lxnews where lx_nid=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	  $row=mysql_fetch_assoc($rs);
	  }

include('fckeditor/fckeditor.php');
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('lx_ncon');
$oFCK->BasePath   = $sBasePath ;
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">留学版信息：添加，修改介绍企业相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
  <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
    <form name="lxnform" method="post" onSubmit="return newsset()" action="">
      <tr>
        <td colspan="5" class="mian_right_box_title_01">【编辑留学版新闻信息】</td>
      </tr>
      <tr>
	    <td width="276" height="40" align="right" bgcolor="#FFFFFF" class="title">选择国家分类</td>
        <td colspan="3" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
		<select name="lx_gjcl" onBlur="return lxnewsset()">		
	  <?php 
      $sq="select * from lxgjclass";
	  $rs1=mysql_query($sq,$conn);
	  if (mysql_num_rows($rs1)>=1){
	  while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){
      ?>
		  <option value="<?=$row1["lx_gjid"]?>" <?php if($row["lx_gjcl"]==$row1["lx_gjid"]){echo "selected";}?>><?=$row1["lx_gjcl"]?></option>
	  <?php
          }}
	  ?>
		
        </select>
		<span id="lxgjcl">*</span></td>
	  </tr>
	  <tr>
    <td height="32" align="right" bgcolor="#FFFFFF" class="title">选择新闻类别：</td>
	<td colspan="3" bgcolor="#FFFFFF" class="title">
    <input type="radio" name="lx_ncl" onClick="gethide()" value="0" <?php if($row["lx_ncl"]=="0"){echo "checked";}?>>
各国资讯
  <input type="radio" name="lx_ncl" onClick="gethide()" value="cgal" <?php if($row["lx_ncl"]=="cgal"){echo "checked";}?>>
  成功案例
  <input type="radio" name="lx_ncl" onClick="gethide()" value="hggl" <?php if($row["lx_ncl"]=="hggl"){echo "checked";}?>>
  回国归来
  <input type="radio" name="lx_ncl" onClick="gethide()" value="mjhw" <?php if($row["lx_ncl"]=="mjhw"){echo "checked";}?>>
  漫镜海外
  <input type="radio" name="lx_ncl" onClick="gethide()" value="ymhw" <?php if($row["lx_ncl"]=="ymhw"){echo "checked";}?>>
  移民海外
  <input type="radio" name="lx_ncl" onClick="gethide()" value="hwsh" <?php if($row["lx_ncl"]=="hwsh"){echo "checked";}?>>
海外生活 
<input type="radio" name="lx_ncl" onClick="getshow()" value="msjz" <?php if($row["lx_ncl"]=="msjz"){echo "checked";}?>>
面试讲座</td>
    </tr>
	  <tr>
	    <td height="4" align="right" bgcolor="#FFFFFF" class="title">新闻标题：</td>
	    <td colspan="3" bgcolor="#FFFFFF" class="title">
        <input type="text" name="lx_ntitle" maxlength="40" style="width:300px;" value="<?=$row["lx_ntitle"]?>" onBlur="return lxnewsset()"/>
        <span id="lxntitle">*</span></td>
      </tr>
	  <tr>
	    <td height="4" align="right" bgcolor="#FFFFFF" class="title">新闻小图：</td>
	    <td colspan="3" bgcolor="#FFFFFF" class="title"><input type="text" name="lx_npic" readonly value="<?=$row["lx_npic"]?>" size="50"><input type="button" value="浏览" onClick="window.open('up2.php?formname=lxnform&editname=lx_npic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')"></td>
      </tr>
	  <tr>
	    <td height="9" align="right" bgcolor="#FFFFFF" class="title">相关视频：</td>
	    <td colspan="3" bgcolor="#FFFFFF" class="title"><input type="text" name="lx_nsp" value="<?=$row["lx_nsp"]?>" size="50">
	      (输入视频网址)</td>
      </tr>
	  <tr>
	    <td height="56" align="right" bgcolor="#FFFFFF" class="title">新闻内容：<span id="incon"></span></td>
        <td colspan="3" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
		<?php 		
		$oFCK->Value  = $row["lx_ncon"];
		$oFCK->Create();
		?>
        </td>
    </tr>
	  <tr>
	    <td height="36" align="right" bgcolor="#FFFFFF" class="title">是否推荐：</td>
        <td colspan="3" bgcolor="#FFFFFF" class="title"><input type="radio" name="lx_nbool" value="1" <?php if($row["lx_nbool"]=="1"){echo "checked";}?>>
          是 
          <input type="radio" name="lx_nbool" value="0" <?php if($row["lx_nbool"]=="0"){echo "checked";}?>>
          否</td>
    </tr>
    <tr>
	    <td height="27" align="right" bgcolor="#FFFFFF" class="title">作者：</td>
	    <td colspan="2" bgcolor="#FFFFFF" class="title"><input type="text" name="lx_nauthor" value="<?=$row["lx_nauthor"]?>">
        <input type="hidden" name="nid" value="<?=$_GET["id"]?>"></td><td width="785" bgcolor="#FFFFFF">
        <span id="get_msjz_date" <?php if($row["lx_jzdate"]!=""){echo"style='display:block;'";}else{echo"style='display:none;'";}?>>讲座日期：<input type="text" name="lx_jzdate" value="<?=$row["lx_jzdate"]?>"></span></td>
        
      </tr>
	  <tr>
	    <td height="35" align="right" bgcolor="#FFFFFF" class="title">提交时间：</td>
	    <td colspan="3" bgcolor="#FFFFFF" class="title"><input type="text" name="lx_ndate" value="<?=$row["lx_ndate"]?>" maxlength="40" readonly style="width:300px;"/></td>
      </tr>
      <tr>
        <td height="29" align="right" bgcolor="#FFFFFF" class="title">&nbsp;</td>
        <td colspan="3" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" value="保存信息"></td>
      </tr>
    </form>
  </table>
</div>
</BODY>
</HTML>
