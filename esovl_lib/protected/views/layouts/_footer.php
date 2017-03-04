<!-- bottom -->
<div class="bottom">
  <div class="bottom_box01">
    <div class="main_box06_top"><img src="/images/bottom_bg_top.jpg" /></div>
    <div class="main_box06_cen">
      <div class="main_box06_cen_box01">
        <div class="main_box06_cen_box01_left">合作机构</div>
        <div class="main_box06_cen_box01_right">
          <ul>
            <div id="demo">
              <div id="indemo">
                <div id="demo1">
                <?php
					foreach(Hzjg::model()->findAll() as $row){ ?>
					<li class="dw"><a href="<?php echo $row['hz_link']?>"><img src="/admin_root/<?php echo $row['hz_logo']?>" /></a></li>
				    <li>
						<a href="<?=$row['hz_link']?>"><img src="/admin_root/<?php echo $row['hz_logo']?>"></a>
					</li>
				<?php }?>		
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
						foreach(Yqlj::model()->findAll() as $row){
						?>
            <li><a href="<?php echo $row['yq_link']?>" target="_blank"><?php echo $row['yq_title']?></a></li>
            <?php }?>
            <li><a href="javascript:vold(null)" style="color:#ff7216;" onclick="jw.pop.alert('请发申请邮件到<?=$web['z_email']?>,谢谢配合！')">申请友情链接</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="main_box06_top"><img src="/images/bottom_bg_bottom.jpg" /></div>
  </div>
  <div class="bottom_box02">
    <div class="bottom_box02_01">
      <ul>
        <li><a href="#"><img src="/images/bottom01.jpg" /></a></li>
        <li><a href="#"><img src="/images/bottom02.jpg" /></a></li>
      </ul>
    </div>
    <div class="bottom_box02_02">
		<div class="bottom_box02_02_nav">
		<?php	$rs=Cpinfo::model()->findAll("cp_id<>10");
				foreach($rs as $k=>$row){?>
					<a href="<?=Yii::app()->createUrl("site/about",array("id"=>$row["cp_id"]))?>"><?=$row["cp_title"]?></a>
		<?php		echo $k+1!==count($rs)?"<span>-</span>":"";
				}?>
		</div>
		<div class="bottom_box02_02_dz"> 联系电话：<?=$web['z_tel']?> 地址：<?=$web['z_address'] ?><br />
        Copyright <span>&copy;</span> 2010, 版权所有 <?=$web['z_name']?><?=$web['z_icp']?> </div>
    </div>
  </div>
</div>
<!-- bottom End -->

