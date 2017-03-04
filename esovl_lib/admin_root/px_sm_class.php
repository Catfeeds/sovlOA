<?php include("../conn.php");?>

<html><head><title>培训小类</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="images/root.css" rel="stylesheet" type="text/css" />
</head>

<?php
@$pb_title=$_GET["pb_title"];
@$pb_id=$_GET["id"];
if(isset($_GET["action"])){
switch($_GET["action"]){
case "add":
if($_POST["pb_id"]==""){ echo"<script>alert('对不起，请先选择大类');location.href='javascript:window.history.go(-1)';</script>";}
$sql="insert into pxsclass (pb_id,ps_title,ps_pic) values (".$_POST["pb_id"].",'".$_POST["ps_title"]."','".$_POST["ps_pic"]."')";
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
	  echo"<script>alert('添加成功');location.href='px_sm_class.php?id=".$_POST["pb_id"]."&pb_title=".$_POST["pb_title"]."';</script>";
	  
	  case "del":
$sql="delete from pxsclass where ps_id=".$_GET["sid"];
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("删除失败! 错误信息为:".mysql_error());
	  }
	  echo"<script>alert('删除成功');location.href='px_sm_class.php?id=".$pb_id."&pb_title=".$pb_title."';</script>";
	  
	  case "edit":
$sql="update pxsclass set ps_title='".$_POST["ps_title"]."',ps_pic='".$_POST["ps_pic"]."' where ps_id=".$_POST["ps_id"];
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("更新失败! 错误信息为:".mysql_error());
	  }
	  echo"<script>alert('更新成功');location.href='px_sm_class.php?id=".$pb_id."&pb_title=".$pb_title."';</script>";
}
}
?>
<body>
<table class="tableBorder" width="90%" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
<tr> 
<td height="27" colspan="4" align="center" background="" bgcolor="#C2D3FC"><b><font color="#333">培训小类管理</font></b></td>
</tr>
<tr> 
<td width="30%" valign="top" align="center" ><br>
<select name="select" onChange="var jmpURL=this.options[this.selectedIndex].value ; if(jmpURL!='') {window.location=jmpURL;} else {this.selectedIndex=0 ;}" >
<option>选择培训大类</option>
        <?php
	  $sql="select * from pxbclass";
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	 
	     if(mysql_num_rows($rs)>=1){
		 $i=0;
		     while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
			 $i=$i+1;
			 ?>
    <option value="px_sm_class.php?id=<?=$row["pb_id"]?>&pb_title=<?=$row["pb_title"]?>" ><?=$row["pb_title"]?></option>
       <?php }}}?>
       </select>&nbsp;<?php if (isset($pb_id)){echo"当前大类：".$pb_title;}?>
</td>
<td width="70%" > 
<table width="90%" align="center" border="1" cellpadding="1" cellspacing="1">
<tr> 
<td width="25%" align="center">小类名称</td>
<td width="25%" align="center">广告图</td>
<td width="30%" align="center">确定操作</td>
</tr>
       <?php
        if (@$pb_id==""){
        echo "<div align=center><font color=red>请选择左测的分类</font></div>";}
        else{
//        set rs=server.CreateObject("adodb.recordset")
//        rs.Open "select * from shopxp_stype where shopxpbe_id="&shopxpbe_id&" order by shopxpse_idorder",conn,1,1

      $sql="select * from pxsclass where pb_id=".$pb_id;
	  $rs=mysql_query($sql,$conn);
         if(mysql_num_rows($rs)>=1){
			 $j=0;
		 while($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
			 $j=$j+1;
         ?>
<form name="form<?=$j?>" method="post" action="px_sm_class.php?action=edit&id=<?=$pb_id?>&pb_title=<?=$pb_title?>">
<tr> 
<td align="center">
  <input name="ps_title" type="text" id="ps_title" size="16" value="<?=$row["ps_title"]?>">
  <input name="ps_id" type="hidden" value="<?=$row["ps_id"]?>" id="Hidden1"></td>
<td align="center"><input type="text" name="ps_pic" value="<?=$row["ps_pic"]?>" size="20">
  <input type="button" value="浏览" onClick="window.open('up2.php?formname=form<?=$j?>&editname=ps_pic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')"></td>
<td align="center">
  <input type="submit" name="Submit" value="修 改">&nbsp;
  <a href="px_sm_class.php?action=del&sid=<?=$row["ps_id"]?>&id=<?=$pb_id?>&pb_title=<?=$pb_title?>" onClick="return confirm('您确定进行删除操作吗？')"><font color=red>删除</font></a></td>
</tr>
</form>
		<?php }}}?>
</table>
</td>
</tr>
</table><br>
<table class="tableBorder" width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr> 
<td height="26" colspan="4" align="center" background="" bgcolor="#C2D3FC"><b><font color="#333">添加培训小类</font></b></td>
</tr>
<tr> 
<td width="30%" valign="top" align="center" ><br>
当前大类：<?=$pb_title?></div>
</td>
<td width="70%" > 
<table width="90%" align="center" border="1" cellpadding="1" cellspacing="1">
<tr> 
<td width="25%" align="center">小类名称  </div></td>
<td width="25%" align="center">广告图</td>
<td width="30%" align="center">确定操作</div></td>
</tr>
<form name="formda" method="post" action="px_sm_class.php?action=add">
<tr> 
<td align="center"> 
  <input name="ps_title" type="text" id="ps_title" size="16">
  <input name="pb_id" type="hidden" value="<?=$pb_id?>">
  <input name="pb_title" type="hidden" value="<?=$pb_title?>"></td>
<td align="center"><input type="text" name="ps_pic" size="20"><input type="button" value="浏览" onClick="window.open('up2.php?formname=formda&editname=ps_pic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')"></td>
<td align="center"> 
  <input type="submit" name="Submit2" onClick="if(document.formda.ps_title.value==''){alert('标题为空');document.formda.ps_title.focus();return false;}" value="添加分类">
</td>
</tr>
</form>
</table>
</td>
</tr>
</table>
 
</body>
</html>