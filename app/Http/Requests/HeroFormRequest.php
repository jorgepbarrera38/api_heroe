<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeroFormRequest extends FormRequest
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
        $wantUpating = $this->routeIs('heroes.update') ? "," . $this->route('hero')->id : "";
        return [
            'name' => 'required|unique:heroes,name' . $wantUpating,
            'image_url' => 'required|url'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre',
            'image_url' => 'URL de imagen'
        ];
    }
}
