function crgk(o){return document.getElementById(o);}
function crgkHoverLi(n){
for(var i=1;i<=3;i++){crgk('crgk_tb_'+i).className='crgk_normaltab';crgk('crgk_tbc_0'+i).className='crgk_undis';}crgk('crgk_tbc_0'+n).className='crgk_dis';crgk('crgk_tb_'+n).className='crgk_hovertab';
}