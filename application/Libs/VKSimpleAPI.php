<?php

namespace RhombusFramework\Libs;

class VKSimpleAPI
{
    private
        $conf,
        $event, // In test || EventSys
        $face_control;
    public $input;
    public function __construct($input = null, $face_control = null)
    {
        $this->conf = require 'application/settings/vkSimpleAPI_conf.php';
        $this->input = ($input == null) ? json_decode(file_get_contents('php://input')) : $input;
        $this->face_control = ($face_control == null) ? false : $face_control;
        $this->addEvent('confirmation', function () {
            echo $this->conf['callback']['confirmation'];
        });
    }
    public function addEvent($event, $func) // In test || EventSys
    {
        $this->event[$event] = $func;
    }
    public function eventLoop() // In test || EventSys
    {
        $type = $this->input->type;
        if ($this->face_control) {
            if (!($this->input->secret == $this->conf['callback']['secret_key'])) {
                exit('Access denied');
            }
        }
        if (array_key_exists($type ,$this->event)) {
            $this->event[$type]();
        } else {
            exit('Unsupported event');
        }
    }
    public function api($method, $params) {
        $params['access_token'] = $this->conf['access_key'];
        $params['v'] = $this->conf['callback']['v'];
        $query = http_build_query($params);
        $url = $this->conf['endpoint'] . $method . '?' . $query;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        $error = curl_error($curl);
        if ($error) {
            error_log($error);
            throw new Exception("Failed {$method} request");
        }
        curl_close($curl);
        $response = json_decode($json, true);
        if (!$response || !isset($response['response'])) {
            error_log($json);
            throw new Exception("Invalid response for {$method} request");
        }
        return $response['response'];
    }
}