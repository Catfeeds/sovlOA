<?php
$qpweb=QpSetp::model()->findByPk(1);
?>
<div class="main_left_box01">
	<div class="main_left_box01_title">
    	<dl><dt>报名咨询直通车</dt><dd>&nbsp;</dd></dl>
    </div>
    <div class="main_left_box01_list00">
    	<div class="main_left_box01_list_qq">
			<ul>
			<?php foreach ($kefu as $val){?>
				<li><a href="tencent://message/?uin=<?=$val['number']?>&Site=<?=$this->pageTitle?>&Menu=yes" title="<?=$val['name']?>"><img border="0" src=http://wpa.qq.com/pa?p=1:<?=$val['number']?>:1 align="top"/></a></li>
			<?php }?>
			</ul>
			<dl>
				<dt>热线电话</dt>
				<dd><?php echo $qpweb->qp_tel;?></dd>
			</dl>
        </div>
    </div>
</div>