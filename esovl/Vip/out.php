<?php
include '../config.inc.php';
include '../uc_client/client.php';
echo uc_user_synlogout();
echo"<script language=javascript>location.href='/vip_login.php';</script>";
?>