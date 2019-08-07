<?php
/**
 * Created by PhpStorm.
 * User: devesh
 * Date: 8/8/18
 * Time: 9:14 PM
 */


require_once('lib/BladeOne.php');
require_once('settings.php');

use eftec\bladeone;


function home()
{
    $context = [
        "title" => "Hello",
        "content" => "Home"
    ];

    template\render("Main.child", $context);
}

function help()
{
    $context = [
        "title" => "Hello",
        "content" => "Help"
    ];
    template\render("Main.child", $context);
}

function contact()
{
    $context = [
        "title" => "Hello",
        "content" => "Contact"
    ];
    template\render("Main.child", $context);
}