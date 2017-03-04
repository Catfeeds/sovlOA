<script src="js/jquery-1.4a2.min.js" type="text/javascript"></script>
<script src="js/jquery.KinSlideshow-1.1.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
        $("#KinSlideshow").KinSlideshow({
                moveStyle:"right",
                titleBar:{titleBar_height:30,titleBar_bgColor:"#08355c",titleBar_alpha:0.5},
                titleFont:{TitleFont_size:12,TitleFont_color:"#FFFFFF",TitleFont_weight:"normal"},
                btn:{btn_bgColor:"#FFFFFF",btn_bgHoverColor:"#1072aa",btn_fontColor:"#000000",
                     btn_fontHoverColor:"#FFFFFF",btn_borderColor:"#cccccc",
                     btn_borderHoverColor:"#1188c0",btn_borderWidth:1}
        });
    })
</script>
<style type="text/css">
h1.title{ font-family:"微软雅黑",Verdana; font-weight:normal}
.code{ height:auto; padding:20px; border:1px solid #9EC9FE; background:#ECF3FD;}
.code pre{ font-family:"Courier New";font-size:14px;}
.info{ font-size:12px; color:#666666; font-family:Verdana; margin:20px 0 50px 0;}
.info p{ margin:0; padding:0; line-height:22px; text-indent:40px;}
h2.title{ margin:0; padding:0; margin-top:50px; font-size:18px; font-family:"微软雅黑",Verdana;}
h3.title{ font-size:16px; font-family:"微软雅黑",Verdana;}
.importInfo{ font-family:Verdana; font-size:14px;}
</style>
<?php $web=WebStep::model()->findByPk(0);?>
<div id="KinSlideshow" style="visibility:hidden;">
    <a href="<?=$web['z_link1']?>" target="_blank"><img src="/admin_root/<?=$web['z_pic1']?>" width="449" height="300" /></a>
    <a href="<?=$web['z_link2']?>" target="_blank"><img src="/admin_root/<?=$web['z_pic2']?>" width="449" height="300" /></a>
    <a href="<?=$web['z_link3']?>" target="_blank"><img src="/admin_root/<?=$web['z_pic3']?>" width="449" height="300" /></a>
    <a href="<?=$web['z_link4']?>" target="_blank"><img src="/admin_root/<?=$web['z_pic4']?>" width="449" height="300" /></a>
    <a href="<?=$web['z_link5']?>" target="_blank"><img src="/admin_root/<?=$web['z_pic5']?>" width="449" height="300" /></a>
    <a href="<?=$web['z_link6']?>" target="_blank"><img src="/admin_root/<?=$web['z_pic6']?>" width="449" height="300" /></a>
</div>