<?php

class FirstDiscountRule extends AbstractDiscountRule
{
    public array $selectedProductCodes = array();

    public function __construct(array $selectedProductCodes = array(), float $discountPercent = 0)
    {
        $this->selectedProductCodes = $selectedProductCodes;
        $this->percent = $discountPercent;
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
        $discountProducts = array();
        foreach ($products as $index => $product){
            if(in_array($product->getCode(), $this->getSelectedProductCodes()) && $product->getDiscountPercent() == 0){
                $discountProducts[$product->getCode()][] = $index;
            }
        }
        if (count($discountProducts) == count($this->getSelectedProductCodes())){
            $minCount = PHP_INT_MAX;
            foreach ($discountProducts as $discountProduct){
                if ($minCount > count($discountProduct)){
                    $minCount = count($discountProduct);
                }
            }
            for ($i = 0; $i < $minCount; $i++){
                foreach ($discountProducts as $discountProduct){
                    $index = $discountProduct[$i];
                    $products[$index]->setDiscountPercent($this->getDiscountPercent());
                }
            }
        }
    }
}