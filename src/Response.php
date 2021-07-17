<?php

namespace Experiment;

class Response
{
    /**
     * @type int
     */
    protected $statusCode;

    /**
     * @type string
     */
    protected $body;


    public function setStatusCode(int $statusCode)
    {
        $this->statusCode = $statusCode;
    }

    public function setBody(string $body)
    {
        $this->body = $body;
    }

    public function statusCode()
    {
        return $this->statusCode;
    }

    public function body()
    {
     return $this->body;
    }

}