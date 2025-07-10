<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
       'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
        'alamat' => ['nullable', 'string', 'max:255'],
        'sekolah_asal' => ['nullable', 'string', 'max:255'],
        'jenis_kelamin' => ['nullable', 'in:0,1'],
        ];
    }
}
