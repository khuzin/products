<?php

abstract class AbstractDiscountRule implements DiscountRuleInterface
{
    protected $percent = 0;

    public function getDiscountPercent(): float{
        return $this->percent;
    }

    public function setDiscountPercent(float $percent): void
    {
        $this->percent = $percent;
    }
}