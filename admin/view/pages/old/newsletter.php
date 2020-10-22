<?php
$cquery="SELECT COUNT(id) as 'count' FROM `subscribers` WHERE active=1";
$cresult=$con->query($cquery);
$count=$cresult->fetch_array(MYSQLI_ASSOC);
$count=$count["count"];

$ACP=1;
if($_REQUEST["p"]>0){
    $ACP=$_REQUEST["p"];
}
$PA=30;
$fr=($ACP-1)*$PA;

$query="SELECT * FROM `subscribers` WHERE active=1 ORDER BY id LIMIT ".$PA." OFFSET ".$fr." ";
$result=$con->query($query);
// images from journal
$jouquery="SELECT id FROM `journals` ORDER BY id DESC LIMIT 1";
$jouresult=$con->query($jouquery);
$joudata=$jouresult->fetch_array(MYSQLI_ASSOC);
//nesletter data
$nslquery="SELECT * FROM `newsletter` ORDER BY id DESC LIMIT 1";
$nslresult=$con->query($nslquery);
$nsldata=$nslresult->fetch_array(MYSQLI_ASSOC);
// image read from directory
$imagedir="media/journal/".$joudata["id"]."/";
?>

<div class="container-fluid">
    <h2 class="my-3">გასაგზვნი ტექსტი და სურათები</h2>
  <div class="col-10 mx-auto my-4">
        <div class="row m-0 ">
          <div class="col-3">
            <label class="my-2" for="gl">სიახლის სურათი</label>
            <input id="gl"type="submit" class="mopen form-control  btn-outline-success" name="" value="არჩევა">
            <div class="my-2 text-center">
            <img src="<?=(empty($nsldata["section1_img"]))?"images/noimg.png":$nsldata["section1_img"]?>"width="150px"height="auto" alt="" <?=(empty($nsldata["section1_img"]))?"":"data-hasimage=true"?>>
          </div>
          </div>
          <div class="col-6">
            <label class="my-2" for="gl">ჟურნალის 3 სურათი</label>
            <input id="gl"type="submit" class="mopen form-control col-6 mx-auto btn-outline-success" name="" value="არჩევა">
            <div class="row mx-0 my-3 justify-content-center">
                <?php
                $section2_img=explode(",",$nsldata["section2_img"]);
                ?>
              <img class="mx-1"src="<?=(empty($section2_img[0]))?"images/noimg.png":$section2_img[0]?>"width="150px"height="auto" alt="" <?=(empty($section2_img[0]))?"":"data-hasimage=true"?>>
              <img class="mx-1"src="<?=(empty($section2_img[1]))?"images/noimg.png":$section2_img[1]?>"width="150px"height="auto" alt="" <?=(empty($section2_img[1]))?"":"data-hasimage=true"?>>
              <img class="mx-1"src="<?=(empty($section2_img[2]))?"images/noimg.png":$section2_img[2]?>"width="150px"height="auto" alt="" <?=(empty($section2_img[2]))?"":"data-hasimage=true"?>>
          </div>
          </div>
          <div class="col-3">
            <label class="my-2" for="gl">ახალი ჟურნალის სურათი</label>
            <input id="gl"type="submit" class="mopen form-control  btn-outline-success" name="" value="არჩევა">
            <div class="my-2 text-center">
              <img src="<?=(empty($nsldata["section3_img"]))?"images/noimg.png":$nsldata["section3_img"]?>"width="150px"height="auto" alt="" <?=(empty($nsldata["section3_img"]))?"":"data-hasimage=true"?>>
            </div>
          </div>
        </div>

      <div class="row my-3">
        <div class="col-4">
          <label class="my-2" for="introtext">ინტრო ტექსტი</label>
          <textarea id="introtext" name="name" class="form-control" rows="10" cols="80" placeholder="შეიყვანეთ ტექსტი"><?=$nsldata["section1_text"]?></textarea>
          <hr>

        </div>
        <div class="col-4">
          <label class="my-2" for="anot1">პირველი ანოტაცია</label>
          <textarea id="anot1" name="name" class="form-control" rows="10" cols="80" placeholder="შეიყვანეთ ტექსტი"><?=$nsldata["section2_text"]?></textarea>

          <hr>

        </div>
        <div class="col-4">
          <label class="my-2" for="anot2">ახალი ჟურნალის ანოტაცია</label>
          <textarea id="anot2" name="name" class="form-control" rows="10" cols="80" placeholder="შეიყვანეთ ტექსტი"><?=$nsldata["section3_text"]?></textarea>
          <hr>
        </div>
        <div class="w-100 ">
          <input type="submit" class="form-control mx-auto my-2 CP col-3 btn-outline-success" name="nwsave" value="დამახსოვრება">
        </div>
      <div class="modl">
      <div class="row m-0">
        <div class="w-100 p-4 row m-0 justify-content-between text-white">
          <h3>აირჩიეთ სურათ(ებ)ი</h3>
        <h1 class="mclose CP">&times;</h1>
        </div>
          <?php
          if(is_dir($imagedir)){
              $opendir=opendir($imagedir);
              while (($img=readdir($opendir))!==false){
                  if(($img == '.') || ($img == '..'))
                  {
                      continue;
                  }
                  $imagetype=pathinfo($img,PATHINFO_EXTENSION);
                  if(($imagetype == 'jpg') || ($imagetype == 'png'))
                  {
                     // echo "<img src='".$imagedir.$img."' width='200'> ";
                  }

          ?>
          <div class="col-xl-2 col-lg-3 col-md-4 col-6 jouimgs">
              <img class="jimgs" src='<?=$imagedir.$img?>'/>
          </div>
          <?php
              }
              closedir($opendir);
          }
          ?>

      </div>
      </div>
  </div>
      <h2 class="my-3">გამომწერები</h2>
  <table class="table table-striped mt-5">
    <thead>
      <tr>
        <th class="align-top"><h5>
          ID
        </h5>
       </th>
        <th class="align-top"><h5>
          გამომწერის მეილი
        </h5>
       </th>
          <th class="text-center"><h5 class="my-0">
            ყველას მონიშვნა
          </h5>
        </br><input type="checkbox" class="allchk form-control my-0">
          </th>
          <th class="text-center"><h5 class="my-0">
                  სტატუსი
              </h5>
          </th>
      </tr>
    </thead>
    <tbody>
    <?php
    while ($data=$result->fetch_array(MYSQLI_ASSOC)){

    ?>
      <tr>
        <td><h6><?=$data["id"]?></h6></td>
        <td><h6><?=$data["email"]?></h6></td>
        <td><input type="checkbox" class="chk form-control" data-id="<?=$data["id"]?>"></td>
          <td class="text-center"><?=($data["newsletter_id"]==$nsldata["id"])?"<img style='width: 40px; height:auto ' src='images/tick.png'>":""?></td>
      </tr>

    <?php
    }
    ?>

    </tbody>
  </table>
    <div class="w-100" >
        <div class="col-md-12 mx-auto MID">
            <?php
            if(ceil($count/$PA) > 1){

                if(ceil($count/$PA) >= 5){
                ?>
                <a href="?page=newsletter&p=1" class="PG USR">«</a>
                    <?php
                }
                ?>
                <a href="?page=newsletter&p=<?=$ACP!=1?($ACP-1):$ACP?>" class="PG USR">‹</a>
                <?php
                for($i=1;$i<=ceil($count/$PA);$i++){
                    if(($ACP-5)<=$i&&($ACP+5)>=$i){
                        ?>
                        <a href="?page=newsletter&p=<?=$i?>" class="PG <?=($ACP==$i?"ACP":"")?> USR"><?=$i?></a>
                    <?php }
                }
                ?>
                <a href="?page=newsletter&p=<?=$ACP!=ceil(mysqli_num_rows($q3)/$PA)?($ACP+1):$ACP?>" class="PG USR">›</a>
                <?php
                if(ceil($count/$PA) >= 5){

                ?>
                <a href="?page=newsletter&p=<?=ceil($count/$PA);?>" class="PG USR">» <?=ceil($count/$PA);?></a>
                <?php
                }
            }
            ?>
        </div>
        <div class="col-3 mx-auto">
            <input id="subscrsubmit" type="submit" class="form-control btn btn-outline-success"value="გაგზავნა">
        </div>
    </div>
</div>
</div>

