var xmlhttp;
var xmlseach;
//var value;
function getxml(){
	var reg=false;
	try{
		reg=new XMLHttpRequest();
	}catch (err){
		try{
			reg=new ActiveXObject("Msxml2.XMLHTTP");
		}catch (err){
			try{
				reg=new ActiveXObject("Microsoft.XMLHTTP");
			}catch(err){
				reg=false;
			}
		}
	}
	return reg;
}

Function.prototype.bind   =   function(){ 
var   self   =   this; 
var   arg     =   arguments; 
return   function(){ 
self.apply(null,arg); 
} 
}
function cleee(){
	
	left1=document.getElementById("body1").offsetLeft;
	left1=left1+256;
	var x=event.screenX;
		//y = event.screenY; 	
		//x = evnt.screenX; 
		//y = evnt.screenX; 	
	//alert (x);
	if (x<left1 || x>(left1+488)){
		obj1=document.getElementById("div1");
		if (obj1!=null){
			document.body.removeChild(obj);
		}
	}
}

function seach(obj){
	if (obj!=''){
	xmlhttp=getxml();	
	var url="../top/seach.php?shou="+obj+"&now="+new Date().getTime();
	xmlhttp.onreadystatechange=handle;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);	
	}
}
function handle(){
	if(xmlhttp.readyState==4){
		if(xmlhttp.status==200){
			//alert (xmlhttp.responseText);
			xmldoc=xmlhttp.responseXML;
			value=xmldoc.getElementsByTagName("alltitle");
			var key=xmldoc.getElementsByTagName("web");
			//alert (key);
			if (value.length>0){
				
				//alert ("1");
				//key="ie6";
				outlist(value,key);
			}else{
				obj1=document.getElementById("div1");
				if(obj1!=null){
					document.body.removeChild(obj1);
				}
			}
		}
	}
}
function outlist(t,j){
	
	var out="<table bgcolor='#ffffff' id='tab1' width='488' style=\"border-width:1px; border-color:#cacaca; border-style:solid;\">";
		
	for(var i=0;i<t.length;i++){
		var current_c=t[i];		
		var t_v=current_c.childNodes[0].nodeValue;
		out=out+"<tr><td id="+i+" onclick=\"go('"+t_v+"')\" onmouseover=\"this.style.backgroundColor='#CBDCF8'\" onmouseout=\"this.style.backgroundColor=''\"><a style=\"cursor:hand\">"+t_v+"</a></td></tr>";
	}
	out=out+"<tr><td align=\"right\"><a onclick=\"close_div()\" style=\"cursor:hand\">关闭</a></td></tr>"
	out=out+"</table>";
	
	obj=document.createElement("div");
	obj.id="div1";
	obj.style.position="absolute";
	obj.style.width="1000px";
	obj.style.zIndex="1";
	
	var obj3=document.getElementById("seach");
	
	obj.style.top="116px";
	//var left1=obj3.offsetLeft;
	//alert (left1);
	//if (j[0]!=null){
	left1=document.getElementById("body1").offsetLeft;
	left1=left1+256;
	//}
	obj.style.left=left1+"px";
	document.body.appendChild(obj);
	//alert ('1');
	obj2=document.getElementById("div1");
	obj2.innerHTML=out;
}
function close_div()
{
  obj=document.getElementById("div1");
  document.body.removeChild(obj);
}
function go(t){
	var obj1=document.getElementById("seach");
	
	obj1.value=t;
	var obj2=document.getElementById("div1");
	document.body.removeChild(obj2);
	xmlseach=getxml();
	xmlseach.onreadystatechange=gophp;
	var url="../top/seach1.php?name="+t+"&now="+new Date().getTime();
	xmlseach.open("GET",url,true);
	xmlseach.send(null);
	
	
}

function gotosite(){
	obj1=document.getElementById("seach");
	if (obj1.value==""){
		alert ("请输入内容");
	}else{			
		//alert (value.length);
		if (value.length=="1"){		
			var mid=value[0].firstChild.data;
			//alert (value1[0].firstChild.data);
			if (value1[0].firstChild.data==3){
				window.open("../news_detail.php?id="+mid);
			}else if(value1[0].firstChild.data==1){
				window.open("../ksrl_detail.php?id="+mid);
			}else if(value1[0].firstChild.data==4){
				window.open("../Education/xl_pro_zyjs.php?sid="+mid);
			}
			else{
			window.open("../show.php?id="+mid);
			}
		}else{
			window.open("../seachall.php?shou="+obj1.value)
		
		}
		
	}
}
function gophp(){
	if (xmlseach.readyState==4){
		if(xmlseach.status==200){
			xmldoc=xmlseach.responseXML;
			
			value=xmldoc.getElementsByTagName("mid");
			value1=xmldoc.getElementsByTagName("type");
			//alert (value.length);			
		}
	}	
}