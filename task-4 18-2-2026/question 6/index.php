<?php

//------------------------------------------------------------------------------------------
// Create a function that takes an array of numbers. Return the Largest number in the array.
//------------------------------------------------------------------------------------------


$numbers = [5, 15, -10, 100, 250, 0, 1, 500];



function largestNumber($numbers)
{
    $result = 0;

    foreach ($numbers as $number) {

        foreach ($numbers as $num) {
            if ($num > $number) {
                $result = $num;
            }
        }
    }
    return "$result  <br>";
}
echo largestNumber($numbers);


// Another solution

echo max($numbers);