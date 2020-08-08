<?php

//======================================================================
// Made by Uhtoom
// https://github.com/uhtoom/StupidHarpTab
// Released under GNU General Public License v3.0
//======================================================================


function StupidHarpTab($file){ // Main function, gets the file, spits it and sends it on its way
  $myfile = fopen($file, "r") or die("Unable to open file!"); //open the file

    while(!feof($myfile)) { //go throu the file until end
        $line = fgets($myfile); // read a line
        if(substr( $line, 0, 1 ) == "#"){ //if line begins with # print it
            $line = substr($line, 1);
            echo "<div class='title'>" . $line . "</div>";
          }else{
          $lineArr = explode(" ", trim($line)); // explode the line at blank space and trim trailing \n added by fgets
          parseTab($lineArr); // send the array to the parser
        } // end else
      } //end while loop
      fclose($myfile); // Close the file
} // end StupidHarpTab()


function parseTab(array $score){ //function to get everything in right order and echo som divs
  echo "<div class='rad'>";
  genScore($score); // get the score
  echo  "<div class='mellan' style='width:100%; height:1px; clear:both;'></div>";
  genTab($score); // get the tabs
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



function getNot($length,$dot){ //generate div with right class for diffrent length
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
