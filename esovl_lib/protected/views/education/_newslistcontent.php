<div class="zx_gg_lm" >
	<div class="zx_gg_zl">资讯</div>
	<div style='float:right; height:20px; padding-top:5px;'>
	<?php	$NewsModels=$dataProvider->getData();
			$this->widget('CYixiuLinkPager',array(
			'pages'=>$dataProvider->pagination,
			"htmlOptions"=>array("style"=>"float:right","class"=>"yixiuPage",),
			"nextPageLabel"=>"下一页",
			"prevPageLabel"=>"上一页",
			"cssFile"=>"/css/otherPageLink.css",
			));?>
	</div>
</div>
<div class="zx_lm_dian">
	<img src="/images/wl-gg_06.jpg" />
</div>
<?php 	foreach($NewsModels as $k=>$row){
			if($dataProvider->pagination->currentPage=="0"&&$k=="0"){?>
				<div class="zx_xw_dk">
					<div class="zx_xw_tu">
						<img src="/admin_root/<?=$row["i_pic"]?>" alt=<?=$row["i_title"]?>/>
					</div>
					<div class="zx_xw_bt">
						<a href="<?=Yii::app()->createUrl("education/newsview",array("id"=>$row["i_id"]))?>">
							<?=$row["i_title"]?>
						</a>
					</div>
					<div class="zx_xw_sj" style="float:right;width:80px;">
						<?=date('Y-m-d',$row["i_submitdate"])?>
					</div>
					<div class="zx_xw_nr">
						<?=Common::strCutAndTags($row["i_con"],170)?>
					</div>
				</div>
<?php 		}else{?>
				<div class="zx_xw_dk2">
					<div class="zx_wzgg_bt">
						<span>
							<a href="<?=Yii::app()->createUrl("education/newsview",array("id"=>$row["i_id"]))?>">
								<?=$row["i_title"]?>
							</a>
						</span>
						<?=date('Y-m-d',strtotime($row["i_submitdate"]))?>
					</div>
					<div class="zx_wzgg_nr">
						<?=Common::strCutAndTags($row["i_con"],180)?>
						<span>
							<a href="<?=Yii::app()->createUrl("education/newsview",array("id"=>$row["i_id"]))?>">
								查看详细>>
							</a>
						</span>
					</div>
				</div>
<?php		}	
		}?>
<div class="zx_gg_fy"> 
	<span style=" display:block;float:left;">
		共<?=$dataProvider->totalItemCount?> 条信息
	</span>
    <div style="float:right;">
	<?php	$this->widget('CLinkPager',array(
					'pages'=>$dataProvider->pagination,
					"cssFile"=>"/css/pager.css"
			));?>
    </div>
</div>
	