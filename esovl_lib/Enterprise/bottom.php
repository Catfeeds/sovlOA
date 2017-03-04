<?php
$sql="select * from web_step where z_id =0";
		$rs=mysql_query($sql,$conn);
		
		if (mysql_num_rows($rs)>=1){	
		    $row=mysql_fetch_assoc($rs);
						$z_tel=$row["z_tel"];
						$z_address=$row["z_address"];
						$z_icp=$row["z_icp"];
}
?>
<div class="bottom">
    <div class="bottom_box01">
        	<h1>
                    <?php
              $sql="select * from cpinfo where cp_id<>10";
              $rs=mysql_query($sql);
              if (mysql_num_rows($rs)>=1){
                  $k=0;
                  while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
                  $k=$k+1;
		?>        <a href="../about.php?cid=<?=$row["cp_id"]?>">
        <?=$row["cp_title"]?>
        </a>
        <?php }}?></h1>
            <p>联系电话：<?php echo $z_tel;?>  地址：<?php echo $z_address;?><br />
Copyright &copy; 2011, 版权所有 一休网  <?php echo $z_icp;?></p>
        </div>
    </div>    
    
    
    
    
    
    