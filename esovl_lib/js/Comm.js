/* 切换面板，兼容FireFox3,IE7
   2007年7月31日  钱浩
	 
	 regEvent(window,'onload',function() {SwitchPanel('Pan','COn','COff',4,false)});
	 Id:需要切换面板的Id
	 ClassOn:面板激活状态的Css名称
	 ClassOff:面板未激活状态的Css名称
	 Count:面板的数量
	 AutoSwitch:使用MouseOver触发还是Click触发
	 --以下为可选项--
	 Rate:自动切换的频率，单位毫秒。无需自动切换设为null
	 Index:初始面板的编号。
*/
function SwitchPanel(Id,ClassOn,ClassOff,Count,AutoSwitch,Rate,Index) 
{
	var tempFruit = new Object;
	tempFruit.Id=Id;
	tempFruit.ClassOn=ClassOn; 
	tempFruit.ClassOff=ClassOff; 
	tempFruit.Index=(Index==null?1:Index);
	tempFruit.timer=null;
	tempFruit.Count=Count; 
	tempFruit.EventStr=(AutoSwitch?"mouseover":"click");
	tempFruit.Switch=function(id)
	{
		if(id==null)
			id=(this.Index==Count?1:this.Index+1);
		else if(this.timer!=null)
		{
			//切换标签，重置计时器
			window.clearInterval(this.timer);
			tempFruit.timer=window.setInterval(function(){tempFruit.Switch()},Rate);
		}
		this.Index=id;
		for(var i=1;i<=Count;i++)
		{
			var card = document.getElementById(this.Id+"_"+i);
			var panel = document.getElementById(this.Id+i);
			
			if(card!=null)
				card.className=ClassOff;
			if(panel!=null)
			    panel.style.display="none";
			    
			if(card==null && panel==null)
			{
				Count=i-1;
				id=1;
				break;
			}
		}
		if(document.getElementById(this.Id+"_"+id)!=null)
			document.getElementById(this.Id+"_"+id).className=ClassOn;
		if(document.getElementById(this.Id+id)!=null)
			document.getElementById(this.Id+id).style.display="block";	
	}
	//注册切换事件
	for(var i=1;i<=Count;i++)
	{
		if(document.getElementById(Id+'_'+i)==null)
			continue;
		if (window.attachEvent) {eval("document.getElementById(Id+'_'+i).attachEvent('on"+tempFruit.EventStr+"',function (){tempFruit.Switch("+i+")});")};
		if (window.addEventListener) {eval("document.getElementById(Id+'_'+i).addEventListener('"+tempFruit.EventStr+"',function(){tempFruit.Switch("+i+")},false);")};
	}
	//激活定时器
	if(Rate!=null)
	{
		tempFruit.timer=window.setInterval(function(){tempFruit.Switch()},Rate);
	}
	tempFruit.Switch(tempFruit.Index);
	return tempFruit;
}
function regEvent(obj,eventName,fun)
{
	eventName=eventName.replace("on","");
	if (window.attachEvent) {obj.attachEvent('on'+eventName,fun)};
	if (window.addEventListener) {obj.addEventListener(eventName,fun,false)};
}
function onDOMComplete(w, f) {
	var d = w.document, done = false;
	wait();

	if ((/WebKit|KHTML|MSIE/i).test(navigator.userAgent)) {
		poll();
	}

	function load(e) {
		if (!done) {
			done = true; stop(); f(e);
		}
	}

	function has(p) { return typeof d[p] != 'undefined'; }

	function poll() {
		if (d.body !== null && d.getElementsByTagName) {
			// please see http://javascript.nwbox.com/IEContentLoaded/ for the IE improvement part of DOMComplete
			if (has('fileSize')) { try { d.documentElement.doScroll('left'); load('documentready'); } catch (e) { } }
			if (has('readyState') && (/loaded|complete/).test(d.readyState)) { load('readyState'); }
		}
		if (!done) { setTimeout(poll, 10); }
	}

	function stop() {
		if (typeof d.removeEventListener == 'function') {
			d.removeEventListener('DOMContentLoaded', load, false);
		}
	}

	function wait() {
		if (typeof d.addEventListener == 'function') {
			d.addEventListener('DOMContentLoaded', load, false);
		}
		var oldonload = w.onload;
		w.onload = function (e) {
			if (typeof oldonload == 'function') {
				oldonload();
			}
			load(e || this.event);
		};
	}
}
