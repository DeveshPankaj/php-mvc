<?php
/**
 * Created by PhpStorm.
 * User: devesh
 * Date: 11/8/18
 * Time: 9:28 PM
 */
namespace template;
use eftec\bladeone\BladeOne;

require_once('lib/BladeOne.php');

const views = 'views';
const compiledFolder = 'compiled';


function render($template, $args){
    $blade = new BladeOne(views, compiledFolder);
    try {
        echo $blade->run($template, $args);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}