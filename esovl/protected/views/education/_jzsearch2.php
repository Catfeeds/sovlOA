<script>
function searchjz(){
	var Url="<?=Yii::app()->createUrl("/education/jzsearch")?>";

	var skey=document.getElementById("xl_skey");
	if(skey.value)Url+="/skey/"+skey.value;
	location.href=Url;
	return false
}
</script>
<div class="main_xl_pro_box02_list">
	<div class="main_xl_pro_box02_list00">
		<form onsubmit="return searchjz()" action="">
			<ul>
				<li>填写搜索关键词：</li>
				<li><input id="xl_skey" type="text" style="width:220px;" /></li>
				<li><input  type="image" src="/images/ss_pro.jpg" style="cursor:pointer; width:60px; height:24px;"/></li>
			</ul>
		</form>
		<div class="pro_search_key"> <span>搜索关键词：</span>
		<a target='_blank' href="<?=Yii::app()->createUrl("/education/jzsearch",array("szyclass"=>"高起专"))?>">高起专</a>
		<a target='_blank' href="<?=Yii::app()->createUrl("/education/jzsearch",array("szyclass"=>"高起本"))?>">高起本</a>
		<a target='_blank' href="<?=Yii::app()->createUrl("/education/jzsearch",array("skey"=>"成人高复"))?>">成人高复</a>
		<a target='_blank' href="<?=Yii::app()->createUrl("/education/jzsearch",array("skey"=>"自学考试"))?>">自学考试</a>
		<a target='_blank' href="<?=Yii::app()->createUrl("/education/jzsearch",array("szyclass"=>"专升本"))?>">专升本</a>
		<a target='_blank' href="<?=Yii::app()->createUrl("/education/jzsearch",array("szyname"=>"财务管理"))?>">财务管理</a>
		<a target='_blank' href="<?=Yii::app()->createUrl("/education/jzsearch",array("skey"=>"培训"))?>">培训</a>
		</div>
	</div>
</div>