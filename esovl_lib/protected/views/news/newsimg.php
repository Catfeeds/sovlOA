<?=$this->renderPartial("_newsleft",array("Nclass"=>$Nclass));?>
<div class="main_news_right">
	<?=$this->renderPartial("_newslisttop",array("Nclass"=>$Nclass));?>
	<div class="new_pic_margin">
	<?php
		$NewsModels=$dataProvider->getData();
		foreach($NewsModels as $row){
	?>
			<div class="main_N_left_box01_list00">
				<dl>
					<dt>
						<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
							<tr>
								<td align="center" valign="middle">
									<a href="<?=Yii::app()->createUrl("news/newsview",array('id'=>$row->i_id))?>"><img src="/admin_root/<?=$row["i_pic"]?>" border="0" align="top" onload="if(this.width>152){this.width=152}if(this.height>96){this.height=96}"/></a>
								</td>
							</tr>
						</table>                        
					</dt>
					<dd><a href="<?=Yii::app()->createUrl("news/newsview",array('id'=>$row->i_id))?>"><?=$row["i_title"]?></a></dd>
				</dl>
			</div>
  <?php }?>           
	</div>
	<div class="main_news_right_box03">
		<div class="fy">
			<ul>
				<li>
					共<?=$dataProvider->totalItemCount?> 条信息
					<?php	
						$this->widget('CLinkPager',array(
							'pages'=>$dataProvider->pagination,
							"cssFile"=>"/css/pager.css"
						));
					?>
				</li>
			</ul>
		</div>
	</div>
</div>