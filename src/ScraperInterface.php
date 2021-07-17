<?php


namespace Experiment;
use \Symfony\Component\HttpFoundation\Response;

interface ScraperInterface
{
    function scrape(Response $httpResponse): array;
}