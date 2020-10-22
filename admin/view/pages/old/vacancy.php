<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $slug=$p2;
      $id = mysqli_real_escape_string($con, $_GET['id']);
      $sql = "SELECT * FROM join_us WHERE id = '$id'";
      $result = mysqli_query($con, $sql);
      $row = mysqli_fetch_assoc($result);

      $titleen = $row['titleen'];
      $titlege = $row['titlege'];
      $slug = $row['slug'];
      $date = $row['date'];
      $contenten = $row['contenten'];
      $contentge = $row['contentge'];
    ?>
    <input type="hidden" id="vac" name="" value="<?=$row['id']?>">
    <form action="" method="post">
      <div class="col-md-12">
        <h3>Vacancy id <?=$row['id']?></h3> <br>
        <div class="form-group">
          <label for="title">Title English</label>
          <input class="form-control" type="text" name="titleen" id="titleen" value="<?=$titleen?>">
        </div>
        <div class="form-group">
          <label for="title">Title Georgian</label>
          <input class="form-control" type="text" name="titlege" id="titlege" value="<?=$titlege?>">
        </div>
        <div class="form-group">
          <label for="slug">Slug</label>
          <input class="form-control" type="text" name="slug" id="slug" value="<?=$slug?>">
        </div>
        <div class="form-group">
          <label for="date">Date</label>
          <input class="form-control" type="date" name="date" id="date" value="<?=$date?>">
        </div>
        <div class="form-group">
          <label for="contenten">Content English</label>
          <textarea class="form-control" rows="6" name="contenten" id="contenten"><?=$contenten?></textarea>
        </div>
        <div class="form-group">
          <label for="contenten">Content Georgian</label>
          <textarea class="form-control" rows="6" name="contentge" id="contentge"><?=$contentge?></textarea>
        </div>
        <?php
        if (mysqli_real_escape_string($con, $_GET['id'])) {
          $submit_type = "Edit";
          if (isset($_POST['submit'])) {
            $titleen = mysqli_real_escape_string($con, $_POST['titleen']);
            $titlege = mysqli_real_escape_string($con, $_POST['titlege']);
            $slug = $_POST['slug'];
            $date = $_POST['date'];
            $contenten = mysqli_real_escape_string($con, $_POST['contenten']);
            $contentge = mysqli_real_escape_string($con, $_POST['contentge']);

            $sql_update_vacancy =
            "UPDATE join_us SET titleen = '$titleen', titlege = '$titlege',
            slug = '$slug', date = '$date', contenten = '$contenten', contentge = '$contentge'
            WHERE id = $id";
            $result_update_vacancy = mysqli_query($con, $sql_update_vacancy);
            header("Location: ?page=joinus");
          }
        } else {
          $submit_type = "Add";
          if (isset($_POST['submit'])) {
            $titleen = mysqli_real_escape_string($con, $_POST['titleen']);
            $titlege = mysqli_real_escape_string($con, $_POST['titlege']);
            $slug = $_POST['slug'];
            $date = $_POST['date'];
            $contenten = mysqli_real_escape_string($con, $_POST['contenten']);
            $contentge = mysqli_real_escape_string($con, $_POST['contentge']);

            $sql_insert_vacancy = "INSERT INTO join_us (titleen, titlege, slug, date, contenten, contentge)
            VALUES ('$titleen', '$titlege', '$slug', '$date', '$contenten', '$contentge')";
            $result_insert_vacancy = mysqli_query($con, $sql_insert_vacancy);
            header("Location: ?page=joinus");
          }
        }
        ?>
        <button type="submit" class="btn btn-default" name="submit"><?=$submit_type?></button>
      </div>
    </form>
  </body>
</html>
<script>
$(function(){
	tinymce.init({
		relative_urls: false,
	  selector: "textarea",
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
   ],

	  toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
	  toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
	  toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",

	  menubar: false,
	  toolbar_items_size: 'small',

	  style_formats: [{
		title: 'Bold text',
		inline: 'b'
	  }, {
		title: 'Red text',
		inline: 'span',
		styles: {
		  color: '#ff0000'
		}
	  }, {
		title: 'Red header',
		block: 'h1',
		styles: {
		  color: '#ff0000'
		}
	  }, {
		title: 'Example 1',
		inline: 'span',
		classes: 'example1'
	  }, {
		title: 'Example 2',
		inline: 'span',
		classes: 'example2'
	  }, {
		title: 'Table styles'
	  }, {
		title: 'Table row 1',
		selector: 'tr',
		classes: 'tablerow1'
	  }],
    setup : function(ed) {
			  ed.on('change keyup', function(e) {
				   //console.log('the event object ', e);
				   //console.log('the editor object ', ed);
				  // console.log('the content ', ed.getContent());
				  //console.log(ed.getContent());
				  func("updatevacancy",ed.getContent(),$("#vac").val(),$("#"+ed.id).attr("name"));
			  });
		},
   external_filemanager_path:"/admin/responsive_filemanager/filemanager/",
   filemanager_title:"Responsive Filemanager" ,
   external_plugins: { "filemanager" : "../../responsive_filemanager/filemanager/plugin.min.js"}

	});
});

</script>
<script src="js/tinymce/tinymce.min.js"></script>
