/*动态获取宽高*/
window.onresize = function(){
	width_height();
}
window.onload = function(){
	width_height();
}
function width_height(){
	var clientWidth = document.documentElement.clientWidth;
	var dt_width = clientWidth+'px';
	var clientHeight = document.documentElement.clientHeight;
	var dt_height = clientHeight+'px';
	document.getElementById('wrapper_bg').style.height = dt_height;
}