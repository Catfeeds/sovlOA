 <?php
        $sql="select * from web_step where z_id=3";
        $rs=mysql_query($sql);
        
		if (mysql_num_rows($rs)>=1){	
		   $row=mysql_fetch_assoc($rs);		  
		   $wl_title=$row["z_title"];// 网站标题
		   $wl_keyword=$row["z_keyword"];// 网站优化关键词
		   $wl_contant=$row["z_contant"];// 网站优化描述
         
		   $wl_bmtj=$row["z_bmtj"];//报名条件
		   $wl_bmtel=$row["z_tel"];//报名电话
		   $xl_banner=$row["z_banner"];//动画Banner//学历块下面动画调用参数名是一样的。
		   $wl_onegg=$row["z_onegg"];//首页中间广告图
		   $wl_gglink=$row["z_gglink"];//广告链接		   
		   
		   }
		   mysql_free_result($rs);//释放系统资源		   

?>