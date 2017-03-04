$(document).ready(function(){
	$("#zx_qr_01_01_021 dt").mouseover(function(){		
		$("#zx_qr_01_01_021 dt").removeClass();
		$(this).addClass("zx_qr_01_01_02_011");		
	})
	$(".zx_qr_01_13").css("display", "none")
	$(".zx_qr_01_14").css("display", "none")
	$(".zx_qr_01_15").css("display", "none")
	$(".zx_qr_01_01_02_01").mousemove(function(){
		$(".zx_qr_01_12").css("display", "")
		$(".zx_qr_01_13").css("display", "none")
		$(".zx_qr_01_14").css("display", "none")
		$(".zx_qr_01_15").css("display", "none")
	})
	$(".zx_qr_01_01_02_02").mousemove(function(){
		$(".zx_qr_01_12").css("display", "none")
		$(".zx_qr_01_13").css("display", "")
		$(".zx_qr_01_14").css("display", "none")
		$(".zx_qr_01_15").css("display", "none")
	})
	$(".zx_qr_01_01_02_03").mousemove(function(){
		$(".zx_qr_01_12").css("display", "none")
		$(".zx_qr_01_13").css("display", "none")
		$(".zx_qr_01_14").css("display", "")
		$(".zx_qr_01_15").css("display", "none")
	})
	$(".zx_qr_01_01_02_04").mousemove(function(){
		$(".zx_qr_01_12").css("display", "none")
		$(".zx_qr_01_13").css("display", "none")
		$(".zx_qr_01_14").css("display", "none")
		$(".zx_qr_01_15").css("display", "")
	})
})