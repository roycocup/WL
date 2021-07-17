<?php
namespace Experiment;

interface ResponseInterface
{
    public function setTitle(string $title);

    public function setDiscount(int $discount);

    public function setDescription(string $description);

    public function setPrice(int $price);

    public function getTitle(): string;

    public function getDescription(): string;

    public function getPrice(): int;

    public function getDiscount(): int;
}