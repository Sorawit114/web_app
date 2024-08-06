<?php
$n = $_POST['number'];

if (($n % 2) == 0)
    echo "Your number is an even number.";
else
    echo "Your number is an odd number.";
?>