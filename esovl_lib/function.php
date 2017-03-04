<?php
function js_unescape($str)//反解JS的ESCAPE编码.通常先转码再解码
{
        $ret ='';
		$len = strlen($str);
		for ($i = 0; $i < $len; $i++)
        {
                if ($str[$i] == '%' && $str[$i+1] == 'u')
                {
                        $val = hexdec(substr($str, $i+2, 4));

                        if ($val < 0x7f) $ret .= chr($val);
                        else if($val < 0x800) $ret .= chr(0xc0|($val>>6)).chr(0x80|($val&0x3f));
                        else $ret .= chr(0xe0|($val>>12)).chr(0x80|(($val>>6)&0x3f)).chr(0x80|($val&0x3f));

                        $i += 5;
                }
                else if ($str[$i] == '%')
                {
                        $ret .= urldecode(substr($str, $i, 3));
                        $i += 2;
                }
                else $ret .= $str[$i];
        }
        return $ret;
}
 ////去除HTML标记，截取UTF-8字
 function utf_substr($str,$len)
{
	$str=strip_tags($str);
for($i=0;$i<$len;$i++)
{
$temp_str=substr($str,0,1);
if(ord($temp_str) > 127)
{
$i++;
if($i<$len)
{
$new_str[]=substr($str,0,3);
$str=substr($str,3);
}
}
else
{
$new_str[]=substr($str,0,1);
$str=substr($str,1);
}
}
return join($new_str);
}

 ////去除HTML标记，截取UTF-8字符串
function msubstr($str,$len)
{
for($i=0;$i<$len;$i++)
{
$temp_str=substr($str,0,1);
if(ord($temp_str) > 127)
{
$i++;
if($i<$len)
{
$new_str[]=substr($str,0,3);
$str=substr($str,3);
}
}
else
{
$new_str[]=substr($str,0,1);
$str=substr($str,1);
}
}
return join($new_str);
}
?>