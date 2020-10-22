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
	$(document).on("click",".ADDMAP",function(){
		if($(".title").val()!=''||$(".text").val()!='')
		{
		var lat=markers[0].position.lat();
		var lng=markers[0].position.lng();
		var params={
			title:$(".title").val(),
			titleen:$(".titleen").val(),
			titleru:$(".titleru").val(),
			text:$(".text").val(),
			texten:$(".texten").val(),
			textge:$(".textge").val(),
			pin:$(".PIN").val(),
			link:$(".LINK").val(),
			lat:lat,
			lng:lng,
		}
		
		func2("addmap",params);
		}
		else
		{
			snack("გთხოვთ შეავსოთ ველები!");
		}
	});
	$(document).on("click",".ADDJOU",function(){
		if($(".JOU").val()!='')
		{
		let params={
			pdf:$(".JOU").val(),
		}
		func2("addjournal",params);
		$(this).html("იტვირთება...");
		$(this).prop("disabled",true);	
		}
		else
		{
		  snack("გთხოვთ შეავსოთ ველები!");	
		}
	});
	$(document).on("click",".SAVNS",function(){
		//alert($('#ADLRU').val());
		
		
		    var t=0;
			var a=1;
			var s=0;
		    if($('.atbilisi').is(":checked")){
			t=1;
		    }
		   if($('.asld').is(":checked")){
			s=1;
		    }
			if($('.aactv').is(":checked")){
			a=0;
		    }
	        //alert(a);
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
						func("savenews",
							$(".SAVNS").attr("d"),
							$('#ADLGE').val(),
							tinyMCE.get('ADTGE').getContent(),
							$(".UPT").val(),
							cslug($('#ADLGE').val()),
							a,
		     				$("#ADDESGE").val(),
		     				$(".ACA2").val(),
		     				$(".video").val(),
							$('#ADTSHGE').val()
			
						);
					}
				}
			});
	});
	
	
	
	$(document).on("click",".SAVNUTR",function(){
		//alert($('#ADLRU').val());
		
		
		    var t=0;
			var a=1;
			var s=0;
		    if($('.atbilisi').is(":checked")){
			t=1;
		    }
		   if($('.asld').is(":checked")){
			s=1;
		    }
			if($('.aactv').is(":checked")){
			a=0;
		    }
	        //alert(a);
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
						func("savenutr",
							$(".SAVNUTR").attr("d"),
							$('#ADLGE').val(),
							tinyMCE.get('ADTGE').getContent(),
							$(".UPT").val(),
							cslug($('#ADLGE').val()),
							a,
		     				$("#ADDESGE").val(),
							$(".ACA2").val(),
							$('#ADTSHGE').val(),
							$('.auth').val()
		     			
			
						);
					}
				}
			});
	});
	
		$(document).on("click",".SEO",function(){
		//alert($('#ADLRU').val());
	        //alert(a);
			var t=$(this).attr('t');
			var n=$(this).attr('n');
			var d=$(this).attr('d');
			alert(d);
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
						func("seo",t,n,d,
							$('#ADDESGE').val(),
							$('#ADDESENG').val(),
							$('#ADDESRU').val()
							
							
						);
					}
				}
			});
	});
	
	
	
		$(document).on("click",".svpr",function(){
		    
	        //alert(a);
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
						func("savprev",						
							$('#ADLGE').val(),
							tinyMCE.get('ADTGE').getContent(),
							$(".UPT").val(),
							cslug($('#ADLGE').val()),
							$(".ACA2").val(),$(".SAVNS").attr("d"),
							$('#ADLENG').val(),
							$('#ADLRU').val(),
							tinyMCE.get('ADTENG').getContent(),
							tinyMCE.get('ADTRU').getContent(),
						);
					}
				}
			});
	});
	
	
	
		$(document).on("change keyup",".UPT2",function(){
			func("updatetable",$(this).attr("t"),$(this).attr("n"),$(this).val(),$(this).attr("d"));
			snack("შენახულია","show");
		});
	$(document).on("change keyup",".UPT",function(){
		var val=$(this).val();
		var k=0;
		if($(this).attr("type")=="checkbox"){
			if($(this).is(":checked")){
				k=1;
			}
			val=k;
		}
		func("updatetable",$(this).attr("t"),$(this).attr("n"),val,$(this).attr("d"));
		snack("შენახულია","show");
	});	
	$(document).on("click",".ASL",function(){
		func("addslide",$(".STI").val(),$(".SMT").val(),$("#YDA").val(),$(".SLI").val());
	});	
	$(document).on("click",".ptext",function(){
		func("pagetext",$(".pagetitle").val(),$("#pagetext").val(),$(this).attr('t'));
	});	
	
		/*
		$(document).on("change",".UPT",function(){
			
			 var d= $(this).attr('d');
			 var n=$(".unm[d='"+$(this).attr("d")+"']").val();
			 var c=$(".uct[d='"+$(this).attr("d")+"']").val();
			 var e=$(".enunm[d='"+$(this).attr("d")+"']").val();
			 var r=$(".runm[d='"+$(this).attr("d")+"']").val();
			 // alert($(".unm[d='"+$(this).attr("d")+"']").val());
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
						func("updcategory",n,c,d,e,r,
						
						);
					}
				}
			});
		
	});*/
	
	$(document).on("change keyup paste",".UPTBL",function(){
			
			 var d= $(this).attr('d');
			 var t= $(this).attr('t');
			 var n= $(this).attr('n');
			 var nm= $(this).val();
			 var ln= $(this).attr('ln');
			 if(ln=='undefined')
			 {
				ln=''; 
			 }
		
			 // alert($(".unm[d='"+$(this).attr("d")+"']").val());
				
						func("updatetable",t,n,nm,d,ln);
			
	});
	
	
	
	$(document).on("click",".SAVAB",function(){
			
		 var d= $(this).attr('d');
			 var t= $(this).attr('t');
			 var n= $(this).attr('n');

			
			 
			
	
			
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
			
			//alert(tinyMCE.get('UPTBL').getContent());
			 // alert($(".unm[d='"+$(this).attr("d")+"']").val());
				func("about",t,n,tinyMCE.get('UPTBL').getContent(),d,tinyMCE.get('UPTBLEN').getContent(),tinyMCE.get('UPTBLRU').getContent());
					
				
		}} 
		});
		});
			
			

	
	

	
	
	$(document).on("keyup",".YDA1",function(){
			
			 var d= $(this).attr('d');
			 var t= $(this).attr('t');
			 var n= $(this).attr('n');
			 var nm= $(this).val();
			 var ln= $(this).attr('ln');
			 var ln='';
			
			
				
						func("updatetable",t,n,nm,d,ln);
						location.reload();
			
	});
	

	
	
	$(document).on("click",".SAVVID",function(){
		   var a=1;
		   if($('.aactv').is(":checked")){
			a=0;
		    }
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
						func("savevideo",
							$(".SAVVID").attr("d"),
							$('#ADLGE').val(),
						    $('#ADLENG').val(),
							$(".UPT").val(),
							cslug($('#ADLGE').val()),
							
							$(".UPT2").val(),
							
							tinyMCE.get('ADTGE').getContent(),
							tinyMCE.get('ADTEENG').getContent(),
							$('#ADLRU').val(),
							tinyMCE.get('ADTRU').getContent(),
							a
						);
					}
				}
			});
	});
	$(document).on("keyup",".IN[n='titleen']",function(){
		var k=cslug($(this).val());
		$(".IN[n='slug']").val(k);
		func("updatepage",k,$(".page").val(),"slug");		
	});
	$(document).on("click",".BUT",function(){
		func("Glogin",$(".USR").val(),$(".PAS").val());
	});
	$(document).on("click",".AGA",function(){
		func("addgallery",$("#title").val(),$("#YDA").val());
	});
	/*
	$(document).on("click",".ASL",function(){
		func("addslide",$(".STI").val(),$(".SMT").val(),$("#YDA").val());
	});
*/
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
	
	$(document).on("click",".ltab",function(){
		$(".enebi").hide();
	    	$(".ltab").addClass('btn-danger');
			$(".ltab").removeClass('btn-success');
		
		$(".ltab[d='"+$(this).attr("d")+"']").removeClass('btn-danger');
		$(".ltab[d='"+$(this).attr("d")+"']").addClass('btn-success');
		$(".enebi[d='"+$(this).attr("d")+"']").show();
	
	
	});
	
	
	$(document).on("click",".UNE",function(){
		func("addpage");
	});
	$(document).on("click",".AC1",function(){
		var AC1=0;
		if($(".AC1").is(":checked")){
			AC1=1;
		}
		func("updatepage",AC1,$(".page").val(),"showhide");
	});
	$(document).on("click",".AC2",function(){
		var AC2=0;
		if($(".AC2").is(":checked")){
			AC2=1;
		}
		func("updatepage",AC2,$(".page").val(),"menu");
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
	//	func("updatepage",AC1,AC2,$(".A1").val(),$(".A2").val(),$(".A3").val(),tinyMCE.get('ADL1').getContent(),tinyMCE.get('ADL2').getContent(),tinyMCE.get('ADL3').getContent(),$("#YDA").val(),$(".AC3").val(),$(this).attr("d"));
	});
	$(document).on("keyup",".fil7",function(){
		$(".key").attr("href","?page=pages&key="+$(".fil7").val());
	});
	/*
	$(document).on("click",".ACA",function(){
		func("addcat",$(".ADN").val());
	});*/
	$(document).on("click",".ADDCAT",function(){
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
						func("addcat",$(".A1").val());						
					}
				}
			});	
	});
	$(document).on("click",".CATACT",function(){
		var k=0;
		if($(this).is(":checked")){
			k=1;
		}
		var d=$(this).attr("d");
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
						func("categoryactive",k,d);					
					}else{
						wr();
					}
				}
			});	
	});
	
		$(document).on("click",".MAINCAT",function(){
		var k=0;
		if($(this).is(":checked")){
			k=1;
		}
		var d=$(this).attr("d");
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
						func("mainpagecat",k,d);					
					}else{
						wr();
					}
				}
			});	
	});
	
		$(document).on("click",".ADDSLD",function(){
	
	    if($('.sltxen').val()!=''&&$('.descen').val()!=''&&$('.slimg').val()!='')
		{
	
		//var d=$(this).attr("d");
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
						func("addslide",$('.slstx').val(),$('.sltxen').val(),$('.sltxru').val(),$('.slink').val(),$('.slimg').val(),$('.desc').val(),$('.descen').val(),$('.descru').val());					
					}else{
						wr();
					}
				}
			});	
		}
		else
		{
			snack("გთხოვთ სწორად შეავსოთ ველები");
		}
	});
	
	
		$(document).on("click",".ADDTEAM",function(){
		//var d=$(this).attr("d");
		if($('.tmnamen').val()!=''&&$('.tmlnamen').val()!=''&&$('.tmposen').val()!=''&&$('.tmimg').val()!='')
		{
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
						func("addteams",$('.tmname').val(),$('.tmnamen').val(),$('.tmnamru').val(),$('.tmlname').val(),$('.tmlnamen').val(),$('.tmlnamru').val(),$('.tmpos').val(),$('.tmposen').val(),$('.tmposru').val(),$('.tmimg').val());					
					}else{
						wr();
					}
				}
			});	
		}
		else
		{
			snack("გთხოვთ სწორად შეავსოთ ველები!");
		}
	});
	
		$(document).on("click",".ADDTIPS",function(){
		//var d=$(this).attr("d");
		if($('.tmnamen').val()!=''&&$('.tmlnamen').val()!=''&&$('.tmimg').val()!='')
		{
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
						
						func("addtips",$('.tmname').val(),$('.tmnamen').val(),$('.tmnamru').val(),$('.tmlname').val(),$('.tmlnamen').val(),$('.tmlnamru').val(),$('.tmimg').val());					
					}else{
						wr();
					}
				}
			});	
		}
		else
		{
			snack("გთხოვთ სწორად შეავსეთ ველები!");
		}
	});
	
	
	
	$(document).on("click",".SHOWSLIDE",function(){
		var k=0;
		if($(this).is(":checked")){
			k=1;
		}
		var d=$(this).attr("d");
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
						func("showslide",k,d);					
					}else{
						wr();
					}
				}
			});	
	});
	
		$(document).on("change",".chslps",function(){
	
		var d=$(this).attr("d");
		var v=$(this).val();
		  
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
						func("changeslidepos",d,v);					
					}else{
						wr();
					}
				}
			});	
	});
	
		
		$(document).on("change",".chpldps",function(){
	
		var d=$(this).attr("d");
		var v=$(this).val();
		    //alert (v);
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
						func("changecatpos",d,v);					
					}else{
						wr();
					}
				}
			});	
	});
	
		$(document).on("change",".chmps",function(){
	
		var d=$(this).attr("d");
		var v=$(this).val();
		    //alert (v);
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
						func("changemainpos",d,v);					
					}else{
						wr();
					}
				}
			});	
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
	
			$(document).on("click",".svcnt",function(){
		
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
						func("contact",$(".amge").val(),$(".amen").val(),$(".amru").val(),$(".cme").val(),
						$(".droge").val(),$(".droen").val(),$(".droru").val(),);
					}
				}
			});
	});
	
	
		$(document).on("click",".tbilisi",function(){
		var k=0;
		if($(this).is(":checked")){
			k=1;
		}
		var d=$(this).attr("d");
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
						func("tbilisi",k,d);					
					}else{
						wr();
					}
				}
			});	
	});
	
			$(document).on("click",".activ",function(){
		var k=1;
		if($(this).is(":checked")){
			k=0;
		}
		var d=$(this).attr("d");
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
						func("artactive",k,d);					
					}else{
						wr();
					}
				}
			});	
	});
		$(document).on("click",".vact",function(){
		var k=1;
		if($(this).is(":checked")){
			k=0;
		}
		var d=$(this).attr("d");
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
						func("vidactive",k,d);					
					}else{
						wr();
					}
				}
			});	
	});
	
			$(document).on("click",".CVIDACT",function(){
		var k=0;
		if($(this).is(":checked")){
			k=1;
		}
		
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
						func("shvideocategory",k);					
					}else{
						wr();
					}
				}
			});	
	});
	
	$(document).on("click",".CVIDMAIN",function(){
		var k=0;
		if($(this).is(":checked")){
			k=1;
		}
		
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
						func("mainvideocat",k);					
					}else{
						wr();
					}
				}
			});	
	});
	
	
			$(document).on("click",".sstr",function(){
		    var txtt=$(".txtr").val();
		    var txten=$(".txtren").val();
		    var txtru=$(".txtrru").val();
             //alert(txtt);
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
						func("striqoni",txtt,txten,txtru);					
					}else{
						wr();
					}
				}
			});	
	});
	
	
	
		$(document).on("click",".RIGHTCAT",function(){
		
		var d=$(this).attr("d");
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
						func("rightarticle",d);					
					}else{
						wr();
					}
				}
			});	
	});
	
			$(document).on("click",".BOTTOMCAT",function(){
		
		var d=$(this).attr("d");
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
						func("bottomarticle",d);					
					}else{
						wr();
					}
				}
			});	
	});
	
			$(document).on("click",".shgam",function(){
		
		var d=$(this).attr("d");
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
						func("switchpolls",d);					
					}else{
						wr();
					}
				}
			});	
	});
	
	$(document).on("click",".ADDGAM",function(){

		func("addgam",$(".gamtx").val(),$(".gamtxen").val(),$(".gamtxru").val(),
		$(".var1ge").val(), $(".var2ge").val(),$(".var3ge").val(),
		$(".var1eng").val(), $(".var2eng").val(),$(".var3eng").val(),
		$(".var1ru").val(), $(".var2ru").val(),$(".var3ru").val(),
		);
		
	});
		   $(document).on("click",".insk",function(){

             var d= $(this).attr('d');
			 var t= $(this).attr('t');
			 var n= $(this).attr('n');
			 var pg= $(this).attr('pg');
		     var nm= $(".nsk").val();
			 if(nm=='')
			 {
				 snack("გთხოვთ შეიყვანოთ ქივორდი");
			 }
			 else
			 {
		     func("inskeyword",t,n,d,nm,pg);
			 }
		
	     });
	  $(document).on("click",".dlkw",function(){

             var d= $(this).attr('d');
             var t= $(this).attr('t');
             var pid= $(this).attr('pid');
             var tn= $(this).attr('tn');
			
		     func("delkeywords",d,t,pid,tn);
		
	     });
	
	$(document).on("blur",".chgams",function(){
         var ge=$(".chgam[d='"+$(this).attr("d")+"']").val();
         var en=$(".chgamen[d='"+$(this).attr("d")+"']").val();
         var ru=$(".chgamru[d='"+$(this).attr("d")+"']").val();
         var p=$(".chpir[d='"+$(this).attr("d")+"']").val();
         var peng=$(".chpiren[d='"+$(this).attr("d")+"']").val();
         var pru=$(".chpirru[d='"+$(this).attr("d")+"']").val(); 
		 var m=$(".chmer[d='"+$(this).attr("d")+"']").val();
         var meng=$(".chmeren[d='"+$(this).attr("d")+"']").val();
         var mru=$(".chmerru[d='"+$(this).attr("d")+"']").val();	
		 var s=$(".chmes[d='"+$(this).attr("d")+"']").val();
         var seng=$(".chmesen[d='"+$(this).attr("d")+"']").val();
         var sru=$(".chmesru[d='"+$(this).attr("d")+"']").val();
		 
		func("chgam",ge,en,ru,$(this).attr('d'),p,peng,pru,m,meng,mru,s,seng,sru);
		
	});
	
	$(document).on('change', '.addinspict', function(e) {
          var f=document.getElementsByClassName("addinspict")[0];
          var img=f.files[0];
  
         func("inspic",img);
       });
	
	$(document).on('change', '.addbannertop', function(e) {
          var f=document.getElementsByClassName("addbannertop")[0];
          var img=f.files[0];
  
         func("addbannertop",img);
       });
	   
	   $(document).on('click', '.deltop', function(e) {
        
          var d=$(this).attr('d');
         func("deltopbanner",d);
       });
	   
	    $(document).on('click', '.delright', function(e) {
        
          var d=$(this).attr('d');
         func("dellrightbanner",d);
       });
	   
	   	$(document).on('change', '.addbannerright', function(e) {
          var f=document.getElementsByClassName("addbannerright")[0];
          var img=f.files[0];
  
         func("addbannerright",img);
       });
	   
		$(document).on("blur",".chnss",function(){
         var ge=$(".chns[d='"+$(this).attr("d")+"']").val();
         var en=$(".chnsen[d='"+$(this).attr("d")+"']").val();
         var ru=$(".chnsru[d='"+$(this).attr("d")+"']").val();
		 
		func("chins",ge,en,ru,$(this).attr('d'));
		
	});
   $(document).on("click",".ADDINS",function(){

		func("addins",$(".instx").val(),$(".instxen").val(),$(".instxru").val());
		
	});
	$(document).on("click",".delgam",function(){
		var d=$(this).attr("d");
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
							func("delgam",d);				
					}else{
						wr();
					}
				}
			});	
		

	
		
	});
	
	
	$(document).on("click",".delins",function(){
		var d=$(this).attr("d");
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
							func("delins",d);				
					}else{
						wr();
					}
				}
			});	
		

	
		
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
	$(document).on("keyup",".IN",function(){
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
		func("addpost",$("#YDP").val(),$(".PTI").val(),tinyMCE.get('ADLGE').getContent(),$(".page").val());
	});
	$(document).on("click",".DGA",function(){
	var d=$(this).attr("d");
	var n=$(this).attr("n");
	var page=$(this).attr("page");
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
					func("delete",n,d,page);
				}
			}
		});
	});
function func2(a,b){
	
    var FD = new FormData();
    FD.append('fname',a);
		for (var key in b) {
			if(b!=undefined){
				FD.append(key,b[key]);
			}
			// console.log(key+":"+b[key]);
		}
	$.ajax({
		type: "POST",
		cache: false,
		contentType: false,
		processData: false,
		url: "func/func.php",
		data: FD,
		success: function (R) {
			if(a=="addjournal"){
				// wr();
			}
			if(a=="addmap"){
				wr();
			}
			// newsletter
			if(a==="sendnewsletter" && R==1){
				mailsent();
				setTimeout(wr,1000);

			}
			//newsletter customize
			if(a==="newslettersave" && R==1){
				snack("ცვლილებები შენახულია");
			}
			//addcat
			if(a==="addcat" && R==1){
				snack("შენახულია");
				wr();
			}
			//delcat
			if(a==="delcat" && R==1){
				snack("მონაცემი წარმატებით წაიშალა");
				wr();
			}
			//addprog
			if(a==="addprog" && R==1){
				snack("მონაცემი წარმატებით დაემატა");
				wr();
			}
			//delprog
			if(a==="delprog" && R==1){
				snack("მონაცემი წარმატებით წაიშალა");
				wr();
			}
			//editprog
			if(a==="editprog"){
				let response=JSON.parse(R);
				let reskeys =Object.keys(response).reverse();
				console.log(response);
				let count=Object.keys(response).length;
				console.log(count);
				let cell=$("table[data-input] tr[data-input] td")
				if(response.id!=0 || response.id!=""){
					// console.log(response);
					for(let val of reskeys){
						// console.log(val);
						console.log(count);
						if(cell.children().get(count)!=undefined){
							console.log(cell.children().get(count));
							cell.children().get(count).value=response[val];
						}
						count--;
					}
					if(cell.has("input")){
						console.log(cell.children());

					}else{
						console.log("without input");
					}
				}
			}
		}
	});
}
function func(fn, a, b, c, d, e, g, f, h, i, j, k, l, m, n, o, p,r,s,t) {
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
			FD.append('r', r);
		}
		if(s!=undefined){
			FD.append('s', s);
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
						wr();
					}
					if(fn=="updatepage"){
						//wr();
					}
					if(fn=="addpage"){
						window.location.href="?page=page&id="+a;
					}
					if(fn=="addgallery"){
						wr();
					}
					if(fn=="addgam"){
						wr();
					}
					if(fn=="seo"){
						wr();
					}
					if(fn=="delgam"){
						wr();
					}
					if(fn=="about"){
						snack("წარმატებით შეინახა!");
					}	
					if(fn=="pagetext"){
						snack("წარმატებით შეინახა!");
					}
					if(fn=="delins"){
						wr();
					}
					if(fn=="addins"){
						wr();
					}
					if(fn=="delins"){
						wr();
					}	
					if(fn=="addpartner"){
						wr();
					}
					if(fn=="addcat"){
						wr();
					}
					if(fn=="contact"){
						wr();
					}
					if(fn=="delete"){
						wr();
					}
					if(fn=="addbannertop"){
						wr();
					}
					if(fn=="addbannerright"){
					wr();
					}
				    if(fn=="inskeyword"){
					   $(".ajaxkeywords").html(a);
					    $(".nsk").val('');
					}  
					if(fn=="delkeywords"){
						if(a!=0)
						{
					   $(".ajaxkeywords").html(a);
						}
						else
						{
							 $(".ajaxkeywords").html('');
						}
						 $(".nsk").val('');
					}
					
				   if(fn=="deltopbanner"){
					wr();
					} 
					if(fn=="dellrightbanner"){
					wr();
					}
					if(fn=="changeslidepos"){
						wr();
					}
					if(fn=="addpost"){
						wr();
					}
					if(fn=="addtips"){
						wr();
					}
					if(fn=="addteams"){
						wr();
					}
					if(fn=="changecatpos"){
						wr();
					}
					if(fn=="savprev"){
						
                        location.href = 'https://tbilisipost.ge/preview/'+a;
						location.target = "_blank";
					}
					if(fn=="setposition"){
						wr();
					}
					if(fn=="artactive"){
						wr();
					}
					if(fn=="inspic"){
						wr();
					}
					if(fn=="changemainpos"){
						wr();
					}
					if(fn=="updatetable"){
						snack("წარმატებით შეინახა!");
					}
					
					if(fn=="setmainimg"){
						wr();
					}
					if(fn=="uploadimg"){
						wr();
					}
					if(fn=="delproductimg"){
						wr();
					}
					if(fn=="updcategory"){
						wr();
					}
					if(fn=="Glogin"){

						if(a==1){
							wr();
						} else {
							snack("მომხმარებლის მონაცემები არასწორია");
						}

					}
					if(fn=="Glogout"){
						wr();
					}
					if(fn=="savenews"){
						if(a==1){
							bootbox.dialog({
								size:"small",
								message:"წარმატებით შეინახა!!!"
							});		
							setTimeout(function(){location.reload();},1500);							
						}
					}
					
					if(fn=="savenutr"){
						if(a==1){
							bootbox.dialog({
								size:"small",
								message:"წარმატებით შეინახა!!!"
							});		
							setTimeout(function(){location.reload();},1500);							
						}
					}
					if(fn=="savenutrition"){
						if(a==1){
							bootbox.dialog({
								size:"small",
								message:"წარმატებით შეინახა!!!"
							});		
							setTimeout(function(){location.reload();},1500);							
						}
					}
					if(fn=="addadmin"){
						if(a==1)
						{
						wr();
						}
						else
						{
							snack(a);
						}
					}
					if(fn=="deladmin"){
						wr();
					}
					
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {

			}
		});
}
function cslug(Text)
{
    return Text
        .toLowerCase()
		.trim()
        .replace(/[^\w ]+/g,'')
        .replace(/ +/g,'-')
        ;
}
function wr(){
	location.reload();	
}
function open_popup(url){
	var w=880;var h=570;var l=Math.floor((screen.width-w)/2);var t=Math.floor((screen.height-h)/2);var win=window.open(url,'ResponsiveFilemanager',"scrollbars=1,width="+w+",height="+h+",top="+t+",left="+l);
}
function responsive_filemanager_callback(field_id){
	$("#"+field_id).trigger("keyup");
}
function cslug(Text)
{
    return Text
        .toLowerCase()
		.trim()
        .replace(/[^\w ]+/g,'')
        .replace(/ +/g,'-')
        ;
}
function snack(a="",b="show") {
$("#snackbar").html(a);
  $("#snackbar").attr("class",b);

  setTimeout(function(){ $("#snackbar").attr("class","");}, 3500);
}
// subscribers checkboxes
{
	let allchk=$(".allchk");
	let chk=$(".chk");
	// checkbox checker
	allchk.on("click",function () {
		chk.each(function () {
			if(allchk.is(':checked')){
				chk.prop("checked",true);
			} else {
				chk.prop("checked",false);
			}
		});
	});
	// submit newsletter
	$("#subscrsubmit").click(function () {
		let params={
			opertype: "sendNewsletter",
			ids: []
		};
		chk.each(function () {
			if($(this).is(':checked')){
				params.ids.push($(this).data("id"));
			}
		});
		if(params.ids.length > 0){
			func2("sendnewsletter",params);
		}else{
			snack("რეიზა არ ეირჩიე ადრესატი?!");
		}
	});
	//after send actions
	function mailsent(){
		chk.each(function () {
				chk.prop("checked",false);
			snack("წარმატებით გაიგზავნა");
		});
	}
}


// admin login enter button trigger
$(document).ready(function () {
	$(".INP").keyup( entertrigger);
});

function entertrigger(event) {
	if(event.keyCode===13){
		$(".IN").click();
	}
}

//news letter controls
{
	let chooseBtn=$(".mopen");
	let chooseImg=$(".jimgs");
	let chosenImg=null;
	let arr=[];
	let closeModalBtn=$(".mclose");
	chooseBtn.on('click' , function(){
		chosenImg=$(this).next().children();
		chosenImg.attr("data-hasimage",true);
		$('.modl').toggle(250);
		$(".modl").data("elemlimit",chosenImg.length);
	});
	chooseImg.on('click' , function(){
		if($('.chosenimg').length < $('.modl').data("elemlimit") ){
			$(this).toggleClass('chosenimg');
			$(this).parent().toggleClass('sicon');
			if(chosenImg.length <=1){
				chosenImg.attr("src",$(this).attr("src"));
			}else{
				arr.push($(this).attr("src"));
				let i=0;
				chosenImg.each(function () {
					$(this).attr("src",arr[i]);
					i++;
				});
			}
		}else{
			chooseImg.removeClass('chosenimg');
			chooseImg.parent().removeClass('sicon');
			$(this).addClass('chosenimg');
			$(this).parent().addClass('sicon');
			snack("ამ სექციაში თავსდება მხოლოდ "+$('.modl').data("elemlimit")+" სურათი");
		}

	});
	closeModalBtn.on('click' , function(){
		arr=[];
		$('.modl').toggle(250);
		chooseImg.removeClass('chosenimg');
		chooseImg.parent().removeClass('sicon');
	});
	//newsletter form save
	$("[name=nwsave]").click(function () {
		let params= {
			text:[],
			img: []
		};
		($("#introtext").val())?params.text.push($("#introtext").val()):"";
		($("#anot1").val())?params.text.push($("#anot1").val()):"";
		($("#anot2").val())?params.text.push($("#anot2").val()):"";
		$("[data-hasimage=true]").each(function () {
			params.img.push($(this).attr("src"));
		});
		if(params.img.length > 0 && params.text.length >0){
			func2("newslettersave",params)
		}else {
			snack("აირჩიეთ ყველა სურათი და შეავსეთ ყველა ტექსტური ველი");
		}
	});
}

//savecat
$(".SAVCAT").on("click",function (){
	let params={
		ka_name:this.ka_name=$(".ka_CATNAME").val(),
		en_name:this.en_name=$(".en_CATNAME").val(),
		pg_name:this.pg_name=$( ".PGNAME option:selected" ).val()
	};
	if($(".ka_CATNAME").val()!="" && $(".en_CATNAME").val()!=""){
		func2("addcat",params);
	}else {
		snack("შეავსეთ მინ. დასახელების ველები");
	}
});

//delcat
$(".DELCAT").on("click",function (){
	let params={
	};
	params.id=$(this).data("id");
	if(params.id!=undefined){
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
					console.log(params);
					func2("delcat",params);
				}
			}
		});

	}else {
		snack("დაფიქსირდა შეცდომა");
	}
});

//delprog
$(".DELPROG").on("click",function (){
	let params={
	};
	params.id=$(this).data("id")
	if(params.id!=undefined){
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
					func2("delprog",params);
				}
			}
		});

	}else {
		snack("დაფიქსირდა შეცდომა");
	}
});

//saveprog
$(".SAVEPROG").on("click",function (){
	let count=1;
	let params={
	};
	[].forEach.call($("[data-get]"), (el)=> {
		if(el.value!=undefined || el.value!=""){
			params["data"+count+""]=el.value;
		}
		count++;
	});
	if($(".SAVCHECK").is(":checked")){
		$(".SAVCHECK").data("value",1);
		params.enabled=$(".SAVCHECK").data("value");

	}else{
		$("SAVCHECK").data("value",0)
		params.enabled=0;
	}
		func2("addprog",params);
});

//edit prog
$(".EDITPROG").click(function () {
	let params={};
	params.id=$(this).data("id");
	if(params.id!="" || params.id!=0 ){
		func2("editprog",params);
	}
});

//ativate toggle change status
$("input[data-activate]").change(function (){
	let params={
		t:"",
		col:"",
		id:"",
		enabled:""
	};

	if($(this).is(":checked")){
		params.enabled=1;
		params.col=$(this).data("col");
		params.id=$(this).data("id");
		params.t=$(this).data("t");
		console.log(params);
	}else{
		params.enabled=0;
		params.col=$(this).data("col");
		params.id=$(this).data("id");
		params.t=$(this).data("t");
	}
	if((params.t && params.col && params.id)!=""){
		func2("changestatus",params);
		snack("სტატუსი შეიცვალა");
	}else {
		snack("დაფიქსირდა შეცდომა");
	}
});

// bootstrap tabs
$('#langtab a').on('click', function (e) {
	e.preventDefault()
	$(this).tab('show');
	$('#langtab a').addClass("bg-secondary");
	$('#langtab a').removeClass("bg-dark");
	$(this).addClass("bg-dark");
})
function open_popup(url){var w=880;var h=570;var l=Math.floor((screen.width-w)/2);var t=Math.floor((screen.height-h)/2);var win=window.open(url,'ResponsiveFilemanager',"scrollbars=1,width="+w+",height="+h+",top="+t+",left="+l);}