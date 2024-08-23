<?php

function calculateDiscount($products, $user) {
    switch ($user['type']) {
        case 'premium':
            $discount = 0.1;
            break;
        case 'regular':
            $discount = 0.05;
            break;
        default:
            $discount = 0;
    }

    $totalPrice = array_sum(array_map(function ($product) {
        return $product['price'];
    }, $products));

    return $totalPrice * (1 - $discount);
}
