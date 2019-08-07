<?php
/**
 * Created by PhpStorm.
 * User: devesh
 * Date: 9/8/18
 * Time: 9:55 AM
 */

namespace lib;

class urls
{
    private $arr = array();

    function add($link, $path)
    {
        $this->arr[$link] = $path;
    }

    public function show($tab = "")
    {
        foreach ($this->arr as $key => $value) {
            switch (gettype($value)) {
                case "string":
                    echo "$tab $key => $value <br>";
                    break;

                case "object":
                    if (get_class($value) == "lib\urls") {
                        echo $key . "<br>";
                        $value->show("----");
                    } else {
                        die("[this] format not supported");
                    }
                    break;
                default:
                    die("[url] format not supported");
            }
        }
    }

    public function get($element, $index)
    {
        if (isset($element[$index])) {

            if (isset($this->arr["/" . $element[$index]])) {
                if (gettype($this->arr["/" . $element[$index]]) == "string") {
                    $temp = array(
                        "path" => $this->arr["/" . $element[$index]],
                        "found" => true,
                        "argv" => array()
                    );
                    return $temp;
                } elseif (gettype($this->arr["/" . $element[$index]]) == "object" && get_class($this->arr["/" . $element[$index]]) == "lib\urls") {
                    return $this->arr["/" . $element[$index]]->get($element, $index + 1);
                } else {
                    $temp = array(
                        "path" => "",
                        "found" => false,
                        "argv" => array()
                    );
                    return $temp;
                }
            } else {
                $temp = array(
                    "path" => "",
                    "found" => false,
                    "argv" => array()
                );
                return $temp;
            }
        } else {
            if (isset($this->arr["/"])) {
                if (gettype($this->arr["/"]) == "string") {
                    $temp = array(
                        "path" => $this->arr["/"],
                        "found" => true,
                        "argv" => array()
                    );
                    return $temp;
                } else {
                    $temp = array(
                        "path" => "",
                        "found" => false,
                        "argv" => array()
                    );
                    return $temp;
                }
            } else {
                $temp = array(
                    "path" => "",
                    "found" => false,
                    "argv" => array()
                );
                return $temp;
            }

        }
    }
}