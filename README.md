<p align="center"><img src="https://raw.githubusercontent.com/Webdoors/Martivia/master/img/martivia.png" width="400"></p>

<p align="center">
	
<a href="https://webdoors.ge"><img src="https://raw.githubusercontent.com/Webdoors/Martivia/master/img/build.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/webdoors/martivia"><img src="https://img.shields.io/packagist/dt/webdoors/martivia" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/webdoors/martivia"><img src="https://img.shields.io/packagist/v/webdoors/martivia" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/webdoors/martivia"><img src="https://img.shields.io/packagist/l/webdoors/martivia" alt="License"></a>
</p>

# About Martivia

Martivia is a cross platform (Php,Python,Node.js,c#,java and etc.) web application framework. The simplicity and the novelty of the paradigm used in this framework enables web applications to load much faster and use as little resources as possible in the process.

Installation
============

Official installation method is via composer and its packagist package [webdoors/martivia](https://packagist.org/packages/webdoors/martivia).

(Recommendation: Download XAMPP for php apache engine and mysql database, use xampp htdocs folder for localhost)

```
$ composer create-project webdoors/martivia example-app
```
Or

1.Just download.

2.Create databasse.

3.Upload files in your Directory.

4.Import admin_martivia.sql to Database. 

5.Delete admin_martivia.sql file from root folder.

4.configure config.php file.


# How it works

1. Every http request is directed to index.php if the file or folder does not exists.
2. open the website and change header.php,footer.php and files in pages/ folder for changing contents behaviour.
3. for beautiful url we chunck Request_URI as $p1,$p2,$p3,$p4 for the parts of the url /$p1/$p2/$p3 ...

Martivia depends on jquery and has it's main.js file where we have created universal Ajax function called "func" which accepts two optional parameters: a) Function Name; b) Parameters object, Example {key:value};

In this Framework every function or a class is a file that is included through func.php

Every xhr jquery ajax call is posted to func.php that includes the file by the function name sent as the first argument of func(a,b) function , For example func("login"); sends request to /func/func.php that includes login.php by the logic of {Function Name}.php . 

a - Function Name

b - Parameters Object {key:value,key:value};

See func function from main.js
<pre>
// a is a function name
// b is a params{key:value} object 
function func(a,b,callback = null){
	var FD = new FormData();
	FD.append('fname', a);
	for (var key in b) {
		if (b != undefined) {
			FD.append(key, b[key]);
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
				if (result !="") {
					callback(result);
				}
			}
		}
	});
}

//Logout Example
$(document).on("click",".LGT",function(){
	func("logout",{},function(){
		wr();
	});
});

//Login Example
$(document).on("click",".SIIN",function(){
	var params = {
		email: $(".A1").val(), 
		password:$(".A2").val()
	};
	func("login",params,function(){
		wr();
	});
});

function wr(){
	location.reload();
}
</pre>

# Documentation

Martivia consists of css,func,js,view folders and index.php, db_open.php, db_close.php. View folder consists of inc and pages folders.

The page routing is driven by $_GET method or by redirecting all request to index.php and chunking url by "/" parts for beautiful url.

For Example: https://example.com?page=login or https://example.com/login

