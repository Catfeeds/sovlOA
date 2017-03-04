<?php
if (isset($_GET["sid"])){
//$_SESSION["sid"]=$_GET["sid"];//国外空间上莫名不能用。以下写数据库代替SESSION传值
mysql_query("update school set s_bj=0");//把当前状态都变成非活动
mysql_query("update school set s_bj=1 where s_id=".$_GET["sid"]);
mysql_query("update school set s_click=s_click+1 where s_id=".$_GET["sid"]);//更新浏览次数
}

$sql="select * from school where s_bj=1";
$rs=mysql_query($sql);
if (mysql_num_rows($rs)>=1){
$row=mysql_fetch_assoc($rs);
$s_name=$row["s_name"];//学院名称
$s_id=$row["s_id"];
$s_banner=$row["s_banner"];//学院banner
$s_xyjs=$row["s_xyjs"];// 学院介绍
$s_banner=$row["s_banner"];//学院banner
$s_bxys=$row["s_bxys"];//办学优势
$s_zsdx=$row["s_zsdx"];//招生对象
$s_xxhj=$row["s_xxhj"];//学校环境
$s_kkxx=$row["s_kkxx"];//开课信息
$s_bmxz=$row["s_bmxz"];//报名须知
$s_xlxw=$row["s_xlxw"];//学历学位
$s_click=$row["s_click"];

}else{
exit('参数有误！');
}


if (isset($_GET["kid"])){
      mysql_query("update kkinfo set k_bj=0");//把当前状态都变成非活动
      mysql_query("update kkinfo set k_bj=1 where kid=".$_GET["kid"]);
}
		$sq2="select * from kkinfo where k_bj=1";
	    $rs2=mysql_query($sq2);
		if (mysql_num_rows($rs2)>=1){
		$row2=mysql_fetch_assoc($rs2);
		$kid=$row2["kid"];
		$zycon=$row2["zycon"];
		$zyclass=$row2["zyclass"];
		$zyname=$row2["zyname"];
//y记录COOKIE值
//这里进行判断，问题就出在这里。
//if (isset($_GET["kid"])){
////echo "有KID".$_GET["kid"];
//if (strpos(@$_SESSION["kkid"],$_GET["kid"])<=0){
//@$_SESSION["kkid"]=@$_SESSION["kkid"].",".$_GET["kid"];
//}
//echo "--".@$_COOKIE["kkid"];
//$_SESSION["kkid"]="";
}
?>