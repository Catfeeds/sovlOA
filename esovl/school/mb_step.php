<?php 
if(isset($_GET["sid"])){	
	
	//$sql="select * from mb_step where mb_id=".$_SESSION["ssid"];
			mysql_query("update mb_step set mb_bj=0");//把当前状态都变成非活动
			mysql_query("update mb_step set mb_bj=1 where mb_id=".$_GET["sid"]);			
	}
	
		$sql="select * from mb_step where mb_bj=1";
			$rs=mysql_query($sql);
			if (mysql_num_rows($rs)>=1){
			$row=mysql_fetch_array($rs,MYSQL_ASSOC);
		   $_SESSION["s_name"]=$row["s_name"];// 模板学校名称
		   $mb_zszy=$row["mb_zszy"];
		   $mb_lxwm=$row["mb_lxwm"];
		   $mb_zxns=$row["mb_zxns"];	
		   $mb_kfzx=$row["mb_kfzx"];
		   $mb_zxns=$row["mb_zxns"];
		   $mb_mzsm=$row["mb_mzsm"];
		   $mb_ggfw=$row["mb_ggfw"];
			}
//
$sq9="select * from school where s_name='".$row["s_name"]."'";
$rs9=mysql_query($sq9);
$row9=mysql_fetch_assoc($rs9);
	//		$mb_logo=$row["mb_logo"];// 模板学校logo
		   $mb_banner=$row["mb_banner"];// 模板学校banner
		   $mb_tel=$row["mb_tel"];// 模板学校电话
		   $mb_kftime=$row["mb_kftime"];// 模板客服时间
		   $mb_adderss=$row["mb_adderss"];// 模板学校地址
		   $mb_pic1=$row["mb_pic1"];// 模板图一
		   $mb_pic2=$row["mb_pic2"];// 模板图二
		   $mb_pic3=$row["mb_pic3"];// 模板图三
		   $mb_pic4=$row["mb_pic4"];// 模板图四
		   $mb_bmxz=$row9["s_bmxz"];
		   $mb_xyjs=$row9["s_xyjs"];
		  // mysql_free_result($rs);//释放系统资源

//提时间分成几小时前，几分钟前
function time_tran($the_time){
   $now_time = date("Y-m-d H:i:s",time()); 
   $now_time = strtotime($now_time);
   $show_time = strtotime($the_time);
   $dur = $now_time - $show_time;
   if($dur < 0){
    return $the_time; 
   }else{
    if($dur < 60){
     return $dur.'秒前'; 
    }else{
     if($dur < 3600){
      return floor($dur/60).'分钟前'; 
     }else{
      if($dur < 86400){
       return floor($dur/3600).'小时前'; 
      }else{
       if($dur < 259200){//3天内
        return floor($dur/86400).'天前';
       }else{
	   $abc=explode(" ",$the_time);
        return $abc[0]; 
       }
      }
     }
    }
   }
}
?>