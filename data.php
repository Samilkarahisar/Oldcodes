<?php

$chatfname="data.txt";
?>

<! DOCTYPE html>

<html lang="en">

<head>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>  <meta charset="utf-8">
    <title> Nbot | DATACenter </title>
    
      <script src="http://code.jquery.com/jquery-1.5.js"></script>
<script>


jQuery(document).ready(function($) {
  
   


});


   //Load the file containing the chat log
    function loadLog(){ 
       var  chatfnamm  = "<?php Print($chatfname); ?>"; 
       
        $.ajax({
            url: chatfnamm,
            cache: false,
            success: function(html){        
                $("#datacontainer").html(html); //Insert chat log into the #chatbox div   
           
            },
        });

    }
    
    
     
    setInterval (loadLog, 2500);
</script>

<style>
body{
background-color:black;
}

#datacontainer{
font-family: 'Open Sans', sans-serif;
font-size:14px;
color:white;
}
</style>
    </head>
    
    <body>
  <center>  
  <div id="datacontainer">
  <?php
  
    $handle = fopen($chatfname, "r");
    $contents = fread($handle, filesize($chatfname));
    fclose($handle);
    echo $contents;

?>

  
  </div>
     
     </center>
    </body>  
    
    

    </html>