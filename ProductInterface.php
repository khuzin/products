<?php

interface ProductInterface
{
    public function getCode(): string;
    public function setCode(string $code): void;

    public function getPrice(): float;
    public function setPrice(float $price): void;
}