<!doctype html>
<html xmlns="https://www.w3.org/2012/xhtml" lang="ka">
	<head>
		<meta name="google-site-verification" content="<meta name="google-site-verification" content="g4DimXsv0vBSkzQSl3i7eQDlsgdo3u4cuCWgVdBTY7c" />
		<link rel="icon"type="image/x-icon"href="/img/logo.jpg"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		 <meta http-equiv="Access-Control-Allow-Origin" content="*"/>
		<title>IkaWeightlifter Admin</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="content-language" content="ka">
		<meta name="Author" content="Irakli Shalamberidze">
		<meta property="og:title" content="Kikala Studio" />
		<meta property="og:description" content="ატელიერ კიკალა მოდის სახლი" />
		<meta name="keywords" content="ბიზნეს,საკრედიტო,ხაზი,რეგისტრაცია,მოთხოვნა,ლიმიტის,დამტკიცება,სესხი,ტრანში"/>
		<meta name="description" content="ონლაინ ბიზნეს შეფასება 24/7" />
		<meta name="author" content="QuickCash LLC" />
		<meta name="copyright" content="&copy;2016 qcash.ge" />
		<meta name="robots" content="all" />
		<meta name="revisit-after" content="1 days" />
		<link rel="canonical" href="https://qcash.ge/"/>
		<meta property="og:image" content="https://qcash.ge/img/unnamed.jpg" />
		<meta property="og:type" content="website" />
		<meta property="fb:app_id" content="248744675578367" />
		<meta property="og:url" content="https://webdoors.ge/" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" />
		<link rel="stylesheet" type="text/css" href="css/style.css?t=<?=time() ?>"/>
			<link href="css/supr/css/icons.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.2/iconfont/material-icons.min.css" integrity="sha512-y9glprRcVESvYY3suAqBUYXx0ySbQNvbzzgvLy9F2o38Y7XCNeq/No2gnHjV3+Rjyq5ijoPZRMXotpdw6jcG4g==" crossorigin="anonymous" />
		<script
		src="https://code.jquery.com/jquery-3.4.1.min.js"
		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
		crossorigin="anonymous"></script>
	</head>
	<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">IkaWeightlifter</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
<!--      <li class="nav-item dropdown">-->
<!--        <a class="nav-link dropdown-toggle CP" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--        სტატიები-->
<!--        </a>-->
<!--        <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
<!--              <a class="dropdown-item"  href="?page=home" data-original-title="" title="">სიახლეები</a>-->
<!--              <a class="dropdown-item"  href="?page=article" data-original-title="" title="">ფესტივალის შესახებ</a>-->
<!--        </div>-->
<!--      </li>-->

        <li class="nav-item <?=($PG=="videos"?"active":"")?>"><a class="nav-link" href="?page=mainpage">მთავარი გვერდი</a></li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle CP" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        ტრეინინგები
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="?page=articles" data-original-title="" title="">ტრეინინგების სია</a>
              <a class="dropdown-item" href="?page=article" data-original-title="" title="">ტრეინინგის დამატება</a>
              <a class="dropdown-item" href="?page=texttraining" data-original-title="" title="">ტრეინინგის ტექსტი</a>
        </div>
      </li>	
      	  
        <li class="nav-item <?=($PG=="videos"?"active":"")?>"><a class="nav-link" href="?page=about">Ika-ს შესახებ</a></li>
		
		  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle CP" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        ნუტრიციები
        </a>
		 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           <a class="dropdown-item <?=($PG=="journals"?"active":"")?>"><a class="nav-link" href="?page=nutritions">ნუტრიცია</a>
           <a class="dropdown-item <?=($PG=="journals"?"active":"")?>"><a class="nav-link" href="?page=nutrition">ნუტრიციის დამატება</a>
           <a class="dropdown-item <?=($PG=="journals"?"active":"")?>"><a class="nav-link" href="?page=textnutrition">ნუტრიციის ტექსტი</a>
		</div>
		</li>
        <li class="nav-item <?=($PG=="banners"?"active":"")?>"><a class="nav-link" href="?page=partners">პარტნიორები</a></li>
		<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle CP" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
         SEO
        </a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="?page=seohome" data-original-title="" title="">home</a>
              <a class="dropdown-item" href="?page=seoabout" data-original-title="" title="">about</a>
              <a class="dropdown-item" href="?page=seocontact" data-original-title="" title="">კონტაქტები</a>
              <a class="dropdown-item" href="?page=seonutritions" data-original-title="" title="">seonutritions</a>
              <a class="dropdown-item" href="?page=seotrainings" data-original-title="" title="">seotreinings</a>
              <a class="dropdown-item" href="?page=seopartners" data-original-title="" title="">seopartners</a>
        </div>
      </li>
        <li class="nav-item <?=($PG=="slider"?"active":"")?>"><a class="nav-link" href="?page=slider">სლაიდერი</a></li>
        <li class="nav-item <?=($PG=="categories"?"active":"")?>"><a class="nav-link" href="?page=categories">კატეგორიები</a></li>
        <li class="nav-item <?=($PG=="contact"?"active":"")?>"><a class="nav-link" href="?page=contact">კონტაქტი</a></li>
<!--		 <li class="nav-item dropdown">-->
<!--        <a class="nav-link dropdown-toggle CP" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--         SEO-->
<!--        </a>-->
<!--        <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
<!--              <a class="dropdown-item"  href="?page=seohome" data-original-title="" title="">home</a>-->
<!--              <a class="dropdown-item"  href="?page=seoabout" data-original-title="" title="">about</a>-->
<!--              <a class="dropdown-item"  href="?page=seocontact" data-original-title="" title="">კონტაქტები</a>-->
<!--              <a class="dropdown-item"  href="?page=seoarchives" data-original-title="" title="">არქივი</a>-->
<!--              <a class="dropdown-item"  href="?page=seonewses" data-original-title="" title="">news</a>-->
<!--        </div>-->
<!--      </li>-->
<!--		<li class="nav-item --><?//=($PG=="about"?"active":"")?><!--"><a class="nav-link" href="?page=about">შესახებ</a></li>-->
<!--		<li class="nav-item --><?//=($PG=="teams"?"active":"")?><!--"><a class="nav-link" href="?page=teams">გუნდი</a></li>-->
<!--		<li class="nav-item --><?//=($PG=="map"?"active":"")?><!--"><a class="nav-link" href="?page=map">რუკა</a></li>-->
		
<!--		<li class="nav-item --><?//=($PG=="partners"?"active":"")?><!--"><a class="nav-link" href="?page=partners">პარტნიორები</a></li>-->
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle CP" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        პარამეტრები
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item"  href="?page=admins" data-original-title="" title="">ადმინები</a>
              <a class="dropdown-item"  href="?page=settings" data-original-title="" title="">საიტის პარამეტრები</a>
<!--              <a class="dropdown-item"  href="?page=contact" data-original-title="" title="">კონტაქტები</a>-->
<!--              <a class="dropdown-item"  href="?page=statistics" data-original-title="" title="">სტატისტიკა</a>-->
<!--              <a class="dropdown-item"  href="?page=newsletter" data-original-title="" title="">Newsletter</a>-->
<!--			<a class="dropdown-item" href="?page=tips">Tips</a>-->
<!--			<a class="dropdown-item" href="?page=3text">Home Page 3 text</a>-->
<!--        </div>-->
      </li>


    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2 d-none" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0 d-none" type="submit">Search</button>
      <a href="/media/tuto.mp4" target="_blank" class="btn btn-outline-success my-2 my-sm-0" >Help</a>
    </form>
    &nbsp;&nbsp;&nbsp;<button class="btn btn-default my-2 my-sm-0 LGT" ><i class="fa fa-sign-out"></i></button>
  </div>
</nav>
