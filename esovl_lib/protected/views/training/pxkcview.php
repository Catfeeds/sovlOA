<div class="px_ss">
	<ul>
		<?php 
			if(isset($_POST["xl_skey"])){	
				$skey=@$_POST["xl_skey"];
				echo "<script>location.href='../Education/xl_pro_search.php?skey=".$skey."';</script>";	
			}
		?>
		<form name="xl_sform" id="xl_sform" method="post" onsubmit="return xl_sou();" action="">
			<li>
				<input name="xl_skey" type="text" style="width:220px;" />
			</li>
			<li>
				<input name="input" type="image" src="/images/ss_pro.jpg" style="width:60px;height:24px;" />
			</li>
			<li><span>搜索关键词：</span><a href="#">考研</a> <a href="#">普通高考</a> <a href="#">成人高考</a> <a href="#">自考</a> <a href="#">在职硕士</a></li>
		</form>
	</ul>
</div>
<div class="px_kclist">
    <div class="px_kclist_wz">您现在的位置：<a href="/">一休网</a> >> <a href="<?=Yii::app()->createUrl("/training/index")?>">培训首页</a> >> 课程分类 >> <?=$NclassModel["ic_class"]?></div>
	<div class="px_kclist_fl">
        <ul>
			<?php
				$res = Icolumn::model()->getAllNameByid($NclassModel['ic_pid']);
				foreach($res as $row){
			?>
				<li><a href="<?=Yii::app()->createUrl("/training/pxkclist",array('id'=>$row['ic_id']))?>">
					<?=$row["ic_class"]?>
				</a></li>
			<?php }?>
		</ul>                                                                                        
	</div>
    <div class="px_kclist_box01">
		<div class="main_box03_left">
            <div class="main_box03_left_px_kc_details">
			   <div class="main_box03_left_px_kc_details_box01"><?=$newsModel["pxk_title"]?></div>
                <div class="main_box03_left_px_kc_details_box02">
                    <div class="main_box03_left_px_kc_details_box02_pic">
						<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
							<tr>
								<td align="center" valign="middle">
									<a href="#"><img src="/admin_root/<?=$newsModel["pxk_pic"]?>" border="0" align="top"  width="245" height="188"/></a>
								</td>
							</tr>
						</table>
                    </div>
                    <div class="main_box03_left_px_kc_details_box02_text">
						<dl><dt><span>学费：</span><?=$newsModel["pxk_xfei"]?></dt><dd><span>一休网优惠价格：</span><?=$newsModel["pxk_yhui"]?></dd></dl>
						<ul><li><span>开课时间：</span><?=$newsModel["pxk_time"]?></li></ul>
						<dl><dt><span>学时：</span><?=$newsModel["pxk_xshi"]?></dt><dd><span>浏 览 量：</span><?=$newsModel["pxk_click"]?>次</dd></dl>
						<?php
							$criteria=new CDbCriteria;
							$criteria->addCondition("pxs_id ='{$newsModel['pxk_sid']}'");
							$school = Pxschool::model()->find($criteria);
						?>                   
						<ul>
							<li><span>授课机构：</span><a href="px_school/?pid=<?=$newsModel["pxk_sid"]?>"><?=$school['pxs_name']?></a></li>
							<li><span>上课地点：</span><?=$newsModel["pxk_adder"]?></li>
						</ul>
						<dl>
							<dt><a href=tencent://message/?uin=<?=$newsModel["pxk_qq"]?>&Site=<?//=$z_name?>&Menu=yes title="在线咨询2"><img border="0" src=http://wpa.qq.com/pa?p=1:<?=$newsModel["pxk_qq"]?>:7 align="top"/></a></dt>
							<dd><a href="px_school/baoming.php?pid=<?=$newsModel["pxk_sid"]?>"><img src="/images/px_wsbm.jpg" /></a></dd>
						</dl>
						<ul><li><strong>联系电话：<?=$newsModel["pxk_tel"]?></strong></li></ul>
					</div>
				</div>
				<div class="main_box03_left_px_kc_details_box03">
					<div class="main_box03_left_px_kc_details_box03_title"><span>详细介绍</span></div>
					<div class="main_box03_left_px_kc_details_box03_list">
						<ul>
							<li><span>【交通线路】</span><?=$newsModel["pxk_line"]?></li>
							<li><span>【适合对象】</span><?=$newsModel["pxk_duix"]?></li>
						</ul>
					</div>
				</div>
				<div class="main_box03_left_px_kc_details_box04">
					<h2><?=$newsModel["pxk_title"]?></h2>
					<div class="main_box03_left_px_kc_details_box04_test"><?=$newsModel["pxk_con"]?></div>
				</div>
				
            </div>
		</div>
		<?=$this->renderPartial("_newslistright",array('web'=>$web));?>
	</div>
</div>