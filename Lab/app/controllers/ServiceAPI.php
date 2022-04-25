<?php
    namespace app\controllers;

        class ServiceAPI extends \app\core\Controller {

            function index() {

            }

            function getAPIData() {
                $url = 'https://webservice.cstutoring.ca/entries';
                $result = \app\core\ExternalData::get($url);
                $result = json_decode($result);
                $this->view('ServiceAPI/index', $result);
            }
        }