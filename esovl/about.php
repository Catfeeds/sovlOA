<?php 
include_once("conn.php");

?>
<?php
$sql="select * from cpinfo where cp_id=".$_GET["cid"];
		$rs=mysql_query($sql,$conn);		
		$row=mysql_fetch_assoc($rs);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$row["cp_title"]?>-<?=$z_name?></title>
<meta name="keywords" content="<?php echo $z_keyword?>" />
<meta name="description" content="<?php echo $z_contant?>" />
<link href="css/main2.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="wrapper">
  <div class="yixiu_bz_top">
    <div class="yixiu_bz_logo"><a href="http://<?php echo $_SERVER['SERVER_NAME'];?>"><img src="images/about_02.jpg" width="154" height="108" /></a></div>
    <div class="yixiu_bz_gg"><img src="images/about_05.jpg" width="561" height="19" /></div>
  </div>
  <div class="yixiu_bz_nov">
  	<dl>
    	<dd><a class="ba" href="http://<?php echo $_SERVER['SERVER_NAME'];?>">返回首页</a></dd><dt>|</dt>
         <?php
						$sq1="select * from cpinfo";
						$rs1=mysql_query($sq1);
						if (mysql_num_rows($rs1)>=1){
							$k=0;
							while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){
							$k=$k+1;
			?> 
           	<dd><a class="ba" href="about.php?cid=<?=$row1["cp_id"]?>"><?=$row1["cp_title"]?></a></dd><?php if($k<mysql_num_rows($rs1)){echo "<dt>|</dt>";}?>            <?php }} ?>  
    </dl>
  </div>
  <div class="yixiu_bz_banner"><img src="admin_root/<?=$row["cp_banner"]?>" width="950" height="203" /></div>
  <div class="yixiu_bz_nr">
  	<div class="yixiu_about_cl"><?=$row["cp_info"]?></div>
    <div class="yixiu_bz_bottom">
    	<div class="yixiu_bz_jz">
         <?php
				$sql="select * from cpinfo";
				$rs=mysql_query($sql);
				if (mysql_num_rows($rs)>=1){ 
				$k=0;
				while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
					$k=$k+1;
			?> 
           	<a href="about.php?cid=<?=$row["cp_id"]?>"><?=$row["cp_title"]?></a><?php if($k<mysql_num_rows($rs1)){echo "<span>-</span>";}?>  
            <?php }} ?>  <br />联系电话：<?php echo $z_tel?>  地址：<?php echo $z_address?><br />
                Copyright <span>&copy;</span> 2010, 版权所有 <?php echo $z_name?>  <?php echo $z_icp?></div>            	
           
    </div>
  </div>
</div>
</body>
</html>
