/* 考试日历滚动 */
var oMarquee = document.getElementById("mq"); //滚动对象 
var iLineHeight = 37; //单行高度，像素 
var iLineCount = 9; //实际行数,可以重复. 
var iScrollAmount = 1; //每次滚动高度，像素 
function run(){ 
oMarquee.scrollTop += iScrollAmount; 
if ( oMarquee.scrollTop == iLineCount * iLineHeight ) 
oMarquee.scrollTop = 0; 
if ( oMarquee.scrollTop % iLineHeight == 0 ) { 
window.setTimeout( "run()", 2000 ); 
} else { 
window.setTimeout( "run()", 20 ); 
} 
} 
oMarquee.innerHTML += oMarquee.innerHTML; 
window.setTimeout( "run()", 2000 ); 
