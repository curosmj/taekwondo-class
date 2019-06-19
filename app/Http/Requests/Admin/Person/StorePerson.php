<?php namespace App\Http\Requests\Admin\Person;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StorePerson extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.person.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'person_fname' => ['required', 'string'],
            'person_lname' => ['required', 'string'],
            'mobile_no' => ['required', 'integer'],
            'email' => ['required', 'email', 'string'],
            
        ];
    }
}
