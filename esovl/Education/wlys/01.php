<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once("../../conn.php");

include_once("../xl_webstep.php");
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<base href="http://<?php echo $_SERVER['SERVER_NAME'];?>/">
<link href="../../css/css.css" rel="stylesheet" type="text/css" />
<link href="../../css/top.css" rel="stylesheet" type="text/css" />
<link href="../../css/main.css" rel="stylesheet" type="text/css" />
<link href="../../css/bottom.css" rel="stylesheet" type="text/css" />
<script src="../../js/style.js"></script>
<link href="../../css/main2.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="wrapper">
  <div class="main">
    <div class="main_xl_pro">
      <div class="main_xllb">
        <div class="wrapper">
          <!-- top -->
          <div class="top">
            <?php 
	include("../../top/top_1.html");
	include("../../top/xl_top.html");
	?>
          </div>
          <!-- top End -->
          <!-- main -->
          <div class="main">
            <div class="wl-wy">
                  <div class="wl-tz"><input type="button" onclick="goleft()" value="左" /></div>
                  
                        <div class="wl-wk">
                          <div class="wl-nk"><img src="<?=$z_website?>images/wl-tz_08.jpg" /></div>                          
                          <div class="wl-nk-contant">                          
                          	<div class="wl_xytj_list">
       <?php
		$sql="select * from school order by s_id desc";
		$rs=mysql_query($sql,$conn);
		$row=mysql_fetch_assoc($rs);			
		?>
        		<div id="demomain">
                    <div id="indemomain">
                      <div id="demo1main">
        					<div class="wl_xytj_list_gd">
                      <div class="tz-tu"><a href="school/?sid=<?=$row['s_id']?>" target="_blank"><img src="<?=$z_website?>admin_root/<?php echo $row['s_logo'];?>" onload="javascript:DrawImage(this);" /></a></div>
                            <div class="tz-bt"><a href="<?=$z_website?>school/?sid=<?=$row['s_id']?>" target="_blank"><?php echo $row['s_name']; ?></a></div>
                            <div class="tz-wz"><?php echo $row['s_xyjs'];?></div>
                            <div class="tz-xx"></div>
                            <?php $row=mysql_fetch_assoc($rs);?>
                            <div class="tz-tu"><a href="<?=$z_website?>school/?sid=<?=$row['s_id']?>" target="_blank"><img src="<?=$z_website?>admin_root/<?php echo $row['npic'];?>" /></a></div>
                            <div class="tz-bt"><a href="<?=$z_website?>school/?sid=<?=$row['s_id']?>" target="_blank"><?php echo $row['s_name']; ?></a></div>
                            <div class="tz-wz"><?php echo $row['s_xyjs'];?></div>
                            <div class="tz-xx"></div>
                            </div>
                      </div>
                      <div id="demo2main"></div>
                      </div>
                  </div>    
                            
                            <div class="tz-an">
                              <input name="input" type="image" src="<?=$z_website?>images/wl-tz_17.jpg" onclick="goleft()" />
                            </div>
                            <div class="tz-an" style="margin-left:10px;">
                              <input name="input" type="image" src="<?=$z_website?>images/wl-tz_19.jpg" />
                            </div>
                          </div>
                          
                          
                          <div class="wl-nk-bommom"><img src="<?=$z_website?>images/wl-tz_23.jpg" /></div>
                        </div>
                      </div>
                      <script src="../../js/lright.js" type="text/javascript"></script>                    
                  <div class="wl-tz-bommom"><img src="<?=$z_website?>images/wl-tz_25.jpg" /></div>
                </div>
          </div>
          <!-- main End -->
          <!-- bottom -->
          <?php include("../../bottom/bottom.html");?>
          <!-- bottom End -->
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>