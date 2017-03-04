<?php 
$url='http://www.soso.com/q?cid=w.q.wea&ie=utf-8&w=上海天气'; 
//file_get_contents()函数获取网页的html文档 
$file=file_get_contents($url); 
//通过eregi()匹配获取想要的信息
//eregi('<dl class="bo_58_sum">(.*)</dl><div class="bo_58_lis">',$file,$rw);
//print $rw[1];
eregi('<strong class="tp">(.*)</strong></dd>',$file,$rw);
print $rw[1];




/*
preg_match("/^(http:\/\/)?([^\/]+)/i",
    "http://www.php.net/index.html", $matches);
$host = $matches[2];
print_r($matches);*/



/*eregi(')</span>(.*)<span>',$file,$rg);
//echo $rg[1]."<p>";

eregi(')</span>(.*)<span>',$rg[1],$rb);
eregi('(.*) <span>',$rb[1],$rc);

print $rc[1];*/

//print $rg[1]."-------------<br>";


//echo iconv("UTF-8","gb2312",$rg[1]);//转换引用页编码
?>