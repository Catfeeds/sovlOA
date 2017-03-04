<!-- main -->
<div class="main">
	<div class="px_weizhi">你现在的位置：<a href="<?=Yii::app()->createUrl("training/index")?>">培训</a> >> <a href="<?=Yii::app()->createUrl("training/pxshop")?>">上海培训超市</a> >> 全部培训学校</div>
    <div class="px_shop">
    	<div class="px_shop_left">
         	<div class="px_shop_left_box">
				<div class="px_shop_left_box00">
					<table>
						<tr>
							<td align="center" valign="middle"><div class="px_shop_l01">[开班学校]</div></td>
							<td align="center" valign="middle"><div class="px_shop_l02">
								<ul>
									<?php
										$criteria=new CDbCriteria;
										$res = Pxschool::model()->findAll($criteria);
										foreach($res as $row){
									?>
										<li><a href="<?=Yii::app()->createUrl("/training/pxshop",array("id"=>$row['pxs_id']))?>"><?=$row["pxs_name"]?></a></li>
									<?php }?>     
								</ul>
							</div></td>
						</tr>
					</table>
				</div>
				<div class="px_shop_line">&nbsp;</div>
                <div class="px_shop_left_box00">
                	<table>
						<tr>
							<td align="center" valign="middle"><div class="px_shop_l01">[开班课程]</div></td>
							<td align="center" valign="middle">
								<div class="px_shop_l02">
									<?/**/?>
									<ul>
										<?php  
											// $res = $dblink->findAll('pxsclass');
											$criteria=new CDbCriteria;
											$res = Pxsclass::model()->findAll($criteria);
											foreach($res as $row4){
										?>
											<li><a href="<?=Yii::app()->createUrl("/training/pxshop",array("id"=>$row4['ps_id']));?>"><?=$row4["ps_title"]?></a></li>
										<?php }?>
									</ul>
									
								</div>
							</td>
						</tr>
                    </table>
                </div>
            </div>
          <?/*
			<div class="px_shop_left_box02">
				<?php
					if(isset($_GET["pxk_sid"])){
						$_SESSION["pxk_sid"]=$_GET["pxk_sid"];
						}else{
							if(isset($_SESSION["pxk_sid"])){
								
							}else{
								$_SESSION["pxk_sid"]="";
							}					
						}		
					
					
					if(isset($_GET["pxk_cl"])){
						$_SESSION["pxk_cl"]=$_GET["pxk_cl"];
						}else{
							if(isset($_SESSION["pxk_cl"])){}else{
							$_SESSION["pxk_cl"]="";
							}					
					}
					if(isset($_GET["kill"])){
					if($_GET["kill"]=="desid"){$_SESSION["pxk_sid"]="";}
					if($_GET["kill"]=="decl"){$_SESSION["pxk_cl"]="";}
					}
				?>
            	<dl>
					<dt>您已选择:</dt>
					<dd>
						<ul>
							<?php if($_SESSION["pxk_sid"]!=""){					
								$rs_1=mysql_query("select * from pxschool where pxs_id=".$_SESSION["pxk_sid"],$conn);	            
								$row_1=mysql_fetch_array($rs_1,MYSQL_ASSOC);
							?>
								<li><span><?=$row_1["pxs_name"]?></span><a href="px_shop.php?kill=desid"><img src="images/px_x.jpg" /></a></li>
							<?php }?>
							<?php if($_SESSION["pxk_cl"]!=""){
								$rs_2=mysql_query("select * from pxsclass where ps_id=".$_SESSION["pxk_cl"],$conn);	            
								$row_2=mysql_fetch_array($rs_2,MYSQL_ASSOC);  
							?>
								<li><span><?=$row_2["ps_title"]?></span><a href="px_shop.php?kill=decl"><img src="images/px_x.jpg" /></a></li>
							<?php }?>
						</ul>
					</dd>
                </dl>
            </div>
			*/?>
			<?/*
			<div class="px_shop_left_box03">
				<?php
					$pagesize=2;
					$url=$_SERVER["REQUEST_URI"];
					$url=parse_url($url);
					@$url=$url[path];
					$numq=$dblink->fetchAll("SELECT * FROM pxkkinfo where pxk_sid like '%".$_SESSION["pxk_sid"]."%' and pxk_cl like '%".$_SESSION["pxk_cl"]."%'");
					$num = count($numq);
					$cp=ceil($num/$pagesize);//函数获取页数
					
					if(@$_GET[page]){
					$pageval=@$_GET[page];
					$page=($pageval-1)*$pagesize;
					$page.=',';
					}
					@$sql="SELECT * FROM pxkkinfo where pxk_sid like '%".$_SESSION["pxk_sid"]."%' and pxk_cl like '%".$_SESSION["pxk_cl"]."%' order by pxk_id desc limit $page $pagesize ";
					$res = $dblink->fetchAll($sql);
					foreach($res as $row){		
				?>
					<div class="px_shop_left_box03_00">
						<div class="px_shop_left_box03_00_title">
							<a href="px_kc_list_details.php?id=<?=$row["pxk_id"]?>"><?=$row["pxk_title"]?></a>
						</div>
						<div class="px_shop_left_box03_00_list">
							<div class="px_shop_left_box03_00_list_pic">
								<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
									<tr>
										<td align="center" valign="middle">
											<a href="px_kc_list_details.php?id=<?=$row["pxk_id"]?>"><img src="../admin_root/<?=$row["pxk_pic"]?>" border="0" align="top" onload="javascript:if(this.width>100){this.width=100}"/></a>
										</td>
									</tr>
								</table>
							</div>
							<div class="px_shop_left_box03_00_list_text">
								<ul>
									<?php
										$rw = $dblink->find('pxschool',array('pxs_id','pxs_name'),"pxs_id=".$row["pxk_sid"]);
									?>
									<li style="width:240px;"><strong>开班学校：</strong><a href="px_school/?pid=<?=$rw["pxs_id"]?>"><?=$rw["pxs_name"]?></a></li>
									<li><strong>开班时间：</strong><?=$row["pxk_date"]?></li>
									<li style="width:240px;"><strong>上课地点：</strong><?=$row["pxk_adder"]?></li>
									<li><strong>学时：</strong><?=$row["pxk_xshi"]?></li>
								</ul>
							</div>
							<div class="px_shop_left_box03_00_list_xx">课程介绍：<?=$Common->strCut(strip_tags($row["pxk_con"]),200)?> 
								<a href="px_kc_list_details.php?id=<?=$row["pxk_id"]?>">[详细]</a>
							</div>
							<div class="px_shop_left_box03_00_list_jg">
								<ul>
									<li>学校价格：<span><?=$row["pxk_xfei"]?></span></li>
									<li>会员价格：<strong><?=$row["pxk_yhui"]?></strong></li>
									<li>立即节省：<strong>50</strong> 元</li>
								</ul>
							</div>
							<div class="px_shop_left_box03_00_list_bm"><a href="px_school/baoming.php?pid=<?=$row["pxk_sid"]?>"><img src="images/px_wsbm.jpg" /></a></div>
                        
                        
						</div>
					</div>
				<?php }?>
			</div>
			*/?>
			<?/*
            <div class="px_shop_left_box04">
				<?php
						//echo "共".$cp."页";
					if($num > $pagesize){
					if(@$pageval<=1)$pageval=1;
					
					if(@$_GET["page"]!=""&&@$_GET["page"]>1){
					echo" <a href=$url?page=".($pageval-1).">上一页</a>";
					}
						for ($i=1;$i<=$cp;$i++){
							if ($i==@$_GET["page"]){
							echo $i;
							}else{
							echo "  <a href=$url?page=".$i.">[".$i."]</a>  ";
							}
						}
					if(@$_GET["page"]<$cp){
					echo " <a href=$url?page=".($pageval+1).">下一页</a>";
					}
					} 
				?>
			</div>
			*/?>
		</div>
        <div class="px_shop_right">
         	<div class="main_box03_right_box02">
            	<div class="main_box03_right_box02_title">
                	<dl>
						<dt>课程分类</dt>
						<dd>&nbsp;</dd>
                    </dl>
                </div>
                <div class="main_box03_right_box02_list">
					<div class="main_shop_fl">
						<?php
							$res = Pxbclass::model()->getBclass();
							foreach($res as $rowc){
						?>
							<div class="main_shop_fl_title">
								<span><?=$rowc["pb_title"]?></span>
							</div>
							<div class="main_shop_fl_list">
								<ul>
									<?php
										$id = $rowc["pb_id"];
										$res1 =  Pxsclass::model()->getByPbidclass($id);
										foreach($res1 as $row1){
									?>
										<li><a href="<?=Yii::app()->createUrl("/training/pxkclist",array("id"=>$row1['ps_id']));?>"><?=$row1["ps_title"]?></a></li>
									<?php }?>
								</ul>
							</div>
						<?php }?>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main End -->