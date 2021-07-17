<?php

namespace Experiment;

class Main 
{
    protected $url;
    public function __construct(string $url = null)
    {
        if (!$url) $url = "https://videx.comesconnected.com/";
        $this->url = $url;
    }

    function run(CallerInterface $caller, ScraperInterface $scraper)
    {
        /** @var \Symfony\Component\HttpFoundation\Response $response */
        $response = $caller->call($this->url);
        $scrapped = $scraper->scrape($response);

        $output = [
            'title'=>$scrapped->getTitle(),
            'description'=>$scrapped->getDescription(),
            'price'=>$scrapped->getPrice(),
            'discount'=>$scrapped->getDiscount()
        ];

        return json_encode($output);
    }
}
