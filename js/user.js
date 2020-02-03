$(document).on("change keyup",".PRM",function(){
	func("updmatrixpars",$(this).val(),$(this).attr("d"),$(".MID").val());
});