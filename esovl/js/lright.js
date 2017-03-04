
var links_move=23
var intTotalStep=12
var tabmain=document.getElementById("demomain");
var tab1main=document.getElementById("demo1main");
var tab2main=document.getElementById("demo2main");


tab2main.innerHTML=tab1main.innerHTML;

function MarqueeLeft()
{
         direct="left";
	if(tab1main.offsetWidth-tabmain.scrollLeft<=0)
	{
		tabmain.scrollLeft-=tab1main.offsetWidth;
		//alert ("1")
	}
	
	else
	{
		tabmain.scrollLeft=tabmain.scrollLeft+links_move;
	}
         intStep++;
		// alert ("2")
         if(intStep==intTotalStep){
            clearInterval(MyMarLeft);
         }

}
function goleft(){
   intStep=1;
   MyMarLeft=setInterval(MarqueeLeft,1); 
}
function MarqueeRight()
{
          direct="right";
	if(tabmain.scrollLeft<=0)
	{
		tabmain.scrollLeft+=tab2main.offsetWidth;	
	}
	else
	{
		tabmain.scrollLeft=tabmain.scrollLeft-links_move;
	}
         intStep++;
         if(intStep==intTotalStep){
            clearInterval(MyMarLeft);
         }

}
function goright(){
   intStep=1;
   MyMarLeft=setInterval(MarqueeRight,1); 
}
//var MyMar=setInterval(Marquee,speed);
//var MyMar;
//tab.onmouseover=function() {clearInterval(MyMar)};
//tab.onmouseout=function() {MyMar=setInterval(Marquee,speed)};