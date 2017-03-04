<?php
include("../conn.php");
include("mb_step.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_SESSION["s_name"];?>-在线问答</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/top.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/bottom.css" rel="stylesheet" type="text/css" />
<script src="js/js.js" type="text/javascript"></script>
</head>

<body>
<?php
 if (isset($_POST["wd_ask"])){
 $rsa=mysql_query("select * from wdonline where wd_ask='".$_POST["wd_ask"]."'",$conn);
      if (mysql_num_rows($rsa)>=1){
	  echo"<script>alert('已存在相同的问题,请勿重复提交!');</script>";
	   echo"<meta http-equiv='refresh' content='0; url=mb_zxwd.php'>";
	  }else{
		  $sql="insert into wdonline set s_name='".$_SESSION["s_name"]."',wd_nc='".$_POST["wd_nc"]."',wd_ask='".$_POST["wd_ask"]."',wd_stime=now()";	  
		  $rs=mysql_query($sql,$conn);
		  if ($rs){
		   echo"<script>alert('提问已发出,请等待管理员的审核回复!');</script>";
		   echo"<meta http-equiv='refresh' content='0; url=mb_zxwd.php'>";
		  }else{	  
		  exit("添加失败! 错误信息为:".mysql_error());
		  }
	   }
  }
  ?>
<div class="wrapper">

<!-- top -->
<?php include("mb_top.html");?>
<!-- top end -->

<!-- main -->
<div class="main">
  <div class="main_wsbm">
  	<div class="main_wsbm_box01"><img src="images/jd_wsbm_topbg.jpg" /></div>
    <div class="main_wsbm_box">
    	<div class="main_wsbm_box_left">
        	<div class="main_wsbm_box_left_box01"><img src="images/jd_left_topbg.jpg" /></div>
            <div class="main_wsbm_box_left_box">	
            	<div class="main_wsbm_box_left_box_list">
                	<div class="main_wsbm_box_left_box_list01">在线问答</div>
                    <div class="main_zxwd">
                    	<div class="main_zxwd_box01">
                        <form name="wdform" method="post" onsubmit="return mb_zxwd()" action="">
                          <h1>您有什么问题请在此回答，我们会尽快为您回复</h1>
                          <div class="zxwd_feedback">
                            <dl>
                              <dt>昵称</dt>
                              <dd>
                                <h4>
                                  <?php if(isset($_COOKIE["vipname"])){?>
                                  <input type="text" value="<?php echo $_COOKIE["vipname"];?>" name="wd_nc" />
                                  <?php }else{?>
                                  <input type="text" value="游客" onclick="this.value=''" name="wd_nc" />
                                  <?php }?>
                                </h4>
                                <span></span> </dd>
                            </dl>
                            <dl style="height:100px;">
                              <dt>提问内容</dt>
                              <dd style="height:100px;">
                                <textarea name="wd_ask" style="font-family:Arial, Helvetica, sans-serif"></textarea>
                              </dd>
                            </dl>
                          </div>
                          <div class="zxwd_tj_anniu">
                            <input name="image" type="image" src="images/tj.jpg" />
                          </div>
                        </form>
                      </div>
					  
					                        <?php
$pagesize=6;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
$numq=mysql_query("SELECT * FROM wdonline where s_name='".$_SESSION["s_name"]."' and wd_bool=1");
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数

if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
      @$sql="select * from wdonline where s_name='".$_SESSION["s_name"]."' and wd_bool=1 order by wd_id desc limit $page $pagesize ";     
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }			 
?>
                        <div class="main_zxwd_box02">
                            	<?php 
	 if (mysql_num_rows($rs)>=1){
	 $i=0;
	 while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
     $i=$i+1;	 
						?>	  
						  
						  
			        <div class="main_zxwd_box02_list">
                            	<div class="main_zxwd_box02_list_box01">
                                	<dl>
                                	  <dt>网友：<strong><?php echo $row["wd_nc"];?></strong></dt><dd><?php echo time_tran($row["wd_stime"]);?></dd></dl>
                                </div>
                                <div class="main_zxwd_box02_list_box02">
                                	<dl>
                                    	<dt><?php echo $row["wd_ask"];?></dt>
                                        <dd><strong>【在线回复】</strong><?php echo $row["wd_answer"];?></dd>
                                    </dl>
                                </div>
                    </div>                           
                            
                            
              <?php }}?>  
                      </div>
                        <div class="main_zxwd_box03">
                        	<dl>

<?php
//echo "共 $num 条信息";
if($num > $pagesize){
 if(@$pageval<=1)$pageval=1;


  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo"<dd> <a href=$url?page=".($pageval-1)."><</a></dd>";
}else{echo"<dd><a><</a></dd>";}
    for ($i=1;$i<=$cp;$i++){
	     if ($i==@$_GET["page"]){
		 echo " <dt><a>".$i."</a></dt> ";
		 }else{
	     echo "<dd> <a href=$url?page=".$i.">".$i."</a> </dd>";
		 }
	}
if(@$_GET["page"]<$cp){
echo "<dd> <a href=$url?page=".($pageval+1).">></a></dd>";
}else{echo"<dd><a>></a></dd>";}

} 
	 ?>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main_wsbm_box_left_box01"><img src="images/jd_left_bottombg.jpg" /></div>
        </div>
        <div class="main_wsbm_box_right">
        	<div class="main_wsbm_box_right_list">
            	<div class="main_wsbm_box_right_list_top"><span>在线服务</span></div>
                <div class="main_wsbm_box_right_list_cen">
<div class="main_zxwd_sever">
                    	<div class="main_zxwd_sever_box01">
                        	<ul>
                            <li>客服QQ：</li>
                            <li><a href=tencent://message/?uin=<?php echo $qq1;?>&Site=<?php echo $z_name;?>&Menu=yes title="在线咨询1"><img border="0" src=http://wpa.qq.com/pa?p=1:<?php echo $qq1;?>:1 align="top"/></a></li>
                            <li><a href=tencent://message/?uin=<?php echo $qq2;?>&Site=<?php echo $z_name;?>&Menu=yes title="在线咨询2"><img border="0" src=http://wpa.qq.com/pa?p=1:<?php echo $qq2;?>:1 align="top"/></a></li>
                            </ul>                            
                    </div>
                    <div class="main_zxwd_sever_box02">
           				  <div class="main_box01_left_02_list02_tel_r"><img src="images/jd_tel.jpg" style="float:left;"/><span style="display:block;height:40px; font-size:20px;line-height:40px;color:#0099CC;"><strong><?php echo $mb_tel;?></strong></span></div>
               			  <div class="main_box01_left_02_list02_dz_r">地址：<?php echo $mb_adderss;?></div>
                    </div>
                  </div>
                </div>
                <div class="main_wsbm_box_right_list_bottom"><img src="images/right_bottombg.jpg" /></div>
            </div>
        	
        	<div class="main_wsbm_box_right_list">
            	<div class="main_wsbm_box_right_list_top"><span>常见问题</span></div>
                <div class="main_wsbm_box_right_list_cen">
                  <div class="main_wsbm_box_right_list_cen_text">
                    <div class="main_zxwd_right01">
                      <ul>
                       <?php
						$sql="select * from mbnews where nclass=9 and s_name='".$_SESSION["s_name"]."' order by ndate desc limit 5";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
						?>
			<li><a href="mb_n_detail.php?id=<?php echo $row["nid"];?>"><?php if (strlen($row["ntitle"])>38){echo msubstr($row["ntitle"],38)."...";}else{echo $row["ntitle"];}?></a></li>
                        <?php }}?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="main_wsbm_box_right_list_bottom"><img src="images/right_bottombg.jpg" /></div>
            </div>
        </div>
    </div>
    <div class="main_wsbm_box02"><img src="images/jd_wsbm_bottombg.jpg" /></div>
  </div>
</div>
<!-- main end -->

<!-- bottom -->
<?php include("mb_bottom.html");?>
<!-- bottom end -->


</div>

</body>
</html>
