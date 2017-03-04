<?php
@header('Content-type: text/html; charset=utf-8');
       if (isset($_GET["pid"])){
		 
        $sql="select * from pxschool where pxs_id=".$_GET["pid"];
		}else{if(!isset($_SESSION["pid"])){ echo"<script>alert('页面超时！');location.href='../';</script>";}
		$sql="select * from pxschool where pxs_id=".$_SESSION["pid"];
		}

        //$rs=mysql_query($sql);
		$rs = $dblink->fetchOne($sql);
	//	echo $_GET["sid"];
     
		if (count($rs)<1){echo "<script>alert('参数错误，您访问了未推荐的学院！');window.opener=null; window.open('','_self');window.close();</script>";}
		
		if (count($rs)>=1){
			$row=$rs;
			$_SESSION["pid"]=$row["pxs_id"];
			$_SESSION["pxs_name"]=$row["pxs_name"];// 模板学校名称
			//
		   
			$sq9="select * from pxmb_step where pxs_name='".$row["pxs_name"]."'";
			$row9=$dblink->fetchOne($sq9);


		 if(!isset($row9["pxs_name"])){
		
		echo "<script>alert('暂无".$row["pxs_name"]."相关信息！');history.go(-1);</script>";}
		   $pxmb_banner=$row9["pxmb_banner"];// 模板学校banner
		   $pxmb_tel=$row9["pxmb_tel"];// 模板学校电话
		   $pxs_name=$row9["pxs_name"];// 模板学校名称
		   
		   $pxmb_email=$row9["pxmb_email"];// 学校邮箱
		   $pxmb_skdz=$row9["pxmb_skdz"];// 上课地址
		   $pxmb_adderss=$row9["pxmb_adderss"];// 报名地址
		   $pxmb_qq1=$row9["pxmb_qq1"];// QQ1
		   $pxmb_tname1=$row9["pxmb_tname1"];// 老师1
		   $pxmb_qq2=$row9["pxmb_qq2"];// QQ2
		   $pxmb_tname2=$row9["pxmb_tname2"];// 老师2
		   $pxmb_xxjs=$row9["pxmb_xxjs"];// 学校介绍
		   $pxmb_bmlc=$row9["pxmb_bmlc"];// 报名流程
		   $pxmb_jgfx=$row9["pxmb_jgfx"];// 学校机构
		   
		   $pxmb_adderss=$row9["pxmb_adderss"];// 模板学校地址
		   $pxmb_pic1=$row9["pxmb_pic1"];// 模板图一
		   $pxmb_pic2=$row9["pxmb_pic2"];// 模板图二
		   $pxmb_pic3=$row9["pxmb_pic3"];// 模板图三
		   $pxmb_pic4=$row9["pxmb_pic4"];// 模板图四
           $pxmb_pic5=$row9["pxmb_pic5"];// 模板图五
		   }
?>