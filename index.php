<?php

include_once "base.php";

$total = new db('total');
echo "<pre>";
print_r($total->find(2));
echo "</pre>";
?>