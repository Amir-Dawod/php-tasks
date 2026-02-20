<?php

//---------------------------------------------------------------------------
// Write a program which will count the "r" characters in the text "eraasoft"
//---------------------------------------------------------------------------

$text= str_split("eraasoft",1);

$count=0;
foreach($text as $char){
    if($char == "r"){
        $count++;
    }
}
 
echo "$count  <br>";



// Another solution
echo substr_count("eraasoft","r"); 
?>