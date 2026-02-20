<?php
//----------------------------------------------------------------------------------------
//  Write a script to remove the duplicated numbers from this array then sort it Ascending
//	$numbers = [ 1 , 1 ,  1 , 2 , 2, 3 ,6 , 7 , 7 ,4 ,5,5 ] 
//  Output :  [ 1 , 2 , 3 , 4 , 5 , 6 , 7 ]
//----------------------------------------------------------------------------------------

$numbers = [1, 1,  1, 2, 2, 3, 6, 7, 7, 4, 5, 5];

$new_number = [];

foreach ($numbers as $num) {
    if (!in_array($num, $new_number)) {
        array_push($new_number,$num);
    }
}
sort($new_number);
print_r($new_number);
