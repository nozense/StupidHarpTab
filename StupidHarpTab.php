<?php

//======================================================================
// StupidHarpTab V.1
// Made by Uhtoom
// https://github.com/uhtoom/StupidHarpTab
// Released under GNU General Public License v3.0
//======================================================================


function StupidHarpTab($file, $style){ // Main function, gets the file, spits it and sends it on its way
  $myfile = fopen($file, "r") or die("Unable to open file!"); //open the file

    while(!feof($myfile)) { //go throu the file until end
        $line = fgets($myfile); // read a line
        if(substr( $line, 0, 1 ) == "#"){ //if line begins with # print it
            $line = substr($line, 1);
            echo "<div class='title'>" . $line . "</div>"; //Set class and echos Title
          }elseif(substr( $line, 0, 1 ) == "~"){
              $line = substr($line, 1);
              echo "<div class='lyrics'>" . $line . "</div>"; //Set class and echos Lyrics
          }else{
          $lineArr = explode(" ", trim($line)); // explode the line at blank space and trim trailing \n added by fgets
          parseTab($lineArr, $style); // send the array to the parser
        } // end else
      } //end while loop
      fclose($myfile); // Close the file
} // end StupidHarpTab()


function parseTab(array $score, $style){ //function to get everything in right order and echo som divs
  echo "<div class='rad'>";
  genScore($score, $style); // get the score
  echo  "<div class='mellan' style='width:100%; height:1px; clear:both;'></div>"; // echo seperation between score and tab
  genTab($score); // get the tabs
  echo "</div>";
} //end parseTab


function genTab(array $score){

  foreach ($score as $singleNot) { // go through expressions
    $singleChar = str_split($singleNot);  // split a single expression in to characters
        echo "<div class='tab'>";
        $mark = "";
     foreach ($singleChar as $char) { // go through every single character
          if($char == "*"){$mark = "red";}
          if($char == "(" || $char == ")"){echo $char;} //write out parantheses
          if(is_numeric($char)){echo "<span class=' " . $mark . "'>" . $char . "</span>";} //write out number
          if($char == "r" || $char == "R"){echo "&nbsp;";} //echo empty for rests
          if($char == "d" || $char == "D"){echo "&nbsp;";} //echo empty for repeat
        } //end foreach $singleNot
echo "</div>";
} //end forech $score

} //end genTab


function genScore(array $score, $style){ //resive score as array of expressions like "(4)."

    foreach ($score as $singleNot) { // go through expressions
      if(substr( $singleNot, 0, 1 ) == "r"){getNot("r",0,$style);}    // If we have "r" generate rest
          elseif(substr( $singleNot, 0, 1 ) == "R"){getNot("R",0,$style);}
          elseif(substr( $singleNot, 0, 1 ) == "d" ){getNot("d",0,$style);}  // If we have "d" generate repeat
          elseif(substr( $singleNot, 0, 1 ) == "D" ){getNot("D",0,$style);}
          else{ // if we have "R" generate rest, if no rests continue
      if(substr( $singleNot, -1 ) == ")" || is_numeric(substr( $singleNot, -1 )) ){ //if last sign is ")" or numeric
        if(substr( $singleNot, 0, 1 ) == "("){getNot(4,0,$style);} //if first sign is "(" then both first and last is () thus a 4 note
          elseif(is_numeric(substr( $singleNot, 0, 1 ))){getNot(4,0,$style);} // if first is numeric then both first and last is numeric, thus 4 note
          elseif(substr( $singleNot, 0, 1 ) == "."){ getNot(8,0,$style); } // if dot infront its 8th
          elseif(substr( $singleNot, 0, 1 ) == ":"){ getNot(16,0,$style); } // if ":" in front then its 16th
        }else{ //if last sign isnt numeric or ")" it must be a longer note
          if(substr( $singleNot, -1 ) == "."){getNot(2,0,$style);} // if last sign is "." its a halfnote
          elseif(substr( $singleNot, -1 ) == ":"){getNot(1,0,$style);} // if last sign is a ":" its a fullnote
        } //end esle
      }//end else from rests
    } //end forech $score

} //end genScore



function getNot($length,$dot,$style){ //generate div with right class for diffrent length
if($style=="div"){
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

    case "r":
    echo "<div class='not eighth' >";
      echo "<b>R</b>";
      if($dot == "1"){echo "&nbsp;<b>.</b>";}
    echo "</div>";
    break;

    case "R":
    echo "<div class='not forth' >";
      echo "<b>R</b>";
      if($dot == "1"){echo "&nbsp;<b>.</b>";}
    echo "</div>";
    break;

    case "d":
    echo "<div class='not empty' >";
      echo "<b>:|</b>";
      if($dot == "1"){echo "&nbsp;<b>.</b>";}
    echo "</div>";
    break;

    case "D":
    echo "<div class='not empty' >";
      echo "<b>|:</b>";
      if($dot == "1"){echo "&nbsp;<b>.</b>";}
    echo "</div>";
    break;


    case "":
    case NULL:
    break;
  } //end switch
}elseif($style == "unicode"){ //if style is unicode echo the right character
  switch($length)
  {
    case "1":
    echo "<div class='not unicodeN' >";
      echo "&#x1d15D;";
    echo "</div>";
    break;

    case "2":
    echo "<div class='not unicodeN' >";
      echo "&#x1d15E;";
    echo "</div>";
    break;

    case "4":
    echo "<div class='not unicodeN' >";
      echo "&#x1d15F;";
    echo "</div>";
    break;

    case "8":
    echo "<div class='not unicodeN' >";
      echo "&#x1d160;";
    echo "</div>";
    break;

    case "16":
    echo "<div class='not unicodeN' >";
      echo "&#x1d161;";
    echo "</div>";
    break;

    case "r":
    echo "<div class='not unicodeN' >";
      echo "&#x1d13E;";
    echo "</div>";
    break;

    case "R":
    echo "<div class='not unicodeN' >";
      echo "&#x1d13D;";
    echo "</div>";
    break;


    case "d":
    echo "<div class='not unicodeN' >";
      echo "&#x1d107;";
    echo "</div>";
    break;

    case "D":
    echo "<div class='not unicodeN' >";
      echo "&#x1d106;";
    echo "</div>";
    break;


    case "":
    case NULL:
    break;
  } //end switch
}//end elseif
} //end getNot


 ?>
