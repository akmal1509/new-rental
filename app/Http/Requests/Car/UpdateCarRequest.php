<?php

namespace App\Http\Requests\Car;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = request()->segment(count(request()->segments()));
        return [
            'name' => 'required',
            'slug' => 'required|unique:cars,slug,' . $id,
            'image' => 'required',
            'body' => 'required'
        ];
    }
}
