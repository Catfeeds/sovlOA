/*Tab 选项卡 企培课程详细*/
$(function(){
	    var $div_li =$(".new_right_box_list_qpkcxx_right_box_l_t ul li");
	    $div_li.click(function(){
			$(this).addClass("xxk01")            //当前<li>元素高亮
				   .siblings().removeClass("xxk01");  //去掉其他同辈<li>元素的高亮
            var index =  $div_li.index(this);  // 获取当前点击的<li>元素 在 全部li元素中的索引。
			$(".new_right_box_list_qpkcxx_right_box_l_b > div")   	//选取子节点。不选取子节点的话，会引起错误。如果里面还有div 
					.eq(index).show()   //显示 <li>元素对应的<div>元素
					.siblings().hide(); //隐藏其他几个同辈的<div>元素
		}).hover(function(){
			$(this).addClass("hover");
		},function(){
			$(this).removeClass("hover");
		})
})