<?php

require_once "config/config.php";
require_once "helpers/url_helper.php";
require_once "libs/vendor/autoload.php";


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Cargamos las libs
spl_autoload_register(function($nameClass){
    require_once "libs/" . $nameClass . ".php";
});