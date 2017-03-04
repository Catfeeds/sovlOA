<?php
include("../conn.php");
include("mb_step.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_SESSION["s_name"];?>-首页</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/top.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/bottom.css" rel="stylesheet" type="text/css" />
<script src="js/js.js" type="text/javascript"></script>
</head>
<?php
 if (isset($_POST["wd_ask"])){
 $rsa=mysql_query("select * from wdonline where wd_ask='".$_POST["wd_ask"]."'",$conn);
      if (mysql_num_rows($rsa)>=1){
	  echo"<script>alert('已存在相同的问题,请勿重复提交!');</script>";
	   echo"<meta http-equiv='refresh' content='0; url=index.php'>";
	  }else{
		  $sql="insert into wdonline set s_name='".$_SESSION["s_name"]."',wd_nc='游客',wd_ask='".$_POST["wd_ask"]."',wd_stime=now()";	  
		  $rs=mysql_query($sql,$conn);
		  if ($rs){
		   echo"<script>alert('提问已发出,请等待管理员的审核回复!');</script>";
		   echo"<meta http-equiv='refresh' content='0; url=index.php'>";
		  }else{	  
		  exit("添加失败! 错误信息为:".mysql_error());
		  }
	   }
  }
  ?>
<body>
<div class="wrapper">

<!-- top -->
<?php include("mb_top.html");?>
<!-- top end -->

<!-- main -->
<div class="main">
  <div class="main_box01">
  	<div class="main_box01_left">
    	<div class="main_box01_left_01"><span><a href="mb_n_list.php?class=1">公告栏</a></span></div>
        <div class="main_box01_left_02">
        	<div class="main_box01_left_02_list01">
            	
				   	<?php
						$sql="select * from mbnews where nclass=1 and s_name='".$_SESSION["s_name"]."' order by ndate desc limit 4";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
						?>
         <dl>
         <dt><img src="images/jd_l_fk.jpg" /></dt>
         <dd><a href="mb_n_detail.php?id=<?php echo $row["nid"];?>"><?php if (strlen($row["ntitle"])>42){echo msubstr($row["ntitle"],42)."...";}else{echo $row["ntitle"];}?></a></dd>
         </dl>             
                        <?php
						}}
						?>
				
               
            </div>
            <div class="main_box01_left_02_list02">
            	<div class="main_box01_left_02_list02_tel"><img src="images/jd_tel.jpg" align="left"/><span style="font-size:30px; color:#0099CC; height:50px; line-height:50px;"><strong><?php echo $mb_tel;?></strong></span></div>
                <div class="main_box01_left_02_list02_dz" style="margin-top:15px;">地址：<?php echo $mb_adderss;?></div>
                <div class="main_box01_left_02_list02_wsbm"><a href="mb_wsbm.php"><img src="images/jd_wsbm.jpg" /></a></div>
            </div>
        </div>
        <div class="main_box01_left_03"><img src="images/jd_title_bottom.jpg" /></div>
    </div>
    <div class="main_box01_right">
    	<div class="main_box01_right_pic"><?php include("Mb_flash.html");?></div>
    </div>
  </div>
  <div class="main_box02">
  	<div class="main_box02_left">
    	<div class="main_box02_left_box">
        	<div class="main_box02_left_box01">
            	<div class="main_box02_left_box01_title">
                	<div class="main_box02_left_box01_title00"><a href="mb_n_list.php?class=6">招生简章</a></div>
                </div>
                <div class="main_box02_left_box01_list">
                	<ul>
					
					<?php
						$sql="select * from mbnews where nclass=6 and s_name='".$_SESSION["s_name"]."' order by ndate desc limit 4";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
						?>
            <li><a href="mb_n_detail.php?id=<?php echo $row["nid"];?>"><?php if (strlen($row["ntitle"])>28){echo msubstr($row["ntitle"],28)."...";}else{echo $row["ntitle"];}?></a></li>
                    <?php }}?>
                    </ul>
                </div>
            </div>
            
            <div class="main_box02_left_box01">
            	<div class="main_box02_left_box01_title">
                	<div class="main_box02_left_box01_title00"><a href="mb_mnt_updown.php">模拟题下载</a></div>
                </div>
                <div class="main_box02_left_box02_list">
                	<ul>
					<?php
						$sql="select * from mb_download where w_dclass='模拟题下载' and s_name='".$_SESSION["s_name"]."' order by w_id desc limit 5";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
					?>
         <li><a href="../admin_root/<?php echo $row["w_con"];?>"><?php if (strlen($row["w_title"])>42){echo msubstr($row["w_title"],42)."...";}else{echo $row["w_title"];}?></a></li>
                    <?php }}?>
                    </ul>
                </div>
            </div>
            
            <div class="main_box02_left_box01">
            	<div class="main_box02_left_box01_title">
                	<div class="main_box02_left_box01_title00"><a href="mb_n_list.php?class=9">常见问题</a></div>
                </div>
                <div class="main_box02_left_box01_list">
                	<?php
						$sql="select * from mbnews where nclass=9 and s_name='".$_SESSION["s_name"]."' order by ndate desc limit 3";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
						?>
					<dl>
                    <dt><a href="mb_n_detail.php?id=<?php echo $row["nid"];?>"><?php if (strlen($row["ntitle"])>38){echo msubstr($row["ntitle"],38)."...";}else{echo $row["ntitle"];}?></a></dt>
                    <dd><?php if (strlen($row["ncon"])>100){echo msubstr($row["ncon"],100)."...";}else{echo $row["ncon"];}?></dd>
                    </dl>
                    <?php }}?>
                </div>
            </div>
            
        </div>
    </div>
    <div class="main_box02_center">
    	<div class="main_box02_center_box01">
        	<div class="main_box02_center_box01_title">
            	<dl>
                <dd><img src="images/new_ico.jpg" /></dd>
                <dd>新闻资讯</dd>
                <dt><a href="mb_news_list.php">MORE>></a></dt>
                </dl>
            </div>
            <div class="main_box02_center_box01_list">
           	  <div class="main_box02_center_box01_list_pic00">
           	    <div class="main_box02_center_box01_list_pic">
                  <?php 
	$sqll="select * from tpnews where s_name='".$_SESSION["s_name"]."' and ne_bool=1 limit 1";
	$rss=mysql_query($sqll,$conn);
	if (!$rss){  
	exit("数据库操作失败! 错误信息为:".mysql_error());
	}
	  
	 if (mysql_num_rows($rss)>=1){
	 $row1=mysql_fetch_array($rss,MYSQL_ASSOC);	 
	?>
                  <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="center" valign="middle"><a href="mb_news_show.php?id=<?php echo $row1["ne_id"];?>"><img src="../admin_root/<?php echo $row1["ne_pic"];?>" border="0" align="top" onLoad="javascript:if(this.width>=this.height&&this.width>=136){this.width=136};if(this.height>this.width&&this.height>=136){this.height=136};"/></a> </td>
                    </tr>
                  </table>
                  <?php }?>
       	        </div>
           	  </div>
            	<div class="main_box02_center_box01_list_box">
                <?php if (mysql_num_rows($rss)>=1){?>
                	<div class="main_box02_center_box01_list_box01">
                    	<dl>
                <dt><a href="mb_news_show.php?id=<?php echo $row1["ne_id"];?>"><?php if (strlen($row1["ne_name"])>42){echo msubstr($row1["ne_name"],42)."...";}else{echo $row1["ne_name"];}?></a></dt>
                <dd><?php if (strlen($row1["ne_info"])>88){echo msubstr($row1["ne_info"],88)."..";}else{echo $row1["ne_info"];}?></dd>
                        </dl>
                    </div>
                <?php }else{echo "暂无信息!";}?>
                    <div class="main_box02_center_box01_list_box02">
      <?php 
	  $sql="select * from tpnews where s_name='".$_SESSION["s_name"]."' and ne_bool=1 limit 1,5";
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	  
	 if (mysql_num_rows($rs)>=1){
	 $i=0;
	 while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
     $i=$i+1;
	 ?>
		<dl>
        <dt><img src="images/jd_l_fk.jpg" /></dt>
       <dd><a href="mb_news_show.php?id=<?php echo $row["ne_id"];?>"><?php if (strlen($row["ne_name"])>46){echo msubstr($row["ne_name"],46)."...";}else{echo $row["ne_name"];}?></a></dd>
        </dl>
        <?php }}?>
                        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="main_box02_center_box01">
          <div class="main_box02_center_box01_title">
            <dl>
              <dd><img src="images/zsdt_ico.jpg" /></dd>
              <dd>招生动态</dd>
              <dt><a href="mb_n_list.php?class=5">MORE>></a></dt>
            </dl>
          </div>
          <div class="main_box02_center_box01_list_zsdt">
                	<?php
						$sql="select * from mbnews where nclass=5 and s_name='".$_SESSION["s_name"]."' order by ndate desc limit 4";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
						?>
					<dl>
                    <dt><img src="images/jd_dot_s.jpg" /></dt>
                    <dd><a href="mb_n_detail.php?id=<?php echo $row["nid"];?>"><?php if (strlen($row["ntitle"])>60){echo msubstr($row["ntitle"],60)."...";}else{echo $row["ntitle"];}?></a></dd>
                    <dt style="float:right; width:60px; margin-right:0;"><?php echo  time_tran($row["ndate"]);?></dt>
                    </dl>
					<?php }}?>
          </div>
           
            
        </div>
        
        <div class="main_box02_center_box01">
        	<div class="main_box02_center_box01_title">
            	<dl>
                <dd><img src="images/zxwd_ico.jpg" /></dd>
                <dd>在线问答</dd>
                <dt><a href="mb_zxwd.php">MORE>></a></dt>
                </dl>
            </div>
            <div class="main_box02_center_box01_list">
            	<div class="main_box02_center_box01_list_zxwd">
     <?php 
	  $sql="select * from wdonline where s_name='".$_SESSION["s_name"]."' and wd_bool=1 order by wd_stime desc limit 2 ";
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	  if (mysql_num_rows($rs)>=1){
	  while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
	      $rs1=mysql_query("select * from school where s_name='".$row["s_name"]."'",$conn); 
		  $row1=mysql_fetch_assoc($rs1);
		  				
            $rs2=mysql_query("select * from kkinfo where s_id=".$row1["s_id"]." limit 1");
			$row2=mysql_fetch_assoc($rs2);
	  ?>   
		<dl><dt><img src="images/jd_dot_s.jpg" width="8" height="7" /><span>问:</span><a href="mb_zxwd.php"><?php if (strlen($row["wd_ask"])>62){echo msubstr($row["wd_ask"],62)."...";}else{echo $row["wd_ask"];}?></a></dt>
                        <dd>答：<?php if (strlen($row["wd_answer"])>62){echo msubstr($row["wd_answer"],62)."...";}else{echo $row["wd_answer"];}?></dd>
                  </dl>
      <?php }}?>      
                </div>
                <div class="main_box02_center_box01_list_zxwd_text">
				<form name="wdform" method="post" action="">
                	<div class="main_box02_center_box01_list_zxwd_text_01"><textarea name="wd_ask" cols="" rows=""></textarea></div>
                    <div class="main_box02_center_box01_list_zxwd_text_02"><input name="" type="submit" value="提&nbsp;交" onclick="if(document.wdform.wd_ask.value==''){alert('请填表写您的问题!');document.wdform.wd_ask.focus();return false;}"/></div>
				</form>
                </div>
                
            </div>
        </div>

    </div>
    <div class="main_box02_right">
    	<div class="main_box02_right_01">
    	<div class="main_box02_right_box01"><a href="#"><img src="images/jd_jxj.jpg" /></a></div>
        
        <div class="main_box02_right_box02">
        	<div class="main_box02_right_box02_list">
        	  <div class="main_box02_right_box02_list_text">
			  <div class="main_box02_right_box02_list_title"><a href="mb_fc_list.php?tsclass=teacher"><span>名师介绍</span></a></div>
                	<?php
						$sql="select * from tsfencai where ts_class='teacher' and s_name='".$_SESSION["s_name"]."' order by ts_date desc limit 3";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
						    while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
					?>
					
					
					<div class="main_box02_right_box02_list_text_box">
                    	<div class="main_box02_right_box02_list_text_box_pic">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td align="center" valign="middle">
<a href="mb_fc_show.php?tsid=<?php echo $row["ts_id"];?>"><img src="../admin_root/<?php echo $row["ts_pic"];?>" border="0" align="top" onload="if(this.width>=55){width=55}"/></a>
</td>
</tr>
</table>                         
                        </div>
                        <div class="main_box02_right_box02_list_text_box_list">
                        	<dl>
                            <dt><?php echo $row["ts_name"];?></dt>
                            <dd><?php echo $row["ts_zy"];?></dd>
                            </dl>
                        </div>
                    </div>                
                    <?php }}?>                    
              </div>
            </div>
            <div class="main_box02_right_box02_list" style="border-top:1px solid #8db2ff;">
            	<div class="main_box02_right_box02_list_title"><a href="mb_fc_list.php?tsclass=student"><span>学员风采</span></a></div>
                <div class="main_box02_right_box02_list_text">
                	<?php
						$sql="select * from tsfencai where ts_class='student' and s_name='".$_SESSION["s_name"]."' order by ts_date desc limit 3";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
						?>
					
					<div class="main_box02_right_box02_list_text_box">
                    	<div class="main_box02_right_box02_list_text_box_pic">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td align="center" valign="middle">
<a href="mb_fc_show.php?tsid=<?php echo $row["ts_id"];?>"><img src="../admin_root/<?php echo $row["ts_pic"];?>" border="0" align="top" /></a>
</td>
</tr>
</table>                         
                        </div>
                        <div class="main_box02_right_box02_list_text_box_list">
                        	<dl>
                            <dt><?php echo $row["ts_name"];?></dt>
                            <dd><?php echo $row["ts_zy"];?></dd>
                            </dl>
                        </div>
                    </div>
                
                    <?php }}?>
              </div>
            </div>
        </div>
        
        
        </div>
        
    </div>
  </div>
</div>
<!-- main end -->

<!-- bottom -->
<?php include("mb_bottom.html");?>
<!-- bottom end -->
</div>
</body>
</html>