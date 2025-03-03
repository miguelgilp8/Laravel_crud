<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProyectoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "titulo" => "required|string|min:4|unique:proyectos,titulo",
            "horas_previstas" => "required|integer|min:1|max:50",
            "f_comienzo" => "required|date",

        ];
    }

    public function messages(): array
    {
        return [
            "titulo.required" => "El titulo es requerido",
            "titulo.min" => "El titulo debe tener al menos 4 caracteres",
            "titulo.unique" => "El titulo ya esta registrado",
            "horas_previstas.required" => "El campo horas es requerido",
            "horas_previstas.min" => "Debe de durar al menos 1 hora",
            "horas_previstas.max" => "Debe de durar como maximo 50 horas",
            "f_comienzo.required" => "La fecha de comienzo es requerida",

        ];
    }
}
