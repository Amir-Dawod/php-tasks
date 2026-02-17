<?php

//--------------------------------------------------------------
//   Write a PHP script that takes a number integer representing   
//   the hours and converts it to seconds.
//--------------------------------------------------------------


$hours = (int) 2; // convert any data type  to integer 


$seconds =  $hours * 60 * 60;   // $seconds = hours * minutes * seconds

echo $seconds;