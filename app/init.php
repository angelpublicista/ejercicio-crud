<?php

require_once "config/config.php";
require_once "helpers/url_helper.php";

// Cargamos las libs
spl_autoload_register(function($nameClass){
    require_once "libs/" . $nameClass . ".php";
});