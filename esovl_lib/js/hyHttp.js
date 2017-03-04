<!--

var xmlHttp;
function createXMLHTTP(){
    if(window.ActiveXObject){
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    else if(window.XMLHttpRequest){
		xmlHttp = new XMLHttpRequest();
    }
}


function zcXMLHttp(){

	if(document.creator.v_name.value=="")
{
//document.getElementById("vname").style.margin='2px';
document.getElementById("vname").innerHTML="<font color=red>&times;请填写用户名!</font>";
document.creator.v_name.focus();
return false;
}
if(document.creator.v_name.value.length<4)
{
//document.getElementById("vname").style.margin='2px';
document.getElementById("vname").innerHTML="<font color=red>&times;用户名太短!</font>";
document.creator.v_name.focus();
return false;
}else{
	document.getElementById("vname").innerHTML="<font color=green><b>√</b></font>";
	}
	
if(document.creator.v_pass.value=="")
{
document.getElementById("vpass").innerHTML="<font color=red>&times;请填写密码!</font>";
document.creator.v_pass.focus();
return false;
}
if(document.creator.v_pass.value.length<4)
{
document.getElementById("vpass").innerHTML="<font color=red>&times;密码太短!</font>";
document.creator.v_pass.focus();
return false;
}else{
	document.getElementById("vpass").innerHTML="<font color=green><b>√</b></font>";
	}

if(document.creator.v_dpass.value=="")
{
document.getElementById("vdpass").innerHTML="<font color=red>&times;请重输密码!</font>";
document.creator.v_dpass.focus();
return false;
}else{
document.getElementById("vdpass").innerHTML="<font color=green><b>√</b></font>";
}
	
	
if(document.creator.v_pass.value!=document.creator.v_dpass.value){		
document.getElementById("vdpass").innerHTML="<font color=red>&times;两次密码输入不符!</font>";
document.creator.v_dpass.focus();
return false;		
}


if(document.creator.province.value=="请选择省份名")
{
document.getElementById("shenshi").innerHTML="<font color=red>&times;请选择省分!</font>";
document.creator.province.focus();
return false;
}else{
document.getElementById("shenshi").innerHTML="<font color=green><b>√</b></font>";
}

if(document.creator.city.value=="请选择城市名"||document.creator.city.value=="")
{
document.getElementById("shenshi").innerHTML="<font color=red>&times;请选择城市!</font>";
document.creator.city.focus();
return false;
}else{
document.getElementById("shenshi").innerHTML="<font color=green><b>√</b></font>";
}	


if(document.creator.v_email.value=="")
{
document.getElementById("vemail").innerHTML="<font color=red>&times;请填写邮箱地址!</font>";
document.creator.v_email.focus();
return false;
}
        if(!/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(document.creator.v_email.value)){
		document.getElementById("vemail").innerHTML="<font color=red>&times;邮箱格式不正确!</font>";
		document.creator.v_email.focus();
		return false;
		}else{			
		document.getElementById("vemail").innerHTML="<font color=green><b>√</b></font>";
		document.creator.v_email.focus();
			}
	
}

function loXMLHttp(){
	
if(document.logform.user.value=="")
{
document.getElementById("luser").innerHTML="<font color=red>&times;请填写登陆账号!</font>";
document.logform.user.focus();
return false;
}else{
	document.getElementById("luser").innerHTML="<font color=green><b>√</b></font>";
	}
	
if(document.logform.pass.value=="")
{
document.getElementById("lpass").innerHTML="<font color=red>&times;请填写密码!</font>";
document.logform.pass.focus();
return false;
}else{document.getElementById("lpass").innerHTML="<font color=green><b>√</b></font>";
}
	
}

function userXMLHttp(value){
	
if(value=="")
{
document.getElementById("vname").innerHTML="<font color=red>&times;请填写用户名!</font>";
document.creator.v_name.focus();
return false;
}

createXMLHTTP();
xmlHttp.onreadystatechange =dodo;
xmlHttp.open("get","vip_pd.php?user="+value+"&num="+Math.random()+"&type=uname",true);
xmlHttp.send(null);
}

function dodo(){
if(xmlHttp.readyState==1){
	 document.getElementById("vname").style.display='block';
     document.getElementById("vname").innerHTML="数据接收中,请稍候....";
	}
   if(xmlHttp.readyState==4){
	   if(xmlHttp.status==200){
           if(xmlHttp.responseText==0){
			  document.getElementById("vname").innerHTML="<font color=green><b>√</b></font>";		       
		   }else{
			  document.getElementById("vname").innerHTML="<font color=red>对不起,此会员名已被注册,请更换!</font>";
			   document.creator.v_name.focus();
               return false;
			   }
		}
    }

}
//邮箱检测
function emailXMLHttp(value){
	
if(value=="")
{
document.getElementById("vemail").innerHTML="<font color=red>&times;请填写邮箱!</font>";
document.creator.v_email.focus();
return false;
}

createXMLHTTP();
xmlHttp.onreadystatechange =dodoemail;
xmlHttp.open("get","vip_pd.php?email="+value+"&num="+Math.random()+"&type=email",true);
xmlHttp.send(null);
}

function dodoemail(){
if(xmlHttp.readyState==1){
	 document.getElementById("vemail").style.display='block';
     document.getElementById("vemail").innerHTML="数据接收中,请稍候....";
	}
   if(xmlHttp.readyState==4){
	   if(xmlHttp.status==200){
           if(xmlHttp.responseText==0){
			  document.getElementById("vemail").innerHTML="<font color=green><b>√</b></font>";		       
		   }else{
			  document.getElementById("vemail").innerHTML="<font color=red>对不起,此邮箱已被注册,请更换!</font>";
			   document.creator.v_email.focus();
               return false;
			   }
		}
    }

}