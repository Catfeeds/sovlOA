 <?php
        $sql="select * from web_step where z_id=4";
        $rs=mysql_query($sql);
        
		if (mysql_num_rows($rs)>=1){	
		   $row=mysql_fetch_assoc($rs);		  
		   $cr_title=$row["z_title"];// 网站标题
		   $cr_keyword=$row["z_keyword"];// 网站优化关键词
		   $cr_contant=$row["z_contant"];// 网站优化描述
         
		   $cr_bmtj=$row["z_bmtj"];//报名条件
		   $cr_bmtel=$row["z_tel"];//报名电话
		   $xl_banner=$row["z_banner"];//动画Banner//学历块下面动画调用参数名是一样的。
		   $cr_onegg=$row["z_onegg"];//首页中间广告图
		   $cr_gglink=$row["z_gglink"];//广告链接
		   
		   $cr_right1=$row["z_right1"];
		   $cr_right1_link=$row["z_right1_link"];
		   $cr_right2=$row["z_right2"];
		   $cr_right2_link=$row["z_right2_link"];
		   $cr_right3=$row["z_right3"];
		   $cr_right3_link=$row["z_right3_link"];
		   }
		   mysql_free_result($rs);//释放系统资源
?>