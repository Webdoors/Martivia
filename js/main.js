var dialog='';
$(document).on("click",".BUT",function(){
	dialog = bootbox.dialog({
		message: '<p class="text-center">Please Wait...</p>',
		closeButton: false
	});	
		func("Glogin",{a:$(".USR").val(),b:$(".PAS").val(),c:$(".SMI").val()});
});
$(document).on("click",".SMB",function(){
	func("smslogin",{a:$(".USR").val(),b:$(".PAS").val()});
});
$(document).on("change",".FST",function(){
	window.location.href="?page=reports&id=1&status="+$(this).val();
});
$(document).on("keyup","body",function(e){
	if(e.which == 13) {	
		dialog = bootbox.dialog({
			message: '<p class="text-center">Please Wait...</p>',
			closeButton: false
		});	
		func("Glogin",{a:$(".USR").val(),b:$(".PAS").val(),c:$(".SMI").val()});
	}
});
$(document).on("click",".GLGT",function(){
	func("Glogout");
});
$(document).on("keyup",".SAVCO",function(){
	func("savecomment",{a:$(this).attr("d"),b:$(this).val()});
});
$(document).on("click",".CHE",function(){
	
	var k=0;
	if($(this).is(":checked")){
		k=1;
	}
	var de=$(this).attr("d");
	
	bootbox.confirm({
		size: "medium",
		buttons: {
			cancel: {
				label: 'არა',
				className: 'btn-danger'
			},		
			confirm: {
				label: 'დიახ',
				className: 'btn-success'
			}
		},
		message: 'დარწმუნებული ხართ?',
		callback: function (result) {
			if(result){
				func("check",{a:k,b:de});	
			}else{
				window.location.reload();
			}
		}
	});		
});
$(document).on("click",".CHE2",function(){
	
	var k=0;
	if($(this).is(":checked")){
		k=1;
	}
	var de=$(this).attr("d");
	var c=$(this).attr("c");
	
	bootbox.confirm({
		size: "medium",
		buttons: {
			cancel: {
				label: 'არა',
				className: 'btn-danger'
			},		
			confirm: {
				label: 'დიახ',
				className: 'btn-success'
			}
		},
		message: 'დარწმუნებული ხართ?',
		callback: function (result) {
			if(result){
				func("checks",{a:k,b:de,c:c});	
			}else{
				window.location.reload();
			}
		}
	});		
});
$(document).on("click",".DEL",function(){
	
	var d=$(this).attr("d");
	var t=$(this).attr("t");
	
	bootbox.confirm({
		size: "medium",
		buttons: {
			cancel: {
				label: 'არა',
				className: 'btn-danger'
			},		
			confirm: {
				label: 'დიახ',
				className: 'btn-success'
			}
		},
		message: 'დარწმუნებული ხართ?',
		callback: function (result) {
			if(result){
				func("delete",{a:t,b:d});	
			}
		}
	});		
});
var od = (new Date()).getTime();
var nd = (new Date()).getTime();
$(document).on("mousemove",function(){
	nd=(new Date()).getTime();
	var dif=nd-od;
	var difm=Math.round(((dif % 86400000) % 3600000) / 60000,2);
	//console.log(difm);	
	if(difm>=1){
		//console.log(1);
		func("notify");
		od=(new Date()).getTime();	
	}
});
function func(a,b,callback=null){
    var FD = new FormData();
    FD.append('function',a);
		for (var key in b) {
			if(b!=undefined){
				FD.append(key,b[key]);			
			}
			// console.log(a[key]);
		}
	$.ajax({  
		type: "POST", 
		cache: false,
		contentType: false,
		processData: false, 
		url: "func/func.php",
		data: FD,
		success: function (result) {
			if (result) {
				if(a=="logout"){
					location.reload();
				}
				if(a=="login"){
					location.reload();
				}
				if(a=="register"){
					location.reload();
				}
				callback(result);
			}
		}
	});
}
function menu(x) {
    x.classList.toggle("change");
	if($(x).hasClass("change")){
		$(".HLI").css({"display":"inline-block"});
	}else{
		$(".HLI").css({"display":"none"});
	}
}
var ow=$( window ).width();
$( window ).resize(function() {
	var nw=$( window ).width();
	if($( window ).width()>1125){
		$(".cont").removeClass("change");
		$(".HLI").css({"display":"inline-block"});
	}else{		
		if(ow==nw){
			$(".HLI").css({"display":"none"});			
		}
	}
});
//snackbar
function snack(a="",b="show") {

    $("#snackbar").html(a);
    $("#snackbar").attr("class",b);

    setTimeout(function(){ $("#snackbar").attr("class","");}, 3500);
}
