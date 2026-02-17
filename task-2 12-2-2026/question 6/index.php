<?php



$text = "          EraaSoft Learn by practice         amir   ";

//--------------------------------
// Get the length of this sentence
//--------------------------------

echo " length of this sentence : " . strlen($text) . "<br>";


//------------------------------------------------
// Get the length of this sentence without spaces.
//------------------------------------------------

echo "length of  this sentence without spaces : " . strlen(trim($text))  . "<br>";

//------------------------------------------
// Get the number of words in this sentence. 
//------------------------------------------


echo "number of words in this sentence : " . str_word_count($text) . "<br>";



//-----------------------------------------------------
// Check if this word (by) exists in the string or not.
//-----------------------------------------------------

if (str_contains($text, 'by')) {

    echo 'this word (by) exists in the string <br> ';
} else {

    echo 'this word (by) not exists in the string <br>';
}

//------------------------------------------------------
// Get the word (EraaSoft) from the string and print it.
//------------------------------------------------------

echo strstr($text, 'EraaSoft', 8) . "<br>";

//----------------------------------------------------------------------------------
// Remove the word (by) from the string and print the string with and without (by) .
//----------------------------------------------------------------------------------

$new_text = str_replace('by', '', $text);
echo $text . "<br>";
echo $new_text . "<br>";