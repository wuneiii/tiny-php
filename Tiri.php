<?php
    if(!defined('__APP_ROOT__')){die('No App_Root!');}

    define('__TIRI_ROOT__', dirname(__FILE__));

    require_once __TIRI_ROOT__.'/Widget/Probe.php';
    Widget_Probe::here('App start up now;');

    require_once __TIRI_ROOT__.'/Tiri/App.php';
    Tiri_App::init();
    
    Tiri_Hook::getInstance() -> runHook('afterAppInit');
    Widget_Probe::here('After Tiri_App::init()');

    if($_GET['model'] == 1){
        Tools_ModelCodeBuilder::build();
        exit;
    }

    Tiri_Hook::getInstance() -> runHook('beforeDispose');
    Widget_Probe::here('Before Tiri_Router::dispose();');

    Tiri_Router::dispose();

    Widget_Probe::here('After Tiri_Router::dispose();');
    Tiri_Hook::getInstance() -> runHook('afterDispose');
?>