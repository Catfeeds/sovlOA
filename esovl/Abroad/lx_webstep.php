 <?php
        $sql="select * from web_step where z_id=12";//注意ID代表的版块
        $rs=mysql_query($sql);
        
		if (mysql_num_rows($rs)>=1){	
		   $row=mysql_fetch_assoc($rs);	
		   $lx_zname=$row["z_name"];//版块名称
		   $lx_title=$row["z_title"];// 网站标题
		   $lx_keyword=$row["z_keyword"];// 网站优化关键词
		   $lx_contant=$row["z_contant"];// 网站优化描述
		   $lx_logo=$row["z_logo"];// 网站LOGO 
           $lx_banner=$row["z_banner"];//网站banner动画
		   $lx_bmtj=$row["z_bmtj"];//报名条件
		   $lx_bmtel=$row["z_tel"];//报名电话
		   $lx_banner=$row["z_banner"];//动画Banner
		   
		   $lx_qq=$row["z_qq"];// 网站QQ	
		   $lx_qq=explode(",",$lx_qq); //分割QQ
		   $qcount=count($lx_qq);

//判断QQ号的数量，循环输出
//for ($i=0;$i<=$qcount-1;$i++){
//	echo "<BR>".$lx_qq[$i];
//	}

		   $lx_onegg=$row["z_onegg"];//首页中间广告图
		   $lx_right1=$row["z_right1"];//首页中间广告图
		   $lx_right2=$row["z_right2"];//新闻详情报名流程图
		   $lx_right3=$row["z_right3"];//首页中间广告图
		   $lx_right4=$row["z_right4"];//首页中间广告图
		   
		   
		   $lx_pic1=$row["z_pic1"];//培训幻灯链接
		   $lx_link1=$row["z_link1"];//培训幻灯链接
		   $lx_pic2=$row["z_pic2"];//培训幻灯链接
		   $lx_link2=$row["z_link2"];//培训幻灯链接
		   $lx_pic3=$row["z_pic3"];//培训幻灯链接
		   $lx_link3=$row["z_link3"];//培训幻灯链接
		   $lx_pic4=$row["z_pic4"];//培训幻灯链接
		   $lx_link4=$row["z_link4"];//培训幻灯链接
		   $lx_pic5=$row["z_pic5"];//培训幻灯链接
		   $lx_link5=$row["z_link5"];//培训幻灯链接
		   $lx_pic6=$row["z_pic6"];//培训幻灯链接
		   $lx_link6=$row["z_link6"];//培训幻灯链接
		   }
		   mysql_free_result($rs);//释放系统资源
		  
?>