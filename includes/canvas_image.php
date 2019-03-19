<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Save canvas PNG image on server</title>
<style>
#cnv1 {
position:relative;
display:block;
margin:8px auto;
background:#fefefe;
border:2px dashed #111;
}
#btn_cnvimg {
display:block;
margin:8px auto;
}
#ajaxresp {
margin:20px auto;
text-align:center;
font-weight:700;
}
</style>
</head>
<body>

<canvas id="cnv1" width="400" height="280"></canvas>
<button id="btn_cnvimg">Save Canvas Image</button>
<div id="ajaxresp">Ajax response</div>
<script>
var cnv = document.getElementById('cnv1');  //Replace 'cnv1' with your canvas ID
var php_file ='save_cnvimg.php';  //address of php file that get and save image on server

/* Ajax Function
 Send "data" to "php", using the method added to "via", and pass response to "callback" function
 data - object with data to send, name:value; ex.: {"name1":"val1", "name2":"2"}
 php - address of the php file where data is send
 via - request method, a string: 'post', or 'get'
 callback - function called to proccess the server response
*/
function ajaxSend(data, php, via, callback) {
  var ob_ajax =  (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');  //XMLHttpRequest object

  //put data from 'data' into a string to be send to 'php'
  var str_data ='';
  for(var k in data) {
    str_data += k +'='+ data[k].replace(/\?/g, '%3F').replace(/=/g, '%3D').replace(/&/g, '%26').replace(/[ ]+/g, '%20') +'&'
  }
  str_data = str_data.replace(/&$/, '');  //delete ending &

  //send data to php
  ob_ajax.open(via, php, true);
  if(via =='post') ob_ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  ob_ajax.send(str_data);

  //check the state request, if completed, pass the response to callback function
  ob_ajax.onreadystatechange = function(){
    if (ob_ajax.readyState == 4) callback(ob_ajax.responseText);
  }
}

//register click on #btn_cnvimg to get and save image
var btn_cnvimg = document.getElementById('btn_cnvimg');
if(btn_cnvimg) btn_cnvimg.addEventListener('click', function(e){
  var imgname = null;

  if(imgname !== null){
    //set data that will be send with ajaxSend() to php (base64 PNG image-data of the canvas, and image-name)
    var img_data = {'cnvimg':cnv.toDataURL('image/png', 1.0), 'imgname':imgname};

    //send image-data to php file
    ajaxSend(img_data, php_file, 'post', function(resp){
      //show server response in #ajaxresp, if not exist, alert response
      if(document.getElementById('ajaxresp')) document.getElementById('ajaxresp').innerHTML = resp;
      else alert(resp);
    });
  }
});
</script>


<script>
//This code it is only for Drawing some context in canvas
var ctx = cnv.getContext('2d');  //canvas context
ctx.font = 'bold 28px sans-serif';
ctx.strokeText('CANVAS - Save this Image', 46, 50);  //Text
</script>
</body>
</html>