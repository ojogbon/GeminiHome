<?php

use http\Client;

session_start();

$dev_path = "dev";
$companyname = "AremoGemini";

$parent_path = $dev_path == "dev" ? "/GeminiHome/thegeniusadmin/" : "/";

    include ($_SERVER['DOCUMENT_ROOT']. $parent_path.'models/MainModel.php');
    $mainModel = new MainModel();
