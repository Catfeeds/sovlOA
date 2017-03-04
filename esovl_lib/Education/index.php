<?php 
include_once("../web_start.php");
$webid=1;
include_once("Education_header.php");
?>
<script>regEvent(window,'onload',function() {SwitchPanel('p','on','off',4,false,2000)});</script>
<script>regEvent(window,'onload',function() {SwitchPanel('pp','on','off',4,false,3000)});</script>
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
        <?php	$rs=$dblink->findAll("xl_s_h");		?>
			<div class="right_box01">
				<div class="main_xl_pro_box01_left_pic">
					<?php
					$i=0;
					foreach($rs as $row){
						$i=$i+1;?>
						<div id="pp<?php echo $i;?>" class=""><a href="<?php echo $row["s_h_http"];?>"><img src="/admin_root/<?php echo $row["s_h_pic"];?>"/></a></div>
					<?php }?>
				</div>
				<div class="main_xl_pro_box01_left_text">
					<ul><?php
						$j=0;
						foreach($rs as $row){
						$j=$j+1;?>
						<li id="pp<?php echo $j;?>" <?php echo "class='normaltab'";?>>·<a href="<?php echo $row["s_h_http"];?>"><?php echo $row["s_h_title"];?></a></li>
						<?php }?>
					</ul>
				</div>
			</div>
        </div>
        <div class="main_xl_pro_box01_right">
          <ul>
            <?php 
				$rs=$dblink->findAll("luqu",array(),"","","5","lq_date desc");
				foreach($rs as $row){
					$row1=$dblink->find("school",array(),"s_id='{$row["s_id"]}'");
				   $row2=$dblink->find("kkinfo",array(),"s_id='{$row["s_id"]}'");?>
					<li>·<a href="/Education/xl_pro_detail.php?kid=<?php echo $row2["kid"];?>&sid=<?php echo $row["s_id"];?>"><?php echo $row1["s_name"];?></a></li>
					<?php }?>
				  </ul>
        </div>
      </div>
      <div class="main_xl_pro_box02">
        <div class="main_xl_pro_box02_title">
          <dl>
            <dt><a href="/Education/">学历教育</a></dt>
            <dd><a href="/Education/zxks/">自学考试</a></dd>
            <dd><a href="/Education/wlys/">网络院校</a></dd>
            <dd><a href="/Education/crgk/">成人高考</a></dd>
            <dd><a href="/Education/gjbx/">国际办学</a></dd>
            <dd><a href="/Education/xl_gxjz.php">高校简章</a></dd>
            <dd><a href="/Education/xl_pro_search.php">简章搜索</a></dd>
            <dd><a href="/Education/gfb/">高复班</a></dd>
          </dl>
        </div>
        <div class="main_xl_pro_box02_list">
          <div class="main_xl_pro_box02_list00">
            <?php 
if(isset($_POST["xl_skey"])){	
	$skey=@$_POST["xl_skey"];
	echo "<script>location.href='/Education/xl_pro_search.php?skey=".$skey."';</script>";	
}
				?>
            <form name="xl_sform" id="xl_sform" method="post" onsubmit="return xl_sou();" action="">
              <ul>
                <li>            
                  填写搜索关键词：
                </li>
                <li>
                  <input name="xl_skey" type="text" style="width:220px;" />
                </li>
                <li>
<input  type="image" src="<?=$z_website?>images/ss_pro.jpg" style="cursor:pointer; width:60px; height:24px;"/>
                </li>
              </ul>
            </form>
            <div class="pro_search_key"> <span>搜索关键词：</span>
            <a href="/Education/xl_pro_search.php?skey=<?=urlencode("高起专")?>">高起专</a>
            <a href="/Education/xl_pro_search.php?skey=<?=urlencode("高起本")?>">高起本</a>
            <a href="/Education/xl_pro_search.php?skey=<?=urlencode("成人高复")?>">成人高复</a>
            <a href="/Education/xl_pro_search.php?skey=<?=urlencode("自学考试")?>">自学考试</a>
            <a href="/Education/xl_pro_search.php?skey=<?=urlencode("专升本")?>">专升本</a>
            <a href="/Education/xl_pro_search.php?skey=<?=urlencode("财务管理")?>">财务管理</a>
            <a href="/Education/xl_pro_search.php?skey=<?=urlencode("培训")?>">培训</a>
            </div>
          </div>
        </div>
       
      </div>
      <div class="main_xllb">
        <div class="main_xllb_box01">
          <div class="main_xllb_box01_left00">
            <div class="main_xllb_box01_left">
              <div class="main_xllb_box01_left_list01">
                <?php
				$rs=$dblink->findAll("xl_s_f",array(),'',"","3");
				foreach($rs as $i=>$row){?>
                <div style="display: none" id='p<?php echo $i;?>'>
					<a href="<?php echo $row["s_h_http"];?>" target=_blank>
						<img border='0' alt=<?php echo $row["s_h_title"];?> src="/admin_root/<?php echo $row["s_h_pic"];?>" width='315' height='186' />
						<span style=" margin-top:5px;margin-left:100px;display:block;"><?php echo $row["s_h_title"];?></span>
					</a>
					</div>
                <?php }	?>
              </div>
              <div class="main_xllb_box01_left_list02">
                <div class="main_xllb_box01_left_list02_box1">
                  <div class="main_xllb_box01_left_list02_box1_title">
                    <div class="main_xllb_box01_left_list02_box1_title_zi">
                      <dl>
                        <dt><img src="/images/xl_title_left.png" /></dt>
                        <dd>名校推荐</dd>
                        <dt><img src="/images/xl_title_right.png" /></dt>
                      </dl>
                    </div>
                  </div>
                  <div class="main_xllb_box01_left_list02_box1_text">
                    <ul>
                    <?php 
						$rs=$dblink->findAll("mb_step",array(),'mb_tj=1',"","12");
						foreach($rs as $row){?>
							<li>·<a href="/school/?sid=<?php echo $row["mb_id"]?>" target="_blank"><?php echo $row["s_name"]?></a></li>
					<?php }	?>
                    </ul>
                  </div>
                </div>
                <div class="main_xllb_box01_left_list02_box2">
                  <div class="main_xllb_box01_left_list02_box1_title">
                    <div class="main_xllb_box01_left_list02_box1_title_zi">
                      <dl>
                        <dt><img src="/images/xl_title_left.png" /></dt>
                        <dd>最新录取</dd>
                        <dt><img src="/images/xl_title_right.png" /></dt>
                      </dl>
                    </div>
                  </div>
                  <div class="main_xllb_box01_left_list02_box2_text">
                    <div class="main_xllb_box01_left_list02_box2_text01">
                      <dl>
                        <dt>学校名称</dt>
                        <dt>学员姓名</dt>
                        <dd>录取时间</dd>
                      </dl>
                    </div>
                    <div class="main_xllb_box01_left_list02_box2_text02" id="Marquee" style="height:299px;">
                      <?php 
		$rs=$dblink->findAll("luqu",array(),'classid=1',"left join school on luqu.s_id=school.s_id left join kkinfo on luqu.s_id=kkinfo.s_id ","20","lq_date desc");
						foreach($rs as $row){
	  ?>
                      <dl>
                        <dt><a href="/Education/xl_pro_detail.php?kid=<?php echo $row["kid"];?>&sid=<?php echo $row["s_id"];?>"><?php echo $row["s_name"];?></a></dt>
                        <dt><?php echo $row["lq_name"];?></dt>
                        <dd><?php echo $row["lq_date"];?></dd>
                      </dl>
                      <?php }?>
                    </div>
                    <script src="/js/xlgund.js"></script>
                  </div>
                </div>
              </div>
            </div>
            <div class="main_xllb_box01_center">
              <div class="main_xllb_box01_center_list01">
                <div class="main_xllb_box01_center_list01_box1">
                  <?php
						$rowa=$dblink->find("enclass",array(),"n_id=8");
						$rs=$dblink->findAll("ennews",array(),"nclass='{$rowa["n_id"]}'","","1","ndate desc");
						foreach($rs as $row){?>
                  <dl>
                    <dt><a href="/Education/xl_news_detail.php?id=<?php echo $row["nid"];?>"><?php echo $row["ntitle"];?></a></dt>
                    <dd>
                 <?php echo $Common->strCut($row["ncon"],110);?>
                      <a href="/Education/xl_news_detail.php?id=<?php echo $row["nid"];?>">[详细]</a></dd>
                  </dl>
                  <?php }?>
                </div>
                <div class="main_xllb_box01_center_list01_box2"><a href="<?php echo $web['z_gglink'];?>" target="_blank"><img src="/admin_root/<?php echo $web['z_onegg'];?>" /></a></div>
              </div>
              <div class="main_xllb_box01_center_list02">
                <div class="main_xllb_box01_center_list02_box1">
                  <div class="main_xllb_box01_center_list02_box1_title">
                    <ul>
                      <li id="xl_tb_1" class="xl_hovertab" onmouseover="xlHoverLi(1);">自学考试</li>
                      <li id="xl_tb_2" class="xl_normaltab" onmouseover="xlHoverLi(2);">网络学院</li>
                      <li id="xl_tb_3" class="xl_normaltab" onmouseover="xlHoverLi(3);">成人高考</li>
                      <li id="xl_tb_4" class="xl_normaltab" onmouseover="xlHoverLi(4);">高复班</li>
                    </ul>
                  </div>
                </div>
                <div class="main_xllb_box01_center_list02_box2">
                  <div class="main_xllb_box01_center_list02_box2_list">
                    <div class="xl_dis" id="xl_tbc_01">
                      <div class="main_xl_hd_box01">
                        <?php 
						$rs1=$dblink->findAll("kkinfo",array(),"bk_id=1","left join school on kkinfo.s_id=school.s_id","","kkdate desc");
					
					foreach ($rs1 as $i=>$row1 ){
						if($i>0)break;
					?>
        <div class="main_xl_hd_box01_pic" onmouseover="this.style.border='1px solid #fd5717'" onmouseout="this.style.border='1px solid #cccacd'" >
                          <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
                            <tr>
                              <td align="center" valign="middle"><a href="/Education/xl_pro_detail.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>"><img src="/admin_root/<?=$row1["k_pic"]?>" /></a></td>
                            </tr>
                          </table>
                        </div>
                        <div class="main_xl_hd_box01_list">
                          <div class="main_xl_hd_box01_list_box1">
                            <dl>
                              <dt><a href="/Education/xl_pro_detail.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>">
                                <?=$row1["s_name"]?>
                                </a>-<a href="/Education/xl_pro_zyjs.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>">
                                  <?=$row1["ktitle"]?>
                                </a></dt>
                              <dd><a href="/Education/xl_pro_detail.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>">
                                <?=$Common->strCut($row1["zycon"],84)?>
                                ..</a></dd>
                            </dl>
                          </div>
                          <?php }
						  
							foreach ($rs1 as $i=>$row1 ){
								if($i<1)continue;
								if($i>1)break;
					?>
                          <div class="main_xl_hd_box01_list_box2"> [<a href="/Education/xl_pro_zyjs.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>">
                            <?=$row1["ktitle"]?>
                            </a>]
                            <?=$Common->strCut($row1["zycon"],80)?>
                          </div>
                          <?php }?>
                        </div>
                      </div>
                      <div class="main_xl_hd_box02">
                        <div class="main_xl_hd_box02_list01">
                          <dl>
                            <dt>学校名称</dt>
                            <dd>专业</dd>
                            <dd>学费</dd>
                            <dd>开学日期</dd>
                          </dl>
                        </div>
                        <div class="main_xl_hd_box02_list02">
                          <?php 
							foreach ($rs1 as $i=>$row1 ){
								if($i<2)continue;
								if($i>8)break;
					?>
                          <dl onmouseover="this.style.background='#fbebdf'" onmouseout="this.style.background='#fff'">
                            <dt>[<a href="/Education/xl_pro_detail.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>">
                              <?=$row1["s_name"]?>
                            </a>]</dt>
                            <dd><a href="/Education/xl_pro_zyjs.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>">
                              <?=$row1["zyname"]?>
                            </a></dd>
                            <dd>
                              <?=$row1["xfei"]?>
                              元/年</dd>
                            <dd>
                              <?=$row1["kdate"]?>
                            </dd>
                          </dl>
                          <?php }?>
                        </div>
                      </div>
                      <div class="main_xl_hd_box03"><a href="#"><img src="/images/xl_hd_pic02.jpg" /></a></div>
                    </div>
                    <div class="xl_undis" id="xl_tbc_02">
                      <div class="xl_wl-jz">
                        <?php
	$rs=$dblink->findAll("kkinfo",array(),"bk_id=3","left join school on kkinfo.s_id=school.s_id","3","kid desc");
	foreach($rs as $row){		
	?>
                        <div class="wl-zj-tp"><a href="/Education/xl_pro_zyjs.php?kid=<?=$row['kid']?>&sid=<?=$row['s_id']?>"><img src="/admin_root/<?php echo $row['s_logo']?>" width="110" height="100"/></a><br />
                          <a href="/Education/xl_pro_zyjs.php?kid=<?=$row['kid']?>&sid=<?=$row['s_id']?>"><?php echo $row['s_name']?></a></div>
                        <?php }?>
                        <div class="zj-xx"></div>
                        <div class="wl-zj-xx">
                          <ul>
                            <?php
						$rs=$dblink->findAll("kkinfo",array(),"","","","s_id desc");
						foreach($rs as $i=>$row){
							if($i>7)break;
							echo "<li><a href='/Education/xl_pro_zyjs.php?kid=".$row['kid']."&sid=".$row['s_id']."'>".$row['ktitle']."</a></li>";
						}?>
                          </ul>
                        </div>
                      </div>
                      <!--   wd   -->
                      <div class="wl-jz" style="border:none;">
                        <div class="xl_wz">学员问答</div>
                        <?php 
						$rs=$dblink->findAll("wdonline",array(),"wdonline.wd_bool=1 and kkinfo.bk_id=3","join (school,kkinfo) on (wdonline.s_name=school.s_name and school.s_id=kkinfo.s_id)","2","wd_stime desc");
						foreach($rs as $row){
						?>
                        <div class="wl-hd">
                          <dl>
            <dd><span>[问]</span><a href="/Education/xl_pro_zxtw.php?kid=<?=$row["kid"]?>&sid=<?=$row["s_id"]?>" target="_blank" title="<?=$row["wd_ask"]?>">
                              <?=$Common->strCut($row["wd_ask"],49)?>
                            </a></dd>
                            <dt style="color:#333;"><?php echo date('Y-m-d',strtotime($row["wd_stime"]))?></dt>
                            <dd><span>[答]</span>
                              <?=$row["wd_answer"];?>
                            </dd>
                            <dt><?php echo date('Y-m-d',strtotime($row["wd_ltime"]))?></dt>
                          </dl>
                        </div>
                        <div class="zj-xx"></div>
                        <?php }?>
                      </div>
                    </div>
                    <div class="xl_undis" id="xl_tbc_03">
                      <div class="xl_main_crgk_box02_center_list">
                        <div class="main_crgk_box02_center_list00">
                          <div class="main_crgk_box02_center_list00_01">
                            <dl>
                              <dt>热点</dt>
                              <dd>
                            <?php
								$rs=$dblink->findAll("ennews",array(),"nclass in(45,46) and nbool=1","","2","nclick desc");
								foreach ($rs as $row){?>
                                <a href="/Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>">
                                  <?=$Common->strCut(trim($row["ntitle"]),36)?>
                                </a>&nbsp;
                                <? }?>
                              </dd>
                            </dl>
                          </div>
                          <div class="main_crgk_box02_center_list00_02">
                            <ul>
                              <li> <span>[<a href="/Education/crgk/crgk_zx.php?nclass=45">查分</a>]</span>
                            <?php
							$rs=$dblink->findAll("ennews",array(),"nclass=45 and nbool=1","","11","nclick desc");
							foreach ($rs as $row){?>
                                <a href="/Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>">
                                  <?=$Common->strCut($row["ntitle"],12)?>
                                </a>
                                <? }?>
                              </li>
                              <li> <span>[<a href="/Education/crgk/crgk_zx.php?nclass=46">成绩</a>]</span>
                                <?php
								$rs=$dblink->findAll("ennews",array(),"nclass=46 and nbool=1","","10","nclick desc");
								foreach ($rs as $row){?>
                                <a href="/Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>">
                                  <?=$Common->strCut($row["ntitle"],12)?>
                                </a>
                                <? }?>
                                <a href="/Education/crgk/crgk_zx.php?nclass=46">更多</a> </li>
                            </ul>
                          </div>
                        </div>
                        <div class="main_crgk_box02_center_list00">
                          <div class="main_crgk_box02_center_list00_01">
                            <dl>
                              <dt>动态</dt>
                              <dd>
                                <?php
								$rs=$dblink->findAll("ennews",array(),"nclass in(47,48) and nbool=1","","2","nclick desc");
								foreach ($rs as $row){?>
                                <a href="/Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>">
                                  <?=$Common->strCut($row["ntitle"],36)?>
                                </a>
                                <? }?>
                              </dd>
                            </dl>
                          </div>
                          <div class="main_crgk_box02_center_list00_02">
                            <ul>
                              <li> <span>[<a href="/Education/crgk/crgk_zx.php?nclass=47">分数线</a>]</span>
                                <?php
								$rs=$dblink->findAll("ennews",array(),"nclass=47 and nbool=1","","10","nclick desc");
								foreach ($rs as $row){?>
                                <a href="/Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>">
                                  <?=$Common->strCut($row["ntitle"],12)?>
                                </a>
                                <? }?>
                              </li>
                              <li> <span>[<a href="/Education/crgk/crgk_zx.php?nclass=48">院校</a>]</span>
                                <?php
								$rs=$dblink->findAll("ennews",array(),"nclass=48 and nbool=1","","2","nclick desc");
								foreach ($rs as $row){?>
                                <a href="/Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>">
									<?=$Common->strCut($row["ntitle"],36)?>
                                </a>
                                <? }?>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="main_crgk_box02_center_list00">
                          <div class="main_crgk_box02_center_list00_01">
                            <dl>
                              <dt>试题</dt>
                              <dd>
							<?php
								$rs=$dblink->findAll("ennews",array(),"nclass in(49,50) and nbool=1","","2","nclick desc");
								foreach ($rs as $row){?>
                                <a href="/Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>">
                                  <?=$Common->strCut($row["ntitle"],36)?>
                                </a>
                                <? }?>
                              </dd>
                            </dl>
                          </div>
                          <div class="main_crgk_box02_center_list00_02">
                            <ul>
                              <li> <span>[<a href="/Education/crgk/crgk_zx.php?nclass=49">真题</a>]</span>
                                <?php
								$rs=$dblink->findAll("ennews",array(),"nclass=49 and nbool=1","","2","nclick desc");
								foreach ($rs as $row){?>
                                <a href="/Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>">
									<?=$Common->strCut($row["ntitle"],36)?>
                                </a>
                                <? }?>
                              </li>
                              <li> <span>[<a href="/Education/crgk/crgk_zx.php?nclass=50">习题</a>]</span>
								<?php
								$rs=$dblink->findAll("ennews",array(),"nclass=50 and nbool=1","","2","nclick desc");
								foreach ($rs as $row){?>
                                <a href="/Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>">
                                  <?=$Common->strCut($row["ntitle"],36)?>
                                </a>
                                <? }?>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="main_crgk_box02_center_list00">
                          <div class="main_crgk_box02_center_list00_01">
                            <dl>
                              <dt>网校</dt>
                              <dd>
								<?php
								$rs=$dblink->findAll("ennews",array(),"nclass in(51,52) and nbool=1","","2","nclick desc");
								foreach ($rs as $row){?>
                                <a href="/Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>">
                                  <?=$Common->strCut($row["ntitle"],24)?>
                                </a>
                                <? }?>
                              </dd>
                            </dl>
                          </div>
                          <div class="main_crgk_box02_center_list00_02">
                            <ul>
                              <li> <span>[<a href="/Education/crgk/crgk_zx.php?nclass=51">课程</a>]</span>
								<?php
								$rs=$dblink->findAll("ennews",array(),"nclass=51 and nbool=1","","2","nclick desc");
								foreach ($rs as $row){?>
                                <a href="/Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>">
                                  <?=$Common->strCut($row["ntitle"],36)?>
                                </a>
                                <? }?>
                              </li>
                              <li> <span>[<a href="/Education/crgk/crgk_zx.php?nclass=52">优惠</a>]</span>
                               <?php
								$rs=$dblink->findAll("ennews",array(),"nclass=52 and nbool=1","","2","nclick desc");
								foreach ($rs as $row){?>
                                <a href="/Education/crgk/crgk_zx_detail.php?id=<?=$row["nid"]?>">
                                  <?=$Common->strCut($row["ntitle"],36)?>
                                </a>
                                <? }?>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <?php 
						$rowq=$dblink->find("web_step",array()," z_id=4");?>
                      <div class="xl_crgk_pic"><a href="<?=$rowq["z_gglink"]?>"><img src="/admin_root/<?=$rowq["z_onegg"]?>" onload="if(this.width>415){this.width=415}"/></a></div>
                    </div>
                    <div class="xl_undis" id="xl_tbc_04">
                      <div class="xl_gfb_hd">
                        <?php
						$row=$dblink->find("ennews",array(),"nclass=40","","","nclick desc");?>
                        <div class="gf_ff_bt"><a href="/Education/gfb/gf_zx_neiye.php?id=<?php echo $row["nid"];?>" title="<?php echo $row["ntitle"];?>"><?php echo $Common->strCut($row["ntitle"],38)?></a></div>
                        <div class="gf_nr">
                          <?=$Common->strCut(strip_tags($row["ncon"]),124)?><span><a href="/Education/gfb/gf_zx_neiye.php?id=<?php echo $row["nid"];?>" title="<?php echo $row["ntitle"];?>">[详细]</a></span></div>
                        <div class="gf_ff_rz">
                          <ul>
                            <?php
							$rs=$dblink->findAll("ennews",array(),"nclass=40 ","","1,5","nclick desc");
								foreach ($rs as $row){?>
                            <li><span>·<a href="/Education/gfb/gf_zx_neiye.php?id=<?php echo $row["nid"];?>" title="<?php echo $row["ntitle"];?>"><?php echo $Common->strCut($row["ntitle"],70)?></a></span>
                              <?=date('Y-m-d',strtotime($row["ndate"]))?>
                            </li>
                            <?php }?>
                          </ul>
                        </div>
                      </div>
                      <div class="zx_qr_01_12" style="width:617px;">
                        <!--三校生高复-->
                        <div class="zx_qr_02_left_list">
                          <div class="zx_qr_02_left_list_01_003">
                            <dl>
                              <dt>班级名称</dt>
                              <dd>学费</dd>
                              <dd style="width:80px;">报名</dd>
                            </dl>
                          </div>
                          <?php 
						$rs1=$dblink->findAll("kkinfo",array(),"zyclass regexp '高复'","","6","kkdate desc");
						foreach ($rs1 as $k=>$row1){
					   // $rs_1=mysql_query("select s_name from school where s_id=".$row1["s_id"],$conn); 
		               // $rw1=mysql_fetch_assoc($rs_1);
					?>
                          <div class="zx_qr_02_left_list_02_004" id="Marquee">
                            <dl>
                              <dt><span>[<a href="/Education/gfb/gfb_index.php?kid=<?=$row1["kid"]?>&sid=<?=$row1["s_id"]?>">
                                <?=$row1["zyname"]?>
                                </a>]<a href="/Education/gfb/gf_bm_lb_xiangxi.php?gid=<?=$row1["kid"]?>" title="<?=$row1["ktitle"]?>">
                                  <?=$row1["ktitle"]?>
                                </a></span></dt>
                              <dd><span>￥<?=$row1["yhui"]?></span></dd>
                              <dd><span><a href="/Education/gfb/gf_zx_wsbm.php?gid=<?=$row1["kid"]?>">报名</a></span></dd>
                            </dl>
                          </div>
                          <?php }?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <script type="text/javascript">xlHoverLi(1);</script>
              </div>
            </div>
            <div class="main_xl_box02">
				<?php 
				$arr=array(
					"1",
					"5",
					"6",
					"7"
				);
				foreach($arr as $key=>$val){
				?>
              <div class="main_xl_box02_list" <?=$key=="2"?'style="margin-right:0;"':''?>>
                <div class="main_xl_box02_list_title" >
                  <?php
						$rowa=$dblink->find("enclass",array(),"n_id={$val}");
						?>
                  <span><?php echo $rowa["n_class"];?></span> <a href="/Education/xl_newscl.php?cl=<?php echo $rowa["n_id"];?>">+MORE</a> </div>
                <div class="main_xl_box02_list_text">
                  <div class="main_xl_box02_list_text_box1">
                    <dl>
                      <dt>
                        <div class="main_xl_box02_list_text_box1_pic"><img src="/images/xl_box2_01.jpg" /></div>
                      </dt>
                      <?php
							$row=$dblink->find("ennews",array(),"nclass='{$rowa["n_id"]}'");
						?>
                      <dd><a title="<?=strip_tags($row["ncon"])?>" href="/Education/xl_news_detail.php?id=<?php echo $row["nid"];?>">
                        <?php	echo $Common->strCut(strip_tags($row["ncon"]),84);?>
                      </a></dd>
                    </dl>
                  </div>
                  <div class="main_xl_box02_list_text_box2">
                    <?php
						$rs=$dblink->findAll("ennews",array(),"nclass='{$rowa["n_id"]}'","","1,4");
							foreach ($rs as $row){
						?>
                    <dl>
                      <dt><img src="/images/dot_h.jpg" width="4" height="7" /></dt>
                      <dd><a  title="<?=$row["ntitle"]?>" href="/Education/xl_news_detail.php?id=<?php echo $row["nid"];?>"><?php echo trim($row["ntitle"]);?></a></dd>
                    </dl>
                    <?php }	?>
                  </div>
                </div>
              </div>
			  <?}?>
			  
              <div class="main_xl_box02_list">
                <div class="main_xl_box02_list_title"> <span>论坛热帖</span> <a href="#">+MORE</a> </div>
                <div class="main_xl_box02_list_text">
                  <div class="main_xl_box02_list_text_box1">
                    <dl>
                      <dt>
                        <div class="main_xl_box02_list_text_box1_pic"><img src="/images/xl_box2_01.jpg" /></div>
                      </dt>
                      <dd>什么时间可以参加考试、一年又可以参加几次考试、如何进行补考、考试要求还有哪些...</dd>
                    </dl>
                  </div>
                  <div class="main_xl_box02_list_text_box2">
                    <dl>
                      <dt><img src="/images/dot_h.jpg" width="4" height="7" /></dt>
                      <dd><a href="#">2010年全国高考真题及答案汇总</a></dd>
                    </dl>
                    <dl>
                      <dt><img src="/images/dot_h.jpg" width="4" height="7" /></dt>
                      <dd><a href="#">2010年高考填报志愿必看的专业解..</a></dd>
                    </dl>
                    <dl>
                      <dt><img src="/images/dot_h.jpg" width="4" height="7" /></dt>
                      <dd><a href="#">第一时间公布2010年全国各地高考..</a></dd>
                    </dl>
                  </div>
                </div>
              </div>
              <div class="main_xl_box02_list" style="margin-right:0;">
                <div class="main_xl_box02_list_title"> <span>在线问答</span> </div>
                <div class="main_xl_box02_list_text">
                  <div class="main_xl_box02_list_text_box1">
                    <dl>
                      <dt>
                        <div class="main_xl_box02_list_text_box1_pic"><img src="/images/xl_box2_01.jpg" /></div>
                      </dt>
     <?php 
	  // $sql="select * from wdonline where wd_bool=1 order by wd_stime desc ";
	  $i=0;
	  $rs=$dblink->findAll("wdonline",array(),"wd_bool=1","","","wd_stime desc ");
		  	foreach($rs as $key=>$row){
				$row1=$dblink->find("school",array(),"s_name='{$row["s_name"]}'");
				$row2=$dblink->find("kkinfo",array(),"s_id='{$row1["s_id"]}'");
				if (isset($row2["kid"])){ 
				$i++;
	  ?>
                      <dd><a title='<?=$row["wd_ask"]?>' href="/Education/xl_pro_zxtw.php?kid=<?php echo $row2["kid"];?>&sid=<?php echo $row1["s_id"];?>"><?php echo $Common->strCut($row["wd_ask"],60);?></a>
                      <br><font title="<?=$row["wd_answer"]?>" color="#666"><?=$Common->strCut($row["wd_answer"],60);?></font></dd>
                      
                      <?php 
					  break;}
					  }?>
                    </dl>
                  </div>
                  <div class="main_xl_box02_list_text_box2">
    <?php 
		$i=0;
		foreach($rs as $k=>$row){
		if($k<$key)continue;
		if($i>2)break;
				$row1=$dblink->find("school",array(),"s_name='{$row["s_name"]}'");
				$row2=$dblink->find("kkinfo",array(),"s_id='{$row1["s_id"]}'");
				if(isset($row2["kid"])){
				$i++;?>				 
				<dl>
                    <dt><img src="/images/dot_h.jpg" width="4" height="7" /></dt>
                    <dd>[问] <a href="/Education/xl_pro_zxtw.php?kid=<?=$row2["kid"]?>&sid=<?=$row1["s_id"]?>"><?php echo $row["wd_ask"];?></a></dd>
                </dl> 
				<?php 
				}
		}?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="main_xllb_box01_right">
            <div class="main_xllb_box01_right_list01">
				<div class="main_xllb_box01_right_list01_title"> <span>热点关注</span></div>
				<div class="main_xllb_box01_right_list01_text"> 
                <div class="main_xllb_box01_right_list01_text_box1_00">
                 
                  <?php
						// $sql="select * from enclass where n_id=8";
						// $rs=mysql_query($sql);
						// if (mysql_num_rows($rs)>=1){
							// $rowa=mysql_fetch_array($rs,MYSQL_ASSOC);
							// }
						?>
                  <?php
						$rowa=$dblink->find("enclass",array(),"n_id=8");
						$rs=$dblink->findAll("ennews",array(),"nclass='{$rowa["n_id"]}'","","1,2");
							foreach($rs as $row){
						?>
                  <div class="main_xllb_box01_right_list01_text_box1">
                    <h1><a href="/Education/xl_news_detail.php?id=<?php echo $row["nid"];?>"><?php echo $row["ntitle"];?></a></h1>
                    <span>
                      <?php echo $Common->strCut($row["ncon"],88)?>
                    <a href="/Education/xl_news_detail.php?id=<?php echo $row["nid"];?>">[详细]</a></span> </div>
                  <?php }?>
                </div>
                <div class="main_xllb_box01_right_list01_text_box2">
                  <?php
						$rs=$dblink->findAll("mb_step",array()," mb_tj=1","","2","mb_id desc");
							foreach($rs as $row){
						?>
                  <a href="/school/?sid=<?php echo $row["mb_id"];?>" target="_blank"><?php echo $row["s_name"];?></a><br />
                  <?php }?>
                </div>
              </div>
            </div>
            <div class="main_xllb_box01_right_list01">
              <div class="main_xllb_box01_right_list01_title"> <span>报名条件、时间</span> </div>
              <div class="main_xllb_box01_right_list01_text">
                <div class="main_bmtj">
                  <div class="main_bmtj_box01"><?php echo $web["z_bmtj"];?> </div>
                  <div class="main_bmtj_box02"> <span>报名电话：<?php echo $web["z_tel"];?></span> </div>
                </div>
              </div>
            </div>
            <div class="main_xllb_box01_right_list01">
              <div class="main_xllb_box01_right_list01_title">
                <span><?php echo $rowa["n_class"];?></span><a href="/Education/xl_newscl.php?cl=<?php echo $rowa["n_id"];?>"><img src="/images/xl_hot.jpg" /></a> </div>
              <div class="main_xllb_box01_right_list01_text">
                <div class="main_rdzx">
                  <ul>
                    <?php
						$rs=$dblink->findAll("ennews",array(),"nclass='{$rowa["n_id"]}'","","2,4");
						foreach($rs as $row){
							?>
							<li><a href="/Education/xl_news_detail.php?id=<?php echo $row["nid"];?>"><?php echo $row["ntitle"];?></a></li>
							<?php
						}
						?>
                  </ul>
                </div>
              </div>
            </div>
            <div class="main_xllb_box01_right_list01">
              <div class="main_xllb_box01_right_list01_title">
                <?php
						$rowa=$dblink->find("enclass",array(),"n_id=9");
						?>
                <span><?php echo $rowa["n_class"];?></span><a href="/Education/xl_newscl.php?cl=<?php echo $rowa["n_id"];?>"><img src="/images/xl_fq.jpg" alt=""/></a> </div>
              <div class="main_xllb_box01_right_list01_text">
                <div class="main_rdzx">
                  <ul>
                    <?php
						$rs=$dblink->findAll("ennews",array()," nclass='{$rowa["n_id"]}'","","4");
							foreach($rs as $row){
						?>
                    <li><a href="/Education/xl_news_detail.php?id=<?php echo $row["nid"];?>"><?php echo $row["ntitle"];?></a></li>
                    <?php
						}
						?>
                  </ul>
                </div>
              </div>
            </div>
            <div class="main_xllb_box01_right_list01" style="margin-bottom:0;">
              <div class="main_xllb_box01_right_list01_title"> <span>下载专区</span><a href="/Education/xl_download.php"><img src="/images/xl_xz.jpg" alt="更多下载"/></a> </div>
              <div class="main_xllb_box01_right_list01_text">
                <div class="main_xzzq">
                  <ul>
                    <?php
						$sql="select * from xl_ask limit 4";
						$rs=$dblink->findAll("xl_ask",array(),"","","4");
							foreach($rs as $row){					
								if($user=Userlogin()){?>
						<li><a onclick="dsumXMLHttp(<?php echo $row["w_id"];?>)" href="/admin_root/<?php echo $row["w_con"];?>"><?php echo $row["w_title"];?></a></li>
						<?php }else{?>
						<li style="cursor:pointer;" onclick="alert('对不起您尚未登陆');location.href='/vip_login.php';"><?php echo $row["w_title"];?></li>
						<?php }?>
                    <?php }?>
                  </ul>
                </div>
              </div>
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