<?php

include("application.php");

//  'QUERY_STRING' => string 'a=1' (length=3)
//  'PATH_INFO' => string '/router' (length=7)
//  'REQUEST_METHOD' => string 'GET' (length=3)

$app = new Application();
$app->run();
