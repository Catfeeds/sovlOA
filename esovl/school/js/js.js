/* 去掉超链接的虚线 */
window.onload=function() 
{ 
for(var ii=0; ii<document.links.length; ii++) 
document.links[ii].onfocus=function(){this.blur()} 
} 

function fHideFocus(tName){ 
aTag=document.getElementsByTagName(tName); 
for(i=0;i<aTag.length;i++)aTag[i].hideFocus=true; 
//for(i=0;i<aTag.length;i++)aTag[i].onfocus=function(){this.blur();}; 
} 

//学校模板在线问答
function mb_zxwd(){
	
if(document.wdform.wd_nc.value=="")
{
alert('请填写昵称');
document.wdform.wd_nc.focus();
return false;
}
if(document.wdform.wd_ask.value=="")
{
alert('请填写您的问题');
document.wdform.wd_ask.focus();
return false;
}

}

//网上报名判断
function wsbm(){
	if(document.bmform.bm_xxname.value=="")
{
document.getElementById("bmxxname").innerHTML="<font color=red>&times;请填写学校名称!</font>";
document.bmform.bm_xxname.focus();
return false;
}else{
	document.getElementById("bmxxname").innerHTML="<font color=green><b>√</b></font>";
	}



if(document.bmform.bm_zyclass.value==0)
{
document.getElementById("bmzyclass").innerHTML="<font color=red>&times;请选择专业类别!</font>";
document.bmform.bm_zyclass.focus();
return false;
}else{
	document.getElementById("bmzyclass").innerHTML="<font color=green><b>√</b></font>";
	}
	
	
if(document.bmform.bm_zycaption.value==0)
{
document.getElementById("bmzycaption").innerHTML="<font color=red>&times;请选择专业名称!</font>";
document.bmform.bm_zycaption.focus();
return false;
}else{
	document.getElementById("bmzycaption").innerHTML="<font color=green><b>√</b></font>";
	}
	
if(document.bmform.bm_name.value=="")
{
document.getElementById("bmname").innerHTML="<font color=red>&times;请填写您的姓名!</font>";
document.bmform.bm_name.focus();
return false;
}

if(document.bmform.bm_name.value.length<2)
{
document.getElementById("bmname").innerHTML="<font color=red>&times;请填写完整的姓名!</font>";
document.bmform.bm_name.focus();
return false;
}else{
	document.getElementById("bmname").innerHTML="<font color=green><b>√</b></font>";
	}

if(document.bmform.bm_tel.value=="")
{
document.getElementById("bmtel").innerHTML="<font color=red>&times;请填写联系电话!</font>";
document.bmform.bm_tel.focus();
return false;
}
if(document.bmform.bm_tel.value.length>16||document.bmform.bm_tel.value.length<10)
{
document.getElementById("bmtel").innerHTML="<font color=red>&times;电话号码有误!</font>";
document.bmform.bm_tel.focus();
return false;
}else{
	document.getElementById("bmtel").innerHTML="<font color=green><b>√</b></font>";
	}

if(document.bmform.bm_sfz.value=="")
{
document.getElementById("bmsfz").innerHTML="<font color=red>&times;请填写身分证号!</font>";
document.bmform.bm_sfz.focus();
return false;
}


   if(checkIdcard(document.bmform.bm_sfz.value)!="验证通过!"){
    alert(checkIdcard(document.bmform.bm_sfz.value));
	document.getElementById("bmsfz").innerHTML="<font color=red>&times;身分证号输入有误!</font>";
	document.bmform.bm_sfz.focus();
    return false;
 }else{
document.getElementById("bmsfz").innerHTML="<font color=green><b>√</b></font>";
}

if(document.bmform.bm_address.value=="")
{
document.getElementById("bmaddress").innerHTML="<font color=red>&times;请填写通迅地址!</font>";
document.bmform.bm_address.focus();
return false;
}else{
document.getElementById("bmaddress").innerHTML="<font color=green><b>√</b></font>";
}

if(document.bmform.bm_email.value=="")
{
document.getElementById("bmemail").innerHTML="<font color=red>&times;请填写电子邮件!</font>";
document.bmform.bm_email.focus();
return false;
}

 if(!/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(document.bmform.bm_email.value)){
		document.getElementById("bmemail").innerHTML="<font color=red>&times;邮箱格式不正确!</font>";
		document.bmform.bm_email.focus();
		return false;
		}else{
document.getElementById("bmemail").innerHTML="<font color=green><b>√</b></font>";
}

}

function checkIdcard(idcard){
var Errors=new Array(
"验证通过!",
"身份证号码位数不对!",
"身份证号码出生日期超出范围或含有非法字符!",
"身份证号码校验错误!",
"身份证地区非法!"
);
var area={11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古",21:"辽宁",22:"吉林",23:"黑龙江",31:"上海",32:"江苏",33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南",42:"湖北",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆",51:"四川",52:"贵州",53:"云南",54:"西藏",61:"陕西",62:"甘肃",63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外"}
var retflag=false;
var idcard,Y,JYM;
var S,M;
var idcard_array = new Array();
idcard_array = idcard.split("");
//地区检验
if(area[parseInt(idcard.substr(0,2))]==null)
 return Errors[4];
//身份号码位数及格式检验
switch(idcard.length){
case 15:
 if ( (parseInt(idcard.substr(6,2))+1900) % 4 == 0 || ((parseInt(idcard.substr(6,2))+1900) % 100 == 0 && (parseInt(idcard.substr(6,2))+1900) % 4 == 0 )){
  ereg=/^[1-9][0-9]{5}[0-9]{2}((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|[1-2][0-9]))[0-9]{3}$/;
  //测试出生日期的合法性
 } else {
  ereg=/^[1-9][0-9]{5}[0-9]{2}((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|1[0-9]|2[0-8]))[0-9]{3}$/;
  //测试出生日期的合法性
 }
 if(ereg.test(idcard)){
  return Errors[0];
 }
 else 
 {
  return Errors[2];
 }
 break;
case 18:
//18位身份号码检测
//出生日期的合法性检查 
//闰年月日:((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|[1-2][0-9]))
//平年月日:((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|1[0-9]|2[0-8]))
if ( parseInt(idcard.substr(6,4)) % 4 == 0 || (parseInt(idcard.substr(6,4)) % 100 == 0 && parseInt(idcard.substr(6,4))%4 == 0 )){
 ereg=/^[1-9][0-9]{5}19[0-9]{2}((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|[1-2][0-9]))[0-9]{3}[0-9Xx]$/;
 //闰年出生日期的合法性正则表达式
} else {
 ereg=/^[1-9][0-9]{5}19[0-9]{2}((01|03|05|07|08|10|12)(0[1-9]|[1-2][0-9]|3[0-1])|(04|06|09|11)(0[1-9]|[1-2][0-9]|30)|02(0[1-9]|1[0-9]|2[0-8]))[0-9]{3}[0-9Xx]$/;
 //平年出生日期的合法性正则表达式
}
if(ereg.test(idcard)){//测试出生日期的合法性//计算校验位
S = (parseInt(idcard_array[0]) + parseInt(idcard_array[10])) * 7
+ (parseInt(idcard_array[1]) + parseInt(idcard_array[11])) * 9
+ (parseInt(idcard_array[2]) + parseInt(idcard_array[12])) * 10
+ (parseInt(idcard_array[3]) + parseInt(idcard_array[13])) * 5
+ (parseInt(idcard_array[4]) + parseInt(idcard_array[14])) * 8
+ (parseInt(idcard_array[5]) + parseInt(idcard_array[15])) * 4
+ (parseInt(idcard_array[6]) + parseInt(idcard_array[16])) * 2
+ parseInt(idcard_array[7]) * 1 
+ parseInt(idcard_array[8]) * 6
+ parseInt(idcard_array[9]) * 3 ;
Y = S % 11;
M = "F";
JYM = "10X98765432";
M = JYM.substr(Y,1);//判断校验位
if(M == idcard_array[17]) return Errors[0]; //检测ID的校验位
else return Errors[3];
}
else return Errors[2];
break;
default:
return Errors[1];
break;
}
}