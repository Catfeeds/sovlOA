<link href="/css/abroad/lxschool.css" rel="stylesheet" type="text/css" />
<!--[if gte IE 6]><script language="javascript" src="/js/abroad/ie6png.js" type="text/javascript" ></script><![endif]-->
	<div class="main00">
		<div class="school">
			<div class="school_logo"><img src="/admin_root/<?=$lxcon->lxs_banner?>" /></div>
			<div class="school_weizhi">您当前的位置：<a href="/abroad/index">留学频道</a> >> <a href="<?=Yii::app()->createUrl('abroad/lxabroad');?>"><?=$lxcon->lxs_name?></a></div>
			<div class="school_box">
				<?=$this->renderPartial('_schleft',array('action'=>'lxs_zsjz'))?>
				<div class="school_box_cen">
					<div class="school_box_cen_list">
						<div class="school_box_cen_list_title">
							<dl>
								<dt><img src="/images/xx_kc03.jpg" /></dt>								
							</dl>
						</div>
						<div class="school_box_cen_list_text">                
							<table width="518" border="1" cellpadding="1" cellspacing="1" style="color:#333;margin-top:20px;">
							  <tr align="center" valign="middle">
								<td width="63"><strong>国家</strong></td>
								<td width="79"><strong>专业名称</strong></td>
								<td width="149"><strong>开班名称</strong></td><td width="75"><strong>学费</strong></td>
							  </tr>
							  <tr align="center" valign="middle">
								<td><?=$result['ic_class']?></td>
								<td><?=$result['lxk_zy']?></td>
								<td><?=$result['lxk_title']?></td>
								<td style="color:red;"><?=$result['lxk_xuefei']?></td>
								</tr> 
							</table>
							<br /><strong>课程介绍</strong>：<br />
							<?=$result['lxk_con']?>
						</div>
					</div>
				</div>
				<?=$this->renderPartial('_schright');?>
			</div>
		</div>
	</div>