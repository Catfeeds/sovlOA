<?php 
include_once("web_start.php");
if($user=Userlogin()){
	echo "<script>location.href='/Vip/vip_index.php';</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员注册-<?php echo $z_name;?></title>
<link href="/css/css.css" rel="stylesheet" type="text/css" />
<link href="/css/top.css" rel="stylesheet" type="text/css" />
<link href="/css/main.css" rel="stylesheet" type="text/css" />
<link href="/css/bottom.css" rel="stylesheet" type="text/css" />
<script src="/js/area.js"></script>
<script src="/js/hyHttp.js"></script>
<script src="/js/style.js"></script>

</head>
<?php 
if (isset($_POST["v_name"])){
	include_once './config.inc.php';
	include_once './uc_client/client.php';
	$check_register=uc_user_register($_POST["v_name"],$_POST["v_pass"],$_POST["v_email"]);
	if($check_register>0){
		// include_once("dbconfig.php");
		// include_once("Mysql.class.php");
		// $dblink=mysql::getInstance($config);
		$post=$_POST;
		$post['v_ucid']=$check_register;
		$post['v_pass']=md5($post['v_pass']);
		$post['v_date']=date("Y-m-d",time());
		unset($post["newlocation"]);
		unset($post["v_dpass"]);
		unset($post["x"]);
		unset($post["y"]);
		$num=$dblink->insert("vip",$post);
		if (!$num){  
			uc_user_delete($check_register);
			echo "<script>alert('注册失败');window.location.href=window.location.href</script>";
		}else{
			echo uc_user_synlogin($check_register);
		?>
		<script src="js/jquery.js"></script>
		<script>
			$.ajax({
					type: 'POST',
					url: '/bbs/member.php?mod=logging&action=login&loginsubmit=yes&infloat=yes&lssubmit=yes',
					data: {'fastloginfield':"username",'username':"<?=$_POST["v_name"]?>","password":'<?=$_POST["v_pass"]?>',"quickforward":"yes","handlekey":"yes"},
					async:false,
					success:function(msg){
					if(msg){
						alert('注册成功');
						window.location.href='vip_zcwc.php';
					}
				  }
				});
			
		</script>
		
		<?php 
			//echo "<script>alert('注册成功');</script>";
			/*setcookie("vipname",$_POST["v_name"],time()+3600,"/");
			setcookie("viptel",$_POST["v_tel"],time()+3600,"/");
			setcookie("vipemail",$_POST["v_email"],time()+3600,"/");
			Header("Location:vip_zcwc.php");*/
		}
	}else{
		echo "<script>alert('该用户已被注册');window.location.href='vip_zc.php'</script>";
	}
	
}
?>
<body onload="init();">
<div class="wrapper">
<!-- top -->
<div class="top">
<?php 
include("top/top_1.html");
include("top/hy_top1.html");
?> 
</div>
<!-- top End -->
<!-- main -->

<div class="main">
    <div class="main_vip">
      <div class="main_vip_yhzc">
        	<div class="main_vip_yhzc_top"><span>用户注册</span></div>
          <div class="main_vip_yhzc_center">
		  <form name="creator" method="post" id="creator" onsubmit="return zcXMLHttp()" action="">
          	<div class="main_vip_yhzc_center_box">
            	<div class="main_vip_yhzc_center_box01">
            	  <dl>
            	    <dt>用户名</dt>
            	    <dd>
            	      <input type="text" name="v_name" style="ime-mode:disabled" onkeydown="if(event.keyCode==32) return false" maxlength="20" onblur="userXMLHttp(this.value)"/>
            	      <span id="vname">用户名应该输入4-20个英文字母或数字</span></dd>
          	    </dl>
            	  <dl><dt>登录密码</dt><dd><input name="v_pass" type="password" onkeydown="if(event.keyCode==32) return false" style="ime-mode:disabled" maxlength="20"/><span id="vpass">密码应该输入4-20个英文字母、数字或特殊字符</span></dd></dl>
                    <dl><dt>重复密码</dt><dd><input name="v_dpass" type="password" /><span id="vdpass">请重复输入密码</span></dd></dl>
                    <dl>
                    <dt>所在地</dt>
                    <dd>
<select name="province" onChange = "select()"></select> 　<select name="city" onChange = "select()"></select><input type="hidden" name="newlocation"><span id="shenshi"></span>
                    </dd>
                    </dl>
					<dl><dt>手机/电话</dt><dd><input name="v_tel" type="text" maxlength="20" onkeydown="if(event.keyCode==32) return false" style="ime-mode:disabled"/><span id="vtel">电话和手机至少输入一项</span></dd></dl>
                    <dl><dt>电子邮箱</dt><dd><input name="v_email" type="text" onblur="emailXMLHttp(this.value)"/>
						<span id="vemail">用于寄发相关的材料,找回密码的接收邮箱</span></dd>
					</dl>
                   
                </div>
                <div class="main_vip_yhzc_center_box02">
                	<h1><img src="images/zy.jpg" />若点击提交注册按钮，即表示您已同意一休教育网服务条款</h1>
                  <div class="main_vip_yhzc_center_box02_text">
                      <textarea name="" cols="" rows="">一、服务条款的确认和接纳
    用户必须完全同意以下所有服务条款才能成为一休教育网的正式用户。
二、用户的权利和义务
　　1、所有用户必须遵循：s
　　- 遵守所有使用网络服务的网络协议、规定、程序和惯例；
　　- 不得使用本网站从事违法活动；
　　- 不得干扰或侵犯本网站的正常运行和其他用户的正常使用；
　　- 从中国境内向境外传输技术性资料时不得违反中国有关法律、法规。
　　2、同时用户承诺：
　　- 不得传输任何非法的、骚扰性的、中伤他人的、辱骂性的、恐吓性的、伤害性的、庸俗的、淫秽的信息
　　资料；
　　- 不得传输任何教唆他人进行违法犯罪行为的资料；
　　- 不得传输不利于国内团结和社会安定的资料；
　　- 不得传输任何不符合国家法律、法规规定的资料、信息；
　　- 不得未经许可而非法进入其它个人或组织电脑系统；
　　- 法律规定的其他义务。
　  如果用户的行为违背上述条款规定，一休教育网可以做出独立判断并有权立即取消用户资格。用户应对自
　  己在网上的违法行为承担全部法律责任。
　　3、基于网络服务的特殊性，用户同意：
　　- 在注册时按照注册提示提供准确用户名和密码以及详尽的个人资料；
　　- 在个人的注册信息发生变化时，用户应及时更新自己的注册信息，保证其个人资料的详尽和准确。所有
　　用户输入的个人信息将被视作准确表明了用户的身份，并作为本网站提供所有服务的有效身份依据。
　　- 用户自行配备上网的所需设备，包括个人电脑、调制解调器、宽带或其他必备上网装置；
　　- 用户应自行负担因使用这种接入方式而产生的上网电话费、上网信息费及教育信息费。
　　4、用户的用户名、密码 
　　- 用户一旦注册成功，成为一休教育网的正式用户后，应当对自己的用户名（亦称账号）、密码的安全性
　　负全部责任。用户的密码只能由用户自己掌握。
　　- 对于用户因账号或密码泄露造成的各种损失，一休教育网不承担任何责任。用户发现任何非法使用用户
　　账号的情况，应立即通知一休教育网
　　- 用户应对以其用户名进行的所有活动和事件负责。
三、一休教育网的权利和义务
　　1、一休教育网应本着诚实信用的原则向用户提供远程教育服务，不得随意中断或停止提供该项服务，但如
　　因系统维护或升级而需暂停服务时，将事先公告。若因硬件故障或其它不可抗力而导致暂停服务，于暂停
　　服务期间造成的一切不便与损失，一休教育网不负任何责任。
　　2、本网站内以任何形式表现的作品（包括但不限于文字、软件、声音、图片、录像、表格、电子邮件等）
　　的著作权，由作品的著作权人和一休教育网共同享有，用户未经许可，不得擅自对本网站的包括电子课件
　　在内的任何作品进行任何形式的翻录、复制或从事其他任何违反著作权法等相关法律、法规的活动。对侵
　　犯本网站知识产权的个人和组织，一休教育网和作品的著作权人将依法追究其民事或刑事责任。
　　3、本网站享有对用户网上活动的监督和指导权，对凡是从事网上非法活动的用户，有权终止所有服务。
　　4、本网站对用户在网上发表的供学习交流的作品，享有独家的出版、发行和复制的权利。
　　5、用户通过本网站触犯中华人民共和国法律的，一切后果自己负责，本网站不承担任何责任
四、保密责任
　　本网站将严格履行用户个人隐私保密义务，承诺不公开、编辑或透露用户个人信息，但以下情况除外：
　　- 用户授权一休教育网透露这些信息；
　　- 相应的法律及法律程序要求一休教育网提供用户的个人资料；
　　- 在紧急情况下，竭力维护用户个人、其他社会个体和社会大众的安全需要。
五、担保责任
　　一休教育网不担保其服务一定能够满足用户的要求，也不担保其服务不会因各种客观原因中断。教育人生
　　网拒绝提供担保，由用户自己承担系统受损或资料丢失的风险和责任。 
六、服务条款的修改和完善
　　1、一休教育网将根据互连网的发展和法律、法规的变化，在认为必要时可以单方面修改服务条款。
　　2、本服务条款一旦发生变动，将会在重要页面上提示修改内容。如果不同意所改动的内容， 用户可以主
　　动放弃获得的网络服务。如果用户继续享用网络服务，则视为接受服务条款的变动。当发生争执时，应以
　　最新服务条款的内容为准。
七、法律
　　本服务条款根据现行中华人民共和国法律法规制定。如发生一休教育网服务条款与中华人民共和国法律相
　　抵触时，则这些条款将完全按法律规定重新解释，本服务条款的其它条款仍对一休教育网和用户具有法律
　　约束力。 
八、在条款规定范围内，一休教育网拥有最终解释权。
九、本规则自公布之日施行。</textarea>
			    </div>
<div class="main_vip_yhzc_center_box02_anniu"><a href="#"><input type="image" src="images/vip_tjzc.jpg" onclick="userXMLHttp(this.value)"/></a></div>

                </div>
            </div>
			</form>
          </div>
            <div class="main_vip_yhzc_bottom"><img src="images/vip_bottom00bg.jpg" /></div>
      </div>
    </div>
</div> 
<!-- main End -->
<!-- bottom -->
<?php include("bottom/bottom.html");?>
<!-- bottom End -->
</div>
</body>
</html>