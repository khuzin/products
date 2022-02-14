<?php

interface DiscountInterface
{
    public function getDiscountPercent(): float;
    public function setDiscountPercent(float $percent): void;
    public function getDiscountPrice(): float;
}