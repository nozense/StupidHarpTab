<?php

function StupidHarpTab($file){

$myfile = fopen($file, "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
$line = fgets($myfile);

echo "<br /> Raden: " . $line . "<br />"; //debug

$lineArr = explode(" ", $line);

echo "<br />";        //debug
var_dump($lineArr);   //debug
echo "<br />";       //debug

parseTab($lineArr);
}
fclose($myfile);

}


function parseTab(array $score){
echo "<div class='rad'>";
genScore($score);
echo  "<div class='mellan' style='width:100%; height:1px; clear:both;'></div>";
genTab($score);
echo "</div>";
} //end parseTab


function genTab(array $score){
  foreach ($score as $singleNot) { // go through expressions
    $singleChar = str_split($singleNot);  // split a single expression in to characters
        echo "<div class='tab'>";
     foreach ($singleChar as $char) { // go through every single character
          if($char == "(" || $char == ")"){echo $char;} //write out parantheses
          if(is_numeric($char)){echo $char;} //write out number

        } //end foreach $singleNot
echo "</div>";
  } //en forech $score

} //end genTab


function genScore(array $score){ //resive score as array of expressions like "(4)."
  foreach ($score as $singleNot) { // go through expressions

if(substr( $singleNot, -1 ) == ")" || is_numeric(substr( $singleNot, -1 )) ){
    if(substr( $singleNot, 0, 1 ) == "("){getNot(4,0);}
    elseif(is_numeric(substr( $singleNot, 0, 1 ))){getNot(4,0);}
    elseif(substr( $singleNot, 0, 1 ) == "."){ getNot(8,0); }
    elseif(substr( $singleNot, 0, 1 ) == ":"){ getNot(16,0); }
}else{
    if(substr( $singleNot, -1 ) == "."){getNot(2,0);}
    elseif(substr( $singleNot, -1 ) == ":"){getNot(1,0);}
}

  } //en forech $score

} //end genScore



function getNot($length,$dot){
switch($length)
{
    case "1":
    echo "<div class='not full' >";
      if($dot == "1"){echo "&nbsp;<b>.</b>";}
    echo "</div>";
    break;

    case "2":
    echo "<div class='not half' >";
      if($dot == "1"){echo "&nbsp;<b>.</b>";}
    echo "</div>";
    break;

    case "4":
    echo "<div class='not forth' >";
      if($dot == "1"){echo "&nbsp;<b>.</b>";}
    echo "</div>";
    break;

    case "8":
    echo "<div class='not eighth' >";
      if($dot == "1"){echo "&nbsp;<b>.</b>";}
    echo "</div>";
    break;

    case "16":
    echo "<div class='not sixteenth' >";
      if($dot == "1"){echo "&nbsp;<b>.</b>";}
    echo "</div>";
    break;



    case "": // Handle file extension for files ending in '.'
    case NULL: // Handle no file extension
    break;
  } //slut switch
} //slut getNot



 ?>
