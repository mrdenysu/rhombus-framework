<?php

namespace RhombusFramework\Models;

use RhombusFramework\Core\Model;

class DemoModel extends Model
{
    public function demo() {
        return "Data from DemoModel | This model is loaded automatically because its name is 'DemoModel' | '[Controller]Model'";
    }
}