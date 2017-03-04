<!--
//Ajax是建立在XMLHttp组件下的技术，本例详细语法参考压缩包内xmlhttp手册
var xmlHttp;
var value;
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
function userXMLHttp(value){

createXMLHttp(); //建立xmlHttp 对象
xmlHttp.onreadystatechange =dodo;//xmlHttp下的onreadystatechange方法 控制传送过程
xmlHttp.open("get","ajax_school.php?scon="+escape(value)+"&num="+Math.random(),true); //传送方式 读取的页面 异步与否
xmlHttp.send(null);
}

function dodo(){
   if(xmlHttp.readyState==1){
	 document.getElementById("content1").style.display='block';
     document.getElementById("content1").innerHTML="数据接收中,请稍候....";//xmlHttp的responseText方法 得到读取页数据
	}
   if(xmlHttp.readyState==4){  // xmlHttp下的readystate方法 4表示传送完毕
	   if(xmlHttp.status==200){ // xmlHttp的status方法读取状态（服务器HTTP状态码）  200对应OK 404对应Not Found（未找到）等
				   if(xmlHttp.responseText!=""){//判断无值时下不让拉框显示
					   document.getElementById("content1").style.display='block';
					   document.getElementById("content1").innerHTML=xmlHttp.responseText;//xmlHttp的responseText方法 得到读取页数据
				   }else{
					   document.getElementById("content1").style.display='none';
				   }
			   //以下是判断下拉框的状态，有内容时就显示，没有时就隐藏
			       if(document.getElementById("content1").innerHTML.length>=1){
				   document.getElementById("content1").style.display='block';
				   }else{
				   document.getElementById("content1").style.display='none';
				   }
			   
		}else{alert('found');}
    }
}
function cont1(){
	 document.getElementById("content1").style.display='none';
	}