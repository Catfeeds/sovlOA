<link href="/css/abroad/lxschool.css" rel="stylesheet" type="text/css" />
<!--[if gte IE 6]><script language="javascript" src="/js/abroad/ie6png.js" type="text/javascript" ></script><![endif]-->
<div class="main00">
		<div class="school">
			<div class="school_logo"><img src="/admin_root/<?=$lxcon->lxs_banner?>" /></div>
			<div class="school_weizhi">您当前的位置：<a href="/abroad/index">留学频道</a> >> <a href="<?=Yii::app()->createUrl('abroad/lxabroad');?>"><?=$lxcon->lxs_name?></a></div>
			<div class="school_box">
				<?=$this->renderPartial('_schleft',array('action'=>$_GET['action']));?>
				<div class="school_box_cen">
                  <?php if($_GET["action"]=="lxs_xxjs"){?>
					<div class="school_box_cen_list">
						<div class="school_box_cen_list_title">
							<dl>
								<dt><img src="/images/xx_t01.jpg" /></dt>
								
							</dl>
						</div>
						<div class="school_box_cen_list_text">
                        <?=$lxcon->lxs_xxjs?>
						</div>
					</div>
                    <?php }?>
                    <?php if($_GET["action"]=="lxs_kcys"){?>
					<div class="school_box_cen_list">
						<div class="school_box_cen_list_title">
							<dl>
								<dt><img src="/images/xx_t02.jpg" /></dt>
								
							</dl>
						</div>
						<div class="school_box_cen_list_text">
                   <?=$lxcon->lxs_kcys?>
						</div>
					</div>
                    <?php }?>
                    <?php if($_GET["action"]=="lxs_zsjz"){?>
					<div class="school_box_cen_list">
						<div class="school_box_cen_list_title">
							<dl>
								<dt><img src="/images/xx_t03.jpg" /></dt>								
							</dl>
						</div>
						<div class="school_box_cen_list_text">
						 <?=$lxcon->lxs_zsjz?>
						 <table width="508" border="1" cellpadding="1" cellspacing="1" style="color:#333;margin-top:20px;">
						  <tr align="center" valign="middle">
							<td width="63"><strong>国家</strong></td>
							<td width="79"><strong>专业名称</strong></td>
							<td width="149"><strong>开班名称</strong></td><td width="75"><strong>学费</strong></td><td width="88">&nbsp;</td>
						  </tr>
						<?php 
						foreach($brochures as $row){
						?>
						  <tr align="center" valign="middle">
							<td><?php echo $row['ic_class'];?></td>
							<td><?php echo $row["lxk_zy"];?></td>
							<td><u><a href="<?=Yii::app()->createUrl('abroad/lxcourse',array('kid'=>$row["lxk_id"]));?>"><?php echo $row["lxk_title"];?></a></u></td>

							<td style="color:red;"><?php echo $row["lxk_xuefei"];?></td>
							<td><a href="<?=Yii::app()->createUrl('abroad/lxonline');?>">网上报名>></a></td>
						  </tr>
						  <?php }?>
						</table>
						</div>
					</div>
                    <?php }?>
                    <?php if($_GET["action"]=="lxs_shhj"){?>
					<div class="school_box_cen_list">
						<div class="school_box_cen_list_title">
							<dl>
								<dt><img src="/images/xx_t04.jpg" /></dt>								
							</dl>
						</div>
						<div class="school_box_cen_list_text">
                    <?=$lxcon->lxs_shhj?>
						</div>
					</div>
                    <?php }?>
				</div>
				<?=$this->renderPartial('_schright');?>
			</div>
		</div>
	</div>
	