<?php

namespace Experiment;
use \Symfony\Component\HttpFoundation\Response;

class CurlCaller implements CallerInterface
{
    public function call(string $url): Response
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

        $parts = $this->extractParts($output);

        return new Response(
            $parts['body'],
            Response::HTTP_OK,
            ['content-type' => 'text/html']
        );
    }

    // Fixme: move to http extractor object
    private function extractParts($output)
    {
        list($header, $body) = explode("\r\n\r\n", $output, 2);
        return ['body'=>$body, 'header'=>$header];
    }
}