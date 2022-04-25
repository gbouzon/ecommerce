<?php
    namespace app\controllers;

        class AddressAPI extends \app\core\Controller {

            function index() {

            }

            function canadaAddressFromPostal($postal) {
                //call the API 
                $postal = substr($postal, 0, 3);
                if (strlen($postal) === 3) {
                    $AddressAPIItem = new \app\models\AddressAPI();
                    $AddressAPIResult = $AddressAPIItem->get($postal);
                    if (!$AddressAPIResult) {
                        $url = 'https://api.zippopotam.us/CA/' . $postal;
                        $result = \app\core\ExternalData::get($url);
                        $AddressAPIItem->postal = $postal;
                        $AddressAPIItem->result = $result;
                        $AddressAPIItem->insert();
                        echo $result;
                    }
                    else {
                        echo $AddressAPIResult->result;
                    }
                }
                //return the result
            }
        }