<div class="wl-zx">
            <div class="wl-wy">
              <div class="wl-tz"><img src="<?=$z_website?>images/wl-tz_03.jpg" /></div>
              <div class="wl-wk">
                          <div class="wl-nk"><img src="<?=$z_website?>images/wl-tz_08.jpg" /></div>
                          
                          <div class="wl-nk-contant">
                          
                          	<div class="wl_xytj_list">
        <?php
		$sql="select * from mb_step join school on mb_step.s_name=school.s_name where mb_step.mb_tj=1 order by mb_step.mb_id desc";
		$rs=mysql_query($sql,$conn);
		$row=mysql_fetch_assoc($rs);			
		?>
        		<div id="demomain">
                    <div id="indemomain">
                      <div id="demo1main">
        					<div class="wl_xytj_list_gd">
                            <?php if(isset($row["s_name"])){?>
                            <div class="tz-tu">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td align="center" valign="middle">
<a href="<?=$z_website?>school/?sid=<?=$row['mb_id']?>" target="_blank"><img src="<?=$z_website?>admin_root/<?php echo $row['mb_logo'];?>" onload="if(this.width>92){this.width=92}" border="0" align="top"/></a>
</td>
</tr>
</table>
                            </div>
                            <div class="tz-bt"><a href="<?=$z_website?>school/?sid=<?=$row['mb_id']?>" target="_blank"><?php echo $row['s_name']; ?></a></div>
                            <div class="tz-wz"><?php echo strip_tags($row['s_xyjs']);?></div>
                            <div class="tz-xx"></div>
                            <?php }
							$row=mysql_fetch_assoc($rs);
							if(isset($row["s_name"])){
							?>
                            <div class="tz-tu">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td align="center" valign="middle">
<a href="<?=$z_website?>school/?sid=<?=$row['mb_id']?>" target="_blank"><img src="<?=$z_website?>admin_root/<?php echo $row['mb_logo'];?>" onload="if(this.width>92){this.width=92}" border="0"/></a>
</td>
</tr>
</table>
                            </div>
                            <div class="tz-bt"><a href="<?=$z_website?>school/?sid=<?=$row['mb_id']?>" target="_blank"><?php echo $row['s_name']; ?></a></div>
                            <div class="tz-wz"><?php echo strip_tags($row['s_xyjs']);?></div>
                            <div class="tz-xx"></div>
                            </div>
                            <div class="wl_xytj_list_gd2">
                            <?php }
							$row=mysql_fetch_assoc($rs);
							if(isset($row["s_name"])){
							?>
                            <div class="tz-tu">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td align="center" valign="middle">
<a href="<?=$z_website?>school/?sid=<?=$row['mb_id']?>" target="_blank"><img src="<?=$z_website?>admin_root/<?php echo $row['mb_logo'];?>" onload="if(this.width>92){this.width=92}" border="0"/></a>
</td>
</tr>
</table>
                            </div>
                            <div class="tz-bt"><a href="<?=$z_website?>school/?sid=<?=$row['mb_id']?>" target="_blank"><?php echo $row['s_name']; ?></a></div>
                            <div class="tz-wz"><?php echo strip_tags($row['s_xyjs']);?></div>
                            <div class="tz-xx"></div>
                            <?php }
							$row=mysql_fetch_assoc($rs);
							if(isset($row["s_name"])){								
							?>
                            <div class="tz-tu">
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
<td align="center" valign="middle">
<a href="<?=$z_website?>school/?sid=<?=$row['mb_id']?>" target="_blank"><img src="<?=$z_website?>admin_root/<?php echo $row['mb_logo'];?>" onload="if(this.width>92){this.width=92}" border="0" align="top"/></a>
</td>
</tr>
</table>
                            </div>
                            <div class="tz-bt"><a href="<?=$z_website?>school/?sid=<?=$row['mb_id']?>" target="_blank"><?php echo $row['s_name']; ?></a></div>
                            <div class="tz-wz"><?php echo strip_tags($row['s_xyjs']);?></div>
                            <div class="tz-xx"></div><?php }?>
                            </div>                           
                            
                      </div>
                      <div id="demo2main">
                      
                       </div>
                      </div>
                  </div>    
                            
                            <div class="tz-an">
                              <input name="input" type="image" src="<?=$z_website?>images/wl-tz_17.jpg" onclick="goleft()" />
                            </div>
                            <div class="tz-an" style="margin-left:10px;">
                              <input name="input" type="image" src="<?=$z_website?>images/wl-tz_19.jpg" onclick="goright()" />
                            </div>
                            
                          </div>
                          
                        </div>
                        <div class="wl-nk-bommom"><img src="<?=$z_website?>images/wl-tz_23.jpg" /></div>
                      </div>
              <div class="wl-tz-bommom"><img src="<?=$z_website?>images/wl-tz_25.jpg" /></div>
            </div>
            <div class="wl-gg">
              <div class="wl-gg-left"><img src="<?=$z_website?>images/wl-zc_27.jpg" /></div>
              <div class="wl-gg-contant">
                <div class="gg-bt">网站公告</div>
                <div class="gg-more"><a href="Education/wlys/wl_zx.php?classid=16">MORE+</a></div>
              </div>
              <div class="wl-gg-right"><img src="<?=$z_website?>images/wl-zc_30.jpg" /></div>
              <div class="wl-gg-dk">
                <div class="wl-gg-bt">
            <ul>
            <?php
			$sql="select * from ennews where nclass=16 order by ndate desc";
			$rs=mysql_query($sql,$conn);
			for ($m=0;$m<6;$m++){
				$row=mysql_fetch_assoc($rs);
				echo "<li><a title='".$row['ntitle']."' href='Education/wlys/wl_zx-neiye.php?nid=".$row['nid']."'>".$row['ntitle']."</a></li>";
			}
			?>
                
            </ul>
        </div>
              </div>
            </div>
        </div>
        <script src="../../js/lright.js" type="text/javascript"></script>