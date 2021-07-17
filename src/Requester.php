<?php

namespace Experiment;

use \Symfony\Component\HttpFoundation\Response;

interface Requester
{
    public function call(string $url): Response;
}