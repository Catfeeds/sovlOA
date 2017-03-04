<link href="/css/abroad/lxschool.css" rel="stylesheet" type="text/css" />
<!--[if gte IE 6]><script language="javascript" src="/js/abroad/ie6png.js" type="text/javascript" ></script><![endif]-->
<script>
function lxwd(){
	if(document.lxwdform.lxwd_name.value==""){
		alert('请填写您的姓名');
		document.lxwdform.lxwd_name.focus();
		return false;
	}

	if(document.lxwdform.lxwd_question.value==""){
		alert('请填写要咨询的问题');
		document.lxwdform.lxwd_question.focus();
		return false;
	}
}
</script>
	<div class="main00">
		<div class="school">
			<div class="school_logo"><img src="/admin_root/<?=$lxcon->lxs_banner?>" /></div>
			<div class="school_weizhi">您当前的位置：<a href="/abroad/index">留学频道</a> >> <a href="<?=Yii::app()->createUrl('abroad/lxabroad')?>"><?=$lxcon->lxs_name?></a></div>
			<div class="school_box">
				<?=$this->renderPartial('_schleft',array('action'=>'lxs_zjzx'));?>
				<div class="school_box_cen">
					<div class="school_box_cen_list">
						<div class="school_box_cen_list_title">
							<dl>
								<dt><img src="/images/xx_t05.jpg" />
									<a style="display:none;" id="lyb_anniu01" href="JavaScript:void(0);"><img src="/images/xx_wytw.jpg" /></a>
									<a id="lyb_anniu02" href="JavaScript:void(0);" style="display:block;"><img src="/images/xx_wytw02.jpg" /></a>
								</dt>
							</dl>
						</div>
						<div class="school_box_cen_list_text">
							<div id="main_lyb_list" style="display:block;">
								<form name="lxwdform" onsubmit="return lxwd()" method="post" action="/abroad/lxadvisory">
									<div class="main_lyb_list_left">
										<dl><dt>姓名：</dt><dd><input type="text" value="<?php if(isset($_COOKIE["vipname"])){echo $_COOKIE["vipname"];}?>" name="lxwd_name"></dd></dl>
										<dl><dt>咨询学校：</dt><dd><input type="text" value="<?=$lxcon->lxs_name?>" readonly="readonly" name="lxwd_xxmc"></dd></dl>
										<dl><dt>联系方式：</dt><dd><input type="text" name="lxwd_tel"></dd></dl>
									</div>
									<div class="main_lyb_list_right">
										<h1>请填写你的问题</h1>
										<textarea name="lxwd_question"></textarea>
										<input type="submit" value="提交">
									</div>
								</form>
							</div>
	
				<?php 
					$res = $dataProvider->getData();
					if (count($res)>=1){			 
				?>
                  <div class="main_xl_zxtw">
                    	<div class="main_xl_zxtw_box">
						<?php 
						 $i=0;
						 foreach($res as $row){
						 $i=$i+1;	 
						?>
                    	  <div class="main_xl_zxtw_box_list00">
                        	<div class="main_xl_zxtw_box_title00">
                            	<div class="main_xl_zxtw_box_title">
                                	<dl>
                                    <dt>昵称：<?php echo $row["lxwd_name"];?></dt>
                                    <dd>[<?php echo $row["lxwd_date"];?>]</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="main_xl_zxtw_box_list">
                            	<dl>
                                <dt><?php echo $row["lxwd_question"];?></dt>
                                <dd>
                                	<ul>
                                    <li><?php echo $row["lxwd_answer"];?></li>
                                    <li class="main_xl_zxtw_box_list_zxhf"><strong>【在线回复】</strong><?php echo $row["lxwd_ltime"];?></li>
                                    </ul>
                                </dd>
                                </dl>
                            </div>
                          </div>
						<?php }?>
						<div class="main_xl_zxtw_box_fy">
							<dl>
							<dt><span class="main_news_right_box03_left">
							  <?php echo "共 ".$dataProvider->totalItemCount." 条信息";?>
							</span></dt>
								<dd>
								<?php	
									$this->widget('CLinkPager',array(
											'pages'=>$dataProvider->pagination,
											"cssFile"=>"/css/pager.css"
									));
								?>
								</dd>
							</dl>
					  </div>
                        </div>
                    </div>
					<?php }?> 			
						</div>
					</div>
					
				</div>
				<?=$this->renderPartial('_schright');?>
			</div>
		</div>
	</div>