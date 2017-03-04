function dsumXMLHttp(value){
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

createXMLHttp(); //建立xmlHttp 对象
xmlHttp.onreadystatechange =dodo;//xmlHttp下的onreadystatechange方法 控制传送过程 
xmlHttp.open("get","../Education/dsum.php?id="+value+"&num="+Math.random(),true); //传送方式 读取的页面 异步与否
xmlHttp.send(null);


function dodo(){
//if(xmlHttp.readyState==1){
//	 document.getElementById("vname").style.display='block';
//     document.getElementById("vname").innerHTML="数据接收中,请稍候....";//xmlHttp的responseText方法 得到读取页数据
//	}
   if(xmlHttp.readyState==4){ // xmlHttp下的readystate方法 4表示传送完毕
	   if(xmlHttp.status==200){ // xmlHttp的status方法读取状态（服务器HTTP状态码）  200对应OK 404对应Not Found（未找到）等
		  
		 // if(xmlHttp.responseText=="false"){//判断无值时下不让拉框显示
//			  // document.getElementById("vname").style.display='block';
//		       document.getElementById("vname").innerHTML="<font color=red>对不起，此会员名已被注册，请更换！</font>";//xmlHttp的responseText方法 得到读取页数据
//			   document.creator.v_name.focus();
//               return false;
//		   }else{

			  document.getElementById(value).innerHTML=xmlHttp.responseText;
			   //}
		}
    }

}
}