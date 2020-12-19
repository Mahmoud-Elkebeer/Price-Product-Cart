<?php

namespace App\Http\Services;

use App\Models\Bill;
use App\Models\Product;
use Symfony\Component\HttpFoundation\Request;

class OrderService
{
    protected $taxes = 0.14;

    public function createBill(Request $request)
    {
        $bill = new Bill();
        $products = $request->get("products");
        $sub_total = $this->calculateBillSubTotal($products);
        $taxes = round($sub_total * $this->taxes, 2);
        $discountsAmount = $this->calculateBillDiscountsAmount($this->billDiscounts($products));

        $bill->sub_total = $sub_total;
        $bill->taxes = $taxes;
        $bill->discounts = serialize($this->billDiscounts($products));
        $bill->total = $sub_total + $taxes - $discountsAmount;

        $bill->save();

        return $bill;
    }

    public function calculateBillSubTotal(array $products)
    {
        $subTotal = 0;
        foreach ($products as $product) {
            $subTotal += Product::find($product["id"])->price * $product["amount"];
        }

        return $subTotal;
    }

    public function billDiscounts(array $products)
    {
        $discounts = [];
        foreach ($products as $product) {
            if ($product["id"] == 1 && $product["amount"] >= 2) {
                $item = Product::find(3);
                $discounts [] = ["amount" => 50, "item" => $item->name, "discount" => $item->price * 0.50];
            }
            if ($product["id"] == 4) {
                $item = Product::find(4);
                $discounts [] = ["amount" => 10, "item" => $item->name, "discount" => $item->price * 0.10];
            }
        }

        return $discounts;
    }

    public function calculateBillDiscountsAmount(array $discounts)
    {
        $discountsAmount = 0;
        foreach ($discounts as $discount) {
            $discountsAmount += $discount["discount"];
        }

        return $discountsAmount;
    }
}
