<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>开课信息列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
</HEAD>
<?php include("../conn.php");?>
<script type="text/javascript" src="lgHttp.js"></script>
<BODY>
<?php
if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}
  if (isset($_POST["ktitle"])){

      $sql="insert into kkinfo set bk_id=".$_POST["bk_id"].",s_id=".$_POST["s_id"].",zyclass='".$_POST["zyclass"]."',zyname='".$_POST["zyname"]."',ktitle='".$_POST["ktitle"]."',zycon='".$_POST["zycon"]."',xfei=".$_POST["xfei"].",yhui=".$_POST["yhui"].",kcal='".$_POST["kcal"]."',ktime='".$_POST["ktime"]."',k_adderss='".$_POST["k_adderss"]."',k_line='".$_POST["k_line"]."',kdate='".$_POST["kdate"]."',xlcal='".$_POST["xlcal"]."',xfen='".$_POST["xfen"]."',kkdate=date(now())";
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
      echo"<script>alert('信息添加成功');location.href='xl_kclist.php';</script>";
	  }else{
	  
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }

?> 
<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">开课信息：添加，修改介绍新闻相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"><a href="xl_kcadd.php">添加开课信息</a><font color="#0000FF">&nbsp;|&nbsp;</font><a href="xl_kclist.php" >查看开课信息</a><font color="#0000FF">&nbsp;</font></td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="kaikeform" method="post" onSubmit="return kaike()" action="">
  <tr>
    <td colspan="2" class="mian_right_box_title_01">【添加开课信息】</td>
	</tr> 
	<tr>
	    <td height="36" align="right" bgcolor="#FFFFFF" class="title">选择简章大类：</td>
        <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
          <select name="bk_id">
		  <option value=0>-请选择-</option>
	 <?php 
      $sql="select * from xlbk";
	  $rs=mysql_query($sql,$conn);
	  if (mysql_num_rows($rs)>=1){
	  while ($rw=mysql_fetch_array($rs,MYSQL_ASSOC)){
      ?>
           
			<option value=<?php echo $rw["bk_id"];?>><?php echo $rw["bk_title"];?></option>
	  <?php }}?>
          </select>
          <span id="k_bk">*</span></td>
	  </tr>
	<tr>
	  <td height="15" align="right" bgcolor="#FFFFFF" class="title">选择学校：</td>
	  <td width="919" colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
	    <select name="s_id">
          <option value=0>--请选择学校--</option>
          <?php 
      $sql="select * from school";
	  $rs=mysql_query($sql,$conn);
	  if (mysql_num_rows($rs)>=1){
	  while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
      ?>
          <option value="<?php echo $row["s_id"]?>"><?php echo $row["s_name"]?></option>
          <?php
          }
		  }?>
        </select>
        <span id="k_school">*</span></td>
	</tr>
	<tr>
	  <td height="34" align="right" bgcolor="#FFFFFF" class="title">选择专业类别：</td>
	  <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
	    <select name="zyclass">
          <option value=0>--请选择专业类别--</option>
          <?php 
      $sql="select * from xlcal";
	  $rs=mysql_query($sql,$conn);
	  if (mysql_num_rows($rs)>=1){
	  while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
      ?>
          <option value="<?php echo $row["zy_class"]?>"><?php echo $row["zy_class"]?></option>
          <?php
          }
		  }?>
        </select>
        <span id="k_zyclass">*</span></td>
	  </tr>
	<tr>
	  <td height="31" align="right" bgcolor="#FFFFFF" class="title">选择专业名称：</td>
	  <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
	    <select name="zyname">
          <option value=0>--请选择专业名称--</option>
          <?php 
      $sql="select * from xlmc";
	  $rs=mysql_query($sql,$conn);
	  if (mysql_num_rows($rs)>=1){
	  while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
      ?>
          <option value="<?php echo $row["mc_title"]?>"><?php echo $row["mc_title"]?></option>
          <?php
          }
		  }?>
        </select>
        <span id="k_zyname">*</span></td>
	  </tr>
	  <tr>
    <td height="38" align="right" bgcolor="#FFFFFF" class="title">开班名称：</td>
	<td width="919" colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="ktitle" id="ktitle" value="" maxlength="40" style="width:300px;"/><span id="k_ktitle">*</span></td>
    </tr>
	 
	  <tr>
	    <td height="56" align="right" bgcolor="#FFFFFF" class="title">专业介绍：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title" style="padding-left:12px;"><textarea name="zycon" style="width:500px; height:200px;"></textarea><span id="k_zycon">*</span></td>
    </tr>
	  <tr>
	    <td height="29" align="right" bgcolor="#FFFFFF" class="title">学　　费：</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" onKeyUp="value=value.replace(/[^\d]/g,'') "
      onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" name="xfei"><span id="k_xfei">*</span>(元/年)</td>
    </tr>
	  <tr>
	    <td height="34" align="right" bgcolor="#FFFFFF" class="title">优惠价：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" onKeyUp="value=value.replace(/[^\d]/g,'') "
      onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" name="yhui"><span id="yhui">*</span>(元/年)</td>
      </tr>
	  <tr>
	    <td height="31" align="right" bgcolor="#FFFFFF" class="title">上课类型：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="kcal"><span id="k_kcal">*</span>(请填写：全日制，业余制)</td>
      </tr>
	  <tr>
	    <td height="33" align="right" bgcolor="#FFFFFF" class="title">课程时间：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="ktime"><span id="k_ktime">*</span></td>
      </tr>
	  <tr>
	    <td height="29" align="right" bgcolor="#FFFFFF" class="title">上课地点：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="k_adderss" id="k_adderss" style="width:180px;"></td>
      </tr>
	  <tr>
	    <td height="36" align="right" bgcolor="#FFFFFF" class="title">公交线路：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="k_line" id="k_line" style="width:180px;"></td>
      </tr>
	  <tr>
	    <td height="27" align="right" bgcolor="#FFFFFF" class="title">开班日期：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="kdate"><span id="k_kdate">*</span></td>
      </tr>
	  <tr>
	    <td height="30" align="right" bgcolor="#FFFFFF" class="title">学历类型：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="xlcal"></td>
      </tr>
	  <tr>
	    <td height="29" align="right" bgcolor="#FFFFFF" class="title">学　　分：</td>
	    <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="text" name="xfen"></td>
      </tr>
	  <tr>
	    <td height="29" align="right" bgcolor="#FFFFFF" class="title">&nbsp;</td>
        <td colspan="-2" bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" value="保存信息"></td>
    </tr>
  </form>
</table>
</div>
</BODY>
</HTML>
