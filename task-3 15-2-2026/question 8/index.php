<?php

//----------------------------------------------------------------------------------------
// Write a program to calculate and print the factorial of a number using a for loop. 
// The factorial of a number is the product of all integers up to and including that number
// Example : the factorial of 4 is 4*3*2*1= 24
//-----------------------------------------------------------------------------------------

$result = 1;
for ($i = 1; $i <= 4; $i++) {
    $result *= $i;
}

echo $result;
