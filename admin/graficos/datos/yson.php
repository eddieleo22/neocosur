<?php
$a = array('<foo>',"'bar'",'"baz"','&blong&');

echo "Normal: ",  json_encode($a), "\n";
echo "Tags: ",    json_encode($a, JSON_HEX_TAG), "\n";
echo "Apos: ",    json_encode($a, JSON_HEX_APOS), "\n";
echo "Quot: ",    json_encode($a, JSON_HEX_QUOT), "\n";
echo "Amp: ",     json_encode($a, JSON_HEX_AMP), "\n";
echo "Unicode: ", json_encode($a, JSON_UNESCAPED_UNICODE), "\n";
echo "All: ",     json_encode($a, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE), "\n\n";

$b = array();

echo "Array vacío retornado como array: ", json_encode($b), "\n";
echo "Array vacío retornado como object: ", json_encode($b, JSON_FORCE_OBJECT), "\n\n";

$c = array(array(1,2,3));

echo "Array no asociativo retornado como array: ", json_encode($c), "\n";
echo "Array no asociativo retornado como objeto: ", json_encode($c, JSON_FORCE_OBJECT), "\n\n";

$d = array('foo' => 'bar', 'baz' => 'long');

echo "Array asociativo siempre es retornado como objeto: ", json_encode($d), "\n";
echo "Array asociativo siempre es retornado como objeto: ", json_encode($d, JSON_FORCE_OBJECT), "\n\n";

$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
$ar=json_decode($json,true);
echo "<br><br> ".$ar['d']."  <br><br>";
var_dump(json_decode($json));
var_dump(json_decode($json, true));

?>