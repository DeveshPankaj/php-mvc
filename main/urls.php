<?php
/**
 * Created by PhpStorm.
 * User: devesh
 * Date: 9/8/18
 * Time: 11:45 AM
 */
namespace main\urls;
include_once('lib/urls.php');
use lib\urls as urls;

$main_urls =  new urls();
$main_urls->add("/", "./main/views home");
$main_urls->add("/home", "./main/views home");
$main_urls->add("/help", "./main/views help");
$main_urls->add("/contact", "./main/views contact");


function get(){
    global $main_urls;
    return $main_urls;
}
