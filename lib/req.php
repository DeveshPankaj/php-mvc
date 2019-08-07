<?php
/**
 * Created by PhpStorm.
 * User: devesh
 * Date: 8/8/18
 * Time: 7:32 PM
 */

require_once('urls.php');

class Route
{
    private $urlpattern;
    private $uri;
    private $url;

    public function __construct()
    {
        $this->urlpattern = new \lib\urls();
        $this->uri = $_SERVER["REQUEST_URI"];
        $this->url = array();

        foreach (explode('/', $this->uri) as $item) {
            if (strlen($item) > 0) {
                array_push($this->url, $item);
            }
        }
    }

    public function add($url, $path)
    {
        $this->urlpattern->add($url, $path);
    }

    function show()
    {
        $this->urlpattern->show();
    }

    private function solve_path($index)
    {
        return $this->urlpattern->get($this->url, $index);
    }

    public function go()
    {
        $argv = $this->solve_path(0);
        if($argv['found'] == false){
            die("<h1>404</h1>");
        }else{
            try{
                $file = explode(" ", $argv['path']);
                require_once($file[0] . ".php");
                if(function_exists($file[1])){
                    $file[1]();
                }else{
                    echo "<h1>Internal error METHOD_NOT_FOUND</h1>";
                }
            }catch (Exception $e){
                echo "FILE or function not found!<br>";
            }
        }
    }
}