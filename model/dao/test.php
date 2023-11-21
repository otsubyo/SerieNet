<?php

$text = "iutinfo";

$shaKey = hash("sha256", $text);

echo $shaKey;

echo php_uname('n');


