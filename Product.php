<?php

class Product extends AbstractProduct
{
    public function __construct(string $code, float $price = 0)
    {
        $this->code = $code;
        $this->price = $price;
    }
}