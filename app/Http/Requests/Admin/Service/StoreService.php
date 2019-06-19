<?php namespace App\Http\Requests\Admin\Service;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreService extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.service.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'service_name' => ['required', 'string'],
            'service_description' => ['required', 'string'],
            'service_selling_price' => ['required', 'numeric'],
            'service_num_days' => ['required', 'integer'],
            
        ];
    }
}
