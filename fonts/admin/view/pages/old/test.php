
Your Tiny API Key
Your API Key is a unique token that links your TinyMCE instances to your account. It grants you access to all of our Premium Plugins during your free trial.

e0r6yrodxwtfnbylamb80z2mcl1xh83kabyvqlc0px4gryka

COPY
Go ahead, give our most popular plugins a go…
Your account includes a free trial of our Premium Plugins plus support to help get you started. Use the code snippet below to get up and running quickly.

<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.tiny.cloud/1/e0r6yrodxwtfnbylamb80z2mcl1xh83kabyvqlc0px4gryka/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
  <textarea>
    Welcome to TinyMCE!
  </textarea>
  <script>
tinymce.init({
  selector: 'textarea',
  height: 400,
  menubar: true,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks advcode fullscreen',
    'insertdatetime media table powerpaste hr code'
  ],
  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code',
  	  toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
	  toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | responsivefilemanager | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
	  toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
	setup : function(ed) {
		  ed.on('change keyup', function(e) {
			   //console.log('the event object ', e);
			   //console.log('the editor object ', ed);
			  // console.log('the content ', ed.getContent());
			  //console.log(ed.getContent());
			  func("updatetable","ptexts",$("#"+ed.id).attr("n"),ed.getContent(),$("#"+ed.id).attr("d"));
		  });
	},
  powerpaste_allow_local_images: true,
  powerpaste_word_import: 'prompt',
  powerpaste_html_import: 'prompt',
  content_css: '//www.tiny.cloud/css/codepen.min.css'
});

  </script>
</body>
</html>

