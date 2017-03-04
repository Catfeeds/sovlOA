<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
$WebID=@$webId?$webId:"1";
$web=getWeb($WebID);
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$web['z_title']?></title>
<meta name="keywords" content="<?=$web['z_keyword']?>" />
<meta name="description" content="<?=$web['z_contant']?>" />
<link href="/css/css.css" rel="stylesheet" type="text/css" />
<link href="/css/top.css" rel="stylesheet" type="text/css" />
<link href="/css/main.css" rel="stylesheet" type="text/css" />
<link href="/css/main2.css" rel="stylesheet" type="text/css" />
<link href="/css/bottom.css" rel="stylesheet" type="text/css" />
<script src="/js/style.js"></script>
<script src="/js/xl_fuction.js"></script>
<SCRIPT src="/js/Comm.js"></SCRIPT>
<script src="/js/downHttp.js"></script>
</head>