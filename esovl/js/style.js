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

/* 搜索框 */
function g(o){return document.getElementById(o);}
function HoverLi(n){
for(var i=1;i<=2;i++){g('tb_'+i).className='normaltab';g('tbc_0'+i).className='undis';}g('tbc_0'+n).className='dis';g('tb_'+n).className='hovertab';
}

/* 导航栏 */
function g(o){return document.getElementById(o);}
function navHoverLi(n){
for(var i=1;i<=3;i++){g('nav_tb_'+i).className='nav_normaltab';g('nav_tbc_0'+i).className='nav_undis';}g('nav_tbc_0'+n).className='nav_dis';g('nav_tb_'+n).className='nav_hovertab';
}
function navnoHoverLi(){
for(var i=1;i<=3;i++){
g('nav_tb_'+i).className='nav_normaltab';
}
}
/* 热门推荐 */
function openbox_tj_01_01() {
	 document.getElementById("brtj").style.display="block";
     document.getElementById("rmkc").style.display="none";
	}
function openbox_tj_01_02() {
	 document.getElementById("brtj").style.display="none";
     document.getElementById("rmkc").style.display="block";
	}
	
function o_01_01() {
	 document.getElementById("b1").style.display="block";
     document.getElementById("r1").style.display="none";
}
function o_01_02() {
	 document.getElementById("b1").style.display="none";
     document.getElementById("r1").style.display="block";
}
/* 一休带你逛 */
/*function openbox_dng_01_01() {
	 document.getElementById("box00_01").style.display="block";
     document.getElementById("box00_02").style.display="none";
	 document.getElementById("box00_03").style.display="none";
	 document.getElementById("box00_04").style.display="none";
	 document.getElementById("box00_05").style.display="none";
	 
	 document.getElementById("box_01").className="dt00"; 
     document.getElementById("box_02").className="";
	 document.getElementById("box_03").className="";
	 document.getElementById("box_04").className="";
	 document.getElementById("box_05").className="";
	}
function openbox_dng_01_02() {
	 document.getElementById("box00_01").style.display="none";
     document.getElementById("box00_02").style.display="block";
	 document.getElementById("box00_03").style.display="none";
	 document.getElementById("box00_04").style.display="none";
	 document.getElementById("box00_05").style.display="none";
	 
	 document.getElementById("box_01").className=""; 
     document.getElementById("box_02").className="dt00";
	 document.getElementById("box_03").className="";
	 document.getElementById("box_04").className="";
	 document.getElementById("box_05").className="";

	}

function openbox_dng_01_03() {
	 document.getElementById("box00_01").style.display="none";
     document.getElementById("box00_02").style.display="none";
	 document.getElementById("box00_03").style.display="block";
	 document.getElementById("box00_04").style.display="none";
	 document.getElementById("box00_05").style.display="none";
	 
	 document.getElementById("box_01").className=""; 
     document.getElementById("box_02").className="";
	 document.getElementById("box_03").className="dt00";
	 document.getElementById("box_04").className="";
	 document.getElementById("box_05").className="";

	}

function openbox_dng_01_04() {
	 document.getElementById("box00_01").style.display="none";
     document.getElementById("box00_02").style.display="none";
	 document.getElementById("box00_03").style.display="none";
	 document.getElementById("box00_04").style.display="block";
	 document.getElementById("box00_05").style.display="none";
	 

	 document.getElementById("box_01").className=""; 
     document.getElementById("box_02").className="";
	 document.getElementById("box_03").className="";
	 document.getElementById("box_04").className="dt00";
	 document.getElementById("box_05").className="";

	}

function openbox_dng_01_05() {
	 document.getElementById("box00_01").style.display="none";
     document.getElementById("box00_02").style.display="none";
	 document.getElementById("box00_03").style.display="none";
	 document.getElementById("box00_04").style.display="none";
	 document.getElementById("box00_05").style.display="block";
	
	 document.getElementById("box_01").className=""; 
     document.getElementById("box_02").className="";
	 document.getElementById("box_03").className="";
	 document.getElementById("box_04").className="";
	 document.getElementById("box_05").className="dt00";
}
*/
function g(o){return document.getElementById(o);}
function gHoverLi(n){
for(var i=1;i<=5;i++){g('gtb_'+i).className='gnormaltab';g('gtbc_0'+i).className='gundis';}g('gtbc_0'+n).className='gdis';g('gtb_'+n).className='ghovertab';
}

/* 学历列表的滑动门 */
function xl(o){return document.getElementById(o);}
function xlHoverLi(n){
for(var i=1;i<=4;i++){xl('xl_tb_'+i).className='xl_normaltab';xl('xl_tbc_0'+i).className='xl_undis';}
xl('xl_tbc_0'+n).className='xl_dis';xl('xl_tb_'+n).className='xl_hovertab';
}
////// 
function ResizePic(ImgTag,w1,h1)
{
var FitWidth = w1;
var FitHeight = h1;
    var image = new Image();
 image.src = ImgTag.src;
 if(image.width>0 && image.height>0){
	  if(image.width>=image.height){
	   if(image.width > FitWidth){
		ImgTag.width = FitWidth;
		ImgTag.height = (image.height*FitWidth)/image.width;
	   }
	   else{ 
		ImgTag.width = image.width;
		ImgTag.height = image.height;
		}}
	  else{
	   if(image.height > FitHeight){
		ImgTag.height = FitHeight;
		ImgTag.width = (image.width*FitHeight)/image.height;
	   }
	   else{
		ImgTag.width = image.width; 
		ImgTag.height = image.height;
	   }
	  }
}}
function DrawImage(ImgD){
    var image=new Image();
    var iwidth = 90; //定义允许宽度，当宽度大于这个值时等比例缩小
    var iheight = 92; //定义允许高度，当高度大于这个值时等比例缩小
    image.src=ImgD.src;
    if(image.width>0 && image.height>0){
        flag=true;
        if(image.width/image.height>= iwidth/iheight){
            if(image.width>iwidth){
                ImgD.width=iwidth;
                ImgD.height=(image.height*iwidth)/image.width;
            }else{
                ImgD.width=image.width;
                ImgD.height=image.height;
            }
        }else{
            if(image.height>iheight){
                ImgD.height=iheight;
                ImgD.width=(image.width*iheight)/image.height;
            }else{
                ImgD.width=image.width;
                ImgD.height=image.height;
}}}} 
/************/
function crgk(o){return document.getElementById(o);}
function crgkHoverLi(n){
for(var i=1;i<=3;i++){crgk('crgk_tb_'+i).className='crgk_normaltab';crgk('crgk_tbc_0'+i).className='crgk_undis';}crgk('crgk_tbc_0'+n).className='crgk_dis';crgk('crgk_tb_'+n).className='crgk_hovertab';
}
/***************gfbm***************/