--TEST--
Bug #71539.5 (Memory error on $arr[$a] =& $arr[$b] if RHS rehashes)
--FILE--
<?php
$array = [];
$array['']->prop =& $array[0];
$array[0] = 42;
var_dump($array);
?>
--EXPECTF--
Warning: Creating default object from empty value in %sbug71539_5.php on line 3
array(2) {
  [0]=>
  &int(42)
  [""]=>
  object(stdClass)#1 (1) {
    ["prop"]=>
    &int(42)
  }
}
