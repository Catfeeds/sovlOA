<!-- bottom -->
<div class="bottom">
  <div class="bottom_box01">
    <div class="main_box06_top"><img src="images/bottom_bg_top.jpg" /></div>
    <div class="main_box06_cen">
      <div class="main_box06_cen_box01">
        <div class="main_box06_cen_box01_left">合作机构</div>
        <div class="main_box06_cen_box01_right">
          <ul>
            <div id="demo">
              <div id="indemo">
                <div id="demo1">
                  <?php
						$res = $dblink->findAll('hzjg','','','','30');
						foreach($res as $row){
						?>
                  <li class="dw"><a href="<?php echo $row['hz_link']?>"><img src="../admin_root/<?php echo $row['hz_logo']?>" /></a></li>
                  <?php
						}?>
                </div>
                <div id="demo2"></div>
              </div>
            </div>
          </ul>
          <script>
<!--
var speed=30; //数字越大速度越慢
var tab=document.getElementById("demo");
var tab1=document.getElementById("demo1");
var tab2=document.getElementById("demo2");
tab2.innerHTML=tab1.innerHTML;
function Marquee(){
if(tab2.offsetWidth-tab.scrollLeft<=0)
tab.scrollLeft-=tab1.offsetWidth
else{
tab.scrollLeft++;
}
}
var MyMar=setInterval(Marquee,speed);
tab.onmouseover=function() {clearInterval(MyMar)};
tab.onmouseout=function() {MyMar=setInterval(Marquee,speed)};
-->
</script> 
        </div>
      </div>
      <div class="main_box06_cen_box02">
        <div class="main_box06_cen_box02_left">友情链接</div>
        <div class="main_box06_cen_box02_right">
          <ul>
            <?php
						$res = $dblink->findAll('yqlj','','','','15');
						foreach($res as $row){
						?>
            <li><a href="<?php echo $row['yq_link']?>" target="_blank"><?php echo $row['yq_title']?></a></li>
            <?php
						}?>
            <li><a href="#" style="color:#ff7216;" onclick="alert('请发申请邮件到server@esolv.com,谢谢配合！')">申请友情链接</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="main_box06_top"><img src="images/bottom_bg_bottom.jpg" /></div>
  </div>
  <div class="bottom_box02">
    <div class="bottom_box02_01">
      <ul>
        <li><a href="#"><img src="images/bottom01.jpg" /></a></li>
        <li><a href="#"><img src="images/bottom02.jpg" /></a></li>
      </ul>
    </div>
    <div class="bottom_box02_02">
      <div class="bottom_box02_02_nav">
        <?php
			  $res = $dblink->findAll('cpinfo','','cp_id<>10');
              if (count($res)>=1){
                  $k=0;
                  foreach($res as $row){
                  $k=$k+1;
		?>
        <a href="../about.php?cid=<?=$row["cp_id"]?>">
        <?=$row["cp_title"]?>
        </a><?php if ($k!=count($res)){?><span>-</span>
        <?php }}} ?>
      </div>
      <div class="bottom_box02_02_dz"> 联系电话：<?php echo $z_tel?> 地址：<?php echo $z_address?><br />
        Copyright <span>&copy;</span> 2010, 版权所有 <?php echo $z_name?> <?php echo $z_icp?> </div>
    </div>
  </div>
</div>
<!-- bottom End -->