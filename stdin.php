<?php

define("MIN_TEMP", -50);
define("MAX_TEMP", 50);

if ( !($tempInput = fgets(STDIN)) ) {
    return;
}
$temp = explode(' ', trim($tempInput));

if (count($temp) !== 2 || 
    (!is_numeric($temp[0]) || !is_numeric($temp[1])) ||
    (intval($temp[0]) < MIN_TEMP || intval($temp[0]) > MAX_TEMP) ||
    (intval($temp[1]) < MIN_TEMP || intval($temp[1]) > MAX_TEMP)
) {
    return;
}

if ( !($modeInput = trim(fgets(STDIN)))) {
    return;
}
// Здесь все ок - идет вычисление
$troom = intval($temp[0]);
$tcond = intval($temp[1]);
$result = "";

switch ($modeInput) {
    case "freeze":
        $result = $troom > $tcond ? $tcond : $troom;
        break;
    case "heat":
        $result = $troom < $tcond ? $tcond : $troom;
        break;
    case "auto":
        $result = $tcond;
        break;
    case "fan":
        $result = $troom;
        break;
}
fputs(STDOUT, $result);
?>