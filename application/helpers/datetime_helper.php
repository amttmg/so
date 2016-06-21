<?php
function getCurrentDateTime(){
    date_default_timezone_set('Asia/Kathmandu');
    $currenttime = date('Y-m-d h:i:s', time());
    return $currenttime;
}
function getTime(){
    date_default_timezone_set('Asia/Kathmandu');
    $currenttime = date('h:i:s', time());
    return $currenttime;
}
function getCurrentDate(){
    date_default_timezone_set('Asia/Kathmandu');
    $currenttime = date('Y-m-d', time());
    return $currenttime;
}