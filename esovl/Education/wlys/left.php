<?php include_once("../../conn.php");?>
<style type="text/css">
.wl_xytj_list { width:231px; height:275px;}
#demomain{overflow:hidden; float:left; width:245px; height:296px; }
#demomain img{}
#indemomain{float: left;width: 800%;}
#demo1main{float: left;}
#demo2main{float: left;}
.tz-xx{width:210px; height:1px; float:left; background:url(../images/tz-xx_17.jpg); margin-top:15px; overflow:hidden; margin-left:12px; display:inline;}
.tz-tu{width:90px; height:92px; float:left; margin:12px 0 0 14px; display:inline; border:1px solid #cfcfcf;}
.tz-bt{width:110px; float:left; font-weight:bold; color:#fd5717; margin:8px 0 0 8px; display:inline;}
.tz-bt a{ color:#fd5717;}
.tz-wz{width:110px; float:left; margin:2px 0 0 8px; display:inline; line-height:18px; overflow:hidden; height:56px;}
</style>
<div id="demomain">
<div id="indemomain">
<div id="demo1main">
<div class="wl_xytj_list">
                            <?php
		$sql="select * from school order by s_id desc";
		$rs=mysql_query($sql,$conn);
		$row=mysql_fetch_assoc($rs);
			
		?>
<div class="tz-tu"><a href="school/?sid=<?=$row['s_id']?>" target="_blank"><img src="<?=$z_website?>admin_root/<?php echo $row['s_logo'];?>" onload="javascript:DrawImage(this);" /></a></div>
                            <div class="tz-bt"><a href="<?=$z_website?>school/?sid=<?=$row['s_id']?>" target="_blank"><?php echo $row['s_name']; ?></a></div>
                            <div class="tz-wz"><?php echo $row['s_xyjs'];?></div>
                            <div class="tz-xx"></div>
                            <?php $row=mysql_fetch_assoc($rs);?>
                            <div class="tz-tu"><a href="<?=$z_website?>school/?sid=<?=$row['s_id']?>" target="_blank"><img src="admin_root/<?php echo $row['npic'];?>" /></a></div>
                            <div class="tz-bt"><a href="<?=$z_website?>school/?sid=<?=$row['s_id']?>" target="_blank"><?php echo $row['s_name']; ?></a></div>
                            <div class="tz-wz"><?php echo $row['s_xyjs'];?></div>
                            <div class="tz-xx"></div>
                            <div class="tz-an">
                              <input name="input" type="image" src="<?=$z_website?>images/wl-tz_17.jpg" onclick="goleft()" />
                            </div>
                            <div class="tz-an" style="margin-left:10px;">
                              <input name="input" type="image" src="<?=$z_website?>images/wl-tz_19.jpg" />
                            </div>
                          </div>
</div>
<div id="demo2main"></div>
</div>
</div>
<script language="javascript">
var speed=20; 
var links_move=27
var intTotalStep=17
var tab=document.getElementById("demomain");
var tab1=document.getElementById("demo1main");
var tab2=document.getElementById("demo2main");


tab2.innerHTML=tab1.innerHTML;

function MarqueeLeft()
{
         direct="left";
	if(tab1.offsetWidth-tab.scrollLeft<=0)
	{
		tab.scrollLeft-=tab1.offsetWidth;
		//alert ("1")
	}
	
	else
	{
		tab.scrollLeft=tab.scrollLeft+links_move;
	}
         intStep++;
		// alert ("2")
         if(intStep==intTotalStep){
            clearInterval(MyMarLeft);
         }

}
function goleft(){
   intStep=1;
   MyMarLeft=setInterval(MarqueeLeft,15); 
}
</script>