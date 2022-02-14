<?php

abstract class AbstractProduct implements ProductInterface, DiscountInterface
{
    protected string $code;
    protected float $price;
    protected float $discountPercent = 0;

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getDiscountPrice(): float
    {
        return $this->getPrice() - $this->getPrice() * $this->getDiscountPercent() / 100;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getDiscountPercent(): float
    {
        return $this->discountPercent;
    }

    public function setDiscountPercent(float $percent): void
    {
        $this->discountPercent = $percent;
    }
}