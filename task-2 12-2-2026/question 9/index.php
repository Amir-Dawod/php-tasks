<?php


//--------------------------------------------------------------------------
// Make a calculator with these operations using if and else if o Submission 
//--------------------------------------------------------------------------


$num1 = 10;
$num2 = 10;
$operator = "+";

if ($operator == "+") {
    echo $num1 + $num2;
} elseif ($operator == "-") {
    echo $num1 - $num2;
} elseif ($operator == "*") {
    echo $num1 * $num2;
} elseif ($operator == "/") {
    echo $num1 / $num2;
} elseif ($operator == "**") {
    echo $num1 ** $num2;
} elseif ($operator == "%") {
    echo $num1 % $num2;
}