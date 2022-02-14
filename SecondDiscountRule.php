<?php

class SecondDiscountRule extends AbstractDiscountRule
{
    public string $discountProductCode;
    public array $selectedProductCodes = array();

    public function __construct(string $discountProductCode, array $selectedProductCodes = array(), float $discountPercent = 0)
    {
        $this->discountProductCode = $discountProductCode;
        $this->selectedProductCodes = $selectedProductCodes;
        $this->percent = $discountPercent;
    }

    public function getDiscountProductCode(): string
    {
        return $this->discountProductCode;
    }

    public function setDiscountProductCode(string $discountProductCode): void
    {
        $this->discountProductCode = $discountProductCode;
    }

    public function getSelectedProductCodes(): array
    {
        return $this->selectedProductCodes;
    }

    public function setSelectedProductCodes(array $selectedProductCodes): void
    {
        $this->selectedProductCodes = $selectedProductCodes;
    }

    public function applyDiscount(AbstractOrder &$order): void
    {
        $products = $order->getProducts();
        $selectedProductsCount = 0;
        foreach ($products as $product){
            if(in_array($product->getCode(), $this->getSelectedProductCodes())){
                $selectedProductsCount++;
            }
        }

        if ($selectedProductsCount > 0){
            foreach ($products as $product){
                if($product->getCode() == $this->getDiscountProductCode() && $product->getDiscountPercent() == 0){
                    $product->setDiscountPercent($this->getDiscountPercent());
                    $selectedProductsCount--;
                    if ($selectedProductsCount == 0) break;
                }
            }
        }
    }
}