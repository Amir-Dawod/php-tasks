<?php



$description = "no pain , no gain ";


//--------------------------------------------------------------------------------------------------------------------------------------------------
// Check from this string o If the string has “gain” Print ( success word ) o If the string has ( peen ) Print ( success word )  Else ( wrong word )
//--------------------------------------------------------------------------------------------------------------------------------------------------
if ($description == "gain") {
    echo " success word <br>";
} elseif ($description == "pain") {
    echo " success word <br>";
} else {
    echo " wrong word <br>";
}


//-------------------------------------------------------------------------------------------------------------------------------------------------
//A Boolean is a data type that has only two values true or false. These values often correspond to 1 (true) or 0 (false). When a 1 or a 0 is used,
//  it's called an int Boolean. Write a PHP script that stores an int Boolean and outputs its opposite (1 becomes 0 and 0 becomes 1).
//-------------------------------------------------------------------------------------------------------------------------------------------------

$number = 0;


echo !$number . "<br";


//---------------------------------------------------------------------------------------------------------------------------------
// Write a PHP script that stores a word and determines Is the Word is Singular or Plural? (A plural word is one that ends in "s".)
//---------------------------------------------------------------------------------------------------------------------------------


$word = "tasks";
if ($word[strlen($word) - 1] == "s") {

    echo " this word is :  plural <br> ";
} else {

    echo " this word is :  Singular <br> ";
}