<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'quantity' => 'required|integer',
            'unit' => 'required|min:2|max:255',
            'amount' => 'required|integer',
            'description' => 'required|min:2|max:255',
            'life_span' => 'required|min:2|max:255',
            'isConsumable' => 'required|boolean',
            'inventory_number' => 'nullable',
        ];
    }
}
