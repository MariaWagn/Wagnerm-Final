<?php
function readJson($info) {
$file='data/'.$info.'.json';
$content=file_get_contents($file);
$php_array=json_decode($content,true);
return $php_array;
}
?>