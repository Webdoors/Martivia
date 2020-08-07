<p align="center"><img src="https://raw.githubusercontent.com/Webdoors/Martivia/master/img/martivia.png" width="400"></p>

<p align="center">
	
<a href="https://webdoors.ge"><img src="https://raw.githubusercontent.com/Webdoors/Martivia/master/img/build.svg" alt="Build Status"></a>
<a href="https://webdoors.ge"><img src="https://raw.githubusercontent.com/Webdoors/Martivia/master/img/total.svg" alt="Total Downloads"></a>
<a href="https://webdoors.ge"><img src="https://raw.githubusercontent.com/Webdoors/Martivia/master/img/stable.svg" alt="Latest Stable Version"></a>
<a href="https://webdoors.ge"><img src="https://raw.githubusercontent.com/Webdoors/Martivia/master/img/license2.svg" alt="License"></a>
</p>

# About Martivia

Martivia is a cross platform (Php,Python,Node.js,c#,java and etc.) web application framework. The simplicity and the novelty of the paradigm used in this framework enables web applications to load much faster and use as little resources as possible in the process.

# How it works

Martivia depends on jquery and has it's main.js file where we have created universal Ajax function called "func" which accepts two optional parameters: a) Function Name; b) Parameters object, Example {key:value};

In this Framework every function or a class is a file that is included through func.php

Every xhr jquery ajax call is posted to func.php that includes the file by the function name sent as the first argument of func(a,b) function , For example func("login"); sends request to /func/func.php that includes login.php by the logic of {Function Name}.php . 

a - Function Name

b - Parameters Object {key:value,key:value};

See func function from main.js
<pre>
function func(a,b){
    var FD = new FormData();
    FD.append('function',a);
		for (var key in b) {
			if(b!=undefined){
				FD.append(key,b[key]);			
			}
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



//Logout Example
$(document).on("click",".LGT",function(){
	func("logout");
});



//Login Example
$(document).on("click",".SIIN",function(){
	var params = {
		email: $(".A1").val(), 
		password:$(".A2").val()
	};
	func("login",params);
});
</pre>

# Documentation

Martivia consists of css,func,js,view folders and index.php, db_open.php, db_close.php. View folder consists of inc and pages folders.

The page routing is driven by $_GET method or by redirecting all request to index.php and chunking url by "/" parts.

For Example: https://example.com?page=login or https://example.com/login

