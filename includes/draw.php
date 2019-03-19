<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Canvas Paint - Example 5</title>
    <style type="text/css">
      #container { position: relative; }
      #imageView { border: 1px solid #000; }
      #imageTemp { position: absolute; top: 1px; left: 1px; }
    </style>
  </head>
  <body>
    <p><label>Drawing tool: <select id="dtool">
        <option value="line">Line</option>
        <option value="rect">Rectangle</option>
        <option value="pencil">Pencil</option>
    </select></label></p>

    <div id="container">
      <canvas id="imageView" width="400" height="300">
        <p>Unfortunately, your browser is currently unsupported by our web
        application.  We are sorry for the inconvenience. Please use one of the
        supported browsers listed below, or draw the image you want using an
        offline tool.</p>
        <p>Supported browsers: <a href="http://www.opera.com">Opera</a>, <a
          href="http://www.mozilla.com">Firefox</a>, <a
          href="http://www.apple.com/safari">Safari</a>, and <a
          href="http://www.konqueror.org">Konqueror</a>.</p>
      </canvas>
    </div>



<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
</head><body>

<?php

if (count($_POST) && (strpos($_POST['img'], 'data:image/png;base64') === 0)) {
  
  $img = $_POST['img'];
  $img = str_replace('data:image/png;base64,', '', $img);
  $img = str_replace(' ', '+', $img);
  $data = base64_decode($img);
  $file = 'drawgings/img'.date("YmdHis").'.png';
  
  if (file_put_contents($file, $data)) {
     echo "<p>The canvas was saved as $file.</p>";
  } else {
     echo "<p>The canvas could not be saved.</p>";
  } 
  
}
           
?>


<body>
    <p><label>Drawing tool: <select id="dtool">
        <option value="line">Line</option>
        <option value="rect">Rectangle</option>
        <option value="pencil">Pencil</option>
    </select></label></p>

    <div id="container">
      <canvas id="imageView" width="400" height="300">
        <p>Unfortunately, your browser is currently unsupported by our web
        application.  We are sorry for the inconvenience. Please use one of the
        supported browsers listed below, or draw the image you want using an
        offline tool.</p>
        <p>Supported browsers: <a href="http://www.opera.com">Opera</a>, <a
          href="http://www.mozilla.com">Firefox</a>, <a
          href="http://www.apple.com/safari">Safari</a>, and <a
          href="http://www.konqueror.org">Konqueror</a>.</p>
      </canvas>
    </div>

<form method="post" action="" onsubmit="prepareImg();">
  <input id="inp_img" name="img" type="hidden" value="">
  <input id="bt_upload" type="submit" value="Upload">
</form>



<script>
    
  var canvas = document.getElementById('imageView');
  var context = canvas.getContext('2d');

  context.arc(100, 100, 50, 0, 2 * Math.PI);
  context.lineWidth = 5;
  context.fillStyle = '#EE1111';
  context.fill(); 
  context.strokeStyle = '#CC0000';
  context.stroke();
  
  
  function prepareImg() {
     var canvas = document.getElementById('imageView');
     document.getElementById('inp_img').value = canvas.toDataURL();
  }
  
</script>
    <script type="text/javascript" src="includes/draw.js"></script>
  </body>
</html>
