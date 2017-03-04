<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once("../../conn.php");

include_once("wl_webstep.php");
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$wl_title?></title>
<meta name="keywords" content="<?=$wl_keyword?>" />
<meta name="description" content="<?=$wl_contant?>" />
<base href="http://<?php echo $_SERVER['SERVER_NAME'];?>/">
<link href="../../css/css.css" rel="stylesheet" type="text/css" />
<link href="../../css/top.css" rel="stylesheet" type="text/css" />
<link href="../../css/main.css" rel="stylesheet" type="text/css" />
<link href="../../css/bottom.css" rel="stylesheet" type="text/css" />
<script src="../../js/style.js"></script>
<link href="../../css/main2.css" rel="stylesheet" type="text/css" />
</head>

<body>
        <?php
		$sql="select * from mb_step join school on mb_step.s_name=school.s_name where mb_step.mb_tj=1 order by mb_step.mb_id desc";
		$rs=mysql_query($sql,$conn);
		$row=mysql_fetch_assoc($rs);		
		?>
        		<div id="demomain">
                    <div id="indemomain">
                      <div id="demo1main">
        					
                            <div class="wl_xytj_list_gd2">
                            <?php 
							$row=mysql_fetch_assoc($rs);
							for($i=0;$i<2;$i++){
							?>
                            <div class="tz-tu">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td align="center" valign="middle">
<a href="school/?sid=<?=$row['mb_id']?>" target="_blank"><img src="<?=$z_website?>admin_root/<?php echo $row['mb_logo'];?>" onload="if(this.width>92){this.width=92}" border="0" align="top"/></a>
</td>
</tr>
</table>
                            </div>
                            <div class="tz-bt"><a href="<?=$z_website?>school/?sid=<?=$row['mb_id']?>" target="_blank"><?php echo $i.$row['s_name']; ?></a></div>
                            <div class="tz-wz"><?php echo strip_tags($row['s_xyjs']);?></div>
                            <?php }?>
                            </div>                            
                      </div>                      
                      <div id="demo2main">
                       </div>
                      </div>           
                  
                  </div>    
                            <div class="tz-an">
                              <input name="input" type="image" src="<?=$z_website?>images/wl-tz_17.jpg" onclick="goleft()" />
                            </div>
                            <div class="tz-an" style="margin-left:10px;">
                              <input name="input" type="image" src="<?=$z_website?>images/wl-tz_19.jpg" onclick="goright()" />
                            </div>
                          <script src="../../js/lright.js" type="text/javascript"></script> 
</body>
</html>