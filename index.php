<?php

require_once 'Cart.php';

$cart = new Cart();

$cart->addItem(['product_id' => 1, 'qty' => 1, 'price' => 5]);
$cart->addItem(['product_id' => 5, 'qty' => 3, 'price' => 10]);
$cart->addItem(['product_id' => 1, 'qty' => 2, 'price' => 5]);

echo 'Shipping cost: ' . $cart->getShippingCost() . "\n";
echo 'Cart total: ' . $cart->get_total_value();