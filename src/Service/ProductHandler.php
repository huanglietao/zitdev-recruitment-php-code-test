<?php

namespace App\Service;

class ProductHandler
{

    //计算金额
    public function getTotalPrice($productArr=[])
    {
        $totalPrice = 0;
        foreach ($productArr as $product) {
            $price = $product['price'] ?: 0;
            $totalPrice += $price;
        }
        return $totalPrice;
    }

    //获取dessert商品
    public function getDessertProduct($productArr=[])
    {
        //商品id串
        $sortProduct = [];
        foreach ($productArr as $product){
            if ($product['type'] == 'Dessert'){
                $sortProduct[] = $product;
            }
        }

        $dessertArr = array_column($sortProduct, 'price');
        if (!empty($sortProduct)){
            array_multisort($dessertArr, SORT_DESC, $sortProduct);
        }
        return $sortProduct;

    }

}