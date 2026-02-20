<?php

//-----------------------------------------------------------------------------------------------
// Create a script using a for loop to add all the integers between 0 and 30 and display the total 
//-----------------------------------------------------------------------------------------------


$total = 0;

for ($i = 0; $i <= 30; $i++) {
    $total += $i;
}

echo $total;
