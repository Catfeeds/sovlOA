<?php
$sql="select * from qp_setp where qp_id=1";
		$rs=mysql_query($sql,$conn);
		if (mysql_num_rows($rs)>=1){	
		    $row=mysql_fetch_assoc($rs);
						$qp_tel=$row["qp_tel"];

}
?>
<div class="main_left_box01">
            	<div class="main_left_box01_title">
                	<dl><dt>报名咨询直通车</dt><dd>&nbsp;</dd></dl>
                </div>
                <div class="main_left_box01_list00">
                	<div class="main_left_box01_list_qq">
<ul>
<li><a title="在线咨询1" href="tencent://message/?uin=313081169&amp;Site=一休教育网&amp;Menu=yes"><img border="0" align="top" src="http://wpa.qq.com/pa?p=1:313865736:1"></a></li>
<li><a title="在线咨询2" href="tencent://message/?uin=540395592&amp;Site=一休教育网&amp;Menu=yes"><img border="0" align="top" src="http://wpa.qq.com/pa?p=1:540395592:1"></a></li>
</ul>
<dl>
<dt>热线电话</dt><dd><?php echo $qp_tel;?></dd>
</dl>
                    </div>
                </div>
            </div>