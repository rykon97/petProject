<?php

namespace App\Models;

class Model {
    protected $name;
    protected $data;
    protected $active;

    private function loadJson() {
        $file_name = ROOTPATH.'/Database/'.$this->name.'.json';

        $file = fopen($file_name, 'r');
        $this->data = json_decode(fread($file, filesize($file_name)), true);
        fclose($file);
    }

    public function __construct() {
        $this->loadJson();
    }

    public function getAll() {
        return $this->data['database'];
    }

    public function find($id) {
        foreach($this->data['database'] as $item) {
            if($id == $item['id']) {
                // Нашли
                $this->active = $item;

                return $item;
            }
        }
    }
}