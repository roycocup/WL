<?php


namespace Experiment;


class Response implements ResponseInterface
{

    private $title;
    private $discount;
    private $description;
    private $price;

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function setDiscount(int $discount)
    {
        $this->discount = $discount;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function setPrice(int $price)
    {
        $this->price = $price;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getDiscount(): int
    {
        return $this->discount;
    }
}