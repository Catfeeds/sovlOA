/* 报名录取滚动 */

var Mar = document.getElementById("Marquee");
var child_div=Mar.getElementsByTagName("dl")
var picH = 37;//移动高度
var scrollstep=3;//移动步幅,越大越快
var scrolltime=50;//移动频度(毫秒)越大越慢
var stoptime=3000;//间断时间(毫秒)
var tmpH = 0;
Mar.innerHTML += Mar.innerHTML;
function start(){
if(tmpH < picH){
tmpH += scrollstep;
if(tmpH > picH )tmpH = picH ;
Mar.scrollTop = tmpH;
setTimeout(start,scrolltime);
}else{
tmpH = 0;
Mar.appendChild(child_div[0]);
Mar.scrollTop = 0;
setTimeout(start,stoptime);
}
}
onload=function(){setTimeout(start,stoptime)};