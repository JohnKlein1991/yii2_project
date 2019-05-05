<?php

ob_start();

echo 'HEllO WORLD!!!<br>';
echo 'HEllO WORLD!!!<br>';
echo 'HEllO WORLD!!!<br>';
echo 'HEllO WORLD!!!<br>';
echo 'HEllO WORLD!!!<br>';
echo 'HEllO WORLD!!!<br>';

$x = ob_get_contents();

ob_clean();
var_dump($x);
