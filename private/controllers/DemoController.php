<?php

namespace RhombusFramework\Controllers;

use RhombusFramework\Core\Controller;

class DemoController extends Controller
{
    public function mainAction(){

        $data = $this->model->demo();

        $this->view->render("Demo",[
            'h1' => "You on demo page",
            'p' => "This page was created to demonstrate the work of the framework!",
            'demo' => $data
        ]);
    }
}