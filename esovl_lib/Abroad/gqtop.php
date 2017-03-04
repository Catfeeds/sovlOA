<div class="country_a">
<ul>
<!-- pic size:115*55px -->
<?php
//$sql="select * from lxgjclass where lx_gqico!='' order by lx_gjid asc limit 10";
$res = $dblink->findAll('lxgjclass','',"lx_gqico!=''",'','10','lx_gjid asc ');
foreach($res as $row){
?>
<li><img src="../admin_root/<?=$row["lx_gqico"]?>" onLoad="javascript:if(this.width>=this.height&&this.width>=25){this.width=25};if(this.height>this.width&&this.height>=17){this.height=17};"/><span><a href="country_school.php?gjid=<?=$row["lx_gjid"]?>"><?=$row["lx_gjcl"]?></a></span></li>
<?php }?>
<li><a href="country_gq_list.php" id="more">更多>></a></li>
</ul>
</div>