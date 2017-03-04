<?php
include("../conn.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>??</title>
</head>

<body bgcolor="#FFFFFF">
<table width="90%" cellpadding="0" border="0" bgcolor="#a8c7ce" style="color:#333; font-size:12px; line-height:22px;">
<tr>
<td align="center" bgcolor="#a8c7ce"> 资料标题</td>
<td align="center" bgcolor="#a8c7ce">资料内容</td>
<td align="center" bgcolor="#a8c7ce">资料操作</td>
<?php
//??????
$sql="select * from yx_down";
//?
$result=mysql_query($sql) or die($sql);
//?
while($read=mysql_fetch_array($result))
{
	?>
    <tr bgcolor="#FFFFFF"><td align="center"><?php echo $read['down_title'];?></td>
	<td align="center"><?php echo $read['w_con'];?></td>
	<td align="center"><a href="yx_down_update.php?id=<?php echo $read["down_id"];?>">修改</a>↖↗<a href="yx_delete.php?id=<?php echo $read['down_id'];?>">删除</a></td>
	</tr>
    <?php
}
?>
</table>
</body>
</html>
