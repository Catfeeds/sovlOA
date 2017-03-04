<?php 
include_once("../conn.php");

include_once("xl_step.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>简章搜索-<?php echo $z_name;?></title>
<meta name="keywords" content="<?php echo $z_keyword?>" />
<meta name="description" content="<?php echo $z_contant?>" />
<base href="http://<?php echo $_SERVER['SERVER_NAME'];?>">
<link href="../css/css.css" rel="stylesheet" type="text/css" />
<link href="../css/top.css" rel="stylesheet" type="text/css" />
<link href="../css/main.css" rel="stylesheet" type="text/css" />
<link href="../css/bottom.css" rel="stylesheet" type="text/css" />
<script src="js/style.js"></script>
<script src="js/smooth.js"></script>
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
     <li>·<a href="<?=$z_website?>Education/xl_pro_detail.php?kid=<?php echo $row2["kid"];?>&sid=<?php echo $row["s_id"];?>"><?php echo $row1["s_name"];?></a></li>
                <?php }}?>
                </ul>
            </div>
        </div>
    	<div class="main_xl_pro_box02">
        	<div class="main_xl_pro_box02_title">
            	<dl>
                <dt><a href="Education/xl_pro_search.php">简章搜索</a></dt>
                <dd>j <a href="Education/">学历教育</a></dd>
           	    <dd><a href="Education/zxks/">自学考试</a></dd>
                <dd><a href="Education/wlys/">网络院校</a></dd>
                <dd><a href="Education/crgk/">成人高考</a></dd>
                <dd><a href="Education/gjbx/">国际办学</a></dd>
                <dd><a href="Education/xl_gxjz.php">高校简章</a></dd>
                <dd><a href="Education/gfb/">高复班</a></dd>
                </dl>                            
            </div>
            <div class="main_xl_pro_box02_list">
            	<div class="main_xl_pro_box02_list00">
                	<ul>
                    	<li>
                        <select name="" style="width:150px;">
                          <option>学历类型</option>
                          <option>自学考试</option>
                          <option>成人教育</option>
                          <option>中外合办</option>
                          <option>普通高校</option>
                          <option>出国留学</option>
                        </select>
                        </li>
                        <li>
                        <select name="">
                          <option>选择专业类别</option>
                        </select>
                        </li>
                        <li>
                        <select name="" style="width:170px;">
                          <option>学校名称</option>
                        </select>
                        </li>
                        <li><input name="" type="text" style="width:220px;" /></li>
                        <li><input  type="image" src="<?=$z_website?>images/ss_pro.jpg" style="cursor:pointer; width:60px; height:24px;"/></li>
                    </ul>
                    <h1><a href="#">高级搜索</a><br />
                    <a href="#">使用帮助</a></h1>
                </div>
            </div>
      </div>
    	<div class="main_xl_pro_box03">
        	<div class="main_xl_pro_box03_left">
                <div class="main_xl_pro_box03_left_gxjz_search">
                	您的位置：
            		<a href="/">首页</a> >> <a href="#">学历</a> >> <a href="Education/xl_pro_search.php">简章搜索</a>
                </div>
                <div class="main_xl_pro_box03_left_03">
                	<div class="main_xl_pro_box03_left_03_b01">
                    	<div class="main_xl_pro_box03_left_03_b01_left">
                        	<ul>
                        	<li>共有 619 项符合条件的记录，以下是第 1 - 10 项。</li>
                            </ul>
                        </div>
                        <div class="main_xl_pro_box03_left_03_b01_right">
                        	<ul>
                            <li>
                            	<a href="#"><<</a>
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <span>...</span>
                              	<a href="#">50</a>
                                <a href="#">>></a>
                            </li>
                            <li>
                            	<label>转到</label>
                                <select name="">
                                  <option>01</option>
                                  <option>02</option>
                                  <option>50</option>
                                </select>
                                <label>页</label>
                            </li>
                            </ul>
                        </div>
                    </div>
                    <div class="main_xl_pro_box03_left_03_b02">
                    	<div class="main_xl_pro_box03_left_03_b02_list" onmouseover="this.style.background='#f9f9f9'" onmouseout="this.style.background='#fff'" >
<table width="724" height="186" border="0" cellspacing="0" cellpadding="0">
  <tr height="35">
    <td colspan="5"><a href="#"><strong>物流管理 －－ <span>上海交通大学网络学院</span></strong></a></td>
    </tr>
  <tr height="50">
    <td align="center" valign="top" width="12%"><strong>专业介绍：</strong></td>
    <td colspan="3" valign="top">文专、理专： 1430 元 备注：1. 辅导费不含教材费；辅导教材可单独在我院报名处二楼书店购买。 2. 报名后有特殊原因退学，开课一次学费打8...</td>
    <td><a href="#">查看专业介绍>></a></td>
    </tr>
    <tr height="30">
    <td align="center" valign="top"><strong>学&nbsp;&nbsp;&nbsp;分：</strong></td>
    <td valign="top">80学分</td>
    <td valign="top">&nbsp;</td>
    <td width="43%" valign="top">&nbsp;</td>
    <td width="14%"><a href="#">我要咨询>></a></td>
  </tr>
  <tr height="30">
    <td align="center" valign="top"><strong>学历类型：</strong></td>
    <td valign="top">本科2.5年</td>
    <td align="center" valign="top"><strong>&nbsp;</strong></td>
    <td valign="top">&nbsp;</td>
    <td valign="top"><a href="#">网上报名>></a></td>
  </tr>
</table>

</div>
                        
                        <div class="main_xl_pro_box03_left_03_b02_list" onmouseover="this.style.background='#f9f9f9'" onmouseout="this.style.background='#fff'" >
<table width="724" height="186" border="0" cellspacing="0" cellpadding="0">
  <tr height="35">
    <td colspan="5"><a href="#"><strong>物流管理 －－ <span>上海交通大学网络学院</span></strong></a></td>
    </tr>
  <tr height="50">
    <td align="center" valign="top" width="12%"><strong>专业介绍：</strong></td>
    <td colspan="3" valign="top">文专、理专： 1430 元 备注：1. 辅导费不含教材费；辅导教材可单独在我院报名处二楼书店购买。 2. 报名后有特殊原因退学，开课一次学费打8...</td>
    <td><a href="#">查看专业介绍>></a></td>
    </tr>
    <tr height="30">
    <td align="center" valign="top"><strong>学&nbsp;&nbsp;&nbsp;分：</strong></td>
    <td valign="top">80学分</td>
    <td valign="top">&nbsp;</td>
    <td width="43%" valign="top">&nbsp;</td>
    <td width="14%"><a href="#">我要咨询>></a></td>
  </tr>
  <tr height="30">
    <td align="center" valign="top"><strong>学历类型：</strong></td>
    <td valign="top">本科2.5年</td>
    <td align="center" valign="top"><strong>&nbsp;</strong></td>
    <td valign="top">&nbsp;</td>
    <td valign="top"><a href="#">网上报名>></a></td>
  </tr>
</table>

</div>
						<div class="main_xl_pro_box03_left_03_b02_list" onmouseover="this.style.background='#f9f9f9'" onmouseout="this.style.background='#fff'" >
<table width="724" height="186" border="0" cellspacing="0" cellpadding="0">
  <tr height="35">
    <td colspan="5"><a href="#"><strong>物流管理 －－ <span>上海交通大学网络学院</span></strong></a></td>
    </tr>
  <tr height="50">
    <td align="center" valign="top" width="12%"><strong>专业介绍：</strong></td>
    <td colspan="3" valign="top">文专、理专： 1430 元 备注：1. 辅导费不含教材费；辅导教材可单独在我院报名处二楼书店购买。 2. 报名后有特殊原因退学，开课一次学费打8...</td>
    <td><a href="#">查看专业介绍>></a></td>
    </tr>
    <tr height="30">
    <td align="center" valign="top"><strong>学&nbsp;&nbsp;&nbsp;分：</strong></td>
    <td valign="top">80学分</td>
    <td valign="top">&nbsp;</td>
    <td width="43%" valign="top">&nbsp;</td>
    <td width="14%"><a href="#">我要咨询>></a></td>
  </tr>
  <tr height="30">
    <td align="center" valign="top"><strong>学历类型：</strong></td>
    <td valign="top">本科2.5年</td>
    <td align="center" valign="top"><strong>&nbsp;</strong></td>
    <td valign="top">&nbsp;</td>
    <td valign="top"><a href="#">网上报名>></a></td>
  </tr>
</table>

</div>
                        <div class="main_xl_pro_box03_left_03_b02_list" onmouseover="this.style.background='#f9f9f9'" onmouseout="this.style.background='#fff'" >
<table width="724" height="186" border="0" cellspacing="0" cellpadding="0">
  <tr height="35">
    <td colspan="5"><a href="#"><strong>物流管理 －－ <span>上海交通大学网络学院</span></strong></a></td>
    </tr>
  <tr height="50">
    <td align="center" valign="top" width="12%"><strong>专业介绍：</strong></td>
    <td colspan="3" valign="top">文专、理专： 1430 元 备注：1. 辅导费不含教材费；辅导教材可单独在我院报名处二楼书店购买。 2. 报名后有特殊原因退学，开课一次学费打8...</td>
    <td><a href="#">查看专业介绍>></a></td>
    </tr>
    <tr height="30">
    <td align="center" valign="top"><strong>学&nbsp;&nbsp;&nbsp;分：</strong></td>
    <td valign="top">80学分</td>
    <td valign="top">&nbsp;</td>
    <td width="43%" valign="top">&nbsp;</td>
    <td width="14%"><a href="#">我要咨询>></a></td>
  </tr>
  <tr height="30">
    <td align="center" valign="top"><strong>学历类型：</strong></td>
    <td valign="top">本科2.5年</td>
    <td align="center" valign="top"><strong>&nbsp;</strong></td>
    <td valign="top">&nbsp;</td>
    <td valign="top"><a href="#">网上报名>></a></td>
  </tr>
</table>

</div>
						<div class="main_xl_pro_box03_left_03_b02_list" onmouseover="this.style.background='#f9f9f9'" onmouseout="this.style.background='#fff'" >
<table width="724" height="186" border="0" cellspacing="0" cellpadding="0">
  <tr height="35">
    <td colspan="5"><a href="#"><strong>物流管理 －－ <span>上海交通大学网络学院</span></strong></a></td>
    </tr>
  <tr height="50">
    <td align="center" valign="top" width="12%"><strong>专业介绍：</strong></td>
    <td colspan="3" valign="top">文专、理专： 1430 元 备注：1. 辅导费不含教材费；辅导教材可单独在我院报名处二楼书店购买。 2. 报名后有特殊原因退学，开课一次学费打8...</td>
    <td><a href="#">查看专业介绍>></a></td>
    </tr>
    <tr height="30">
    <td align="center" valign="top"><strong>学&nbsp;&nbsp;&nbsp;分：</strong></td>
    <td valign="top">80学分</td>
    <td valign="top">&nbsp;</td>
    <td width="43%" valign="top">&nbsp;</td>
    <td width="14%"><a href="#">我要咨询>></a></td>
  </tr>
  <tr height="30">
    <td align="center" valign="top"><strong>学历类型：</strong></td>
    <td valign="top">本科2.5年</td>
    <td align="center" valign="top"><strong>&nbsp;</strong></td>
    <td valign="top">&nbsp;</td>
    <td valign="top"><a href="#">网上报名>></a></td>
  </tr>
</table>

</div>
						<div class="main_xl_pro_box03_left_03_b02_list" onmouseover="this.style.background='#f9f9f9'" onmouseout="this.style.background='#fff'" >
<table width="724" height="186" border="0" cellspacing="0" cellpadding="0">
  <tr height="35">
    <td colspan="5"><a href="#"><strong>物流管理 －－ <span>上海交通大学网络学院</span></strong></a></td>
    </tr>
  <tr height="50">
    <td align="center" valign="top" width="12%"><strong>专业介绍：</strong></td>
    <td colspan="3" valign="top">文专、理专： 1430 元 备注：1. 辅导费不含教材费；辅导教材可单独在我院报名处二楼书店购买。 2. 报名后有特殊原因退学，开课一次学费打8...</td>
    <td><a href="#">查看专业介绍>></a></td>
    </tr>
    <tr height="30">
    <td align="center" valign="top"><strong>学&nbsp;&nbsp;&nbsp;分：</strong></td>
    <td valign="top">80学分</td>
    <td valign="top">&nbsp;</td>
    <td width="43%" valign="top">&nbsp;</td>
    <td width="14%"><a href="#">我要咨询>></a></td>
  </tr>
  <tr height="30">
    <td align="center" valign="top"><strong>学历类型：</strong></td>
    <td valign="top">本科2.5年</td>
    <td align="center" valign="top"><strong>&nbsp;</strong></td>
    <td valign="top">&nbsp;</td>
    <td valign="top"><a href="#">网上报名>></a></td>
  </tr>
</table>

</div>
                        <div class="main_xl_pro_box03_left_03_b02_list" onmouseover="this.style.background='#f9f9f9'" onmouseout="this.style.background='#fff'" >
<table width="724" height="186" border="0" cellspacing="0" cellpadding="0">
  <tr height="35">
    <td colspan="5"><a href="#"><strong>物流管理 －－ <span>上海交通大学网络学院</span></strong></a></td>
    </tr>
  <tr height="50">
    <td align="center" valign="top" width="12%"><strong>专业介绍：</strong></td>
    <td colspan="3" valign="top">文专、理专： 1430 元 备注：1. 辅导费不含教材费；辅导教材可单独在我院报名处二楼书店购买。 2. 报名后有特殊原因退学，开课一次学费打8...</td>
    <td><a href="#">查看专业介绍>></a></td>
    </tr>
    <tr height="30">
    <td align="center" valign="top"><strong>学&nbsp;&nbsp;&nbsp;分：</strong></td>
    <td valign="top">80学分</td>
    <td valign="top">&nbsp;</td>
    <td width="43%" valign="top">&nbsp;</td>
    <td width="14%"><a href="#">我要咨询>></a></td>
  </tr>
  <tr height="30">
    <td align="center" valign="top"><strong>学历类型：</strong></td>
    <td valign="top">本科2.5年</td>
    <td align="center" valign="top"><strong>&nbsp;</strong></td>
    <td valign="top">&nbsp;</td>
    <td valign="top"><a href="#">网上报名>></a></td>
  </tr>
</table>

</div>

                    </div>
                    <div class="main_xl_pro_box03_left_03_b03">
                    	
                        <div class="main_xl_pro_box03_left_03_b01_right">
                        	<ul>
                            <li>
                            	<a href="#"><<</a>
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <span>...</span>
                              	<a href="#">50</a>
                                <a href="#">>></a>
                            </li>
                            <li>
                            	<label>转到</label>
                                <select name="">
                                  <option>01</option>
                                  <option>02</option>
                                  <option>50</option>
                                </select>
                                <label>页</label>
                            </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="main_xl_pro_box03_right">
            	<div class="main_xl_pro_box03_right_box00">
                
               	  <div class="main_box01_right_01_pr">
           			<ul>
<li><a href=tencent://message/?uin=<?php echo $qq1;?>&Site=<?php echo $z_name;?>&Menu=yes title="在线咨询1"><img border="0" src=http://wpa.qq.com/pa?p=1:<?php echo $qq1;?>:1 align="top"/></a></li>
<li><a href=tencent://message/?uin=<?php echo $qq2;?>&Site=<?php echo $z_name;?>&Menu=yes title="在线咨询2"><img border="0" src=http://wpa.qq.com/pa?p=1:<?php echo $qq2;?>:1 align="top"/></a></li>
                </ul>
            	  </div>
                
                </div>
            	<div class="main_xl_pro_box03_right_box01">
                	<div class="main_xl_pro_box03_right_box01_title">热点推荐</div>
                    <div class="main_xl_pro_box03_right_box01_list">
                    &nbsp;上海交通大学<br />
                    &nbsp;上海交通大学<br />
                    &nbsp;上海交通大学<br />
                    &nbsp;上海交通大学<br />
                    &nbsp;上海交通大学<br />
                    </div>
                </div>
                
                <div class="main_xl_pro_box03_right_box01">
                	<div class="main_xl_pro_box03_right_box01_title">你浏览过的学校简章</div>
                    <div class="main_xl_pro_box03_right_box01_list">
                    &nbsp;上海交通大学<br />
                    &nbsp;上海交通大学<br />
                    &nbsp;上海交通大学<br />
                    &nbsp;上海交通大学<br />
                    &nbsp;上海交通大学<br />
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