/* 导航栏 */
function g(o){return document.getElementById(o);}
function navHoverLi(n){
for(var i=1;i<=3;i++){g('nav_tb_'+i).className='nav_normaltab';g('nav_tbc_0'+i).className='nav_undis';}g('nav_tbc_0'+n).className='nav_dis';g('nav_tb_'+n).className='nav_hovertab';
}
function navnoHoverLi(){
for(var i=1;i<=3;i++){
g('nav_tb_'+i).className='nav_normaltab';
}
}

function pxXMLHttp(){//登陆判断 
	
if(document.logform.user.value=="")
{
document.getElementById("luser").innerHTML="<font color=red>&times;</font>";
document.logform.user.focus();
return false;
}else{
	document.getElementById("luser").innerHTML="<font color=green><b>√</b></font>";
	}
	
if(document.logform.pass.value=="")
{
document.getElementById("lpass").innerHTML="<font color=red>&times;</font>";
document.logform.pass.focus();
return false;
}else{document.getElementById("lpass").innerHTML="<font color=green><b>√</b></font>";
}
	
}

//培训在线问答
function px_zxwd(){
if(document.pxwdform.px_ask.value=="")
{
alert('请填写您的问题');
document.pxwdform.px_ask.focus();
return false;
}

}