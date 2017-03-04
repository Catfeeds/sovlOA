<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">  
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
</head>  
<body>  
<?php   
$this->layout = 'none';  
echo $script;   
$regerurl="http://".$_SERVER['HTTP_HOST'].Yii::app()->createUrl("site/reger");
$loginurl="http://".$_SERVER['HTTP_HOST'].Yii::app()->createUrl("site/login");

if (Yii::app()->request->urlReferrer&&Yii::app()->request->urlReferrer!=$regerurl&&Yii::app()->request->urlReferrer!=$loginurl){
	$returnArr=array("title"=>'上一页',"returnUrl"=>Yii::app()->request->urlReferrer);
}else{
	$returnArr=array("title"=>'首页',"returnUrl"=>Yii::app()->homeUrl);
}
?>  

<script type="text/javascript">setTimeout('location.href="<?php echo $returnArr['returnUrl'] ?>"',3000);</script>  
退出成功，正在返回<?=$returnArr['title']?>...  
</body>  
</html> 