<?php 	$criteria=new CDbCriteria;
												$criteria->limit='2';
												$criteria->join='join (school,kkinfo) on (t.s_name=school.s_name and school.s_id=kkinfo.s_id)';
												$criteria->with[]="schoolinfo";
												$criteria->addCondition("wd_bool=1 ");//and kkinfo.bk_id=3 为了有数据暂先开启
												$criteria->order='wd_stime desc';
												$wdmodel=Wdonline::model()->findAll($criteria);
												foreach($wdmodel as $row){?>
													<div class="wl-hd">
														<dl>
															<dd>
																<span>[问]</span>
																<a href="<?=Yii::app()->createUrl("education/school",array("id"=>$row->schoolinfo["s_id"],"type"=>"wd"))?>" target="_blank" title="<?=$row["wd_ask"]?>">
																	<?=Common::strCut($row["wd_ask"],49)?>
																</a>
															</dd>
															<dt style="color:#333;">
																<?php echo date('Y-m-d',strtotime($row["wd_stime"]))?>
															</dt>
															<dd>
																<span>[答]</span>
																<?=$row["wd_answer"];?>
															</dd>
															<dt>
																<?php echo date('Y-m-d',strtotime($row["wd_ltime"]))?>
															</dt>
														</dl>
													</div>
													<div class="zj-xx"></div>
										<?php 	}?>