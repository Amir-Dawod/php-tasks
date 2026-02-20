<?php
//--------------------------------------------------------------------------------------------------------
// Write a PHP program that calculates the sum of the values in an associative array using a foreach loop.
//--------------------------------------------------------------------------------------------------------

$sales = array("Jan" => 100, "Feb" => 200, "Mar" => 150);
$total_of_values = 0;
foreach ($sales as $value) {
    $total_of_values += $value;
}
echo $total_of_values;
