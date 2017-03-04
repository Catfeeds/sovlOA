<?php
include("conn.php");
header('Content-type: text/html;charset=utf-8');
$scon=$_GET["scon"];
//$st=iconv("UTF-8","GB2312",js_unescape($st));//转码后再解码
$scon=js_unescape($scon);//解码
if($scon!=""){
//mysql_query("select * from school join kkinfo on school.s_id=kkinfo.s_id where s_name like '%".$scon."%'");
 $rs=mysql_query("select * from (select kid,ktitle,s_id from kkinfo group by s_id) as k join school on k.s_id=school.s_id where school.s_name like '%".$scon."%' limit 5");
$num = mysql_num_rows($rs);
//sleep(5);
         if ($num>=1){
			 $k=0;
			  while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
			  $k=$k+1;
			   //  $rs1=mysql_query("select * from admin where a_class =".$row["a_id"]);
               //  $n_num = mysql_num_rows($rs1);			
			//echo"<a href='Education/xl_pro_detail.php?kid=".$row["kid"]."&sid=".$row["s_id"]."'>".$row["s_name"]."</a><span class='ssapn'>---学历教育---</span><br>";
			echo"<a href='Education/xl_pro_detail.php?kid=".$row["kid"]."&sid=".$row["s_id"]."'>".$row["s_name"]."</a><br>";
			    }
		  }
		  

//这里是培训学校等
$rs1=mysql_query("select * from pxschool where pxs_name like '%".$scon."%' limit 5");
$num1 = mysql_num_rows($rs1);
//sleep(5); 
         if ($num1>=1){
			 $k1=0;
			  while ($row1=mysql_fetch_array($rs1,MYSQL_ASSOC)){
			  $k1=$k1+1;
			   //  $rs1=mysql_query("select * from admin where a_class =".$row["a_id"]);
               //  $n_num = mysql_num_rows($rs1);
				 echo"<a href='Training/px_school/?pid=".$row1["pxs_id"]."'>".$row1["pxs_name"]."</a><br>";
			  }
		  }
		  
		  
//这里是留学学校等
$rs2=mysql_query("select * from lxschool where lxs_name like '%".$scon."%' limit 5");
$num2 = mysql_num_rows($rs2);
//sleep(5); 
         if ($num2>=1){
			 $k2=0;
			  while ($row2=mysql_fetch_array($rs2,MYSQL_ASSOC)){
			  $k2=$k2+1;
			   //  $rs1=mysql_query("select * from admin where a_class =".$row["a_id"]);
               //  $n_num = mysql_num_rows($rs1);
				 echo"<a href='Abroad/lx_abroad.php?sid=".$row2["lxs_id"]."'>".$row2["lxs_name"]."</a><br>";
			  }
		  }
}
?>
