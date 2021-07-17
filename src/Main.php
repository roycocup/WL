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

    function run(Caller $caller, Scraper $scraper)
    {
        $output = [
            'title',
            'description',
            'price',
            'discount'
        ];
        return json_encode($output);
    }
}
