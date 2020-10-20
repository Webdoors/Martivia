jQuery(document).ready(function(){
	$(document).on("change","#size",function(){
		$(this).removeClass("RED");
	});
    $('#addToCart').click(function() {
		var size=$('#size').val();
		var id=$('#pr_id').val();
		if(size>0) {
			$('#size').parent().attr('style','z-index: 10; width: 83px;');
			var old_bag=getCookie('kbag');
			if(!old_bag) old_bag='';
			var isin=0;
			var list=old_bag.split('-');
			var count=list.length;
			for(i=0; i<count; i++) {
				if((id+'_'+size)==list[i]) isin=1;
			}
			if(isin==0) {
				count--;
				old_bag+='-'+id+'_'+size;
				count++;
				setCookie('kbag', old_bag, 7);
				/*$(".bag-list").css({"display": "block"}).animate({left: '1500px',
					top: '-190px',
					width: '0px',
					height: '0px',
					opacity: '0',
					function(){
						//$(".bag-list").attr("style","");
					}
					// transition: 'all 1.8s'
				});*/
				$.extend($.gritter.options, { 
					position: 'top-right',
				});
				$.gritter.add({
					// (string | mandatory) the heading of the notification
					title: $("h2.dot").html(),
					// (string | mandatory) the text inside the notification
					text: "<span class='PRC'>"+$(".price p").html()+"</span><br><span class='SZE'>Size - "+$("#size>option:selected").text()+'</span><br> <a href="?page=bag"><span class="CAR">Added to bag</span></a>',
					// (string | optional) the image to display on the left
					image: $(".LIMS:first img").attr("src"),
					// (string) specify font-face icon  class for close message
					close_icon: 'entypo-icon-cancel s12',
					//sticky: true,
					sticky: false,
					time: '7000'
				});					
				$('.BGC').html(count);
			} else {
				$('#size').addClass("RED");	
			}
		} else {
			$('#size').addClass("RED");	
		}
        return false;
    });
});
function getCookie(c_name) {
	var i,x,y,ARRcookies=document.cookie.split(";");
	for(i=0; i<ARRcookies.length; i++) {
		x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
		y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
		x=x.replace(/^\s+|\s+$/g,"");
		if(x==c_name) {
			return unescape(y);
		}
	}
}

function setCookie(c_name, value, exdays) {
	var exdate=new Date();
	exdate.setDate(exdate.getDate() + exdays);
	var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
	document.cookie=c_name + "=" + c_value;
}

function checkCookie() {
	var username=getCookie("username");
	if(username!=null && username!="") {
		alert("Welcome again " + username);
	} else {
		username=prompt("Please enter your name:","");
		if(username!=null && username!="") {
			setCookie("username",username,365);
		}
	}
}
$(document).on("click",".LIMS",function(){
	$(".LIMG").addClass("hidden");
	$(".LIMG[d='"+$(this).attr("d")+"']").removeClass("hidden");
});