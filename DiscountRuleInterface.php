<?php

interface DiscountRuleInterface {
    public function getDiscountPercent(): float;
    public function setDiscountPercent(float $percent): void;
    public function applyDiscount(AbstractOrder &$order): void;
}