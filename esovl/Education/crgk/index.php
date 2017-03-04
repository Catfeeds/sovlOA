<?php
include_once("../../conn.php");

include_once("cr_webstep.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$cr_title?></title>
<meta name="keywords" content="<?=$cr_keyword?>" />
<meta name="description" content="<?=$cr_contant?>" />
<base href="http://<?php echo $_SERVER['SERVER_NAME'];?>/">
<link href="../../css/css.css" rel="stylesheet" type="text/css" />
<link href="../../css/top.css" rel="stylesheet" type="text/css" />
<link href="../../css/main.css" rel="stylesheet" type="text/css" />
<link href="../../css/bottom.css" rel="stylesheet" type="text/css" />
<link href="../../css/main3.css" rel="stylesheet" type="text/css" />
<SCRIPT src="../../js/Comm.js"></SCRIPT>
<script src="../../js/jquery.js"></script>
<script src="../../js/style.js"></script>
<SCRIPT>regEvent(window,'onload',function() {SwitchPanel('p','on','off',4,false,2000)});</SCRIPT>
<SCRIPT>regEvent(window,'onload',function() {SwitchPanel('pp','on','off',4,false,3000)});</SCRIPT>
</head>
<body>
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
      <div class="main_crgk">
          <div class="main_crgk_box01">
          	  <div class="main_xl_pro_box01">
        	<div class="main_xl_pro_box01_left">
			
		<?php
		$sql="select * from xl_s_h where classid=4 limit 4";//classid=4,代表是成人高考这一类的横幅图片。
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
         <div id="pp<?php echo $i;?>" class=""><a href="<?php echo $row["s_h_http"];?>"><img src="admin_root/<?php echo $row["s_h_pic"];?>"/></a></div>
				<?php }	?>
				</div>
				
                <div class="main_xl_pro_box01_left_text">
                	<ul>
				<?php
				$sql="select * from xl_s_h where classid=4 limit 4";
                $rs=mysql_query($sql); 
				$j=0;
				while ($row=mysql_fetch_assoc($rs)){
				$j=$j+1;
				?>
<li id="tb_<?php echo $j;?>" <?php if($j!=1){echo "class='normaltab1'";}else{echo "class='hovertab1'";}?>>·<a href="<?php echo $row["s_h_http"];?>"><?php echo $row["s_h_title"];?></a></li>
				<?php }?>
                    </ul>
                </div>

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
        	    <dt><a href="Education/crgk/">成人高考</a></dt>
        	    <dd><a href="Education/">学历教育</a></dd>
        	    <dd><a href="Education/zxks/">自学考试</a></dd>
        	    <dd><a href="Education/wlys/">网络院校</a></dd>
        	    <dd><a href="Education/gjbx/">国际办学</a></dd>
        	    <dd><a href="Education/xl_gxjz.php">高校简章</a></dd>
        	    <dd><a href="Education/xl_pro_search.php">简章搜索</a></dd>
        	    <dd><a href="Education/gfb/">高复班</a></dd>
      	    </dl>
      	  </div>
        	<div class="main_xl_pro_box02_list">
          <div class="main_xl_pro_box02_list00">
            <?php 
if(isset($_POST["xl_skey"])){	
	$skey=@$_POST["xl_skey"];
	echo "<script>location.href='../Education/xl_pro_search.php?skey=".$skey."';</script>";	
}
				?>
            <form name="xl_sform" id="xl_sform" method="post" onsubmit="return xl_sou();" action="">
              <ul>
                <li>
                 <!-- <select name="xl_scl" style="width:120px;">
                    <option value=0>--请选择--</option>
                    <option value="学历教育">学历教育</option>
                    <option value="自学考试">自学考试</option>
                    <option value="网络院校">网络院校</option>
                    <option value="成人高考">成人高考</option>
                    <option value="国际办学">国际办学</option>
                    <option value="高校简章">高校简章</option>
                    <option value="简章搜索">简章搜索</option>
                    <option value="高复班">高复班</option>
                  </select>-->
                  填写搜索关键词：
                </li>
                <li>
                  <input name="xl_skey" type="text" style="width:220px;" />
                </li>
                <li>
                  <input  type="image" src="images/ss_pro.jpg" style="cursor:pointer; width:60px; height:24px;"/>
                </li>
              </ul>
            </form>
            <div class="pro_search_key"> <span>搜索关键词：</span> <a href="../Education/xl_pro_search.php?skey=<?=urlencode("高起专")?>">高起专</a> <a href="../Education/xl_pro_search.php?skey=<?=urlencode("高起本")?>">高起本</a> <a href="../Education/xl_pro_search.php?skey=<?=urlencode("成人高复")?>">成人高复</a> <a href="../Education/xl_pro_search.php?skey=<?=urlencode("自学考试")?>">自学考试</a> <a href="../Education/xl_pro_search.php?skey=<?=urlencode("专升本")?>">专升本</a> <a href="../Education/xl_pro_search.php?skey=<?=urlencode("财务管理")?>">财务管理</a> <a href="../Education/xl_pro_search.php?skey=<?=urlencode("培训")?>">培训</a></div>
          </div>
        </div>
              </div>
          </div>
          <div class="main_crgk_box02">
              <div class="main_crgk_box02_left">
              		<div class="main_crgk_box02_left_01">
                    	<div class="main_crgk_box02_left_0100">
                        
        <?php
		$sql="select * from xl_s_f where classid=4 limit 3";
        $rs=mysql_query($sql);
        //$row=mysql_fetch_assoc($rs);
				$i=0;
				while ($row=mysql_fetch_assoc($rs)){
				$i=$i+1;
        ?>
                  <div id=p<?php echo $i;?>><a href="<?php echo $row["s_h_http"];?>" target=_blank><img border=0 alt=<?php echo $row["s_h_title"];?> src="admin_root/<?php echo $row["s_h_pic"];?>" width=298 height=160/><span style=" margin-top:5px;margin-left:100px;display:block;"><?php echo $row["s_h_title"];?></span></a></div>
        <?php }?>                        
                  </div>
                    </div>
                    <div class="main_crgk_box02_left_02">
                    	<div class="main_crgk_box02_left_02_title">
                            <div class="main_crgk_box02_left_02_title_zi">
                                <dl>
                                <dt><img src="images/xl_title_left.png" /></dt>
                                <dd>各省指南</dd>
                                <dt><img src="images/xl_title_right.png" /></dt>
                                </dl>
                            </div>
                      </div>
                        <div class="main_crgk_box02_left_02_list">
<table border="0" cellpadding="0" cellspacing="0" valign="middle" align="center">
  <tr valign="middle" align="center">
    <td width="48" height="26" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=169">京</a> <a href="Education/crgk/crgk_zx_detail.php?id=189">津</a></td>
    <td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=170">河北</a></td>
    <td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=171">山西</a></td>
    <td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=172">内蒙古</a></td>
    <td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=173">辽宁</a></td>
    <td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=174">吉林</a></td>	
  <tr>
  <tr valign="middle" align="center">
    <td width="48" height="26" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=175">黑龙江</a></td>
    <td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=176">上海</a></td>
    <td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=177">江苏</a></td>
    <td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=178">浙江</a></td>
    <td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=179">安徽</a></td>
    <td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=180">福建</a></td>	
  <tr>
    <tr valign="middle" align="center">
    <td width="48" height="26" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=181">江西</a></td>
    <td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=182">山东</a></td>
    <td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=183">河南</a></td>
    <td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=184">湖北</a></td>
    <td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=185">湖南</a></td>
    <td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=186">广东</a></td>	
  <tr>
    <tr valign="middle" align="center">
    <td width="48" height="26" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=187">广西</a></td>
    <td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=188">海南</a></td>  
    <td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=190">四川</a></td>
    <td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=191">重庆</a></td>
    <td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=192">贵州</a></td>
     <td width="48" height="26" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=193">云南</a></td>
  <tr>
    <tr valign="middle" align="center">   
    <td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=194">西藏</a></td>
    <td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=195">狭西</a></td>
    <td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=196">甘肃</a></td>
    <td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=197">青海</a></td>
    <td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=198">宁夏</a></td>
    <td width="48" align="center" style="border:1px solid #999;" bgcolor="#FFFFFF"><a href="Education/crgk/crgk_zx_detail.php?id=199">新疆</a></td>	
  <tr>
</table>                 
                        </div>
                    </div>
              </div>
              <div class="main_crgk_box02_center">
			  <?php
				  $sq0="select ndate from ennews where nclass >=45 and nclass<=52 and nbool=1 limit 1";
				  $rs0=mysql_query($sq0);
				  $row0=mysql_fetch_array($rs0,MYSQL_ASSOC);
			  ?>
              	 <div class="main_crgk_box02_center_title"><span>更新时间：<?=date('Y-m-d',strtotime($row0["ndate"]))?></span></div>
                 <div class="main_crgk_box02_center_list">
                 	<div class="main_crgk_box02_center_list00">
                    	<div class="main_crgk_box02_center_list00_01">
                        	<dl>
                            <dt>热点</dt>
                            <dd><?php
						$sql="select * from ennews where nclass in(45,46) and nbool=1 order by nclick desc limit 2";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){				
						?>
                         <a href="Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>"><?=msubstr($row["ntitle"],24)?></a>
                        <? }}?>
                        </dd>
                            </dl>
                        </div>
                        <div class="main_crgk_box02_center_list00_02">
                        	<ul>
                            <li>
                            	<span>[<a href="Education/crgk/crgk_zx.php?nclass=45">查分</a>]</span>
                        <?php
						$sql="select * from ennews where nclass=45 and nbool=1 limit 11";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){				
						?>
                        <a href="Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>"><?=msubstr($row["ntitle"],4)?></a>
                        <? }}?>
                            </li>
                            <li>
                            	<span>[<a href="Education/crgk/crgk_zx.php?nclass=46">成绩</a>]</span>
                                <?php
						$sql="select * from ennews where nclass=46 and nbool=1 limit 10";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){				
						?>
                        <a href="Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>"><?=msubstr($row["ntitle"],4)?></a>
                        <? }}?>
                                <a href="Education/crgk/crgk_zx.php?nclass=46">更多</a>
                            </li>          
                            </ul>
                        </div>
                    </div>
                    <div class="main_crgk_box02_center_list00">
                    	<div class="main_crgk_box02_center_list00_01">
                        	<dl>
                            <dt>动态</dt>
                            <dd><?php
						$sql="select * from ennews where nclass in(47,48) and nbool=1 order by nclick desc limit 2";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){				
						?>
                         <a href="Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>"><?=msubstr($row["ntitle"],24)?></a>
                        <? }}?></dd>
                            </dl>
                        </div>
                        <div class="main_crgk_box02_center_list00_02">
                        	<ul>
                            <li>
                            	<span>[<a href="Education/crgk/crgk_zx.php?nclass=47">分数线</a>]</span>
                       <?php
						$sql="select * from ennews where nclass=47 and nbool=1 limit 10";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){				
						?>
                        <a href="Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>"><?=msubstr($row["ntitle"],4)?></a>
                        <? }}?>
                            </li>        
                            <li>
                            	<span>[<a href="Education/crgk/crgk_zx.php?nclass=48">院校</a>]</span>
                        <?php
						$sql="select * from ennews where nclass=48 and nbool=1 limit 2";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){				
						?>
                        <a href="Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>"><?=msubstr($row["ntitle"],26)?></a>
                        <? }}?>
                            </li>
                            </ul>
                        </div>
                    </div>
                    <div class="main_crgk_box02_center_list00">
                    	<div class="main_crgk_box02_center_list00_01">
                        	<dl>
                            <dt>试题</dt>
                            <dd><?php
						$sql="select * from ennews where nclass in(49,50) and nbool=1 order by nclick desc limit 2";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){				
						?>
                         <a href="Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>"><?=msubstr($row["ntitle"],24)?></a>
                        <? }}?></dd>
                            </dl>
                        </div>
                        <div class="main_crgk_box02_center_list00_02">
                        	<ul>
                            <li>
                            	<span>[<a href="Education/crgk/crgk_zx.php?nclass=49">真题</a>]</span>
                                 <?php
						$sql="select * from ennews where nclass=49 and nbool=1 limit 2";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){				
						?>
                        <a href="Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>"><?=msubstr($row["ntitle"],16)?></a>
                        <? }}?>
                            </li>
                            <li>
                            	<span>[<a href="Education/crgk/crgk_zx.php?nclass=50">习题</a>]</span>
                        <?php
						$sql="select * from ennews where nclass=50 and nbool=1 limit 2";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){				
						?>
                        <a href="Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>"><?=msubstr($row["ntitle"],26)?></a>
                        <? }}?>
                            </li>          
                            </ul>
                        </div>
                    </div>
                    <div class="main_crgk_box02_center_list00" style="height:98px">
                    	<div class="main_crgk_box02_center_list00_01">
                        	<dl>
                            <dt>网校</dt>
                            <dd> 
                        <?php
						$sql="select * from ennews where nclass in(51,52) and nbool=1 order by nclick desc limit 2";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){				
						?>
                         <a href="Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>"><?=msubstr($row["ntitle"],24)?></a>
                        <? }}?>
                        </dd>
                            </dl>
                        </div>
                        <div class="main_crgk_box02_center_list00_02">
                        	<ul>
                            <li>
                            	<span>[<a href="Education/crgk/crgk_zx.php?nclass=51">课程</a>]</span>
                                 <?php
						$sql="select * from ennews where nclass=51 and nbool=1 limit 2";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){				
						?>
                        <a href="Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>"><?=msubstr($row["ntitle"],26)?></a>
                        <? }}?>
                            </li>
                            <li>
                            	<span>[<a href="Education/crgk/crgk_zx.php?nclass=52">优惠</a>]</span>
                                 <?php
						$sql="select * from ennews where nclass=52 and nbool=1 limit 2";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){				
						?>
                        <a href="Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>"><?=msubstr($row["ntitle"],26)?></a>
                        <? }}?>
                            </li>                                    
                            </ul>
                        </div>
                    </div>
                 </div>
              </div>
              <div class="main_crgk_box02_right">
              	<div class="main_crgk_box02_right_01">
                	<div class="main_crgk_box02_right_01_title">
                        <span>报考指南</span>
                    </div>
                    <div class="main_crgk_box02_right_01_list">
                    	<ul>
                        <?php
						$sql="select * from ennews where nclass=42 and nbool=1 limit 21";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){							
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){				
						?>
             <li><a href="Education/crgk/crgk_zx_detail.php?id=<?php echo $row["nid"];?>" title="<?=$row["ntitle"]?>"><?=msubstr($row["ntitle"],8)?></a></li>
                        <?php }}?> 
                        </ul>
                        
                    </div>
                </div>
                <div class="main_crgk_box02_right_02">
                	<div class="main_crgk_box02_right_02_pic"><a href="<?=$cr_right1_link?>"><img src="../../admin_root/<?=$cr_right1?>" /></a></div>
                </div>
              </div>
          </div>
          <div class="main_crgk_box03">
          	<div class="main_crgk_box03_title">
        	<div class="main_crgk_box03_title_left">成考辅导</div>
            <div class="main_crgk_box03_title_right">
            	<dl>
                <dt><img src="images/dng_left.jpg" width="6" height="30" /></dt>
                <dd>
               	  <?php
						$sql="select * from enclass where n_id between 53 and 62 and n_type=4";
                        $rs=mysql_query($sql);
						$coun=mysql_num_rows($rs);
						if ($coun>=1){
	                    $i=0;
						while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){						
						$i=$i+1;
						   if ($i==$coun){
				 ?>
						 <a href="Education/crgk/crgk_zx.php?nclass=<?php echo $row["n_id"]?>" target="_blank"><?php echo $row["n_class"]?></a>
						   <?php
						   }else{
						?>
                         <a href="Education/crgk/crgk_zx.php?nclass=<?php echo $row["n_id"]?>" target="_blank"><?php echo $row["n_class"]?></a><span>|</span>
						<?php 
						}
						}
						}
						mysql_free_result($rs);
						?>
           
                </dd>
                <dt><img src="images/dng_right.jpg" width="6" height="30" /></dt>
                </dl>
            </div>
        </div>
            <div class="main_crgk_box03_box">
            	<div class="main_crgk_box03_box_list00"><img src="../../images/crgk_line01.jpg" /></div>
                <div class="main_crgk_box03_box_list">
                	<div class="main_crgk_box04_box_list_left">
                    	<div class="main_crgk_box03_box_list_left_title"><span>历年真题</span><a href="Education/crgk/crgk_zx.php?nclass=43">更多>></a></div>
                        <div class="main_crgk_box04_box_list_left_list">
                        <?php
						$sql="select * from ennews where nclass=43 and nbool=1 limit 8";
						$rs=mysql_query($sql);
						if (mysql_num_rows($rs)>=1){
							$k=0;
							while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
							$k=$k+1;
						?>
                            <dl>
                            <dt <?php if($k>4){echo"id='crgk01'";}?>><?=$k?></dt>
                            <dd><a href="Education/crgk/crgk_zx_detail.php?id=<?php echo $row["nid"];?>" title="<?php echo $row["ntitle"];?>"><?php echo msubstr($row["ntitle"],23)?></a></dd>
                            <dd id="crgk00"><?=date('Y-m-d',strtotime($row["ndate"]))?></dd>
                            </dl>
                           <?php }}?>
                        </div>
                    </div>
                    <div class="main_crgk_box03_box_list_right">
                    	<div class="main_crgk_box03_box_list_right_title" id="crgk_tb_">
                        	<ul>
                            <li id="crgk_tb_1" class="crgk_hovertab" onmousemove="crgkHoverLi(1);">高起专</li>
                            <li id="crgk_tb_2" class="crgk_normaltab" onmousemove="crgkHoverLi(2);">高起本</li>
                            <li id="crgk_tb_3" class="crgk_normaltab" onmousemove="crgkHoverLi(3);">专升本</li>
                            </ul>
                        </div>
                        <div class="main_crgk_box03_box_list_right_list">
                        	<div class="crgk_dis" id="crgk_tbc_01">
                        	<div class="main_crgk_box03_box_list_right_list00">
                            	<div class="main_crgk_box03_box_list_right_list00_01">
                                	<dl>
                                    <dt>学校</dt>
                                    <dd style="width:108px;">专业</dd>
                                    <dd style="width:80px;">类别</dd>
                                    <dd style="width:80px;">上课类型</dd>
                                    <dd style="width:82px;">上课时间</dd>
                                    <dd style="width:54px;">学费</dd>
                                    <dd style="width:46px;">报名</dd>
                                    </dl>
                                </div>
                                <div class="main_crgk_box03_box_list_right_list00_02">
                   <?php 
					$rs1=mysql_query("select * from kkinfo join school on kkinfo.s_id=school.s_id where zyclass like'%高起专%' order by kkdate desc limit 8",$conn);		 
					if (mysql_num_rows($rs1)>=1){
						$k=0;
	                while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){
						$k=$k+1;
					   $rs_1=mysql_query("select s_name from school where s_id=".$row1["s_id"],$conn); 
		               $rw1=mysql_fetch_assoc($rs_1);
					?>
                                    <dl>
                                    <dt><a href="Education/xl_pro_detail.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><?=$row1["s_name"]?></a></dt>
                                    <dd style="width:108px;"><span style="width:80px;">
                                      <?=$row1["zyname"]?>
                                    </span></dd>
                                    <dd style="width:80px;"><span style="width:108px;">
                                      <?=$row1["zyclass"]?>
                                    </span></dd>
                                    <dd style="width:80px;"><?=$row1["kcal"]?></dd>
                                    <dd style="width:82px;"><?=$row1["ktime"]?></dd>
                                    <dd style="width:54px;"><?=$row1["xfei"]?>元</dd>
                                    <dd style="width:46px;"><a href="Education/xl_pro_wsbm.php?kid=<?php echo $row1["kid"];?>&sid=<?php echo $row1["s_id"];?>"><img src="../../images/crgk_bm.jpg" /></a></dd>
                                    </dl>                                   
                   <?php }}?>
                                </div>
                            </div>
                            </div>
                            <div class="crgk_undis" id="crgk_tbc_02">
                            <div class="main_crgk_box03_box_list_right_list00">
                            	<div class="main_crgk_box03_box_list_right_list00_01">
                                	<dl>
                                    <dt>学校</dt>
                                    <dd style="width:108px;">专业</dd>
                                    <dd style="width:80px;">类别</dd>
                                    <dd style="width:80px;">上课类型</dd>
                                    <dd style="width:82px;">上课时间</dd>
                                    <dd style="width:54px;">学费</dd>
                                    <dd style="width:46px;">报名</dd>
                                    </dl>
                                </div>
                                <div class="main_crgk_box03_box_list_right_list00_02">
                   <?php 
					$rs1=mysql_query("select * from kkinfo join school on kkinfo.s_id=school.s_id where zyclass like'%高起本%' order by kkdate desc limit 8",$conn);		 
					if (mysql_num_rows($rs1)>=1){
						$k=0;
	                while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){
						$k=$k+1;
					   $rs_1=mysql_query("select s_name from school where s_id=".$row1["s_id"],$conn); 
		               $rw1=mysql_fetch_assoc($rs_1);
					?>
                                    <dl>
                                    <dt><a href="Education/xl_pro_detail.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><?=$row1["s_name"]?></a></dt>
                                    <dd style="width:108px;"><span style="width:80px;">
                                      <?=$row1["zyname"]?>
                                    </span></dd>
                                    <dd style="width:80px;"><span style="width:108px;">
                                      <?=$row1["zyclass"]?>
                                    </span></dd>
                                    <dd style="width:80px;"><?=$row1["kcal"]?></dd>
                                    <dd style="width:82px;"><?=$row1["ktime"]?></dd>
                                    <dd style="width:54px;"><?=$row1["xfei"]?>元</dd>
                                    <dd style="width:46px;"><a href="Education/xl_pro_wsbm.php?kid=<?php echo $row1["kid"];?>&sid=<?php echo $row1["s_id"];?>"><img src="../../images/crgk_bm.jpg" /></a></dd>
                                    </dl>                                   
                   <?php }}?>
                                </div>
                            </div>
                            </div>
                            <div class="crgk_undis" id="crgk_tbc_03">
                            <div class="main_crgk_box03_box_list_right_list00">
                            	<div class="main_crgk_box03_box_list_right_list00_01">
                                	<dl>
                                    <dt>学校</dt>
                                    <dd style="width:108px;">专业</dd>
                                    <dd style="width:80px;">类别</dd>
                                    <dd style="width:80px;">上课类型</dd>
                                    <dd style="width:82px;">上课时间</dd>
                                    <dd style="width:54px;">学费</dd>
                                    <dd style="width:46px;">报名</dd>
                                    </dl>
                                </div>
                                <div class="main_crgk_box03_box_list_right_list00_02">
                   <?php 
					$rs1=mysql_query("select * from kkinfo join school on kkinfo.s_id=school.s_id where zyclass like'%专升本%' order by kkdate desc limit 8",$conn);		 
					if (mysql_num_rows($rs1)>=1){
						$k=0;
	                while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){
						$k=$k+1;
					   $rs_1=mysql_query("select s_name from school where s_id=".$row1["s_id"],$conn); 
		               $rw1=mysql_fetch_assoc($rs_1);
					?>
                                    <dl>
                                    <dt><a href="Education/xl_pro_detail.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><?=$row1["s_name"]?></a></dt>
                                    <dd style="width:108px;"><span style="width:80px;">
                                      <?=$row1["zyname"]?>
                                    </span></dd>
                                    <dd style="width:80px;"><span style="width:108px;">
                                      <?=$row1["zyclass"]?>
                                    </span></dd>
                                    <dd style="width:80px;"><?=$row1["kcal"]?></dd>
                                    <dd style="width:82px;"><?=$row1["ktime"]?></dd>
                                    <dd style="width:54px;"><?=$row1["xfei"]?>元</dd>
                                    <dd style="width:46px;"><a href="Education/xl_pro_wsbm.php?kid=<?php echo $row1["kid"];?>&sid=<?php echo $row1["s_id"];?>"><img src="../../images/crgk_bm.jpg" /></a></dd>
                                    </dl>                                   
                   <?php }}?>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
              <div class="main_crgk_box03_box_list00"><img src="../../images/crgk_line01.jpg" /></div>
            </div>
          </div>
          <div class="main_crgk_box03">
          	<div class="main_crgk_box04_title">
        	<div class="main_crgk_box03_title_left">名校招生</div>
            </div>
            <div class="main_crgk_box03_box">
            	<div class="main_crgk_box04_box_list00"><img src="../../images/crgk_line01.jpg" /></div>
                <div class="main_crgk_box04_box_list">
                	<div class="main_crgk_box04_box_list_left">
                    	<div class="main_crgk_box03_box_list_left_title"><span>招生简章</span><a href="Education/crgk/crgk_pro_list.php">更多>></a></div>
                        <div class="main_crgk_box04_box_list_left_list">
        <?php
      $sql="select * from kkinfo join school on kkinfo.s_id=school.s_id where bk_id=4 order by kkdate desc limit 5";
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	  
	 if (mysql_num_rows($rs)>=1){
		 $j=0;
	 while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
		 $j=$j+1;
		?>
              <dl>
              <dt <?php if($k>4){echo"id='crgk01'";}?>><?=$j?></dt>
              <dd><a href="Education/xl_pro_detail.php?kid=<?=$row["kid"]?>&sid=<?=$row["s_id"]?>"><?=$row["ktitle"]?></a></dd>
              <dd id="crgk00"><?=$row["kkdate"]?></dd>
              </dl>
       <?php }}?>
                        </div>
                    </div>
                <div class="main_crgk_box04_box_list_right">
                   <?php
      $sql="select * from kkinfo join school on kkinfo.s_id=school.s_id where bk_id=4 order by kclick desc limit 6";
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){  
	  exit("数据库操作失败! 错误信息为:".mysql_error());
	  }
	  
	 if (mysql_num_rows($rs)>=1){
		 $j=0;
	 while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
		 $j=$j+1;
		?>
                    	<div class="main_crgk_box04_box_list_right_list">
                    	  <div class="main_crgk_box04_box_list_right_list_pic">
                    	    <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
                    	      <tr>
                    	        <td align="center" valign="middle"><a href="Education/xl_pro_detail.php?kid=<?=$row["kid"]?>&sid=<?=$row["s_id"]?>"><img src="../../admin_root/<?=$row["s_logo"]?>" border="0" align="top"   onload="this.width=80"/></a></td>
                  	        </tr>
                  	      </table>
                  	    </div>
                    	  <div class="main_crgk_box04_box_list_right_list_text">
                          	<dl>
                            <dt>学校：<span><?=$row["s_name"]?></span></dt>
							<dt>专业：<span><?=$row["zyname"]?></span></dt>
                            <dd><a href="Education/xl_pro_wsbm.php?kid=<?php echo $row["kid"];?>&sid=<?php echo $row["s_id"];?>"></a><a href="Education/xl_pro_wsbm.php?kid=<?php echo $row["kid"];?>&sid=<?php echo $row["s_id"];?>"><img src="../../images/crgk_djbm.jpg" /></a></dd>
                            </dl>
                          </div>
                  </div>
         <?php }}?>                                     
                </div>
          </div>
          <div class="main_crgk_box04_box_list00"><img src="../../images/crgk_line01.jpg" /></div>
      </div>
  </div>
  </div>
  </div>
  <!-- main End --> 
  
  <!-- bottom -->
  <?php include("../../bottom/bottom.html");?>
  <!-- bottom End --> 
</div>
</body>
</html>
