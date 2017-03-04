<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>mian_top</title>
<link href="images/root.css" rel="stylesheet" type="text/css" />
</head>

<?php	
if(empty($_COOKIE['admin_root'])){
echo"<script language = javascript>window.open('Login.php','_top')</script>";
}
?>
<body>
<div class="top"><img src="images/logo_001.jpg" /></div>
</body>
</html>
