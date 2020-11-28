<?php

use http\Client;

session_start();

$dev_path = "pro";
$companyname = "AremoGemini";

$parent_path = $dev_path == "dev" ? "/GeminiHome/thegeniusadmin/" : "/app/thegeniusadmin/";

    include ($_SERVER['DOCUMENT_ROOT']. $parent_path.'models/MainModel.php');
    $mainModel = new MainModel();
