<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <br>
    <div class="col-md-7">
      <label for="title">Title</label>
      <input type="text" class="form-control" placeholder="სათაური" name="title" id="title">
    </div>
    <br><br><br>
    <div class="input-append">
      <br>
      <div class="col-md-6 NOP" style="margin-left: 15px;">
      	<input id="YDA" class="form-control" placeholder="სურათის ლინკი" value="" type="text">
      </div>
      &nbsp;<a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&amp;popup=1&amp;field_id=YDA&amp;relative_url=0')" class="btn iframe-btn btn-default" type="button">Select</a>
      <script>
      function open_popup(url){var w=880;var h=570;var l=Math.floor((screen.width-w)/2);var t=Math.floor((screen.height-h)/2);var win=window.open(url,'ResponsiveFilemanager',"scrollbars=1,width="+w+",height="+h+",top="+t+",left="+l);}
      </script>
    </div>
    <br>
    <button type="button" class="btn btn-default AGA" name="button" style="margin-left: 15px">Add To Gallery</button>
  </body>
  <br><br><br>
    <?php
    $q1 = mysqli_query($con,"SELECT * from gallery");
    while ($r1 = mysqli_fetch_array($q1)) {
      ?>
      <div class="col-md-12 NOP" style="margin-top: 3px;">
        <div class="col-md-2">
          <a class="example-image-link" href="<?=$r1["img"]?>" data-title="32" data-lightbox="example-1"><img class="GIM" src="<?=str_replace("uploads","thumbs",$r1["img"])?>" alt="image-1"></a>
        </div>
        <div class="col-md-4">
          <?=$r1["title"]?>
        </div>
        <div class="col-md-6">
          <button type="button" class="btn btn-default DGA" d="<?=$r1['id']?>" n="gallery" name="button">DELETE</button>
        </div>
      </div>
    <?php } ?>
</html>
