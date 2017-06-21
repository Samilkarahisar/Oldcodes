<?php
include("db_settings.php");
$tsujet="no one";
$tverbe="rien";
$tplance="internet";
$testingit="";

$adminedataver = "";


$file= "reply.txt";



$input= $_POST['text'];


$kalipci="";


$sql= $conn->query("SELECT * FROM replies WHERE input='$input'");


$reply=  $sql->fetch_assoc();
    

if($reply!=""){
$eklenen=  "\n" . $reply['reply'];
}
else{ //not a simple input

$nwords=explode(" ",$input); //this gets us all the words.


/* -----BELOW WE TRANSFORM YOU TO NBOT AND USERNAME TO YOU-------*/

for ($x = 0; $x <= 20; $x++) {



if($nwords[$x]=="nbot"||$nwords[$x]=="you"){
$nwords[$x]="nbot";
}

if($nwords[$x]=="i"||$nwords[$x]=="I"||$nwords[$x]=="me"){

if(isset($_REQUEST['username'])){
$nwords[$x]=$_REQUEST['username']; 

}

else{
$nwords[$x]="you";
}



}


/* -----END-------*/



/* -----BELOW IF ANY OF THE WORDS IN THE INPUT ARRAY ARE KNOWN IN words DB, WE PROCESS IT TO FIND WHAT KIND IT IS. AND WE GET A KALIP FROM IT-------*/


if($check=$conn->query("SELECT * FROM words WHERE word='$nwords[$x]'")){

//if any of the words that input contains exist in words database, than:
if($think=$check->fetch_assoc()){



	if($think['kind']=="subj"){ //donc, si ce mot est un suje
	$tsujet = $nwords[$x];
  	$kalipci= $kalipci ."-". $think['kind'];
    	$testingit = $testingit ."-".$nwords[$x];
    	$adminedataver = $adminedataver . $think['kind'] . ": " . $tsujet  . "\n"    ;
	}
 	else if($think['kind']=="verb"){ //etc..
	$tverbe=  $nwords[$x];
	$kalipci= $kalipci ."-". $think['kind'];
	$testingit = $testingit ."-".$nwords[$x];
    $adminedataver = $adminedataver . $think['kind'] . ": ". $tverbe . "\n"    ;
	}
	else if($think['kind']=="adj"){
	$tadj=  $nwords[$x];
	$kalipci= $kalipci ."-". $think['kind'];
	$testingit = $testingit ."-".$nwords[$x];
	 $adminedataver = $adminedataver . $think['kind'] . ":" .  $tadj  . "\n"    ;

	}
	else if($think['kind']=="place"){
	$tplace= $nwords[$x];
	$kalipci= $kalipci ."-". $think['kind'];
	$testingit = $testingit ."-".$nwords[$x];
	$adminedataver = $adminedataver . $think['kind'] . ": ". $tplace  . "\n"    ;

	}

}

/*--BUT IF THE WORD DOESNT EXIST WE PUT THE WORD INTO TESTINGIT ARRAY, WHICH CONTAINS ALL THE UNKNOWNS---*/
else{
$testingit = $testingit ."-".$nwords[$x];
//burada seçili ve kesilmiş $nword kelimesini işleyeceğiz, yani mesela herhangi bir tabloda var mı diye kontrol etmek olabilir.

}

}
}


/* -----BELOW WE CREATE A KALIP-------*/


if($kalipci!=""){ //herhangi bir kalıp çıktıysa
$kalipcikar= $conn->query("INSERT INTO kaliplar values('$kalipci')"); //kalıbı ekliyoruz
 $adminedataver = $adminedataver . "Yeni 1 kalıp öğrendim: " . $kalipci . "\n"    ;
}




/* -----BELOW WE TAKE EACH UNKOWN WORD-------*/

$unknownwords=explode("-",$testingit); //here we get the words that the bot doesnt recognise.



/* -----AND THAN WE CREATA A NEURON FOR IT UNLESS IT ALREADY EXISTS, WITH ALL THE OTHER WORDS, AND WE ALSO ADD THE NEURON NAME INTO THE NBOTNEURONALSYS DB-------*/

if($testingit!=""){ 
for ($x = 0; $x <= 20; $x++) {

if($unknownwords[$x]!=""){	
$neuroname=$unknownwords[$x];

$neurocreate="CREATE TABLE $neuroname(
acolumn VARCHAR(100) NOT NULL
)";

if($conn->query($neurocreate)){


$neuronekle= $conn->query("INSERT INTO nbot_neuronal_sys values('$neuroname') ");

}


for($y = 0; $y <= 10; $y++){

if($unknownwords[$y]!=""){

$inneurocheck = $conn->query("SELECT * FROM $neuroname WHERE acolumn='$unknownwords[$y]' ");
$inneurocheckdone = $inneurocheck->num_rows;

if($inneurocheck && $inneurocheckdone==0){
$insertword = $conn->query("INSERT INTO $neuroname values('$unknownwords[$y]')");
}

}
}


}
}
}


$eklenen= $testingit; 
}


    $myfile = fopen($file, "w+");
 
    fwrite($myfile, $eklenen);
 
    fclose($myfile);


    
    $adminegidecek  = fopen("data.txt","a");
    fwrite($adminegidecek,$adminedataver);
    fclose($adminegidecek);

    
?>