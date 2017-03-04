 <?php
        $sql="select * from web_step where z_id=2";
        $rs=mysql_query($sql);
        
		if (mysql_num_rows($rs)>=1){	
		   $row=mysql_fetch_assoc($rs);		  
		   $zx_title=$row["z_title"];// 网站标题
		   $zx_keyword=$row["z_keyword"];// 网站优化关键词
		   $zx_contant=$row["z_contant"];// 网站优化描述
         
		   $zx_bmtj=$row["z_bmtj"];//报名条件
		   $zx_bmtel=$row["z_tel"];//报名电话
		   $xl_banner=$row["z_banner"];//动画Banner//每个页调用的参数是一个，所以命名一样的。
		   $zx_onegg=$row["z_onegg"];//首页中间广告图
		   $zx_gglink=$row["z_gglink"];//广告链接
		   
		   $z_right1=$row["z_right1"];
		   $z_right1_link=$row["z_right1_link"];
		   $z_right2=$row["z_right2"];
		   $z_right2_link=$row["z_right2_link"];
		   $z_right3=$row["z_right3"];
		   $z_right3_link=$row["z_right3_link"];
		   }
		   mysql_free_result($rs);//释放系统资源
		   

//自学考试那块，问答咨询需要提取的学校
 $rs_1=mysql_query("select s_id from kkinfo where bk_id=1",$conn); 
		   $t=0;
		   $snum=mysql_num_rows($rs_1);
		   
		   while ($row_1=mysql_fetch_array($rs_1,MYSQL_ASSOC)){
		   $t=$t+1;
		
		 if($t==$snum){$sid=$row_1["s_id"];}else{$sid=$row_1["s_id"].",";}
		   }
		   
		         $rs_2=mysql_query("select s_name from school where s_id in(".$sid.")",$conn); 
				 $j=0;
				 $jnum=mysql_num_rows($rs_2);
				 
				 while ($row_2=mysql_fetch_array($rs_2,MYSQL_ASSOC)){
				 $j=$j+1;
			  
			   if($j==$jnum){$sname="'".$row_2["s_name"]."'";}else{$sname="'".$row_2["s_name"]."',";}
				 }
?>