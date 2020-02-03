$(function(){
	$(document).on("click",".DELA",function(){
    var txt;
    var r = confirm("დარწმუნებული ხართ რომ გსურთ წაშლა?");
    if (r == true) {
		func("deladmin",$(this).attr("d"));
    } else {
		
    }
	});
	$(document).on("click",".ADA",function(){
		func("addadmin",$(".AN").val(),$(".AL").val(),$(".AU").val(),$(".AP").val(),$(".AT").val());
	});
	$(document).on("click",".PRM",function(){
		func("getpermissions",$(this).attr("d"));
	});
	$(document).on("click",".PAD",function(){
		var k=0;
		if($(this).is(":checked")){
			k=1;
		}
		func("updatepermissions",$(this).attr("d"),$(this).attr("aid"),k);
	});
});