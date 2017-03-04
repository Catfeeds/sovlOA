<?php
include("../../web_start.php");
include("px_step.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线报名</title>
<link href="css/px_school.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
function pxbm(){//xl-zhaosheng school

 if(document.pxbmform.pxbm_cl.value==0){
	alert('请选择课程分类!');
	document.pxbmform.pxbm_cl.focus();
	return false;
	}
	
  if(document.pxbmform.pxbm_name.value==""){
	alert('请填写您的姓名!');
	document.pxbmform.pxbm_name.focus();
	return false;
	}

  if(document.pxbmform.pxbm_tel.value==""){
	alert('请填您的联系电话!');
	document.pxbmform.pxbm_tel.focus();
	return false;
	}
			  
}
</script>
<?php
  if (isset($_POST["pxbm_name"])){
      $sql="insert into pxbm set pxbm_cl='".$_POST["pxbm_cl"]."',pxbm_name='".$_POST["pxbm_name"]."',pxbm_con='".$_POST["pxbm_con"]."',pxbm_tel='".$_POST["pxbm_tel"]."',pxbm_email='".$_POST["pxbm_email"]."',pxbm_qq='".$_POST["pxbm_qq"]."',pxbm_adder='".$_POST["pxbm_adder"]."',pxs_name='".$_SESSION["pxs_name"]."',pxbm_date=now()";
	
	  $rs=$dblink->query($sql);
	  if ($rs){
      echo"<script>alert('报名信息已提交，我们将尽快给您回复！');location.href='baoming.php';</script>";
	  }else{
	  
	  exit("添加失败! 错误信息为:".mysql_error());
	  }
  }?>
<body>
<div class="wrapper"> 
  <!-- top -->
  <?php include('top.html');?>
  <!-- top emd  --> 
  
  <!-- mian  -->
  <?php include('left.html');?>
  <div class="school_mian_right">
    <div class="achool_jianjie_nr">
    	<div class="school_jianjie_bt">在线报名</div>
        <form  name="pxbmform" onsubmit="return pxbm()" action="" method="post">
        <div class="school_jianjie_kuang">
        	<div style="clear:both; height:12px;"></div>
          <div class="school_liuyan_fl"><span>课程分类：</span>
          <select name="pxbm_cl">
          <option value="0">请选择课程分类</option>
           <?php
			$res = $dblink->findAll('pxbclass','','');
			foreach($res as $row){?>
          <option value="<?=$row["pb_title"]?>"><?=$row["pb_title"]?></option>
          <?php }?> 
          </select>
            <font color=red>*</font></div>
          <div class="school_liuyan_fl"><span>姓　　名：</span><input name="pxbm_name" type="text" />
          <font color=red>*</font></div>           
            <div class="school_liuyan_fl"><span>电　　话：</span><input name="pxbm_tel" type="text" />
            <font color=red>*</font></div>
            <div class="school_liuyan_fl"><span>邮件/MSN：</span><input name="pxbm_email" type="text" /></div>
            <div class="school_liuyan_fl"><span>Q　　Q：</span><input name="pxbm_qq" type="text" /></div>
            <div class="school_liuyan_fl"><span>联系地址：</span><input name="pxbm_adder" type="text" size="40" /></div>
            <div class="school_liuyan_fl"><span>咨询内容：</span><textarea cols="40" rows="5" name="pxbm_con"></textarea></div>
            <div class="school_liuyan_anniu"><input name="sub" type="submit" value="提交信息"/></div>
        </div>
        </form>
    </div>
  </div>
  <!-- mian emd --> 
  <!-- bottom -->
  <?php include('bottom.html');?>
  <!-- bottom End --> 
</div>
</body>
</html>
