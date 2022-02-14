<?php

class Order extends AbstractOrder
{
    public function applyDiscountRules(): void
    {
        foreach ($this->discountRules as $discountRule){
            $discountRule->applyDiscount($this);
        }
    }
}