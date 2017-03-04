<!--
//Ajax是建立在XMLHttp组件下的技术，本例详细语法参考压缩包内xmlhttp手册
var xmlHttp;
//建立XMLHTTP对象调用MS的ActiveXObject方法
//如果成功（IE浏览器）则使用MS ActiveX实例化创建一个XMLHTTP对象
//非IE则转用建立一个本地Javascript对象的XMLHttp对象 （此方法确保不同浏览器下对AJAX的支持）
function createXMLHttp(){
    if(window.ActiveXObject){
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    else if(window.XMLHttpRequest){
		xmlHttp = new XMLHttpRequest();
    }
}
//建立主过程
function loginXMLHttp(){
if(document.form1.a_user.value=="")
{
document.getElementById("lgcon").style.margin='2px';
document.getElementById("lgcon").innerHTML="<font color=red>&times;</font><font color=#d9ffa0>请填写用户名!</font>";
document.form1.a_user.focus();
return false;
}

if(document.form1.a_pass.value=="")
{
document.getElementById("lgcon").style.margin='24px 0px';
document.getElementById("lgcon").innerHTML="<font color=red>&times;</font><font color=#d9ffa0>请填写密码!</font>";
document.form1.a_pass.focus();
return false;
}
if(document.form1.code.value=="")
{
document.getElementById("lgcon").style.margin='44px 0px';
document.getElementById("lgcon").innerHTML="<font color=red>&times;</font><font color=#d9ffa0>请输入验证码!</font>";
document.form1.code.focus();
return false;
}
	
}
function webset(){
if(document.formset.z_name.value=="")
{
document.getElementById("wzmc").innerHTML="<font color=red>&times;请填写网站名称!</font>";
document.formset.z_name.focus();
return false;
}else{
    document.getElementById("wzmc").innerHTML="<font color=green><b>√</b></font>";
	}


if (document.formset.z_tel.value !=""){   
var phone=document.formset.z_tel.value;   
var p1 = /^(([0\+]\d{2,3}-)?(0\d{2,3})-)?(\d{7,8})(-(\d{3,}))?$/;   
var me = false;   
if (p1.test(phone))me=true;   
if (!me){   
    document.getElementById("dianhua").innerHTML="<font color=red>&times;对不起，您输入的电话号码有误。区号和电话号码之间请用-分割!</font>";
    document.formset.z_tel.focus();   
return false;   
}else{
    document.getElementById("dianhua").innerHTML="<font color=green><b>√</b></font>";
	}
}else{
	document.getElementById("dianhua").innerHTML="<font color=red>&times;请填写电话号码!</font>";
	document.formset.z_tel.focus();
	return false;
	}
	
if(document.formset.z_code.value=="")
{
	document.getElementById("youbian").innerHTML="<font color=red>&times;请填写邮编!</font>";
	document.formset.z_code.focus();
	return false;
}else{
	if(document.formset.z_code.value.length<6){
     document.getElementById("youbian").innerHTML="<font color=red>&times;邮编位数不正确!</font>";
     document.formset.z_code.focus();
     return false;
		}else{
    document.getElementById("youbian").innerHTML="<font color=green><b>√</b></font>";
	}
}

if(document.formset.z_email.value=="")
{
	document.getElementById("youxiang").innerHTML="<font color=red>&times;请填写邮箱地址!</font>";
	document.formset.z_email.focus();
	return false;
}else{
	
		if(!/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(document.formset.z_email.value)){
		document.getElementById("youxiang").innerHTML="<font color=red>&times;邮箱格式不正确!</font>";
		document.formset.z_email.focus();
		return false;
		}else{			
		document.getElementById("youxiang").innerHTML="<font color=green><b>√</b></font>";
		document.formset.z_email.focus();
			}
	
	}

if(document.formset.z_website.value==""||document.formset.z_website.value=="http://")
{
	document.getElementById("wangzhi").innerHTML="<font color=red>&times;请填写网址!</font>";
	document.formset.z_website.focus();
	return false;
}else{
	
	if (document.formset.z_website.value.length<11){
        document.getElementById("wangzhi").innerHTML="<font color=red>&times;网址输入有误!</font>";
        document.formset.z_website.focus();
        return false;
		
		}else{
       document.getElementById("wangzhi").innerHTML="<font color=green><b>√</b></font>";
	   }
}


if(document.formset.z_logo.value=="")
{
	document.getElementById("logdex").innerHTML="<font color=red>&times;请上传首页LOGO!</font>";
	document.formset.z_logo.focus();
	return false;
}else{
    document.getElementById("logdex").innerHTML="<font color=green><b>√</b></font>";
	}

if(document.formset.z_icp.value=="")
{
	document.getElementById("icpdex").innerHTML="<font color=red>&times;请填写ICP备案号!</font>";
	document.formset.z_icp.focus();
	return false;
}else{
	if (document.formset.z_icp.value.length<8){
	document.getElementById("icpdex").innerHTML="<font color=red>&times;ICP备案号输入有误!</font>";
	document.formset.z_icp.focus();
	return false;
		}else{ 
	document.getElementById("icpdex").innerHTML="<font color=green><b>√</b></font>";
	}
   
	}

if(document.formset.z_address.value=="")
{
	document.getElementById("adddex").innerHTML="<font color=red>&times;请填写公司地址!</font>";
	document.formset.z_address.focus();
	return false;
}else{
    document.getElementById("adddex").innerHTML="<font color=green><b>√</b></font>";
	}
	
}
function webpic(){
	if(document.formset.z_pic1.value=="")
	{alert('好了');
		document.getElementById("pc1").innerHTML="<font color=red>&times;请上传幻灯图片1!</font>";
		document.formset.z_pic1.focus();
		return false;
	}else{
		document.getElementById("pc1").innerHTML="<font color=green><b>√</b></font>";
		}
		//
	if(document.formset.z_pic2.value=="")
	{
		document.getElementById("pc2").innerHTML="<font color=red>&times;请上传幻灯图片2!</font>";
		document.formset.z_pic2.focus();
		return false;
	}else{
		document.getElementById("pc2").innerHTML="<font color=green><b>√</b></font>";
		}
		//
		if(document.formset.z_pic3.value=="")
	{
		document.getElementById("pc3").innerHTML="<font color=red>&times;请上传幻灯图片3!</font>";
		document.formset.z_pic3.focus();
		return false;
	}else{
		document.getElementById("pc3").innerHTML="<font color=green><b>√</b></font>";
		}
		//
		if(document.formset.z_pic4.value=="")
	{
		document.getElementById("pc4").innerHTML="<font color=red>&times;请上传幻灯图片4!</font>";
		document.formset.z_pic4.focus();
		return false;
	}else{
		document.getElementById("pc4").innerHTML="<font color=green><b>√</b></font>";
		}
		//
		if(document.formset.z_pic5.value=="")
	{
		document.getElementById("pc5").innerHTML="<font color=red>&times;请上传幻灯图片5!</font>";
		document.formset.z_pic5.focus();
		return false;
	}else{
		document.getElementById("pc5").innerHTML="<font color=green><b>√</b></font>";
		}
	 if(document.formset.z_pic6.value=="")
	{
		document.getElementById("pc6").innerHTML="<font color=red>&times;请上传幻灯图片6!</font>";
		document.formset.z_pic6.focus();
		return false;
	}else{
		document.getElementById("pc6").innerHTML="<font color=green><b>√</b></font>";
		}	
	}
function infoset(){//index-info
	
	if(document.forminfo.cp_title.value=="")
	{
	document.getElementById("intitle").innerHTML="<font color=red>&times;请填写信息名称!</font>";
	document.forminfo.cp_title.focus();
	return false;
	}else{
		  document.getElementById("intitle").innerHTML="<font color=green><b>√</b></font>";
		  }
		  
}

function ggset(){//index-guanggao
	
	if(document.formgg.g_name.value==""){
	document.getElementById("gname").innerHTML="<font color=red>&times;请填写广告名称!</font>";
	document.formgg.g_name.focus();
	return false;
	}else{
		  document.getElementById("gname").innerHTML="<font color=green><b>√</b></font>";
		  }

   if(document.formgg.g_pic.value==""){
	document.getElementById("gpic").innerHTML="<font color=red>&times;请上传广告图片!</font>";
	document.formgg.g_pic.focus();
	return false;
	}else{
	document.getElementById("gpic").innerHTML="<font color=green><b>√</b></font>";
	}
		  
}

function newsset(){//index-news
	
	if(document.formnews.nclass.value==0){
	document.getElementById("ncl").innerHTML="<font color=red>&times;请选择新闻类别!</font>";
	document.formnews.nclass.focus();
	return false;
	}else{
		  document.getElementById("ncl").innerHTML="<font color=green><b>√</b></font>";
		  }
		  	if(document.formnews.smclass.value==0){
	document.getElementById("smcl").innerHTML="<font color=red>&times;请选择新闻小类!</font>";
	document.formnews.smclass.focus();
	return false;
	}else{
		  document.getElementById("ncl").innerHTML="<font color=green><b>√</b></font>";
		  }

   if(document.formnews.ntitle.value==""){
	document.getElementById("ntil").innerHTML="<font color=red>&times;请填写新闻标题!</font>";
	document.formnews.ntitle.focus();
	return false;
	}else{
	document.getElementById("ntil").innerHTML="<font color=green><b>√</b></font>";
	}
		  
}
function pxnewsset(){//index-news
	
	if(document.formnews.pxnclass.value==0){
	document.getElementById("ncl").innerHTML="<font color=red>&times;请选择新闻类别!</font>";
	document.formnews.pxnclass.focus();
	return false;
	}else{
		  document.getElementById("ncl").innerHTML="<font color=green><b>√</b></font>";
		  }

   if(document.formnews.pxntitle.value==""){
	document.getElementById("ntil").innerHTML="<font color=red>&times;请填写新闻标题!</font>";
	document.formnews.pxntitle.focus();
	return false;
	}else{
	document.getElementById("ntil").innerHTML="<font color=green><b>√</b></font>";
	}
		  
}

function teset(){//index-teacher
	
	if(document.tecform.t_name.value==0){
	document.getElementById("tname").innerHTML="<font color=red>&times;请教师姓名!</font>";
	document.tecform.t_name.focus();
	return false;
	}else{
		  document.getElementById("tname").innerHTML="<font color=green><b>√</b></font>";
		  }

   if(document.tecform.t_jg.value==""){
	document.getElementById("tjg").innerHTML="<font color=red>&times;请填写机构名称!</font>";
	document.tecform.t_jg.focus();
	return false;
	}else{
	document.getElementById("tjg").innerHTML="<font color=green><b>√</b></font>";
	}
	
	if(document.tecform.t_pic.value==""){
	document.getElementById("tpic").innerHTML="<font color=red>&times;请上传照片!</font>";
	document.tecform.t_pic.focus();
	return false;
	}else{
	document.getElementById("tpic").innerHTML="<font color=green><b>√</b></font>";
	}
		  
}

function tjset(){//index-tjset
	
	if(document.tjform.tj_class.value==0){
	document.getElementById("tjclass").innerHTML="<font color=red>&times;请选择推存类别!</font>";
	document.tjform.tj_class.focus();
	return false;
	}else{
		  document.getElementById("tjclass").innerHTML="<font color=green><b>√</b></font>";
		  }

   if(document.tjform.tj_title.value==""){
	document.getElementById("tjtitle").innerHTML="<font color=red>&times;请填写信息标题!</font>";
	document.tjform.tj_title.focus();
	return false;
	}else{
	document.getElementById("tjtitle").innerHTML="<font color=green><b>√</b></font>";
	}
	
	if(document.tjform.tj_pic.value==""){
	document.getElementById("tjpic").innerHTML="<font color=red>&times;请上传图片!</font>";
	document.tjform.tj_pic.focus();
	return false;
	}else{
	document.getElementById("tjpic").innerHTML="<font color=green><b>√</b></font>";
	}
		  
}

function exset(){//index-excel
  if(document.exform.ex_title.value==""){
	document.getElementById("extitle").innerHTML="<font color=red>&times;请填写考试名称!</font>";
	document.exform.ex_title.focus();
	return false;
	}else{
		  document.getElementById("extitle").innerHTML="<font color=green><b>√</b></font>";
		  }

   if(document.exform.ex_bmtime.value==""){
	document.getElementById("exbmtime").innerHTML="<font color=red>&times;请填写信息标题!</font>";
	document.exform.ex_bmtime.focus();
	return false;
	}else{
	document.getElementById("exbmtime").innerHTML="<font color=green><b>√</b></font>";
	}
	
	if(document.exform.ex_bmrk.value==""){
	document.getElementById("exbmrk").innerHTML="<font color=red>&times;请填写报名入口!</font>";
	document.exform.ex_bmrk.focus();
	return false;
	}else{
	document.getElementById("exbmrk").innerHTML="<font color=green><b>√</b></font>";
	}
	
	if(document.exform.ex_kstime.value==""){
	document.getElementById("exkstime").innerHTML="<font color=red>&times;请填写考试时间!</font>";
	document.exform.ex_kstime.focus();
	return false;
	}else{
	document.getElementById("exkstime").innerHTML="<font color=green><b>√</b></font>";
	}
	
	if(document.exform.ex_ksrk.value==""){
	document.getElementById("exksrk").innerHTML="<font color=red>&times;请填写考试入口!</font>";
	document.exform.ex_ksrk.focus();
	return false;
	}else{
	document.getElementById("exksrk").innerHTML="<font color=green><b>√</b></font>";
	}
	
	if(document.exform.ex_cfrk.value==""){
	document.getElementById("excfrk").innerHTML="<font color=red>&times;请填写查分入口!</font>";
	document.exform.ex_cfrk.focus();
	return false;
	}else{
	document.getElementById("excfrk").innerHTML="<font color=green><b>√</b></font>";
	}

		  
}

function kaike(){//xl-kaikexinxi

 if(document.kaikeform.bk_id.value==0){
	document.getElementById("k_bk").innerHTML="<font color=red>&times;请选择简章大类!</font>";
	document.kaikeform.bk_id.focus();
	return false;
	}else{
		  document.getElementById("k_bk").innerHTML="<font color=green><b>√</b></font>";
		  }
		  
  if(document.kaikeform.s_id.value==0){
	document.getElementById("k_school").innerHTML="<font color=red>&times;请选择学校!</font>";
	document.kaikeform.s_id.focus();
	return false;
	}else{
		  document.getElementById("k_school").innerHTML="<font color=green><b>√</b></font>";
		  }

   if(document.kaikeform.zyclass.value==0){
	document.getElementById("k_zyclass").innerHTML="<font color=red>&times;请选择专业类别!</font>";
	document.kaikeform.zyclass.focus();
	return false;
	}else{
	document.getElementById("k_zyclass").innerHTML="<font color=green><b>√</b></font>";
	}
	
	if(document.kaikeform.zyname.value==0){
	document.getElementById("k_zyname").innerHTML="<font color=red>&times;请选择专业名称!</font>";
	document.kaikeform.zyname.focus();
	return false;
	}else{
	document.getElementById("k_zyname").innerHTML="<font color=green><b>√</b></font>";
	}
	
	if(document.kaikeform.ktitle.value==""){
	document.getElementById("k_ktitle").innerHTML="<font color=red>&times;请填写开班名称!</font>";
	document.kaikeform.ktitle.focus();
	return false;
	}else{
	document.getElementById("k_ktitle").innerHTML="<font color=green><b>√</b></font>";
	}
	
	if(document.kaikeform.zycon.value==""){
	document.getElementById("k_zycon").innerHTML="<font color=red>&times;请填写专业介绍!</font>";
	document.kaikeform.zycon.focus();
	return false;
	}else{
	document.getElementById("k_zycon").innerHTML="<font color=green><b>√</b></font>";
	}
	
	if(document.kaikeform.xfei.value==""){
	document.getElementById("k_xfei").innerHTML="<font color=red>&times;请填写学费!</font>";
	document.kaikeform.xfei.focus();
	return false;
	}else{
	document.getElementById("k_xfei").innerHTML="<font color=green><b>√</b></font>";
	}
	
	if(document.kaikeform.yhui.value==""){
	document.getElementById("yhui").innerHTML="<font color=red>&times;请填写优惠价!</font>";
	document.kaikeform.yhui.focus();
	return false;
	}else{
	document.getElementById("yhui").innerHTML="<font color=green><b>√</b></font>";
	}
	
		if(document.kaikeform.kcal.value==""){
	document.getElementById("k_kcal").innerHTML="<font color=red>&times;请填写上课类型!</font>";
	document.kaikeform.kcal.focus();
	return false;
	}else{
	document.getElementById("k_kcal").innerHTML="<font color=green><b>√</b></font>";
	}
		if(document.kaikeform.ktime.value==""){
	document.getElementById("k_ktime").innerHTML="<font color=red>&times;请填写课程时间!</font>";
	document.kaikeform.ktime.focus();
	return false;
	}else{
	document.getElementById("k_ktime").innerHTML="<font color=green><b>√</b></font>";
	}
		if(document.kaikeform.kdate.value==""){
	document.getElementById("k_kdate").innerHTML="<font color=red>&times;请填写开班日期!</font>";
	document.kaikeform.kdate.focus();
	return false;
	}else{
	document.getElementById("k_kdate").innerHTML="<font color=green><b>√</b></font>";
	}
		if(document.kaikeform.xlcal.value==""){
	document.getElementById("k_xlcal").innerHTML="<font color=red>&times;请填写学历类型!</font>";
	document.kaikeform.xlcal.focus();
	return false;
	}else{
	document.getElementById("k_xlcal").innerHTML="<font color=green><b>√</b></font>";
	}
		if(document.kaikeform.xfen.value==""){
	document.getElementById("k_xfen").innerHTML="<font color=red>&times;请填写学分!</font>";
	document.kaikeform.xfen.focus();
	return false;
	}else{
	document.getElementById("k_xfen").innerHTML="<font color=green><b>√</b></font>";
	}

		  
}
/////////////////////////////
function pxkaike(){//xl-kaikexinxi
   if(document.pxkkform.pxk_cl.value==0){
	document.getElementById("p_pxlb").innerHTML="<font color=red>&times;请选择培训类别!</font>";
	document.pxkkform.pxk_cl.focus();
	return false;
	}else{
		  document.getElementById("p_pxlb").innerHTML="<font color=green><b>√</b></font>";
		  }

  if(document.pxkkform.pxk_sid.value==0){
	document.getElementById("p_xxxz").innerHTML="<font color=red>&times;请选择学校!</font>";
	document.pxkkform.pxk_sid.focus();
	return false;
	}else{
		  document.getElementById("p_xxxz").innerHTML="<font color=green><b>√</b></font>";
		  }

  	
	if(document.pxkkform.pxk_title.value==""){
	document.getElementById("p_kbmc").innerHTML="<font color=red>&times;请填写开班名称!</font>";
	document.pxkkform.pxk_title.focus();
	return false;
	}else{
	document.getElementById("p_kbmc").innerHTML="<font color=green><b>√</b></font>";
	}
	
		if(document.pxkkform.pxk_tel.value==""){
	document.getElementById("p_lxdh").innerHTML="<font color=red>&times;请填写联系电话!</font>";
	document.pxkkform.pxk_tel.focus();
	return false;
	}else{
	document.getElementById("p_lxdh").innerHTML="<font color=green><b>√</b></font>";
	}
		if(document.pxkkform.pxk_adder.value==""){
	document.getElementById("p_skdd").innerHTML="<font color=red>&times;请填写上课地点!</font>";
	document.pxkkform.pxk_adder.focus();
	return false;
	}else{
	document.getElementById("p_skdd").innerHTML="<font color=green><b>√</b></font>";
	}		  
}

////////////////////////////////


function school(){//xl-zhaosheng school

 if(document.formclass.s_name.value==""){
	alert('学院名称为空!');
	document.formclass.s_name.focus();
	return false;
	}
	
  if(document.formclass.s_banner.value==""){
	alert('请上传Banner图片!');
	document.formclass.s_banner.focus();
	return false;
	}

  if(document.formclass.s_bxys.value==""){
	alert('请填写办法优势!');
	document.formclass.s_bxys.focus();
	return false;
	}
	
	 if(document.formclass.s_zsdx.value==""){
	alert('请填写招生对象!');
	document.formclass.s_zsdx.focus();
	return false;
	}
		  
}


function pxschool(){//xl-zhaosheng school

 if(document.formpx.pxs_name.value==""){
	alert('培训学校名称为空!');
	document.formpx.pxs_name.focus();
	return false;
	}		  
}


function mbset(){//xl-zhaosheng school

if(document.mbform.mb_logo.value==""){
	alert('请上传logo!');
	document.mbform.mb_logo.focus();
	return false;
	}
	
 if(document.mbform.mb_banner.value==""){
	alert('请上传banner!');
	document.mbform.mb_banner.focus();
	return false;
	}
	
  if(document.mbform.mb_tel.value==""){
	alert('请填写报名电话');
	document.mbform.mb_tel.focus();
	return false;
	}

  if(document.mbform.mb_adderss.value==""){
	alert('请填写报名地址!');
	document.mbform.mb_adderss.focus();
	return false;
	}
	
	 if(document.mbform.mb_pic1.value==""){
	alert('请上传切换图一!');
	document.mbform.mb_pic1.focus();
	return false;
	}
	  if(document.mbform.mb_pic2.value==""){
	alert('请上传切换图二!');
	document.mbform.mb_pic2.focus();
	return false;
	}
	  if(document.mbform.mb_pic3.value==""){
	alert('请上传切换图三!');
	document.mbform.mb_pic3.focus();
	return false;
	}
	  if(document.mbform.mb_pic4.value==""){
	alert('请上传切换图四!');
	document.mbform.mb_pic4.focus();
	return false;
	}
		  
}

function xlset(){//xl houtai
  if(document.formset.xl_banner.value==""){
	document.getElementById("xlban").innerHTML="<font color=red>&times;请上传banner动画!</font>";
	document.formset.xl_banner.focus();
	return false;
	}else{
		  document.getElementById("xlban").innerHTML="<font color=green><b>√</b></font>";
		  }
		  
if(document.formset.xl_onegg.value==""){
	document.getElementById("xlonegg").innerHTML="<font color=red>&times;请上传广告图!</font>";
	document.formset.xl_onegg.focus();
	return false;
	}else{
		  document.getElementById("xlonegg").innerHTML="<font color=green><b>√</b></font>";
}
function showpic($site1){
	alert ("1");
	alert ($site1)
}
}