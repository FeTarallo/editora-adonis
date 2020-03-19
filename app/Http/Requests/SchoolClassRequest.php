<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolClassRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'schoolclass.nameClass'               => 'required|max:50|min:3|unique:school_class,name,'.$this->route('schoolclass').',id',
            'schoolclass.teacher'                 => 'required|max:50|min:3',
            'schoolclass.year'                    => 'required|numeric',
            'student.*.nameStudent'               => 'required|max:100',
        ];
    }

    public function messages(){
        return [
            'required'                              => 'Este campo é obrigatorio',
            'unique'                                => 'O valor informado neste campo já está em uso',
            'min'                                   => 'Este campo deve conter no mínimo :min caracteres',
            'max'                                   => 'Este campo deve conter no máximo :max caracteres',
            'numeric'                               => 'Este campo deve conter apenas números'
        ];
    }

    public function filters()
    {
        return [
            'schoolclass.year'      => 'digit'
        ];
    }
}
