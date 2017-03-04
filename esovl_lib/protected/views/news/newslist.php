<?=$this->renderPartial("_newsleft",array("Nclass"=>$Nclass));?>	
	<div class="main_news_right">
		<?=$this->renderPartial("_newslisttop",array("Nclass"=>$Nclass));?>
		<!--内容Begin-->
		<div class="newsc1_box">
			<?php	
				$NewsModels=$dataProvider->getData();
				foreach($NewsModels as $k=>$row){
					$model = Icolumn::model()->find("ic_id ='{$row->i_class}'");//print_r($model);
					if(!$Nclass){
						 //没有id[热点资讯、热门推荐等]
						$classid=$model->ic_pid;
					}else{
						 //有id[学历信息、培训信息等]
						$classid=$model->ic_id==$_GET["id"]?$row->i_label:$row->i_label==$_GET["id"]?$row->i_label:$model->ic_id;
						
					}
			?>
					<div class="newsc1_list">
						<dl style="border:none;">
							<dt>
								[<a style="bgcolor:#F6850B;" href="<?=Yii::app()->createUrl("news/newslist",array("id"=>$classid))?>"><?=Icolumn::model()->getNameByid($classid)?></a>]
								<a href="<?=Yii::app()->createUrl("news/newsview",array("id"=>$row->i_id))?>">
									<?php echo Common::strCut($row["i_title"],100);?>
								</a>
							</dt>
							<dd>[<?=$row["i_submitdate"]?date('Y-m-d ',$row["i_submitdate"]):"";?>]</dd>
						</dl>
						<p class="news_list_text"><?=Common::strCutAndTags($row['i_con'],100)?></p>
					</div>
		 <?php  }?>           
		</div>
		<!--分页Begin-->
		<div class="main_news_right_box03">
			<div class="fy">
						共<?=$dataProvider->totalItemCount?> 条信息
						<?php	
							$this->widget('CLinkPager',array(
								'pages'=>$dataProvider->pagination,
								"cssFile"=>"/css/pager.css"
							));
						?>
			</div>
		</div>
	</div>