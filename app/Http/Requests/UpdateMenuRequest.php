<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
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
            'staple_food' => ['required','max:50'],
            'main_dish' => ['required','max:50'],
            'side_dish' => ['required','max:50'],
            'soup' => ['required','max:50'],
            'fruit' => ['required','max:50'],
            'day_date' => ['required'],
            'max_people' => ['required','numeric','between:1,100'],
        ];
    }
}
