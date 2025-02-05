<?php
/*
|--------------------------------------------------------------------------
| Connect DB PHP MySQL
|--------------------------------------------------------------------------
|
*/
    $host     = "localhost";
    $user     = "sangxanx_ahmadila";
    $pass     = "gaktau89";
    $dbname   = "sangxanx_kasir";

    $connectdb = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
/*
|--------------------------------------------------------------------------
| Project Title Name
|--------------------------------------------------------------------------
|
*/
    $title_apl = 'POS Kasir';

/*
|--------------------------------------------------------------------------
| BASE SITE URL
|--------------------------------------------------------------------------
|
*/
    global $baseURL;
    $baseURL = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
    $baseURL .= "://" . $_SERVER['HTTP_HOST'];
    $baseURL .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
    
    // $baseURL  = "http://localhost/testing/crud-php-generator/";

/*
|--------------------------------------------------------------------------
| Date Default Timezone SET
|--------------------------------------------------------------------------
|
*/
    date_default_timezone_set("Asia/Jakarta");

/*
|--------------------------------------------------------------------------
| Error Reporting
|--------------------------------------------------------------------------
|
*/
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);