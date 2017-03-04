<div class="wl-wy">
			<div class="wl-tz">
				<img src="/images/wl-tz_03.jpg" />
			</div>
            <div class="wl-wk">
                <div class="wl-nk">
					<img src="/images/wl-tz_08.jpg" />
				</div>
                <div class="wl-nk-contant">
                    <div class="wl_xytj_list">
						<?php	$TjSchool=MbStep::model()->getTjSchool(4);?>
						<div id="demomain">
							<div id="indemomain">
								<div id="demo1main">
									<div class="wl_xytj_list_gd">
									<?php 	$num=1;
											foreach($TjSchool as $i=>$row){?>
												<div class="tz-tu">
													<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
														<tr>
															<td align="center" valign="middle">
																<a href="/school/?sid=<?=$row['mb_id']?>" target="_blank">
																	<img src="/admin_root/<?php echo $row['mb_logo'];?>" onload="if(this.width>92){this.width=92}" border="0" align="top"/>
																</a>
															</td>
														</tr>
													</table> 
												</div>
												<div class="tz-bt">
													<a href="/school/?sid=<?=$row['mb_id']?>" target="_blank">
														<?php echo $row['s_name']; ?>
													</a>
												</div>
												<div class="tz-wz"><?php echo strip_tags($row->schoolinfo->s_xyjs);?></div>
												<div class="tz-xx"></div>
									<?php 		if(($i+1)%2==0){
													$num++;
													echo "</div><div class='wl_xytj_list_gd{$num}'>";
												};
											}?>
									</div>                
								</div>
								<div id="demo2main">                      
								</div>
							</div>
						</div>    
                        <div class="tz-an">
                            <input name="input" type="image" src="/images/wl-tz_17.jpg" onclick="goleft()" />
                        </div>
                        <div class="tz-an" style="margin-left:10px;">
							<input name="input" type="image" src="/images/wl-tz_19.jpg" onclick="goright()" />
                        </div>
					</div>
                </div>
                <div class="wl-nk-bommom"><img src="/images/wl-tz_23.jpg" /></div>
            </div>
            <script src="/js/lright.js" type="text/javascript"></script>
            <div class="wl-tz-bommom"><img src="/images/wl-tz_25.jpg" /></div>
        </div>