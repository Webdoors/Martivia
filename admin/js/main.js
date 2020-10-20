$(function(){
	$(document).on("change",".AC4",function(){
		if($(this).val()==1){
			$(".PGT").show();
			$(".GAL,.PST").hide();
		}
		if($(this).val()==2){
			$(".PGT,.GAL").show();
			$(".PST").hide();			
		}
		if($(this).val()==3){
			$(".PST").show();
			$(".GAL,.PGT").hide();			
		}
	});
	$(document).on("click",".BUT",function(){
		func("Glogin",$(".USR").val(),$(".PAS").val());
	});
	$(document).on("click",".ASL",function(){
		func("addslide",$(".STI").val(),$(".SMT").val(),$("#YDA").val());
	});
	$(document).on("click",".DSL",function(){
		var k=$(this).attr("d");
			bootbox.confirm({
				message: "Are you sure?",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success'
					},
					cancel: {
						label: 'No',
						className: 'btn-danger'
					}
				},
				callback: function (result) {
					if(result){
						func("delslide",k);		
					}
				}
			});	
	});
	$(document).on("keydown",".IN",function (e) {
	  if (e.keyCode == 13) {
		$('.BUT').click();
	  }
	});
	$(document).on("click",".RMB",function(){
		var k=$(this);
			bootbox.confirm({
				message: "Are you sure?",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success'
					},
					cancel: {
						label: 'No',
						className: 'btn-danger'
					}
				},
				callback: function (result) {
					if(result){
						k.parent().remove();
						updateOutput($('#nestable').data('output', $('#nestable-output')));				
					}
				}
			});	
	});
	$(document).on("click",".EMB",function(){
		var k=$(this);
		var m=k.attr("d");
			bootbox.confirm({
				message: "<input class='form-control CNC' d='"+m+"' value='"+k.parent().find(".dd-handle").html()+"'/>",
				buttons: {
					confirm: {
						label: 'Save',
						className: 'btn-success'
					},
					cancel: {
						label: 'Cancel',
						className: 'btn-danger'
					}
				},
				callback: function (result) {
					if(result){
						func("updcategory",$(".CNC").val(),$(".CNC").attr("d"));		
					}
				}
			});	
	});
	$(document).on("click",".LGT",function(){
		func("Glogout");
	});
	$(document).on("click",".UNE",function(){
		func("addpage");
	});
	$(document).on("click",".UNO",function(){
		var AC1=0;
		if($(".AC1").is(":checked")){
			AC1=1;
		}
		var AC2=0;
		if($(".AC2").is(":checked")){
			AC2=1;
		}
		func("updatepage",AC1,AC2,$(".A1").val(),$(".A2").val(),$(".A3").val(),tinyMCE.get('ADL1').getContent(),tinyMCE.get('ADL2').getContent(),tinyMCE.get('ADL3').getContent(),$("#YDA").val(),$(".AC3").val(),$(this).attr("d"));
	});
	$(document).on("keyup",".fil7",function(){
		$(".key").attr("href","?page=pages&key="+$(".fil7").val());
	});
	$(document).on("click",".ACA",function(){
		func("addcat",$(".ADN").val());
	});
	$(document).on("click",".ACO",function(){
		func("addcol",$(".ADN").val());
	});
	$(document).on("click",".DCA",function(){
		func("delcat",$(this).attr("d"));
	});
	$(document).on("click",".DCO",function(){
		func("delcol",$(this).attr("d"));
	});
	$(document).on("click",".DNE",function(){
		var k=$(this).attr("d");
			bootbox.confirm({
				message: "Are you sure?",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success'
					},
					cancel: {
						label: 'No',
						className: 'btn-danger'
					}
				},
				callback: function (result) {
					if(result){
						func("delpage",k);			
					}
				}
			});		
	});
	$(document).on("click",".DPR",function(){
		var k=$(this).attr("d");
			bootbox.confirm({
				message: "Are you sure?",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success'
					},
					cancel: {
						label: 'No',
						className: 'btn-danger'
					}
				},
				callback: function (result) {
					if(result){
						func("delproduct",k);			
					}
				}
			});		
	});
	$(document).on("click",".UPL",function(){
		$(this).val("uploading...");
		$(this).prop("disabled",true);
		var fileone=document.getElementById("PIM");
		var filebig=fileone.files[0];
		func("uploadimg",$(".pid").val(),filebig);
	});
	$(document).on("click",".APR",function(){
		func("addproduct");
	});
	$(document).on("click",".SIM",function(){
		func("setmainimg",$(this).attr("d"),$(".pid").val());
	});
	$(document).on("click",".DEI",function(){
		func("delproductimg",$(this).attr("d"));
	});
	$(document).on("change keyup",".POS",function(){
		func("setposition",$(this).attr("d"),$(this).val());
	});
	$(document).on("click",".CHK",function(){
		var k=0;
		if($(this).is(":checked")){
			k=1;
		}
		func("updateproduct",$(this).attr("d"),k,$(".pid").val());
	});
	$(document).on("keyup change",".len",function(){
		func("updateproduct",$(this).attr("d"),$(this).val(),$(".pid").val());
	});
	$(document).on("click",".ADC",function(){
	var k=$(this).attr("d");
		bootbox.confirm({
			message: "Are you sure?",
			buttons: {
				confirm: {
					label: 'Yes',
					className: 'btn-success'
				},
				cancel: {
					label: 'No',
					className: 'btn-danger'
				}
			},
			callback: function (result) {
				if(result){
					func("deladmin",k);				
				}
			}
		});

	}); 
	$(document).on("click",".ADB",function(){
		func("addadmin",
			$(".ADN").val(),
			$(".ADL").val(),
			$(".ADA").val(),
			$(".ADP").val(),
			$(".ADT").val()
		);
	});
	$(document).on("change click",".IN",function(){
		var k=$(this).val();
		if($(this).attr("type")=="checkbox"){
			var k=0;
			if($(this).is(":checked")){
				k=1;
			}
		}
		func("updatepage",k,$(".page").val(),$(this).attr("n"));
	});
});
	$(document).on("click",".ATG",function(){
		func("addgallery",$("#YDG").val(),$(".page").val());
	});
	$(document).on("click",".ADP",function(){
		func("addpost",$("#YDP").val(),$(".PTI").val(),tinyMCE.get('ADLP').getContent(),$(".page").val());
	});
	$(document).on("click",".DGA",function(){
	var d=$(this).attr("d");
	var n=$(this).attr("n");
		bootbox.confirm({
			message: "Are you sure?",
			buttons: {
				confirm: {
					label: 'Yes',
					className: 'btn-success'
				},
				cancel: {
					label: 'No',
					className: 'btn-danger'
				}
			},
			callback: function (result) {
				if(result){
					func("delete",n,d);		
				}
			}
		});
	});
function func(fn, a, b, c, d, e, g,f, h, i, j, k, l, m, n, o, p,r,s,t) {
		var FD = new FormData();
		FD.append('fname',fn);
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
		if(f!=undefined){	
			FD.append('f',f);
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
		if(n!=undefined){
			FD.append('n', n);
		}
		if(o!=undefined){
			FD.append('o', o);
		}
		if(p!=undefined){
			FD.append('p', p);
		}
		if(r!=undefined){		
			FD.append('ar1[]', r);
		}
		if(s!=undefined){	
			FD.append('ar2[]', s);
		}
		if(t!=undefined){	 
			FD.append('t', t);
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
					if(fn=="addcol"||fn=="delcol"||fn=="delcat"||fn=="delproduct"||fn=="addslide"||fn=="delslide"){
						window.location.reload();
					}
					if(fn=="addcat"){
						$("#nestable>.dd-list").append(a);
						updateOutput($('#nestable').data('output', $('#nestable-output')));	
						setTimeout(function(){window.location.reload();},2000);
					}
					if(fn=="updatepage"){
						//window.location.reload();
					}
					if(fn=="addpage"){
						window.location.hrefn="?page=page&id="+a;
					}
					if(fn=="addgallery"){
						window.location.reload();
					}
					if(fn=="delete"){
						window.location.reload();
					}
					if(fn=="addpost"){
						window.location.reload();
					}
					if(fn=="setposition"){
						window.location.reload();
					}
					if(fn=="setmainimg"){
						window.location.reload();
					}
					if(fn=="uploadimg"){
						window.location.reload();
					}
					if(fn=="delproductimg"){
						window.location.reload();
					}
					if(fn=="updcategory"){
						window.location.reload();
					}
					if(fn=="Glogin"){
						window.location.reload();
					}
					if(fn=="Glogout"){
						window.location.reload();
					}
					if(fn=="addadmin"||fn=="deladmin"){
						window.location.reload();
					}
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) { 

			} 
		}); 
}