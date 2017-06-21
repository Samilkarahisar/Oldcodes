<?php
include("geoiploc.php"); // Must include this

  // ip must be of the form "192.168.1.100"
  // you may load this from a database
  $ip = $_SERVER["REMOTE_ADDR"];
  $country=getCountryFromIP($ip, " NamE ");
  
?>

<! DOCTYPE html>

<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=big5">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>  
    <title> beyinx | outside of Turkey </title>

<style>
html { 
  background: url(sorrypage2.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

#field1{
font-family: 'Open Sans', sans-serif;
font-size:14px;
margin:auto;
resize:none;
width:800px;
height:250px;
background-color:black;
border: none;
outline: none;
color: white;
margin-top:250px;
text-align:left;

}
</style>

#change{
color:red;
}
  
    </head>
    
    <body>
    <center>

   <textarea readonly  id="field1">

  Hey there;
  
  Right now beyinx is only accessible from Turkey. This is because our A.I. doesn't support other languages yet. But, we will soon release an english version for all the world. Until than, for further information or updates you can join the developper on Twitter.  
  
  Now,
  
  Acording to your IP adress (<?php echo $ip; ?>). We believe you are from <?php echo $country; ?>. If we have made a mistake, please contact the developper.
  </textarea>
   
    </center>
    
    <div id="other">
    
    <center>
    <a href="https://twitter.com/intent/tweet?screen_name=samilkarahisar" class="twitter-mention-button">Tweet to @samilkarahisar</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    </center>
    </div>
    </body>  
    
    

    </html>