<?php 
include_once("../web_start.php");
$rowa=$dblink->find("yx_step",array(),"yx_id =8");
?>
<?php include('Research_head.php');?>
<body>
<div class="wrapper">
<!-- top -->
<?php include('yx_top.html'); ?>
<!-- top end -->
<!-- main -->
	<div class="main">  
     <div class="main_box002"><img src="/Research/images/yx_b01.jpg" width="950" height="4" /></div>
     <div class="main_ssou001">
        <div class="ssou_left"><img src="/Research/images/jzsou_logo.jpg" width="143" height="61" /></div>
        <form name="soform" method="get" action="yx_seach.php">  
					<div class="ssou_right">
						<ul>
						<li>
							<select name="yxk_school" >
								<option value="" selected="selected" onclick="">选择学校</option>
								<?php
								$row1=$dblink->findAll("yx_school",array());
								foreach($row1 as $v){
								?>
									<option value="<?=$v["school_id"]?>"><?=$v["school_name"]?></option>
								<?php }?>
							</select>
						  </li>
						  <li>
						  <select name="class_title">
								<option value="" selected="selected">选择专业</option>
								<?php
								$row2=$dblink->findAll("yx_class",array());
								foreach($row2 as $v){
								?>
								<option value="<?=$v["class_id"]?>"><?=$v["class_title"]?></option> 
								<?php }?>          
						  </select>
						  </li>
						  <li>
						  <select name="yxk_title">
								<option value="" selected="selected">选择课程</option>
								<?php
								$row3=$dblink->findAll("yx_kaike",array());
								foreach($row3 as $v){
								?>
									<option value="<?=$v["yxk_id"]?>"><?=$v["yxk_title"];?></option> 
								<?php }?>
						  </select>
						  </li>
						  <li><input name="skey" type="text"/></li>
						  <li>
						  <img src="/Research/images/yx_sou.jpg" onclick="document.soform.submit();" style="cursor:pointer;"/>
						  </li>
						  </ul>
					  </div>
				</form>
     </div>
     <div class="main_box002"><img src="/Research/images/yx_b02.jpg" width="950" height="4" /></div>
     <div class="main_xl_pro_box03">
       <div class="yx_daquan01">
       <div><img src="/Research/images/yx_daquan_01.jpg" width="305" height="34" /></div>
       <div class="yx_dq_tb01">
         <table width="100%" border="0" cellpadding="1" cellspacing="1" style="border:none;" bgcolor="#CED2D5"> 
				<tr>
				<?php
				$k=0;
				$row=$dblink->findAll("yx_school",array());	
				foreach($row as $v){
				$k=$k+1;
				?>
					<td bgcolor="#FFFFFF"><a href="/Research/yx_seach.php?school_id=<?=$v["school_id"]?>"><?=$v["school_name"]?></a></td>
					<?php if ($k>2){ echo"<tr>"; $k=0;}
				}
				for($i=1;$i<=2;$i++){echo "<td bgcolor='#FFFFFF'></td>";}?>
				</tr>        
        </table>
       </div>
       </div>
       
       <div class="yx_daquan02">
       <div><img src="/Research/images/yx_daquan_03.jpg" width="305" height="34" /></div>
       <div class="yx_dq_tb03">
        <table width="100%" border="0" cellpadding="1" cellspacing="1" style="border:none;" bgcolor="#CED2D5">
				<tr>
					<?php
					$k=0;
					$row=$dblink->findAll("yx_class",array());	
					foreach($row as $v){
					$k=$k+1;
					?>
					<td bgcolor="#FFFFFF"><a href="/Research/yx_seach.php?class_id=<?=$v["class_id"]?>"><?=$v["class_title"]?></a></td>
					<?php
					if ($k>2){echo"<tr>";$k=0;}
					}
					for($i=1;$i<=2;$i++){echo "<td bgcolor='#FFFFFF'></td>";}
					?>
				</tr>
         </table>
       </div>
       </div>
	   <div class="yx_daquan03">
        <div><img src="/Research/images/yx_daquan_02.jpg" width="305" height="34" /></div>
       <div class="yx_dq_tb02">
         <table width="100%" border="0" cellpadding="1" cellspacing="1" style="border:none;" bgcolor="#CED2D5">
           <tr>
					<?php
					$k=0;
					$row=$dblink->findAll("yx_kaike",array());	
					foreach($row as $v){
					$k=$k+1;
					?>
						<td bgcolor="#FFFFFF"> <a href="/Research/yx_seach.php?skey=<?=$v["yxk_title"];?>"><?=$Common->strCutAndTags($v["yxk_title"],14,'..')?></a></td>
						<?php if ($k>2){echo"<tr>"; $k=0;}
					}
					for($i=1;$i<=2;$i++){echo "<td bgcolor='#FFFFFF'></td>";}?>
           </tr>
         </table></div>
       </div>
     </div>
	</div>
<!-- main end -->
<!-- bottom -->
<?php include('yx_bottom.html'); ?>
<!-- bottom end -->	
</div>
</body>
</html>