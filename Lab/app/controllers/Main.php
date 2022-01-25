<?php

    namespace app\controllers;

        class Main extends \app\core\Controller {

            public function index() {
                //default controller method according to routing
                $this -> view('Main/index');
            }
        }