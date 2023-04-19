<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'date' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title of the event is required.',
            'description.required' => 'The description is required.',
            'location.required' => 'The location of the event is required.',
            'date.required' => 'The date of the event is required.'
        ];
    }
}
