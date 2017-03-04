<?php 
include_once("../web_start.php");

$web=getWeb("11");
$web['z_title']=$z_name.'>-培训学校';
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
	<div class="px_weizhi">你现在的位置：<a href="index.php">培训</a> >> <a href="px_shcool.php">上海培训学校</a> >> 全部培训学校</div>
    <div class="px_shop">
    	 <div class="px_shop_left">
         	<div class="px_shcool_box">
                <div class="px_shcool_box_title">
                    <div class="px_shcool_box_title_00">
                    	<ul>                      
                    	<li id="px_stb_2" class="px_shovertab" onmouseover="px_sHoverLi(2);"><a href="#">按校区分布</a></li>
                        </ul>
                    </div>
                </div>
              
              
<div class="px_shop_left_box02_box">
          <?php
		$res = $dblink->findAll('pxschool');
          foreach($res as $row){?>
           	<div class="px_shop_left_box02_box_00">
              <div class="px_shop_left_box02_box_title"><a href="px_school/?pid=<?=$row["pxs_id"]?>"><?=$row["pxs_name"]?></a></div>
              <div class="px_shop_left_box02_box_title_list">
             <?php
			$res0 = $dblink->findAll('pxkkinfo','',"pxk_sid=".$row["pxs_id"]);
			foreach($res0 as $row0){?>
                <div class="px_shop_left_box02_box_title_list00">
                                <div class="px_shop_left_box02_box_title_list00_pic"  onmouseout="this.style.border='1px solid #d0d0d0'" onmousemove="this.style.border='1px solid #7cc0e3'">
    <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
    <tr>
    <td align="center" valign="middle">
    <a href="px_kc_list_details.php?id=<?=$row0["pxk_id"]?>"><img src="../admin_root/<?=$row0["pxk_pic"]?>" border="0" align="top" onload="javascript:if(this.width>148){this.width=148}"/></a>
    </td>
    </tr>
    </table>
                                </div>
                                <div class="px_shop_left_box02_box_title_list00_pic_bt"><a href="px_kc_list_details.php?id=<?=$row0["pxk_id"]?>"><?=$row0["pxk_title"]?></a></div>
                            </div>
             <?php }?>
              </div>
                    </div>
          <?php }?>          
</div>
              	
            </div>
            
      	 </div>
         <div class="px_shop_right">
         	<div class="main_box03_right_box02">
            	<div class="main_box03_right_box02_title">
                	<dl>
                    <dt>最新上线课程</dt>
                    <dd>&nbsp;</dd>
                    </dl>
                </div>
                <div class="main_box03_right_box02_list">
                    <div class="main_box03_right_box02_list_01_cjwt">
                    	<ul>
          <?php
		  $res = $dblink->findAll('pxkkinfo','','','','15','pxk_date desc');
          foreach($res as $rowa){?>
             <li><span>·</span><a href="px_kc_list_details.php?id=<?=$rowa["pxk_id"]?>"><?=$rowa["pxk_title"]?></a></li>
          <?php }?>           
                      </ul>
                    </div>
                    
                </div>
            </div>
         	<div class="main_box03_right_box02">
           	  <div class="main_box03_right_box02_title">
                	<dl>
                    <dt>最多点击课程</dt>
                    <dd>&nbsp;</dd>
                    </dl>
                </div>
                <div class="main_box03_right_box02_list">
                    <div class="main_box03_right_box02_list_01_cjwt">
                    	<ul>
           <?php	   
          $res = $dblink->findAll('pxkkinfo','','','','15','pxk_click desc');
          foreach($res as $rowb){?>
                        <li><span>·</span><a href="px_kc_list_details.php?id=<?=$rowb["pxk_id"]?>"><?=$rowb["pxk_title"]?></a></li>
          <?php }?>        
                      </ul>
                    </div>
                    
                </div>
            </div>
            <div class="main_box03_right_box02">
            	<div class="main_box03_right_box02_title">
                	<dl>
                    <dt>优惠最多课程</dt>
                    <dd>&nbsp;</dd>
                    </dl>
                </div>
                <div class="main_box03_right_box02_list">
                    <div class="main_box03_right_box02_list_01_cjwt">
                    	<ul>                       
                         <?php   
         $res = $dblink->findAll('pxkkinfo','','','','15','pxk_yhui desc');
          foreach($res as $rowc){?>
                        <li><span>·</span><a href="px_kc_list_details.php?id=<?=$rowc["pxk_id"]?>"><?=$rowc["pxk_title"]?></a></li>
          <?php }?>    
                      </ul>
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