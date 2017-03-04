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
	
}

