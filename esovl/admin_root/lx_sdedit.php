<?php include("../conn.php");?>
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>留学版新闻新闻列表</TITLE>
<link href="images/root.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="lgHttp.js"></script>
</head>
<?php
 $sql="select * from lxsclass order by ls_id asc";
 $rs=mysql_query($sql,$conn);
?>
<script language = "JavaScript">
var onecount;
var threecount;
onecount=0;
subcat = new Array();
<?php 
   $count = 0;
   while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
?>
subcat[<?=$count?>] = new Array("<?=$row["ls_title"]?>","<?=$row["lb_id"]?>","<?=$row["ls_id"]?>");
<?php
        $count = $count + 1;
   }
?>
		
$onecount=<?=$count?>;

function changelocation(locationid)
    {
    document.lxsdform.lx_sdscl.length = 0; 
    var locationid=locationid;
    var i;
    for (i=0;i < $onecount; i++)
        {
            if (subcat[i][1] == locationid)
            { 
             document.lxsdform.lx_sdscl.options[document.lxsdform.lx_sdscl.length] = new Option(subcat[i][0], subcat[i][2]);
            }        
        }                 
    }    
 
-->
</script>
</HEAD>

<BODY>
<?php
if (@$_COOKIE["a_class"]>1) {
  echo "<br><div align='center'><font style='color:red; font-size:9pt;'>您没有管理该模块的权限！</font></div>";
  exit();
}

  if (isset($_POST["lx_sdtitle"])){
	 $sql="update lxsdnews set lx_sdbcl=".$_POST["lx_sdbcl"].",lx_sdscl='".$_POST["lx_sdscl"]."',lx_sdtitle='".$_POST["lx_sdtitle"]."',lx_sdcon='".$_POST["lx_sdcon"]."',lx_sdbool=".$_POST["lx_sdbool"].",lx_sdsource='".$_POST["lx_sdsource"]."',lx_sdate='".$_POST["lx_sdate"]."' where lx_sdid=".$_POST["sdid"];
	  $rs=mysql_query($sql,$conn);
	  if ($rs){
      echo"<script>alert('新闻编辑成功');location.href='lx_sdlist.php';</script>";
	  }else{
		  echo $sql."<br>";
	  exit("编辑失败! 错误新闻为:".mysql_error());
	  }
  }


 $sql="select * from lxsdnews where lx_sdid=".$_GET["id"];
	  $rs=mysql_query($sql,$conn);
	  if (!$rs){	 
	  exit("查询失败! 错误信息为:".mysql_error());
	  }else{
	  $row=mysql_fetch_assoc($rs);
	  }
	  
include('fckeditor/fckeditor.php') ;
$sBasePath = 'fckeditor/';
$oFCK = new FCKeditor('lx_sdcon') ;
$oFCK->BasePath = $sBasePath ;
?> 


<br>
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#3e70a5" class="tableborder">
  <tr>
    <th height="24" nowrap="nowrap"><div class="mian_right_box_title_01" style="text-align:left;">留学视点新闻新闻：编辑，修改介绍新闻相关的内容</div></th>
  </tr>
  <tr>
    <td height="24" align="center" nowrap="nowrap" bgcolor="#e7ebe7"  class="forumrow"></td>
  </tr>
</table>
<br>
<div class="s_info">
<table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#93B3E9">
<form name="lxsdform"  method="post" action="">
  <tr>
    <td colspan="2" class="mian_right_box_title_01">【编辑留学视点新闻新闻】</td>
	</tr> 
	<tr>
	    <td width="255" height="40" align="right" bgcolor="#FFFFFF" class="title">选择视点大类：</td>
        <td width="1080" bgcolor="#FFFFFF" class="title" style="padding-left:12px;">

<select name="lx_sdbcl" size="1" id="lx_sdbcl" onBlur="return lxsdset()" onChange="changelocation(document.lxsdform.lx_sdbcl.options[document.lxsdform.lx_sdbcl.selectedIndex].value)">
 <option id="op_bg" value="0">--请选择分类--</option>
	  <?php 
	 // $selclass=$row["shopxpbe_id"];
      $sqt="select * from lxbclass";
	  $rst=mysql_query($sqt,$conn);
	  if (mysql_num_rows($rst)>=1){
	  while ($rowt=mysql_fetch_array($rst,MYSQL_ASSOC)){
      ?>
		  <option value="<?=$rowt["lb_id"]?>" <?php if($rowt["lb_id"]==$row["lx_sdbcl"]){echo "selected";}?>><?=$rowt["lb_title"]?></option>
	  <?php
          }}
	  ?>
</select><span id="lxd"></span>
		选择视点小类：
          <select name="lx_sdscl" size="1">
          
           <?php 	
      $sqt="select * from lxsclass where lb_id=".$row["lx_sdbcl"]." order by ls_id asc";
	  $rst=mysql_query($sqt,$conn);
	  if (mysql_num_rows($rst)>=1){
	  while ($rowt=mysql_fetch_array($rst,MYSQL_ASSOC)){
      ?>
		  <option value="<?=$rowt["ls_id"]?>" <?php if($rowt["ls_id"]==$row["lx_sdscl"]){echo "selected";}?>><?=$rowt["ls_title"]?></option>
	  <?php
          }}
	  ?>
          
          </select>
          <input type="hidden" name="sdid" value="<?=$_GET["id"]?>"></td>
      </tr>
	  <tr>
	    <td height="4" align="right" bgcolor="#FFFFFF" class="title">新闻标题：</td>
	    <td bgcolor="#FFFFFF" class="title"><input type="text" name="lx_sdtitle" maxlength="40" style="width:300px;" value="<?=$row["lx_sdtitle"]?>" onBlur="return lxsdnewsset()"/>
        <span id="lxsdtitle">*</span></td>
      </tr>
	 <!-- <tr>
	    <td height="4" align="right" bgcolor="#FFFFFF" class="title">新闻小图：</td>
	    <td colspan="2" bgcolor="#FFFFFF" class="title"><input type="text" name="lx_npic" size="50"><input type="button" value="浏览" onClick="window.open('up2.php?formname=lxnform&editname=lx_npic&uppath=upload','','status=no,scrollbars=no,top=400,left=500,width=420,height=165')"></td>
      </tr>-->
	  <tr>
	    <td height="56" align="right" bgcolor="#FFFFFF" class="title">新闻内容：</td>
        <td bgcolor="#FFFFFF" class="title" style="padding-left:12px;">
		<?php 
		$oFCK->Value  = $row["lx_sdcon"];
		$oFCK->Create();?>
        </td>
    </tr>
	  <tr>
	    <td height="28" align="right" bgcolor="#FFFFFF" class="title">是否推荐：</td>
        <td bgcolor="#FFFFFF" class="title"><input type="radio" name="lx_sdbool" value=1 <?php if($row["lx_sdbool"]==1){echo "checked";}?>>
          是 
          <input type="radio" name="lx_sdbool" value=0 <?php if($row["lx_sdbool"]==0){echo "checked";}?>>
          否</td>
    </tr>
	  <tr>
	    <td height="27" align="right" bgcolor="#FFFFFF" class="title">来源：</td>
	    <td bgcolor="#FFFFFF" class="title"><input type="text" name="lx_sdsource" value="<?=$row["lx_sdsource"]?>"></td>
      </tr>
	  <tr>
	    <td height="35" align="right" bgcolor="#FFFFFF" class="title">提交时间：</td>
	    <td bgcolor="#FFFFFF" class="title"><input type="text" name="lx_sdate" value="<?=date("Y-m-d H:i:s")?>" maxlength="40" readonly style="width:300px;"/></td>
      </tr>
	  <tr>
	    <td height="29" align="right" bgcolor="#FFFFFF" class="title">&nbsp;</td>
        <td bgcolor="#FFFFFF" class="title"><input type="submit" name="Submit" onClick="return lxsdset()" value="更新新闻"></td>
    </tr>
  </form>
</table>
</div>
</BODY>
</HTML>
