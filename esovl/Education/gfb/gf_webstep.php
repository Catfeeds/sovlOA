 <?php
        $sql="select * from web_step where z_id=6";
        $rs=mysql_query($sql);
        
		if (mysql_num_rows($rs)>=1){	
		   $row=mysql_fetch_assoc($rs);		  
		   $gf_title=$row["z_title"];// 网站标题
		   $gf_keyword=$row["z_keyword"];// 网站优化关键词
		   $gf_contant=$row["z_contant"];// 网站优化描述
         
		   $gf_bmtj=$row["z_bmtj"];//报名条件
		   $gf_bmtel=$row["z_tel"];//报名电话
		   $xl_banner=$row["z_banner"];//动画Banner//学历块下面调用的动画参数一样。
		   $gf_onegg=$row["z_onegg"];//首页中间广告图
		   $gf_gglink=$row["z_gglink"];//广告链接
		   
		   $z_bottom1=$row["z_bottom1"];
		   $z_bottom1_link=$row["z_bottom1_link"];
		   $z_bottom2=$row["z_bottom2"];
		   $z_bottom2_link=$row["z_bottom2_link"];
		   $z_bottom3=$row["z_bottom3"];
		   $z_bottom3_link=$row["z_bottom3_link"];
		   $z_bottom4=$row["z_bottom4"];
		   $z_bottom4_link=$row["z_bottom4_link"];
		   $z_bottom5=$row["z_bottom5"];
		   $z_bottom5_link=$row["z_bottom5_link"];
		   }
		   mysql_free_result($rs);//释放系统资源		   
		  
?>