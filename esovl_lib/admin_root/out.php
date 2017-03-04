<?php //退出后台，清除COOKIE
setcookie('admin_root','',1, '/');
setcookie('a_class','',1,'/');
setcookie('a_con','',1,'/');
echo"<script language = javascript>window.open('login.php','_top')</script>";
?>