<?php

namespace Experiment;

class CurlRequester implements Requester
{
    public function call(string $url): Response
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $response = new Response();
        $response->setBody($output);
        $response->setStatusCode(200);
        return $response;
    }
}