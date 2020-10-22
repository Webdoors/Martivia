<?php
require_once ("../../db.php");
$query="SELECT * FROM `newsletter` ORDER BY id DESC LIMIT 1";
$result=$con->query($query);
$data=$result->fetch_array(MYSQLI_ASSOC);
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>FourSeasonsGeorgia</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700" rel="stylesheet">
</head>
<style media="screen">
    a {
        text-decoration: none;
    }
    a:hover , a:hover *{
        color:lightblue !important;
    }
</style>
<body style="padding: 0px; margin: 0px;font-family: 'Raleway', sans-serif;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#eee">
    <tr>
        <td align="center">
            <table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#fff">
                <tr>
                    <td align="center">
                        <table width="600" border="0" cellspacing="0" cellpadding="0" style="background:url(https://4seasonsgeorgia.ge/admin/<?=$data["section1_img"]?>);background-repeat: no-repeat;background-size: cover;color: #fff;">
                            <tr>
                                <td align="center" style="padding-top:52px;">
                                    <table width="460" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="center">
                                                <img width="250px"height="auto" src="https://4seasonsgeorgia.ge/img/newsletterimages/LOGO1.png" alt="logo">
                                                <h1 style="padding: 0px 10px; margin: 0px; color: #fff; font-weight: 700; font-size: 65px;margin-top:6px;">
                                                    Georgia
                                                </h1>
                                                <p style="letter-spacing: 0.2px; color: #fff; font-weight: 500; line-height: 20px; font-size: 10px;width:430px; font-family: 'Montserrat', sans-serif;margin-bottom:16px;">
                                                    <?=$data["section1_text"]?>
                                                </p>
                                                <span style="display: block;margin-left: -10px;margin-bottom: 48px;">
                                <a target="_blank"href="https://www.facebook.com/4seasonsGeo/" style="margin-left:10px;text-decoration:none;">
                                    <img src="https://4seasonsgeorgia.ge/img/newsletterimages/fb.png" width="30px"alt="facebook">
                                </a>
                                <a target="_blank"href="https://www.instagram.com/4_seasons_georgia/" style="margin-left:10px;text-decoration:none;">
                                    <img src="https://4seasonsgeorgia.ge/img/newsletterimages/insta.png"width="30px" alt="twitter">
                                </a>
                                <a target="_blank"href="https://www.4seasonsgeorgia.ge" style="margin-left:10px;text-decoration:none;">
                                  <img src="https://4seasonsgeorgia.ge/img/newsletterimages/web.png"width="30px" alt="pinterest">
                                </a>
                                <a href="mailto:info@4seasonsgeorgia.ge" style="margin-left:10px;text-decoration:none;">
                                    <img src="https://4seasonsgeorgia.ge/img/newsletterimages/mail.png"width="30px" alt="tumblr">
                                </a>

                            </span>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td align="center" style="padding:20px 0;">
                        <table width="420" border="0" cellspacing="0" cellpadding="0" style="font-family: 'Montserrat', sans-serif;">
                            <tr>
                                <td align="center">
                                    <h2 style="font-family: 'Montserrat', sans-serif; letter-spacing: 0.2px; color: #000; font-weight: 700; font-size: 18px;">
                                        ახალი ჟურნალი ყოველ სეზონზე</h2>
                                    <p style="letter-spacing: 0.2px; color: #000; font-weight: 500; line-height: 20px; font-size: 10px; font-family: 'Montserrat', sans-serif;margin-bottom:16px;">
                                        <?=$data["section2_text"]?>
                                    </p>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>

                <tr>
                    <td>
                        <table width="600" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="35%">
                                    <?php
                                    $section2_img=explode(",",$data["section2_img"]);
                                    ?>
                                    <img src="https://4seasonsgeorgia.ge/admin/<?=$section2_img[0]?>" width="100%" alt="journal" style="display: block;">
                                </td>
                                <td width="35%">
                                    <img src="https://4seasonsgeorgia.ge/admin/<?=$section2_img[1]?>" width="100%" alt="journal" style="display: block;">
                                </td>
                                <td width="35%">
                                    <img src="https://4seasonsgeorgia.ge/admin/<?=$section2_img[2]?>" width="100%" alt="journal" style="display: block;">
                                </td>
                            </tr>
                            <tr bgcolor="#2e2e2e">
                                <td align="center" width="200">
                                    <a target="_blank"href="https://www.facebook.com/4seasonsGeo/" style="margin-left:10px;text-decoration:none;">
                                        <h5 style="color:#fff;font-weight:500;font-family: 'Montserrat', sans-serif;font-size: 10px;">
                                            <img src="https://4seasonsgeorgia.ge/img/newsletterimages/fb.png" width="30px"alt="facebook">
                                        </h5>
                                    </a>
                                </td>
                                <td align="center"width="200">
                                    <a target="_blank"href="https://www.instagram.com/4_seasons_georgia/" style="margin-left:10px;text-decoration:none;">
                                        <h5 style="color:#fff;font-weight:500;font-family: 'Montserrat', sans-serif;font-size: 10px;">
                                            <img src="https://4seasonsgeorgia.ge/img/newsletterimages/insta.png"width="30px" alt="twitter">
                                        </h5>
                                    </a>
                                </td>
                                <td align="center"width="200">
                                    <a target="_blank"href="https://www.4seasonsgeorgia.ge" style="margin-left:10px;text-decoration:none;">
                                        <h5 style="color:#fff;font-weight:500;font-family: 'Montserrat', sans-serif;font-size: 10px;">
                                            <img src="https://4seasonsgeorgia.ge/img/newsletterimages/web.png"width="30px" alt="pinterest">
                                        </h5>
                                    </a>
                                </td><td align="center"width="200">
                                    <a href="mailto:info@4seasonsgeorgia.ge" style="margin-left:10px;text-decoration:none;">
                                        <h5 style="color:#fff;font-weight:500;font-family: 'Montserrat', sans-serif;font-size: 10px;">
                                            <img src="https://4seasonsgeorgia.ge/img/newsletterimages/mail.png"width="30px" alt="tumblr">
                                        </h5>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td>
                        <table align="center" width="540" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="185" style="padding: 40px 30px 20px 30px;">
                                    <h2 style="font-family: 'Montserrat', sans-serif; letter-spacing: 0.2px; color: #000; font-weight: 700; font-size: 18px;text-align:center">ჟურნალის დასახელება ზაფხული 2020</h2>
                                    <p style="letter-spacing: 0.2px; color: #000; font-weight: 500; line-height: 20px; font-size: 10px; font-family: 'Montserrat', sans-serif;margin-bottom:0px;">
                                        <?=$data["section3_text"]?>
                                    </p>
                                    <a  style="text-align:right; display:block"href="https://4seasonsgeorgia.ge/en/journal">see all</a>
                                </td>
                                <td width="245">
                                    <img src="https://4seasonsgeorgia.ge/admin/<?=$data["section3_img"]?>" alt="lastimg" style="display: block; width:100%;">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td bgcolor="#2e2e2e" style="padding-bottom:25px; padding-top:20px;" align="center">
                        <p style="letter-spacing: 0.2px; width:420px;color: #ffffff; font-weight: 500; line-height: 20px; font-size: 10px; font-family: 'Montserrat', sans-serif;margin-bottom:16px;margin-top:16px;">
                            Mail : info@4seasonsgeorgia.ge
                            <br>
                            Phone : 032 222 17 55
                            <br>
                            10:00 AM - 7:00 PM
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>

</html>
