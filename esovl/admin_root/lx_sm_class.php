<?php include("../conn.php");?>

<html><head><title>留学视点小类</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="images/root.css" rel="stylesheet" type="text/css" />
</head>

<?php
@$lb_title=$_GET["lb_title"];
@$lb_id=$_GET["id"];
if(isset($_GET["action"])){
switch($_GET["action"]){
case "add":
if($_POST["lb_id"]==""){ echo"<script>alert('对不起，请先选择大类');location.href='javascript:window.history.go(-1)';</script>";}
$sql="insert into lxsclass (lb_id,ls_title) values (".$_POST["lb_id"].",'".$_POST["ls_title"]."')";
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
	  echo"<script>alert('添加成功');location.href='lx_sm_class.php?id=".$_POST["lb_id"]."&lb_title=".$_POST["lb_title"]."';</script>";
	  
	  case "del":
$sql="delete from lxsclass where ls_id=".$_GET["sid"];
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("删除失败! 错误信息为:".mysql_error());
	  }
	  echo"<script>alert('删除成功');location.href='lx_sm_class.php?id=".$lb_id."&lb_title=".$lb_title."';</script>";
	  
	  case "edit":
$sql="update lxsclass set ls_title='".$_POST["ls_title"]."' where ls_id=".$_POST["ls_id"];
echo $sql;
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("更新失败! 错误信息为:".mysql_error());
	  }
	  echo"<script>alert('更新成功');location.href='lx_sm_class.php?id=".$lb_id."&lb_title=".$lb_title."';</script>";
}
}
?>
<body>
<table class="tableBorder" width="90%" border="1" align="center" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
<tr> 
<td height="27" colspan="4" align="center" background="" bgcolor="#0099CC"><b><font color="#fff">留学视点小类管理</font></b></td>
</tr>
<tr> 
<td width="30%" valign="top" align="center" ><br>
<select name="select" onChange="var jmpURL=this.options[this.selectedIndex].value ; if(jmpURL!='') {window.location=jmpURL;} else {this.selectedIndex=0 ;}" >
<option>选择留学视点大类</option>
        <?php
	  $sql="select * from lxbclass";
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	 
	     if(mysql_num_rows($rs)>=1){
		 $i=0;
		     while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
			 $i=$i+1;
			 ?>
    <option value="lx_sm_class.php?id=<?=$row["lb_id"]?>&lb_title=<?=$row["lb_title"]?>" ><?=$row["lb_title"]?></option>
       <?php }}}?>
       </select>&nbsp;<?php if (isset($lb_id)){echo"当前大类：".$lb_title;}?>
</td>
<td width="70%" > 
<table width="90%" align="center" border="1" cellpadding="1" cellspacing="1">
<tr> 
<td width="13%" align="center">小类ID</td>
<td width="42%" align="center">小类名称</td>

<td width="45%" align="center">确定操作</td>
</tr>
       <?php
        if (@$lb_id==""){
        echo "<div align=center><font color=red>请选择左测的分类</font></div>";}
        else{
//        set rs=server.CreateObject("adodb.recordset")
//        rs.Open "select * from shopxp_stype where shopxpbe_id="&shopxpbe_id&" order by shopxpse_idorder",conn,1,1

      $sql="select * from lxsclass where lb_id=".$lb_id." order by ls_id asc";
	  $rs=mysql_query($sql,$conn);
         if(mysql_num_rows($rs)>=1){
			 $j=0;
		 while($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
			 $j=$j+1;
         ?>
<form name="form<?=$j?>" method="post" action="lx_sm_class.php?action=edit&id=<?=$lb_id?>&lb_title=<?=$lb_title?>">
<tr> 
<td align="center"><?=$row["ls_id"]?></td>
<td align="center"><input name="ls_title" type="text" size="16" value="<?=$row["ls_title"]?>">
  <input name="ls_id" type="hidden" value="<?=$row["ls_id"]?>"></td>

<td align="center">
  <input type="submit" name="Submit" value="修 改">&nbsp;
  <a href="lx_sm_class.php?action=del&sid=<?=$row["ls_id"]?>&id=<?=$lb_id?>&lb_title=<?=$lb_title?>" onClick="return confirm('您确定进行删除操作吗？')"><font color=red>删除</font></a></td>
</tr>
</form>
		<?php }}}?>
</table>
</td>
</tr>
</table><br>
<table class="tableBorder" width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr> 
<td height="26" colspan="4" align="center" background="" bgcolor="#0099CC"><b><font color="#fff">添加留学视点小类</font></b></td>
</tr>
<tr> 
<td width="30%" valign="top" align="center" ><br>
当前大类：<?=$lb_title?></div>
</td>
<td width="70%" > 
<table width="90%" align="center" border="1" cellpadding="1" cellspacing="1">
<tr> 
<td width="25%" align="center">小类名称  </div></td>

<td width="30%" align="center">确定操作</div></td>
</tr>
<form name="formda" method="post" action="lx_sm_class.php?action=add">
<tr> 
<td align="center"> 
  <input name="ls_title" type="text" id="ls_title" size="16">
  <input name="lb_id" type="hidden" value="<?=$lb_id?>">
  <input name="lb_title" type="hidden" value="<?=$lb_title?>"></td>

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