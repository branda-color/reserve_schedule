<?php

namespace App\Exceptions;

use Exception;

class Errexception extends Exception
{
    
    public $message = 'Unknown exception';

    protected $code = 205;

    public function __construct($params = [])
    {
        parent::__construct();
        if (!is_array($params)) {
            return;
        }
        if (array_key_exists('code', $params)) {
            $this->code = $params['code'];
        }
        if (array_key_exists('msg', $params)) {
            $this->message = $params['msg'];
        }
    }


    // public function render($request)
    // {

    //     $result = [
    //         'code'  => $this->code,
    //         'msg'   => $this->message,
    //     ];
    //     return response($result);
    // }


    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }


    // public function context()
    // {
    //     return ['order_id' => $this->message];
    // }
}
