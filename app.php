<?php
/**
 * Created by PhpStorm.
 * User: devesh
 * Date: 8/8/18
 * Time: 6:45 PM
 */


error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

require_once ('lib/req.php');
require_once('lib/urls.php');
require_once ('main/urls.php');
require_once ('profiles/urls.php');

$main_urls = \main\urls\get();
//$profile_urls = profile\get();

$Routes = new Route();
$Routes->add("/", "./main/views home");
$Routes->add("/main", $main_urls);
$Routes->add("/profile", $profile_urls);

$Routes->add("/abc", "./main/examples/test testing");

//$Routes->show();
$Routes->go();
