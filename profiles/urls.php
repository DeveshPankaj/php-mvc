<?php
/**
 * Created by PhpStorm.
 * User: devesh
 * Date: 8/8/18
 * Time: 9:02 PM
 */

namespace profile\urls;
include_once('lib/urls.php');
use lib\urls as urls;

$profile_urls =  new urls();
$profile_urls->add("/", "./profiles/views my");
$profile_urls->add("/other", "./profiles/views other");


function get(){
    global $profile_urls;
    return $profile_urls;
}
