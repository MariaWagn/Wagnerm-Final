<?php
require_once('../../settings.php');
$content=file_get_contents(APP_PATH.'/data/genre.json');
$content=json_decode($content, true);
unset($content[$_GET['index']]);
$content=array_values($content);
$content=json_encode($content,JSON_PRETTY_PRINT);
file_put_contents(APP_PATH.'/data/genre.json',$content);
header('location:index.php');