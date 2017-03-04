<div class="main_left">
	<div class="main_left_box01">
		<div class="main_left_box01_title">
			<dl>
				<dt>最新资讯</dt>
				<dd><a href="qp_new_list.php?cl=9">MORE</a></dd>
			</dl>
		</div>
		<div class="main_left_box01_list00">
			<div class="main_left_box01_list">
				<ul>
				<?php 	$newsModel=Information::model()->getAllByPid(5);
						foreach($newsModel as $key=>$val){?>
						<li>
							<span><?=$key+1?>.</span>
							<a title='<?=$val["i_title"]?>' href="<?=Yii::app()->createUrl('enterprise/newsview',array('id'=>$val->i_id))?>">
								<?php echo Common::strCut($val["i_title"],27);?>
							</a>
						</li>
				<?php 	}?>
				</ul>
			</div>
		</div>
	</div>
	<?=$this->renderPartial('_kfleft',array('kefu'=>$kefu));?>
	<div class="main_left_box01">
		<div class="main_left_box01_title">
			<dl>
				<dt>名师风采</dt>
				<dd><a href="<?=Yii::app()->createUrl('enterprise/teachers')?>">MORE</a></dd>
			</dl>
		</div>
		<div class="main_left_box01_list00">
			<div class="main_left_box01_list_msfc" style="height:200px;">
				<div class="main_left_box01_list_msfc_box" id="msfc0"  >
					<div id='msfc1'>
					<?php 	$models=QpTeacher::model()->getTeacher();
							foreach($models as $row){?>
								<dl style="height:200px; border-bottom:1px #CCC dotted;">   	         
								<div class="main_left_box01_list_msfc_box_pic">
									<a href="qp_teacher_detial.php?id=<?php echo $row["teacher_id"];?>"><img src="/admin_root/<?php echo $row["npic"];?>" width="70" height="80" /></a>
								</div>
								<p class="msfc">
									<a href="qp_teacher_detial.php?id=<?php echo $row["teacher_id"];?>"> <?php echo $row["teacher_name"];?><br />
										<span><?php echo $row["teacher_zhuanye"];?></span>
									</a>
									<strong>讲师介绍：</strong> 
									<?php echo Common::strCut($row["teacher_con"],80);?>
								</p>
								</dl>        
					<?php	}?>      
					</div>
					<div id='msfc2'></div>
				</div>
			</div>
			<script>
				var speed=30
				msfc2.innerHTML=msfc1.innerHTML
				var gg=0;
				function Marquee(){
					if(msfc0.scrollTop%210==0){
						if(gg==0){
							setTimeout('msfc0.scrollTop++',1000);
							gg=1;
						}
					}else{
						gg=0;
						if(msfc1.offsetHeight-msfc0.scrollTop<=0)
						msfc0.scrollTop-=msfc1.offsetHeight
						else{
						msfc0.scrollTop++
						}
					}
				}
				var MyMar=setInterval(Marquee,speed)
				msfc0.onmouseover=function() {clearInterval(MyMar)}
				msfc0.onmouseout=function() {MyMar=setInterval(Marquee,speed)}
			</script>
		</div>
	</div>
</div>
<div class="main_cen">
	<!-- pic size:522*207px -->
	<div class="main_cen_flaash"><img src="/images/flash01.jpg" /></div>
	<div class="main_cen_box01">
		<div class="main_cen_box01_title"><strong>企培项目</strong><span>|</span><a href="<?=Yii::app()->createUrl('enterprise/courses')?>">更多>></a></div>
		<div class="main_cen_box01_pic">
			<ul>
			<!-- pic size:162*75px -->
			<?php 	$models=QpKaike::model()->getAll(6,"qpk_id desc");
					foreach($models as $row){?>
						<li><a title='<?php echo $row["qpk_title"];?>' href="<?=Yii::app()->createUrl('enterprise/courses',array("id"=>$row->qpk_id))?>"><img src="/admin_root/<?php echo $row["npic"];?>" onLoad="javascript:if(this.width>=this.height&&this.width>=162){this.width=162};if(this.height>this.width&&this.height>=75){this.height=75};"/></a></li>
			<?php 	}?>
			</ul> 
		</div>
		<div class="main_cen_box01_list">
		<?php   $models=QpKaike::model()->getAll(3,"qpk_num asc");
				foreach($models as $row2){?>
					<dl>
					<dt><?php echo $row2["qpk_title"];?></dt>
					<?php  $QKCmodels=QpKaikeClass::model()->getAll($row2["qpk_id"],6,"kk_id desc ");
							foreach($QKCmodels as $row){?>
								<dd><a href="<?=Yii::app()->createUrl('enterprise/courseview',array("id"=>$row->kk_id))?>"><?php echo $row["kk_title"];?></a></dd>
					<?php 	}?>
					<h2><a href="<?=Yii::app()->createUrl('enterprise/courses',array("id"=>$row2->qpk_id))?>">更多..</a></h2>
					</dl>
		<?php	}?>
		<p>我们这边现在在招呼叫中心</p>
		</div>
	</div>
</div>
<div class="main_right">
	<div class="main_right_box01">
		<div class="main_right_box01_title">
			<span>中心介绍</span>
			<?php $row=QpZhongxin::model()->find();?>
		</div>
		<div class="main_right_box01_list00">
			<div class="sharp color1"> 
				<b class="b1"></b><b class="b2"></b><b class="b3"></b><b class="b4"></b>
				<div class="content">
					<div>
						<img src="/admin_root/<?php echo $row["npic"];?>" onLoad="javascript:if(this.width>=this.height&&this.width>=90){this.width=90};if(this.height>this.width&&this.height>=60){this.height=60};"/>
						<?php echo Common::strCut($row["qp_con"],158);?>
					</div>
					<h3><a href="<?=Yii::app()->createUrl('enterprise/about')?>">详细>></a></h3>
				</div>
				<b class="b5"></b><b class="b6"></b><b class="b7"></b><b class="b8"></b> 
			</div>
		</div>
	</div>
	<div class="main_right_box01">
		<div class="main_right_box01_title"> <span>在线问答</span> </div> 
		<div class="main_right_box01_list00">
			<div class="sharp color1">
				<b class="b1"></b><b class="b2"></b><b class="b3"></b><b class="b4"></b>
				<div class="content">
					<div>
						<div class="main_box02_right_list03">
							<ul>
							<?php 	$qpwsModel=QpWd::model()->getAll('3','wd_ttime desc ',true);
									foreach($qpwsModel as $row){		?>
										<li>
											[ 问 ]<font color="#000000"><?php echo Common::strCut($row["wd_con"],50);?><?php echo $row["wd_ttime"];?></font><br />
											[ 答 ]<font color="#000000"><?php echo Common::strCut($row["wd_huif"],50);?><?php echo $row["wd_htime"];?></font>
										</li>
							<?php 	}?> 
							</ul>
						</div>
					</div>
					<h3><a href="<?=Yii::app()->createUrl('enterprise/faq')?>">更多>></a></h3>
				</div>
				<b class="b5"></b><b class="b6"></b><b class="b7"></b><b class="b8"></b>
			</div>
		</div>
	</div>
</div>
