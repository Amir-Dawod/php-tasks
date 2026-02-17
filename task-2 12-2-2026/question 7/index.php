<?php

$string_one = "Eraa";
$string_two = "Soft";


//-----------------------------------------------------------------------------------
//Make a new variable called (Full_string) that concatenate string_one and string_two
//-----------------------------------------------------------------------------------

$full_string = $string_one . $string_two;
echo "Full_string : $full_string <br> ";


//-----------------------------------------------------
// Compare the full_string and this string (EraaSoft).
//-----------------------------------------------------
if ($full_string == "EraaSoft") {

    echo  "string is match <br>";
} else {

    echo "string is not  match <br>";
}

//--------------------------------------------------
// Write a PHP script to split the following string.
//Sample string: 'ErraSoft' 
//Expected Output: Er/ra/So/ft
//--------------------------------------------------
$sample_string = "ErraSoft";
echo chunk_split($sample_string, 2, "/") . "<br>";



//------------------------------------------------------------------------------------------
//  Write a PHP script that stores the number as a variable and checks if it is odd or even.
//------------------------------------------------------------------------------------------
$num = 6;

echo ($num % 2 == 0) ? "even <br>" : "odd <br>";


//---------------------------------------------------------------------------------------------------
//   Write a PHP script that stores the string as a variable and checks if the length is odd or even.
//---------------------------------------------------------------------------------------------------

$text =  "EraaSOFT";

if (strlen($text) % 2 == 0) {
    echo "even <br>";
} else {
    echo "odd <br>";
}