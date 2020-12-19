<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = ['sub_total', 'taxes', 'discounts', 'total'];

    public function getDiscountsAttribute($value) : string
    {
        $discountsList = '';
        $discounts = unserialize($value);
        foreach ($discounts as $discount) {
            $discountsList .= $discount['amount']."% off ".$discount['item']. ": -". currency($discount['discount']). " \r\n ";
        }

        return $discountsList;
    }
}
