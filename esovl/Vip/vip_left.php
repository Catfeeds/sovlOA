<div class="vip_box_left">
            	<div class="vip_box_left_b1">
                	<div class="vip_box_left_b1_pic"><a href="#"><img src="/admin_root/<?php echo $row["v_img"];?>" /></a></div>
<div class="vip_box_left_b1_list">
                    	<ul>
                        <li><span>会员ID：</span><?=$user["v_id"]?></li>
                        <li><span>一休币：</span>50枚</li>
                        <li><span>资料完整度：</span>28%</li>
                        </ul>
                    </div>
                    <div class="vip_box_left_b1_set"><a href="/Vip/vip_index.php">会员首页</a> | <a href="/Vip/vip_ngrxx.php?id=<?php echo $row["v_id"];?>">个人信息设置</a> <a href="/Vip/out.php" class="ared">退出</a></div>
              	</div>
              	<div class="vip_box_left_b2">
					<div class="vip_box_left_b2_t"><span>欢迎，<?=$user["v_name"]?></span></div>
                <div class="vip_box_left_b2_l">
                  <ul>
                        <li><a href="/Vip/vip_order.php">我的订单</a></li>
                        <li><a href="/Vip/vip_car.php">购物车</a></li>
                        <li><a href="#">我的收藏</a></li>
                        <li><a href="/Vip/vip_grxx.php">个人信息</a></li>
                        <li><a href="/Vip/vip_xgmm.php" class="ared">修改密码</a></li>
                        <li><a href="/Vip/out.php">退出登录</a></li>
           		  </ul>
                  </div>
              	</div>