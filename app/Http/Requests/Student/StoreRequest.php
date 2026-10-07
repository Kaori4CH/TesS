<?php

namespace App\Http\Requests\Student;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nis'    => ['required', 'string', 'size:4', 'unique:students,nis,' ],
            'name'   => ['required', 'string'],
            'gender' => ['required', 'string', 'in:L,P'],
            'major'  => ['required', 'string', 'in:AKL,TKJ,BiD'],
            'class'  => ['required', 'string']

        ];
         }
        // public function attributes()
        // {
        //     return[
        //         'nis'=> 'Nmor Induk Siswa',
        //         'name'=> 'Nama Lengkap',
        //         'gender'=> 'Jenis Kelamin',
        //         'major'=> 'Jurusan',
        //         'class'=>'Kelas'
        //     ];
        // }
//    public function messages()
//     {
//         return[
//             'nis.required'=> 'Nomor Induk Siswa Wajib Diisi',
//             'nis.size'=> 'Nomor Induk Siswa Harus Terdiri Dari 4 Karakter'
//         ];
//     }


}
