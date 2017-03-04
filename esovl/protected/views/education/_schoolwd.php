
<div class="main_xl_detail_box03">
    <div class="main_xl_detail_box03_main">
        <div class="main_xl_detail_box03_main_left">
            <div id="height01" style="height:20px;"></div>	
            <?=$this->renderPartial("_schoolwdfrom",array("model"=>$model));?>
                  <div class="main_xl_zxtw">
                    	<div class="main_xl_zxtw_box">
						<?php 
						$criteria=new CDbCriteria;
						$criteria->addCondition(" s_name = '".$model->s_name."'");
						$criteria->addCondition(" wd_bool = '1'");
						$dataProvider =  new CActiveDataProvider("Wdonline", array(
										'criteria'=>$criteria,
										'pagination'=>array(
												'pageSize'=>1,
										),
						));
						$newModel=$dataProvider->getData();
						foreach($newModel as $i=>$row){
						?>
                    	  <div class="main_xl_zxtw_box_list00">
                        	<div class="main_xl_zxtw_box_title00">
                            	<div class="main_xl_zxtw_box_title">
                                	<dl>
                                    <dt>网友：<?php echo $row["wd_nc"];?></dt>
                                    <dd>[<?php echo $row["wd_stime"];?>]</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="main_xl_zxtw_box_list">
                            	<dl>
                                <dt><?php echo $row["wd_ask"];?></dt>
                                <dd>
                                	<ul>
                                    <li><?php echo $row["wd_answer"];?></li>
                                    <li class="main_xl_zxtw_box_list_zxhf"><strong>【在线回复】</strong><?php echo $row["wd_ltime"];?></li>
                                    </ul>
                                </dd>
                                </dl>
                            </div>
                          </div>
							<?php }?>
                            <div class="main_xl_zxtw_box_fy">
                            	<?php	$this->widget('CLinkPager',array(
								'pages'=>$dataProvider->pagination,
								"cssFile"=>"/css/pager.css"
								));?>
							</div>
                        </div>
                    </div>
					
                </div>
		<?=$this->renderPartial("_schoolright",array("model"=>$model));?>
    </div>
 </div>
