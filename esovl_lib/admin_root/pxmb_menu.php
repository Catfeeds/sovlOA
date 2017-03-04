<?php session_start();?>
<link href="images/root.css" rel="stylesheet" type="text/css" />
<SCRIPT language=javascript>
<!--
var ss=0;
function left_menu(meval)
{
  var left_n=document.getElementById(meval);
    if(ss!=0&&ss!=left_n){ ss.style.display='none';}
  ss=left_n;  
  
  if (left_n.style.display=='none')
  { left_n.style.display='';}
  else  
  { left_n.style.display='none';}
 
}
-->
</SCRIPT>
<?php echo"<script>window.parent.frames[1].location.href='px_mbset.php';</script>";?>
<body style="height:auto; background-image:url(images/mian_left_bg.jpg); background-repeat:repeat-y; overflow-x:hidden; overflow-y:auto;">
<div class="mian_left">
           <div class="mian_left_box01">
            <div class="mian_left_box01_00">
        	<dl>
        	<dd style="width:200px;"><span style="color:yellow;"><b><?php echo $_SESSION['pxmbsname'];?></b></span></dd>
        	</dl>
            </div>
            <div class="mian_left_box01_00">
            <dl><dt><img src="images/ico01.jpg" /></dt><dd><a href="javascript:void(null)" onClick="javascript:left_menu('box_list02');">信息设置</a></dd></dl>
            <div class="box_list" id="box_list02" style="display:none;">
<table width="137" border="0">
<tr>
    <td><a href="px_mbset.php" target="frmright">模板配置信息</a></td>
</tr>
<tr>
    <td><a href="px_mbinfo.php" target="frmright">学校信息设置</a></td>
</tr>
<td> <a href="select_pxschool.php" target="frmright">设置其他学校</a></td>

</table>
            </div>
            </div>
            
			<div class="mian_left_box01_00">
            <dl><dt><img src="images/ico01.jpg" /></dt><dd><a href="javascript:void(null)" onClick="javascript:left_menu('box_list03');">文章管理</a></dd></dl>
            <div class="box_list" id="box_list03" style="display:none;">
<table width="137" border="0">
  <!--<tr>
    <td><a href="pxmb_nclass.php" target="frmright">文章分类</a></td>
    </tr>-->
  <tr>
    <td><a href="pxmb_nlist.php" target="frmright">信息列表</a></td>
    </tr>  
  <tr>
    <td><a href="pxmb_nadd.php" target="frmright">信息添加</a></td>
  </tr>
</table>
            </div>
            </div>
			
			<div class="mian_left_box01_00">
            <dl><dt><img src="images/ico01.jpg" /></dt><dd><a href="javascript:void(null)" onClick="javascript:left_menu('box_list05');">师资环境</a></dd></dl>
            <div class="box_list" id="box_list05" style="display:none;">
<table width="137" border="0">
<tr>
    <td><a href="pxmb_tslist.php" target="frmright">信息管理</a></td>
</tr>
<tr>
    <td><a href="pxmb_tsadd.php" target="frmright">信息添加</a></td>
</tr>
</table>
            </div>
            </div>
			
<!--<div class="mian_left_box01_00">
            <dl><dt><img src="images/ico01.jpg" /></dt><dd><a href="javascript:void(null)" onClick="javascript:left_menu('box_list06');">图片新闻</a></dd></dl>
            <div class="box_list" id="box_list06" style="display:none;">
<table width="137" border="0">
  <tr>
    <td><a href="mb_newslist.php" target="frmright">图片新闻管理</a></td>
    </tr>
  <tr>
    <td><a href="mb_newsadd.php" target="frmright">添加图片新闻</a></td>
    </tr> 
</table>  </div>
            </div>-->
			
  </div> 
</div>
</body>