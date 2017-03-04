<?php 
include_once("../web_start.php");
$rowa=$dblink->find("yx_step",array(),"yx_id =7");
?>
<?php include('Research_head.php');?>

<?php
$criteria=new CDbCriteria;
foreach($_GET as $key=>$val){
	if($key=="yxk_school"&&$val&&$val!="选择学校")$criteria->addCondition(" yxk_school regexp '{$val}'");
	if($key=="class_title"&&$val&&$val!="选择专业")$criteria->addCondition(" class_title regexp '{$val}'");
	if($key=="yxk_title"&&$val&&$val!="选择课程")$criteria->addCondition(" yxk_id regexp '{$val}'");
	if($key=="skey"&&$val&&$val!="")$criteria->addCondition(" yxk_title regexp '{$val}'");
	// if($key=="u_user"&&$val&&$val!="输入用户名")$criteria->addCondition(" u_user regexp '{$val}'");
	// if($key=="u_gzzd"&&$val!="")$criteria->addCondition(" u_gzzd = {$val}");
	// if($key=="u_jzpx"&&$val!="")$criteria->addCondition(" u_jzpx = {$val}");
	// if($key=="u_strus"&&$val!="")$criteria->addCondition(" u_strus = {$val}");
}
// $criteria->select="";
// $criteria->order="";
// print_r($criteria);
$count=$dblink->count("yx_kaike",$criteria);
$page= isset($_GET['page'])?$_GET['page']:1;//默认页码
$getpageinfo = page($page,$count,$_SERVER['REQUEST_URI'],10);//调用函数，生成分页HTML 和 SQL LIMIT 子句
$criteria->limit=$getpageinfo['sqllimit'];
$criteria->order="yxk_id desc";
$newModel=$dblink->selectAll("yx_kaike",$criteria);
?>

<body>
<div class="wrapper">
  <!-- top -->
  <?php include('yx_top.html'); ?>
  <!-- top end -->
  <!-- main -->
  <div class="main">
    <div class="main_box002"><img src="images/yx_b01.jpg" width="950" height="4" /></div>
    <div class="main_ssou001" >
      <div class="ssou_left"><img src="images/jzseach.jpg" width="143" height="79" /></div>
				<form name="soform" method="get" action="yx_seach.php">  
					<div class="ssou_right">
						<ul>
						<li>
							<select name="yxk_school" >
								<option value="" selected="selected" onclick="">选择学校</option>
								<?php
								$row1=$dblink->findAll("yx_school",array());
								foreach($row1 as $v){
								?>
									<option value="<?=$v["school_id"]?>" <?php if($v["school_id"]==$_GET["yxk_school"]){echo"selected";}?>><?=$v["school_name"]?></option>
								<?php }?>
							</select>
						  </li>
						  <li>
						  <select name="class_title">
								<option value="" selected="selected">选择专业</option>
								<?php
								$row2=$dblink->findAll("yx_class",array());
								foreach($row2 as $v){
								?>
								<option value="<?=$v["class_id"]?>" <?php if($v["class_id"]==$_GET["class_title"]){echo"selected";}?>><?=$v["class_title"]?></option> 
								<?php }?>          
						  </select>
						  </li>
						  <li>
						  <select name="yxk_title">
								<option value="" selected="selected">选择课程</option>
								<?php
								$row3=$dblink->findAll("yx_kaike",array());
								foreach($row3 as $v){
								?>
									<option value="<?=$v["yxk_id"]?>" <?php if($v["yxk_id"]==$_GET["yxk_title"]){echo"selected";}?>><?=$v["yxk_title"];?></option> 
								<?php }?>
						  </select>
						  </li>
						  <li><input name="skey" type="text" value="<?=isset($_GET["skey"])&&$_GET["skey"]?$_GET["skey"]:""?>"/></li>
						  <li>
						  <img src="/Research/images/yx_sou.jpg" onclick="document.soform.submit();" style="cursor:pointer;"/>
						  </li>
						  </ul>
					  </div>
				</form>
      <div class="ssou_right_01"><span>关键字：</span><a href="yx_seach.php?skey=企业管理">企业管理</a>|<a href="yx_seach.php?skey=金融">金融</a>|<a href="yx_seach.php?skey=人力资源">人力资源</a>|<a href="yx_seach.php?skey=MBA">MBA</a>|<a href="yx_seach.php?skey=学位">学位</a>|<a href="yx_seach.php?skey=硕士学位">硕士学位</a>|<a href="yx_seach.php?skey=在职研究生">在职研究生</a>|<a href="yx_seach.php?skey=经济管理">经济管理</a></div>
    </div>
    <div class="main_box002"><img src="images/yx_b02.jpg" width="950" height="4" /></div>
    <!-- <div class="main2">
        <div>left</div><div>right</div>
     </div>-->
    <div class="main_xl_pro_box03">
      <div class="main_xl_pro_box03_left">
        <div class="main_xl_pro_box03_left_01">
          <ul>
            <li>您的位置：高校招生 >> 招生简章</li>
          </ul>
        </div>
        <div class="main_xl_pro_box03_left_03">
          <div class="main_xl_pro_box03_left_03_b01">
        <div class="main_xl_pro_box03_left_03_b03">
			<div class="main_xl_pro_box03_left_03_b01_left">
				<ul>
					<li>&nbsp;&nbsp;共有 <?=$getpageinfo['pagetotal']?> 条记录，当前第 <?=$getpageinfo['curpage']?> 页</li>
				</ul>
            </div>
			<div class="main_xl_pro_box03_left_03_b01_right">
				<ul>
					<li><?=$getpageinfo['pagecode1']?></li>
				</ul>
            </div>	
          </div>
          </div>
          <div class="main_xl_pro_box03_left_03_b02">
<?php
	//开始循环 
	 if(count($newModel)<1){echo "<center>对不起，没有找到相关信息。</center>";}
	foreach($newModel as $v){
	       $re1=$dblink->find("yx_school",array(),"school_id ={$v["yxk_school"]}");
?>
            <div class="main_xl_pro_box03_left_03_b02_list" onmouseover="this.style.background='#f9f9f9'" onmouseout="this.style.background='#fff'" >
              <table width="724" height="133" border="0" cellspacing="0" cellpadding="0">
                <tr height="35">
                  <td colspan="4">
                  <strong>
                  <a href="yxschool.php?id=<?=$v["yxk_id"]?>" title="<?=$v["yxk_title"]?>"><?=$re1["school_name"];?></a> －－ <span>
                  <a href="yxschool.php?id=<?=$v["yxk_id"]?>" title="<?=$v["yxk_title"]?>"><?=$Common->strCutAndTags($v["yxk_title"],40,'..')?></a>
                  </span></strong></td>
                </tr>
                <tr height="50">
                  <td width="16%" height="60" align="center" valign="top"><strong>课程简介:</strong></td>
                  <td colspan="3" valign="top"><?=$Common->strCutAndTags($v["yxk_con"],200,'..');?></td>
                </tr>
                <tr height="30">
                  <td height="27" align="center" valign="top"><strong>收费标准:</strong></td>   
                  <td width="48%" valign="top"><?=$v["yxk_xfei"]?>/<?=$v["yxk_xshi"];?></td>
                  <td width="19%" align="center" valign="top"><a href="yxschool_kcjs.php?id=<?=$v["yxk_id"]?>&con=kcsz" title="<?=$v["yxk_title"]?>">查看课程设置>></a></td>
                  <td width="17%" align="center" valign="top"><a href="yxschool_zxwd.php?id=<?=$v["yxk_id"]?>">在线咨询>></a></td>
                </tr>
              </table>
            </div>
            <?php }?>
          </div>
          <div class="main_xl_pro_box03_left_03_b03">
			<div class="main_xl_pro_box03_left_03_b01_left">
				<ul>
					<li>&nbsp;&nbsp;共有 <?=$getpageinfo['pagetotal']?> 条记录，当前第 <?=$getpageinfo['curpage']?> 页</li>
				</ul>
            </div>
			<div class="main_xl_pro_box03_left_03_b01_right">
				<ul>
					<li><?=$getpageinfo['pagecode1']?></li>
				</ul>
            </div>	
          </div>
      </div>
      </div>
      <div class="main_xl_pro_box03_right">
        <div class="main_xl_pro_box03_right_box00">
          <div class="main_box01_right_01_pr">
            <ul>			
                <li><a href=tencent://message/?uin=895570266&Site=双威教育&Menu=yes><img border="0" src=http://wpa.qq.com/pa?p=1:895570266:1 alt="在线咨询1" /></a></li>
                <li><a href=tencent://message/?uin=94498302&Site=双威教育&Menu=yes><img border="0" src=http://wpa.qq.com/pa?p=1:94498302:1 alt="在线咨询2" /></a></li>
			</ul>
          </div> 
        </div>
        <div class="main_xl_pro_box03_right_box01">
          <div class="main_xl_pro_box03_right_box01_title">MBA热点推荐</div>
          <div class="main_xl_pro_box03_right_box01_list">
				<ul>
				<?php
				$row=$dblink->findAll("yx_kaike",array(),"yxk_cl='MBA/EMBA'",'','0,5','yxk_id desc');
				foreach($row as $v){
				?>
				<li><a href="yxschool.php?id=<?=$v["yxk_id"]?>" title="<?=$v["yxk_title"]?>"><?=$Common->strCutAndTags($v["yxk_title"],40,'..')?></a></li>
				<?php }?>
				</ul>
          </div>
        </div>
        <div class="main_xl_pro_box03_right_box01">
          <div class="main_xl_pro_box03_right_box01_title"><strong>在职研究生热点推荐</strong></div>
          <div class="main_xl_pro_box03_right_box01_list">
            <ul>
				<?php
				$row=$dblink->findAll("yx_kaike",array(),"yxk_cl='在职研究生'",'','0,5','yxk_id desc');	
				foreach($row as $v){
				?>
				<li><a href="yxschool.php?id=<?=$v["yxk_id"]?>" title="<?=$v["yxk_title"]?>"><?=$Common->strCutAndTags($v["yxk_title"],40,'..')?></a></li>
				<?php }?>
            </ul>
          </div>
        </div>
        <div class="main_xl_pro_box03_right_box01">
          <div class="main_xl_pro_box03_right_box01_title">工程硕士热点推荐</div>
          <div class="main_xl_pro_box03_right_box01_list">
			<ul>
				<?php
					$row=$dblink->findAll("yx_kaike",array(),"yxk_cl='工程硕士'",'','0,5','yxk_id desc');
					foreach($row as $v){
				?>
					<li><a href="yxschool.php?id=<?=$v["yxk_id"]?>" title="<?=$v["yxk_title"]?>"><?=$Common->strCutAndTags($v["yxk_title"],40,'..')?></a></li>
				<?php }?>
            </ul>
          </div>
        </div>
      </div> 
    </div>
  </div>
<!-- main end -->
<!-- bottom -->
<?php include('yx_bottom.html'); ?>
<!-- bottom end -->
</div>
</body>
</html>