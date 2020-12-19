<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use League\Flysystem\Config;
use Symfony\Component\HttpFoundation\Response;

class OrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'currency' => 'required|in:'.implode(',', array_keys(config()->get("app.currencies"))),
            'products' => 'required|array|min:1',
        ];

        foreach ((array)$this->request->get('products') as $key => $val) {
            $rules['products.' . $key . '.id'] = 'required|exists:products,id';
            $rules['products.' . $key . '.amount'] = 'required|numeric';
        }

        return $rules;
    }
}
