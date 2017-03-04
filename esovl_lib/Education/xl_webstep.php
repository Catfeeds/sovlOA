 <?php
        $sql="select * from web_step where z_id=1";
        $rs=mysql_query($sql);
        
		if (mysql_num_rows($rs)>=1){	
		   $row=mysql_fetch_assoc($rs);		  
		   $xl_title=$row["z_title"];// 网站标题
		   $xl_keyword=$row["z_keyword"];// 网站优化关键词
		   $xl_contant=$row["z_contant"];// 网站优化描述
           $xl_banner=$row["z_banner"];//网站banner动画
		   $xl_bmtj=$row["z_bmtj"];//报名条件
		   $xl_bmtel=$row["z_tel"];//报名电话
		   $xl_banner=$row["z_banner"];//动画Banner
		   $xl_onegg=$row["z_onegg"];//首页中间广告图
		   $xl_gglink=$row["z_gglink"];//广告链接
		   $xl_z_right1=$row["z_right1"];
		   $xl_z_right1_link=$row["z_right1_link"];
		   
		   $xl_z_right2=$row["z_right2"];
		   $xl_z_right2_link=$row["z_right2_link"];
		   
		   $xl_z_right3=$row["z_right3"];
		   $xl_z_right3_link=$row["z_right3_link"];
		   
		  // $xl_z_right4=$row["z_right4"];
		  // $xl_z_right4_link=$row["z_right4_link"];
		   }
		   mysql_free_result($rs);//释放系统资源
?>