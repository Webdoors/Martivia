$(document).on("click",".GSC",function(){
	func("getscore",$(this).attr("d"));
});
$(document).on("click",".GSM",function(){
	func("getmatrix",$(this).attr("d"));
});