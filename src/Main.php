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

    function run(CallerInterface $caller, ScraperInterface $scraper, $returnJson = false)
    {
        /** @var \Symfony\Component\HttpFoundation\Response $response */
        $response = $caller->call($this->url);
        /** @var Response $scrapped */
        $scrapped = $scraper->scrape($response);

        $result[] = [
            'title'=>$scrapped->getTitle(),
            'description'=>$scrapped->getDescription(),
            'price'=>$scrapped->getPrice(),
            'discount'=>$scrapped->getDiscount(),
        ];

        if ($returnJson)
            return json_encode($result);

        return $result;
    }
}
