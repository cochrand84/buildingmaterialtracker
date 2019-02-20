<html>
<head>
<title> Dynamically create input fields- jQuery </title>
<script  src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript">
$(function() {
        var addDiv = $('#addinput');
        var i = $('#addinput p').size() + 1;
        
        $('#addNew').live('click', function() {
                $('<p><input type="text" id="p_new" size="40" name="p_new_' + i +'" value="" placeholder="I am New" /><a href="#" id="remNew">Remove</a> </p>').appendTo(addDiv);
                i++;
				
                return false;
        });
        
        $('#remNew').live('click', function() { 
                if( i > 2 ) {
                        $(this).parents('p').remove();
                        i--;
                }
                return false;
        });
});

</script>

</head>
<body>
<h2>Dynammically Add New Input Box</h2>

<div id="addinput">
    <p>
        <input type="text" id="p_new" size="20" name="p_new" value="" placeholder="Input Value" /><a href="#" id="addNew">Add</a>
    </p>
</div>
<div id="myad">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-9165168790934890";
/* top */
google_ad_slot = "6414226949";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script> 
</div>
</body>
</html>