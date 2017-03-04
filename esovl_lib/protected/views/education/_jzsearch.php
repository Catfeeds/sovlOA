<script>
function searchjz(){
	var Url="<?=Yii::app()->createUrl("/education/jzsearch")?>";
	var sschool=document.getElementById("sschool");
	if(sschool.options[sschool.selectedIndex].value)Url+="/sschool/"+sschool.options[sschool.selectedIndex].value;

	var szyclass=document.getElementById("szyclass");
	if(szyclass.options[szyclass.selectedIndex].value)Url+="/szyclass/"+szyclass.options[szyclass.selectedIndex].value;
	
	var szyname=document.getElementById("szyname");
	if(szyname.options[szyname.selectedIndex].value)Url+="/szyname/"+szyname.options[szyname.selectedIndex].value;
	
	var skey=document.getElementById("skey");
	if(skey.value)Url+="/skey/"+skey.value;
	location.href=Url;
}
</script>
<div class="main_xl_pro_box02_list">
	<form name="soform" method="get" action="<?=Yii::app()->createUrl("Education/jzsearch")?>">
    	<div class="main_xl_pro_box02_list00">
        	<ul>
            	<li>
					<select id="sschool" style="width:170px;">
						<option value="">选择学校</option>
						<?php	$schoolmodels=School::model()->findAll();
								foreach($schoolmodels as $row){?>
									<option <?=isset($_GET['sschool'])&&$_GET['sschool']==$row["s_id"]?"selected='selected'":""?> value="<?php echo $row["s_id"]?>"><?php echo $row["s_name"]?></option>
						<?php 	}?>
					</select>
                </li>
                <li>
					<select id="szyclass"> 
						<option value="">选择专业类别</option>
						<?php	$xlcalmodels=Xlcal::model()->findAll();
								foreach($xlcalmodels as $row){?>
									<option <?=isset($_GET['szyclass'])&&$_GET['szyclass']==$row["zy_class"]?"selected='selected'":""?> value="<?php echo $row["zy_class"];?>"><?php echo $row["zy_class"];?></option>
						<?php 	} ?>
					</select>
                </li>
                <li>
					<select  id="szyname">
						<option value="">选择专业</option>
						<?php	$xlmcmodels=Xlmc::model()->findAll();
								foreach($xlmcmodels as $row){?>
									<option <?=isset($_GET['szyname'])&&$_GET['szyname']==$row["mc_title"]?"selected='selected'":""?> value="<?php echo $row["mc_title"];?>"><?php echo $row["mc_title"];?></option>
						<?php 	} ?>
					</select>
                </li>
                <li><input id="skey" type="text" value='<?=isset($_GET['skey'])&&$_GET['skey']?$_GET['skey']:""?>' /></li>
                <li><img src="/images/ss_pro.jpg" onclick="searchjz();" style="cursor:pointer;"/></li>
            </ul>
            <h1><a href="javascript:void(0)">高级搜索</a><br />
            <a href="javascript:void(0)">使用帮助</a></h1>
		</div>
	</form>
</div>
	