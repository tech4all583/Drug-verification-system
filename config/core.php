<?php
/**
 * Created by PhpStorm.
 * User: Tech4all
 * Date: 12/21/20
 * Time: 1:18 PM
 */

    session_start();
    require_once 'func.php';
    define('Env', 'onlin');

    define("DB_PREFIX", "dg_");

    define("LIB_DIR","http://projects.io/app/creche/");
    define("HOME_DIR","http://projects.io/app/drug-verification/");
    define("HTML_TEMPLATE",LIB_DIR.'templates/');
    define("USER_SESSION_HOLDER", "admin");
    define("WEB_TITLE","Drug Verification");
    define("WEB_SUB_TITLE","DG");

    if (Env == "online") {
        define('DB_HOST', 'localhost');
        define('DB_TABLE', 'verajnse_career_guidance');
        define('DB_USER', 'verajnse_career_guidance');
        define('DB_PASSWORD', 'B(kK!RFo.D%n');
    }else{
        define('DB_HOST', 'localhost');
        define('DB_TABLE', 'app_fpe_drug_verification');
        define('DB_USER', 'root');
        define('DB_PASSWORD', '');
    }

    try {
        $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_TABLE, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    }

    catch (PDOException $e){
        die('<br/><center><font size="15">Could not connect with database</font></center>');
    }