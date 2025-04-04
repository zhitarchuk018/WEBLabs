<?php
$str = 'ahb acb aeb aeeb adcb axeb abba adca abea';
preg_match_all('/\ba..b\b/', $str, $matches);
print_r($matches[0]); 

?>