<?php
require_once "ProductInterface.php";
require_once "DiscountInterface.php";
require_once "DiscountRuleInterface.php";
require_once "OrderInterface.php";
require_once "AbstractProduct.php";
require_once "AbstractDiscountRule.php";
require_once "AbstractOrder.php";
require_once "Order.php";
require_once "Product.php";
require_once "FirstDiscountRule.php";
require_once "SecondDiscountRule.php";
require_once "ThirdDiscountRule.php";

$product1 = new Product("A", 100);
$product2 = new Product("B", 110);

$product3 = new Product("C", 120);
$product4 = new Product("D", 130);
$product5 = new Product("E", 140);

$product6 = new Product("F", 150);
$product7 = new Product("G", 160);
$product8 = new Product("H", 170);

$product9 = new Product("I", 180);
$product10 = new Product("J", 190);
$product11 = new Product("K", 200);
$product12 = new Product("L", 210);
$product13 = new Product("M", 220);

$order = new Order();
$order->addProduct($product1);
$order->addProduct($product2);
$order->addProduct($product3);
$order->addProduct($product4);
$order->addProduct($product5);
$order->addProduct($product6);
$order->addProduct($product7);
$order->addProduct($product8);
$order->addProduct($product9);
$order->addProduct($product10);
$order->addProduct($product11);
$order->addProduct($product12);
$order->addProduct($product13);

$discountRule1 = new FirstDiscountRule(["A", "B"], 10);
$discountRule2 = new FirstDiscountRule(["D", "E"], 6);
$discountRule3 = new FirstDiscountRule(["E", "F", "G"], 3);

$discountRule4 = new SecondDiscountRule("A", ["K", "L", "M"], 5);

$discountRule5 = new ThirdDiscountRule(3, ["A", "C"], 5);
$discountRule6 = new ThirdDiscountRule(4, ["A", "C"], 10);
$discountRule7 = new ThirdDiscountRule(5, ["A", "C"], 20);

$order->addDiscountRule("discount1", $discountRule1);
$order->addDiscountRule("discount2", $discountRule2);
$order->addDiscountRule("discount3", $discountRule3);
$order->addDiscountRule("discount4", $discountRule4);
$order->addDiscountRule("discount5", $discountRule5);
$order->addDiscountRule("discount6", $discountRule6);
$order->addDiscountRule("discount7", $discountRule7);

echo "Price: ".$order->getPrice()."\n";
echo "Discount price: ".$order->getDiscountPrice()."\n";
