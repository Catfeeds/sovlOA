<?php
/*
* @$page 当前页数
* @$total 记录总条数
* @$phpfile Url链接
* @$pagesize 每页显示条数
*/
function page($page,$total,$phpfile,$pagesize=3){
$pagelen=5;
if(!strpos($phpfile,"?"))$phpfile.="?";
$file=explode("&",$phpfile);
$url="";
foreach($file as $key=>$val){
	$str=$url?"&":"";
	if(strpos($val,"page=")===0)continue;
	$url.=$str.$val;
}
$pagecode = "";//定义变量，存放分页生成的HTML
$page = intval($page);//避免非数字页码
$total = intval($total);//保证总记录数值类型正确
if(!$total) return array('url'=>$url,'curpage'=>"0",'pagetotal'=>"0",'pagecode'=>"",'pagecode1'=>"",'sqllimit'=>'');//总记录数为零返回空数组
$pages = ceil($total/$pagesize);//计算总分页
//处理页码合法性
if($page<1) $page = 1;
if($page>$pages) $page = $pages;
//计算查询偏移量
$offset = $pagesize*($page-1);
//页码范围计算
$init = 1;//起始页码数
$max = $pages;//结束页码数
$pagelen = ($pagelen%2)?$pagelen:$pagelen+1;//页码个数
$pageoffset = ($pagelen-1)/2;//页码个数左右偏移量

//生成html
$pagecode='';
$pagecode1='';
$curpage=$page.'/'.$pages;//第几页,共几页
//如果是第一页，则不显示第一页和上一页的连接


if($page!=1){
	$pagecode.='<li><a href="'.$url.'&page=1">首页</a></li>';
	$pagecode.='<li class="fy01"><a href="'.$url.'&page='.($page-1).'">上一页</a></li>';
	$pagecode1.='<a href="'.$url.'&page='.($page-1).'"><<</a>';
}else{
	$pagecode.='<li>首页</li>';
	$pagecode.='<li class="fy01">上一页</li>';
	$pagecode1.='<span class="bwhite"><<</span>';
}
//分页数大于页码个数时可以偏移
if($pages>$pagelen){
	//如果当前页小于等于左偏移
	if($page<=$pageoffset){
		$init=1;
		$max = $pagelen;
	}else{//如果当前页大于左偏移
	//如果当前页码右偏移超出最大分页数
		if($page+$pageoffset>=$pages+1){
			$init = $pages-$pagelen+1;
		}else{
			//左右偏移都存在时的计算
			$init = $page-$pageoffset;
			$max = $page+$pageoffset;
		}
	}
}
//生成html
for($i=$init;$i<=$max;$i++){
	if($i==$page){
		$pagecode.='<li>'.$i.'</li>';
		$pagecode1.='<span class="bwhite">'.$i.'</span>';
	} else {
		$pagecode.="<li><a href=\"{$url}&page={$i}\">$i</a></li>";
		$pagecode1.="<a href=\"{$url}&page={$i}\">$i</a>";
	}
}
if($page!=$pages){
	$pagecode.='<li class="fy01"><a href="'.$url.'&page='.($page+1).'">>></a></li>';
	$pagecode.='<li><a href="'.$url.'&page='.($pages).'">尾页</a></li>';
	$pagecode1.='<a href="'.$url.'&page='.($page+1).'">>></a>';
}else{
	$pagecode.='<li class="fy01">下一页</li>';
	$pagecode.='<li>尾页</li>';
	$pagecode1.='<span class="bwhite">>></span>';
}


$pagecode.='';
return array('url'=>$url,'curpage'=>$curpage,'pagetotal'=>$total,'pagecode'=>$pagecode,'pagecode1'=>$pagecode1,'sqllimit'=>''.$offset.','.$pagesize);


}





?>