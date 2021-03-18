<?php
echo "hello hillel";
echo "Hello World))" . "</br>";
echo " 08.03.2021";
$q = 'gjvhj';
$jon
    =
    "khlkg";
echo '$q';
echo "/hr" . "</br>";
echo "ПОКА!!!!!!!!!!!!!!!!!!!!!!!!!!!";
include_once "inc.php";

$resArray = [];
function convertToSimpleArray($array){
    global $resArray;
    if(is_array($array)){
        foreach($array as $below){
            $res = convertToSimpleArray($below);

        }
    }else{
        $resArray[] = $array;
    }
    return $resArray;
}

