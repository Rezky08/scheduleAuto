<?php

namespace App\Helpers;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Request_api
{
    public function request($method = 'GET', $url, $option = [])
    {
        $client = new Client();
        try {
            $client = $client->request($method, $url, $option);
            if ($client->getStatusCode() == 200) {
                $contents = $client->getBody()->getContents();
                $contents = json_decode($contents);
                $contents = collect($contents);
                $response = $contents->toArray();
                return $response;
            }
        } catch (Exception $e) {
            $response = [
                'status' => $e->getCode(),
                'messgae' => $e->getMessage()
            ];
            return $response;
        }
    }
}
