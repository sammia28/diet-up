$(document).ready(function(){
	$(".option-li").click(function(){  
		$(".menu").css("display", "none");
	});
	$("#btn-menu").click(function(){
		$(".menu").css("display", "block");
	});
});