 <?php
        $sql="select * from web_step where z_id=11";
        $rs=mysql_query($sql);
        
		if (mysql_num_rows($rs)>=1){	
		   $row=mysql_fetch_assoc($rs);	
		   $px_zname=$row["z_name"];//版块名称
		   $px_title=$row["z_title"];// 网站标题
		   $px_keyword=$row["z_keyword"];// 网站优化关键词
		   $px_contant=$row["z_contant"];// 网站优化描述
		   $px_logo=$row["z_logo"];// 网站LOGO 
           $px_banner=$row["z_banner"];//网站banner动画
		   $px_bmtj=$row["z_bmtj"];//报名条件
		   $px_bmtel=$row["z_tel"];//报名电话
		   $px_banner=$row["z_banner"];//动画Banner
		   
		   $z_qq=$row["z_qq"];// 网站QQ	
		   //$z_qq=explode(",",$z_qq); //分割QQ
//		   $qq1=$z_qq[0];
//		   $qq2=$z_qq[1];

		   $px_onegg=$row["z_onegg"];//首页中间广告图
		   $z_right1=$row["z_right1"];//首页中间广告图
		   $z_right2=$row["z_right2"];//首页中间广告图
		   $z_right3=$row["z_right3"];//首页中间广告图
		   $z_right4=$row["z_right4"];//首页中间广告图
		   $z_pic1=$row["z_pic1"];//培训幻灯链接
		   $z_link1=$row["z_link1"];//培训幻灯链接
		   $z_pic2=$row["z_pic2"];//培训幻灯链接
		   $z_link2=$row["z_link2"];//培训幻灯链接
		   $z_pic3=$row["z_pic3"];//培训幻灯链接
		   $z_link3=$row["z_link3"];//培训幻灯链接
		   $z_pic4=$row["z_pic4"];//培训幻灯链接
		   $z_link4=$row["z_link4"];//培训幻灯链接
		   $z_pic5=$row["z_pic5"];//培训幻灯链接
		   $z_link5=$row["z_link5"];//培训幻灯链接
		   $z_pic6=$row["z_pic6"];//培训幻灯链接
		   $z_link6=$row["z_link6"];//培训幻灯链接
		   }
		   mysql_free_result($rs);//释放系统资源
		   
?>