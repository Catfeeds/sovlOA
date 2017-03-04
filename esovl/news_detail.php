<?php include_once("web_start.php");?>
<?php
			$row = $dblink->find("nnews",array(),"nid = '{$_GET['id']}'");
			$num=$dblink->update("nnews",array("nclick"=>$row['nclick']+1),"nid = '{$_GET['id']}'");//更新浏览次数
			//print_r($row);
			$coun = count($row);
			if ($coun>=1){
			// $row=mysql_fetch_array($rs,MYSQL_ASSOC);
			$nid=$row["nid"];
			$nclass=$row["nclass"];
			$ntitle=$row["ntitle"];
			$ncon=$row["ncon"];
			$nclick=$row["nclick"];
			$nbool=$row["nbool"];
			$ndate=$row["ndate"];
			//$rs1=mysql_query("select n_class from nclass where n_id=".$row["nclass"]);
			$row1 = $dblink->find("nclass",array(),"n_id = '{$row['nclass']}'");
			//  print_r($rs1);
			// $row1=mysql_fetch_array($rs1,MYSQL_ASSOC);
			 $ction=$row1["n_class"];
			}else{
				exit("对不起，没有找到相关信息！");
			}
			// mysql_free_result($rs1);
			// mysql_free_result($rs);
// ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $ntitle;?>-<?php echo $z_name;?></title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/top.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/bottom.css" rel="stylesheet" type="text/css" />
<script src="js/style.js"></script>
</head>

<body>
<div class="wrapper">
  <!-- top -->
  <div class="top">
    <?php 
include("top/top_1.html");
include("top/index_top1.html");
?>
  </div>
  <!-- top End -->
  <!-- main -->
  <div class="main">
    <div class="main_news">
      <?php include("left/news_left.html");?>
      <div class="main_news_right">
        <div class="main_news_right_detail">
          <div class="main_news_right_detail_box01">
            <div class="main_news_right_detail_box01_left"> <span>资讯/<strong>Education</strong></span> </div>
            <div class="main_news_right_detail_box01_right"> 您现在的位置：<a href="/">首页</a> >> <a href="news.php">资讯中心</a> >> <a href="#"><?php echo $ction;?></a> >> <strong>详细</strong> </div>
          </div>
          <div class="main_news_right_detail_box02">
            <h1><?php echo $ntitle;?></h1>
            <h2>发表于：<?php echo $ndate;?> 来源：一休网 浏览：<?php echo $nclick;?>次</h2>
<h2>
<!--Passit BUTTON BEGIN-->
<div class="passit_def_div"><a class="passit_default" target="_blank">分享到 :</a></div>
<script type="text/javascript">
var passit_title = "";//自定义分享标题，删除和留空表示使用默认
var passit_url = "";//自定义分享网址，删除和留空表示使用默认
var passit_content= "";//自定义分享内容，删除和留空表示使用默认Meta中的描述
var passit_image= "";//自定义分享图片，删除和留空表示不分享图片
var sina_appkey= "";//sina微博appkey,删除和留空表示使用默认
var qq_appkey= "";//腾讯微博appkey,删除和留空表示使用默认
</script>
<script type="text/javascript">
bookmark_service_div="qq,kxzt,qqxy,baiduHi,bookmark,baidu,douban,sohuweibo,163weibo,more";
bookmark_service="share,sinaweibo,qqweibo,tianysq,yahoo,qqkj,xnzt,more";</script>
<script type="text/javascript" src=" http://www.passit.cn/js/passit_default_bar_new.js?pub=8630&simple=1" charset="UTF-8"></script>
<!--Passit BUTTON END-->
            </h2>
            <div class="main_news_right_detail_box02_text"><?php echo $ncon;?></div>
          </div>
          <div class="main_news_right_detail_box03">
            <ul>
              <li><img src="images/top.jpg" width="15" height="15" /><a href="#">TOP</a></li>
              <li><img src="images/bottom.jpg" width="15" height="15" /><a href="news.php">[返回列表]</a></li>
            </ul>
          </div>
          <div>
		  <script type="text/javascript" id="wumiiRelatedItems"></script></div>
        </div>
      </div>
    </div>
  </div>
  <!-- main End -->
  <!-- bottom -->
  <?php include("bottom/bottom.html");?>
  <!-- bottom End -->
</div>
<script type="text/javascript">
    var wumiiPermaLink = ""; //请用代码生成文章永久的链接
    var wumiiTitle = ""; //请用代码生成文章标题
    var wumiiTags = ""; //请用代码生成文章标签，以英文逗号分隔，如："标签1,标签2"
    var wumiiSitePrefix = " http://www.esovl.com/";
    var wumiiParams = "&num=5&mode=3&pf=JAVASCRIPT";
</script>
<script type="text/javascript" src=" http://widget.wumii.com/ext/relatedItemsWidget.htm"></script>

    

</body>
</html>