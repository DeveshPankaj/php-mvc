<?php
/**
 * Copyright (c) 2016 Jorge Patricio Castro Castillo MIT License..s
 */

use eftec\bladeone\BladeOne;
use eftec\bladeone\BladeOneHtmlBootstrap;

include "../lib/BladeOne.php";

include "../lib/BladeOneHtml.php";
include "../lib/BladeOneHtmlBootstrap.php";

$views = __DIR__ . '/views';
$compiledFolder = __DIR__ . '/compiled';

class myBlade extends  BladeOne {
    use BladeOneHtmlBootstrap;
}
define("BLADEONE_MODE",1); // (optional) 1=forced (test),2=run fast (production), 0=automatic, default value.
$blade=new myBlade($views,$compiledFolder);

//<editor-fold desc="Example data">
$countries=array();
$country=new stdClass();
$country->id=1;
$country->cod='ar';
$country->name="Argentina";
$country->continent="America";
$countries[]=$country;
$country=new stdClass();
$country->id=2;
$country->cod='ca';
$country->name="Canada";
$country->continent="America";
$countries[]=$country;
$country=new stdClass();
$country->id=3;
$country->cod='us';
$country->name="United States";
$country->continent="America";
$countries[]=$country;
$country=new stdClass();
$country->id=4;
$country->cod='jp';
$country->name="Japan";
$country->continent="Asia";
$countries[]=$country;

$countrySelected=3;
$multipleSelect=[1,2];
//</editor-fold>


try {
    echo $blade->run("TestBS.hellobootstrap"
        , ["countries" => $countries
            , 'countrySelected' => $countrySelected
            , 'multipleSelect' => $multipleSelect]);
} catch (Exception $e) {
    echo "error found ".$e->getMessage()."<br>".$e->getTraceAsString();
}
