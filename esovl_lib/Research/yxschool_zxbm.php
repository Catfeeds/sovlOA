<?php 
include_once("../web_start.php");
$rowa=$dblink->find("yx_step",array(),"yx_id =6");
if(isset($_GET["id"])){$_SESSION["yxk_id"]=$_GET["id"];}			 
$rowb=$dblink->find("yx_kaike",array(),"yxk_id={$_SESSION["yxk_id"]}",'join yx_school on yx_kaike.yxk_school=yx_school.school_id');
?>
<?php include('Research_head.php');?>
<body>
<?php
$post=$_POST;
if (isset($post["user_school"])){
unset($post['button']);
$post['user_date']=date('Y-m-d H-m-s');
$num=$dblink->insert("yx_user",$post);
 if($num){echo"<script>alert('报名成功!');location.href='yxschool.php?id=".$_SESSION['yxk_id']."';</script>";}else{exit("信息出错");}
}
?>
<div class="wrapper">
<!-- top -->
<!-- top end -->
<!-- main -->
<?php include('yx_top.html'); ?>
<div class="main_box02">
     <div class="main_box002"><img src="images/yx_b01.jpg" width="950" height="4" /></div>
     <div class="main_box001"><?=$rowa["yx_gg"]?></div>
     <div class="main_box002"><img src="images/yx_b02.jpg" width="950" height="4" /></div>
</div>
<div class="main_box02">  
   <div class="main_box002"><img src="images/yx_b01.jpg" width="950" height="4" /></div>
     <div class="main_box001">
         <div class="yx_s001">您现在的位置：研修 >> <span><?php echo $rowb["school_name"];?></span>-><span><?php echo $rowb["yxk_title"];?></span></div>
         <div class="yx_s002">
		<ul><li><a href="yxschool_kcjs.php?con=kc">课程介绍</a></li><li><a href="yxschool_kcjs.php?con=xw">学位与证书</a></li><li><a href="yxschool_kcjs.php?con=zs">招生对象</a></li><li><a href="yxschool_kcjs.php?con=sz">师资配备</a></li><li><a href="yxschool_kcjs.php?con=kcsz">课程设置</a></li><li><a href="yxschool_kcjs.php?con=bmxz">报名须知</a></li><li><a href="yxschool_kcjs.php?con=cailiao">申请所需材料</a></li><li><a href="yxschool_zxwd.php">在线问答</a></li><li><a href="#db">本校其他课程</a></li></ul>
         </ul>
         </div>
         
         <div class="yx_s003">
            <div class="yx_s003_left">
              <div class="yx_qt_title">在线报名</div>
              <form name="bmform" onSubmit="return wsbm133()"  action="" method="post">
					<div class="yx_qt_main">
						<div class="bm_top"><?php echo $rowb["yxk_title"]?>报名申请表 </div>
						 <div class="bm_title"><span>您选择地课程</span></div>                  
						<div class="bm_caption">学校名称：<input name="user_school" readonly="" type="text" value="<?php echo $rowb["school_name"]?>"/></div>
						<div class="bm_caption">课程名称：<input name="user_kec" type="text" readonly="" value="<?php echo $rowb["yxk_title"]?>"/></div>
						 <div class="bm_title"><span>您的个人信息</span><span class="bm_xinhao">注意：带<font color="red">*</font>号的项必须填写</span></div> 
						<div class="bm_caption">姓　　名：
						   <input name="user_name" type="text"/><label id="username"></label>
						   <font color="red">*</font></div>
						<div class="bm_caption">性　　别：                   
						  <select name="user_sex" id="select">
							<option value="男" selected="selected">男</option>
							<option value="女">女</option>
						  </select>
						</div>
						<div class="bm_caption">电　　话：
						  <input name="user_tel" type="text" /><label id="usertel"></label>
						  <font color="red">*</font></div>
						 <div class="bm_caption">电子邮箱：
						   <input name="user_mail" type="text" /></div>
						 <div class="bm_caption">其他说明：                   
						   <textarea name="user_shuom" id="textarea" cols="45" rows="5"></textarea>
						   (500字内)
						 </div>
						  <div class="bm_caption">
							<input type="submit" name="button" id="button_bm" value="提交申请表" /> 
							<input type="reset" name="button_bm" id="button_bm2" value="重　填" />
						  </div>
					</div>
              </form>
          </div>
          <div class="yx_s003">            
            <div class="yx_s003_right">
                <div class="yx_s003_top"><span><img src="images/yx_tel_01.jpg" width="261" height="9" /></span>
                    <span class="yx_tel02"><ul><li class="yx_tel_dot"><font class="yx_font_tel"><?php echo $rowb["yxk_tel"];?></font><img src="images/yx_rtel.jpg" width="54" height="43" /></li><li class="yx_tel_lef"><font>★</font>提交报名申请后，招办老师会在一个工作日内与您联系确认招名事宜。<font>★</font></li><li><a href="yxschool_zxbm.php?id=<?php echo $_SESSION["yxk_id"]?>"]"><img src="images/yx_bm.jpg" width="148" height="38" /></a></li>
                    </ul>
                    </span>
                    <span><img src="images/yx_tel_02.jpg" width="261" height="9" /></span>
                </div>
				<div class="yx_s004_top">
                    <div class="yx_kkxx">报名须知</div>
                    <div class="yx_kkxx_list"><?=$rowb["school_bmxz"];?></div>
                </div>
                <div class="yx_s004_top">
                    <div class="yx_kkxx">本校其他课程</div>
                    <div class="yx_kkxx_list">
						<ul>
							<?php
								$rowd=$dblink->findAll("yx_kaike",array(),"yxk_school={$rowb["yxk_school"]}",'','9','yxk_id desc');
								foreach($rowd as $v){
							?>
							<li>·<a href="yxschool.php?id=<?=$v["yxk_id"]?>" title="<?=$v["yxk_title"]?>"><?=$Common->strCutAndTags($v["yxk_title"],43,'..')?></a></li>
							<?php }?>
						</ul>
                    </div>
                </div>
            </div>
        </div>
         </div>
     </div>     
     <div class="main_box002"><img src="images/yx_b02.jpg" width="950" height="4" /></div>
</div>
<!-- main end -->
<!-- bottom -->
<?php include('yx_bottom.html'); ?>
<!-- bottom end -->
</div>  
</body>
</html>