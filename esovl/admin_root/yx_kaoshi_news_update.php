<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>研修版信息列表</TITLE>
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
  if (isset($_POST["news_class"])){ 
  	 // exit($_POST["ndate"]);
	$sql="update yx_news set news_class='".$_POST["news_class"]."',class_name=".$_POST["class_name"].",news_title='".$_POST["news_title"]."',npic='".$_POST["npic"]."',news_con='".$_POST["news_con"]."',nbool=".$_POST["nbool"].",ndate='".$_POST["ndate"]."' where news_id=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
	
      echo"<script>alert('修改成功');location.href='yx_news_list.php';</script>";
	  }else{
	  
	  exit("更新失败! 错误信息为:".mysql_error());
	  }
  }
  	$sql="select * from yx_news where news_id=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	  $row=mysql_fetch_assoc($rs);
	  }

include('fckeditor/fckeditor.php');
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('news_con');
$oFCK->BasePath   = $sBasePath ;
?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">研修版信息：添加，修改介绍企业相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
  <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
    <form name="formnews" method="post" onSubmit="return newsset()" action="">
      <tr>
        <td colspan="5" class="mian_right_box_title_01">【编辑研修版新闻信息】</td>
      </tr>
      <tr>
        <td height="40" colspan="4" align="right" bgcolor="#FFFFFF" class="title">选择频道：</td>
        <td width="919" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><input name="id" value="<?php echo $_GET["id"]?>" type="hidden"><select name="news_class">
      
  <option value="<?php echo $row["news_class"]?>"><?php echo $row["news_class"]?></option>
	     <option value="MBA/EMBA">MBA/EMBA</option> 
          <option value="工程硕士">工程硕士</option>
          <option value="在职研究生">在职研究生</option>
          <option value="总裁总监研修">总裁总监研修</option>

          </select>
        <span id="ncl">*</span> </td>
        
      </tr>
            <td height="40" colspan="4" align="right" bgcolor="#FFFFFF" class="title">选择新闻分类：</td>
        <td width="919" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><input name="id" value="<?php echo $_GET["id"]?>" type="hidden"><select name="class_name">
        
            <?php 
      $sql_1="select * from yx_kaoshi_class";
	  $rs_1=mysql_query($sql_1,$conn);
	  if (mysql_num_rows($rs_1)>=1){
	  while ($row_1=mysql_fetch_array($rs_1,MYSQL_ASSOC)){
      ?>
            <option value="<?php echo $row_1["class_id"]?>" <?php if ($row_1["class_id"]==$row["class_name"]){echo "selected";}?>><?php echo $row_1["class_name"]?></option>
            <?php
          }
		  }?>
          </select>
        <span id="ncl">*</span> </td>
      <tr>
        <td height="38" colspan="4" align="right" bgcolor="#FFFFFF" class="title">信息标题：</td>
        <td width="919" bgcolor="#FFFFFF" class="title"><input type="text" name="news_title" id="ntitle" value="<?php echo $row["news_title"]?>" maxlength="40" style="width:300px;"/><input type="hidden" name="mid" value="<?php echo $mid;?>">
            <span id="ntil">*</span></td>
      </tr>
      <tr>
        <td height="38" colspan="4" align="right" bgcolor="#FFFFFF" class="title">图片上传：</td>
        <td bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><input type="text" name="npic" size="50" value="<?php echo $row["npic"];?>"><input type="button" value="浏览" onClick="window.open('up2.php?formname=formnews&editname=npic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')"><input type="button" value="预览" onMouseOver="document.getElementById('showpic').style.display=''" onMouseOut="document.getElementById('showpic').style.display='none'"><div id="showpic" style=" width:50px; height:50px; position:absolute; display:none;"><img src="<?=$row['npic']?>"></div></td>
      </tr>
      <tr>
        <td height="56" colspan="4" align="right" bgcolor="#FFFFFF" class="title">信息内容：</td>
        <td bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
		<?php 
		$oFCK->Value  = $row["news_con"];
		$oFCK->Create();
		?></td>
      </tr>
      <tr>
        <td height="36" colspan="4" align="right" bgcolor="#FFFFFF" class="title">是否推荐：</td>
        <td bgcolor="#FFFFFF" class="title"><input type="radio" name="nbool" value="1" <?php if($row["nbool"]==1){?> checked <?php }?>>
          是
          <input type="radio" name="nbool" value="0" <?php if($row["nbool"]==0){?> checked <?php }?>>
          否</td>
      </tr>
      <tr>
        <td height="28" colspan="4" align="right" bgcolor="#FFFFFF" class="title">提交时间：</td>
        <td bgcolor="#FFFFFF" class="title"><input type="text" name="ndate" id="ndate" value="<?php echo date("Y-m-d H:i:s");?>" maxlength="40" style="width:300px;"/></td>
      </tr>
      <tr>
        <td height="29" colspan="4" align="right" bgcolor="#FFFFFF" class="title">&nbsp;</td>
        <td bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" value="保存信息"></td>
      </tr>
    </form>
  </table>
</div>
</BODY>
</HTML>
