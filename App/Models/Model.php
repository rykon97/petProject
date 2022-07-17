<?php

namespace App\Models;

class Model {
    protected $name;
    protected $data;

    private function loadJson() {
        $file_name = ROOTPATH.'/Database/'.$this->name.'.json';

        $file = fopen($file_name, 'r');
        $this->data = json_decode(fread($file, filesize($file_name)));
        fclose($file);
    }

    public function __construct() {
        $this->loadJson();

        print_r($this->data);
    }
}