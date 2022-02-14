<?php

interface OrderInterface
{
    public function addProduct(AbstractProduct $product): void;
    public function getProducts(): array;

    public function getPrice(): float;

    public function addDiscountRule(string $key, DiscountRuleInterface $discountRule): void;
    public function getDiscountRule(string $key): ?DiscountRuleInterface;
    public function applyDiscountRules(): void;
}