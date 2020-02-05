var dialog='';
$(document).on("click",".BUT",function(){
	dialog = bootbox.dialog({
		message: '<p class="text-center">Please Wait...</p>',
		closeButton: false
	});	
		func("Glogin",$(".USR").val(),$(".PAS").val(),$(".SMI").val());
});
$(document).on("click",".SMB",function(){
	func("smslogin",$(".USR").val(),$(".PAS").val());
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
		func("Glogin",$(".USR").val(),$(".PAS").val(),$(".SMI").val());
	}
});
$(document).on("click",".GLGT",function(){
	func("Glogout");
});
$(document).on("keyup",".SAVCO",function(){
	func("savecomment",$(this).attr("d"),$(this).val());
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
				func("check",k,de);	
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
				func("checks",k,de,c);	
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
				func("delete",t,d);	
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
function func(a,b){
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
			}
		}
	});
}
function func2(f, a, b, c, d, e, g, h, i, j, k, l, m) {
		var FD = new FormData();
		FD.append('fname',f);
		if(a!=undefined){
			FD.append('a',a);			
		}
		if(b!=undefined){		
			FD.append('b',b);
		}
		if(c!=undefined){	
			FD.append('c',c);
		}
		if(d!=undefined){			
			FD.append('d',d);
		}
		if(e!=undefined){	
			FD.append('e',e);
		}
		if(g!=undefined){	
			FD.append('g',g);
		}
		if(h!=undefined){			
			FD.append('h',h);
		}
		if(i!=undefined){	
			FD.append('i',i);
		}
		if(j!=undefined){	
			FD.append('j',j);
		}
		if(k!=undefined){	
			FD.append('k',k);
		}
		if(l!=undefined){		
			FD.append('l', l);
		}
		if(m!=undefined){			
			FD.append('m', m);
		}
		$.ajax({  
			type: "POST", 
			cache: false,
			contentType: false,
			processData: false, 
			url: "func/func.php",
			data: FD, 
			success: function (a) {
			    if (a) {
					if(f=="Glogout"){ 
						if(a==1){
							window.location.reload();
						}
					}
					if(f=="delete"){ 
						if(a==1){
							window.location.reload();
						}
					}
					if(f=="addmerchant"){ 
						if(a==1){
							window.location.reload();
						}
					}
					if(f=="checks"){ 
						if(a==1){
							window.location.reload();
						}
					}
					if(f=="addsector"||f=="DELSEC"){ 
						if(a==1){
							window.location.reload();
						}
					}
					if(f=="delmerchant"||f=="deladmin"||f=="addadmin"){ 
						if(a==1){
							window.location.reload();
						}
					}
					if(f=="notify"){
						
						bootbox.dialog({
							message: a,
							closeButton: true,
							buttons: {		
								confirm: {
									label: 'OK',
									className: 'btn-success'
								}
							}
							
						});								
						
					}
					if(f=="Glogin"){
						if(a==1){
							window.location.reload();	
						}else{
							dialog.modal("hide");
							bootbox.dialog({
								message: 'Incorrect credentials!!!'
							});									
						}
					}
					if(f=="smslogin"){
						if(a==1){
							bootbox.alert('Sms code was sent!!!',function(){setTimeout(function(){$(".SMI").focus();},1000);} );									
						}else{
							bootbox.alert('Incorrect credentials!!!');								
						}
					}					
					if(f=="getscore"){
						bootbox.dialog({
							message:a
						});							
					} 						
					if(f=="getpermissions"){
						bootbox.dialog({
							message:a
						});							
					} 		
					if(f=="getmatrix"){
						bootbox.dialog({
							message:a
						});							
					} 						
				}else{
					
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) { 

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