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
        $monthly = $rows->first();
        $annually = $rows->last();

        $monthlyDeals = $this->extract($monthly);
        $annualDeals = $this->extract($annually);
        return array_merge($monthlyDeals, $annualDeals);
    }

    private function extract($row): array
    {
        $titles = $row->filter('.col-cs-4');
        $result = [];
        for ($i = 0; $i <= $titles->count() - 1; $i++) {
            $option = $titles->eq($i);
            $title = $option->filter('.header');
            $description = $option->filter('.package-name');
            $price = $option->filter('.package-price > .price-big');
            $discount = $option->filter(".package-price > p");


            $response = new \Experiment\Response();
            $response->setTitle($title->text());
            $response->setDescription($description->text());

            preg_match('/[\d]+/', $price->text(), $m1);
            $response->setPrice((int)$m1[0]);

            try{
                preg_match('/[\d]+/', $discount->text(), $m2);
                $response->setDiscount((int)$m2[0]);
            } catch (\Exception $e) {
                // no need to set anything then
            }

            $result[] = $response;
        }
        return $result;
    }
}