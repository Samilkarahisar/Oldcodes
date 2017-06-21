<?php
include("db_settings.php");


if(isset($_POST['word'])){

$word=$_POST['word'];
$kind=$_POST['kind'];

$sql= $conn->query("insert into words  (word,kind) values ('$word','$kind') ");

}

?>

<html>
  
<head>
   <title> NBoT | DataCenter  </title>

<style>
body{
background-color: black;
}

#merkez{
width:250px;
height:300px;
margin:auto;
}

input:focus {outline: none; }
#datas{
margin-top:0px;
}
.textbox{
border: 0px;
padding-left:25px;
width: 230px;
height:50px;
font-size:15px;

select {
   background: transparent;
   width: 268px;
   padding: 5px;
   font-size: 16px;
   line-height: 1;
   border: 0;
   border-radius: 0;
   height: 34px;
   -webkit-appearance: none;
   }
background-color: white;
}

#tcontain{
padding-left:8px;
margin-top:3px;
}
.myButton {
width: 230px;
	-moz-box-shadow:inset 0px 1px 0px 0px #ff4000;
	-webkit-box-shadow:inset 0px 1px 0px 0px #ff4000;
	box-shadow:inset 0px 1px 0px 0px #ff4000;
	background-color:#ff2828;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:2px;
	border:none;
	display:inline-block;
	cursor:pointer;
	color:#f1f1f1;
	font-family:Arial;
	font-size:13px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #854629;
}

.myButton:active {
	position:relative;
	top:1px;
}


</style>
</head>
  

<div id="merkez">
<form action="dataenter.php" method="post">

<div id="tcontain">
<input class="textbox" type="text" name="word" size="25" required placeholder="word" autocomplete="off">
<div class="styled-select">
<select name="kind">
<option value="subj" selected="selected"> subj</option>    
<option value="verb">   verb </option>
<option value="adj"> adj </option>
<option value="word"> word </option>
</select>
</div>
<input class="myButton" type="submit" value="Add">
</div>



</form>
<center>
<div id="datas">
<img src="data.jpg">
</div>
</center>
</div>


</body>
  
</html>