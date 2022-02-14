<?php

class ThirdDiscountRule extends AbstractDiscountRule
{
    public string $discountProductCount;
    public array $exceptedProductCodes = array();

    public function __construct(string $discountProductCount, array $exceptedProductCodes = array(), float $discountPercent = 0)
    {
        $this->discountProductCount = $discountProductCount;
        $this->exceptedProductCodes = $exceptedProductCodes;
        $this->percent = $discountPercent;
    }

    /**
     * @return string
     */
    public function getDiscountProductCount(): string
    {
        return $this->discountProductCount;
    }

    /**
     * @param string $discountProductCount
     */
    public function setDiscountProductCount(string $discountProductCount): void
    {
        $this->discountProductCount = $discountProductCount;
    }

    /**
     * @return array
     */
    public function getExceptedProductCodes(): array
    {
        return $this->exceptedProductCodes;
    }

    /**
     * @param array $exceptedProductCodes
     */
    public function setExceptedProductCodes(array $exceptedProductCodes): void
    {
        $this->exceptedProductCodes = $exceptedProductCodes;
    }

    public function applyDiscount(AbstractOrder &$order): void
    {
        $products = $order->getProducts();
        $selectedProductsCount = 0;
        foreach ($products as $product){
            if($product->getDiscountPercent() == 0 && !in_array($product->getCode(), $this->getExceptedProductCodes())){
                $selectedProductsCount++;
            }
        }

        if ($selectedProductsCount == $this->getDiscountProductCount() && $order->getDiscountPercent() < $this->getDiscountPercent()){
            $order->setDiscountPercent($this->getDiscountPercent());
        }
    }
}