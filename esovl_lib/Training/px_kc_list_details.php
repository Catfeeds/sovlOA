<?php 
include_once("../web_start.php");
$web=getWeb("11");

$browse = $dblink->query("update pxkkinfo set pxk_click=pxk_click+1 where pxk_id=".$_GET["id"]);
$rowa = $dblink->find('pxkkinfo','',"pxk_id=".$_GET["id"]);

$web['z_title']=$rowa["pxk_title"].' - '.$z_name;
include_once("Training_header.php");
?>
<script src="js/pxstyle.js"></script>

<body>
<div class="wrapper">


<!-- top -->
<?php include("pxtop.html")?>
<!-- top End -->

<!-- main -->
<div class="main">
	<div class="px_gg"><?=$web['z_banner']?></div>
    <div class="px_ss">
		<ul>
			<?php 
			if(isset($_POST["xl_skey"])){	
				$skey=@$_POST["xl_skey"];
				echo "<script>location.href='../Education/xl_pro_search.php?skey=".$skey."';</script>";	
			}
	 ?>
			<form name="xl_sform" id="xl_sform" method="post" onsubmit="return xl_sou();" action="">
          <li>
            <input name="xl_skey" type="text" style="width:220px;" />
          </li>
          <li>
            <input name="input" type="image" src="images/ss_pro.jpg" style="width:60px;height:24px;" />
          </li>
          <li><span>搜索关键词：</span><a href="#">考研</a> <a href="#">普通高考</a> <a href="#">成人高考</a> <a href="#">自考</a> <a href="#">在职硕士</a></li>
        </form>
      </ul>
    </div>
      <?php
      $sq="select ps_title from pxsclass where ps_id=(select pxk_cl from pxkkinfo where pxk_id=".$_GET["id"].")";
	  $row0 = $dblink->fetchOne($sq);	  
     ?>
    <div class="px_kclist">
    	<div class="px_kclist_wz">您当前的位置：<a href="index.php">培训首页</a> >> 课程分类 >> <?=$row0["ps_title"]?></div>
        <div class="px_kclist_fl">
        	<ul>
      <?php
      $sql="select * from pxsclass where pb_id=(select pb_id from pxsclass where ps_id=(select pxk_cl from pxkkinfo where pxk_id=".$_GET["id"]."))";
	  $res = $dblink->fetchAll($sql);
	  foreach($res as $row){    
     ?>
          <li><a href="px_kc_list.php?pid=<?=$row["ps_id"]?>">
            <?=$row["ps_title"]?>
          </a></li>
          <?php }?>
            </ul>                                                                                        
        </div>
        <div class="px_kclist_box01">
        	<div class="main_box03_left">
            	<div class="main_box03_left_px_kc_details">
                	<div class="main_box03_left_px_kc_details_box01"><?=$rowa["pxk_title"]?></div>
                    <div class="main_box03_left_px_kc_details_box02">
                    	<div class="main_box03_left_px_kc_details_box02_pic">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td align="center" valign="middle">
<a href="#"><img src="../admin_root/<?=$rowa["pxk_pic"]?>" border="0" align="top"  width="245" height="188"/></a>
</td>
</tr>
</table>
                        </div>
                      <div class="main_box03_left_px_kc_details_box02_text">
                  <dl><dt><span>学费：</span><?=$rowa["pxk_xfei"]?></dt><dd><span>一休网优惠价格：</span><?=$rowa["pxk_yhui"]?></dd></dl>
                  <ul><li><span>开课时间：</span><?=$rowa["pxk_time"]?></li></ul>
                  <dl><dt><span>学时：</span><?=$rowa["pxk_xshi"]?></dt><dd><span>浏 览 量：</span><?=$rowa["pxk_click"]?>次</dd></dl>
                     
    <?php
	  $rowp = $dblink->find('pxschool','',"pxs_id=".$rowa["pxk_sid"]);
	  $pxs_name=$rowp["pxs_name"];
	?>                   
              <ul>
                <li><span>授课机构：</span><a href="px_school/?pid=<?=$rowa["pxk_sid"]?>"><?=$pxs_name?></a></li>
                <li><span>上课地点：</span><?=$rowa["pxk_adder"]?></li>
              </ul>
                            <dl>
                            <dt><a href=tencent://message/?uin=<?=$rowa["pxk_qq"]?>&Site=<?=$z_name?>&Menu=yes title="在线咨询2"><img border="0" src=http://wpa.qq.com/pa?p=1:<?=$rowa["pxk_qq"]?>:7 align="top"/></a></dt>
                            <dd><a href="px_school/baoming.php?pid=<?=$rowa["pxk_sid"]?>"><img src="images/px_wsbm.jpg" /></a></dd>
                            </dl>
                            <ul><li><strong>联系电话：<?=$rowa["pxk_tel"]?></strong></li></ul>
                        </div>
                    </div>
                    <div class="main_box03_left_px_kc_details_box03">
                    	<div class="main_box03_left_px_kc_details_box03_title"><span>详细介绍</span></div>
                        <div class="main_box03_left_px_kc_details_box03_list">
                        	<ul>
                            <li><span>【交通线路】</span><?=$rowa["pxk_line"]?></li>
                            <li><span>【适合对象】</span><?=$rowa["pxk_duix"]?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="main_box03_left_px_kc_details_box04">
                    	<h2><?=$rowa["pxk_title"]?></h2>
                       	<div class="main_box03_left_px_kc_details_box04_test"><?=$rowa["pxk_con"]?></div>
                    </div>
                </div>
            </div>
            <div class="main_box03_right">
            <div class="main_box03_right_box02">
            	<div class="main_box03_right_box02_title">
                <dl><dt>推荐课程</dt></dl>
                </div>
                <div class="main_box03_right_box02_list">
                <div class="main_box03_right_box02_list_kc">
      <?php
		$res = $dblink->findAll('pxkkinfo','','','','','pxk_bool desc');
		foreach($res as $row){
             ?>                 
          <dl><dt><a href="px_kc_list_details.php?id=<?=$row["pxk_id"]?>" title="<?=$row["pxk_title"]?>"><?=$Common->strCut($row["pxk_title"],26)?> </a></dt><dd><?=$row["pxk_date"]?></dd></dl>
     <?php }?>
                    </div>
                    
                </div>
            </div>
            
            <div class="main_box03_right_box03">
            	<div class="main_box03_right_box0300"><?=$web['z_right3']?></div>
          	</div>
            
            <div class="main_box03_right_box02">
            <div class="main_box03_right_box02_title">
              <dl>
                <dt>在线问答</dt>
                <dd><a href="px_wd_list.php">更多...</a></dd>
              </dl>
            </div>
            <div class="main_box03_right_box02_list">
          <?php   
			$res = $dblink->findAll('pxwd','','px_bool=1','','4','px_time desc');
			foreach($res as $row){
		  ?>
              <div class="main_box03_right_box02_list_01">
                <ul>
                  <li><span>【问】：</span><?=$row["px_ask"]?></li>
                  <li><span>【答】：</span><?=$row["px_answer"]?></li>
                </ul>
              </div>
          <?php }?>   
            </div>
          </div>
            
            
      </div>
        </div>
    </div>
</div>
<!-- main End -->

<!-- bottom -->
<?php include("pxbottom.html");?>
<!-- bottom End -->

</div>

</body>
</html>
