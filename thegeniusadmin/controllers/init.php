<?php

use http\Client;

session_start();

$dev_path = "pro";
$companyname = "AremoGemini";

$parent_path = $dev_path == "dev" ? "GeminiHome/thegeniusadmin/" : "thegeniusadmin/";


echo $parent_path;
     //include ($_SERVER['DOCUMENT_ROOT']."/". $parent_path.'models/MainModel.php');
     echo $_SERVER['DOCUMENT_ROOT']."/". $parent_path.'models/MainModel.php';
    // $mainModel = new MainModel();
