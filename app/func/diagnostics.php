<?php

include_once("../classes/Image.php");
include "../classes/Session.php";

$session=new Session();
$session->validate("");

global $database;
$database->openConnection();

$uid=$_SESSION["user_id"];
$img=filter_input(INPUT_GET, 'img');
$val = filter_input(INPUT_GET, 'val');
$timespan = filter_input(INPUT_GET, 'timespan');

$item = new Image();

$item->registerValue($uid, $img, $val, $timespan);

$database->closeConnection();
header('location:..');