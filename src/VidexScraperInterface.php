<?php


namespace Experiment;


use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\Response;

class VidexScraperInterface implements ScraperInterface
{

    function scrape(Response $httpResponse): array
    {
        $html = $httpResponse->getContent();
        $crawler = new Crawler($html);

        $rows = $crawler->filter('.row-subscriptions');
        $titles = $rows->filter('.col-cs-4');

        $result = [];
        for ($i=0; $i<=$titles->count()-1; $i++){
            $option = $titles->eq($i);
            $title = $option->filter('.header');
            $description = $option->filter('.package-name');
            $price = $option->filter('.package-price > .price-big');
            $discount = $option->filter(".package-price > p");


            $response = new \Experiment\Response();
            $response->setTitle($title->text());
            $response->setDescription($description->text());

            preg_match('/[\d]+/', $price->text(), $match);
            $response->setPrice((int)$match[0]);

            if(empty($discount->text())) continue;
            preg_match('/[\d]+/', $discount->text(), $match);
            $response->setDiscount((int)$match[0]);

            $result[] = $response;
        }
        return $result;
    }
}