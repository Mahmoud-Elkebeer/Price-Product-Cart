<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class BillResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request  updated_at
     * @return array
     */
    public function toArray($request)
    {
        return [
            'Subtotal' => currency($this->sub_total),
            'Taxes' => currency($this->taxes),
            'Discounts' => (string)$this->discounts,
            'Total' => currency($this->total),
        ];
    }
}
