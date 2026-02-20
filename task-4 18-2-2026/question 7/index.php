<?php


//------------------------------------------------------------------------------------------
// Create a function that takes an array of numbers. Return the Smallest number in the array
//------------------------------------------------------------------------------------------

$numbers = [5, 15, -10, 100, 250, 0, 1];

function SmallestNumber($numbers)
{
    $result = $numbers[0];

    foreach ($numbers as $number) {

        // foreach ($numbers as $num) {
            if ( $number < $result) {
                $result = $number;
            }
        // }
    }
    return "$result <br>";
}

echo SmallestNumber($numbers);


// Another solution

echo min($numbers);

