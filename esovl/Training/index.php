<?php 
include_once("../web_start.php");
$web=getWeb("11");
include_once("Training_header.php");
?>
<script src="js/pxstyle.js"></script>
<script language="javascript">
function opennavbox(ww){
   document.getElementById(ww).style.display="block";
}
function closenavbox(ww){
   document.getElementById(ww).style.display="none";
}
</script>

<body>
<div class="wrapper">
  <!-- top -->
  <?php include("pxtop.html")?>
  <!-- top End -->
  <!-- main -->
  <div class="main">
    <div class="px_gg"><?=$web['z_banner']?></div>
    <div class="main_box02">
      <div class="main_box02_left">
        <div class="main_box02_left_title"> <span>培训分类</span> </div>
        <div class="main_box02_left_list">
          <div class="main_box02_left_list00">
            <ul>
              <?php
				$res = $dblink->findAll("pxbclass",'','','','10');
				$i=0;
				foreach($res as $row){
				$i=$i+1;			 $i=$i+1;
			 ?>
              <li onmousemove="opennavbox('nav0<?=$i?>');" onmouseout="closenavbox('nav0<?=$i?>');">
             <?php
             if ($row["pb_pindao"]=="外语频道"){
             echo"<a href='px_pd01.php'>".$row["pb_title"]."</a>";
             }
              if ($row["pb_pindao"]=="高考频道"){
             echo"<a href='px_pd02.php'>".$row["pb_title"]."</a>";
             }
             if ($row["pb_pindao"]=="早教频道"){
             echo"<a href='px_pd03.php'>".$row["pb_title"]."</a>";
             }
             if ($row["pb_pindao"]=="职业频道"){
             echo"<a href='px_pd04.php'>".$row["pb_title"]."</a>";
             }
             if ($row["pb_pindao"]=="艺术体育"){
             echo"<a href='px_pd05.php'>".$row["pb_title"]."</a>";
             }
             if ($row["pb_pindao"]=="少儿频道"){
             echo"<a href='px_pd06.php'>".$row["pb_title"]."</a>";
             }
             if ($row["pb_pindao"]=="中学生辅导"){
             echo"<a href='px_pd07.php'>".$row["pb_title"]."</a>";
             }                 
				$res1 = $dblink->findAll('pxsclass',"","pb_id=".$row["pb_id"]);
			?>
                <ul class="nav0" id="nav0<?=$i?>" style="display:none;">
                  <?php
                            $k=0;
                           foreach($res1 as $row1){
								$k=$k+1;
								if ($k==1){
                  ?>
                  <dl>
              <dd style="border-left:none; width:151px;"><a href="px_kc_list.php?pid=<?=$row1["ps_id"]?>"><?=$row1["ps_title"]?></a></dd>
                  </dl>
                  <?php }else{?>
                  <dl>
                    <dd><a href="px_kc_list.php?pid=<?=$row1["ps_id"]?>"><?=$row1["ps_title"]?></a></dd>
                  </dl>
                  <?php }}?>
                </ul>
              </li>
              <?php }?>
            </ul>
          </div>
        </div>
      </div>
      <div class="main_box02_center">
        <div class="main_box02_center_flash">
          <?php include_once("px_hdp.php"); ?>
        </div>
      </div>
      <div class="main_box02_right">
        <div class="main_box02_right_title">一休会员</div>
        <div class="main_box02_right_list">
          <div class="main_box02_right_list_01">
            <form name="logform" method="post" id="logform" onsubmit="return pxXMLHttp()" action="">
              <dl>
                <dt>账号：</dt>
                <dd>
                  <input name="user" type="text" />
                  <span id="luser"></span></dd>
              </dl>
              <dl>
                <dt>密码：</dt>
                <dd>
                  <input name="pass" type="password" />
                  <span id="lpass"></span></dd>
              </dl>
              <dl>
                <dt>&nbsp;</dt>
                <dd><a href="#" onclick="alert('暂未开通此功能..')">忘记密码？</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="alert('暂未开通此功能..')">修改密码</a></dd>
              </dl>
              <dl>
                <dt>&nbsp;</dt>
                <dd>
                  <input type="image" src="images/px_dl.jpg" style="width:69px;height:25px;"/>
                  &nbsp;&nbsp;&nbsp;<a href="../vip_zc.php"><img src="images/dl_zc.jpg" style="margin-top:4px;"/></a></dd>
              </dl>
            </form>
          </div>
          <div class="main_box02_right_list_02">
            <dl>
              <dt>注册教一休网，成为会员特权更多：</dt>
              <dd>1.轻松三步搞定注册</dd>
              <dd>2.累计天币兑换精美好礼</dd>
              <dd>3.享受更多贴心专享服务</dd>
            </dl>
          </div>
          <div class="main_box02_right_list_03">
            <ul>
              <li><a href=tencent://message/?uin=<?=$qq1?>&Site=一休教育网&Menu=yes title="在线咨询1"><img border="0" src=http://wpa.qq.com/pa?p=7:<?=$qq1?>:7 align="top"/></a></li>
              <li><a href=tencent://message/?uin=<?=$qq2?>&Site=一休教育网&Menu=yes title="在线咨询1"><img border="0" src=http://wpa.qq.com/pa?p=7:<?=$qq2?>:7 align="top"/></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="main_box03">
      <div class="main_box03_left">
        <div class="main_box03_left_box">
          <div class="main_box03_left_title">
            <dl>
              <dt><img src="images/px_t01.jpg" /></dt>
              <dd>
                <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
                  <tr>
                    <td align="right" valign="middle">
	  <?php
		$res = $dblink->findAll('pxsclass','','pb_id=1');
		 $k=0;
		 foreach($res as $row1){
			$k=$k+1;
			if ($k!=count($res)){
                   ?>
                  <a href="px_kc_list.php?pid=<?=$row1["ps_id"]?>"><?=$row1["ps_title"]?></a> |  <?php }else{?>
                  <a href="px_kc_list.php?pid=<?=$row1["ps_id"]?>"><?=$row1["ps_title"]?></a><?php }}?></td>
                  </tr>
                </table>
              </dd>
            </dl>
          </div>
          <div class="main_box03_left_list" id="fk01">
            <div class="main_box03_left_list_pic">
              <div class="main_box03_left_list_pic00">
               <?php
			$res = $dblink->findAll('ennews','','nclass=63','','1');
	     foreach($res as $row){?>
                <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
                  <tr>
                    <td align="center" valign="middle"><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><img src="../admin_root/<?=$row["npic"]?>" border="0" align="top" onLoad="javascript:if(this.height>=146){this.width=146};"/></a></td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="main_box03_left_list_text">
              <div class="main_box03_left_list_text_01">
                <dl>
                  <dt id="text01"><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><?=$row["ntitle"]?></a></dt>
                  <dd><?php if (strlen($row["ncon"])>400){echo strip_tags($Common->strCut($row["ncon"],400,'...'));}else{echo strip_tags($row["ncon"]);}?><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>">[详情]</a></dd>
                </dl>
			  <?php }?>
              </div>
              <div class="main_box03_left_list_text_02">
                <ul>
          <?php
			$res = $dblink->findAll('ennews','','nclass=63','','1,10');
			foreach($res as $row){?>
	<li><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><?php if (strlen($row["ntitle"])>35){echo $Common->strCut($row["ntitle"],35,'...');}else{echo $row["ntitle"];}?></a></li>
          <?php }?>       
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="main_box03_left_box">
          <div class="main_box03_left_title">
            <dl>
              <dt><img src="images/px_t02.jpg" /></dt>
              <dd>
                <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
                  <tr>
                    <td align="right" valign="middle"><?php	  
		$res = $dblink->findAll('pxsclass','','pb_id=2');
		 $k=0;
		 foreach($res as $row1){
			$k=$k+1;
			if ($k!=count($res)){
                   ?>
                  <a href="px_kc_list.php?pid=<?=$row1["ps_id"]?>"><?=$row1["ps_title"]?></a> |  <?php }else{?>
                  <a href="px_kc_list.php?pid=<?=$row1["ps_id"]?>"><?=$row1["ps_title"]?></a><?php }}?></td>
                  </tr>
                </table>
              </dd>
            </dl>
          </div>
          <div class="main_box03_left_list" id="fk02">
            <div class="main_box03_left_list_pic">
              <div class="main_box03_left_list_pic00">
               <?php	  	  
			$row = $dblink->find('ennews','','nclass=64');
			if($row !=''){
	     ?>
                <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
                  <tr>
                    <td align="center" valign="middle"><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><img src="../admin_root/<?=$row["npic"]?>" border="0" align="top"  onLoad="javascript:if(this.height>=146){this.width=146};"/></a></td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="main_box03_left_list_text">
              <div class="main_box03_left_list_text_01">
                <dl>
                  <dt id="text01"><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><?=$row["ntitle"]?></a></dt>
                  <dd><?php if (strlen($row["ncon"])>400){echo strip_tags($Common->strCut($row["ncon"],400,'...'));}else{echo strip_tags($row["ncon"]);}?><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>">[详情]</a></dd>
                </dl>
			  <?php }?>
              </div>
              <div class="main_box03_left_list_text_02">
                <ul>
          <?php	  	  
			$res = $dblink->findAll('ennews','','nclass=64','','1,10');
          foreach($res as $row){?>
	<li><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><?php if (strlen($row["ntitle"])>35){echo $Common->strCut($row["ntitle"],35,'...');}else{echo $row["ntitle"];}?></a></li>
          <?php }?>       
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="main_box03_left_box">
          <div class="main_box03_left_title">
            <dl>
              <dt><img src="images/px_t03.jpg" /></dt>
              <dd>
                <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
                  <tr>
                    <td align="right" valign="middle"><?php	  
		$res = $dblink->findAll('pxsclass','','pb_id=4');	     
		 $k=0;
		foreach($res as $row1){
			$k=$k+1;
			if ($k!=count($res)){
                   ?>
                  <a href="px_kc_list.php?pid=<?=$row1["ps_id"]?>"><?=$row1["ps_title"]?></a> |  <?php }else{?>
                  <a href="px_kc_list.php?pid=<?=$row1["ps_id"]?>"><?=$row1["ps_title"]?></a><?php }}?></td>
                  </tr>
                </table>
              </dd>
            </dl>
          </div>
          <div class="main_box03_left_list" id="fk03">
            <div class="main_box03_left_list_pic">
              <div class="main_box03_left_list_pic00">
               <?php	  	  
		  $row = $dblink->find('ennews','','nclass=66');			
		  if($row != ''){?>
                <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
                  <tr>
                    <td align="center" valign="middle"><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><img src="../admin_root/<?=$row["npic"]?>" border="0" align="top"  onLoad="javascript:if(this.height>=146){this.width=146};"/></a></td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="main_box03_left_list_text">
              <div class="main_box03_left_list_text_01">
                <dl>
                  <dt id="text01"><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><?=$row["ntitle"]?></a></dt>
                  <dd><?php if (strlen($row["ncon"])>400){echo strip_tags($Common->strCut($row["ncon"],400,'...'));}else{echo strip_tags($row["ncon"]);}?><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>">[详情]</a></dd>
                </dl>
			  <?php }?>
              </div>
              <div class="main_box03_left_list_text_02">
                <ul>
          <?php
		  $res = $dblink->findAll('ennews','','nclass=66','','1,10');          
          foreach($res as $row){?>
	<li><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><?php if (strlen($row["ntitle"])>35){echo $Common->strCut($row["ntitle"],35,'...');}else{echo $row["ntitle"];}?></a></li>
	<li><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><?php if (strlen($row["ntitle"])>35){echo $Common->strCut($row["ntitle"],35)."..";}else{echo $row["ntitle"];}?></a></li>
          <?php }?>       
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="main_box03_left_box">
          <div class="main_box03_left_title">
            <dl>
              <dt><img src="images/px_t04.jpg" /></dt>
              <dd>
                <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
                  <tr>
                    <td align="right" valign="middle"><?php	  
	   $res = $dblink->findAll('pxsclass','','pb_id=6');
		 $k=0;
		foreach($res as $row1){
			$k=$k+1;
			if ($k!=count($res)){
                   ?>
                  <a href="px_kc_list.php?pid=<?=$row1["ps_id"]?>"><?=$row1["ps_title"]?></a> |  <?php }else{?>
                  <a href="px_kc_list.php?pid=<?=$row1["ps_id"]?>"><?=$row1["ps_title"]?></a><?php }}?></td>
                  </tr>
                </table>
              </dd>
            </dl>
          </div>
          <div class="main_box03_left_list" id="fk04">
            <div class="main_box03_left_list_pic">
              <div class="main_box03_left_list_pic00">
               <?php
	  	  $res = $dblink->findAll('ennews','','nclass=68','','1');
			foreach($res as $row){?>
                <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
                  <tr>
                    <td align="center" valign="middle"><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><img src="../admin_root/<?=$row["npic"]?>" border="0" align="top"  onLoad="javascript:if(this.width>=146){this.width=146};"/></a></td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="main_box03_left_list_text">
              <div class="main_box03_left_list_text_01">
                <dl>
                  <dt id="text01"><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><?=$row["ntitle"]?></a></dt>
                  <dd><?php if (strlen($row["ncon"])>400){echo strip_tags($Common->strCut($row["ncon"],400,'...'));}else{echo strip_tags($row["ncon"]);}?><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>">[详情]</a></dd>
                </dl>
			  <?php }?>
              </div>
              <div class="main_box03_left_list_text_02">
                <ul>
          <?php	  	  
			$res = $dblink->findAll('ennews','','nclass=68','','1,10');
			foreach($res as $row){?>
	<li><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><?php if (strlen($row["ntitle"])>35){echo $Common->strCut($row["ntitle"],35,'...');}else{echo $row["ntitle"];}?></a></li>
          <?php }?>       
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="main_box03_left_box">
          <div class="main_box03_left_title">
            <dl>
              <dt><img src="images/px_t05.jpg" /></dt>
              <dd>
                <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
                  <tr>
                    <td align="right" valign="middle"><?php
			$res = $dblink->findAll('pxsclass','','pb_id=7');	     
		 $k=0;
		foreach($res as $row1){
			$k=$k+1;
			if ($k!=count($res)){
                   ?>
                  <a href="px_kc_list.php?pid=<?=$row1["ps_id"]?>"><?=$row1["ps_title"]?></a> |  <?php }else{?>
                  <a href="px_kc_list.php?pid=<?=$row1["ps_id"]?>"><?=$row1["ps_title"]?></a><?php }}?></td>
                  </tr>
                </table>
              </dd>
            </dl>
          </div>
          <div class="main_box03_left_list" id="fk05">
            <div class="main_box03_left_list_pic">
              <div class="main_box03_left_list_pic00">
               <?php	  	  
			$res = $dblink->findAll('ennews','','nclass=69','','1');
	     foreach($res as $row){
			?>
                <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
                  <tr>
                    <td align="center" valign="middle"><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><img src="../admin_root/<?=$row["npic"]?>" border="0" align="top"  onLoad="javascript:if(this.width>=146){this.width=146};"/></a></td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="main_box03_left_list_text">
              <div class="main_box03_left_list_text_01">
                <dl>
                  <dt id="text01"><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><?=$row["ntitle"]?></a></dt>
                  <dd><?php if (strlen($row["ncon"])>400){echo strip_tags($Common->strCut($row["ncon"],400,'...'));}else{echo strip_tags($row["ncon"]);}?><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>">[详情]</a></dd>
                </dl>
			  <?php }?>
              </div>
              <div class="main_box03_left_list_text_02">
                <ul>
          <?php
			$res = $dblink->findAll('ennews','','nclass=69','','1,10');          
			foreach($res as $row){?>
	<li><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><?php if (strlen($row["ntitle"])>35){echo $Common->strCut($row["ntitle"],35,'...');}else{echo $row["ntitle"];}?></a></li>
          <?php }?>       
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="main_box03_left_box">
          <div class="main_box03_left_title">
            <dl>
              <dt><img src="images/px_t06.jpg" /></dt>
              <dd>
                <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
                  <tr>
                    <td align="right" valign="middle"><?php
			$res = $dblink->findAll('pxsclass','','pb_id=8');
		 $k=0;
		 foreach($res as $row1){
			$k=$k+1;
			if ($k!=count($res)){
                   ?>
                  <a href="px_kc_list.php?pid=<?=$row1["ps_id"]?>"><?=$row1["ps_title"]?></a> |  <?php }else{?>
                  <a href="px_kc_list.php?pid=<?=$row1["ps_id"]?>"><?=$row1["ps_title"]?></a><?php }}?></td>
                  </tr>
                </table>
              </dd>
            </dl>
          </div>
          <div class="main_box03_left_list" id="fk06">
            <div class="main_box03_left_list_pic">
              <div class="main_box03_left_list_pic00">
               <?php
			$res = $dblink->findAll('ennews','','nclass=70','','1');
	     foreach($res as $row){?>
                <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
                  <tr>
                    <td align="center" valign="middle"><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><img src="../admin_root/<?=$row["npic"]?>" border="0" align="top"  onLoad="javascript:if(this.width>=146){this.width=146};"/></a></td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="main_box03_left_list_text">
              <div class="main_box03_left_list_text_01">
                <dl>
                  <dt id="text01"><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><?=$row["ntitle"]?></a></dt>
                  <dd><?php if (strlen($row["ncon"])>400){echo strip_tags($Common->strCut($row["ncon"],400,'...'));}else{echo strip_tags($row["ncon"]);}?><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>">[详情]</a></dd>
                </dl>
			  <?php }?>
              </div>
              <div class="main_box03_left_list_text_02">
                <ul>
          <?php
			$res = $dblink->findAll('ennews','','nclass=70','','1,10');
          foreach($res as  $row){?>
	<li><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><?php if (strlen($row["ntitle"])>35){echo $Common->strCut($row["ntitle"],35,'...');}else{echo $row["ntitle"];}?></a></li>
          <?php }?>       
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="main_box03_left_box">
          <div class="main_box03_left_title">
            <dl>
              <dt><img src="images/px_t07.jpg" /></dt>
              <dd>
                <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
                  <tr>
                    <td align="right" valign="middle"><?php	     
		$res = $dblink->findAll('pxsclass','','pb_id=9');
		 $k=0;
		 foreach($res as $row1){
			$k=$k+1;
			if ($k!=count($res)){
                   ?>
                  <a href="px_kc_list.php?pid=<?=$row1["ps_id"]?>"><?=$row1["ps_title"]?></a> |  <?php }else{?>
                  <a href="px_kc_list.php?pid=<?=$row1["ps_id"]?>"><?=$row1["ps_title"]?></a><?php }}?></td>
                  </tr>
                </table>
              </dd>
            </dl>
          </div>
          <div class="main_box03_left_list" id="fk07">
            <div class="main_box03_left_list_pic">
              <div class="main_box03_left_list_pic00">
               <?php
			$res = $dblink->findAll('ennews','','nclass=71','','1');
			foreach($res as $row){
			?>
                <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
                  <tr>
                    <td align="center" valign="middle"><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><img src="../admin_root/<?=$row["npic"]?>" border="0" align="top"  onLoad="javascript:if(this.width>=146){this.width=146};"/></a></td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="main_box03_left_list_text">
              <div class="main_box03_left_list_text_01">
                <dl>
                  <dt id="text01"><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><?=$row["ntitle"]?></a></dt>
                  <dd><?php if (strlen($row["ncon"])>400){echo strip_tags($Common->strCut($row["ncon"],400,'...'));}else{echo strip_tags($row["ncon"]);}?><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>">[详情]</a></dd>
                </dl>
			  <?php }?>
              </div>
              <div class="main_box03_left_list_text_02">
                <ul>
          <?php	  	  
			$res = $dblink->findAll('ennews','','nclass=71','','1,10');
			foreach($res as $row)
          {?>
	<li><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><?php if (strlen($row["ntitle"])>35){echo $Common->strCut($row["ntitle"],35,'...');}else{echo $row["ntitle"];}?></a></li>
          <?php }?>       
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="main_box03_left_box">
          <div class="main_box03_left_title">
            <dl>
              <dt><img src="images/px_t08.jpg" /></dt>
              <dd>
                <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
                  <tr>
                    <td align="right" valign="middle"><?php
		$res = $dblink->findAll('pxsclass','','pb_id=10');
		 $k=0;
		 foreach($res as $row1){
			$k=$k+1;
			if ($k!=count($res)){
                   ?>
                      <a href="px_kc_list.php?pid=<?=$row1["ps_id"]?>"><?=$row1["ps_title"]?></a> |
                      <?php }else{?>
                      <a href="px_kc_list.php?pid=<?=$row1["ps_id"]?>"><?=$row1["ps_title"]?></a>
                    <?php }}?></td>
                  </tr>
                </table>
              </dd>
            </dl>
          </div>
          <div class="main_box03_left_list" id="fk08">
            <div class="main_box03_left_list_pic">
              <div class="main_box03_left_list_pic00">
               <?php
		  $res = $dblink->findAll('ennews','','nclass=72','','1');
	     foreach($res as $row){?>
                <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
                  <tr>
                    <td align="center" valign="middle"><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><img src="../admin_root/<?=$row["npic"]?>" border="0" align="top"  onLoad="javascript:if(this.width>=146){this.width=146};"/></a></td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="main_box03_left_list_text">
              <div class="main_box03_left_list_text_01">
                <dl>
                  <dt id="text01"><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><?=$row["ntitle"]?></a></dt>
                  <dd><?php if (strlen($row["ncon"])>400){echo strip_tags($Common->strCut($row["ncon"],400,'...'));}else{echo strip_tags($row["ncon"]);}?><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>">[详情]</a></dd>
                </dl>
			  <?php }?>
              </div>
              <div class="main_box03_left_list_text_02">
                <ul>
          <?php
			$res = $dblink->findAll('ennews','','nclass=72','','1,10');
			foreach($res as $row){?>
	<li><a href="px_news_list_details.php?id=<?=$row["nid"]?>" title="<?=$row["ntitle"]?>"><?php if (strlen($row["ntitle"])>35){echo $Common->strCut($row["ntitle"],35,'...');}else{echo $row["ntitle"];}?></a></li>
          <?php }?>       
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
     <div class="main_box03_right">
        <div class="main_box03_right_box01">
          <?=$web['z_onegg']?>
        </div>
        <div class="main_box03_right_box02">
          <div class="main_box03_right_box02_title">
            <dl><dt>培训学校推荐</dt></dl>
          </div>
          <div class="main_box03_right_box02_list">
            <div class="main_box03_right_box02_list_01_cjwt">
              <ul>
      <?php
	  $res = $dblink->findAll('pxschool','','','','','pxs_bool desc');	   
	 foreach($res as $row){
             ?>
                <li><span>·</span><a href="px_school/?pid=<?=$row["pxs_id"]?>"><?=$row["pxs_name"]?></a></li>
     <?php }?>
              </ul>
            </div>
          </div>
        </div>
        <div class="main_box03_right_box01">
          <?=$web['z_right1']?>
        </div>
        <div class="main_box03_right_box02">
          <div class="main_box03_right_box02_title">
            <dl>
              <dt>常见问题</dt>
              <dd><a href="px_news_list.php?cl=75">更多...</a></dd>
            </dl>
          </div>
          <div class="main_box03_right_box02_list">
            <div class="main_box03_right_box02_list_01_cjwt">
              <ul>
     <?php 
		$res = $dblink->findAll('ennews','','nclass=75','','10');
	  foreach($res as $row){
	 ?>
       <li><span>·</span><a href="px_news_list_details.php?id=<?=$row["nid"]?>"><?=$Common->strCut($row["ntitle"],30)?></a></li>
      <?php }?>
             </ul>
            </div>
          </div>
        </div>
        <div class="main_box03_right_box03">
          <div class="main_box03_right_box0300">
            <?=$web['z_right2']?>
          </div>
        </div>
        <div class="main_box03_right_box03">
          <div class="main_box03_right_box0300">
            <?=$web['z_right3']?>
          </div>
        </div>
        <div class="main_box03_right_box02">
          <div class="main_box03_right_box02_title">
            <dl>
              <dt>下载专区</dt>
              <dd><a href="px_down_list.php?c=px">更多...</a></dd>
            </dl>
          </div>
          <div class="main_box03_right_box02_list">
            <div class="main_box03_right_box02_list_01_cjwt">
              <ul>
               
                <?php
						$res = $dblink->findAll('xl_ask','','w_downcl="px"','','8');
						foreach($res as $row){
				?>
                    <li><span>*</span><a onclick="dsumXMLHttp(<?php echo $row["w_id"];?>)" href="admin_root/<?php echo $row["w_con"];?>"><?php echo $row["w_title"];?></a></li>
                    <?php }?>
              </ul>
            </div>
          </div>
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
        <div class="main_box03_right_box03_bottom">
          <div class="main_box03_right_box0300">
            <?=$web['z_right4']?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- main End -->
  <?php 
if (isset($_POST["user"])){
		$row = $dblink->find('vip','',"v_name='".$_POST["user"]."' and v_pass='".md5($_POST["pass"])."'",'','1');
			if ($row != ''){
			
				//setcookie("vipname",$_POST["user"],time()+3600,"/");
				//echo"<script>location.href='../vip_center.php';</script>";
				include '../config.inc.php';
				include '../uc_client/client.php';				
				$newpm = uc_user_login($_POST["user"],$_POST["pass"]);
				echo uc_user_synlogin($newpm['0']);
				echo "<script>location.href='../Vip/vip_index.php';</script>";
			 }else{
			 ?>
  <script language="javascript">
		document.getElementById("luser").innerHTML="<font color=red>&times;</font>";
		document.logform.user.focus();		
	    </script>
  <?php
			 }	
}
ob_end_flush();//输出缓冲内容
?>
  <!-- bottom -->
  <?php include("pxbottom.html");?>
  <!-- bottom End -->
</div>
</body>
</html>
