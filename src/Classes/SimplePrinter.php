<?php
namespace App;

class SimplePrinter implements PrinterInterface {

    public function print(array $list)
    {
        foreach($list as $key => $value) {
            echo 'Position: ' . $key . ': ' . $value['username'] . "<br>";
        }
    }
}
