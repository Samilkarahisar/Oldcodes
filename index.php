<?php
include("geoiploc.php"); // Must include this

  // ip must be of the form "192.168.1.100"
  // you may load this from a database
  $ip = $_SERVER["REMOTE_ADDR"];
  $countrychecking=getCountryFromIP($ip, " NamE ");
 
  if($countrychecking!="Turkey"){
  if($countrychecking!="France"){
  header("Location: http://www.beyinx.com/sorry.php");
  exit;
  }
  }
  
  
  
$thisurl=  "http://hulpar.com/";

$chatfname="reply.txt";

?>
<! DOCTYPE html>

<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=big5">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>  
    <title> beyinx | bir yapay zeka  </title>
    <link rel="stylesheet" href="layout.css">
    <script src="http://code.jquery.com/jquery-1.5.js"></script>
<script>


jQuery(document).ready(function($) {
    
 $("#submitmsg").click(function(){    
        var clientmsg = $("#usermsg").val();
        $.post("hulpar.php", {text: clientmsg});              
        $("#usermsg").attr("value", "");
        return false;
    });



});


     //Load the file containing the chat log
    function loadLog(){ 
       var  chatfnamm  = "<?php Print($chatfname); ?>"; 
       
        $.ajax({
            url: chatfnamm,
            cache: false,
            success: function(html){        
               $("#hmessage").html(html); //Insert chat log into the #chatbox div   
            },
        });
      
     
   }
    

   

   
    
    setInterval (loadLog, 1000);
    
</script>
    </head>
    
    <body>
    
    <div id="container">
    
    <header>
    
    
  <div id="logo">
    <img src="logo.png"/> 
</div>

  <div id="upmess"> 
  <span> Versiyon 0.1 </span>
  </div>

    </header>
    
    
   
<div id="main">
	
	
    
<?php echo 'main'; ?> 

<div id="hulparm">

<div id="indic">
<img src="favicon.ico"/> 
</div>

<div id="hmessage">
<?php

if(file_exists($chatfname) && filesize($chatfname) > 0){
    $handle = fopen($chatfname, "r");
    $contents = fread($handle, filesize($chatfname));
    fclose($handle);
    echo $contents;
}
  
  ?>
  

</div>

</div>


<div id="chatcon">
  <form name="message" action="">
        <input name="usermsg" type="text" id="usermsg" class="chattextbox" required placeholder="Type here" size="38" />
        <input name="submitmsg" type="submit" id="submitmsg" value="Send" />
    </form>
</div>
 
</div>   

  

 
    </div>
      
      <center>
      <div id="copyright">
      
     <span>  Copyright (c) 2016 <a href="https:www.twitter.com/samilkarahisar">Samil Karahisar</a>. All rights reserved. </span>
    
    
    </div>
    
    </center>
     
    </body>  
    
    

    </html>