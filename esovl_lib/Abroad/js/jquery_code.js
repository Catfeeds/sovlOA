/*Tab 选项卡 标签*/
$(function(){
	    var $div_li =$(".main_lm_list_t ul li");
	    $div_li.mouseover(function(){
			$(this).addClass("hd")            //当前<li>元素高亮
				   .siblings().removeClass("hd");  //去掉其他同辈<li>元素的高亮
            var index =  $div_li.index(this);  // 获取当前点击的<li>元素 在 全部li元素中的索引。
			$(".tab_box > div")   	//选取子节点。不选取子节点的话，会引起错误。如果里面还有div 
					.eq(index).show()   //显示 <li>元素对应的<div>元素
					.siblings().hide(); //隐藏其他几个同辈的<div>元素
		}).hover(function(){
			$(this).addClass("hover");
		},function(){
			$(this).removeClass("hover");
		})
})
/*Tab 选项卡 面试讲座*/
$(function(){
	    var $div_li =$(".main_box02_cen_title ul li");
	    $div_li.mouseover(function(){
			$(this).addClass("daqian")            //当前<li>元素高亮
				   .siblings().removeClass("daqian");  //去掉其他同辈<li>元素的高亮
            var index =  $div_li.index(this);  // 获取当前点击的<li>元素 在 全部li元素中的索引。
			$(".tab_box00 > div")   	//选取子节点。不选取子节点的话，会引起错误。如果里面还有div 
					.eq(index).show()   //显示 <li>元素对应的<div>元素
					.siblings().hide(); //隐藏其他几个同辈的<div>元素
		}).hover(function(){
			$(this).addClass("hover");
		},function(){
			$(this).removeClass("hover");
		})
})
/*ly*/
$(document).ready(function(){
  $("#lyb_anniu01").click(function(){
  $("#lyb_anniu02").show();
  $("#lyb_anniu01").hide();
  $("#main_lyb_list").show(1000);
  });
  $("#lyb_anniu02").click(function(){
  $("#lyb_anniu02").hide();
  $("#lyb_anniu01").show();
  $("#main_lyb_list").hide(1000);
  });
});
/*hot*/
$(function(){
	    var $div_li =$(".main_box01_left_l ul li");
	    $div_li.mouseover(function(){
			$(this).addClass("hd_bg")            //当前<li>元素高亮
				   .siblings().removeClass("hd_bg");  //去掉其他同辈<li>元素的高亮
            var index =  $div_li.index(this);  // 获取当前点击的<li>元素 在 全部li元素中的索引。
			$(".hot > div")   	//选取子节点。不选取子节点的话，会引起错误。如果里面还有div 
					.eq(index).show()   //显示 <li>元素对应的<div>元素
					.siblings().hide(); //隐藏其他几个同辈的<div>元素
		}).hover(function(){
			$(this).addClass("hover");
		},function(){
			$(this).removeClass("hover");
		})
})