<?php 
include "../classes/Session.php";

$ac=filter_input(INPUT_GET, 'ac');

if(!isset($ac)||$ac==""){
    $ac=0;
}

$user = filter_input(INPUT_POST,'username');

$session=new Session();

switch($ac){
    case "1": $session->close();
	break;
    default: $session->start($user);
}