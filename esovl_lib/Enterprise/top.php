
<div class="top">
    	<div class="top_box01">
            <ul>
                <li><label class="icon_user">用户名：</label><input type="text" /></li>
                <li><label>密码：</label><input type="password" /></li>
                <li><img src="images/lx_dl.gif" /></li>
                <li><a href="../vip_zc.php"><img src="images/lx_zc.gif" /></a></li>
                <li><a href="#">忘记密码？</a></li>
            </ul>
            <p class="add">网站导航：<a href="../Education">学历</a> | <a href="../Training">培训</a> | <a href="../Research">研修</a> | <a href="../Abroad">留学</a></p>
        </div>
    	<div class="logo"><img src="images/logo.jpg" /></div>
        <div class="nav">
        	<ul>
            	<li><a href="http://<?php echo $_SERVER['SERVER_NAME'];?>">一休首页</a></li>
                 <li><a href="../Enterprise">企培首页</a></li>
                <li><a href="qp_new_detial2.php">企培中心</a></li>
                <li><a href="qp_course.php">企培课程</a></li>
                <li><a href="qp_teacher.php">学校老师</a></li>
                <li><a href="qp_school.php">学校环境</a></li>
<?php
$sql="select * from qp_news_class order by class_num asc limit 0,1";
$rs=mysql_query($sql);
if (mysql_num_rows($rs)>=1){
$k=0;
while ($row=mysql_fetch_array($rs,MYSQL_ASSOC)){
$k=$k+1;
?>
<li><a href="qp_new_list2.php?cl=<?php echo $row["class_id"];?>">新闻中心</a></li>
<?PHP }}?>
                <li><a href="qp_faq.php">学员问答</a></li>
                <li><a href="#">联系我们</a></li>
            </ul>
        </div>
	</div>