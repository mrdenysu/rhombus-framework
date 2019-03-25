<?php

namespace RhombusFramework\Core;

//use RhombusFramework\Libs\DB;

abstract class Model
{
    public $db;

    public function __construct() {
        //$this->db = new DB();
    }
}