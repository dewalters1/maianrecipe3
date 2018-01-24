<?php
error_reporting(E_ALL ^ E_NOTICE);
$GDArray = gd_info();

//$Version = $GDArray["GD Version"];
$Version = @preg_match('/((?:(\d+)\.)?(?:(\d+)\.)?(?:(\d+)))/', '', $Version);
//$Version = $GDArray["GD Version"];
//$Ver = @preg_replace('(?:(\d+)\.)?(?:(\d+)\.)?(?:(\d+)\.\d+)', '', $Version);
//echo (isset($Version) ? 'v'.$Version.' - <b>'.$setup19.'</b>' : $setup22);
echo('gd v'.$Version.'<br>');
//echo('ver '.$Ver.'<br>');
echo('<br>');
var_dump(gd_info());
echo('<br>');
print_r(gd_info());
?>