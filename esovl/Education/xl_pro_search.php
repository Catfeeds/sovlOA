<?php 
include_once("../conn.php");

include_once("xl_webstep.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>学历搜索列表-<?php echo $z_name;?></title>
<meta name="keywords" content="<?php echo $z_keyword?>" />
<meta name="description" content="<?php echo $z_contant?>"/>
<base href="http://<?php echo $_SERVER['SERVER_NAME'];?>">
<link href="../css/css.css" rel="stylesheet" type="text/css" />
<link href="../css/top.css" rel="stylesheet" type="text/css" />
<link href="../css/main.css" rel="stylesheet" type="text/css" />
<link href="../css/bottom.css" rel="stylesheet" type="text/css" />
<script src="../js/style.js"></script>
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
         <div id="tbc_0<?php echo $i;?>" class=""><a href="<?php echo $row["s_h_http"];?>"><img src="<?=$z_website?>admin_root/<?php echo $row["s_h_pic"];?>"/></a></div>
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
<li id="tb_<?php echo $j;?>" <?php if($j!=1){echo "class='normaltab1'";}else{echo "class='hovertab1'";}?> onmouseover="HoverLi(3);OvHoverLi(<?php echo $j;?>);">·<a href="<?php echo $row["s_h_http"];?>">
<?php echo $row["s_h_title"];?></a></li>
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
                <dt><a href="Education/">学历教育</a></dt>
           	    <dd><a href="Education/zxks/">自学考试</a></dd>
                <dd><a href="Education/wlys/">网络院校</a></dd>
                <dd><a href="Education/crgk/">成人高考</a></dd>
                <dd><a href="Education/gjbx/">国际办学</a></dd>
                <dd><a href="Education/xl_gxjz.php">高校简章</a></dd>
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
    	<div class="main_xl_pro_box03">
        	<div class="main_xl_pro_box03_left">
            	<div class="main_xl_pro_box03_left_01">
                	<ul>
                    <li><a href="#">所有分类</a></li>
                    <li><a href="#">学历</a></li>
					<?php
					$sshow="";
if(@$_GET["sschool"]!=""){
	     $rs=mysql_query("select * from school where s_id=".$_GET["sschool"]);	  
	     $row=mysql_fetch_assoc($rs);
		 $sshow=$row["s_name"]." > ";
	@$str_sid=" s_id=".@$_GET["sschool"]." and ";	 
}
if(@$_GET["szyclass"]!=""){$sshow=$sshow.$_GET["szyclass"]." > ";}
if(@$_GET["szyname"]!=""){$sshow=$sshow.$_GET["szyname"]." > ";}
if(@$_GET["skey"]!=""){$sshow=$sshow.$_GET["skey"];}
					?>
					<li>搜索条件：<?php echo $sshow;?></li>
					
                    </ul>
                </div>
                <div class="main_xl_pro_box03_left_02">
                	<div class="main_xl_pro_box03_left_02_title">按条件选择</div>
                    <div class="main_xl_pro_box03_left_02_list">
                  <input name="" type="checkbox" value="20000"  onclick="javascript:window.location.href='Education/xl_pro_search_px.php?xfei='+this.value;"/>
                    	20000元以下<br />
                  <input name="" type="checkbox" value="20000-25000" onclick="javascript:window.location.href='Education/xl_pro_search_px.php?xfei='+this.value;"/>
                        20000-25000元<br />
                  <input name="" type="checkbox" value="25000" onclick="javascript:window.location.href='Education/xl_pro_search_px.php?xfei='+this.value;"/>
                      25000元以上<br />
                    </div>
                </div>
                <div class="main_xl_pro_box03_left_03">
                	<div class="main_xl_pro_box03_left_03_b01">
                    	<div class="main_xl_pro_box03_left_03_b01_left">
                        	<ul>
                            <li>
                            <label>排序：</label>
                             <select name="" onchange="javascript:location.href(this.options[this.selectedIndex].value)">
							  <option>默认价格</option>
                              <option value="xl_pro_search_px.php?xfei=asc">价格从低到高</option>
							  <option value="xl_pro_search_px.php?xfei=desc">价格从高到低</option>
                            </select>
                            </li>
                            <li><a href="Education/xl_pro_search_px.php?xfei=asc"><img src="<?=$z_website?>images/jg_bg2.jpg" /></a></li>
                            <li><a href="Education/xl_pro_search_px.php?xfei=desc"><img src="<?=$z_website?>images/jg_bg3.jpg" /></a></li>
                            </ul>
                        </div>
<?php
$pagesize=5;
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
@$url=$url[path];
//echo $url;

if (@$_GET["sschool"]!=""||@$_GET["szyclass"]!=""||@$_GET["szyname"]!=""||@$_GET["skey"]!=""){
$numq=mysql_query("SELECT * FROM kkinfo where ".@$str_sid." zyclass like '%".@$_GET["szyclass"]."%' and zyname like '%".@$_GET["szyname"]."%' and ktitle like '%".@$_GET["skey"]."%' and ktitle like'%".@$_GET["skey"]."%'");
}else{
$numq=mysql_query("SELECT * FROM kkinfo");
}
$num = mysql_num_rows($numq);
$cp=ceil($num/$pagesize);//函数获取页数
if(@$_GET[page]){
$pageval=@$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
jump();?> 
</div>
 <div class="main_xl_pro_box03_left_03_b02">
<?php
if (@$_GET["sschool"]!=""||@$_GET["szyclass"]!=""||@$_GET["szyname"]!=""||@$_GET["skey"]!=""){
@$sql="select * from kkinfo where ".@$str_sid." zyclass like '%".@$_GET["szyclass"]."%' and zyname like '%".@$_GET["szyname"]."%' and ktitle like '%".@$_GET["skey"]."%' and ktitle like'%".@$_GET["skey"]."%' order by kkdate desc limit $page $pagesize ";
//echo @$sql;
}else{
@$sql="select * from kkinfo order by kkdate desc limit $page $pagesize ";
}		$rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	 if (mysql_num_rows($rs)>=1){
	 while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
?>
<div class="main_xl_pro_box03_left_03_b02_list" onmouseover="this.style.background='#f9f9f9'" onmouseout="this.style.background='#fff'" >
<table width="724" height="186" border="0" cellspacing="0" cellpadding="0">
  <tr height="35">
    <td colspan="5"><strong><a href="Education/xl_pro_detail.php?kid=<?php echo $row["kid"];?>&sid=<?php echo $row["s_id"];?>"><?php echo $row["zyclass"]?></a> －－ <span><a href="Education/xl_pro_zyjs.php?kid=<?php echo $row["kid"];?>&sid=<?php echo $row["s_id"];?>"><?php echo $row["ktitle"]?></a></span></strong></td>
    </tr>
  <tr height="50">
    <td align="center" valign="top" width="12%"><strong>专业介绍：</strong></td>
    <td colspan="3" valign="top"><?php echo msubstr(strip_tags($row["zycon"]),340);?>..</td>
    <td><a href="Education/xl_pro_zyjs.php?kid=<?php echo $row["kid"];?>&sid=<?php echo $row["s_id"];?>">查看招生简章>></a></td>
    </tr>
  <tr height="30">
    <td align="center" valign="top"><strong>专业类别：</strong></td>
    <td width="19%" valign="top"><?php echo $row["zyclass"];?></td>
    <td align="center" valign="top" width="12%"><strong>课程时间：</strong></td>
    <td colspan="2" valign="top"><?php echo $row["ktime"];?></td>
    </tr>
  <tr height="30">
    <td align="center" valign="top"><strong>学&nbsp;&nbsp;&nbsp;费：</strong></td>
    <td valign="top"><?php echo $row["xfei"];?>元/年</td>
    <td align="center" valign="top"><strong>专业名称：</strong></td>
    <td width="43%" valign="top"><?php echo $row["zyname"];?></td>
    <td width="14%"><a href="Education/xl_pro_zxtw.php?kid=<?php echo $row["kid"];?>&sid=<?php echo $row["s_id"];?>">我要咨询>></a></td>
  </tr>
  <tr height="30">
    <td align="center" valign="top"><strong>上课类型：</strong></td>
    <td valign="top"><?php echo $row["kcal"];?></td>
    <td align="center" valign="top"><strong>开班日期：</strong></td>
    <td valign="top"><?php echo $row["kdate"];?></td>
    <td><a href="Education/xl_pro_wsbm.php?kid=<?php echo $row["kid"];?>&sid=<?php echo $row["s_id"];?>">网上报名>></a></td>
  </tr>
</table>
</div>
        <?php
		}}
		?>                     
</div>
<div class="main_xl_pro_box03_left_03_b03">				
					
					<?php function jump(){?>
					
					<?php if (@$_GET["sschool"]!=""||@$_GET["szyclass"]!=""||@$_GET["szyname"]!=""||@$_GET["skey"]!=""){?>	
					
                    <div class="main_xl_pro_box03_left_03_b01_right">
						<ul><li>
                        <?php
						global $num,$url,$cp,$pagesize;
							
//echo "共 $num 条信息";
if($num > $pagesize){
 if(@$pageval<=1)$pageval=1;


  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <a href=$url?sschool=".@$_GET["sschool"]."&szyclass=".@$_GET["szyclass"]."&szyname=".@$_GET["szyname"]."&skey=".@$_GET["skey"]."&page=".($pageval-1)."><<</a>";
}else{
echo" <a href=$url?sschool=".@$_GET["sschool"]."&szyclass=".@$_GET["szyclass"]."&szyname=".@$_GET["szyname"]."&skey=".@$_GET["skey"]."&page=1><<</a>";
}
    for ($i=1;$i<=$cp;$i++){
	     if ($i==@$_GET["page"]){
		 echo " <span class='bwhite'>".$i."</span> ";
		 }else{
	     echo " <a href=$url?sschool=".@$_GET["sschool"]."&szyclass=".@$_GET["szyclass"]."&szyname=".@$_GET["szyname"]."&skey=".@$_GET["skey"]."&page=".$i.">".$i."</a> ";
		 }
	}
if(@$_GET["page"]<$cp){
echo " <a href=$url?sschool=".@$_GET["sschool"]."&szyclass=".@$_GET["szyclass"]."&szyname=".@$_GET["szyname"]."&skey=".@$_GET["skey"]."&page=".($pageval+1).">>></a>";
}else{
echo " <a href=$url?sschool=".@$_GET["sschool"]."&szyclass=".@$_GET["szyclass"]."&szyname=".@$_GET["szyname"]."&skey=".@$_GET["skey"]."&page=".$cp.">>></a>";
}

} 
?></li>
<li>
<label>转到</label>
			<select name="" onchange="javascript:location.href=(this.options[this.selectedIndex].value)">
			<?php
			for ($i=1;$i<=$cp;$i++){
			
			if ($i==@$_GET["page"]){
			echo "<option value='$url?sschool=".@$_GET["sschool"]."&szyclass=".@$_GET["szyclass"]."&szyname=".@$_GET["szyname"]."&skey=".@$_GET["skey"]."&page=".$i."' selected>".$i."</option>";
			}else{
			echo "<option value='$url?sschool=".@$_GET["sschool"]."&szyclass=".@$_GET["szyclass"]."&szyname=".@$_GET["szyname"]."&skey=".@$_GET["skey"]."&page=".$i."'>".$i."</option>";
			}
             }
			?>		
			</select>
			<label>页</label>
</li>
</ul>
</div>	
					
<?php }else{?>
                        <div class="main_xl_pro_box03_left_03_b01_right">
						<ul><li>
<?php
						global $num,$url,$cp,$pagesize;
							
//echo "共 $num 条信息";
if($num > $pagesize){
 if(@$pageval<=1)$pageval=1;
  if(@$_GET["page"]!=""&&@$_GET["page"]>1){
echo" <a href=$url?page=".($pageval-1)."><<</a>";
}else{
echo" <a href=$url?page=1><<</a>";
}
    for ($i=1;$i<=$cp;$i++){
	     if ($i==@$_GET["page"]){
		 echo " <span class='bwhite'>".$i."</span> ";
		 }else{
	     echo " <a href=$url?page=".$i.">".$i."</a> ";
		 }
	}
if(@$_GET["page"]<$cp){
echo " <a href=$url?page=".($pageval+1).">>></a>";
}else{
echo " <a href=$url?page=".$cp.">>></a>";
}}?></li>
<li>
<label>转到</label>
			<select name="" onchange="javascript:location.href=(this.options[this.selectedIndex].value)">
			<?php
			for ($i=1;$i<=$cp;$i++){
			
			if ($i==@$_GET["page"]){
			echo "<option value='$url?page=".$i."' selected>".$i."</option>";
			}else{
			echo "<option value='$url?page=".$i."'>".$i."</option>";
			}
             }
			?>		
			</select>
			<label>页</label>
</li>
</ul>
</div>

                        <?php }}?>
                       <?php jump();?> 
                    </div>
                </div>
            </div>
            <div class="main_xl_pro_box03_right">
            	<div class="main_xl_pro_box03_right_box00">
                
               	  <div class="main_box01_right_01_pr">
           			<ul>
                		<ul>
<li><a href=tencent://message/?uin=<?php echo $qq1;?>&Site=<?php echo $z_name;?>&Menu=yes><img border="0" src=http://wpa.qq.com/pa?p=1:<?php echo $qq1;?>:1 alt="在线咨询1" /></a></li>
<li><a href=tencent://message/?uin=<?php echo $qq2;?>&Site=<?php echo $z_name;?>&Menu=yes><img border="0" src=http://wpa.qq.com/pa?p=1:<?php echo $qq2;?>:1 alt="在线咨询2" /></a></li>
                </ul>
               		</ul>
            	  </div>
                
                </div>
            	<div class="main_xl_pro_box03_right_box01">
                	<div class="main_xl_pro_box03_right_box01_title">热点推荐</div>
                    <div class="main_xl_pro_box03_right_box01_list">
					<ul>
                    <?php
						$sql="select * from xxtj where xx_bool=1 limit 5";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
						?>
                    	<li><a href="<?php echo $row["xx_http"]?>" target="_blank"><?php echo $row["xx_name"]?></a></li>
						<?php
						}}
						?>
					  </ul>
                    </div>
                </div>
                <div class="main_xl_pro_box03_right_box01">
                	<div class="main_xl_pro_box03_right_box01_title">你浏览过的学校</div>
<div class="main_xl_pro_box03_right_box01_list">
<ul>
<?php
	if(isset($_SESSION["kkid"])){
	$cstr=substr(@$_SESSION["kkid"],1);
	//echo $cstr;
	$sql="select * from kkinfo where kid in (".$cstr.")";
	$rs=mysql_query($sql);
	if (mysql_num_rows($rs)>=1){
	while ($row=mysql_fetch_assoc($rs)){
	$rs1=mysql_query("select s_name from school where s_id=".$row["s_id"]);
	$row1=mysql_fetch_assoc($rs1);
?>
<li><a href="Education/xl_pro_detail.php?kid=<?php echo $row["kid"];?>&sid=<?php echo $row["s_id"];?>"><?php echo $row1["s_name"];?></a></li>
<?php }}}?>
</ul>
</div>
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
