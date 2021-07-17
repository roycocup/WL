<?php

namespace Experiment;

use \Symfony\Component\HttpFoundation\Response;

interface CallerInterface
{
    public function call(string $url): Response;
}