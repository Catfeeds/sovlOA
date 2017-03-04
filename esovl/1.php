<?php
/**
     *截取字符串
     * @param <type> $string 输入字符串
     * @param <type> $length 长度
     * @param <type> $dot 超过长度时后缀
     * @param <type> $charset编码
     * @return <type> 
**/
function strCut($string, $length, $dot = '...',$charset='utf-8'){
	$strlen = strlen($string); //strlen — 获取字符串长度
	if($strlen <= $length) {
		return $string;
	}
	$strcut = '';
	if(strtolower($charset) == 'utf-8'){ //strtolower — 将字符串转化为小写
		$n = $tn = $noc = 0;
		while($n < $strlen){
			$t = ord($string[$n]); //ord — 返回字符的 ASCII 码值
			if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
				$tn = 1; $n++; $noc++;
			}else if(194 <= $t && $t <= 223) {
				$tn = 2; $n += 2; $noc += 2;
			}else if(224 <= $t && $t <= 239) {
				$tn = 3; $n += 3; $noc += 3;
			}else if(240 <= $t && $t <= 247) {
				$tn = 4; $n += 4; $noc += 4;
			}else if(248 <= $t && $t <= 251) {
				$tn = 5; $n += 5; $noc += 5;
			}else if($t == 252 || $t == 253){
				$tn = 6; $n += 6; $noc += 6;
			}else{
				$n++;
			}
			if($noc >= $length) {
				break;
			}
		}
		if($noc > $length){
			$n -= $tn;
		}
		$strcut = substr($string, 0, $n); //substr — 返回字符串的子串
		$strcut = $strcut.$dot;
	}else{
		$dotlen = strlen($dot);
		$maxi = $length - $dotlen - 1;
		for($i = 0; $i < $maxi; $i++){
			$strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
		}
	}
	return $strcut;
}
	
	//$com=new Common();
	// $string = '英语角时间：每周一到周五：下午14：30-晚上21：00，每周六到周日：上午11：00-晚上18：00。报名参加的学员，均可免费无限次参加，并免费提供小吃和饮料。
// 每天安排不同主题话题，生活类，商务类，时尚类，文化交流类，每场都有外籍教师亲临现场参与互动，，不用害怕说英语，说出来，原来就是这么简单！
// 这是一个绝佳的机会让你提高英语口语和听力，同时，你也可以在英语角认识很多新的朋友。在英语角里，使自己放松，融入这个环境。只要你尝试开口说英语，你就可以很快融入这个温馨快乐的英语角。
// 我们让英语学习充满乐趣，来LINGO，你会爱上学习英语，你会享受在Lingo的英语生活。我们不是一所英语学校，我们所要创造的是一个共同学习、共同进步的英语学习社区。
// 我们是个大家庭，一个小社区，我们一起吃，一起玩，一起学习，一起成长。 永远记得 ：要在LINGO玩的开心，多交朋友，放松心情，享受西方的文化，并尽最大努力开口说英语!';
	//echo strCut($string,3,"...");
?>