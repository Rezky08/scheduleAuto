<?php

namespace App\Helpers;

class Host
{
    public function host($host_name)
    {
        $hosts = [
            'api' => 'https://cryptic-retreat-61973.herokuapp.com/api/'
        ];
        try {
            return $hosts[$host_name];
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
