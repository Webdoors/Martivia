$(function(){
	$(document).on("click",".ADME",function(){
		func("addmerchant",$(".MNA").val(),$(".MC").val(),$(".MU").val());
	});
	$(document).on("change click",".INS",function(){
		if($(this).attr("t")=="chb"){
			var k=0;
			if($(this).is(":checked")){
				k=1;
			}
			func("updmerchant",$(this).attr("d"),k);			
		}
		if($(this).attr("t")=="dem"){
			var k=0;
			if($(this).is(":checked")){
				k=1;
			}
			func("godemo",$(this).attr("d"),k);			
		}
	});
	$(document).on("click",".DELM",function(){
    var txt;
    var r = confirm("დარწმუნებული ხართ რომ გსურთ წაშლა?");
    if (r == true) {
		func("delmerchant",$(this).attr("d"));
    } else {
		
    }
	});
});