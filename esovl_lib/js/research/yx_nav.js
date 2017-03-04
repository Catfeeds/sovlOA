/* png IE6透明 */
var tt="";
var ss="";
function myopen(mm,nn){	   
	if(ss==""){		
	    document.getElementById("yx03").className="";
	}else{		
		document.getElementById(ss).className="";
	}
		// document.getElementById(mm).className="yx_bg";
		ss=mm;
	if(tt==""){		
	    document.getElementById("yxnav03").style.display="none";
	}else{		
		document.getElementById(tt).style.display="none";
	}
		document.getElementById(nn).style.display="block";	
		tt=nn;
}
function newsset(){
		if(document.bmform.wd_name.value=="")
{
document.getElementById("wdname").innerHTML="<font color=red>&times;请填写您的姓名或者昵称!</font>";
document.bmform.wd_name.focus();
return false;
}else{
	document.getElementById("wdname").innerHTML="<font color=green><b>√</b></font>";
	}	
	if(document.bmform.wd_wenti.value=="")
{
document.getElementById("wdwenti").innerHTML="<font color=red>&times;内容不能为空!</font>";
document.bmform.wd_wenti.focus();
return false;
}else{
	document.getElementById("wdwenti").innerHTML="<font color=green><b>√</b></font>";
	}
}

function wsbm133(){
	if(document.bmform.user_name.value==""){
document.getElementById("username").innerHTML="<font color=red>&times;请填写您的姓名!</font>";
document.bmform.user_name.focus();
return false;
}else{
	document.getElementById("username").innerHTML="<font color=green><b>√</b></font>";
	}
	
		if(document.bmform.user_tel.value==""){
document.getElementById("usertel").innerHTML="<font color=red>&times;请填写电话或者手机号!</font>";
document.bmform.user_tel.focus();
return false;
}else{
	document.getElementById("usertel").innerHTML="<font color=green><b>√</b></font>";
	}
}