<?php

abstract class AbstractOrder implements OrderInterface, DiscountInterface
{
    protected array $products = array();
    protected float $discountPercent = 0;
    protected array $discountRules = array();

    public function addProduct(AbstractProduct $product): void
    {
        $this->products[] = $product;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function getPrice(): float
    {
        $price = 0;
        foreach ($this->products as $product){
            $price += $product->getPrice();
        }
        return $price;
    }

    public function getDiscountPercent(): float
    {
        return $this->discountPercent;
    }

    public function setDiscountPercent(float $percent): void
    {
        $this->discountPercent = $percent;
    }

    public function getDiscountPrice(): float
    {
        $this->applyDiscountRules();
        $price = 0;
        foreach ($this->products as $product){
            $price += $product->getDiscountPrice();
        }
        $price -= $price * $this->getDiscountPercent() / 100;
        return $price;
    }


    public function addDiscountRule(string $key, DiscountRuleInterface $discountRule): void
    {
        $this->discountRules[$key] = $discountRule;
    }

    public function getDiscountRule(string $key): ?DiscountRuleInterface
    {
        if (isset($this->discountRules[$key])){
            return $this->discountRules[$key];
        }
        return false;
    }
}