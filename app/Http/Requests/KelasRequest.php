<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelasRequest extends FormRequest
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
        if ($this->method() == 'PATCH') {
            $kelas_rules     = 'required|string|max:20|unique:kelas,nama_kelas,' . $this->get('id');
        } else {
            $kelas_rules     = 'required|string|max:20|unique:kelas,nama_kelas';
        }
        return [
            'nama_kelas' => $kelas_rules,
        ];
    }
}
