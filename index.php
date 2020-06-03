<?php

include_once "base.php";

$total = new db('total');
echo "<pre>";
print_r($total->del(['total'=>40]));
echo "</pre>";
?>