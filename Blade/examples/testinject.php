<?php
include "../lib/BladeOne.php";
use eftec\bladeone;

$views = __DIR__ . '/views';
$compiledFolder = __DIR__ . '/compiled';
$blade=new bladeone\BladeOne($views,$compiledFolder);
define("BLADEONE_MODE",1); // (optional) 1=forced (test),2=run fast (production), 0=automatic, default value.

$records=array(1,2,3);

include "service/Metric.php";

class SimpleClass {
    function ping($pong) {
        return $pong;
    }
}





try {
    echo $blade->run("Main.inject"
        , ["name" => "hello"
            , 'records' => $records
            , 'emptyArray' => array()
        ]);

} catch (Exception $e) {
    echo $e->getMessage();
}