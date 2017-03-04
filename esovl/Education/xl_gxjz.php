<?php 
include_once("../conn.php");

include_once("xl_webstep.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>学历高校简章-<?php echo $z_name;?></title>
<meta name="keywords" content="<?php echo $z_keyword?>" />
<meta name="description" content="<?php echo $z_contant?>" />
<base href="http://<?php echo $_SERVER['SERVER_NAME'];?>">
<link href="../css/css.css" rel="stylesheet" type="text/css" />
<link href="../css/top.css" rel="stylesheet" type="text/css" />
<link href="../css/main.css" rel="stylesheet" type="text/css" />
<link href="../css/bottom.css" rel="stylesheet" type="text/css" />
<script src="js/style.js"></script>
<SCRIPT language=javascript>
<!--
var ss=0;
function left_menu(meval)
{
  var left_n=document.getElementById(meval);
   // if(ss!=0&&ss!=left_n){ ss.style.display='none';}
//  ss=left_n;  
  
  if (left_n.style.display=='none')//js 中等于和赋值是不一样的号
  { left_n.style.display='';}
  else  
  { left_n.style.display='none';}
 
}
-->
</SCRIPT>
<SCRIPT language=javascript>
<!--
var pp=0;
function opc(me)
{ 
 // if(pp!=0&&pp!=me){ document.getElementById(pp).innerHTML='打开↓';}
//  pp=me; 
 
 if (document.getElementById(me).innerHTML=='打开↓'){
     document.getElementById(me).innerHTML='收起↑';
     }else{
    document.getElementById(me).innerHTML='打开↓';
 }
 
}
-->
</SCRIPT>
</head>

<body>

<div class="wrapper">

<!-- top -->
<div class="top">
	<?php 
	include("../top/top_1.html");
	include("../top/xl_top.html");
	?>    
</div>
<!-- top End -->

<!-- main -->
<div class="main">
	<div class="main_xl_pro">
    
    	<div class="main_xl_pro_box01">
        	<div class="main_xl_pro_box01_left">
			
			<?php
		$sql="select * from xl_s_h limit 3";
        $rs=mysql_query($sql);
        //$row=mysql_fetch_assoc($rs);
		?>
        	<div class="right_box01">

            	<div class="main_xl_pro_box01_left_pic">
				<?php
				$i=0;
				while ($row=mysql_fetch_assoc($rs)){
				$i=$i+1;
				?>
         <div id="tbc_0<?php echo $i;?>" class=""><a href="<?php echo $row["s_h_http"];?>"><img src="admin_root/<?php echo $row["s_h_pic"];?>"/></a></div>
				<?php }	?>
				</div>
				
                <div class="main_xl_pro_box01_left_text">
                	<ul>
				<?php
				$sql="select * from xl_s_h limit 3";
                $rs=mysql_query($sql); 
				$j=0;
				while ($row=mysql_fetch_assoc($rs)){
				$j=$j+1;
				?>
<li id="tb_<?php echo $j;?>" <?php if($j!=1){echo "class='normaltab1'";}else{echo "class='hovertab1'";}?> onmouseover="HoverLi(3);OvHoverLi(<?php echo $j;?>);">·<a href="<?php echo $row["s_h_http"];?>"><?php echo $row["s_h_title"];?></a></li>
				<?php }?>
                    </ul>
                </div>
				
<script type="text/javascript">
function g(o){return document.getElementById(o);}
function HoverLi(n){
for(var i=1;i<=3;i++){g('tb_'+i).className='normaltab1';g('tbc_0'+i).className='undis';}g('tbc_0'+n).className='dis';g('tb_'+n).className='hovertab1';
}
function OvHoverLi(n){
for(var i=1;i<=3;i++){g('tb_'+i).className='normaltab1';g('tbc_0'+i).className='undis';}g('tbc_0'+n).className='dis';g('tb_'+n).className='hovertab1';
}
</script>	

            </div>
            </div>
            <div class="main_xl_pro_box01_right">
            	<ul>
	<?php 
	  $sql="select * from luqu order by lq_date desc limit 5 ";     
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	  if (mysql_num_rows($rs)>=1){
	while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
	     $rs1=mysql_query("select s_name from school where s_id=".$row["s_id"],$conn); 
		  $row1=mysql_fetch_assoc($rs1);
		  				
           $rs2=mysql_query("select * from kkinfo where s_id=".$row["s_id"]." limit 1");
			$row2=mysql_fetch_assoc($rs2);
	  ?>
     <li>·<a href="Education/xl_pro_detail.php?kid=<?php echo $row2["kid"];?>&sid=<?php echo $row["s_id"];?>"><?php echo $row1["s_name"];?></a></li>
                <?php }}?>
                </ul>
            </div>
        </div>
    	<div class="main_xl_pro_box02">
        	<div class="main_xl_pro_box02_title">
            	<dl>
                <dt><a href="Education/xl_gxjz.php">高校简章</a></dt>
           	    <dd><a href="Education/">学历教育</a></dd>
                <dd><a href="Education/zxks/">自学考试</a></dd>
                <dd><a href="Education/wlys/">网络院校</a></dd>
                <dd><a href="Education/crgk/">成人高考</a></dd>
                <dd><a href="Education/gjbx/">国际办学</a></dd>
                <dd><a href="Education/xl_pro_search.php">简章搜索</a></dd>
                <dd><a href="Education/gfb/">高复班</a></dd>
                </dl>                            
            </div>
            <div class="main_xl_pro_box02_list">
			<form name="soform" method="get" action="Education/xl_pro_search.php">
            	<div class="main_xl_pro_box02_list00">
                	<ul>
                    	<li>
                        <select name="sschool" style="width:170px;">
                          <option value="">选择学校</option>
		 <?php
	     $rs=mysql_query("select * from school");
	  
	     if(mysql_num_rows($rs)>=1){		 
		 while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
						  ?>
                          <option value="<?php echo $row["s_id"]?>"><?php echo $row["s_name"]?></option>
						  <?php }}
						  mysql_free_result($rs);
						  ?>
                        </select>
                        </li>
                        <li>
                          <select name="szyclass"> 
						  <option value="">选择专业类别</option>
						   <?php
	     $rs=mysql_query("select * from xlcal");
	  
	     if(mysql_num_rows($rs)>=1){		 
		 while ($row=mysql_fetch_assoc($rs)){
						  ?>
                            <option value="<?php echo $row["zy_class"];?>"><?php echo $row["zy_class"];?></option>
							 <?php }}
						  mysql_free_result($rs);
						  ?>
                          </select>
                        </li>
                        <li>
                          <select name="szyname">
                            <option value="">选择专业</option>
							 <?php
	     $rs=mysql_query("select * from xlmc");
	  
	     if(mysql_num_rows($rs)>=1){		 
		 while ($row=mysql_fetch_assoc($rs)){
						  ?>
                            <option value="<?php echo $row["mc_title"];?>"><?php echo $row["mc_title"];?></option>
							 <?php }}
						  mysql_free_result($rs);
						  ?>
                          </select>
                        </li>
                        <li><input name="skey" type="text" /></li>
                        <li><img src="<?=$z_website?>images/ss_pro.jpg" onclick="document.soform.submit();" style="cursor:pointer;"/></li>
                    </ul>
                    <h1><a href="#">高级搜索</a><br />
                    <a href="#">使用帮助</a></h1>
              </div>
			</form>
            </div>
      </div>
    	<div class="main_xl_gxjz">
        	<div class="main_xl_gxjz_left">
           	  <div class="main_xl_gxjz_left_box">
                	<div class="main_xl_gxjz_left_box_title">
                    	<div class="main_xl_detail_box03_main_right_box2_title_gxjz01">
                            <div class="main_xllb_box01_left_list02_box1_title_zi_xx_gxjz01">
                                <dl>
                                <dt><img src="images/xl_title_left.png"></dt>
                                <dd>按学校分类</dd>
                                <dt><img src="images/xl_title_right.png"></dt>
                                </dl>
                            </div>
                        </div>
                    </div>
				  <?php 
					 $rs=mysql_query("select * from xlbk ",$conn);					 
					if (mysql_num_rows($rs)>=1){
	                while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
					?>
				  <div class="main_xl_gxjz_left_box_list">
                  <a href="javascript:void(null)" onclick="javascript:left_menu('<?php echo $row["bk_id"];?>');opc('p<?php echo $row["bk_id"];?>');">
                      <div class="main_xl_gxjz_left_box_list_title">
                        <dl>
                          <dt><img src="images/dou_l.jpg" /><?php echo $row["bk_title"];?></dt>
                         <dd><span id="p<?php echo $row["bk_id"];?>">打开↓</span></dd>
                        </dl>
　                   </div>
                  </a>
					  <div class="main_xl_gxjz_left_box_list_box00" id="<?php echo $row["bk_id"];?>" style="display:none;">
                    <?php 
					 $rs1=mysql_query("select distinct s_id from kkinfo where bk_id=".$row["bk_id"],$conn);					 
					 if (mysql_num_rows($rs1)>=1){
	                 while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){
					   $rs_1=mysql_query("select s_name from school where s_id=".$row1["s_id"],$conn); 
		               $rw1=mysql_fetch_assoc($rs_1);
					    $rs8=mysql_query("select * from kkinfo where s_id=".$row1["s_id"]." and bk_id=".$row["bk_id"]." limit 1",$conn);
		                $rw8=mysql_fetch_assoc($rs8);
					   
					   
					?>
                        <div class="main_xl_gxjz_left_box_list_box00_list">
                          <h1><img src="images/dot_l_s.jpg" width="8" height="7" /><a href="Education/xl_pro_detail.php?kid=<?php echo $rw8["kid"];?>&sid=<?php echo $row1["s_id"];?>"><font color="#3C82C0"><?php echo $rw1["s_name"];?></font></a></h1>
                          <ul>
                            <?php
							$rsp=mysql_query("select * from kkinfo where s_id=".$row1["s_id"]." and bk_id=".$row["bk_id"],$conn);					 
							if (mysql_num_rows($rsp)>=1){
							while ($rowp=mysql_fetch_array($rsp,MYSQL_ASSOC)){					  
							?>
                            <li>·<a href="Education/xl_pro_zyjs.php?kid=<?php echo $rowp["kid"];?>&sid=<?php echo $rowp["s_id"];?>" title="<?php echo $rowp["ktitle"];?>">[<?php echo $rowp["zyclass"];?>]<?php echo $rowp["zyname"];?></a></li>
                            <?php }}?>
                          </ul>
                        </div>
					    <?php }}?>
                      </div>
			    </div>
				  <?php }}?>
                   
                </div>
        	</div>
            <div class="main_xl_gxjz_right">
            	<div class="main_xl_gxjz_left_box">
                	<div class="main_xl_gxjz_left_box_title">
                    	<div class="main_xl_detail_box03_main_right_box2_title_gxjz01">
                            <div class="main_xllb_box01_left_list02_box1_title_zi_xx_gxjz01">
                                <dl>
                                <dt><img src="<?=$z_website?>images/xl_title_left.png"></dt>
                                <dd>按专业分类</dd>
                                <dt><img src="<?=$z_website?>images/xl_title_right.png"></dt>
                                </dl>
                            </div>
                        </div>
                    </div>
					<?php 
					 $rs=mysql_query("select * from xlbk ",$conn);					 
					if (mysql_num_rows($rs)>=1){
	                while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
					?>
                    <div class="main_xl_gxjz_left_box_list">
                    <a href="javascript:void(null)" onClick="javascript:left_menu('z_<?php echo $row["bk_id"];?>');opc('b<?php echo $row["bk_id"];?>');">
                    	<div class="main_xl_gxjz_left_box_list_title">
                        <dl><dt><img src="images/dou_l.jpg" /><?php echo $row["bk_title"];?></dt><dd><span id="b<?php echo $row["bk_id"];?>">打开↓</span></dd></dl>
                        </div></a>
                        <div class="main_xl_gxjz_left_box_list_box00" id="z_<?php echo $row["bk_id"];?>" style="display:none">                      	
							
					<?php 
					 $rsa=mysql_query("select distinct zyname from kkinfo where bk_id=".$row["bk_id"],$conn);					 
					if (mysql_num_rows($rsa)>=1){
	                while ($rowa=mysql_fetch_array($rsa,MYSQL_ASSOC)){
					?>
							<div class="main_xl_gxjz_left_box_list_box00_list">
                                <h1><img src="images/dot_l_s.jpg" width="8" height="7" /><?php echo $rowa["zyname"];?></h1>
                                <ul>
								<?php 
								$rsb=mysql_query("select * from kkinfo where zyname='".$rowa["zyname"]."' and bk_id=".$row["bk_id"],$conn);					 
								if (mysql_num_rows($rsb)>=1){
								while ($rowb=mysql_fetch_array($rsb,MYSQL_ASSOC)){
		  $rs1=mysql_query("select s_name from school where s_id=".$rowb["s_id"],$conn); 
		  $rw=mysql_fetch_assoc($rs1);
								
								?>
								
<li>·<a href="Education/xl_pro_zyjs.php?kid=<?php echo $rowb["kid"];?>&sid=<?php echo $rowb["s_id"];?>" title="<?php echo $rowb["ktitle"];?>(<?php echo $rowb["zyclass"];?>)">[<?php echo $rw["s_name"];?>]<?php echo $rowb["ktitle"];?>(<?php echo $rowb["zyclass"];?>)</a></li>
                                <?php }}?>
                              </ul>
                          </div>
                          	<?php }}?>
                           
                            
                        </div>
                    </div>
					<?php }}?>
                    
                    
                </div>
            </div>
        </div>
    
    </div>
</div>
<!-- main End -->

<!-- bottom -->
<?php include("../bottom/bottom.html");?>
<!-- bottom End -->
</div>

</body>
</html>
