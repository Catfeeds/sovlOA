<?php
include("conn.php");
header('Content-type: text/html;charset=utf-8');
//$rs=mysql_query("select * from (select * from kkinfo where select distinct s_id from kkinfo)as k join school on school.s_id=k.s_id");
$rs=mysql_query("select * from (select kid,ktitle,s_id from kkinfo group by s_id) as k join school on k.s_id=school.s_id");
//$rs=mysql_query("select distinct s_id from kkinfo");
$num = mysql_num_rows($rs);
//sleep(5);
          if ($num>=1){
			  while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){			  
			   //  $rs1=mysql_query("select * from admin where a_class =".$row["a_id"]);
               //   $n_num = mysql_num_rows($rs1);
			  echo $row["ktitle"].$row["kid"]."约".$num."条信息</span></a><br>";
			  }
		  }
?>