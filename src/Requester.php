<?php

namespace Experiment;

interface Requester
{
    public function call(string $url): Response;
}