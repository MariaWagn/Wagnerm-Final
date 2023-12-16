<?php
require_once('../../settings.php');
$output='';
$fp=fopen(APP_PATH.'/data/users.csv.php', 'r');
$index=0;
while(!feof($fp)){
	$line=fgets($fp);
	if($index!=$_GET['index']){
		$output.=$line;
	}
	$index++;
}
fclose($fp);
$fp=fopen(APP_PATH.'/data/users.csv.php', 'w');
fputs($fp, $output);
fclose($fp);
header('location: index.php');