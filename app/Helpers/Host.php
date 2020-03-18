<?php

namespace App\Helpers;

class Host
{
    public function host($host_name)
    {
        $hosts = [
            'api' => 'http://localhost:8001/api/'
        ];
        try {
            return $hosts[$host_name];
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
