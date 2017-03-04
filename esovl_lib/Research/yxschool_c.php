<?php
include_once("../conn.php");
include_once("../webstep.php");
?>
<?php
			$sql="select * from yx_kaike join yx_school on yx_kaike.yxk_school=yx_school.school_id where yxk_id=".$_GET["id"];
			$rs=mysql_query($sql);
			$coun=mysql_num_rows($rs);
			if ($coun>=1){
			$rowb=mysql_fetch_array($rs,MYSQL_ASSOC);
			$yxk_school=$rowb["yxk_school"];
			 }else{
			exit("对不起，没有找到相关信息！");
			}
			mysql_free_result($rs);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上海XX大学-研究教育-一休教育网</title>
<link href="css/yxcss.css" rel="stylesheet" type="text/css" />
<link href="css/yxtop.css" rel="stylesheet" type="text/css" />
<link href="css/yxmain.css" rel="stylesheet" type="text/css" />
<link href="css/yxbottom.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 6]>
<script language="javascript" src="js/ie6png.js" type="text/javascript" ></script>
<! [endif] -->
<script language="javascript" src="js/yx_nav.js" type="text/javascript" ></script>

</head>

<body>
<div class="wrapper">
<!-- top -->
<?php include('yx_top.html'); ?>
<!-- top end -->

<!-- main -->
<div class="main_box02">
     <div class="main_box002"><img src="images/yx_b01.jpg" width="950" height="4" /></div>
     <div class="main_box001"><?php echo $yx_gg;?></div>
     <div class="main_box002"><img src="images/yx_b02.jpg" width="950" height="4" /></div>			
</div>
<div class="main_box02">  
     <div class="main_box002"><img src="images/yx_b01.jpg" width="950" height="4" /></div>
     <div class="main_box001">
         <div class="yx_s001">您现在的位置：研修 >> <span><?php echo $rowb["school_name"];?></span></div>
         <div class="yx_s002">
         <ul><li><a href="#">课程介绍</a></li><li><a href="#">学位与证书</a></li><li><a href="#">招生对象</a></li><li><a href="#">师资配备</a></li><li><a href="#">课程设置</a></li><li><a href="#">报名须知</a></li><li><a href="#">申请所需材料</a></li><li><a href="#">在线问答</a></li><li><a href="#">本校其他课程</a></li></ul>
         </div>
         <div class="yx_s003">
            <div class="yx_s003_left">
            <div class="yx_l_title">课程介绍</div>
            <div class="yx_l_con"><?php echo utf_substr($rowb["school_kc"],300);?></div>
            <div class="yx_l_title">课程设置</div>
            <div class="yx_l_con"><?php echo utf_substr($rowb["school_kcsz"],400);?></div>
            <div class="yx_l_title">师资配备</div>
            <div class="yx_l_con"><?php echo utf_substr($rowb["school_sz"],400);?></div>
              <div class="yx_l_title">开课信息</div>
            <div class="yx_l_con">
              <table cellspacing="1" cellpadding="2" width="90%" align="left" bgcolor="#ACACAC" border="0">
                <tbody>
                  <tr>
                    <td align="right" width="15%" bgcolor="#E8E8E8" height="25">开课日期： </td>
                    <td width="85%" bgcolor="#ffffff"><?php echo $rowb["yxk_time"];?></td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#E8E8E8" height="25">上课地点： </td>
                    <td bgcolor="#ffffff"><?php echo $rowb["yxk_adder"];?></td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#E8E8E8" height="25">开课名称： </td>
                    <td bgcolor="#ffffff"><?php echo $rowb["yxk_title"];?></td>
                  </tr>
                </tbody>
              </table>
            </div>
           <div class="yx_l_title">在线留言</div>
            <div class="yx_l_con">
            <form name="meform" enctype="" method="post" action="">
              <p>昵称：<input name="" type="text" /> 您尚未登陆，将以游客身分留言。[<a href="#">登陆</a>] [<a href="#">注册</a>]</p>
              <p><textarea name="" cols="60" rows="5"></textarea></p>
              <p class="sumcent"><img src="images/mesub01.jpg" width="124" height="30" /></p>
              </form>
            </div>
             <div class="yx_l_user">网友：刘小波 [2011-03-05]</div>
             <div class="yx_l_con_msg">
               <p><font color="red">问：</font>请问上海交大今年的MBA项目已经结束报名了吗？详细的资料在哪里可以看到？谢谢。</p>
               <p class="yx_da"><font color="red">答：</font>你好，交大的MBA项目我们这里暂时没有，只有考前辅导班</p>
             </div>
             <div class="yx_answer">【学校答复】[2011-4-19 9:28:50]</div>
             <div class="yx_l_user">网友：匿名 [2011-03-05]</div>
             <div class="yx_l_con_msg">
               <p><font color="red">问：</font>请问上海交大今年的MBA项目已经结束报名了吗？详细的资料在哪里可以看到？谢谢。</p>
               <p class="yx_da"><font color="red">答：</font>你好，交大的MBA项目我们这里暂时没有，只有考前辅导班</p>
             </div>
             <div class="yx_answer">【学校答复】[2011-4-19 9:28:50]</div>
           </div>
            <div class="yx_s003_right">
                 <div class="yx_s003_top"><span><img src="images/yx_tel_01.jpg" width="261" height="9" /></span>
                                          <span class="yx_tel02"><ul><li class="yx_tel_dot"><font class="yx_font_tel"><?php echo $rowb["yxk_tel"];?></font><img src="images/yx_rtel.jpg" width="54" height="43" /></li><li class="yx_tel_lef"><font>★</font>提交报名申请后，招办老师会在一个工作日内与您联系确认招名事宜。<font>★</font></li><li><img src="images/yx_bm.jpg" width="148" height="38" /></li>
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
					$sq2="select * from yx_kaike where yxk_school='$yxk_school' order by yxk_id desc limit 9";	
					$rs2=mysql_query($sq2);
					if (mysql_num_rows($rs2)>=1){
					   while ($row1=mysql_fetch_array($rs2,MYSQL_ASSOC)){
					?>
                     <li>·<a href="yxschool.php?id=<?=$row1["yxk_id"]?>" title="<?=$row1["yxk_title"]?>"><?php echo utf_substr($row1["yxk_title"],34);?></a></li>
                                          <?php }}
					 else{
						 echo "没有相关信息";
						 }?>
                     </ul>
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