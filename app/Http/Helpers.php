<?php
if (!function_exists('currency')) {

    function currency($amount)
    {
        $currency = config()->get('app.currencies')[config()->get("app.currency")];

        return $currency["symbol"]." ".($amount * $currency["rate"]);
    }
}
