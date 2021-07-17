<?php

namespace Experiment;

use \Symfony\Component\HttpFoundation\Response;

interface Caller
{
    public function call(string $url): Response;
}